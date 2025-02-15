<?php

namespace frontend\models\Client;

use common\models\User;
use frontend\models\ClientClub\ClientClub;
use frontend\models\Club\Club;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

class Client extends ActiveRecord
{
    /**
     * @var bool
     */
    public bool $deleting = false;

    /**
     * @var array
     */
    public array $clubs = [];

    public static function tableName()
    {
        return '{{%client}}';
    }

    public function rules()
    {
        return [
            [['full_name'], 'required'],
            [['birth_date'], 'safe'],
            [['clubs'], 'required', 'when' => function ($model) {
                return !$model->deleting;
            }],
            [['clubs'], 'each', 'rule' => ['integer'], 'when' => function ($model) {
                return !$model->deleting;
            }],
            [['created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['full_name'], 'string', 'max' => 255],
            [['gender'], 'in', 'range' => ['male', 'female']],
            [['created_at'], 'date', 'format' => 'php:Y-m-d H:i:s'],
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getCreatedBy(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * Define relation with the `client_club` table
     */
    public function getClientClubs()
    {
        return $this->hasMany(ClientClub::class, ['client_id' => 'id']);
    }

    /**
     * Define relation with `clubs` table
     */
    public function getClubs()
    {
        return $this->hasMany(Club::class, ['id' => 'club_id'])->via('clientClubs');
    }

    /**
     * Load selected clubs into the virtual property
     */
    public function afterFind()
    {
        parent::afterFind();
        $this->clubs = $this->getClubs()->select(['id', 'name'])->all();
    }

    /**
     * Save selected clubs after form submission
     */
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        $this->saveClientClubs();
    }

    /**
     * Save clubs in the junction table `client_club`
     */
    private function saveClientClubs()
    {
        if (!empty($this->clubs)) {
            // Remove existing records
            ClientClub::deleteAll(['client_id' => $this->id]);

            // Insert new records
            foreach ($this->clubs as $clubId) {
                $clientClub = new ClientClub();
                $clientClub->client_id = $this->id;
                $clientClub->club_id = $clubId;
                $clientClub->save();
            }
        }
    }
}
