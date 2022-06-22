<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ruleta activa</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<div>Prueba de ruleta</div>
	<canvas id='ruleta' width="400" height="400"></canvas>
</body>
<script>
	var canvas = document.getElementById('ruleta');
	var ctx = canvas.getContext('2d');
	ctx.fillStyle = '#ff0000';
	//Rectangulo
	ctx.fillRect(0,0,400,400);
	drawcircule();
	//Linea
	ctx.moveTo(0,0);
	ctx.lineTo(200, 200);
    ctx.stroke();
    //Linea 12
	ctx.moveTo(200,200);
	ctx.lineTo(200,0);
    ctx.stroke();
    //Linea 3
	ctx.moveTo(200,200);
	ctx.lineTo(400,200);
    ctx.stroke();
    //Linea 6
	ctx.moveTo(200,200);
	ctx.lineTo(200,400);
    ctx.stroke();
    //Linea 9
	ctx.moveTo(200,200);
	ctx.lineTo(0,200);
    ctx.stroke();
    //Circulo
    //ctx.rotate(10);
    
    //Texto
    ctx.font = "30px Arial";
    ctx.strokeText("Hello World", 10, 50);
    
    function drawcircule(){
    ctx.arc(200,200,200,0,2*Math.PI);
    ctx.fillStyle = "white";
    ctx.fill();
	}
	
</script>
</html>