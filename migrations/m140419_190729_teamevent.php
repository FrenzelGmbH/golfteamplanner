<?php

use yii\db\Schema;

class m140419_190729_teamevent extends \yii\db\Migration
{
    public function up()
    {
    	$this->createTable('{{%teamevent}}',array(
          'id'                      => Schema::TYPE_PK,
          'name'                    => Schema::TYPE_STRING .'(255) NOT NULL DEFAULT "Teamplay"',
          'time_start'				=> 'TIME',
		  'time_end'				=> 'TIME',
		  'date_start'				=> 'DATE',
		  'date_end'				=> 'DATE',
          'status'                  => Schema::TYPE_STRING .'(255) NOT NULL DEFAULT "created"',
          'time_deleted'            => Schema::TYPE_INTEGER.' DEFAULT NULL',
          'time_create'             => Schema::TYPE_INTEGER,
      	),'CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB;');
    }

    public function down()
    {
        $this->dropTable('{{%teamevent}}');
    }
}
