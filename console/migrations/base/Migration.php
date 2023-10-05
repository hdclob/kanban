<?php

namespace console\migrations\base;

use yii\db\Migration as BaseMigration;

/**
 *
 */
class Migration extends BaseMigration
{
	/**
	 * @var string
	 */
	protected $tableOptions;

	/**
	 * @inheritdoc
	 */
	public function init()
	{
		switch (\Yii::$app->db->driverName) {
			case 'mysql':
				$this->tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
				break;
			case 'pgsql':
				$this->tableOptions = null;
				break;
			default:
				throw new \RuntimeException('Your database is not supported!');
		}

		parent::init();
	}

	public function createTable($table, $columns, $options = null)
	{
		return parent::createTable($table, $columns, $options, $this->tableOptions);
	}

	public function addForeignKey($name, $table, $columns, $refTable, $refColumns, $delete = 'NO ACTION', $update = 'NO ACTION')
	{
		return parent::addForeignKey($name, $table, $columns, $refTable, $refColumns, $delete, $update);
	}

	public function cleanSQL($st)
	{
		$st = str_replace("\n", ' ', $st);
		$st = str_replace("\r", ' ', $st);
		$st = str_replace("\t", ' ', $st);

		return $st;
	}
}
