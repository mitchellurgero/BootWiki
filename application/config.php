<?php
$CONFIG = array(
	"title" 	=> "BootWiki",
	"base_url"	=> "http://192.168.1.6/bootwiki/" //Needs trailing slash!
	);
$menuItems = array(
	"Home" 		=> "home.md", //DO NOT TOUCH
	"Link 1"	=> "link1.md",
	"Link 2"	=> "link2.md",
	"Quick Syntax"	=> "syntax.md",
	"Page in a Folder"	=> "example/example.md"
	
	);

//Add plugins below:
addPlugin("Blog");

?>
