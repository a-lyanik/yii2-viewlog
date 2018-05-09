<?php

namespace alyanik\viewlog\models\search;

use kartik\daterange\DateRangeBehavior;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use alyanik\viewlog\models\Log;

/**
 * LogSearch - main search model.
 */
class LogSearch extends Log
{
    public $datetime_start;
    public $datetime_end;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'level'], 'integer'],
            [['category', 'prefix', 'message', 'datetime_start', 'datetime_end', 'datetime_range', 'log_time'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Log::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'default' => SORT_DESC
                ],
                'attributes' => [
                    'default' => [
                        'desc' => [
                            'id' => SORT_DESC
                        ]
                    ]
                ],
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {

            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id'        => $this->id,
            'level'     => $this->level
        ]);

        $query->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'prefix', $this->prefix])
            ->andFilterWhere(['like', 'message', $this->message]);

        if ($this->datetime_start) {
            $query->andFilterWhere(['>=', 'log_time', strtotime($this->datetime_start)]);
        }

        if ($this->datetime_end) {
            $query->andFilterWhere(['<', 'log_time', strtotime($this->datetime_end)]);
        }

        return $dataProvider;
    }
}