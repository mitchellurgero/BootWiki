<?php
/* Example plugin that can turn certain pages into blog posts */
class BlogPlugin extends Plugin{
	public function __construct(){
		//this is required by the plugin system to get working properly. This adds all the below events to global like {Class}::{onEventName};
		parent::__construct(); //Required
		return true;
	}
	
	public function initialize(){
		return true;
	}
	public function onTitle(&$title, $page){
		//Change page(s) title(S)
		//In this case we specifically parse so that we only change ONE page here:
		if($page == "howto/linux" || $page == "howto/linux/"){
			$title = " - Example Blog Plugin";
		}
		return true;
	}
	public function onPage(&$page, &$pageData){
		//In this case we specifically parse so that we only change ONE page here:
		if($page == "howto/linux" || $page == "howto/linux/"){
			print_r("<h3>Example Listing of pages!</h3>");
		}
		
		return true;
	}
	public function onPagesDir(&$pagesDir, &$pageFiles){
		//Used to add blog, or something else like list of pages in a folder.
		print_r("<pre>");
		foreach($pageFiles as $file){
			$file = basename($file);
			print_r("$file\r\n");
		}
		print_r("</pre>");
		return true;
	}
	public function onEndHead(){
		//Used to add custom styles or JS stuff
		return true;
	}
	public function onEndFoot(){
		//Used to add custom JS stuff to bottom of each page.
		return true;
	}
	public function onMenu(&$menu){
		//Add links to menu(Or customize current menu):
		//Example:
		//$menu["Title"] = "link" (page path relative to 'applications' folder, or a full link: 'https://example.com')
		//$menu["Linux Blog"] = "howto/linux";
		return true;
	}
	public function on404(&$string){
		//Custom 404 pages can be displayed with this event!
		return true;
	}
}

?>
