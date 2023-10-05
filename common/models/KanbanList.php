<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "kanban_list".
 *
 * @property int $list_id
 * @property string|null $title
 * @property int $owner_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property KanbanCard[] $kanbanCards
 * @property User $owner
 */
class KanbanList extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'kanban_list';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['owner_id'], 'required'],
			[['owner_id', 'created_at', 'updated_at'], 'integer'],
			[['title'], 'string', 'max' => 255],
			[['owner_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['owner_id' => 'id']],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'list_id' => 'List ID',
			'title' => 'Title',
			'owner_id' => 'Owner ID',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
		];
	}

	/**
	 * Gets query for [[KanbanCards]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getKanbanCards()
	{
		return $this->hasMany(KanbanCard::class, ['list_id' => 'list_id']);
	}

	/**
	 * Gets query for [[Owner]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getOwner()
	{
		return $this->hasOne(User::class, ['id' => 'owner_id']);
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
