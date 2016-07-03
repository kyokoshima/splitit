<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Application Name - @yield('title')</title>
	{{ Html::style('css/app.css') }}
	{{ Html::script('js/jquery.min.js') }}
	{{ Html::script('js/bootstrap.min.js') }}
	</head>
<body>
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="active">
						<a href="./">Fixed Top</a>
					</li>
				</ul>
			</div>
			
			</div>
		</div>
	</nav>
	<div class="container-fluid">
		@section('sidebar')
		@show
		@yield('content')
	</div>
</body>
</html>
