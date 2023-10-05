<?php

function getKanbanCard($card_id, $list_id, $title, $description)
{
	return 	[
		'card_id' => $card_id,
		'list_id' => $list_id,
		'title' => $title,
		'description' => $description,
		'created_at' => time(),
		'updated_at' => time(),
	];
}

return [
	getKanbanCard(1, 1, 'My Test Card 1', 'My test card 1 description'),
	getKanbanCard(2, 1, 'My Test Card 2', 'My test card 2 description'),
	getKanbanCard(3, 1, 'My Test Card 3', 'My test card 3 description'),
	getKanbanCard(4, 2, 'My Test Card 4', 'My test card 4 description'),
	getKanbanCard(5, 2, 'My Test Card 5', 'My test card 5 description'),
	getKanbanCard(6, 3, 'My Test Card 6', 'My test card 6 description'),
	getKanbanCard(7, 4, 'My Test Card 7', 'My test card 7 description'),
	getKanbanCard(8, 5, 'My Test Card 8', 'My test card 8 description'),
	getKanbanCard(9, 5, 'My Test Card 9', 'My test card 9 description'),
	getKanbanCard(10, 5, 'My Test Card 10', 'My test card 10 description'),
];
