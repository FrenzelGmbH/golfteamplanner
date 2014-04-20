<?php

namespace frenzelgmbh\golfteamplanner\models;

use Yii;

/**
 * This is the model class for table "tbl_handycap".
 *
 * @property integer $id
 * @property integer $user_id
 * @property double $hcp
 * @property string $status
 * @property integer $time_deleted
 * @property integer $time_create
 */
class Handycap extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_handycap';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hcp','user_id'],'required'],
            [['user_id', 'time_deleted', 'time_create'], 'integer'],
            [['hcp'], 'number'],
            [['status'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'hcp' => Yii::t('app', 'Hcp'),
            'status' => Yii::t('app', 'Status'),
            'time_deleted' => Yii::t('app', 'Deleted at'),
            'time_create' => Yii::t('app', 'Create at'),
        ];
    }
}
