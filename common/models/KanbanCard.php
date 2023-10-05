<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "kanban_card".
 *
 * @property int $card_id
 * @property int $list_id
 * @property string|null $title
 * @property string|null $description
 * @property int $created_at
 * @property int $updated_at
 *
 * @property KanbanList $list
 */
class KanbanCard extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'kanban_card';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['list_id'], 'required'],
			[['list_id', 'created_at', 'updated_at'], 'integer'],
			[['description'], 'string'],
			[['title'], 'string', 'max' => 255],
			[['list_id'], 'exist', 'skipOnError' => true, 'targetClass' => KanbanList::class, 'targetAttribute' => ['list_id' => 'list_id']],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'card_id' => 'Card ID',
			'list_id' => 'List ID',
			'title' => 'Title',
			'description' => 'Description',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
		];
	}

	/**
	 * Gets query for [[List]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getList()
	{
		return $this->hasOne(KanbanList::class, ['list_id' => 'list_id']);
	}

	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
			'timestamp' => [
				'class' => TimestampBehavior::class,
				'createdAtAttribute' => 'created_at',
				'updatedAtAttribute' => 'updated_at',
			]
		];
	}
}
