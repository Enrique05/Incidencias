<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>EAMC | Barajas Pixel</title>
	<link rel="stylesheet" href="{{asset('css/app.css') }}">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
     <style>
 /*  #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
 #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
 #sortable li span { position: absolute; margin-left: -1.3em; } */

  #sortable { list-style-type: none; margin: 0; padding: 0; width: 100%; }
  #sortable li { margin: 3px 3px 3px 0; padding: 1px; float: left; width: 15%; height: 50%; font-size: 4em; text-align: center;  }
 
  </style>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  } );
  </script>
</head>
<body>
	<div class="content">
		<div class="row">
			<div class="col-12">	
				<div class="card">
					<div class="card-header bg-danger text-center" style="color:white; font-size: 2em;">
						Tarjetas Pixel - Enrique Arturo Martinez Cancino
					</div>
					<div class="card-body">
						<div class="row justify">
							
						<ul id="sortable">
						@for($i=1;$i<8;$i++)
						<li class="ui-state-default">
							<img src="{{asset('img/B'.$i.'.png')}}" class="card-img-top" alt="...">

						</li>
						
						@endfor
					    </ul>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
</body>
</html>