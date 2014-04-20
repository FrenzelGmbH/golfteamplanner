<?php

namespace app\modules\golfteamplanner\golfteamplanner\models;

use Yii;

/**
 * This is the model class for table "tbl_participation".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $teamevent_id
 * @property string $status
 * @property integer $time_deleted
 * @property integer $time_create
 *
 * @property Teamevent $teamevent
 */
class Participation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_participation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'teamevent_id', 'time_deleted', 'time_create'], 'integer'],
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
            'teamevent_id' => Yii::t('app', 'Teamevent ID'),
            'status' => Yii::t('app', 'Status'),
            'time_deleted' => Yii::t('app', 'Time Deleted'),
            'time_create' => Yii::t('app', 'Time Create'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeamevent()
    {
        return $this->hasOne(Teamevent::className(), ['id' => 'teamevent_id']);
    }
}
