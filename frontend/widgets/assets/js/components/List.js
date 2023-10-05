import Card from "./Card";
import Hlp from "./Helpers"

export default function List({ listId, cards, setCards, title }) {
	const [isTitleEditable, setIsTitleEditable] = React.useState(false);
	const [isHovered, setIsHovered] = React.useState(false);

	const toggleEdit = () => {
		setIsTitleEditable(!isTitleEditable);
	};

	const addCard = () => {
		const newCard = { title: "New Card" };
		let formData = new FormData();
		formData.append('card', JSON.stringify(newCard));
		Hlp.fetch(`/frontend/web/kanban/add-card?list_id=${listId}`, {
			method: 'POST',
			body: formData
		})
			.then(resp => resp.json())
			.then(resp => {
				if (resp.card) {
					setCards([...cards, resp.card]);
				}
			})
	};

	return (
		<div className="card bg-dark-subtle">
			<div className="card-header" onMouseEnter={() => setIsHovered(true)} onMouseLeave={() => setIsHovered(false)}>
				{
					isTitleEditable ? (
						<input type="text" value={title} onChange={(e) => title = e.target.value} onBlur={toggleEdit} />
					) : (
						<>
							<p className="fw-bold mb-0">
								{title}
								{isHovered && (<i onClick={toggleEdit} className="bi bi-pencil"></i>)}
							</p>
						</>
				)
				}
			</div>
			{cards.map((card, index) => (
				<div key={index} className="card-body p-1">
					<Card title={card.title} />
				</div>
			))}
			<div className="card-footer">
				<a onClick={addCard} href="#">
					+ Add a new card
				</a>
			</div>
		</div>
	);
}
