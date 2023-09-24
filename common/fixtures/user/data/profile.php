<?php

function getProfileData($id, $name)
{
	return 	[
		'user_id' => $id,
		'name' => $name,
	];
}

return [
	getProfileData(1, 'Hugo'),
];
