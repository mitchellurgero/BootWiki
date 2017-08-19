<?php
session_start();
//Load speed
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;
include("classhelper.php"); //To assist in pulling in plugins
include("Events.php"); //Event system
include("Plugin.php"); //Plugin system-ish
require('application/config.php');
include('application/md.php');
Event::handle('InitializePlugin');
//Set basic variables here...
$parsemd = new Parsedown();
/* Menu Stuff */
$menuBegin = '
<nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="'.$CONFIG['base_url'].'">'.$CONFIG['title'].'</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            	<ul class="nav navbar-nav">
';

$menuEnd = "	</ul>
</div>
 </nav>";
 
$menu = $menuBegin;
//Generate menu items:
Event::handle('Menu', array(&$menuItems));
foreach($menuItems as $mi){
		
		$key = array_search($mi, $menuItems);
		$link = $mi;
		$href = "";
		
		//<?php echo $CONFIG['base_url'];
		if(strpos($link, "://")){
			$href = '<li '.genActive($link).'><a href="'.$link.'">'.$key.'</a></li>'."\n";
		} else {
			$href = '<li '.genActive($link).'><a href="'.$CONFIG['base_url'].$link.'">'.$key.'</a></li>'."\n";
		}
		$menu = $menu.$href;
}

$menu = $menu.$menuEnd;
// Output header here...
head();
if(isset($_GET['page'])){
	body($_GET['page']);
} else{
	body();
}
foot();
//Function to generate header
function genTitle(){
	global $menuItems;
	$key = '';
	if(isset($_GET['page'])){
		$key = array_search($_GET['page'], $menuItems);
		$key = " - ".$key;
		if($key == " - "){
			$key = "";
		}
	} else {
		$key = " - "."Home";
	}
	Event::handle('Title', array(&$key, $_GET['page']));
	return $key;
}
function genActive($link){
	$key = '';
	if(isset($_GET['page']) && $_GET['page'] == $link){
		$key = 'class="active"';
	} else {
		if($link == "home.md" && !isset($_GET['page'])){
			$key = 'class="active"';
		}
	}
	return $key;
}
//Generate the header from the config.
function head(){
	global $menu, $CONFIG;
	echo '';
	?>
	<!DOCTYPE html>
	<html>
	<head>
		
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title><?php echo $CONFIG['title']; echo genTitle(); ?></title>
		<link href="<?php echo $CONFIG['base_url'];?>css/bootstrap.min.css" rel="stylesheet">
		<script src="<?php echo $CONFIG['base_url'];?>js/jquery-1.12.2.min.js"></script>
		<script src="<?php echo $CONFIG['base_url'];?>js/bootstrap.min.js"></script>
		<style>
		body  {
		    /*background-image: url('https://urgero.org/background.jpg');
		    background-repeat: no-repeat;
		    background-attachment: fixed;*/
		}
		</style>
		<?php Event::handle('EndHead');?>
	</head>
	<?php
}

//Generate the body by reading the given page.
function body($page = "home.md"){
	global $CONFIG, $menu;
	//Was checking for slashes, but I think allowing nested folders should be fine. Will have to determine if it poses a security risk later though.
	if(strpos($page, "/") !== false){
		//$page = str_replace("/","", $page);
	}
	if(strpos($page, "..") !== false){
		$page = str_replace("..","", $page);
	}
	//echo $page;
	echo "<body>\n";
	Event::handle('Menu');
	echo $menu;
	echo '<div class="container">';
	if(file_exists("application/pages/".$page) && !is_dir("application/pages/".$page)){
		$file = file_get_contents("application/pages/".$page);
		$pageData = Parsedown::instance()
   		->setMarkupEscaped(false) # escapes markup (HTML)
   		->text($file);
   		Event::handle('Page', array(&$page, &$pageData));
   		echo $pageData;
	} else if(is_dir("application/pages/".$page)){
		$files = glob("application/pages/".$page.'/*.{md}', GLOB_BRACE);
		$files = array_reverse($files);
		Event::handle('PagesDir', array(&$page, &$files));
	} else {
		$o404 =  '
		<div class="text-center">
			<h3>404 - Page not found</h3>
			<p>I could not find the page "'.$page.'". If you believe you got this message in error, please contact the site administrator.</p>
		</div>
		';
		Event::handle('404', array(&$o404));
		echo $o404;
	}
   echo "</div>";
   echo "\n</body>\n";
}

//Please leave this here so that others can find where to find this amazing script :)
function foot(){
	global $start;
	Event::handle('EndFoot');
	echo '';
	?>
	<div class="container">
		<div class="row">
			<hr></hr>
			<div class="col-md-6">
				<div class="text-left">Powered by <a href="https://github.com/mitchellurgero/BootWiki">BootWiki</a></div>
			</div>
			<div class="col-md-6">
				<?php
					$time = microtime();
					$time = explode(' ', $time);
					$time = $time[1] + $time[0];
					$finish = $time;
					$total_time = round(($finish - $start), 4);
					echo '<div class="text-right">Page generated in '.$total_time.' seconds.</div>';
				?>
			</div>
			<br />
			<br />
		</div>
	</div>
	<?php


}
function addPlugin($name, array $attrs=array()){
	return ClassHelper::addPlugin($name, $attrs);
}
?>
