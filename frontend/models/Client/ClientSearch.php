<?php

namespace frontend\models\Client;

use frontend\models\Club\Club;
use yii\data\ActiveDataProvider;

class ClientSearch extends Client
{
    /** @var string */
    public string $birth_date_range = "";


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'gender', 'birth_date_range'], 'safe'],
        ];
    }

    /**
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search(array $params): ActiveDataProvider
    {
        $query = Client::find()->with('clubs');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andWhere(['deleted_at' => null]);

        $query->andFilterWhere(['like', 'full_name', $this->full_name]);
        $query->andFilterWhere(['gender' => $this->gender]);

        if (!empty($this->birth_date_range)) {
            list($start_date, $end_date) = explode(' - ', $this->birth_date_range);

            $query->andFilterWhere(['between', 'birth_date', $start_date, $end_date]);
        }

        return $dataProvider;
    }
}