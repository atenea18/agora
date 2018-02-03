<?php
class grid_students_boletines_term_lookup
{
//  
   function lookup_dir_grupo(&$conteudo , $students_idstudents, &$nm_array_retorno_lookup) 
   {
      $nm_array_retorno_lookup = array();
      $conteudo = "";
      $nm_comando = "SELECT
CONCAT_WS(' ',docentes.primer_nombre,
docentes.segundo_nombre,
docentes.primer_apellido,
docentes.segundo_apellido)
FROM
t_estudiante_grupo
INNER JOIN t_grupos ON t_grupos.id_grupo = t_estudiante_grupo.id_grupo
INNER JOIN docentes ON docentes.id_docente = t_grupos.id_director_grupo
WHERE
t_estudiante_grupo.idstudent = '$students_idstudents'" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          $y = 0; 
          $a = 0; 
          $x = 0; 
          $nm_tmp_campos_select = explode(",", "CONCAT_WS(' ',docentes.primer_nombre,
docentes.segundo_nombre,
docentes.primer_apellido,
docentes.segundo_apellido)"); 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 if ($y == 1)
                 { 
                     $conteudo .= "<br>";
                     $y = 0; 
                     $x = 0; 
                 } 
                 $y++; 
                 if ($x != 0)
                 { 
                     $conteudo .= "";
                 } 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $nm_array_retorno_lookup[$a] [trim($nm_tmp_campos_select[$x])] = trim($rx->fields[$x]);
                        $nm_array_retorno_lookup[$a] [$x]= trim($rx->fields[$x]);
                        if ($x != 0)
                        { 
                            $conteudo .= "&nbsp;";
                        } 
                        $conteudo .= trim($rx->fields[$x]);
                 }
                 $a++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
   } 
}
?>
