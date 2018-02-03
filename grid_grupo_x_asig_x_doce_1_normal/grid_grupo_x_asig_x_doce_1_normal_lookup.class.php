<?php
class grid_grupo_x_asig_x_doce_1_normal_lookup
{
//  
   function lookup_novedades_x_estudiante_fecha_id_novedad(&$conteudo , $novedades_x_estudiante_fecha_id_novedad) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $novedades_x_estudiante_fecha_id_novedad; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      $nm_comando = "select novedad from novedades where id_novedad = '$novedades_x_estudiante_fecha_id_novedad' order by novedad" ; 
      $conteudo = "" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          if (isset($rx->fields[0]))  
          { 
              $conteudo = trim($rx->fields[0]); 
          } 
          $save_conteudo1 = $conteudo ; 
          $rx->Close(); 
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
      if ($conteudo === "") 
      { 
          $conteudo = "&nbsp;";
          $save_conteudo1 = $conteudo ; 
      } 
   }  
//  
   function lookup_t_estudiante_grupo_idstudent(&$conteudo , $t_estudiante_grupo_idstudent) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $t_estudiante_grupo_idstudent; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($t_estudiante_grupo_idstudent) === "" || trim($t_estudiante_grupo_idstudent) == "&nbsp;" || trim($t_estudiante_grupo_idstudent) === "" || trim($t_estudiante_grupo_idstudent) == "&nbsp;" || trim($t_estudiante_grupo_idstudent) === "" || trim($t_estudiante_grupo_idstudent) == "&nbsp;" || trim($t_estudiante_grupo_idstudent) === "" || trim($t_estudiante_grupo_idstudent) == "&nbsp;" || trim($t_estudiante_grupo_idstudent) === "" || trim($t_estudiante_grupo_idstudent) == "&nbsp;" || trim($t_estudiante_grupo_idstudent) === "" || trim($t_estudiante_grupo_idstudent) == "&nbsp;" || trim($t_estudiante_grupo_idstudent) === "" || trim($t_estudiante_grupo_idstudent) == "&nbsp;" || trim($t_estudiante_grupo_idstudent) === "" || trim($t_estudiante_grupo_idstudent) == "&nbsp;" || trim($t_estudiante_grupo_idstudent) === "" || trim($t_estudiante_grupo_idstudent) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat_ws(' ',primer_apellido, segundo_apellido, primer_nombre, segundo_nombre)  FROM students where idstudents = $t_estudiante_grupo_idstudent order by primer_apellido, segundo_apellido, primer_nombre, segundo_nombre" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT ' '||primer_apellido||segundo_apellido||primer_nombre||segundo_nombre  FROM students where idstudents = $t_estudiante_grupo_idstudent order by primer_apellido, segundo_apellido, primer_nombre, segundo_nombre" ; 
      } 
      $conteudo = "" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          if (isset($rx->fields[0]))  
          { 
              $conteudo = trim($rx->fields[0]); 
          } 
          $save_conteudo1 = $conteudo ; 
          $rx->Close(); 
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
      if ($conteudo === "") 
      { 
          $conteudo = "&nbsp;";
          $save_conteudo1 = $conteudo ; 
      } 
   }  
}
?>
