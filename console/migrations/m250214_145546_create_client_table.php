<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%client}}`.
 */
class m250214_145546_create_client_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%client}}', [
            'id' => $this->primaryKey(),
            'full_name' => $this->string(255)->notNull(),
            'gender' => "ENUM('male', 'female') NOT NULL",
            'birth_date' => $this->date()->notNull(),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'created_by' => $this->integer(),
            'updated_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP')->append('ON UPDATE CURRENT_TIMESTAMP'),
            'updated_by' => $this->integer(),
            'deleted_at' => $this->dateTime()->null(),
        ]);

        $this->addForeignKey('fk-client-created_by', '{{%client}}', 'created_by', '{{%user}}', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('fk-client-updated_by', '{{%client}}', 'updated_by', '{{%user}}', 'id', 'SET NULL', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-client-created_by', '{{%client}}');
        $this->dropForeignKey('fk-client-updated_by', '{{%client}}');
        $this->dropForeignKey('fk-client-deleted_by', '{{%client}}');

        $this->dropTable('{{%client}}');
    }
}
