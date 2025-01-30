const topVisits = [
	{
    "id": 4,
    "leader": "King Charles II (previous Prince Charles)",
    "destination_country": "Lithuania",
    "event_name": "Elections",
    "start_date": "1998-03-01",
    "end_date": "1998-03-04",
    "description": "Elections",
    "cost": "1,938.04",
    "transport": "Train",
    "image": "http://localhost/images"
  },
  {
    "id": 1,
    "leader": "King Charles II (previous Prince Charles)",
    "destination_country": "Albania",
    "event_name": "School",
    "start_date": "1998-12-01",
    "end_date": "1999-01-19",
    "description": "School",
    "cost": "100,000.00",
    "transport": "Plane",
    "image": "http://localhost/images/images/679ab3505d5ae.jpg"
  },
  {
    "id": 3,
    "leader": "King Charles II (previous Prince Charles)",
    "destination_country": "Latvia",
    "event_name": "Inauguration",
    "start_date": "1998-12-01",
    "end_date": "2002-06-02",
    "description": "Inauguration",
    "cost": "100,000.00",
    "transport": "Train",
    "image": "http://localhost/images/images/679b28f89b011.webp"
  }
];
const selectedVisit = {
  "id": 3,
  "leader": "King Charles II (previous Prince Charles)",
  "destination_country": "Latvia",
  "event_name": "Inauguration",
  "start_date": "1998-12-01",
  "end_date": "2002-06-02",
  "description": "Inauguration",
  "cost": "100,000.00",
  "transport": "Train",
  "image": "http://localhost/images/images/679b28f89b011.webp"

};
const relatedVisits = [
	{
    "id": 4,
    "leader": "King Charles II (previous Prince Charles)",
    "destination_country": "Lithuania",
    "event_name": "Elections",
    "start_date": "1998-03-01",
    "end_date": "1998-03-04",
    "description": "Elections",
    "cost": "1,938.04",
    "transport": "Train",
    "image": "http://localhost/images"
  },
  {
    "id": 1,
    "leader": "King Charles II (previous Prince Charles)",
    "destination_country": "Albania",
    "event_name": "School",
    "start_date": "1998-12-01",
    "end_date": "1999-01-19",
    "description": "School",
    "cost": "100,000.00",
    "transport": "Plane",
    "image": "http://localhost/images/images/679ab3505d5ae.jpg"
  },
  {
    "id": 3,
    "leader": "King Charles II (previous Prince Charles)",
    "destination_country": "Latvia",
    "event_name": "Inauguration",
    "start_date": "1998-12-01",
    "end_date": "2002-06-02",
    "description": "Inauguration",
    "cost": "100,000.00",
    "transport": "Train",
    "image": "http://localhost/images/images/679b28f89b011.webp"
  }
];

export default function App() {
	
	function handleVisitSelection(visitID) {
		alert("Selected ID " + visitID);
	}
	
	function handleGoingBack() {
		alert("Going to Homepage");
	}
	const selectedVisitID = 3;
	
	return (
		<>
			<Header />
			<main className="mb-8 px-2 md:container md:mx-auto">
				<VisitPage
					selectedVisitID={selectedVisitID}
					handleVisitSelection={handleVisitSelection}
					handleGoingBack={handleGoingBack}
				/>
			</main>
			<Footer />
		</>
	)
}
// Header and Footer components - structural components without processing or data
function Header() {
	
	return (
		<header className="bg-[#5B0000] mb-3 py-3 sticky top-0 text-white shadow-lg px-4">
			<div className="container text-xl font-serif">
				Project 2 - Leaders and their Visits
			</div>
		</header>
	)
}
function Footer() {
	return (
		<footer className="bg-[#3F0000] text-white mt-3 py-5 px-4">
			<div className="container text-center">
				&#127757; L. Celma, VeA, 2025
			</div>
		</footer>
	)
}

function Homepage({ handleVisitSelection }) {
	return (
		<>
			{topVisits.map((visit, index) => (
				<TopVisitView
					visit={visit}
					key={visit.id}
					index={index}
					handleVisitSelection={handleVisitSelection}
				/>
			))}
		</>
	)
}

function TopVisitView({ visit, index, handleVisitSelection }) {
	return (
		<div className="bg-neutral-100 rounded-lg mb-8 py-8 flex flex-wrap md:flex-row ">
			<div className={`order-2 px-12 md:basis-1/2 ${ index % 2 === 1 ? "md:order-1 md:text-right" : ""}`}>
				<p className="mb-4 text-3xl leading-8 font-light text-neutral-900">
					{visit.event_name}
				</p>
				<p className="mb-4 text-xl leading-7 font-light text-neutral-900 mb-4">
					{ visit.description ? visit.description.split(' ').slice(0, 16).join(' ') + '...' : '' }
				</p>
				<SeeMoreBtn visitID={visit.id} handleVisitSelection={handleVisitSelection} />
			</div>
			<div className={`order-1 md:basis-1/2 ${index % 2 === 1 ? "md:order-2" : ""}`}>
				<img
					src={ visit.image }
					alt={ visit.event_name }
					className="p-1 rounded-md border border-neutral-200 w-2/4 aspect-auto mx-auto" />
			</div>
		</div>
	)
}

function SeeMoreBtn({ visitID, handleVisitSelection }) {
	// const selectedVisit = topVisits.find(visit => visit.id === selectedVisitID); // Fetch the selected visit object
  
	//if (!selectedVisit) {
	//	return <p>Visit not found!</p>;
	//}
	
	return (
		<button
			className="inline-block rounded-full py-2 px-4 bg-sky-500 hover:bg-sky-400 text-sky-50 cursor-pointer"
				onClick={() => handleVisitSelection(visitID)}
		>See more</button>
	)
}

function VisitPage({ selectedVisitID, handleVisitSelection, handleGoingBack }) {
	return (
		<>
			<SelectedVisitView
				selectedVisitID={selectedVisitID}
				handleGoingBack={handleGoingBack}
			/>
			<RelatedVisitSection
				selectedVisitID={selectedVisitID}
				handleVisitSelection={handleVisitSelection}
			/>
		</>
	)
}

function SelectedVisitView({ selectedVisitID, handleGoingBack }) {
  return (
    <>
      <div className="rounded-lg flex flex-wrap md:flex-row">
        <div className="order-2 md:order-1 md:pt-12 md:basis-1/2">
          <h1 className="text-3xl leading-8 font-light text-neutral-900 mb-2">
            {selectedVisit.event_name}
          </h1>
          <p className="text-xl leading-7 font-light text-neutral-900 mb-2">
            {selectedVisit.leader}
          </p>
          <p className="text-xl leading-7 font-light text-neutral-900 mb-4">
            {selectedVisit.description}
          </p>
          <dl className="mb-4 md:flex md:flex-wrap md:flex-row">
            <dt className="font-bold md:basis-1/4">Start Date</dt>
            <dd className="mb-2 md:basis-3/4">{selectedVisit.start_date}</dd>
            <dt className="font-bold md:basis-1/4">End Date</dt>
            <dd className="mb-2 md:basis-3/4">{selectedVisit.end_date}</dd>
            <dt className="font-bold md:basis-1/4">Cost</dt>
            <dd className="mb-2 md:basis-3/4">€ {selectedVisit.cost}</dd>
            <dt className="font-bold md:basis-1/4">Transport</dt>
            <dd className="mb-2 md:basis-3/4">{selectedVisit.transport}</dd>
          </dl>
        </div>
        <div className="order-1 md:order-2 md:pt-12 md:px-12 md:basis-1/2">
          <img
            src={selectedVisit.image}
            alt={selectedVisit.event_name}
            className="p-1 rounded-md border border-neutral-200 mx-auto"
          />
        </div>
      </div>
      <div className="mb-12 flex flex-wrap">
        <GoBackBtn handleGoingBack={handleGoingBack} />
      </div>
    </>
  )
}
function GoBackBtn({ handleGoingBack }) {
	return (
		<button
			className="inline-block rounded-full py-2 px-4 bg-neutral-500 hover:bg-neutral-400 text-neutral-50 cursor-pointer"
			onClick={handleGoingBack}
		>Back</button>
	)
}

function RelatedVisitSection({ selectedVisitID, handleVisitSelection }) {
	return (
		<>
			<div className="flex flex-wrap">
				<h2 className="text-3xl leading-8 font-light text-neutral-900 mb-4">
					Similar visits
				</h2>
			</div>
			<div className="flex flex-wrap md:flex-row md:space-x-4 md:flex-nowrap">
				{relatedVisits.map( visit => (
					<RelatedVisitView
						visit={visit}
						key={visit.id}
						handleVisitSelection={handleVisitSelection}
					/>
				))}
			</div>
		</>
	)
}

function RelatedVisitView({ visit, handleVisitSelection }) {
	return (
		<div className="rounded-lg mb-4 md:basis-1/3">
			<img
				src={ visit.image }
				alt={ visit.event_name }
				className="md:h-[400px] md:mx-auto max-md:w-2/4 max-md:mx-auto" />
			<div className="p-4">
				<h3 className="text-xl leading-7 font-light text-neutral-900 mb-4">
					{ visit.event_name }
				</h3>
				<SeeMoreBtn
					visitID={visit.id}
					handleVisitSelection={handleVisitSelection}
				/>
			</div>
		</div>
	)
}


