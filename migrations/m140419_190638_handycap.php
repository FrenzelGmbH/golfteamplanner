<?php

use yii\db\Schema;

class m140419_190638_handycap extends \yii\db\Migration
{
    public function up()
    {
    	$this->createTable('{{%handycap}}',array(
          'id'                      => Schema::TYPE_PK,
          'user_id'                 => Schema::TYPE_INTEGER.' DEFAULT NULL',
          'hcp'                     => Schema::TYPE_FLOAT.' DEFAULT 36.0',          
          'status'                  => Schema::TYPE_STRING .'(255) NOT NULL DEFAULT "created"',
          'time_deleted'            => Schema::TYPE_INTEGER.' DEFAULT NULL',
          'time_create'             => Schema::TYPE_INTEGER,
      ),'CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB;');
    }

    public function down()
    {
        $this->dropTable('{{%handycap}}');
    }
}
