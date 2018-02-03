<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="<?php echo URL?>Web/css/bootstrap.css" rel="stylesheet" type="text/css">
   	<!-- <link href="<?php echo URL?>Web/css/style.css" rel="stylesheet" type="text/css"> -->
</head>
<body>
<div class="navbar navbar-default">
  <div class="container">
      <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="#"><span>Brand</span></a>
      </div>
      <div class="collapse navbar-collapse" id="navbar-ex-collapse">
         <ul class="nav navbar-nav navbar-right">
            
         </ul>
      </div>
   </div>
</div>
<div class="container">
   <h2>Asignaturas   </h2>
   <div class="row">
      <table class="table">
         <thead>
            <tr>
               <th>Asignatura</th>
               <th>Evaluar Periodos</th>
               <th>opcion 2</th>
               <th>opcion 3</th>
            </tr>
         </thead>
         <tbody>
            <?php

               foreach($datos  as $asignatura){
               echo "<tr>
                        <td>".utf8_encode($asignatura['asignatura'])."</td>
                        <td><a class='btn btn-primary' href='asignatura/evaluarPeriodo/".$asignatura['id_asignatura']."/".$asignatura['id_grupo']."'>Evaluar Periodo</a></td>
                        <td><a class='btn btn-primary'>Opcion 2</a></td>
                        <td><a class='btn btn-primary'>Opcion 3</a></td>
                     </tr>";
               }
            ?>
         </tbody>
      </table>
   </div>
</div>
</body>
</html>