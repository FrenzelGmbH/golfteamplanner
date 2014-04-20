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
 * @property string $date_start required
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
        return '{{%teamevent}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_start'],'required'],
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
            'id' => Yii::t('golfteamplanner', 'ID'),
            'name' => Yii::t('golfteamplanner', 'Name'),
            'time_start' => Yii::t('golfteamplanner', 'Time Start'),
            'time_end' => Yii::t('golfteamplanner', 'Time End'),
            'date_start' => Yii::t('golfteamplanner', 'Date Start'),
            'date_end' => Yii::t('golfteamplanner', 'Date End'),
            'status' => Yii::t('golfteamplanner', 'Status'),
            'time_deleted' => Yii::t('golfteamplanner', 'Time Deleted'),
            'time_create' => Yii::t('golfteamplanner', 'Time Create'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipations()
    {
        return $this->hasMany(Participation::className(), ['teamevent_id' => 'id']);
    }

    /**
    * @inheritdoc
    */
    public function beforeSave($insert){
        if (parent::beforeSave($insert)) 
        {             
            if($insert)
            {
                $this->time_create=time();
                $this->status=$this->status==''?'created':$this->status;
            }
            return true;               
        }
        return false;
    }
}
