# Flarum Github Autolink

Convert references to Github issues and commits automatically into links.

![github-autolink]

it also convert both `Username/Repository#` and `Username/Repository@SHA` to Github link

## Supported Links

Currently supported type of string that will be converted to links are:

* `https://github.com/{user or organisation name}/{repository}/issues/{issue number}`
* `{user or organisation name}/{repository}#{issue number}`
* `https://github.com/{user or organisation name}/{repository}/commit/{commit SHA1}`
* `{user or organisation name}/{repository}@{commit SHA1}`

## How To Install

Run follow command via ssh while you're in Flarum root folder:

```bash
composer require sijad/flarum-ext-github-autolink
```

then enable the extension from Flarum admin Extension page.

## TODO

* Retrieve links details form Github (e.g. title).

[github-autolink]: https://cloud.githubusercontent.com/assets/7693001/14741416/4d79016a-08ab-11e6-85f6-9718d9287470.png
