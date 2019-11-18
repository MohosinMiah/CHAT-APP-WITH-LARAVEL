<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/vue-chat-scroll/dist/vue-chat-scroll.min.js"></script>

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
				<li class="list-group-item active">CHAT BOX </li>
				<p>@{{ type }}</p>
                <ul class="list-group" v-chat-scroll>
                        <li class="list-group-item" ></li>
                         <message
				  v-for="value,index in chat.messages"
				 :key=value.index  
			      :color= chat.color[index]
				  :user = chat.user[index]
				  :time = chat.time[index]   
				  :type = type
				  >
				 @{{ value }}
				 
				  </message>
                </ul>
                <input type="text" class="form-control" placeholder="Type your message here..." v-model='message' @keyup.enter='send'>
			</div>
		</div>
	</div>

	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html> 