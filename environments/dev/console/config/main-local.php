<?php

return [
	'bootstrap' => ['gii'],
	'components' => [
		'db' => [
			'class' => \yii\db\Connection::class,
			'dsn' => 'mysql:host=127.0.0.1;port=8890;dbname=kanban',
			'username' => 'root',
			'password' => '123456',
			'charset' => 'utf8mb4',
		],
	],
	'modules' => [
		'gii' => 'yii\gii\Module',
	],
];
