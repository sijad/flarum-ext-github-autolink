# Flarum Github Autolink

Convert references to Github issues (`#123`) and commits (`@abc1234`) automatically into links.

###How To Install
run below command while you're in Flarum root folder:
```
composer require sijad/flarum-ext-github-autolink
```

now you need to enable it in Flarum admin page and set Main repository name in extension settings

### TODO

* Add pull request support
* Retrieve links detail
* Support `Username/Repository#` and `Username/Repository@SHA` [More](https://help.github.com/articles/autolinked-references-and-urls)
