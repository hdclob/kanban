<?php

function getKanbanListData($list_id, $title, $owner_id)
{
	return 	[
		'list_id' => $list_id,
		'title' => $title,
		'owner_id' => $owner_id,
		'created_at' => time(),
		'updated_at' => time(),
	];
}

return [
	getKanbanListData(1, 'My Test List', 1),
	getKanbanListData(2, 'My Test List 2', 1),
	getKanbanListData(3, 'My Test List 3', 1),
	getKanbanListData(4, 'My Test List 4', 1),
	getKanbanListData(5, 'My Test List 5', 1),
];
