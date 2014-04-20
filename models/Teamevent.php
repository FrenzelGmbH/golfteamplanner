<?php

namespace frenzelgmbh\golfteamplanner\models;

use Yii;

/**
 * This is the model class for table "tbl_teamevent".
 *
 * @property integer $id
 * @property string $name
 * @property string $time_start
 * @property string $time_end
 * @property string $date_start
 * @property string $date_end
 * @property string $status
 * @property integer $time_deleted
 * @property integer $time_create
 *
 * @property Participation[] $participations
 */
class Teamevent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_teamevent';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time_start', 'time_end', 'date_start', 'date_end'], 'safe'],
            [['time_deleted', 'time_create'], 'integer'],
            [['name', 'status'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'time_start' => Yii::t('app', 'Time Start'),
            'time_end' => Yii::t('app', 'Time End'),
            'date_start' => Yii::t('app', 'Date Start'),
            'date_end' => Yii::t('app', 'Date End'),
            'status' => Yii::t('app', 'Status'),
            'time_deleted' => Yii::t('app', 'Time Deleted'),
            'time_create' => Yii::t('app', 'Time Create'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipations()
    {
        return $this->hasMany(Participation::className(), ['teamevent_id' => 'id']);
    }
}
