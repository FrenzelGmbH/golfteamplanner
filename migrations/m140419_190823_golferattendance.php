<?php

use yii\db\Schema;

class m140419_190823_golferattendance extends \yii\db\Migration
{
    public function up()
    {
    	$this->createTable('{{%participation}}',array(
          'id'                      => Schema::TYPE_PK,
          'user_id'                 => Schema::TYPE_INTEGER.' DEFAULT NULL',
          'teamevent_id'            => Schema::TYPE_INTEGER.' DEFAULT NULL',          
          'status'                  => Schema::TYPE_STRING .'(255) NOT NULL DEFAULT "pending"',
          'time_deleted'            => Schema::TYPE_INTEGER.' DEFAULT NULL',
          'time_create'             => Schema::TYPE_INTEGER,
      	),'CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB;');

    	/**
		* Add all needed fields to tbl_user in one_site belongs to many users
		**/
		$this->addForeignKey('FK_participation_teamevent','{{%participation}}','teamevent_id','{{%teamevent}}','id');
    }

    public function down()
    {
    	/**
		* remove fk's before we drop the table
		*/
		$this->dropForeignKey('FK_participation_teamevent','{{%participation}}');
		
        $this->dropTable('{{%participation}}');
    }
}
