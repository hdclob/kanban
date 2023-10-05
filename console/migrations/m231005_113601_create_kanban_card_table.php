<?php

use console\migrations\base\Migration;

class m231005_113601_create_kanban_card_table extends Migration
{
	public function safeUp()
	{
		$this->createTable('kanban_card', [
			'card_id' => $this->primaryKey(),
			'list_id' => $this->integer(11)->notNull(),
			'title' => $this->string(255)->defaultValue('New List'),
			'description' => $this->text(),
			'created_at' => $this->integer(11)->notNull(),
			'updated_at' => $this->integer(11)->notNull(),
		]);

		$this->createIndex('idx_kanban_card_list_id', 'kanban_card', 'list_id');
		$this->addForeignKey(
			'pk_kanban_card_list_id',
			'kanban_card',
			'list_id',
			'kanban_list',
			'list_id'
		);
	}

	public function safeDown()
	{
		$this->dropForeignKey('pk_kanban_card_list_id', 'kanban_card');
		$this->dropIndex('idx_kanban_card_list_id', 'kanban_card');
		
		$this->dropTable('kanban_card');
	}
}