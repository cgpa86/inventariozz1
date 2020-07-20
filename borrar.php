
<html>
<head>
<meta charset="utf-8">
<title>Zazushowroom</title>
<link rel="stylesheet" type="text/css" href="hoja.css">


</head>

<body>

<?php

		include("conexion.php");
		$id=$_GET("id");
		$base->query("DELETE FROM PRODUCTOS WHERE ID='$ID'");

		header("Location:index.php");


 ?>

</body>


</html>
