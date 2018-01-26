<?php

namespace plathir\log\backend\models;

use yii\data\ActiveDataProvider;
use plathir\log\backend\models\Log;
use plathir\log\backend\models\Log_s;


class Log_s extends Log {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'level' ], 'integer'],
            [['category', 'log_time', 'prefix', 'message'], 'string'],

        ];
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params) {
        $query = Log::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'level' => $this->level,
        ]);

        $query->andFilterWhere(['like', 'category', $this->category])
              ->andFilterWhere(['like', 'prefix', $this->prefix])
              ->andFilterWhere(['like', 'message', $this->message]);

        return $dataProvider;
    }

}
