<div id="<?= $id ?>"></div>
<input type="hidden" id="csrfParam" value="<?= \Yii::$app->request->csrfParam ?>"/>
<input type="hidden" id="csrfToken" value="<?= \Yii::$app->request->csrfToken ?>"/>

<script data-plugins="transform-modules-umd" data-presets="react" data-type="module" type="text/babel">
	import App from "./App"

	const rootElement = document.getElementById('<?= $id ?>');
	const root = ReactDOM.createRoot(rootElement);
	root.render(<App tab="home" />);
</script>