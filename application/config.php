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

//Add plugins below:
addPlugin("Blog");

?>
