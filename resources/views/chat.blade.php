<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<style>
		.list-group{
			overflow-y: scroll;
			height: 200px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row" id="app">
			<div class="offset-4 col-4 offset-sm-1 col-sm-10">
                <ul class="list-group">
                    <li class="list-group-item active">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Morbi leo risus</li>
                    <li class="list-group-item">Porta ac consectetur ac</li>
                    <li class="list-group-item">Vestibulum at eros</li>
				  <input type="text" class="form-control" placeholder="Type your message here..." v-model='message' @keyup.enter='send'>
			</div>
		</div>
	</div>

	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html> 