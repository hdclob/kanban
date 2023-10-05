import List from "./List"
import Hlp from "./Helpers"

export default function App() {
	const [lists, setLists] = React.useState([]);

	React.useEffect(() => {
		Hlp.fetch('/frontend/web/kanban/get-lists')
			.then(resp => resp.json())
			.then(resp => {
				setLists(resp.lists)
			})
	}, []);

	const addList = () => {
		const newList = {
			title: "New List",
			cards: []
		};
		let formData = new FormData();
		formData.append('list', JSON.stringify(newList));
		Hlp.fetch('/frontend/web/kanban/add-list', {
			method: 'POST',
			body: formData
		})
			.then(resp => resp.json())
			.then(resp => {
				if (resp.list) {
					setLists([...lists, resp.list]);
				}
			})
	};

	return (
		<div className="row kanban-board p-3">
			{lists.map((list, index) => (
				<div key={index} className="col-3">
					<List
						listId={list.id}
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
	);
}
