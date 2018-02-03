<?php
class grid_students_lookup
{
//  
   function lookup_idstudents(&$conteudo , $idstudents) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $idstudents; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($idstudents) === "" || trim($idstudents) == "&nbsp;" || trim($idstudents) === "" || trim($idstudents) == "&nbsp;" || trim($idstudents) === "" || trim($idstudents) == "&nbsp;" || trim($idstudents) === "" || trim($idstudents) == "&nbsp;" || trim($idstudents) === "" || trim($idstudents) == "&nbsp;" || trim($idstudents) === "" || trim($idstudents) == "&nbsp;" || trim($idstudents) === "" || trim($idstudents) == "&nbsp;" || trim($idstudents) === "" || trim($idstudents) == "&nbsp;" || trim($idstudents) === "" || trim($idstudents) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(primer_apellido,' ', segundo_apellido,' ', primer_nombre,' ', segundo_nombre)  FROM students where idstudents = $idstudents order by primer_apellido, segundo_apellido, primer_nombre, segundo_nombre" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT primer_apellido||' '||segundo_apellido||' '||primer_nombre||' '||segundo_nombre  FROM students where idstudents = $idstudents order by primer_apellido, segundo_apellido, primer_nombre, segundo_nombre" ; 
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
   function lookup_estatus(&$estatus) 
   {
      $conteudo = "" ; 
      if ($estatus == "C")
      { 
          $conteudo = "Continuidad";
      } 
      if ($estatus == "N")
      { 
          $conteudo = "Nuevo";
      } 
      if (!empty($conteudo)) 
      { 
          $estatus = $conteudo; 
      } 
   }  
//  
   function lookup_grado_igreso(&$conteudo , $grado_igreso) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $grado_igreso; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($grado_igreso) === "" || trim($grado_igreso) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      $nm_comando = "select grado from t_grados where id_grado = $grado_igreso order by grado" ; 
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
   function lookup_genero(&$genero) 
   {
      $conteudo = "" ; 
      if ($genero == "M")
      { 
          $conteudo = "Masculino";
      } 
      if ($genero == "F")
      { 
          $conteudo = "Femenino";
      } 
      if (!empty($conteudo)) 
      { 
          $genero = $conteudo; 
      } 
   }  
}
?>
