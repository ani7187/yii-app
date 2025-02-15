<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%client_club}}`.
 */
class m250214_145756_create_client_club_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%client_club}}', [
            'id' => $this->primaryKey(),
            'client_id' => $this->integer()->notNull(),
            'club_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('fk-client_club-client_id', '{{%client_club}}', 'client_id', '{{%client}}', 'id', 'CASCADE');
        $this->addForeignKey('fk-client_club-club_id', '{{%client_club}}', 'club_id', '{{%club}}', 'id', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-client_club-client_id', '{{%client_club}}');
        $this->dropForeignKey('fk-client_club-client_id', '{{%client_club}}');
        $this->dropTable('{{%client_club}}');
    }
}
