<?php

namespace frenzelgmbh\golfteamplanner;

use yii\base\Module as BaseModule;

/**
 * Golf Team Planner Module
 *
 * @author Philipp frenzel <philipp@frenzel.net>
 */
class Module extends BaseModule {

    const VERSION = '0.1.0-dev';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        
        \Yii::setAlias('@golfteamplanner', dirname(__FILE__));
        /*\Yii::$app->i18n->translations['usr'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@usr/messages',
        ];
        if (\Yii::$app->mail !== null)
            \Yii::$app->mail->viewPath = '@usr/views/emails';*/
    }

    /**
     * Modify createController() to handle routes in the default controller
     *
     * This is a temporary hack until they add in url management via modules
     * @link https://github.com/yiisoft/yii2/issues/810
     * @link http://www.yiiframework.com/forum/index.php/topic/21884-module-and-url-management/
     *
     * "usr" and "usr/default" work like normal
     * "usr/xxx" gets changed to "usr/default/xxx"
     *
     * @inheritdoc
     */
    public function createController($route)
    {
        // check valid routes
        $validRoutes = [$this->defaultRoute, "handycap","participation","teamevent"];
        $isValidRoute = false;
        foreach ($validRoutes as $validRoute) {
            if (strpos($route, $validRoute) === 0) {
                $isValidRoute = true;
                break;
            }
        }

        if (!empty($route) && !$isValidRoute) {
            $route = $this->defaultRoute.'/'.$route;
        }

        return parent::createController($route);
    }

}
