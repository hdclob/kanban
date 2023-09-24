<?php

namespace frontend\widgets;

use frontend\widgets\assets\KanbanAsset;
use yii\base\Widget;

class KanbanWidget extends Widget
{
	public function init()
	{
		parent::init();
		KanbanAsset::register($this->view);
	}

	public function run()
	{
		return $this->render('kanban', [
			'id' => $this->getId()
		]);
	}
}
