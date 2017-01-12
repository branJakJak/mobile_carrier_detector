<?php

use yii\db\Migration;

class m170111_155139_create_mobile_carrier extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        
        }
        $this->createTable('{{%mobile_carrier}}', [
            'id' => $this->primaryKey(),
            'group' => $this->string(),
            'mobile' => $this->string(),
            'carrier' => $this->string(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%mobile_carrier}}');
    }

}
