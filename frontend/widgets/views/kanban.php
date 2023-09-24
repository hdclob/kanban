<div id="<?= $id ?>"></div>

<script type="text/babel">
	const rootElement = document.getElementById('<?= $id ?>')
	ReactDOM.render(
		<App />,
		rootElement
	)
</script>