function App() {
	const [lists, setLists] = React.useState([
		{
			title: "To Do",
			cards: []
		}
	]);

	const addList = () => {
		setLists(prevLists => [
			...prevLists,
			{
				title: "New List",
				cards: []
			}
		]);
	};

	return (
		<main>
			<div className="row">
				{lists.map((list, index) => (
					<div key={index} className="col-3">
						<List
							cards={list.cards}
							setCards={cards => {
								const newLists = [...lists];
								newLists[index].cards = cards;
								setLists(newLists);
							}}
							title={list.title}
						/>
					</div>
				))}
				<div className="col-3">
					<button onClick={addList} className="btn btn-secondary">
						+ Add new list
					</button>
				</div>
			</div>
		</main>
	);
}
