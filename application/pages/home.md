<div class="container">
  <div class="jumbotron">
    <h1>Welcome to BootWiki</h1>      
    <p>The bootstrap inspired wiki!</p>
  </div>     
</div>

<div class="row">
	<div class="col-md-4">
		<h3 class="text-center">Easy to use!</h3>
		BootWiki is super simple to install and use. Just unzip to a directory in your favorite HTTP server. No MySQL required.
	</div>
	<div class="col-md-4">
		<h3 class="text-center">Fully customizable!</h3>
		Built on top of PHP and BootStrap, anything is possible with BootWiki.
	</div>
		<div class="col-md-4">
		<h3 class="text-center">Super Fast!</h3>
		With only PHP, HTML, &amp; Markdown, BootWiki is super light and quick on its feet.
	</div>
</div>
<br />
<br />
<div class="row">
	

</div>

---------------------------------------

### About BootWiki

BootWiki was made with simplicity in mind, the Menu system is very simple, installation is also simple. All you need is PHP 5.4+.
BootWiki also supports the following features to help make creating a site or wiki very simple:
- JavaScript
- HTML
- Markdown
- PHP
- Custom Pages

BootWiki is designed to be run even on the smallest of servers (Like free PHP web hosting providers). With its very small footprint, bootstrap compatible, and easy install BootWiki can help you create a fantastic site with little to no knowledge of PHP.

### How to install and use BootWiki for your site

Boot wiki is very simple to install and use. To download, please visit the GitHub: [Boot Wiki Github](https://github.com/mitchellurgero/BootWiki)
Once downloaded, just unzip the files (or git clone https://github.com/mitchellurgero/BootWiki) to install. It's that simple.

### How to create a page

Creating a page is very simple, just put a file in "application/pages/" then link to it in the config.php file under $menuItems. 

Example:

```
$menuItem = array(
	"Item One" => "FileName.md",
	"Title or Name" => "FileNameHere.md"
);
```

### How to code a page
Pages are generated using Markdown. Markdown is a way for developers and users alike to be able to create beautiful pages quickly. Please see [this site](https://daringfireball.net/projects/markdown/syntax) for information on the Markdown Syntax.

Here is an example of what a page.md file might look like:

```
### This will generate the <h3></h3> tags

- And a list
- Of stuff
- That the user
- can easily read.

```
For a slightly better example, please look at the home.md file under "application/pages" directory.
