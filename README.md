News crud
=========
News crud

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist shoxabbos/yii2-news "*"
```

or add

```
"shoxabbos/yii2-news": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
php yii migrate --migrationPath=@vendor/shoxabbos/yii2-news/migrations
```

```php
'modules' => [
    'news' => [
        'class' => '\shoxabbos\news\Module',
        'layoutPath' => '@app/modules/admin/views/layouts',
        'layout' => 'admin'
    ]
]
```