<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes" />

		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
		<link rel="stylesheet" type="text/css" href="/assets/css/fonts.css" />
		<link rel="stylesheet" type="text/css" href="/assets/css/style.css" />

		<title>Apps</title>
	</head>
	<body>
		<div class="content">
			<div class="padding">
				<div class="container">
					<!-- Heading -->
					<div class="row">
						<div class="col">
							<h1 class="header">Apps</h1>
							<hr/>
						</div>
					</div>

					<!-- New Games -->
					<div class="scroller">
						<div class="row">
							@foreach ($featured as $app)
								<div class="col row-padding ">
									<a href="itms-services://?action=download-manifest&url={{ route('app.download', ['app' => $app])}}" data-transition="slide-in">
										<div class="new">FEATURED</div><br>
										<span class="slide-text game-title">{{ $app->name }}</span>
										<br>
										<img class="slider-img" style="max-width: 250px; max-height: 150px; min-width: 250px; min-height: 150px;" src="{{ $app->getBannerUrl() }}" />
									</a>
								</div>
							@endforeach
						</div>

						<hr/>
					</div>

					<!-- This Week's Favourites -->
					<div class="container-fluid">
						<div class="row d-flex justify-content-between nowrap">
							<div class="col-xs-12">
								<div class="float-left">
									<h4 class="header-sm">This Week's Favourites</h4>
								</div>
							</div>
						</div>

						@foreach ($featured as $app)
							<div class="row d-flex justify-content-between nowrap">
								<div class="col-xs-2 padding-left-none">
									<a href="itms-services://?action=download-manifest&url={{ route('app.download', ['app' => $app])}}" data-transition="slide-in">
										<img class="app-image" style="max-width: 50px; max-height: 50px; min-width: 50px; min-height: 50px;" src="{{ $app->getImageUrl() }}" />
										<div class="d-inline-block">
											<div class="stack">
												{{ $app->name }}
											</div>
											<div class="stack text-sm">
												{{ $app->description }}
											</div>
										</div>
									</a>
								</div>
								<div class="col-xs-4 col-lg-offset-10">
									<a href="itms-services://?action=download-manifest&url={{ route('app.download', ['app' => $app])}}" class="btn btn-sm get-btn">Get</a>
								</div>
							</div>
						@endforeach
					</div>

					<hr/>

					<!-- New Apps We Love -->
					<div class="container-fluid">
						<div class="row d-flex justify-content-between nowrap">
							<div class="col-xs-12">
								<div class="float-left">
									<h4 class="header-sm">New Apps We Love</h4>
								</div>
							</div>
						</div>

						@foreach ($newest as $app)
							<div class="row d-flex justify-content-between nowrap">
								<div class="col-xs-2 padding-left-none">
									<a href="appview.html" data-transition="slide-in">
										<img class="app-image" src="{{ $app->getImageUrl() }}" />
										<div class="d-inline-block">
											<div class="stack">
												{{ $app->name }}
											</div>
											<div class="stack text-sm">
												{{ $app->description }}
											</div>
										</div>
									</a>
								</div>
								<div class="col-xs-4 col-lg-offset-10">
									<a href="itms-services://?action=download-manifest&url={{ route('app.download', ['app' => $app])}}" class="btn btn-sm get-btn">Get</a>
								</div>
							</div>
						@endforeach
					</div>

					<hr/>

					<!-- Popular Apps To Try -->
					<div class="container-fluid">
						<div class="row d-flex justify-content-between nowrap">
							<div class="col-xs-12">
								<div class="float-left">
									<h4 class="header-sm">Popular</h4>
								</div>
							</div>
						</div>

						@foreach ($popular as $app)
							<div class="row d-flex justify-content-between nowrap">
								<div class="col-xs-2 padding-left-none">
									<a href="appview.html" data-transition="slide-in">
										<img class="app-image" src="{{ $app->getImageUrl() }}" />
										<div class="d-inline-block">
											<div class="stack">
												{{ $app->name }}
											</div>
											<div class="stack text-sm">
												{{ $app->description }}
											</div>
										</div>
									</a>
								</div>
								<div class="col-xs-4 col-lg-offset-10">
									<a href="itms-services://?action=download-manifest&url={{ route('app.download', ['app' => $app])}}" class="btn btn-sm get-btn">Get</a>
								</div>
							</div>
						@endforeach
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
			<a class="tab-item active" href="/apps">
				<span class="icon"><img src="/assets/img/apps-highlighted.png" /></span>
				<span class="tab-label">Apps</span>
			</a>
			<a class="tab-item" href="#">
				<span class="icon"><img src="/assets/img/update.png" /></span>
				<span class="tab-label">Updates</span>
			</a>
			<a class="tab-item" href="/apps/search">
				<span class="icon"><img src="/assets/img/search.png" /></span>
				<span class="tab-label">Search</span>
			</a>
		</nav>

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
</html>