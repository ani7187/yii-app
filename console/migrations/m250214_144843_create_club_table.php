<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%club}}`.
 */
class m250214_144843_create_club_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%club}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'address' => $this->text()->notNull(),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'created_by' => $this->integer(),
            'updated_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP')->append('ON UPDATE CURRENT_TIMESTAMP'),
            'updated_by' => $this->integer(),
            'deleted_at' => $this->dateTime()->null(),
        ]);

        $this->addForeignKey('fk-club-created_by', '{{%club}}', 'created_by', '{{%user}}', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('fk-club-updated_by', '{{%club}}', 'updated_by', '{{%user}}', 'id', 'SET NULL', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-club-created_by', '{{%club}}');
        $this->dropForeignKey('fk-club-updated_by', '{{%club}}');
        $this->dropForeignKey('fk-club-deleted_by', '{{%club}}');
        $this->dropTable('{{%club}}');
    }
}
