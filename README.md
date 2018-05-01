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
    'admin' => [
        'class' => 'app\modules\admin\Module',
        'controllerMap' => [
            'config' => 'shoxabbos\news\controllers\NewsController'
        ]
    ],
]
```

After that, you can open the pages as:
```php
/admin/news/create
/admin/news/update
/admin/news/view
/admin/news/index
```