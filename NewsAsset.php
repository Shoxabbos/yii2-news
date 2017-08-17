<?php

namespace shoxabbos\news;

use yii\web\AssetBundle;

/**
 * @author Shoxabbos
 */
class NewsAsset extends AssetBundle
{
    public $sourcePath = __DIR__."/assets";

    public $js = [
        'js/tinymce/tinymce.min.js',
    ];
}
