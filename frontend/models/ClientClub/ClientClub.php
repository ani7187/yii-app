<?php

namespace frontend\models\ClientClub;

use yii\db\ActiveRecord;

class ClientClub extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%client_club}}';
    }

    public function rules()
    {
        return [
            [['client_id', 'club_id'], 'required'],
            [['client_id', 'club_id'], 'integer'],
            [['client_id', 'club_id'], 'unique', 'targetAttribute' => ['client_id', 'club_id']],
        ];
    }
}