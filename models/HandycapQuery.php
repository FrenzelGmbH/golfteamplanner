<?php

namespace frenzelgmbh\golfteamplanner\models;

use yii\db\ActiveQuery;

/**
 * Scope class for handycap which allows to view only none deleted records
 */

class HandycapQuery extends ActiveQuery
{
    public function active()
    {
        $this->andWhere('status NOT LIKE "archived"');
        return $this;
    }
}
