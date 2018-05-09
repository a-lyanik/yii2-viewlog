
# Yii2-viewlog

Simple log viewer for your admin panel.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

~~~
composer require alex-lyanik/yii2-viewlog
~~~

or add

~~~
"alex-lyanik/yii2-viewlog": "*"
~~~

to the require section of your `composer.json` file.

## Configuration

Once the extension is installed, simply modify your application configuration as follows:

~~~php
return [
    'modules' => [
        ...
        'log' => [
            'class' => 'alyanik\viewlog\Module',
        ],
        ...
    ]
];
~~~

The module will now be accessible from `/viewlog` where you can view a table of your logs

## Built for

* [Yii2](https://www.yiiframework.com) - The web framework used

## Screens

List:
![List](https://i.imgur.com/REgxE7E.jpg)

View:
![View](https://i.imgur.com/mPgme4P.jpg)

## Acknowledgments

* [PSR-2](https://www.php-fig.org/psr/psr-2/) - PHP code style (plz)
* Don't panic and carry a towel