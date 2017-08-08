<?php
$CONFIG = array(
	"title" 	=> "BootWiki",
	"base_url"	=> "https://example.com/" //Needs trailing slash!
	);
$menuItems = array(
	"Home" 		=> "home.md", //DO NOT TOUCH
	"Link 1"	=> "link1.md",
	"Link 2"	=> "link2.md",
	"Quick Syntax"	=> "syntax.md",
	"Page in a Folder"	=> "example/example.md"
	
	);
	
	//Do not modify anthing past this point unless you know what you are doing, this is the menu HTML.
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

?>
