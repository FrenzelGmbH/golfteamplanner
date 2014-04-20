<?php

namespace frenzelgmbh\golfteamplanner\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frenzelgmbh\golfteamplanner\models\Participation;

/**
 * ParticipationSearch represents the model behind the search form about `frenzelgmbh\golfteamplanner\models\Participation`.
 */
class ParticipationSearch extends Participation
{
    public function rules()
    {
        return [
            [['id', 'user_id', 'teamevent_id', 'time_deleted', 'time_create'], 'integer'],
            [['status'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Participation::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'teamevent_id' => $this->teamevent_id,
            'time_deleted' => $this->time_deleted,
            'time_create' => $this->time_create,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
