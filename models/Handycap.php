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
        return '{{%handycap}}';
    }

    /**
    * will include the custom scopes for this model
    * @return object enhanced query object
    */
    public static function find()
    {
        return new HandycapQuery(get_called_class());
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

    /**
    * before we save the record
    */
    public function beforeSave($insert){
        if (parent::beforeSave($insert)) 
        {             
            if($insert)
            {
                self::archiveOther($this->user_id);
                $this->time_create=time();
            }
            return true;               
        }
        return false;
    }

    /**
     * get user returns the latest related user object containing all attributes
     * @return object user
     */
    public function getUser() {
        return $this->hasOne(\Yii::$app->get('user')->className(), array('id' => 'user_id'));
    }

    private static function archiveOther($user_id = NULL)
    {
        if(!is_null($user_id))
        {
            Handycap::updateAll(['status'=>'archived'],'status <> "archived" AND user_id = '.$this->user_id);
        }
        return true;
    }
}
