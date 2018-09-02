## setup
https://packagist.org/packages/josh/laravel-phantomjs

```composer.json
{
    "scripts": {
        "post-install-cmd": [
            "PhantomInstaller\\Installer::installPhantomJS"
        ],
        "post-update-cmd": [
            "PhantomInstaller\\Installer::installPhantomJS"
        ]
    },
    "require": {
        "jonnyw/php-phantomjs": "4.*"
    }
}
```

## usage
http://jonnnnyw.github.io/php-phantomjs/4.0/3-usage/
