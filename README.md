## BootWiki - Bootstrap inspired Wiki/CMS

Databaseless, flat-file(Markdown/HTML) PHP Wiki/CMS.

---

### What works:
- Markdown parsing
- HTML parsing
- PHP side is stable and working
- basic .htaccess is working well (fancy url)
- Plugin system now working (Basic events, all available events are in the example "Blog" plugin)

### What needs work:
- Nested Menu Items (Drop Down's)

---

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
Once downloaded, just unzip the files (or git clone https://github.com/mitchellurgero/BootWiki) to install. Modify the config.php to your liking. Modify or add pages to "application/pages/" folder. It's that simple.

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


### How do links work?
Links are simple: to make a link to a page on the site just use the following examples:
```
<a href="./?page=filename.md">Link Title</a>
```
--or--
```
<a href="./?page=folder/filename.md">Link Title</a>
```
--or if using mod_rewrite in apache--
```
<a href="filename.md">Link Title</a>
or
<a href="folder/filename.md">Link Title</a>
```

### How to make a plugin

This documentation will be in it's own file called "PLUGINS.md" eventually, for now just look at the example "Blog" plugin.
