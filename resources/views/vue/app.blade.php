<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>App | VUE</title>
	<link rel="stylesheet" href="../resources/css/bootstrap.css">
	<link rel="stylesheet" href="../resources/css/toastr.css">
	<link rel="stylesheet" href="../resources/css/font-awesome.css">
	{{-- <link rel="stylesheet" href="{{asset('css/app.php')}}"> --}}
	<style>
		.fa-handshake-o {
			color:red;
			font-size: 1.5em;
		}
	</style>
</head>
<body>
	<div id="main" class="container-fluid">
		
		<div class="row">
			@yield('content')
        </div>   
	</div>
	<script src="../resources/js/jquery-3.5.1.js"></script>
	<script src="../resources/js/popper.js"></script>
	<script src="../resources/js/bootstrap.js"></script>
	<script src="../resources/js/toastr.js"></script>
	<script src="../resources/js/axios.js"></script>
	<script src="../resources/js/vue.js"></script>
	<script src="../resources/js/appvue.js"></script>
	<script src="../resources/js/font-awesome.js"></script>
	<script src="../resources/js/sweetalert.js"></script>

	{{-- <script src="{{asset('js/app2.js')}}"></script> --}}

</body>
</html>