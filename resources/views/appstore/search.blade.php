<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes" />

		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
		<link rel="stylesheet" type="text/css" href="/assets/css/fonts.css" />
		<link rel="stylesheet" type="text/css" href="/assets/css/style.css" />

		<title>Search - App Store</title>
	</head>
	<body>
		<div class="content">
			<div class="padding">
				<div class="container">
					<!-- Heading -->
					<div class="row search-heading">
						<script>
							function searchInputChange() {
								$.ajax({
									method: 'post',
									headers: {
										'X-CSRF-TOKEN': '{{ csrf_token() }}'
									},
									data: {
										'search': $('.search-box').val()
									},
									url: '{{ url()->current() }}'
								}).done(function(data) {
									$('#search-results').empty();

									$.each(data, function(index, value) {
										$('#search-results').append('<div class="row d-flex justify-content-between nowrap"><div class="col-xs-2 padding-left-none"><a href="appview.html" data-transition="slide-in"><img class="app-image" src="' + value['image'] + '" /><div class="d-inline-block"><div class="stack">' + value['name'] + '</div><div class="stack text-sm">' + value['description'] + '</div></div></a></div><div class="col-xs-4 col-lg-offset-10"><a href="' + value['download_url'] + '" class="btn btn-sm get-btn">GET</a></div></div>');
									});
								});
							}
						</script>
						<div class="col">
							<h1 class="header">Search</h1>
							<input class="search-box" type="text" name="search" placeholder="Search" onchange="searchInputChange();" onkeydown="searchInputChange();" onkeyup="searchInputChange();" autocomplete="off"/>
						</div>
					</div>
					
					<!-- Results -->
					<div class="row search-results force-focus-within" id="search-results">

					</div>
				</div>
			</div>

			<div class="container mb-5"></div>
		</div>

		<nav class="bar bar-tab stack">
			<a class="tab-item" href="#">
				<span class="icon"><img src="/assets/img/today.png" /></span>
				<span class="tab-label">Today</span>
			</a>
			<a class="tab-item" href="#">
				<span class="icon"><img src="/assets/img/games.png" /></span>
				<span class="tab-label">Games</span>
			</a>
			<a class="tab-item" href="/apps">
				<span class="icon"><img src="/assets/img/apps-highlighted.png" /></span>
				<span class="tab-label">Apps</span>
			</a>
			<a class="tab-item" href="#">
				<span class="icon"><img src="/assets/img/update.png" /></span>
				<span class="tab-label">Updates</span>
			</a>
			<a class="tab-item active" href="/apps/search">
				<span class="icon"><img src="/assets/img/search.png" /></span>
				<span class="tab-label">Search</span>
			</a>
		</nav>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
</html>