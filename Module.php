<?php

namespace frenzelgmbh\golfteamplanner;

use Yii;
use yii\db\ActiveRecord;
use yii\base\InvalidConfigException;

/**
 * Golf Team Planner Module
 *
 * @author Philipp frenzel <philipp@frenzel.net>
 */
class Module extends \yii\base\Module {

    /**
     * @var string Module version
     */
    protected $_version = "0.1-alpha";

    /**
     * @var string Alias for module
     */
    public $alias = "@golfteamplanner";

    /**
     * @var string|null View path. Leave as null to use default "@golfteamplanner/views"
     */
    public $viewPath;

    /**
     * @var array Model classes, e.g., ["User" => "frenzelgmbh\golfteamplanner\models\User"]
     * Usage:
     *   $user = Yii::$app->getModule("user")->model("User", $config);
     *   (equivalent to)
     *   $user = new \frenzelgmbh\golfteamplanner\models\User($config);
     *
     * The model classes here will be merged with/override the [[_getDefaultModelClasses()|default ones]]
     */
    public $modelClasses = [];

    /**
     * @var array Storage for models based on $modelClasses
     */
    protected $_models;

    /**
     * Get module version
     * @return string
     */
    public function getVersion() {
        return $this->_version;
    }

    /**
     * @inheritdoc
     */
    public function init() {

        parent::init();

        // override modelClasses
        $this->modelClasses = array_merge($this->_getDefaultModelClasses(), $this->modelClasses);

        // set alias
        $this->setAliases([
            $this->alias => __DIR__,
        ]);
    }

    /**
     * Get default model classes
     */
    protected function _getDefaultModelClasses() {
        
        // use single quotes so nothing gets escaped
        return [
            'Handycap' => 'frenzelgmbh\golfteamplanner\models\Handycap',
            'Teamevent' => 'frenzelgmbh\golfteamplanner\models\Teamevent'
            'Participation' => 'frenzelgmbh\golfteamplanner\models\Participation'
        ];
    }

    /**
     * Get object instance of model
     * @param string $name
     * @param array $config
     * @return ActiveRecord
     */
    public function model($name, $config = []) {

        // return object if already created
        if (!empty($this->_models[$name])) {
            return $this->_models[$name];
        }

        // create object
        $className = $this->modelClasses[ucfirst($name)];
        $this->_models[$name] = Yii::createObject(array_merge(["class" => $className], $config));
        return $this->_models[$name];
    }

    /**
     * Modify createController() to handle routes in the default controller
     *
     * This is a temporary hack until they add in url management via modules
     * @link https://github.com/yiisoft/yii2/issues/810
     * @link http://www.yiiframework.com/forum/index.php/topic/21884-module-and-url-management/
     *
     * "user", "user/default", "user/admin", and "user/copy" work like normal
     * any other "user/xxx" gets changed to "user/default/xxx"
     *
     * @inheritdoc
     */
    public function createController($route) {

        // check valid routes
        $validRoutes = [$this->defaultRoute, "admin", "copy"];
        $isValidRoute = false;
        foreach ($validRoutes as $validRoute) {
            if (strpos($route, $validRoute) === 0) {
                $isValidRoute = true;
                break;
            }
        }

        return (empty($route) or $isValidRoute)
            ? parent::createController($route)
            : parent::createController("{$this->defaultRoute}/{$route}");
    }

    /**
     * Get a list of actions for this module. Used for debugging/initial installations
     */
    public function getActions() {

        return [
            "golfteamplanner" => "/{$this->id}",
            "admin" => "/{$this->id}/admin",
        ];
    }
}
