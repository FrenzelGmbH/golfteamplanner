<?php

namespace app\modules\golfteamplanner\golfteamplanner\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\golfteamplanner\golfteamplanner\models\Teamevent;

/**
 * TeameventSearch represents the model behind the search form about `app\modules\golfteamplanner\golfteamplanner\models\Teamevent`.
 */
class TeameventSearch extends Teamevent
{
    public function rules()
    {
        return [
            [['id', 'time_deleted', 'time_create'], 'integer'],
            [['name', 'time_start', 'time_end', 'date_start', 'date_end', 'status'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Teamevent::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'time_start' => $this->time_start,
            'time_end' => $this->time_end,
            'date_start' => $this->date_start,
            'date_end' => $this->date_end,
            'time_deleted' => $this->time_deleted,
            'time_create' => $this->time_create,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
