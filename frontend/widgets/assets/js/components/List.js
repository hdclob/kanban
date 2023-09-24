function List({ cards, setCards, title }) {
	const [isTitleEditable, setIsTitleEditable] = React.useState(false);
	const [isHovered, setIsHovered] = React.useState(false);

	const toggleEdit = () => {
		setIsTitleEditable(!isTitleEditable);
	};

	const addCard = () => {
		const newCards = [
			...cards,
			{ title: "New Card" }
		];
		setCards(newCards);
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
				<a onClick={addCard} href="javascript:;">
					+ Add a new card
				</a>
			</div>
		</div>
	);
}
