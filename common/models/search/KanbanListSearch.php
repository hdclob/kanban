<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\KanbanList;

/**
 * KanbanListSearch represents the model behind the search form of `common\models\KanbanList`.
 */
class KanbanListSearch extends KanbanList
{
	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['list_id', 'owner_id', 'created_at', 'updated_at'], 'integer'],
			[['title'], 'safe'],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function scenarios()
	{
		// bypass scenarios() implementation in the parent class
		return Model::scenarios();
	}

	/**
	 * Creates data provider instance with search query applied
	 *
	 * @param array $params
	 *
	 * @return ActiveDataProvider
	 */
	public function search($params)
	{
		$query = KanbanList::find();

		// add conditions that should always apply here

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		$this->load($params);

		if (!$this->validate()) {
			// uncomment the following line if you do not want to return any records when validation fails
			// $query->where('0=1');
			return $dataProvider;
		}

		// grid filtering conditions
		$query->andFilterWhere([
			'list_id' => $this->list_id,
			'owner_id' => $this->owner_id,
			'created_at' => $this->created_at,
			'updated_at' => $this->updated_at,
		]);

		$query->andFilterWhere(['like', 'title', $this->title]);

		return $dataProvider;
	}
}
