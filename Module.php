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
    public function __construct($id, $parent = null, $config = [])
    {
        foreach ($this->getModuleComponents() as $name => $component) {
            if (!isset($config['components'][$name])) {
                $config['components'][$name] = $component;
            } elseif (is_array($config['components'][$name]) && !isset($config['components'][$name]['class'])) {
                $config['components'][$name]['class'] = $component['class'];
            }
        }
        parent::__construct($id, $parent, $config);
    }

    /**
     * Returns module components.
     * @return array
     */
    protected function getModuleComponents()
    {
        return NULL;
    }
}
