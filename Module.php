<?php
namespace alyanik\viewlog;

use \yii\base\Module as YiiModule;

/**
 * log module definition class
 *
 * @category  PHP
 * @package   alex-lyanik/yii2-viewlog
 * @author    Alexander Lyanik <alex.lyanik@gmail.com>
 * @license   BSD-2
 * @since     v1.0.0
 */
class Module extends YiiModule
{

    /**
     * The current version of this module.
     *
     * @var string
     */
    public $version = '1.0.0';

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'alyanik\viewlog\controllers';

    /**
     * @var string
     */
    public $defaultRoute = 'viewlog';

}