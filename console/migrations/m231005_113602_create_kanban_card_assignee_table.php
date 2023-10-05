<?php

use console\migrations\base\Migration;

class m231005_113602_create_kanban_card_assignee_table extends Migration
{
	public function safeUp()
	{
		$this->createTable('kanban_card_assignee', [
			'card_id' => $this->integer(11)->notNull(),
			'assignee_id' => $this->integer(11)->notNull(),
		]);

		$this->addPrimaryKey('pk_kanban_card_assignee', 'kanban_card_assignee', ['card_id', 'assignee_id']);
		$this->addForeignKey(
			'fk_kanbancard_assignee_card_id',
			'kanban_card_assignee',
			'card_id',
			'kanban_card',
			'card_id'
		);
		$this->addForeignKey(
			'fk_kanbancard_assignee_assignee_id',
			'kanban_card_assignee',
			'assignee_id',
			'user',
			'id'
		);
	}

	public function safeDown()
	{
		$this->dropForeignKey('fk_kanbancard_assignee_assignee_id', 'kanban_card_assignee');
		$this->dropForeignKey('fk_kanbancard_assignee_card_id', 'kanban_card_assignee');
		$this->dropPrimaryKey('pk_kanban_card_assignee_list_id', 'kanban_card_assignee');
		
		$this->dropTable('kanban_card_assignee');
	}
}