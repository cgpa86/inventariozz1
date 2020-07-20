<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ZazuShowroom</title>
<link rel="stylesheet" type="text/css" href="hoja.css">
</head>

<body>

<h1>ACTUALIZAR PRODUCTO</h1>

<?php
  

  include("conexion.php");
if(!isset ($_POST["bot_actualizar"])){



  $Id=$_GET["id"];
  $Cat=$_GET["cat"];
  $Desc=$_GET["desc"];
  $Marca=$_GET["marca"];
  $Cant=$_GET["cant"];
  $Talla=$_GET["talla"];
  $Color=$_GET["color"];
  $Precio=$_GET["precio"];
  $Ext=$_GET["ext"];
  $Pinsta=$_GET["pinsta"];
  $Pwww=$_GET["pwww"];
  $Edoprod=$_GET["edoprod"];
  $Cal=$_GET["cal"];

  }else{

    $Id=$_POST["id"];
    $Cat=$_POST["cat"];
  $Desc=$_POST["desc"];
  $Marca=$_POST["marca"];
  $Cant=$_POST["cant"];
  $Talla=$_POST["talla"];
  $Color=$_POST["color"];
  $Precio=$_POST["precio"];
  $Ext=$_POST["ext"];
  $Pinsta=$_POST["pinsta"];
  $Pwww=$_POST["pwww"];
  $Edoprod=$_POST["edoprod"];
  $Cal=$_POST["cal"];

  $sql = "UPDATE PRODUCTOS SET CATEGORIA=:uCat, DESCRIPCION=:uDesc, MARCA=:uMarca, CANTIDAD=:uCantidad, TALLA=:uCant, COLOR=:uColor, PRECIO=:uPrecio, EXTENSIONES=:uExt, PUBLICADO_EN_INSTA=:uPinsta, PUBLICADO_EN_WWW=:uPwww, ESTADO_DEL_PRODUCTO=:uEdoprod, CALIDAD=:ucal WHERE ID =:uId";

  }
  echo("Registro insertado exitosamente");

?>


<p>
 
</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <table width="25%" border="0" align="center">
    <tr>
      <td></td>
      <td><label for="id"></label>
      <input type="hidden" name="id" id="id" value="<?php echo $Id ?>"></td>
    </tr>
    <tr>
      <td>Categoria</td>
      <td><label for="categoria"></label>
      <input type="text" name="cat" id="cat" value="<? echo $Cat ?>"></td>
    </tr>
    <tr>
      <td>Decripcion</td>
      <td><label for="descripcion"></label>
      <input type="text" name="desc" id="desc" value="<? echo $Desc ?>"></td>
    </tr>
    <tr>
      <td>Marca</td>
      <td><label for="marca"></label>
      <input type="text" name="marca" id="marca" value="<? echo $Marca ?>"></td>
    </tr>
    <tr>
      <td>Cantidad</td>
      <td><label for="cantidad"></label>
      <input type="text" name="cant" id="cant" value="<? echo $Cant ?>"></td>
    </tr>
    <tr>
      <td>Talla</td>
      <td><label for="talla"></label>
      <input type="text" name="talla" id="talla" value="<? echo $Talla ?>"></td>
    </tr>
    <tr>
      <td>Color</td>
      <td><label for="color"></label>
      <input type="text" name="color" id="color" value="<? echo $Color ?>"></td>
    </tr>
    <tr>
      <td>Precio</td>
      <td><label for="precio"></label>
      <input type="text" name="precio" id="precio" value="<? echo $Precio ?>"></td>
    </tr>
    <tr>
      <td>Extensiones</td>
      <td><label for="extensiones"></label>
      <input type="text" name="ext" id="ext" value="<? echo $Ext ?>"></td>
    </tr>
    <tr>
      <td>en Insta</td>
      <td><label for="pub_insta"></label>
      <input type="text" name="pinsta" id="pinsta" value="<? echo $Pinsta ?>"></td>
    </tr>
    <tr>
      <td>en WWW</td>
      <td><label for="pub_www"></label>
      <input type="text" name="pwww" id="pwww" value="<? echo $Pwww ?>"></td>
    </tr>
    <tr>
      <td>Estado del Producto</td>
      <td><label for="edo_prod"></label>
      <input type="text" name="edoprod" id="edoprod" value="<? echo $Edoprod ?>"></td>
    </tr>
    <tr>
      <td>Calidad</td>
      <td><label for="edo_prod"></label>
      <input type="text" name="cal" id="cal" value="<? echo $Cal ?>"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>