<?php

namespace frontend\widgets\assets;

use yii\web\AssetBundle;

class KanbanAsset extends AssetBundle
{
	public $sourcePath = '@frontend/widgets/assets';
	public $css = [
		'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css',
		'css/App.css'
	];
	public $js = [
		'js/helpers/Helpers.js',
		'js/components/Card.js',
		'js/components/List.js',
		'js/App.js'
	];
	public $depends = [
		\frontend\assets\ReactAsset::class
	];
	public $jsOptions = [
		'position' => \yii\web\View::POS_HEAD,
		'data-plugins' => 'transform-modules-umd',
		'data-presets' => 'react',
		'data-type' => 'module',
		'type' => 'text/babel'
	];
}
