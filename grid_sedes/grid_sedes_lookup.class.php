<?php
class grid_sedes_lookup
{
//  
   function lookup_coordinador_manana(&$conteudo , $coordinador_manana) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $coordinador_manana; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($coordinador_manana) === "" || trim($coordinador_manana) == "&nbsp;" || trim($coordinador_manana) === "" || trim($coordinador_manana) == "&nbsp;" || trim($coordinador_manana) === "" || trim($coordinador_manana) == "&nbsp;" || trim($coordinador_manana) === "" || trim($coordinador_manana) == "&nbsp;" || trim($coordinador_manana) === "" || trim($coordinador_manana) == "&nbsp;" || trim($coordinador_manana) === "" || trim($coordinador_manana) == "&nbsp;" || trim($coordinador_manana) === "" || trim($coordinador_manana) == "&nbsp;" || trim($coordinador_manana) === "" || trim($coordinador_manana) == "&nbsp;" || trim($coordinador_manana) === "" || trim($coordinador_manana) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(primer_apellido,' ', segundo_apellido,' ', primer_nombre,' ', segundo_nombre)  FROM docentes where id_docente = $coordinador_manana order by primer_apellido, segundo_apellido, primer_nombre, segundo_nombre" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT primer_apellido||' '||segundo_apellido||' '||primer_nombre||' '||segundo_nombre  FROM docentes where id_docente = $coordinador_manana order by primer_apellido, segundo_apellido, primer_nombre, segundo_nombre" ; 
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
   function lookup_coordinador_tarde(&$conteudo , $coordinador_tarde) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $coordinador_tarde; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($coordinador_tarde) === "" || trim($coordinador_tarde) == "&nbsp;" || trim($coordinador_tarde) === "" || trim($coordinador_tarde) == "&nbsp;" || trim($coordinador_tarde) === "" || trim($coordinador_tarde) == "&nbsp;" || trim($coordinador_tarde) === "" || trim($coordinador_tarde) == "&nbsp;" || trim($coordinador_tarde) === "" || trim($coordinador_tarde) == "&nbsp;" || trim($coordinador_tarde) === "" || trim($coordinador_tarde) == "&nbsp;" || trim($coordinador_tarde) === "" || trim($coordinador_tarde) == "&nbsp;" || trim($coordinador_tarde) === "" || trim($coordinador_tarde) == "&nbsp;" || trim($coordinador_tarde) === "" || trim($coordinador_tarde) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(primer_apellido,' ', segundo_apellido,' ', primer_nombre,' ', segundo_nombre)  FROM docentes where id_docente = $coordinador_tarde order by primer_apellido, segundo_apellido, primer_nombre, segundo_nombre" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT primer_apellido||' '||segundo_apellido||' '||primer_nombre||' '||segundo_nombre  FROM docentes where id_docente = $coordinador_tarde order by primer_apellido, segundo_apellido, primer_nombre, segundo_nombre" ; 
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
   function lookup_coordinador_nocturno(&$conteudo , $coordinador_nocturno) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $coordinador_nocturno; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($coordinador_nocturno) === "" || trim($coordinador_nocturno) == "&nbsp;" || trim($coordinador_nocturno) === "" || trim($coordinador_nocturno) == "&nbsp;" || trim($coordinador_nocturno) === "" || trim($coordinador_nocturno) == "&nbsp;" || trim($coordinador_nocturno) === "" || trim($coordinador_nocturno) == "&nbsp;" || trim($coordinador_nocturno) === "" || trim($coordinador_nocturno) == "&nbsp;" || trim($coordinador_nocturno) === "" || trim($coordinador_nocturno) == "&nbsp;" || trim($coordinador_nocturno) === "" || trim($coordinador_nocturno) == "&nbsp;" || trim($coordinador_nocturno) === "" || trim($coordinador_nocturno) == "&nbsp;" || trim($coordinador_nocturno) === "" || trim($coordinador_nocturno) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(primer_apellido,' ', segundo_apellido,' ', primer_nombre,' ', segundo_nombre)  FROM docentes where id_docente = $coordinador_nocturno order by primer_apellido, segundo_apellido, primer_nombre, segundo_nombre" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT primer_apellido||' '||segundo_apellido||' '||primer_nombre||' '||segundo_nombre  FROM docentes where id_docente = $coordinador_nocturno order by primer_apellido, segundo_apellido, primer_nombre, segundo_nombre" ; 
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
   function lookup_coordinador_sabado(&$conteudo , $coordinador_sabado) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $coordinador_sabado; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($coordinador_sabado) === "" || trim($coordinador_sabado) == "&nbsp;" || trim($coordinador_sabado) === "" || trim($coordinador_sabado) == "&nbsp;" || trim($coordinador_sabado) === "" || trim($coordinador_sabado) == "&nbsp;" || trim($coordinador_sabado) === "" || trim($coordinador_sabado) == "&nbsp;" || trim($coordinador_sabado) === "" || trim($coordinador_sabado) == "&nbsp;" || trim($coordinador_sabado) === "" || trim($coordinador_sabado) == "&nbsp;" || trim($coordinador_sabado) === "" || trim($coordinador_sabado) == "&nbsp;" || trim($coordinador_sabado) === "" || trim($coordinador_sabado) == "&nbsp;" || trim($coordinador_sabado) === "" || trim($coordinador_sabado) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(primer_apellido,' ', segundo_apellido,' ', primer_nombre,' ', segundo_nombre)  FROM docentes where id_docente = $coordinador_sabado order by primer_apellido, segundo_apellido, primer_nombre, segundo_nombre" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT primer_apellido||' '||segundo_apellido||' '||primer_nombre||' '||segundo_nombre  FROM docentes where id_docente = $coordinador_sabado order by primer_apellido, segundo_apellido, primer_nombre, segundo_nombre" ; 
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
