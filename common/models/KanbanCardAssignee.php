<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "kanban_card_assignee".
 *
 * @property int $card_id
 * @property int $assignee_id
 *
 * @property User $assignee
 * @property KanbanCard $card
 */
class KanbanCardAssignee extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'kanban_card_assignee';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['card_id', 'assignee_id'], 'required'],
			[['card_id', 'assignee_id'], 'integer'],
			[['card_id', 'assignee_id'], 'unique', 'targetAttribute' => ['card_id', 'assignee_id']],
			[['assignee_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['assignee_id' => 'id']],
			[['card_id'], 'exist', 'skipOnError' => true, 'targetClass' => KanbanCard::class, 'targetAttribute' => ['card_id' => 'card_id']],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'card_id' => 'Card ID',
			'assignee_id' => 'Assignee ID',
		];
	}

	/**
	 * Gets query for [[Assignee]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getAssignee()
	{
		return $this->hasOne(User::class, ['id' => 'assignee_id']);
	}

	/**
	 * Gets query for [[Card]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getCard()
	{
		return $this->hasOne(KanbanCard::class, ['card_id' => 'card_id']);
	}
}
