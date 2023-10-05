export default function Card({ title }) {
	return (
		<div className="card kanban-card">
			<div className="card-body">
				<h6 className="fw-bold">{title}</h6>
			</div>
		</div>
	)
}