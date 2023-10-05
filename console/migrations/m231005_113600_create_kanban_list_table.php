<?php

use console\migrations\base\Migration;

class m231005_113600_create_kanban_list_table extends Migration
{
	public function safeUp()
	{
		$this->createTable('kanban_list', [
			'list_id' => $this->primaryKey(),
			'title' => $this->string(255)->defaultValue('New List'),
			'owner_id' => $this->integer(11)->notNull(),
			'created_at' => $this->integer(11)->notNull(),
			'updated_at' => $this->integer(11)->notNull(),
		]);

		$this->createIndex('idx_kanban_list_owner_id', 'kanban_list', 'owner_id');
		$this->addForeignKey(
			'pk_kanban_list_owner_id',
			'kanban_list',
			'owner_id',
			'user',
			'id'
		);
	}

	public function safeDown()
	{
		$this->dropForeignKey('pk_kanban_list_owner_id', 'kanban_list');
		$this->dropIndex('idx_kanban_list_owner_id', 'kanban_list');

		$this->dropTable('kanban_list');
	}
}