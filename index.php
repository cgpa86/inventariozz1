<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Zazushowroom</title>
<link rel="stylesheet" type="text/css" href="hoja.css">


</head>

<body>

<?php

  include("conexion.php");
  
  //variables agregadas para la paginacion//
  $tamano_pagina=10; 

  if(isset($_GET["pagina"])){

      if($_GET["pagina"]==1){

        header("Location:index.php");

        }else{

        $pagina=$_GET["pagina"];
    }

  }else{ 

    $pagina=1;
  }

    $empezar_desde = ($pagina-1)*$tamano_pagina;

    $sql_total="Select * from PRODUCTOS";

    $resultado=$base->prepare($sql_total);

    $resultado->execute(array());

    $num_filas=$resultado->rowCount();

    $total_paginas=ceil($num_filas/$tamano_pagina);
    //----------------------------------------------------------//

     //array de objetos producto
$registros= $base->query("select * from PRODUCTOS LIMIT $empezar_desde, $tamano_pagina")->fetchAll(PDO::FETCH_OBJ);


if(isset($_POST["cr"])){

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

  $sql = "INSERT INTO PRODUCTOS (CATEGORIA, DESCRIPCION, MARCA, CANTIDAD, TALLA, COLOR, PRECIO, EXTENSIONES, PUBLICADO_EN_INSTA, PUBLICADO_EN_WWW,ESTADO_DEL_PRODUCTO, CALIDAD) VALUES (:cat, :des, :marca, :cant, :talla, :color, :precio, :ext, :pinsta, :pwww, :edoprod, :cal)";

    $resultado=$base->prepare($sql);

    $resultado->excecute(array(":cat"=>$Cat, ":des"=>$Desc, "marca"=>$Marca, ":cant"=>$Cant, ":talla"=>$Talla,":color"=>$Color,":precio"=>$Precio,":ext"=>$Ext, ":pinsta"=>$Pinsta, ":pwww"=>$Pwww, ":edoprod"=>$Edoprod, ":cal"=>$Cal));
        
        header("Location:index.php");

}

?>

<h1>ZAZUSHOWROOM<span class="subtitulo">Inventario de Productos</span></h1>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
  <table width="50%" border="0" align="center">
    <tr >
      <td class="primera_fila">ID</td>
      <td class="primera_fila">CATEGORIA</td>
      <td class="primera_fila">DESCRIPCION</td>
      <td class="primera_fila">MARCA</td>
      <td class="primera_fila">CANTIDAD</td>
      <td class="primera_fila">TALLA</td>
      <td class="primera_fila">COLOR</td>
      <td class="primera_fila">PRECIO</td>
      <td class="primera_fila">EXTENSIONES</td>
      <td class="primera_fila">PUBLICADO_EN_INSTA</td>
      <td class="primera_fila">PUBLICADO_EN_WWW</td>
      <td class="primera_fila">ESTADO_DEL_PRODUCTO</td>
      <td class="primera_fila">CALIDAD</td>

      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
    </tr> 
   
		

    <?php
        foreach($registros as $producto):?>

   	<tr>
      <td> <?php echo $producto->ID?> </td>
        <td><?php echo $producto->CATEGORIA?> </td>
          <td><?php echo $producto->DESCRIPCION?> </td>
            <td><?php echo $producto->MARCA?> </td>
              <td><?php echo $producto->CANTIDAD?> </td>
                <td><?php echo $producto->TALLA?> </td>
                 <td><?php echo $producto->COLOR?> </td>
                <td><?php echo $producto->PRECIO?> </td>
              <td><?php echo $producto->EXTENSIONES?> </td>
            <td><?php echo $producto->PUBLICADO_EN_INSTA?> </td>
          <td><?php echo $producto->PUBLICADO_EN_WWW?> </td>
        <td><?php echo $producto->ESTADO_DEL_PRODUCTO?> </td>
        <td><?php echo $producto->CALIDAD?> </td>
 
      <td class="bot"><a href="borrar.php?Id=<?php echo $producto->ID?>">
        <input type='button' name='del' id='del' value='Borrar'></a></td>

      <td class='bot'><a href="editar.php?Id=<?php echo $producto->ID?> & cat=<?php echo $producto->CATEGORIA?> & desc=<?php echo $producto->DESCRIPCION?> & marca=<?php echo $producto->MARCA?>& cant=<?php echo $producto->CANTIDAD?> & talla=<?php echo $producto->TALLA?> & color=<?php echo $producto->COLOR?> & precio=<?php echo $producto->PRECIO?> & ext=<?php echo $producto->EXTENSIONES?> & pinsta=<?php echo $producto->PUBLICADO_EN_INSTA?> & pwww=<?php echo $producto->PUBLICADO_EN_WWW?> & edoprod=<?php echo $producto->ESTADO_DEL_PRODUCTO?>& cal=<?php echo $producto->CALIDAD?> "> <input type='button' name='up' id='up' value='Actualizar'></a></td>
    </tr>       


    <?php 

        endforeach;
    ?>  

	<tr>
	<td></td>
      <td><input type='text' name='cat' size='10' class='centrado'></td>
       <td><input type='text' name='desc' size='10' class='centrado'></td>
         <td><input type='text' name='marca' size='10' class='centrado'></td>
          <td><input type='text' name='cantidad' size='10' class='centrado'></td>
            <td><input type='text' name='talla' size='10' class='centrado'></td>
                  <td><input type='text' name='color' size='10' class='centrado'></td>
              <td><input type='text' name='precio' size='10' class='centrado'></td>
            <td><input type='text' name='ext' size='10' class='centrado'></td>
          <td><input type='text' name='pinsta' size='10' class='centrado'></td>
        <td><input type='text' name='pwww' size='10' class='centrado'></td>
      <td><input type='text' name='edoprod' size='10' class='centrado'></td>
    <td><input type='text' name='cal' size='10' class='centrado'></td>

      <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td></tr>    
      <tr>
        <td>
        
       <?php

        //informacion de paginacion 
              echo "Total de registros:" . $total_paginas . "<br>";
              echo "Se muestran". $tamano_pagina . "registros por página <br>";
              echo "Mostrando la página" . $pagina . "de" . $total_paginas . "<br>";
       

          //paginacion

          for($i=1; $i<=$total_paginas; $i++){

            echo "<a href=?pagina=" . $i . "</a>   ";
          }
         
        ?>
        </td>
      </tr>

  </table>
</form>
<p>&nbsp;</p>
</body>
</html>