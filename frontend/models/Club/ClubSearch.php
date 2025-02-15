<?php

namespace frontend\models\Club;

use yii\data\ActiveDataProvider;

class ClubSearch extends Club
{
    public $archived;

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            [['archived'], 'boolean'],
            [['name'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = Club::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 10],
        ]);


        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }

        // Search by name
        $query->andFilterWhere(['like', 'name', $this->name]);

        //check is deleted
        if ($this->archived) {
            $query->andWhere(['IS NOT', 'deleted_at', null]);
        } else {
            $query->andWhere(['deleted_at' => null]);
        }

        return $dataProvider;
    }
}