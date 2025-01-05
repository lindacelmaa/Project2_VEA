<!doctype html>
<html lang="en">
 
	<head>
		<meta charset="utf-8">
		<title>Project 2 - {{ $title }}</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
	rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
	crossorigin="anonymous">
		<style>
			.bg-primary {
				background-color: #5B0000 !important;
			}
			.text-bg-dark {
				background-color: #3F0000 !important;
			}
		</style>
	</head>
	<body>
		<nav class="navbar bg-primary mb-3" data-bs-theme="dark">
			<header class="container">
				<a class="navbar-brand" href="#">Project 2 - {{ $title }}</a>
			</header>
		</nav>
		<main class="container">
			<div class="row">
				<div class="col">
					@yield('content')
				</div>
			</div>
		</main>
		<footer class="text-bg-dark mt-3">
			<div class="container">
				<div class="row py-5">
					<div class="col">
						&#127757; L. Celma, 2025
					</div>
				</div>
			</div>
		</footer>
	</body>
</html>
