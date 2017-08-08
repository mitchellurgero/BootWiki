<?php
session_start();
//Load speed
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;



require('application/config.php');
include('application/md.php');
//Set basic variables here...
$parsemd = new Parsedown();
$menu = $menuBegin;
//Generate menu items:
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
	if(isset($_GET['page'])){
		$key = array_search($_GET['page'], $menuItems);
		$key = " - ".$key;
		if($key == " - "){
			$key = "";
		}
		
	} else {
		$key = " - "."Home";
	}
	return $key;
}
function genActive($link){
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
		<?php echo $menu; ?>
		<style>
		body  {
		    /*background-image: url('https://urgero.org/background.jpg');
		    background-repeat: no-repeat;
		    background-attachment: fixed;*/
		}
		</style>
	</head>
	<?php
}

//Generate the body by reading the given page.
function body($page = "home.md"){
	//Was checking for slashes, but I think allowing nested folders should be fine. Will have to determine if it poses a security risk later though.
	if(strpos($page, "/") !== false){
		//$page = str_replace("/","", $page);
	}
	if(strpos($page, "..") !== false){
		$page = str_replace("..","", $page);
	}
	//echo $page;
	echo "<body>\n";
	echo '<div class="container">';
	if(file_exists("application/pages/".$page) && !is_dir("application/pages/".$page)){
		$file = file_get_contents("application/pages/".$page);
		echo Parsedown::instance()
   		->setMarkupEscaped(false) # escapes markup (HTML)
   		->text($file);
	} else if(is_dir("application/pages/".$page)){
		/*$files = glob("application/pages/".$page.'/*.{md}', GLOB_BRACE);
		$files = array_reverse($files);
		foreach($files as $file) {
		  	echo '<div class="row">'."\r\n";
		  	$handle = fopen($file, 'r');
		  	$line = fgets($handle); //For a title later?
		  	$lines = '';
		  	while (!feof($handle)) {
    			$lines .= fgets($handle);
			}
		  	echo '<div class="panel panel-default">';
		  	echo '	<div class="panel-heading"><a href="'.$CONFIG['base_url'].$page.'/'.basename($file).'">'.Parsedown::instance()->setMarkupEscaped(false)->text($line).'</a></div>';
  			echo '	<div class="panel-body">';
  			echo Parsedown::instance()->setMarkupEscaped(false)->text($lines);
  			echo '	</div>';
			echo '	</div>';
		  	echo '</div>'."\r\n";
		} */
	} else {
		echo '
		<div class="text-center">
			<h3>404 - Page not found</h3>
			<p>I could not find the page "'.$page.'". If you believe you got this message in error, please contact the site administrator.</p>
		</div>
		';
	}
   echo "</div>";
   echo "\n</body>\n";
}

//Please leave this here so that others can find where to find this amazing script :)
function foot(){
	global $start;
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

?>
