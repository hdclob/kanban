<?php

namespace frontend\controllers;

use common\models\KanbanCard;
use common\models\KanbanList;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\Response;

/**
 * Kanban controller
 */
class KanbanController extends Controller
{
	/**
	 * {@inheritdoc}
	 */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::class,
				'rules' => [
					[
						'actions' => ['index', 'get-lists', 'add-list', 'add-card'],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
			'verbs' => [
				'class' => \yii\filters\VerbFilter::class,
				'actions' => [
					'add-list' => ['POST'],
					'add-card' => ['POST'],
				],
			],
		];
	}

	public function actionIndex()
	{
		return $this->render('index');
	}

	public function actionGetLists()
	{
		/** @var KanbanList[] */
		$query = KanbanList::find()
			->joinWith(['kanbanCards'])
			->where(['owner_id' => \Yii::$app->user->id])
			->all();

		$lists = [];
		foreach ($query as $q) {
			$lists[] = [
				'id' => $q->list_id,
				'title' => $q->title,
				'cards' => array_map(function (KanbanCard $card) {
					return [
						'id' => $card->card_id,
						'title' => $card->title
					];
				}, $q->kanbanCards)
			];
		}
		$this->response->format = Response::FORMAT_JSON;
		return [
			'lists' => $lists,
		];
	}

	public function actionAddList()
	{
		$this->response->format = Response::FORMAT_JSON;
		return $this->addEntity('list', KanbanList::class, 'list_id', ['owner_id' => \Yii::$app->user->id]);
	}

	public function actionAddCard($list_id)
	{
		$this->response->format = Response::FORMAT_JSON;
		return $this->addEntity('card', KanbanCard::class, 'card_id', ['list_id' => $list_id]);
	}

	private function addEntity($name, $modelClass, $pkField, $extraFields = [])
	{
		$entity = json_decode($this->request->post($name, '{}'), true);

		$saved = false;
		if (!empty($entity)) {
			$saved = true;
			$model = new $modelClass();
			$model->load($entity, '');
			foreach ($extraFields as $field => $value) {
				$model->$field = $value;
			}
			if (!$model->save()) {
				$saved = false;
				file_put_contents('log.txt', json_encode($model->errors));
			}
		}

		return [
			$name => $saved ? array_merge(['id' => $model->$pkField], $entity) : false
		];
	}
}
