<?php

namespace frontend\models\Club;

use common\models\User;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

class Club extends ActiveRecord
{
    /**
     * @var bool
     */
    public bool $isEdit = false;
    /**
     * @return string
     */
    public static function tableName(): string
    {
        return '{{%club}}';
    }

    public function rules(): array
    {
        return [
            [['name', 'address'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['address'], 'string'],
            [['created_at'], 'date', 'format' => 'php:Y-m-d H:i:s'],
            [['created_by'], 'integer'],
            [
                'name',
                'unique',
                'targetClass' => Club::class,
                'message' => 'This name has already been taken.',
                'when' => function ($model) {
                    return !$model->isEdit;
                }
            ],
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getCreatedBy(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }
}
