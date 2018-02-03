<?php
class grid_laboratorio_lookup
{
//  
   function lookup_students_genero(&$students_genero) 
   {
      $conteudo = "" ; 
      if ($students_genero == "F")
      { 
          $conteudo = "Femenino";
      } 
      if ($students_genero == "M")
      { 
          $conteudo = "Masculino";
      } 
      if (!empty($conteudo)) 
      { 
          $students_genero = $conteudo; 
      } 
   }  
}
?>
