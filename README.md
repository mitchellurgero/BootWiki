## BootWiki - Bootstrap inspired Wiki/CMS

---

### What works:
- Markdown parsing
- HTML parsing
- PHP side is stable and working

### What needs work:
- Nested Menu Items (Drop Down's

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

### How do links work?
Links are simple: to make a link to a page on the site just use the following examples:

<a href="./?page=filename.md">Link Title</a>

--or--

<a href="./page=folder/filename.md">Link Title</a>
