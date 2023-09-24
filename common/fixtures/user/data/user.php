<?php

function getUserData($id, $email)
{
	return 	[
		'id' => $id,
		'username' => $email,
		'email' => $email,
		'password_hash' => '$2y$12$RTUjw.fMEuLToHxp.WZAXu3SiSMo85Q/2fZ3UeKezRZL3OGfPBEH.', // tst
		'auth_key' => 'fX6KQM-QwfkapfcmqVIEWEByGqU2qdT1',
		'confirmed_at' => time(),
		'updated_at' => time(),
		'created_at' => time(),
		'flags' => 1,
	];
}

return [
	getUserData(1, 'hugo@dev.eu'),
];
