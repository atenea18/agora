<!DOCTYPE html>
<html>
<head>
	<title>Agora | Docente | Asginaturas </title>
	<link href="form_joe/web/css/bootstrap.css" rel="stylesheet" type="text/css">
   	<link href="form_joe/web/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="form_joe/web/css/style.css" rel="stylesheet" type="text/css">
	<script src="https://use.fontawesome.com/08b028b3f7.js"></script>
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
         <a class="navbar-brand" href="#"><span>Agora</span></a>
      </div>
      <div class="collapse navbar-collapse" id="navbar-ex-collapse">
         <ul class="nav navbar-nav navbar-right">
            <li><a><?php echo $docente['primer_nombre']." ".$docente['primer_apellido']?></a></li>
         </ul>
      </div>
   </div>
</div>
<div class="container">
   <h4>Asignaturas </h4>
   <div class="row">
      <table class="table" id="tabla">
         <thead>
            <tr>
               <th>N°</th>
               <th>Asignatura</th>
               <th>Grupo</th>
               <th>Evaluar Periodos</th>
            </tr>
         </thead>
         <tbody>
            <?php

               foreach($asignaturas  as $key => $asignatura){
               echo "<tr>
                        <td>".$key."</td>
                        <td>".utf8_encode($asignatura['asignatura'])."</td>
                        <td>".utf8_encode($asignatura['nombre_grupo'])."</td>
                        <td><a class='btn btn-primary' href='/docente/evaluarPeriodo/".$asignatura['id_asignatura']."/".$asignatura['id_grupo']."'>Evaluar Periodo</a></td>
                     </tr>";
               }
            ?>
         </tbody>
      </table>
   </div>
</div>

   <script src="/web/js/jquery-1.12.4.js"></script>
   <script src="/web/js/jquery.dataTables.min.js"></script>
   <script src="/web/js/dataTables.bootstrap.min.js"></script>
   
   <script type="text/javascript">
      $('#tabla').dataTable( {
        // "searching": false,
        "lengthChange": false
      } );
   </script>
</body>
</html>