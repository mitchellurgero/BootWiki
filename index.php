<?php
session_start();
//Check for user session
require('application/config.php');
include('application/md.php');
//Set basic variables here...
$parsemd = new Parsedown();
$menu = $menuBegin;
//Generate menu items:
foreach($menuItems as $mi){
		$key = array_search($mi, $menuItems);
		$link = $mi;
		$href = '<li><a href="index.php?page='.$link.'">'.$key.'</a></li>'."\n";
		$menu = $menu.$href;
}


if(!isset($_SESSION['username'])){
	//user is not logged in, check if config has 
	$loginMenu = '
			<ul class="nav navbar-nav navbar-right">
                 <form class="navbar-form navbar-right" role="search" action="index.php" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-default">Sign In</button>
                </form>
            </ul>
	';
	$menu = $menu.$menuEnd1;
	$menu = $menu.$loginMenu;
} else {
	
}
$menu = $menu.$menuEnd2;
// Output header here...
head();
if(isset($_GET['page'])){
	body($_GET['page']);
} else{
	body();
}
foot();
//Function to generate header
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
		<title><?php echo $CONFIG['title']; ?></title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/jquery-1.12.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<?php echo $menu; ?>
		
	</head>
	<?php
	
	
}
function body($page = "home.md"){
	echo "<body>\n";
	echo '<div class="container">';
	if(file_exists("application/pages/".$page)){
		$file = file_get_contents("application/pages/".$page);
		echo Parsedown::instance()
   		->setMarkupEscaped(false) # escapes markup (HTML)
   		->text($file);
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

?>