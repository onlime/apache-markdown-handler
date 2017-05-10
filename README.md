# Apache Markdown Handler

A basic markdown handler for Apache that utilizes [erusev/parsedown](https://github.com/erusev/parsedown) and [erusev/parsedown-extra](https://github.com/erusev/parsedown-extra) for rendering markdown files in Apache.


## Installation

To install simply run `composer install && bower install` in the root of the apache markdown handler's directory this will pull the dependencies into your install:

```shell
$ composer install
$ bower install
```
 
After that configuring is pretty simple you just need to add the following lines to the `.htaccess` file in the root of your www root or into the `VirtualHost` entry. Once that's done simply verify it's working by hitting a markdown file with `.md` extension somewhere on your server.

```apache
# used to expose assets
Alias /apache-markdown-handler/ /path/to/markdown-handler/

ScriptAlias /markdown-handler/ /path/to/markdown-handler/
Action markdown /markdown-handler/handler.php
AddHandler markdown .md
```