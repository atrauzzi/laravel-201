<!doctype html>
<html>

	<head>
		<title>
			@section('title')
			Laravel 201
			@show
		</title>
	</head>

	<body>

		<div id="header">

			<h1><a href="/">Laravel 201</a></h1>

			<ul class="menu">
				<li>
					<a href="{{ URL::route('image.create') }}">Submit One</a>
				</li>
				<li>
					<a href="{{ URL::route('image.batch_create') }}">Submit Multiple</a>
				</li>
			</ul>

		</div>

		<div id="content">
			@yield('content')
		</div>

		<a href="https://github.com/atrauzzi/laravel-201">
			<img
				style="position: absolute; top: 0; right: 0; border: 0;"
				src="https://camo.githubusercontent.com/38ef81f8aca64bb9a64448d0d70f1308ef5341ab/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f6461726b626c75655f3132313632312e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png"
			>
		</a>

	</body>

</html>