<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Integrar Librerias Frontend</title>
{{-- 	<link rel="stylesheet" href="resources/css/bootstrap.css">
	<link rel="stylesheet" href="resources/css/toastr.css">
    <script src="resources/js/jquery-3.5.0.js"></script> --}}
    {{-- <script src="../resources/js/bootstrap.js"></script>
    <script src="../resources/js/toastr.js"></script>
    <script src="../resources/js/vue.js"></script>
    <script src="../resources/js/axios.js"></script> --}}
    <script src="{{asset('js/app.js')}}"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</head>
<body>
	<div id="app-2" class="container-fluid">
		<h1 id="intro" class="bg-primary">Hola</h1>
		<input type="text" v-model="name">
		<button id="hide">Hide</button>
	</div>

</body>
<script>
	
		$(document).ready(function(){
        $("h1").click(function(){
        toastr.info('toastr');
        });
        });
	
</script>
</html>

