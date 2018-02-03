<?php
class grid_t_grupos_calif_m_jj_vaios_doce_lookup
{
//  
   function lookup_t_grupos_id_director_grupo(&$conteudo , $t_grupos_id_director_grupo) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $t_grupos_id_director_grupo; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($t_grupos_id_director_grupo) === "" || trim($t_grupos_id_director_grupo) == "&nbsp;" || trim($t_grupos_id_director_grupo) === "" || trim($t_grupos_id_director_grupo) == "&nbsp;" || trim($t_grupos_id_director_grupo) === "" || trim($t_grupos_id_director_grupo) == "&nbsp;" || trim($t_grupos_id_director_grupo) === "" || trim($t_grupos_id_director_grupo) == "&nbsp;" || trim($t_grupos_id_director_grupo) === "" || trim($t_grupos_id_director_grupo) == "&nbsp;" || trim($t_grupos_id_director_grupo) === "" || trim($t_grupos_id_director_grupo) == "&nbsp;" || trim($t_grupos_id_director_grupo) === "" || trim($t_grupos_id_director_grupo) == "&nbsp;" || trim($t_grupos_id_director_grupo) === "" || trim($t_grupos_id_director_grupo) == "&nbsp;" || trim($t_grupos_id_director_grupo) === "" || trim($t_grupos_id_director_grupo) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat_ws(' ',primer_nombre, segundo_nombre, primer_apellido, segundo_apellido)  FROM docentes where id_docente = $t_grupos_id_director_grupo order by primer_nombre, segundo_nombre, primer_apellido, segundo_apellido" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT ' '||primer_nombre||segundo_nombre||primer_apellido||segundo_apellido  FROM docentes where id_docente = $t_grupos_id_director_grupo order by primer_nombre, segundo_nombre, primer_apellido, segundo_apellido" ; 
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
//  
   function lookup_t_grupos_jornada(&$conteudo , $t_grupos_jornada) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $t_grupos_jornada; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      $nm_comando = "select jornada from jornadas where id_jornada = '$t_grupos_jornada' order by jornada" ; 
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
   function lookup_grupo_x_asig_x_doce_id_asignatura(&$conteudo , $grupo_x_asig_x_doce_id_asignatura) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $grupo_x_asig_x_doce_id_asignatura; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($grupo_x_asig_x_doce_id_asignatura) === "" || trim($grupo_x_asig_x_doce_id_asignatura) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      $nm_comando = "select asignatura from t_asignaturas where id_asignatura = $grupo_x_asig_x_doce_id_asignatura order by asignatura" ; 
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
   function lookup_grupo_x_asig_x_doce_id_docente(&$conteudo , $grupo_x_asig_x_doce_id_docente) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $grupo_x_asig_x_doce_id_docente; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($grupo_x_asig_x_doce_id_docente) === "" || trim($grupo_x_asig_x_doce_id_docente) == "&nbsp;" || trim($grupo_x_asig_x_doce_id_docente) === "" || trim($grupo_x_asig_x_doce_id_docente) == "&nbsp;" || trim($grupo_x_asig_x_doce_id_docente) === "" || trim($grupo_x_asig_x_doce_id_docente) == "&nbsp;" || trim($grupo_x_asig_x_doce_id_docente) === "" || trim($grupo_x_asig_x_doce_id_docente) == "&nbsp;" || trim($grupo_x_asig_x_doce_id_docente) === "" || trim($grupo_x_asig_x_doce_id_docente) == "&nbsp;" || trim($grupo_x_asig_x_doce_id_docente) === "" || trim($grupo_x_asig_x_doce_id_docente) == "&nbsp;" || trim($grupo_x_asig_x_doce_id_docente) === "" || trim($grupo_x_asig_x_doce_id_docente) == "&nbsp;" || trim($grupo_x_asig_x_doce_id_docente) === "" || trim($grupo_x_asig_x_doce_id_docente) == "&nbsp;" || trim($grupo_x_asig_x_doce_id_docente) === "" || trim($grupo_x_asig_x_doce_id_docente) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat_ws(' ',primer_nombre, segundo_nombre, primer_apellido, segundo_apellido)  FROM docentes where id_docente = $grupo_x_asig_x_doce_id_docente order by primer_nombre, segundo_nombre, primer_apellido, segundo_apellido" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT ' '||primer_nombre||segundo_nombre||primer_apellido||segundo_apellido  FROM docentes where id_docente = $grupo_x_asig_x_doce_id_docente order by primer_nombre, segundo_nombre, primer_apellido, segundo_apellido" ; 
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
//  
   function lookup_t_grupos_id_sede(&$conteudo , $t_grupos_id_sede) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $t_grupos_id_sede; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($t_grupos_id_sede) === "" || trim($t_grupos_id_sede) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      $nm_comando = "select sede from sedes where id_sede = $t_grupos_id_sede order by sede" ; 
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
