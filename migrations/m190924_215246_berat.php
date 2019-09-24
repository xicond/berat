<?php

use yii\db\Migration;

/**
 * Class m190924_215246_berat
 */
class m190924_215246_berat extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%berat}}', [
            'tanggal' => $this->dateTime()->unique()->notNull(),
            'max' => $this->integer()->notNull(),
            'min' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%berat}}');
    }
}
