<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * React frontend application asset bundle.
 */
class ReactAsset extends AssetBundle
{
	public $js = [
		// 'https://unpkg.com/react@18.2.0/umd/react.production.min.js',
		// 'https://unpkg.com/react-dom@18.2.0/umd/react-dom.production.min.js',
		'https://unpkg.com/react@18/umd/react.development.js',
		'https://unpkg.com/react-dom@18/umd/react-dom.development.js',
		'https://unpkg.com/@babel/standalone/babel.min.js'
	];
	public $jsOptions = [
		'position' => \yii\web\View::POS_HEAD,
	];
}
