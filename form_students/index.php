<?php
//
   if (!session_id())
   {
   include_once('form_students_session.php');
   @session_start() ;
       if (!function_exists("sc_check_mobile"))
       {
           include_once("../_lib/lib/php/nm_check_mobile.php");
       }
       $_SESSION['scriptcase']['device_mobile'] = sc_check_mobile();
       if ($_SESSION['scriptcase']['device_mobile'])
       {
           if (!isset($_SESSION['scriptcase']['display_mobile']))
           {
               $_SESSION['scriptcase']['display_mobile'] = true;
           }
           if ($_SESSION['scriptcase']['display_mobile'] && isset($_POST['_sc_force_mobile']) && 'out' == $_POST['_sc_force_mobile'])
           {
               $_SESSION['scriptcase']['display_mobile'] = false;
           }
           elseif (!$_SESSION['scriptcase']['display_mobile'] && isset($_POST['_sc_force_mobile']) && 'in' == $_POST['_sc_force_mobile'])
           {
               $_SESSION['scriptcase']['display_mobile'] = true;
           }
       }
       else
       {
           $_SESSION['scriptcase']['display_mobile'] = false;
       }
       if ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
       {
          include_once('form_students_mob.php');
          exit;
       }
   }
   $_SESSION['scriptcase']['form_students']['glo_nm_perfil']          = "conn_mysql";
   $_SESSION['scriptcase']['form_students']['glo_nm_path_prod']       = "";
   $_SESSION['scriptcase']['form_students']['glo_nm_path_imagens']    = "";
   $_SESSION['scriptcase']['form_students']['glo_nm_path_imag_temp']  = "";
   $_SESSION['scriptcase']['form_students']['glo_nm_path_doc']        = "";
//
class form_students_ini
{
   var $nm_cod_apl;
   var $nm_nome_apl;
   var $nm_seguranca;
   var $nm_grupo;
   var $nm_grupo_versao;
   var $nm_autor;
   var $nm_versao_sc;
   var $nm_tp_lic_sc;
   var $nm_dt_criacao;
   var $nm_hr_criacao;
   var $nm_autor_alt;
   var $nm_dt_ult_alt;
   var $nm_hr_ult_alt;
   var $nm_timestamp;
   var $cor_bg_table;
   var $border_grid;
   var $cor_bg_grid;
   var $cor_cab_grid;
   var $cor_borda;
   var $cor_txt_cab_grid;
   var $cab_fonte_tipo;
   var $cab_fonte_tamanho;
   var $rod_fonte_tipo;
   var $rod_fonte_tamanho;
   var $cor_rod_grid;
   var $cor_txt_rod_grid;
   var $cor_barra_nav;
   var $cor_titulo;
   var $cor_txt_titulo;
   var $titulo_fonte_tipo;
   var $titulo_fonte_tamanho;
   var $cor_grid_impar;
   var $cor_grid_par;
   var $cor_txt_grid;
   var $texto_fonte_tipo;
   var $texto_fonte_tamanho;
   var $cor_lin_grupo;
   var $cor_txt_grupo;
   var $grupo_fonte_tipo;
   var $grupo_fonte_tamanho;
   var $cor_lin_sub_tot;
   var $cor_txt_sub_tot;
   var $sub_tot_fonte_tipo;
   var $sub_tot_fonte_tamanho;
   var $cor_lin_tot;
   var $cor_txt_tot;
   var $tot_fonte_tipo;
   var $tot_fonte_tamanho;
   var $cor_link_cab;
   var $cor_link_dados;
   var $img_fun_pag;
   var $img_fun_cab;
   var $img_fun_rod;
   var $img_fun_tit;
   var $img_fun_gru;
   var $img_fun_tot;
   var $img_fun_sub;
   var $img_fun_imp;
   var $img_fun_par;
   var $root;
   var $server;
   var $sc_protocolo;
   var $path_prod;
   var $path_link;
   var $path_aplicacao;
   var $path_embutida;
   var $path_botoes;
   var $path_img_global;
   var $path_img_modelo;
   var $path_icones;
   var $path_imagens;
   var $path_imag_cab;
   var $path_imag_temp;
   var $path_libs;
   var $path_doc;
   var $str_lang;
   var $str_schema_all;
   var $str_conf_reg;
   var $path_cep;
   var $path_secure;
   var $path_js;
   var $path_adodb;
   var $path_grafico;
   var $path_atual;
   var $Gd_missing;
   var $sc_site_ssl;
   var $link_form_novedades_x_estudiante_fecha_edit;
   var $link_form_matricula_edit;
   var $link_form_students_inline;
   var $nm_cont_lin;
   var $nm_limite_lin;
   var $nm_limite_lin_prt;
   var $nm_falta_var;
   var $nm_falta_var_db;
   var $nm_tpbanco;
   var $nm_servidor;
   var $nm_usuario;
   var $nm_senha;
   var $nm_database_encoding;
   var $nm_con_db2 = array();
   var $nm_con_persistente;
   var $nm_con_use_schema;
   var $nm_tabela;
   var $nm_col_dinamica   = array();
   var $nm_order_dinamico = array();
   var $nm_hidden_blocos  = array();
   var $sc_tem_trans_banco;
   var $nm_bases_all;
   var $nm_bases_mysql;
   var $nm_bases_sqlite;
   var $sc_page;
   var $sc_lig_md5 = array();
//
   function init()
   {
       global
             $nm_url_saida, $nm_apl_dependente, $script_case_init;

      @ini_set('magic_quotes_runtime', 0);
      $this->sc_page = $script_case_init;
      $_SESSION['scriptcase']['sc_num_page'] = $script_case_init;
      $_SESSION['scriptcase']['sc_ctl_ajax'] = 'part';
      $_SESSION['scriptcase']['sc_cnt_sql']  = 0;
      $this->sc_charset['UTF-8'] = 'utf-8';
      $this->sc_charset['ISO-2022-JP'] = 'iso-2022-jp';
      $this->sc_charset['ISO-2022-KR'] = 'iso-2022-kr';
      $this->sc_charset['ISO-8859-1'] = 'iso-8859-1';
      $this->sc_charset['ISO-8859-2'] = 'iso-8859-2';
      $this->sc_charset['ISO-8859-3'] = 'iso-8859-3';
      $this->sc_charset['ISO-8859-4'] = 'iso-8859-4';
      $this->sc_charset['ISO-8859-5'] = 'iso-8859-5';
      $this->sc_charset['ISO-8859-6'] = 'iso-8859-6';
      $this->sc_charset['ISO-8859-7'] = 'iso-8859-7';
      $this->sc_charset['ISO-8859-8'] = 'iso-8859-8';
      $this->sc_charset['ISO-8859-8-I'] = 'iso-8859-8-i';
      $this->sc_charset['ISO-8859-9'] = 'iso-8859-9';
      $this->sc_charset['ISO-8859-10'] = 'iso-8859-10';
      $this->sc_charset['ISO-8859-13'] = 'iso-8859-13';
      $this->sc_charset['ISO-8859-14'] = 'iso-8859-14';
      $this->sc_charset['ISO-8859-15'] = 'iso-8859-15';
      $this->sc_charset['WINDOWS-1250'] = 'windows-1250';
      $this->sc_charset['WINDOWS-1251'] = 'windows-1251';
      $this->sc_charset['WINDOWS-1252'] = 'windows-1252';
      $this->sc_charset['WINDOWS-1253'] = 'windows-1253';
      $this->sc_charset['WINDOWS-1254'] = 'windows-1254';
      $this->sc_charset['WINDOWS-1255'] = 'windows-1255';
      $this->sc_charset['WINDOWS-1256'] = 'windows-1256';
      $this->sc_charset['WINDOWS-1257'] = 'windows-1257';
      $this->sc_charset['KOI8-R'] = 'koi8-r';
      $this->sc_charset['BIG-5'] = 'big5';
      $this->sc_charset['EUC-CN'] = 'EUC-CN';
      $this->sc_charset['GB18030'] = 'GB18030';
      $this->sc_charset['GB2312'] = 'gb2312';
      $this->sc_charset['EUC-JP'] = 'euc-jp';
      $this->sc_charset['SJIS'] = 'shift-jis';
      $this->sc_charset['EUC-KR'] = 'euc-kr';
      $_SESSION['scriptcase']['charset_entities']['UTF-8'] = 'UTF-8';
      $_SESSION['scriptcase']['charset_entities']['ISO-8859-1'] = 'ISO-8859-1';
      $_SESSION['scriptcase']['charset_entities']['ISO-8859-5'] = 'ISO-8859-5';
      $_SESSION['scriptcase']['charset_entities']['ISO-8859-15'] = 'ISO-8859-15';
      $_SESSION['scriptcase']['charset_entities']['WINDOWS-1251'] = 'cp1251';
      $_SESSION['scriptcase']['charset_entities']['WINDOWS-1252'] = 'cp1252';
      $_SESSION['scriptcase']['charset_entities']['BIG-5'] = 'BIG5';
      $_SESSION['scriptcase']['charset_entities']['EUC-CN'] = 'GB2312';
      $_SESSION['scriptcase']['charset_entities']['GB2312'] = 'GB2312';
      $_SESSION['scriptcase']['charset_entities']['SJIS'] = 'Shift_JIS';
      $_SESSION['scriptcase']['charset_entities']['EUC-JP'] = 'EUC-JP';
      $_SESSION['scriptcase']['charset_entities']['KOI8-R'] = 'KOI8-R';
      $_SESSION['scriptcase']['trial_version'] = 'N';
      $_SESSION['sc_session'][$this->sc_page]['form_students']['decimal_db'] = "."; 

      $this->nm_cod_apl      = "form_students"; 
      $this->nm_nome_apl     = ""; 
      $this->nm_seguranca    = ""; 
      $this->nm_grupo        = "agora_IV"; 
      $this->nm_grupo_versao = "1"; 
      $this->nm_autor        = "admin"; 
      $this->nm_versao_sc    = "v8"; 
      $this->nm_tp_lic_sc    = "pe_mysql_bronze"; 
      $this->nm_dt_criacao   = "20160429"; 
      $this->nm_hr_criacao   = "094541"; 
      $this->nm_autor_alt    = "admin"; 
      $this->nm_dt_ult_alt   = "20170227"; 
      $this->nm_hr_ult_alt   = "152007"; 
      list($NM_usec, $NM_sec) = explode(" ", microtime()); 
      $this->nm_timestamp    = (float) $NM_sec; 
      $this->nm_app_version  = "4.0.0"; 
// 
      $this->border_grid           = ""; 
      $this->cor_bg_grid           = ""; 
      $this->cor_bg_table          = ""; 
      $this->cor_borda             = ""; 
      $this->cor_cab_grid          = ""; 
      $this->cor_txt_pag           = ""; 
      $this->cor_link_pag          = ""; 
      $this->pag_fonte_tipo        = ""; 
      $this->pag_fonte_tamanho     = ""; 
      $this->cor_txt_cab_grid      = ""; 
      $this->cab_fonte_tipo        = ""; 
      $this->cab_fonte_tamanho     = ""; 
      $this->rod_fonte_tipo        = ""; 
      $this->rod_fonte_tamanho     = ""; 
      $this->cor_rod_grid          = ""; 
      $this->cor_txt_rod_grid      = ""; 
      $this->cor_barra_nav         = ""; 
      $this->cor_titulo            = ""; 
      $this->cor_txt_titulo        = ""; 
      $this->titulo_fonte_tipo     = ""; 
      $this->titulo_fonte_tamanho  = ""; 
      $this->cor_grid_impar        = ""; 
      $this->cor_grid_par          = ""; 
      $this->cor_txt_grid          = ""; 
      $this->texto_fonte_tipo      = ""; 
      $this->texto_fonte_tamanho   = ""; 
      $this->cor_lin_grupo         = ""; 
      $this->cor_txt_grupo         = ""; 
      $this->grupo_fonte_tipo      = ""; 
      $this->grupo_fonte_tamanho   = ""; 
      $this->cor_lin_sub_tot       = ""; 
      $this->cor_txt_sub_tot       = ""; 
      $this->sub_tot_fonte_tipo    = ""; 
      $this->sub_tot_fonte_tamanho = ""; 
      $this->cor_lin_tot           = ""; 
      $this->cor_txt_tot           = ""; 
      $this->tot_fonte_tipo        = ""; 
      $this->tot_fonte_tamanho     = ""; 
      $this->cor_link_cab          = ""; 
      $this->cor_link_dados        = ""; 
      $this->img_fun_pag           = ""; 
      $this->img_fun_cab           = ""; 
      $this->img_fun_rod           = ""; 
      $this->img_fun_tit           = ""; 
      $this->img_fun_gru           = ""; 
      $this->img_fun_tot           = ""; 
      $this->img_fun_sub           = ""; 
      $this->img_fun_imp           = ""; 
      $this->img_fun_par           = ""; 
// 
      $NM_dir_atual = getcwd();
      if (empty($NM_dir_atual))
      {
          $str_path_sys          = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
          $str_path_sys          = str_replace("\\", '/', $str_path_sys);
      }
      else
      {
          $sc_nm_arquivo         = explode("/", $_SERVER['PHP_SELF']);
          $str_path_sys          = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
      }
      //check publication with the prod
      $str_path_apl_url = $_SERVER['PHP_SELF'];
      $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
      $str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
      $str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);
      //check prod
      if(empty($_SESSION['scriptcase']['form_students']['glo_nm_path_prod']))
      {
              /*check prod*/$_SESSION['scriptcase']['form_students']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
      }
      //check img
      if(empty($_SESSION['scriptcase']['form_students']['glo_nm_path_imagens']))
      {
              /*check img*/$_SESSION['scriptcase']['form_students']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
      }
      //check tmp
      if(empty($_SESSION['scriptcase']['form_students']['glo_nm_path_imag_temp']))
      {
              /*check tmp*/$_SESSION['scriptcase']['form_students']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
      }
      //check doc
      if(empty($_SESSION['scriptcase']['form_students']['glo_nm_path_doc']))
      {
              /*check doc*/$_SESSION['scriptcase']['form_students']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
      }
      //end check publication with the prod
// 
      $this->sc_site_ssl     = (isset($_SERVER['HTTP_REFERER']) && strtolower(substr($_SERVER['HTTP_REFERER'], 0, 5)) == 'https') ? true : false;
      $this->sc_protocolo    = ($this->sc_site_ssl) ? 'https://' : 'http://';
      $this->path_prod       = $_SESSION['scriptcase']['form_students']['glo_nm_path_prod'];
      $this->path_imagens    = $_SESSION['scriptcase']['form_students']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['scriptcase']['form_students']['glo_nm_path_imag_temp'];
      $this->path_doc        = $_SESSION['scriptcase']['form_students']['glo_nm_path_doc'];
      if (!isset($_SESSION['scriptcase']['str_lang']) || empty($_SESSION['scriptcase']['str_lang']))
      {
          $_SESSION['scriptcase']['str_lang'] = "es";
      }
      if (!isset($_SESSION['scriptcase']['str_conf_reg']) || empty($_SESSION['scriptcase']['str_conf_reg']))
      {
          $_SESSION['scriptcase']['str_conf_reg'] = "es_es";
      }
      $this->str_lang        = $_SESSION['scriptcase']['str_lang'];
      $this->str_conf_reg    = $_SESSION['scriptcase']['str_conf_reg'];
      $this->str_schema_all  = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc8_Citrine/Sc8_Citrine";
      $this->server          = (isset($_SERVER['SERVER_NAME'])) ? $_SERVER['SERVER_NAME'] : $_SERVER['HTTP_HOST'];
      if (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != 80 && !$this->sc_site_ssl )
      {
          $this->server         .= ":" . $_SERVER['SERVER_PORT'];
      }
      $this->server_pdf      = $this->sc_protocolo . $this->server;
      $this->server          = "";
      $this->sc_protocolo    = "";
      $str_path_web          = $_SERVER['PHP_SELF'];
      $str_path_web          = str_replace("\\", '/', $str_path_web);
      $str_path_web          = str_replace('//', '/', $str_path_web);
      $this->root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
      $this->path_aplicacao  = substr($str_path_sys, 0, strrpos($str_path_sys, '/'));
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/form_students';
      $this->path_embutida   = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/') + 1);
      $this->path_aplicacao .= '/';
      $this->path_link       = substr($str_path_web, 0, strrpos($str_path_web, '/'));
      $this->path_link       = substr($this->path_link, 0, strrpos($this->path_link, '/')) . '/';
      $this->path_help       = $this->path_link . "_lib/webhelp/";
      $this->path_lang       = "../_lib/lang/";
      $this->path_lang_js    = "../_lib/js/";
      $this->path_botoes     = $this->path_link . "_lib/img";
      $this->path_img_global = $this->path_link . "_lib/img";
      $this->path_img_modelo = $this->path_link . "_lib/img";
      $this->path_icones     = $this->path_link . "_lib/img";
      $this->path_imag_cab   = $this->path_link . "_lib/img";
      $this->path_btn        = $this->root . $this->path_link . "_lib/buttons/";
      $this->path_css        = $this->root . $this->path_link . "_lib/css/";
      $this->path_lib_php    = $this->root . $this->path_link . "_lib/lib/php/";
      $this->url_lib_js      = $this->path_link . "_lib/lib/js/";
      $this->url_lib         = $this->path_link . '/_lib/';
      $this->url_third       = $this->path_prod . '/third/';
      $this->path_cep        = $this->path_prod . "/cep";
      $this->path_cor        = $this->path_prod . "/cor";
      $this->path_js         = $this->path_prod . "/lib/js";
      $this->path_libs       = $this->root . $this->path_prod . "/lib/php";
      $this->path_third      = $this->root . $this->path_prod . "/third";
      $this->path_secure     = $this->root . $this->path_prod . "/secure";
      $this->path_adodb      = $this->root . $this->path_prod . "/third/adodb";

      global $inicial_form_students;
      if (isset($_SESSION['scriptcase']['user_logout']))
      {
          foreach ($_SESSION['scriptcase']['user_logout'] as $ind => $parms)
          {
              if (isset($_SESSION[$parms['V']]) && $_SESSION[$parms['V']] == $parms['U'])
              {
                  $nm_apl_dest = $parms['R'];
                  $dir = explode("/", $nm_apl_dest);
                  if (count($dir) == 1)
                  {
                      $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
                      $nm_apl_dest = $this->path_link . SC_dir_app_name($nm_apl_dest) . "/";
                  }
                  unset($_SESSION['scriptcase']['user_logout'][$ind]);
                  if (isset($inicial_form_students->contr_form_students->NM_ajax_flag) && $inicial_form_students->contr_form_students->NM_ajax_flag)
                  {
                      $inicial_form_students->contr_->NM_ajax_info['redir']['action']  = $nm_apl_dest;
                      $inicial_form_students->contr_form_students->NM_ajax_info['redir']['target']  = $parms['T'];
                      $inicial_form_students->contr_form_students->NM_ajax_info['redir']['metodo']  = "post";
                      $inicial_form_students->contr_form_students->NM_ajax_info['redir']['script_case_init']  = $this->sc_page;
                      $inicial_form_students->contr_form_students->NM_ajax_info['redir']['script_case_session']  = session_id();
                      form_students_pack_ajax_response();
                      exit;
                  }
?>
                  <html>
                  <body>
                  <form name="FRedirect" method="POST" action="<?php echo $nm_apl_dest; ?>" target="<?php echo $parms['T']; ?>">
                  </form>
                  <script>
                   document.FRedirect.submit();
                  </script>
                  </body>
                  </html>
<?php
                  exit;
              }
          }
      }
      $str_path = substr($this->path_prod, 0, strrpos($this->path_prod, '/') + 1); 
      if (!is_file($this->root . $str_path . 'devel/class/xmlparser/nmXmlparserIniSys.class.php'))
      {
          unset($_SESSION['scriptcase']['nm_sc_retorno']);
          unset($_SESSION['scriptcase']['form_students']['glo_nm_conexao']);
      }
      include($this->path_lang . $this->str_lang . ".lang.php");
      include($this->path_lang . "config_region.php");
      include($this->path_lang . "lang_config_region.php");
      $_SESSION['scriptcase']['charset'] = (isset($this->Nm_lang['Nm_charset']) && !empty($this->Nm_lang['Nm_charset'])) ? $this->Nm_lang['Nm_charset'] : "UTF-8";
      ini_set('default_charset', $_SESSION['scriptcase']['charset']);
      $_SESSION['scriptcase']['charset_html']  = (isset($this->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];

      asort($this->Nm_lang_conf_region);
      foreach ($this->Nm_lang_conf_region as $ind => $dados)
      {
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
         {
             $this->Nm_lang_conf_region[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
         }
      }
      if (isset($this->Nm_lang['lang_errm_dbcn_conn']))
      {
          $_SESSION['scriptcase']['db_conn_error'] = $this->Nm_lang['lang_errm_dbcn_conn'];
      }
      if (!function_exists("mb_convert_encoding"))
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtmb'] . "</font></div>";exit;
      } 
      elseif (!function_exists("sc_convert_encoding"))
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtsc'] . "</font></div>";exit;
      } 
      foreach ($this->Nm_conf_reg[$this->str_conf_reg] as $ind => $dados)
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
          {
              $this->Nm_conf_reg[$this->str_conf_reg][$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
      }
      foreach ($this->Nm_lang as $ind => $dados)
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($ind))
          {
              $ind = sc_convert_encoding($ind, $_SESSION['scriptcase']['charset'], "UTF-8");
              $this->Nm_lang[$ind] = $dados;
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
          {
              $this->Nm_lang[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
      }
      if (isset($_SESSION['sc_session']['SC_parm_violation']))
      {
          unset($_SESSION['sc_session']['SC_parm_violation']);
          echo "<html>";
          echo "<body>";
          echo "<table align=\"center\" width=\"50%\" border=1 height=\"50px\">";
          echo "<tr>";
          echo "   <td align=\"center\">";
          echo "       <b><font size=4>" . $this->Nm_lang['lang_errm_ajax_data'] . "</font>";
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          echo "</body>";
          echo "</html>";
          exit;
      }
      $Tmp_apl_lig = "form_novedades_x_estudiante_fecha";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/form_novedades_x_estudiante_fecha_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/form_novedades_x_estudiante_fecha_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/form_novedades_x_estudiante_fecha_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/form_novedades_x_estudiante_fecha_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["form_novedades_x_estudiante_fecha"] = 'S';
          }
      }
      $Tmp_apl_lig = "form_matricula";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/form_matricula_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/form_matricula_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/form_matricula_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/form_matricula_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["form_matricula"] = 'S';
          }
      }
      $PHP_ver = str_replace(".", "", phpversion()); 
      if (substr($PHP_ver, 0, 3) < 434)
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_phpv'] . "</font></div>";exit;
      }
      if (file_exists($this->path_libs . "/ver.dat"))
      {
          $SC_ver = file($this->path_libs . "/ver.dat"); 
          $SC_ver = str_replace(".", "", $SC_ver[0]); 
          if (substr($SC_ver, 0, 5) < 40015)
          {
              echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_incp'] . "</font></div>";exit;
          } 
      } 
      if (-1 != version_compare(phpversion(), '5.0.0'))
      {
         $this->path_grafico    = $this->root . $this->path_prod . "/third/jpgraph5/src";
      }
      else
      {
          $this->path_grafico    = $this->root . $this->path_prod . "/third/jpgraph4/src";
      }
      $_SESSION['sc_session'][$this->sc_page]['form_students']['path_doc'] = $this->path_doc; 
      $_SESSION['scriptcase']['nm_path_prod'] = $this->root . $this->path_prod . "/"; 
      $_SESSION['scriptcase']['nm_root_cep']  = $this->root; 
      $_SESSION['scriptcase']['nm_path_cep']  = $this->path_cep; 
      if (empty($this->path_imag_cab))
      {
          $this->path_imag_cab = $this->path_img_global;
      }
      if (!is_dir($this->root . $this->path_prod))
      {
          echo "<style type=\"text/css\">";
          echo ".scButton_default { font-family: Tahoma, Arial, sans-serif; font-size: 13px; color: #FFFFFF; font-weight: normal; background-color: #B9B564; border-style: solid; border-width: 0px; padding: 5px 8px;  }";
          echo ".scButton_onmouseover { font-family: Tahoma, Arial, sans-serif; font-size: 13px; color: #FFFFFF; font-weight: normal; background-color: #AC9F42; border-style: solid; border-width: 0px; padding: 5px 8px;  }";
          echo ".scButton_onmousedown { font-family: Tahoma, Arial, sans-serif; font-size: 13px; color: #FFFFFF; font-weight: normal; background-color: #9D9E59; border-style: solid; border-width: 0px; padding: 5px 8px;  }";
          echo ".scButton_disabled { font-family: Tahoma, Arial, sans-serif; font-size: 13px; color: #d1d1d1; font-weight: normal; background-color: #a8a8a8; border-style: solid; border-width: 0px; padding: 5px 8px;  }";
          echo ".scLink_default { text-decoration: underline; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:visited { text-decoration: underline; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:active { text-decoration: underline; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:hover { text-decoration: none; font-size: 12px; color: #0000AA;  }";
          echo "</style>";
          echo "<table width=\"80%\" border=\"1\" height=\"117\">";
          echo "<tr>";
          echo "   <td bgcolor=\"\">";
          echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_cmlb_nfnd'] . "</font>";
          echo "  " . $this->root . $this->path_prod;
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['form_students']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['form_students']['sc_outra_jan']) || $_SESSION['sc_session'][$script_case_init]['form_students']['sc_outra_jan'] != 'form_students')) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
?>
                  <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $this->Nm_lang['lang_btns_back'] ?>" title="<?php echo $this->Nm_lang['lang_btns_back_hint'] ?>" style="<?php echo $sCondStyle; ?>vertical-align: middle;display: ''">

<?php
              } 
              else 
              { 
?>
                  <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_default" value="<?php echo $this->Nm_lang['lang_btns_exit'] ?>" title="<?php echo $this->Nm_lang['lang_btns_exit_hint'] ?>" style="<?php echo $sCondStyle; ?>vertical-align: middle;display: ''">

<?php
              } 
          } 
          exit ;
      }

      $this->path_atual  = getcwd();
      $opsys = strtolower(php_uname());

      $this->link_form_novedades_x_estudiante_fecha_edit = $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('form_novedades_x_estudiante_fecha') . "/" ; 
      $this->link_form_matricula_edit = $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('form_matricula') . "/" ; 
      $this->link_form_students_inline = $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('form_students') . "/form_students_inline.php";
      $this->nm_cont_lin       = 0;
      $this->nm_limite_lin     = 0;
      $this->nm_limite_lin_prt = 0;
// 
      include_once($this->path_adodb . "/adodb.inc.php"); 
      $this->sc_Include($this->path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
      $this->sc_Include($this->path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
      if(function_exists('set_php_timezone'))  set_php_timezone('form_students'); 
      $this->sc_Include($this->path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->sc_Include($this->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      $this->sc_Include($this->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->sc_Include($this->path_lib_php . "/nm_functions.php", "", "") ; 
      $this->nm_data = new nm_data("es");
      global $inicial_form_students, $NM_run_iframe;
      if ((isset($inicial_form_students->contr_form_students->NM_ajax_flag) && $inicial_form_students->contr_form_students->NM_ajax_flag) || (isset($_SESSION['sc_session'][$this->sc_page]['form_students']['embutida_call']) && $_SESSION['sc_session'][$this->sc_page]['form_students']['embutida_call']) || $NM_run_iframe == 1)
      {
           $_SESSION['scriptcase']['sc_ctl_ajax'] = 'part';
      }
      perfil_lib($this->path_libs);
      if (!isset($_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil']))
      {
          if(function_exists("nm_check_perfil_exists")) nm_check_perfil_exists($this->path_libs, $this->path_prod);
          $_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil'] = true;
      }
      if (function_exists("nm_check_pdf_server")) $this->server_pdf = nm_check_pdf_server($this->path_libs, $this->server_pdf);
      if (!isset($_SESSION['scriptcase']['sc_num_img']) || empty($_SESSION['scriptcase']['sc_num_img']))
      { 
          $_SESSION['scriptcase']['sc_num_img'] = 1; 
      } 
      $this->regionalDefault();
      $this->sc_tem_trans_banco = false;
      $this->nm_bases_access     = array();
      $this->nm_bases_mysql      = array("mysql", "mysqlt", "maxsql", "pdo_mysql");
      $this->nm_bases_sqlite     = array("sqlite", "sqlite3", "pdosqlite");
      $this->nm_bases_all        = array_merge($this->nm_bases_mysql, $this->nm_bases_sqlite);
      $_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1DcBiDQFaHArYHuJwHgvOVIFCDuX7HMJwD9BsZ1B/DSBeHQrqHgBOVkJGHEXCHIJsD9XsZ9JeD1BeD5F7DMvmVcBUDWJeHMBiD9BsVIraD1rwV5X7HgBeHEBUDWF/ZuXGDcJeH9FGHAN7V5BODMBYDkB/DWXCDoJeHQXGH9FaHABYHQJwDEBODkFeH5FYVoFGHQJKDQJwHAveD5JwHgrYDkBOV5FYVEFGD9XOH9FaHABYV5FGDMNKZSXeDWr/DoJeD9XsZSX7Z1N7VWFaHgrKV9FeDWXCDoJsDcBwH9B/Z1rYHQJwHgvCZSXeDWXCDoB/D9NwH9X7Z1BYV5raHuzGDkFCH5XCVEraDcJUZ1F7HArYV5FUDEvsHEBUH5X/VoBiD9NwDQJsHIrKV5JeDMvmVcFKV5BmVoBqD9BsZkFGHAvsZMXGDEvsZSJ3DuFYDorqD9FYDQFGHANOHurqDMNODkBsDWXCDoJsDcBwH9B/Z1rYHQJwHgvsHArsHEXCHIFUHQJeDuFaHINaVWJeDMNOVcFiV5FYHMJeHQXOZSBqHABYHuBOHgBeHAFKV5B7ZuFaHQNmDQB/HIrwHuBqDMBOZSJ3V5FYHIF7HQXGZSBOD1NaD5XGHgNOHAFKH5FYVoX7D9JKDQX7D1BOV5FGDMzGVcBUHEF/HIFUHQXOH9BqHINaD5XGDMvCHEFKV5FqHIB/DcBiZ9XGD1NKVWJwDMvmV9FiV5FYHIF7HQXOZ1X7HANOHuB/DMvCDkFeV5FqHIraHQFYH9BiHIrKHuF7DMzGZSrCH5FqDoJeD9JmZ1B/D1NaD5rqHgrKHArsHEB3ZuB/HQXsDQFaHAN7HuBiDMvOZSJ3V5FYHIBiHQXGH9BOHABYHuXGHgBYHEFKV5FqHMBODcXGZ9F7HIrKHuX7DMNOZSJ3V5FYHMFUDcFYZkFGHIrwHQBOHgNOHEFKH5FYVoX7D9JKDQX7D1BOV5FGHuzGDkBOH5FqVoJwD9XOZ1F7HABYZMB/DEBeHENiV5FaHIFGHQJeZ9JeZ1rwHQFaHuzGVIBOV5X7DoF7D9XOZSB/HABYV5X7DMrYHErCDWXCVoXGD9XsDQJsHABYV5BqHgNKVcFiDur/VEX7HQBqZ1BiHAvmV5JeHgvCZSJ3V5XCVoB/D9NmDQFaZ1BYV5FUHuvmDkBOH5XKVoraD9BiVINUHINKD5FaDEvsZSJGDuFaZuBqD9NwH9X7Z1rwV5JwHuBYVcFiV5X7VoFGDcBqH9FaHAN7V5JeDErKHEBUH5F/DoF7DcJeDQFGD1BeD5JwDMrwZSJ3H5FqDoJeD9JmZ1B/D1NaD5rqDErKZSXeH5FYDoFUD9JKDQJsZ1rwV5BqHuBYVcXKV5X7HMJeDcJUZ1B/HArYZMB/DEBeHEFiV5FaZuBODcBwDQX7Z1N7HuFaHuNOZSrCH5FqDoXGHQJmZ1BiHAvCD5BqHgveHArsDuXKDoBOHQBiZ9F7D1BOV5XGDMvmVcFKV5BmVoBqD9BsZkFGHAvsZMBOHgveHArCV5XKDoBOD9FYDuBqHANOV5FaDMrYDkBsHEFYVENUDcFYH9B/Z1NOV5JeDEBeVkJGHEFqHIJsD9XsZ9JeD1BeD5F7DMvmVcXKDWJeDoFGDcBqH9B/HABYD5XGDMzGHEFiV5XKDoNUHQXsH9X7HIBeV5JwHuzGVIBODWFYVEBiHQJmZ1F7Z1vmD5rqDEBOHArCDWBmZuJeHQXGZ9XGHANKVWFU";
      $this->prep_conect();
      $this->conectDB();
      if (!in_array(strtolower($this->nm_tpbanco), $this->nm_bases_all))
      {
          echo "<tr>";
          echo "   <td bgcolor=\"\">";
          echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_nspt'] . "</font>";
          echo "  " . $perfil_trab;
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['form_students']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['form_students']['sc_outra_jan']) || $_SESSION['sc_session'][$script_case_init]['form_students']['sc_outra_jan'] != 'form_students')) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
                  echo "<a href='" . $_SESSION['scriptcase']['nm_sc_retorno'] . "' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_scriptcase8_citrine_bvoltar.gif' title='" . $this->Nm_lang['lang_btns_rtrn_scrp_hint'] . "' align=absmiddle></a> \n" ; 
              } 
              else 
              { 
                  echo "<a href='$nm_url_saida' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_scriptcase8_citrine_bsair.gif' title='" . $this->Nm_lang['lang_btns_exit_appl_hint'] . "' align=absmiddle></a> \n" ; 
              } 
          } 
          exit ;
      } 
   }
   function prep_conect()
   {
      $con_devel             =  (isset($_SESSION['scriptcase']['form_students']['glo_nm_conexao'])) ? $_SESSION['scriptcase']['form_students']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
      {
          foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
          {
              if (isset($_SESSION['scriptcase']['form_students']['glo_nm_conexao']) && $_SESSION['scriptcase']['form_students']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['form_students']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['form_students']['glo_nm_perfil']) && $_SESSION['scriptcase']['form_students']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['form_students']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['form_students']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['scriptcase']['form_students']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      if (isset($_SESSION['scriptcase']['form_students']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['form_students']['glo_nm_conexao']))
      {
          db_conect_devel($con_devel, $this->root . $this->path_prod, 'agora_IV', 2); 
          if (empty($_SESSION['scriptcase']['glo_tpbanco']) && empty($_SESSION['scriptcase']['glo_banco']))
          {
              $nm_crit_perfil = true;
          }
      }
      if (isset($_SESSION['scriptcase']['form_students']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['form_students']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['form_students']['glo_nm_perfil'];
      }
      elseif (isset($_SESSION['scriptcase']['glo_perfil']) && !empty($_SESSION['scriptcase']['glo_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['glo_perfil'];
      }
      if (!empty($perfil_trab))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = "";
          carrega_perfil($perfil_trab, $this->path_libs, "S");
          if (empty($_SESSION['scriptcase']['glo_senha_protect']))
          {
              $nm_crit_perfil = true;
          }
      }
      else
      {
          $perfil_trab = $con_devel;
      }
      if (!$_SESSION['sc_session'][$this->sc_page]['form_students']['embutida_form'] || !$_SESSION['sc_session'][$this->sc_page]['form_students']['embutida_proc']) 
      {
          if (!isset($_SESSION['entorno'])) 
          {
              $this->nm_falta_var .= "entorno; ";
          }
      }
// 
      if (!isset($_SESSION['scriptcase']['glo_tpbanco']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_tpbanco; ";
          }
      }
      else
      {
          $this->nm_tpbanco = $_SESSION['scriptcase']['glo_tpbanco']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_servidor']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_servidor; ";
          }
      }
      else
      {
          $this->nm_servidor = $_SESSION['scriptcase']['glo_servidor']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_banco']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_banco; ";
          }
      }
      else
      {
          $this->nm_banco = $_SESSION['scriptcase']['glo_banco']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_usuario']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_usuario; ";
          }
      }
      else
      {
          $this->nm_usuario = $_SESSION['scriptcase']['glo_usuario']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_senha']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_senha; ";
          }
      }
      else
      {
          $this->nm_senha = $_SESSION['scriptcase']['glo_senha']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_autocommit']))
      {
          $this->nm_con_db2['db2_autocommit'] = $_SESSION['scriptcase']['glo_db2_autocommit']; 
      }
      if (isset($_SESSION['scriptcase']['glo_database_encoding']))
      {
          $this->nm_database_encoding = $_SESSION['scriptcase']['glo_database_encoding']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_lib']))
      {
          $this->nm_con_db2['db2_i5_lib'] = $_SESSION['scriptcase']['glo_db2_i5_lib']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_naming']))
      {
          $this->nm_con_db2['db2_i5_naming'] = $_SESSION['scriptcase']['glo_db2_i5_naming']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_commit']))
      {
          $this->nm_con_db2['db2_i5_commit'] = $_SESSION['scriptcase']['glo_db2_i5_commit']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_query_optimize']))
      {
          $this->nm_con_db2['db2_i5_query_optimize'] = $_SESSION['scriptcase']['glo_db2_i5_query_optimize']; 
      }
      if (isset($_SESSION['scriptcase']['glo_use_persistent']))
      {
          $this->nm_con_persistente = $_SESSION['scriptcase']['glo_use_persistent']; 
      }
      if (isset($_SESSION['scriptcase']['glo_use_schema']))
      {
          $this->nm_con_use_schema = $_SESSION['scriptcase']['glo_use_schema']; 
      }
      $this->date_delim  = "'";
      $this->date_delim1 = "'";
      if (isset($_SESSION['scriptcase']['glo_decimal_db']) && !empty($_SESSION['scriptcase']['glo_decimal_db']))
      {
         $_SESSION['sc_session'][$this->sc_page]['form_students']['decimal_db'] = $_SESSION['scriptcase']['glo_decimal_db']; 
      }
      if (isset($_SESSION['scriptcase']['glo_date_separator']) && !empty($_SESSION['scriptcase']['glo_date_separator']))
      {
          $SC_temp = trim($_SESSION['scriptcase']['glo_date_separator']);
          if (strlen($SC_temp) == 2)
          {
              $_SESSION['sc_session'][$this->sc_page]['form_students']['SC_sep_date']  = substr($SC_temp, 0, 1); 
              $_SESSION['sc_session'][$this->sc_page]['form_students']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
          }
          else
          {
              $_SESSION['sc_session'][$this->sc_page]['form_students']['SC_sep_date']  = $SC_temp; 
              $_SESSION['sc_session'][$this->sc_page]['form_students']['SC_sep_date1'] = $SC_temp; 
          }
          $this->date_delim  = $_SESSION['sc_session'][$this->sc_page]['form_students']['SC_sep_date'];
          $this->date_delim1 = $_SESSION['sc_session'][$this->sc_page]['form_students']['SC_sep_date1'];
      }
      if (empty($this->nm_tabela))
      {
          $this->nm_tabela = "students"; 
      }
// 
      if (!empty($this->nm_falta_var) || !empty($this->nm_falta_var_db) || $nm_crit_perfil)
      {
          echo "<style type=\"text/css\">";
          echo ".scButton_default { font-family: Tahoma, Arial, sans-serif; font-size: 13px; color: #FFFFFF; font-weight: normal; background-color: #B9B564; border-style: solid; border-width: 0px; padding: 5px 8px;  }";
          echo ".scButton_onmouseover { font-family: Tahoma, Arial, sans-serif; font-size: 13px; color: #FFFFFF; font-weight: normal; background-color: #AC9F42; border-style: solid; border-width: 0px; padding: 5px 8px;  }";
          echo ".scButton_onmousedown { font-family: Tahoma, Arial, sans-serif; font-size: 13px; color: #FFFFFF; font-weight: normal; background-color: #9D9E59; border-style: solid; border-width: 0px; padding: 5px 8px;  }";
          echo ".scButton_disabled { font-family: Tahoma, Arial, sans-serif; font-size: 13px; color: #d1d1d1; font-weight: normal; background-color: #a8a8a8; border-style: solid; border-width: 0px; padding: 5px 8px;  }";
          echo ".scLink_default { text-decoration: underline; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:visited { text-decoration: underline; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:active { text-decoration: underline; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:hover { text-decoration: none; font-size: 12px; color: #0000AA;  }";
          echo "</style>";
          echo "<table width=\"80%\" border=\"1\" height=\"117\">";
          if (empty($this->nm_falta_var_db))
          {
              if (!empty($this->nm_falta_var))
              {
                  echo "<tr>";
                  echo "   <td bgcolor=\"\">";
                  echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_glob'] . "</font>";
                  echo "  " . $this->nm_falta_var;
                  echo "   </b></td>";
                  echo " </tr>";
              }
              if ($nm_crit_perfil)
              {
                  echo "<tr>";
                  echo "   <td bgcolor=\"\">";
                  echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_nfnd'] . "</font>";
                  echo "  " . $perfil_trab;
                  echo "   </b></td>";
                  echo " </tr>";
              }
          }
          else
          {
              echo "<tr>";
              echo "   <td bgcolor=\"\">";
              echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_data'] . "</font></b>";
              echo "   </td>";
              echo " </tr>";
          }
          echo "</table>";
          if (!$_SESSION['sc_session'][$this->sc_page]['form_students']['iframe_menu'] && (!isset($_SESSION['sc_session'][$this->sc_page]['form_students']['sc_outra_jan']) || $_SESSION['sc_session'][$this->sc_page]['form_students']['sc_outra_jan'] != 'form_students')) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
?>
                  <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $this->Nm_lang['lang_btns_back'] ?>" title="<?php echo $this->Nm_lang['lang_btns_back_hint'] ?>" style="<?php echo $sCondStyle; ?>vertical-align: middle;display: ''">

<?php
              } 
              else 
              { 
?>
                  <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_default" value="<?php echo $this->Nm_lang['lang_btns_exit'] ?>" title="<?php echo $this->Nm_lang['lang_btns_exit_hint'] ?>" style="<?php echo $sCondStyle; ?>vertical-align: middle;display: ''">

<?php
              } 
          } 
          exit ;
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_usr']) && !empty($_SESSION['scriptcase']['glo_db_master_usr']))
      {
          $this->nm_usuario = $_SESSION['scriptcase']['glo_db_master_usr']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_pass']) && !empty($_SESSION['scriptcase']['glo_db_master_pass']))
      {
          $this->nm_senha = $_SESSION['scriptcase']['glo_db_master_pass']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_cript']) && !empty($_SESSION['scriptcase']['glo_db_master_cript']))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = $_SESSION['scriptcase']['glo_db_master_cript']; 
      }
  } 
// 
  function conectDB()
  {
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['form_students']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['form_students']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['scriptcase']['form_students']['glo_nm_conexao'], $this->root . $this->path_prod, 'agora_IV'); 
      } 
      else 
      { 
         if (!isset($this->nm_con_persistente))
         {
            $this->nm_con_persistente = 'N';
         }
         if (!isset($this->nm_con_db2))
         {
            $this->nm_con_db2 = '';
         }
         if (!isset($this->nm_database_encoding))
         {
            $this->nm_database_encoding = '';
         }
         $this->Db = db_conect($this->nm_tpbanco, $this->nm_servidor, $this->nm_usuario, $this->nm_senha, $this->nm_banco, $glo_senha_protect, "S", $this->nm_con_persistente, $this->nm_con_db2, $this->nm_database_encoding); 
      } 
  }
// 

   function regionalDefault($sConfReg = '')
   {
      if ('' == $sConfReg)
      {
         $sConfReg = $this->str_conf_reg;
      }

      $_SESSION['scriptcase']['reg_conf']['date_format']           = (isset($this->Nm_conf_reg[$sConfReg]['data_format']))              ?  $this->Nm_conf_reg[$sConfReg]['data_format']                  : "ddmmyyyy";
      $_SESSION['scriptcase']['reg_conf']['date_sep']              = (isset($this->Nm_conf_reg[$sConfReg]['data_sep']))                 ?  $this->Nm_conf_reg[$sConfReg]['data_sep']                     : "/";
      $_SESSION['scriptcase']['reg_conf']['date_week_ini']         = (isset($this->Nm_conf_reg[$sConfReg]['prim_dia_sema']))            ?  $this->Nm_conf_reg[$sConfReg]['prim_dia_sema']                : "SU";
      $_SESSION['scriptcase']['reg_conf']['time_format']           = (isset($this->Nm_conf_reg[$sConfReg]['hora_format']))              ?  $this->Nm_conf_reg[$sConfReg]['hora_format']                  : "hhiiss";
      $_SESSION['scriptcase']['reg_conf']['time_sep']              = (isset($this->Nm_conf_reg[$sConfReg]['hora_sep']))                 ?  $this->Nm_conf_reg[$sConfReg]['hora_sep']                     : ":";
      $_SESSION['scriptcase']['reg_conf']['time_pos_ampm']         = (isset($this->Nm_conf_reg[$sConfReg]['hora_pos_ampm']))            ?  $this->Nm_conf_reg[$sConfReg]['hora_pos_ampm']                : "right_without_space";
      $_SESSION['scriptcase']['reg_conf']['time_simb_am']          = (isset($this->Nm_conf_reg[$sConfReg]['hora_simbolo_am']))          ?  $this->Nm_conf_reg[$sConfReg]['hora_simbolo_am']              : "am";
      $_SESSION['scriptcase']['reg_conf']['time_simb_pm']          = (isset($this->Nm_conf_reg[$sConfReg]['hora_simbolo_pm']))          ?  $this->Nm_conf_reg[$sConfReg]['hora_simbolo_pm']              : "pm";
      $_SESSION['scriptcase']['reg_conf']['simb_neg']              = (isset($this->Nm_conf_reg[$sConfReg]['num_sinal_neg']))            ?  $this->Nm_conf_reg[$sConfReg]['num_sinal_neg']                : "-";
      $_SESSION['scriptcase']['reg_conf']['grup_num']              = (isset($this->Nm_conf_reg[$sConfReg]['num_sep_agr']))              ?  $this->Nm_conf_reg[$sConfReg]['num_sep_agr']                  : ".";
      $_SESSION['scriptcase']['reg_conf']['dec_num']               = (isset($this->Nm_conf_reg[$sConfReg]['num_sep_dec']))              ?  $this->Nm_conf_reg[$sConfReg]['num_sep_dec']                  : ",";
      $_SESSION['scriptcase']['reg_conf']['neg_num']               = (isset($this->Nm_conf_reg[$sConfReg]['num_format_num_neg']))       ?  $this->Nm_conf_reg[$sConfReg]['num_format_num_neg']           : 2;
      $_SESSION['scriptcase']['reg_conf']['monet_simb']            = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_simbolo']))        ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_simbolo']            : "$";
      $_SESSION['scriptcase']['reg_conf']['monet_f_pos']           = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_format_num_pos'])) ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_format_num_pos']     : 3;
      $_SESSION['scriptcase']['reg_conf']['monet_f_neg']           = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_format_num_neg'])) ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_format_num_neg']     : 13;
      $_SESSION['scriptcase']['reg_conf']['grup_val']              = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_sep_agr']))        ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_sep_agr']            : ".";
      $_SESSION['scriptcase']['reg_conf']['dec_val']               = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_sep_dec']))        ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_sep_dec']            : ",";
      $_SESSION['scriptcase']['reg_conf']['num_group_digit']       = (isset($this->Nm_conf_reg[$sConfReg]['num_group_digit']))          ?  $this->Nm_conf_reg[$sConfReg]['num_group_digit']              : "1";
      $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_group_digit']))    ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_group_digit']        : "1";
      $_SESSION['scriptcase']['reg_conf']['html_dir']              = (isset($this->Nm_conf_reg[$sConfReg]['ger_ltr_rtl']))              ?  " DIR='" . $this->Nm_conf_reg[$sConfReg]['ger_ltr_rtl'] . "'" : "";
      $_SESSION['scriptcase']['reg_conf']['css_dir']               = (isset($this->Nm_conf_reg[$sConfReg]['ger_ltr_rtl']))              ?  $this->Nm_conf_reg[$sConfReg]['ger_ltr_rtl'] : "LTR";
      if ('' == $_SESSION['scriptcase']['reg_conf']['num_group_digit'])
      {
          $_SESSION['scriptcase']['reg_conf']['num_group_digit'] = '1';
      }
      if ('' == $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'])
      {
          $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = '1';
      }
   }
   function sc_Include($path, $tp, $name)
   {
       if ((empty($tp) && empty($name)) || ($tp == "F" && !function_exists($name)) || ($tp == "C" && !class_exists($name)))
       {
           include_once($path);
       }
   } // sc_Include
   function sc_Sql_Protect($var, $tp, $conex="")
   {
       if (empty($conex) || $conex == "conn_mysql")
       {
           $TP_banco = $_SESSION['scriptcase']['glo_tpbanco'];
       }
       else
       {
           eval ("\$TP_banco = \$this->nm_con_" . $conex . "['tpbanco'];");
       }
       if ($tp == "date")
       {
           $delim  = "'";
           $delim1 = "'";
           if (isset($_SESSION['sc_session'][$this->sc_page]['form_students']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->sc_page]['form_students']['SC_sep_date']))
           {
               $delim  = $_SESSION['sc_session'][$this->sc_page]['form_students']['SC_sep_date'];
               $delim1 = $_SESSION['sc_session'][$this->sc_page]['form_students']['SC_sep_date1'];
           }
           return $delim . $var . $delim1;
       }
       else
       {
           return $var;
       }
   } // sc_Sql_Protect
}
//===============================================================================
class form_students_edit
{
    var $contr_form_students;
    function inicializa()
    {
        global $nm_opc_lookup, $nm_opc_php, $script_case_init;
        require_once("form_students_apl.php");
        $this->contr_form_students = new form_students_apl();
    }
}
if (!function_exists("NM_is_utf8"))
{
    include_once("../_lib/lib/php/nm_utf8.php");
}
ob_start();
//
//----------------  
//
    $_SESSION['scriptcase']['form_students']['contr_erro'] = 'off';
    if (!function_exists("NM_is_utf8"))
    {
        include_once("../_lib/lib/php/nm_utf8.php");
    }
    if (!function_exists("SC_dir_app_ini"))
    {
        include_once("../_lib/lib/php/nm_ctrl_app_name.php");
    }
    SC_dir_app_ini('agora_IV');
    $sc_conv_var = array();
    if (!empty($_FILES))
    {
        foreach ($_FILES as $nmgp_campo => $nmgp_valores)
        {
             if (isset($sc_conv_var[$nmgp_campo]))
             {
                 $nmgp_campo = $sc_conv_var[$nmgp_campo];
             }
             elseif (isset($sc_conv_var[strtolower($nmgp_campo)]))
             {
                 $nmgp_campo = $sc_conv_var[strtolower($nmgp_campo)];
             }
             $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
             $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
             $$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
             $$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
             $$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
        }
    }
    $Sc_lig_md5 = false;
    if (!empty($_POST))
    {
        foreach ($_POST as $nmgp_var => $nmgp_val)
        {
             if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
             {
                 $nmgp_var = substr($nmgp_var, 11);
                 $nmgp_val = $_SESSION[$nmgp_val];
             }
             if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
             {
                 $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                 if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                 {
                     $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                     $Sc_lig_md5 = true;
                 }
                 else
                 {
                     $_SESSION['sc_session']['SC_parm_violation'] = true;
                 }
             }
             if (isset($sc_conv_var[$nmgp_var]))
             {
                 $nmgp_var = $sc_conv_var[$nmgp_var];
             }
             elseif (isset($sc_conv_var[strtolower($nmgp_var)]))
             {
                 $nmgp_var = $sc_conv_var[strtolower($nmgp_var)];
             }
             nm_limpa_str_form_students($nmgp_val);
             $$nmgp_var = $nmgp_val;
        }
    }
    if (!empty($_GET))
    {
        foreach ($_GET as $nmgp_var => $nmgp_val)
        {
             if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
             {
                 $nmgp_var = substr($nmgp_var, 11);
                 $nmgp_val = $_SESSION[$nmgp_val];
             }
             if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
             {
                 $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                 if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                 {
                     $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                     $Sc_lig_md5 = true;
                 }
                 else
                 {
                     $_SESSION['sc_session']['SC_parm_violation'] = true;
                 }
             }
             if (isset($sc_conv_var[$nmgp_var]))
             {
                 $nmgp_var = $sc_conv_var[$nmgp_var];
             }
             elseif (isset($sc_conv_var[strtolower($nmgp_var)]))
             {
                 $nmgp_var = $sc_conv_var[strtolower($nmgp_var)];
             }
             nm_limpa_str_form_students($nmgp_val);
             $$nmgp_var = $nmgp_val;
        }
    }
    if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
    {
        $_SESSION['sc_session']['SC_parm_violation'] = true;
    }
    if (isset($nmgp_parms) && $nmgp_parms == "SC_null")
    {
        $nmgp_parms = "";
    }
    if (isset($SC_where_pdf) && !empty($SC_where_pdf))
    {
        $_SESSION['sc_session'][$script_case_init]['form_students']['where_filter'] = $SC_where_pdf;
    }

    if (isset($_POST['rs']) && !is_array($_POST['rs']) && 'ajax_' == substr($_POST['rs'], 0, 5) && isset($_POST['rsargs']) && !empty($_POST['rsargs']))
    {
        if ('ajax_form_students_validate_estatus' == $_POST['rs'])
        {
            $estatus = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_fecha_matricula' == $_POST['rs'])
        {
            $fecha_matricula = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_genero' == $_POST['rs'])
        {
            $genero = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_fecha_nacimiento' == $_POST['rs'])
        {
            $fecha_nacimiento = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_primer_apellido' == $_POST['rs'])
        {
            $primer_apellido = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_segundo_apellido' == $_POST['rs'])
        {
            $segundo_apellido = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_primer_nombre' == $_POST['rs'])
        {
            $primer_nombre = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_segundo_nombre' == $_POST['rs'])
        {
            $segundo_nombre = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_tipo_identificacion' == $_POST['rs'])
        {
            $tipo_identificacion = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_numero_documento' == $_POST['rs'])
        {
            $numero_documento = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_departanebti_expedicion' == $_POST['rs'])
        {
            $departanebti_expedicion = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_municipio_expedicion' == $_POST['rs'])
        {
            $municipio_expedicion = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_firstname' == $_POST['rs'])
        {
            $firstname = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_lastname' == $_POST['rs'])
        {
            $lastname = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_anos_cumplidos' == $_POST['rs'])
        {
            $anos_cumplidos = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_dpto_nacimiento' == $_POST['rs'])
        {
            $dpto_nacimiento = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_municipio_nacimiento' == $_POST['rs'])
        {
            $municipio_nacimiento = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_observaciones' == $_POST['rs'])
        {
            $observaciones = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_login' == $_POST['rs'])
        {
            $login = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_pswd' == $_POST['rs'])
        {
            $pswd = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_confirm_pswd' == $_POST['rs'])
        {
            $confirm_pswd = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_photo' == $_POST['rs'])
        {
            $photo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_state' == $_POST['rs'])
        {
            $state = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_city' == $_POST['rs'])
        {
            $city = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_address' == $_POST['rs'])
        {
            $address = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_barrio' == $_POST['rs'])
        {
            $barrio = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_postalcode' == $_POST['rs'])
        {
            $postalcode = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_zona' == $_POST['rs'])
        {
            $zona = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_telefono' == $_POST['rs'])
        {
            $telefono = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_email' == $_POST['rs'])
        {
            $email = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_id_sede' == $_POST['rs'])
        {
            $id_sede = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_id_jornada' == $_POST['rs'])
        {
            $id_jornada = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_id_nivel' == $_POST['rs'])
        {
            $id_nivel = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_grado_igreso' == $_POST['rs'])
        {
            $grado_igreso = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_id_grupo' == $_POST['rs'])
        {
            $id_grupo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_grado_anterior' == $_POST['rs'])
        {
            $grado_anterior = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_last_year' == $_POST['rs'])
        {
            $last_year = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_nombre_ult_plantel' == $_POST['rs'])
        {
            $nombre_ult_plantel = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_resultado' == $_POST['rs'])
        {
            $resultado = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_subsidado' == $_POST['rs'])
        {
            $subsidado = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_interno' == $_POST['rs'])
        {
            $interno = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_otro_modelo' == $_POST['rs'])
        {
            $otro_modelo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_caracter' == $_POST['rs'])
        {
            $caracter = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_especialidad' == $_POST['rs'])
        {
            $especialidad = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_year_mat' == $_POST['rs'])
        {
            $year_mat = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_matricular' == $_POST['rs'])
        {
            $matricular = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_eps' == $_POST['rs'])
        {
            $eps = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_ips' == $_POST['rs'])
        {
            $ips = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_ars' == $_POST['rs'])
        {
            $ars = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_tipo_sangre' == $_POST['rs'])
        {
            $tipo_sangre = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_victima_conflicto' == $_POST['rs'])
        {
            $victima_conflicto = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_peso' == $_POST['rs'])
        {
            $peso = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_talla' == $_POST['rs'])
        {
            $talla = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_cobertura' == $_POST['rs'])
        {
            $cobertura = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_vive_con' == $_POST['rs'])
        {
            $vive_con = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_subsidio' == $_POST['rs'])
        {
            $subsidio = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_estatus_vca' == $_POST['rs'])
        {
            $estatus_vca = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_depto_expulsor' == $_POST['rs'])
        {
            $depto_expulsor = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_municipio_expulsor' == $_POST['rs'])
        {
            $municipio_expulsor = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_fecha_expulsion' == $_POST['rs'])
        {
            $fecha_expulsion = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_certificado' == $_POST['rs'])
        {
            $certificado = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_semestre' == $_POST['rs'])
        {
            $semestre = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_numero_carne_sisben' == $_POST['rs'])
        {
            $numero_carne_sisben = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_nivel_sisben' == $_POST['rs'])
        {
            $nivel_sisben = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_estrato' == $_POST['rs'])
        {
            $estrato = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_fuente_recurso' == $_POST['rs'])
        {
            $fuente_recurso = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_opcion' == $_POST['rs'])
        {
            $opcion = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_resguardo' == $_POST['rs'])
        {
            $resguardo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_negritudes' == $_POST['rs'])
        {
            $negritudes = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_etnia' == $_POST['rs'])
        {
            $etnia = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_discapacidades' == $_POST['rs'])
        {
            $discapacidades = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_capacidades' == $_POST['rs'])
        {
            $capacidades = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_validate_novedades' == $_POST['rs'])
        {
            $novedades = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_refresh_departanebti_expedicion' == $_POST['rs'])
        {
            $departanebti_expedicion = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_fields = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_students_refresh_dpto_nacimiento' == $_POST['rs'])
        {
            $dpto_nacimiento = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_fields = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_students_refresh_state' == $_POST['rs'])
        {
            $state = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_fields = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_students_refresh_id_nivel' == $_POST['rs'])
        {
            $id_nivel = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_fields = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_students_refresh_grado_igreso' == $_POST['rs'])
        {
            $grado_igreso = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_fields = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_students_refresh_depto_expulsor' == $_POST['rs'])
        {
            $depto_expulsor = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_fields = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_students_event_fecha_nacimiento_onchange' == $_POST['rs'])
        {
            $fecha_nacimiento = NM_utf8_urldecode($_POST['rsargs'][0]);
            $anos_cumplidos = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_students_event_victima_conflicto_onchange' == $_POST['rs'])
        {
            $victima_conflicto = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_students_submit_form' == $_POST['rs'])
        {
            $estatus = NM_utf8_urldecode($_POST['rsargs'][0]);
            $fecha_matricula = NM_utf8_urldecode($_POST['rsargs'][1]);
            $genero = NM_utf8_urldecode($_POST['rsargs'][2]);
            $fecha_nacimiento = NM_utf8_urldecode($_POST['rsargs'][3]);
            $primer_apellido = NM_utf8_urldecode($_POST['rsargs'][4]);
            $segundo_apellido = NM_utf8_urldecode($_POST['rsargs'][5]);
            $primer_nombre = NM_utf8_urldecode($_POST['rsargs'][6]);
            $segundo_nombre = NM_utf8_urldecode($_POST['rsargs'][7]);
            $tipo_identificacion = NM_utf8_urldecode($_POST['rsargs'][8]);
            $numero_documento = NM_utf8_urldecode($_POST['rsargs'][9]);
            $departanebti_expedicion = NM_utf8_urldecode($_POST['rsargs'][10]);
            $municipio_expedicion = NM_utf8_urldecode($_POST['rsargs'][11]);
            $firstname = NM_utf8_urldecode($_POST['rsargs'][12]);
            $lastname = NM_utf8_urldecode($_POST['rsargs'][13]);
            $anos_cumplidos = NM_utf8_urldecode($_POST['rsargs'][14]);
            $dpto_nacimiento = NM_utf8_urldecode($_POST['rsargs'][15]);
            $municipio_nacimiento = NM_utf8_urldecode($_POST['rsargs'][16]);
            $observaciones = NM_utf8_urldecode($_POST['rsargs'][17]);
            $login = NM_utf8_urldecode($_POST['rsargs'][18]);
            $pswd = NM_utf8_urldecode($_POST['rsargs'][19]);
            $confirm_pswd = NM_utf8_urldecode($_POST['rsargs'][20]);
            $photo = NM_utf8_urldecode($_POST['rsargs'][21]);
            $state = NM_utf8_urldecode($_POST['rsargs'][22]);
            $city = NM_utf8_urldecode($_POST['rsargs'][23]);
            $address = NM_utf8_urldecode($_POST['rsargs'][24]);
            $barrio = NM_utf8_urldecode($_POST['rsargs'][25]);
            $postalcode = NM_utf8_urldecode($_POST['rsargs'][26]);
            $zona = NM_utf8_urldecode($_POST['rsargs'][27]);
            $telefono = NM_utf8_urldecode($_POST['rsargs'][28]);
            $email = NM_utf8_urldecode($_POST['rsargs'][29]);
            $id_sede = NM_utf8_urldecode($_POST['rsargs'][30]);
            $id_jornada = NM_utf8_urldecode($_POST['rsargs'][31]);
            $id_nivel = NM_utf8_urldecode($_POST['rsargs'][32]);
            $grado_igreso = NM_utf8_urldecode($_POST['rsargs'][33]);
            $id_grupo = NM_utf8_urldecode($_POST['rsargs'][34]);
            $grado_anterior = NM_utf8_urldecode($_POST['rsargs'][35]);
            $last_year = NM_utf8_urldecode($_POST['rsargs'][36]);
            $nombre_ult_plantel = NM_utf8_urldecode($_POST['rsargs'][37]);
            $resultado = NM_utf8_urldecode($_POST['rsargs'][38]);
            $subsidado = NM_utf8_urldecode($_POST['rsargs'][39]);
            $interno = NM_utf8_urldecode($_POST['rsargs'][40]);
            $otro_modelo = NM_utf8_urldecode($_POST['rsargs'][41]);
            $caracter = NM_utf8_urldecode($_POST['rsargs'][42]);
            $especialidad = NM_utf8_urldecode($_POST['rsargs'][43]);
            $year_mat = NM_utf8_urldecode($_POST['rsargs'][44]);
            $matricular = NM_utf8_urldecode($_POST['rsargs'][45]);
            $eps = NM_utf8_urldecode($_POST['rsargs'][46]);
            $ips = NM_utf8_urldecode($_POST['rsargs'][47]);
            $ars = NM_utf8_urldecode($_POST['rsargs'][48]);
            $tipo_sangre = NM_utf8_urldecode($_POST['rsargs'][49]);
            $victima_conflicto = NM_utf8_urldecode($_POST['rsargs'][50]);
            $peso = NM_utf8_urldecode($_POST['rsargs'][51]);
            $talla = NM_utf8_urldecode($_POST['rsargs'][52]);
            $cobertura = NM_utf8_urldecode($_POST['rsargs'][53]);
            $vive_con = NM_utf8_urldecode($_POST['rsargs'][54]);
            $subsidio = NM_utf8_urldecode($_POST['rsargs'][55]);
            $estatus_vca = NM_utf8_urldecode($_POST['rsargs'][56]);
            $depto_expulsor = NM_utf8_urldecode($_POST['rsargs'][57]);
            $municipio_expulsor = NM_utf8_urldecode($_POST['rsargs'][58]);
            $fecha_expulsion = NM_utf8_urldecode($_POST['rsargs'][59]);
            $certificado = NM_utf8_urldecode($_POST['rsargs'][60]);
            $semestre = NM_utf8_urldecode($_POST['rsargs'][61]);
            $numero_carne_sisben = NM_utf8_urldecode($_POST['rsargs'][62]);
            $nivel_sisben = NM_utf8_urldecode($_POST['rsargs'][63]);
            $estrato = NM_utf8_urldecode($_POST['rsargs'][64]);
            $fuente_recurso = NM_utf8_urldecode($_POST['rsargs'][65]);
            $opcion = NM_utf8_urldecode($_POST['rsargs'][66]);
            $resguardo = NM_utf8_urldecode($_POST['rsargs'][67]);
            $negritudes = NM_utf8_urldecode($_POST['rsargs'][68]);
            $etnia = NM_utf8_urldecode($_POST['rsargs'][69]);
            $discapacidades = NM_utf8_urldecode($_POST['rsargs'][70]);
            $capacidades = NM_utf8_urldecode($_POST['rsargs'][71]);
            $photo_ul_name = NM_utf8_urldecode($_POST['rsargs'][72]);
            $photo_ul_type = NM_utf8_urldecode($_POST['rsargs'][73]);
            $photo_salva = NM_utf8_urldecode($_POST['rsargs'][74]);
            $photo_limpa = NM_utf8_urldecode($_POST['rsargs'][75]);
            $nm_form_submit = NM_utf8_urldecode($_POST['rsargs'][76]);
            $nmgp_url_saida = NM_utf8_urldecode($_POST['rsargs'][77]);
            $nmgp_opcao = NM_utf8_urldecode($_POST['rsargs'][78]);
            $nmgp_ancora = NM_utf8_urldecode($_POST['rsargs'][79]);
            $nmgp_num_form = NM_utf8_urldecode($_POST['rsargs'][80]);
            $nmgp_parms = NM_utf8_urldecode($_POST['rsargs'][81]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][82]);
            $csrf_token = NM_utf8_urldecode($_POST['rsargs'][83]);
        }
        if ('ajax_form_students_navigate_form' == $_POST['rs'])
        {
            $idstudents = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nm_form_submit = NM_utf8_urldecode($_POST['rsargs'][1]);
            $nmgp_opcao = NM_utf8_urldecode($_POST['rsargs'][2]);
            $nmgp_ordem = NM_utf8_urldecode($_POST['rsargs'][3]);
            $nmgp_fast_search = NM_utf8_urldecode($_POST['rsargs'][4]);
            $nmgp_cond_fast_search = NM_utf8_urldecode($_POST['rsargs'][5]);
            $nmgp_arg_fast_search = NM_utf8_urldecode($_POST['rsargs'][6]);
            $nmgp_arg_dyn_search = NM_utf8_urldecode($_POST['rsargs'][7]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][8]);
        }
    }

    if (!empty($glo_perfil))  
    { 
        $_SESSION['scriptcase']['glo_perfil'] = $glo_perfil;
    }   
    if (isset($glo_servidor)) 
    {
        $_SESSION['scriptcase']['glo_servidor'] = $glo_servidor;
    }
    if (isset($glo_banco)) 
    {
        $_SESSION['scriptcase']['glo_banco'] = $glo_banco;
    }
    if (isset($glo_tpbanco)) 
    {
        $_SESSION['scriptcase']['glo_tpbanco'] = $glo_tpbanco;
    }
    if (isset($glo_usuario)) 
    {
        $_SESSION['scriptcase']['glo_usuario'] = $glo_usuario;
    }
    if (isset($glo_senha)) 
    {
        $_SESSION['scriptcase']['glo_senha'] = $glo_senha;
    }
    if (isset($glo_senha_protect)) 
    {
        $_SESSION['scriptcase']['glo_senha_protect'] = $glo_senha_protect;
    }
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_students']['lig_edit_lookup']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_students']['lig_edit_lookup']     = false;
        $_SESSION['sc_session'][$script_case_init]['form_students']['lig_edit_lookup_cb']  = '';
        $_SESSION['sc_session'][$script_case_init]['form_students']['lig_edit_lookup_row'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_students']['embutida_call']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_students']['embutida_call'] = false;
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_students']['embutida_proc']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_students']['embutida_proc'] = false;
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_students']['embutida_liga_form_insert']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_students']['embutida_liga_form_insert'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_students']['embutida_liga_form_update']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_students']['embutida_liga_form_update'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_students']['embutida_liga_form_delete']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_students']['embutida_liga_form_delete'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_students']['embutida_liga_form_btn_nav']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_students']['embutida_liga_form_btn_nav'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_students']['embutida_liga_grid_edit']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_students']['embutida_liga_grid_edit'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_students']['embutida_liga_grid_edit_link']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_students']['embutida_liga_grid_edit_link'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_students']['embutida_liga_qtd_reg']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_students']['embutida_liga_qtd_reg'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_students']['embutida_liga_tp_pag']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_students']['embutida_liga_tp_pag'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_students']['run_modal']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_students']['run_modal'] = isset($_GET['nmgp_url_saida']) && 'modal' == $_GET['nmgp_url_saida'];
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && $_SESSION['sc_session'][$script_case_init]['form_students']['embutida_proc'])
    {
        return;
    }
    if (isset($script_case_init) && !is_array($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_students']['embutida_parms']))
    { 
        $tmp_nmgp_parms = '';
        if (isset($nmgp_parms) && '' != $nmgp_parms)
        {
            $tmp_nmgp_parms = $nmgp_parms . '?@?';
        }
        $nmgp_parms = $tmp_nmgp_parms . $_SESSION['sc_session'][$script_case_init]['form_students']['embutida_parms'];
        unset($_SESSION['sc_session'][$script_case_init]['form_students']['embutida_parms']);
    } 
    if (isset($nmgp_parms) && !empty($nmgp_parms) && !is_array($nmgp_parms)) 
    { 
        if (isset($_SESSION['nm_aba_bg_color'])) 
        { 
            unset($_SESSION['nm_aba_bg_color']);
        }   
        $nmgp_parms = NM_decode_input($nmgp_parms);
        $nmgp_parms = str_replace("@aspass@", "'", $nmgp_parms);
        $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
        $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
        $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
        $todo  = explode("?@?", $todox);
        $ix = 0;
        while (!empty($todo[$ix]))
        {
           $cadapar = explode("?#?", $todo[$ix]);
           if (1 < sizeof($cadapar))
           {
               if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
               {
                   $cadapar[0] = substr($cadapar[0], 11);
                   $cadapar[1] = $_SESSION[$cadapar[1]];
               }
               nm_limpa_str_form_students($cadapar[1]);
               if (isset($sc_conv_var[$cadapar[0]]))
               {
                   $cadapar[0] = $sc_conv_var[$cadapar[0]];
               }
               elseif (isset($sc_conv_var[strtolower($cadapar[0])]))
               {
                   $cadapar[0] = $sc_conv_var[strtolower($cadapar[0])];
               }
               if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
               $$cadapar[0] = $cadapar[1];
           }
           $ix++;
        }
        if (isset($entorno)) 
        {
            $_SESSION['entorno'] = $entorno;
        }
    } 
    elseif (isset($script_case_init) && !empty($script_case_init) && !is_array($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_students']['parms']))
    {
        if (!isset($nmgp_opcao) || ($nmgp_opcao != "incluir" && $nmgp_opcao != "novo" && $nmgp_opcao != "recarga" && $nmgp_opcao != "muda_form"))
        {
            $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_students']['parms']);
            $todo  = explode("?@?", $todox);
            $ix = 0;
            while (!empty($todo[$ix]))
            {
               $cadapar = explode("?#?", $todo[$ix]);
               if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
               {
                   $cadapar[0] = substr($cadapar[0], 11);
                   $cadapar[1] = $_SESSION[$cadapar[1]];
               }
               if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
               $$cadapar[0] = $cadapar[1];
               $ix++;
            }
        }
    } 
    if (isset($script_case_init) && $script_case_init != preg_replace('/[^0-9.]/', '', $script_case_init))
    {
        unset($script_case_init);
    }
    if (!isset($script_case_init) || empty($script_case_init) || is_array($script_case_init))
    {
        $script_case_init = rand(2, 10000);
    }
    $salva_run = "N";
    $salva_iframe = false;
    if (isset($_SESSION['sc_session'][$script_case_init]['form_students']['iframe_menu']))
    {
        $salva_iframe = $_SESSION['sc_session'][$script_case_init]['form_students']['iframe_menu'];
        unset($_SESSION['sc_session'][$script_case_init]['form_students']['iframe_menu']);
    }
    if (isset($_SESSION['sc_session'][$script_case_init]['form_students']['run_iframe']))
    {
        $salva_run = $_SESSION['sc_session'][$script_case_init]['form_students']['run_iframe'];
        unset($_SESSION['sc_session'][$script_case_init]['form_students']['run_iframe']);
    }
    if (isset($nm_run_menu) && $nm_run_menu == 1)
    {
        if (isset($_SESSION['scriptcase']['sc_aba_iframe']) && isset($_SESSION['scriptcase']['sc_apl_menu_atual']))
        {
            foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
            {
                if ($aba == $_SESSION['scriptcase']['sc_apl_menu_atual'])
                {
                    unset($_SESSION['scriptcase']['sc_aba_iframe'][$aba]);
                    break;
                }
            }
        }
        $_SESSION['scriptcase']['sc_apl_menu_atual'] = "form_students";
        $achou = false;
        if (isset($_SESSION['sc_session'][$script_case_init]))
        {
            foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'form_students' || $achou)
                {
                    unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                    if (!empty($_SESSION['sc_session'][$script_case_init][$nome_apl]))
                    {
                        $achou = true;
                    }
                }
            }
            if (!$achou && isset($nm_apl_menu))
            {
                foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
                {
                    if ($nome_apl == $nm_apl_menu || $achou)
                    {
                        $achou = true;
                        if ($nome_apl != $nm_apl_menu)
                        {
                            unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                        }
                    }
                }
            }
        }
        $_SESSION['sc_session'][$script_case_init]['form_students']['iframe_menu']  = true;
        $_SESSION['sc_session'][$script_case_init]['form_students']['mostra_cab']   = "S";
        $_SESSION['sc_session'][$script_case_init]['form_students']['run_iframe']   = "N";
        $_SESSION['sc_session'][$script_case_init]['form_students']['retorno_edit'] = "";
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['form_students']['run_iframe']  = $salva_run;
        $_SESSION['sc_session'][$script_case_init]['form_students']['iframe_menu'] = $salva_iframe;
    }

    if (!isset($_SESSION['sc_session'][$script_case_init]['form_students']['db_changed']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_students']['db_changed'] = false;
    }
    if (isset($_GET['nmgp_outra_jan']) && 'true' == $_GET['nmgp_outra_jan'] && isset($_GET['nmgp_url_saida']) && 'modal' == $_GET['nmgp_url_saida'])
    {
        $_SESSION['sc_session'][$script_case_init]['form_students']['db_changed'] = false;
    }

    if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'form_students')
    {
        $_SESSION['sc_session'][$script_case_init]['form_students']['sc_outra_jan'] = true;
         unset($_SESSION['scriptcase']['sc_outra_jan']);
    }
    if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
    {
        if (isset($nmgp_url_saida) && $nmgp_url_saida == "modal")
        {
            $_SESSION['sc_session'][$script_case_init]['form_students']['sc_modal'] = true;
            $nm_url_saida = "form_students_fim.php"; 
        }
        $nm_apl_dependente = 0;
        $_SESSION['sc_session'][$script_case_init]['form_students']['sc_outra_jan'] = true;
    }
    $STR_lang    = (isset($_SESSION['scriptcase']['str_lang']) && !empty($_SESSION['scriptcase']['str_lang'])) ? $_SESSION['scriptcase']['str_lang'] : "es";
    $NM_arq_lang = "../_lib/lang/" . $STR_lang . ".lang.php";
    $Nm_lang = array();
    if (is_file($NM_arq_lang))
    {
        $Lixo = file($NM_arq_lang);
        foreach ($Lixo as $Cada_lin) 
        {
            if (strpos($Cada_lin, "array()") === false && (trim($Cada_lin) != "<?php")  && (trim($Cada_lin) != "?" . ">"))
            {
                eval (str_replace("\$this->", "\$", $Cada_lin));
            }
        }
    }
    $_SESSION['scriptcase']['charset'] = (isset($Nm_lang['Nm_charset']) && !empty($Nm_lang['Nm_charset'])) ? $Nm_lang['Nm_charset'] : "UTF-8";
    ini_set('default_charset', $_SESSION['scriptcase']['charset']);
    foreach ($Nm_lang as $ind => $dados)
    {
       if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
       {
           $Nm_lang[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
    }

    if (!isset($_SESSION['sc_session'][$script_case_init]['form_students']['initialize']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_students']['initialize'] = true;
    }
    elseif (!isset($_SERVER['HTTP_REFERER']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_students']['initialize'] = false;
    }
    elseif (false === strpos($_SERVER['HTTP_REFERER'], '/form_students/'))
    {
        $_SESSION['sc_session'][$script_case_init]['form_students']['initialize'] = true;
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['form_students']['initialize'] = false;
    }

    if (isset($_SESSION['sc_session'][$script_case_init]['form_students']['first_time']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_students']['first_time'] = false;
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['form_students']['first_time'] = true;
    }

    $_SESSION['sc_session'][$script_case_init]['form_students']['menu_desenv'] = false;   
    if (!defined("SC_ERROR_HANDLER"))
    {
        define("SC_ERROR_HANDLER", 1);
    }
    include_once(dirname(__FILE__) . "/form_students_erro.php");
    $nm_browser = strpos($_SERVER['HTTP_USER_AGENT'], "Konqueror") ;
    if (is_int($nm_browser))   
    {
        $nm_browser = "Konqueror"; 
    } 
    else  
    {
        $nm_browser = strpos($_SERVER['HTTP_USER_AGENT'], "Opera") ;
        if (is_int($nm_browser))   
        {
            $nm_browser = "Opera"; 
        }
    } 
    $_SESSION['scriptcase']['change_regional_old'] = '';
    $_SESSION['scriptcase']['change_regional_new'] = '';
    if (!empty($nmgp_opcao) && ($nmgp_opcao == "change_lang_t" || $nmgp_opcao == "change_lang_b" || $nmgp_opcao == "change_lang_f" || $nmgp_opcao == "force_lang"))  
    {
        $Temp_lang = $nmgp_opcao == "force_lang" ? explode(";" , $nmgp_idioma) : explode(";" , $nmgp_idioma_novo);  
        if (isset($Temp_lang[0]) && !empty($Temp_lang[0]))  
        { 
            $_SESSION['scriptcase']['str_lang'] = $Temp_lang[0];
        } 
        if (isset($Temp_lang[1]) && !empty($Temp_lang[1])) 
        { 
            $_SESSION['scriptcase']['change_regional_old'] = (isset($_SESSION['scriptcase']['str_conf_reg']) && !empty($_SESSION['scriptcase']['str_conf_reg'])) ? $_SESSION['scriptcase']['str_conf_reg'] : "es_es";
            $_SESSION['scriptcase']['str_conf_reg']        = $Temp_lang[1];
            $_SESSION['scriptcase']['change_regional_new'] = $_SESSION['scriptcase']['str_conf_reg'];
        } 
        $nmgp_opcao = $nmgp_opcao == "force_lang" ? "inicio" : "igual";
    } 
    if (!empty($nmgp_opcao) && ($nmgp_opcao == "change_schema_t" || $nmgp_opcao == "change_schema_b" || $nmgp_opcao == "change_schema_f"))  
    {
        if ($nmgp_opcao == "change_schema_t")  
        {
            $nmgp_schema = $nmgp_schema_t . "/" . $nmgp_schema_t;  
        } 
        elseif ($nmgp_opcao == "change_schema_b")  
        {
            $nmgp_schema = $nmgp_schema_b . "/" . $nmgp_schema_b;  
        } 
        else 
        {
            $nmgp_schema = $nmgp_schema_f . "/" . $nmgp_schema_f;  
        } 
        $_SESSION['scriptcase']['str_schema_all'] = $nmgp_schema;
        $nmgp_opcao = "recarga";  
    } 
    if (!empty($nmgp_opcao) && $nmgp_opcao == "lookup")  
    {
        $nm_opc_lookup = $nmgp_opcao;
    }
    elseif (!empty($nmgp_opcao) && $nmgp_opcao == "formphp")  
    {
        $nm_opc_form_php = $nmgp_opcao;
    }
    else
    {
        if (!empty($nmgp_opcao))  
        {
            $_SESSION['sc_session'][$script_case_init]['form_students']['opcao'] = $nmgp_opcao ; 
        }
        if (isset($_POST["entorno"])) 
        {
            $_SESSION['entorno'] = $_POST["entorno"];
            nm_limpa_str_form_students($_SESSION['entorno']);
        }
        if (isset($_GET["entorno"])) 
        {
            $_SESSION['entorno'] = $_GET["entorno"];
            nm_limpa_str_form_students($_SESSION['entorno']);
        }
        if (!empty($_SESSION['sc_session'][$script_case_init]['form_students']['volta_redirect_apl']))
        {
            $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['sc_session'][$script_case_init]['form_students']['volta_redirect_apl']; 
            $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['form_students']['volta_redirect_tp']; 
            $_SESSION['sc_session'][$script_case_init]['form_students']['volta_redirect_apl'] = "";
            $_SESSION['sc_session'][$script_case_init]['form_students']['volta_redirect_tp'] = "";
            $nm_url_saida = "form_students_fim.php"; 
        }
        elseif (isset($_SESSION['sc_session'][$script_case_init]['form_students']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['form_students']['sc_outra_jan'] == 'true')
        {
               $nm_url_saida = "form_students_fim.php"; 
        }
        elseif ($_SESSION['sc_session'][$script_case_init]['form_students']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_students']['run_iframe'] != "R")
        {
           $nm_url_saida = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ""; 
           $nm_url_saida = str_replace("_fim.php", ".php", $nm_url_saida); 
            $nm_saida_global = $nm_url_saida;
            if (!empty($nmgp_url_saida) && empty($_SESSION['sc_session'][$script_case_init]['form_students']['retorno_edit'])) 
            {
                $_SESSION['sc_session'][$script_case_init]['form_students']['retorno_edit'] = $nmgp_url_saida ; 
            } 
            if (!empty($_SESSION['sc_session'][$script_case_init]['form_students']['retorno_edit'])) 
            {
                $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['form_students']['retorno_edit'] . "?script_case_init=" . $script_case_init . "&script_case_session=" . session_id();  
                $nm_apl_dependente = 1 ; 
                $nm_saida_global = $nm_url_saida;
            } 
            if ($nm_apl_dependente != 1) 
            { 
                $_SESSION['sc_session'][$script_case_init]['form_students']['run_iframe'] = "N"; 
            } 
            if ($_SESSION['sc_session'][$script_case_init]['form_students']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_students']['run_iframe'] != "R" && (!isset($_SESSION['sc_session'][$script_case_init]['form_students']['embutida_call']) || !$_SESSION['sc_session'][$script_case_init]['form_students']['embutida_call']))
            { 
                $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $nm_url_saida; 
                $nm_url_saida = "form_students_fim.php"; 
                $_SESSION['scriptcase']['sc_tp_saida'] = "P"; 
                if ($nm_apl_dependente == 1) 
                { 
                    $_SESSION['scriptcase']['sc_tp_saida'] = "D"; 
                } 
                if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1) 
                { 
                    $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['scriptcase']['nm_sc_retorno']; 
                } 
            } 
        }
        if (empty($_SESSION['sc_session'][$script_case_init]['form_students']['volta_tp']) && $_SESSION['sc_session'][$script_case_init]['form_students']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_students']['run_iframe'] != "R")
        {
            $_SESSION['sc_session'][$script_case_init]['form_students']['volta_php'] = $nm_url_saida;
            $_SESSION['sc_session'][$script_case_init]['form_students']['volta_apl'] = $nm_saida_global;
            $_SESSION['sc_session'][$script_case_init]['form_students']['volta_ss']  = (isset($_SESSION['scriptcase']['sc_url_saida'][$script_case_init])) ? $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] : "";
            $_SESSION['sc_session'][$script_case_init]['form_students']['volta_dep'] = $nm_apl_dependente;
            $_SESSION['sc_session'][$script_case_init]['form_students']['volta_tp']  = (isset($_SESSION['scriptcase']['sc_tp_saida'])) ? $_SESSION['scriptcase']['sc_tp_saida'] : "";
        }
        $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['form_students']['volta_php'];
        $nm_saida_global = $_SESSION['sc_session'][$script_case_init]['form_students']['volta_php'];
        $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['form_students']['volta_dep'];
        if ($_SESSION['sc_session'][$script_case_init]['form_students']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_students']['run_iframe'] != "R" && !empty($_SESSION['sc_session'][$script_case_init]['form_students']['volta_ss'])) 
        { 
            $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['sc_session'][$script_case_init]['form_students']['volta_ss'];
            $_SESSION['scriptcase']['sc_tp_saida']  = $_SESSION['sc_session'][$script_case_init]['form_students']['volta_tp'];
        } 
        if ($_SESSION['sc_session'][$script_case_init]['form_students']['run_iframe'] == "F" || $_SESSION['sc_session'][$script_case_init]['form_students']['run_iframe'] == "R") 
        { 
            if (!empty($nmgp_url_saida) && empty($_SESSION['sc_session'][$script_case_init]['form_students']['retorno_edit'])) 
            {
                $_SESSION['sc_session'][$script_case_init]['form_students']['retorno_edit'] = $nmgp_url_saida . "?script_case_init=" . $script_case_init . "&script_case_session=" . session_id(); 
            } 
        } 
        if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['sc_session'][$script_case_init]['form_students']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_students']['run_iframe'] != "R") 
        { 
            $_SESSION['sc_session'][$script_case_init]['form_students']['menu_desenv'] = true;   
        } 
    }
    if (isset($nmgp_redir)) 
    { 
        $_SESSION['sc_session'][$script_case_init]['form_students']['redir'] = $nmgp_redir;   
    } 
    if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
    {
        $_SESSION['sc_session'][$script_case_init]['form_students']['sc_outra_jan'] = true;
         if ($nmgp_url_saida == "modal")
         {
             $_SESSION['sc_session'][$script_case_init]['form_students']['sc_modal'] = true;
             $nm_url_saida = "form_students_fim.php"; 
         }
    }
    if (isset($_SESSION['sc_session'][$script_case_init]['form_students']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['form_students']['sc_outra_jan'])
    {
        $nm_apl_dependente = 0;
    }
    $GLOBALS["NM_ERRO_IBASE"] = 0;  
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_students'] = "on";
    } 
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_students']) || $_SESSION['scriptcase']['sc_apl_seg']['form_students'] != "on")
    { 
        $NM_Mens_Erro = $Nm_lang['lang_errm_unth_user'];
        $nm_botao_ok = ($_SESSION['sc_session'][$script_case_init]['form_students']['iframe_menu']) ? false : true;
        if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
        {
            foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
            {
                if (in_array("form_students", $apls_aba))
                {
                    $nm_botao_ok = false;
                     break;
                }
            }
        }
      $str_schema_app = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc8_Citrine/Sc8_Citrine";
       $str_button_app = trim($str_button);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

        <HTML>
         <HEAD>
          <TITLE></TITLE>
          <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

        if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
        {
?>
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
        }

?>
          <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>          <META http-equiv="Pragma" content="no-cache"/>
          <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $str_schema_app ?>_form.css" />
          <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $str_schema_app ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
          <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $str_button_app . '/' . $str_button_app ?>.css" />
         </HEAD>
         <body class="scFormPage">
          <div class="scFormBorder">
          <table align="center" style="width: 100%" class="scFormTable"><tr><td class="scFormDataOdd" style="padding: 15px 30px; text-align: center">
           <?php echo $NM_Mens_Erro; ?>
<?php
        if ($nm_botao_ok)
        {
?>
          <br />
          <form name="Fseg" method="post" 
                              action="<?php echo $nm_url_saida; ?>" 
                              target="_self"> 
           <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($script_case_init); ?>"/> 
           <input type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"/> 
           <input type="submit" name="sc_sai_seg" value="OK" class="" > 
          </form> 
          <script type="text/javascript">
            function nm_move()
            { }
            function nm_atualiza()
            { }
          </script> 
<?php
        }
?>
          </td></tr></table>
          </div>
<?php
       if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']))
       {
?>
<br /><br /><br />
<div class="scFormBorder">
 <table align="center" style="width: 450px" class="scFormTable">
  <tr>
   <td class="scFormDataOdd" style="padding: 15px 30px">
    <?php echo $Nm_lang['lang_errm_unth_hwto']; ?>
   </td>
  </tr>
 </table>
</div>
<?php
       }
?>
         </body>
        </HTML>
<?php
        exit;
    } 
    $inicial_form_students = new form_students_edit();
    $inicial_form_students->inicializa();

    $inicial_form_students->contr_form_students->NM_ajax_info['select_html'] = array();
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['estatus'] = " onClick=\"\" ";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['genero'] = " onClick=\"\" ";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['tipo_identificacion'] = "class=\"sc-js-input scFormObjectOdd css_tipo_identificacion_obj\" style=\"\" id=\"id_sc_field_tipo_identificacion\" name=\"tipo_identificacion\" size=\"1\" alt=\"{type: 'select', enterTab: false}\"";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['departanebti_expedicion'] = "class=\"sc-js-input scFormObjectOdd css_departanebti_expedicion_obj\" style=\"\" id=\"id_sc_field_departanebti_expedicion\" name=\"departanebti_expedicion\" size=\"1\" alt=\"{type: 'select', enterTab: false}\"";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['municipio_expedicion'] = "class=\"sc-js-input scFormObjectOdd css_municipio_expedicion_obj\" style=\"\" id=\"id_sc_field_municipio_expedicion\" name=\"municipio_expedicion\" size=\"1\" alt=\"{type: 'select', enterTab: false}\"";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['dpto_nacimiento'] = "class=\"sc-js-input scFormObjectOdd css_dpto_nacimiento_obj\" style=\"\" id=\"id_sc_field_dpto_nacimiento\" name=\"dpto_nacimiento\" size=\"1\" alt=\"{type: 'select', enterTab: false}\"";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['municipio_nacimiento'] = "class=\"sc-js-input scFormObjectOdd css_municipio_nacimiento_obj\" style=\"\" id=\"id_sc_field_municipio_nacimiento\" name=\"municipio_nacimiento\" size=\"1\" alt=\"{type: 'select', enterTab: false}\"";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['state'] = "class=\"sc-js-input scFormObjectOdd css_state_obj\" style=\"\" id=\"id_sc_field_state\" name=\"state\" size=\"1\" alt=\"{type: 'select', enterTab: false}\"";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['city'] = "class=\"sc-js-input scFormObjectOdd css_city_obj\" style=\"\" id=\"id_sc_field_city\" name=\"city\" size=\"1\" alt=\"{type: 'select', enterTab: false}\"";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['zona'] = " onClick=\"\" ";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['id_sede'] = "class=\"sc-js-input scFormObjectOdd css_id_sede_obj\" style=\"\" id=\"id_sc_field_id_sede\" name=\"id_sede\" size=\"1\" alt=\"{type: 'select', enterTab: false}\"";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['id_jornada'] = "class=\"sc-js-input scFormObjectOdd css_id_jornada_obj\" style=\"\" id=\"id_sc_field_id_jornada\" name=\"id_jornada\" size=\"1\" alt=\"{type: 'select', enterTab: false}\"";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['id_nivel'] = "class=\"sc-js-input scFormObjectOdd css_id_nivel_obj\" style=\"\" id=\"id_sc_field_id_nivel\" name=\"id_nivel\" size=\"1\" alt=\"{type: 'select', enterTab: false}\"";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['grado_igreso'] = "class=\"sc-js-input scFormObjectOdd css_grado_igreso_obj\" style=\"\" id=\"id_sc_field_grado_igreso\" name=\"grado_igreso\" size=\"1\" alt=\"{type: 'select', enterTab: false}\"";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['id_grupo'] = "class=\"sc-js-input scFormObjectOdd css_id_grupo_obj\" style=\"\" id=\"id_sc_field_id_grupo\" name=\"id_grupo\" size=\"1\" alt=\"{type: 'select', enterTab: false}\"";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['grado_anterior'] = "class=\"sc-js-input scFormObjectOdd css_grado_anterior_obj\" style=\"\" id=\"id_sc_field_grado_anterior\" name=\"grado_anterior\" size=\"1\" alt=\"{type: 'select', enterTab: false}\"";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['resultado'] = "class=\"sc-js-input scFormObjectOdd css_resultado_obj\" style=\"\" id=\"id_sc_field_resultado\" name=\"resultado\" size=\"1\" alt=\"{type: \'select\', enterTab: false}\"";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['subsidado'] = " onClick=\"\" ";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['interno'] = " onClick=\"\" ";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['otro_modelo'] = "class=\"sc-js-input scFormObjectOdd css_otro_modelo_obj\" style=\"\" id=\"id_sc_field_otro_modelo\" name=\"otro_modelo\" size=\"1\" alt=\"{type: \'select\', enterTab: false}\"";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['caracter'] = " onClick=\"\" ";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['especialidad'] = "class=\"sc-js-input scFormObjectOdd css_especialidad_obj\" style=\"\" id=\"id_sc_field_especialidad\" name=\"especialidad\" size=\"1\" alt=\"{type: \'select\', enterTab: false}\"";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['year_mat'] = "class=\"sc-js-input scFormObjectOdd css_year_mat_obj\" style=\"\" id=\"id_sc_field_year_mat\" name=\"year_mat\" size=\"1\" alt=\"{type: \'select\', enterTab: false}\"";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['matricular'] = "class=\"sc-js-input scFormObjectOdd css_matricular_obj\" style=\"\" id=\"id_sc_field_matricular\" name=\"matricular\" size=\"1\" alt=\"{type: \'select\', enterTab: false}\"";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['eps'] = "class=\"sc-js-input scFormObjectOdd css_eps_obj\" style=\"\" id=\"id_sc_field_eps\" name=\"eps\" size=\"1\" alt=\"{type: 'select', enterTab: false}\"";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['tipo_sangre'] = "class=\"sc-js-input scFormObjectOdd css_tipo_sangre_obj\" style=\"\" id=\"id_sc_field_tipo_sangre\" name=\"tipo_sangre\" size=\"1\" alt=\"{type: 'select', enterTab: false}\"";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['victima_conflicto'] = "class=\"sc-js-input scFormObjectOdd css_victima_conflicto_obj\" style=\"\" id=\"id_sc_field_victima_conflicto\" name=\"victima_conflicto\" size=\"1\" alt=\"{type: \'select\', enterTab: false}\"";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['estatus_vca'] = "class=\"sc-js-input scFormObjectOdd css_estatus_vca_obj\" style=\"\" id=\"id_sc_field_estatus_vca\" name=\"estatus_vca\" size=\"1\" alt=\"{type: 'select', enterTab: false}\"";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['depto_expulsor'] = "class=\"sc-js-input scFormObjectOdd css_depto_expulsor_obj\" style=\"\" id=\"id_sc_field_depto_expulsor\" name=\"depto_expulsor\" size=\"1\" alt=\"{type: 'select', enterTab: false}\"";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['municipio_expulsor'] = "class=\"sc-js-input scFormObjectOdd css_municipio_expulsor_obj\" style=\"\" id=\"id_sc_field_municipio_expulsor\" name=\"municipio_expulsor\" size=\"1\" alt=\"{type: 'select', enterTab: false}\"";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['certificado'] = " onClick=\"\" ";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['estrato'] = "class=\"sc-js-input scFormObjectOdd css_estrato_obj\" style=\"\" id=\"id_sc_field_estrato\" name=\"estrato\" size=\"1\" alt=\"{type: 'select', enterTab: false}\"";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['fuente_recurso'] = "class=\"sc-js-input scFormObjectOdd css_fuente_recurso_obj\" style=\"\" id=\"id_sc_field_fuente_recurso\" name=\"fuente_recurso\" size=\"1\" alt=\"{type: 'select', enterTab: false}\"";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['opcion'] = "class=\"sc-js-input scFormObjectOdd css_opcion_obj\" style=\"\" id=\"id_sc_field_opcion\" name=\"opcion\" size=\"1\" alt=\"{type: 'select', enterTab: false}\"";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['negritudes'] = " onClick=\"\" ";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['discapacidades'] = "class=\"sc-js-input scFormObjectOdd css_discapacidades_obj\" style=\"\" id=\"id_sc_field_discapacidades\" name=\"discapacidades\" size=\"1\" alt=\"{type: 'select', enterTab: false}\"";
    $inicial_form_students->contr_form_students->NM_ajax_info['select_html']['capacidades'] = "class=\"sc-js-input scFormObjectOdd css_capacidades_obj\" style=\"\" id=\"id_sc_field_capacidades\" name=\"capacidades\" size=\"1\" alt=\"{type: 'select', enterTab: false}\"";

    if (!defined('SC_SAJAX_LOADED'))
    {
        include_once(dirname(__FILE__) . '/form_students_sajax.php');
        define('SC_SAJAX_LOADED', 'YES');
    }
    if (!class_exists('Services_JSON'))
    {
        include_once(dirname(__FILE__) . '/form_students_json.php');
    }
    $sajax_request_type = "POST";
    sajax_init();
    //$sajax_debug_mode = 1;
    sajax_export("ajax_form_students_validate_estatus");
    sajax_export("ajax_form_students_validate_fecha_matricula");
    sajax_export("ajax_form_students_validate_genero");
    sajax_export("ajax_form_students_validate_fecha_nacimiento");
    sajax_export("ajax_form_students_validate_primer_apellido");
    sajax_export("ajax_form_students_validate_segundo_apellido");
    sajax_export("ajax_form_students_validate_primer_nombre");
    sajax_export("ajax_form_students_validate_segundo_nombre");
    sajax_export("ajax_form_students_validate_tipo_identificacion");
    sajax_export("ajax_form_students_validate_numero_documento");
    sajax_export("ajax_form_students_validate_departanebti_expedicion");
    sajax_export("ajax_form_students_validate_municipio_expedicion");
    sajax_export("ajax_form_students_validate_firstname");
    sajax_export("ajax_form_students_validate_lastname");
    sajax_export("ajax_form_students_validate_anos_cumplidos");
    sajax_export("ajax_form_students_validate_dpto_nacimiento");
    sajax_export("ajax_form_students_validate_municipio_nacimiento");
    sajax_export("ajax_form_students_validate_observaciones");
    sajax_export("ajax_form_students_validate_login");
    sajax_export("ajax_form_students_validate_pswd");
    sajax_export("ajax_form_students_validate_confirm_pswd");
    sajax_export("ajax_form_students_validate_photo");
    sajax_export("ajax_form_students_validate_state");
    sajax_export("ajax_form_students_validate_city");
    sajax_export("ajax_form_students_validate_address");
    sajax_export("ajax_form_students_validate_barrio");
    sajax_export("ajax_form_students_validate_postalcode");
    sajax_export("ajax_form_students_validate_zona");
    sajax_export("ajax_form_students_validate_telefono");
    sajax_export("ajax_form_students_validate_email");
    sajax_export("ajax_form_students_validate_id_sede");
    sajax_export("ajax_form_students_validate_id_jornada");
    sajax_export("ajax_form_students_validate_id_nivel");
    sajax_export("ajax_form_students_validate_grado_igreso");
    sajax_export("ajax_form_students_validate_id_grupo");
    sajax_export("ajax_form_students_validate_grado_anterior");
    sajax_export("ajax_form_students_validate_last_year");
    sajax_export("ajax_form_students_validate_nombre_ult_plantel");
    sajax_export("ajax_form_students_validate_resultado");
    sajax_export("ajax_form_students_validate_subsidado");
    sajax_export("ajax_form_students_validate_interno");
    sajax_export("ajax_form_students_validate_otro_modelo");
    sajax_export("ajax_form_students_validate_caracter");
    sajax_export("ajax_form_students_validate_especialidad");
    sajax_export("ajax_form_students_validate_year_mat");
    sajax_export("ajax_form_students_validate_matricular");
    sajax_export("ajax_form_students_validate_eps");
    sajax_export("ajax_form_students_validate_ips");
    sajax_export("ajax_form_students_validate_ars");
    sajax_export("ajax_form_students_validate_tipo_sangre");
    sajax_export("ajax_form_students_validate_victima_conflicto");
    sajax_export("ajax_form_students_validate_peso");
    sajax_export("ajax_form_students_validate_talla");
    sajax_export("ajax_form_students_validate_cobertura");
    sajax_export("ajax_form_students_validate_vive_con");
    sajax_export("ajax_form_students_validate_subsidio");
    sajax_export("ajax_form_students_validate_estatus_vca");
    sajax_export("ajax_form_students_validate_depto_expulsor");
    sajax_export("ajax_form_students_validate_municipio_expulsor");
    sajax_export("ajax_form_students_validate_fecha_expulsion");
    sajax_export("ajax_form_students_validate_certificado");
    sajax_export("ajax_form_students_validate_semestre");
    sajax_export("ajax_form_students_validate_numero_carne_sisben");
    sajax_export("ajax_form_students_validate_nivel_sisben");
    sajax_export("ajax_form_students_validate_estrato");
    sajax_export("ajax_form_students_validate_fuente_recurso");
    sajax_export("ajax_form_students_validate_opcion");
    sajax_export("ajax_form_students_validate_resguardo");
    sajax_export("ajax_form_students_validate_negritudes");
    sajax_export("ajax_form_students_validate_etnia");
    sajax_export("ajax_form_students_validate_discapacidades");
    sajax_export("ajax_form_students_validate_capacidades");
    sajax_export("ajax_form_students_validate_novedades");
    sajax_export("ajax_form_students_refresh_departanebti_expedicion");
    sajax_export("ajax_form_students_refresh_dpto_nacimiento");
    sajax_export("ajax_form_students_refresh_state");
    sajax_export("ajax_form_students_refresh_id_nivel");
    sajax_export("ajax_form_students_refresh_grado_igreso");
    sajax_export("ajax_form_students_refresh_depto_expulsor");
    sajax_export("ajax_form_students_event_fecha_nacimiento_onchange");
    sajax_export("ajax_form_students_event_victima_conflicto_onchange");
    sajax_export("ajax_form_students_submit_form");
    sajax_export("ajax_form_students_navigate_form");
    sajax_handle_client_request();

    $inicial_form_students->contr_form_students->controle();
//
    function nm_limpa_str_form_students(&$str)
    {
        if (get_magic_quotes_gpc())
        {
            if (is_array($str))
            {
                foreach ($str as $x => $cada_str)
                {
                    $str[$x] = str_replace("@aspasd@", '"', $str[$x]);
                    $str[$x] = stripslashes($str[$x]);
                }
            }
            else
            {
                $str = str_replace("@aspasd@", '"', $str);
                $str = stripslashes($str);
            }
        }
    }

    function ajax_form_students_validate_estatus($estatus, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_estatus';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'estatus' => NM_utf8_urldecode($estatus),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_estatus

    function ajax_form_students_validate_fecha_matricula($fecha_matricula, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_fecha_matricula';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'fecha_matricula' => NM_utf8_urldecode($fecha_matricula),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_fecha_matricula

    function ajax_form_students_validate_genero($genero, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_genero';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'genero' => NM_utf8_urldecode($genero),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_genero

    function ajax_form_students_validate_fecha_nacimiento($fecha_nacimiento, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_fecha_nacimiento';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'fecha_nacimiento' => NM_utf8_urldecode($fecha_nacimiento),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_fecha_nacimiento

    function ajax_form_students_validate_primer_apellido($primer_apellido, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_primer_apellido';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'primer_apellido' => NM_utf8_urldecode($primer_apellido),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_primer_apellido

    function ajax_form_students_validate_segundo_apellido($segundo_apellido, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_segundo_apellido';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'segundo_apellido' => NM_utf8_urldecode($segundo_apellido),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_segundo_apellido

    function ajax_form_students_validate_primer_nombre($primer_nombre, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_primer_nombre';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'primer_nombre' => NM_utf8_urldecode($primer_nombre),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_primer_nombre

    function ajax_form_students_validate_segundo_nombre($segundo_nombre, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_segundo_nombre';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'segundo_nombre' => NM_utf8_urldecode($segundo_nombre),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_segundo_nombre

    function ajax_form_students_validate_tipo_identificacion($tipo_identificacion, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_tipo_identificacion';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'tipo_identificacion' => NM_utf8_urldecode($tipo_identificacion),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_tipo_identificacion

    function ajax_form_students_validate_numero_documento($numero_documento, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_numero_documento';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'numero_documento' => NM_utf8_urldecode($numero_documento),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_numero_documento

    function ajax_form_students_validate_departanebti_expedicion($departanebti_expedicion, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_departanebti_expedicion';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'departanebti_expedicion' => NM_utf8_urldecode($departanebti_expedicion),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_departanebti_expedicion

    function ajax_form_students_validate_municipio_expedicion($municipio_expedicion, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_municipio_expedicion';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'municipio_expedicion' => NM_utf8_urldecode($municipio_expedicion),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_municipio_expedicion

    function ajax_form_students_validate_firstname($firstname, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_firstname';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'firstname' => NM_utf8_urldecode($firstname),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_firstname

    function ajax_form_students_validate_lastname($lastname, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_lastname';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'lastname' => NM_utf8_urldecode($lastname),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_lastname

    function ajax_form_students_validate_anos_cumplidos($anos_cumplidos, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_anos_cumplidos';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'anos_cumplidos' => NM_utf8_urldecode($anos_cumplidos),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_anos_cumplidos

    function ajax_form_students_validate_dpto_nacimiento($dpto_nacimiento, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_dpto_nacimiento';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'dpto_nacimiento' => NM_utf8_urldecode($dpto_nacimiento),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_dpto_nacimiento

    function ajax_form_students_validate_municipio_nacimiento($municipio_nacimiento, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_municipio_nacimiento';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'municipio_nacimiento' => NM_utf8_urldecode($municipio_nacimiento),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_municipio_nacimiento

    function ajax_form_students_validate_observaciones($observaciones, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_observaciones';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'observaciones' => NM_utf8_urldecode($observaciones),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_observaciones

    function ajax_form_students_validate_login($login, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_login';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'login' => NM_utf8_urldecode($login),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_login

    function ajax_form_students_validate_pswd($pswd, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_pswd';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'pswd' => NM_utf8_urldecode($pswd),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_pswd

    function ajax_form_students_validate_confirm_pswd($confirm_pswd, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_confirm_pswd';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'confirm_pswd' => NM_utf8_urldecode($confirm_pswd),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_confirm_pswd

    function ajax_form_students_validate_photo($photo, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_photo';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'photo' => NM_utf8_urldecode($photo),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_photo

    function ajax_form_students_validate_state($state, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_state';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'state' => NM_utf8_urldecode($state),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_state

    function ajax_form_students_validate_city($city, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_city';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'city' => NM_utf8_urldecode($city),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_city

    function ajax_form_students_validate_address($address, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_address';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'address' => NM_utf8_urldecode($address),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_address

    function ajax_form_students_validate_barrio($barrio, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_barrio';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'barrio' => NM_utf8_urldecode($barrio),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_barrio

    function ajax_form_students_validate_postalcode($postalcode, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_postalcode';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'postalcode' => NM_utf8_urldecode($postalcode),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_postalcode

    function ajax_form_students_validate_zona($zona, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_zona';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'zona' => NM_utf8_urldecode($zona),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_zona

    function ajax_form_students_validate_telefono($telefono, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_telefono';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'telefono' => NM_utf8_urldecode($telefono),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_telefono

    function ajax_form_students_validate_email($email, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_email';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'email' => NM_utf8_urldecode($email),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_email

    function ajax_form_students_validate_id_sede($id_sede, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_id_sede';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'id_sede' => NM_utf8_urldecode($id_sede),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_id_sede

    function ajax_form_students_validate_id_jornada($id_jornada, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_id_jornada';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'id_jornada' => NM_utf8_urldecode($id_jornada),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_id_jornada

    function ajax_form_students_validate_id_nivel($id_nivel, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_id_nivel';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'id_nivel' => NM_utf8_urldecode($id_nivel),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_id_nivel

    function ajax_form_students_validate_grado_igreso($grado_igreso, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_grado_igreso';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'grado_igreso' => NM_utf8_urldecode($grado_igreso),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_grado_igreso

    function ajax_form_students_validate_id_grupo($id_grupo, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_id_grupo';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'id_grupo' => NM_utf8_urldecode($id_grupo),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_id_grupo

    function ajax_form_students_validate_grado_anterior($grado_anterior, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_grado_anterior';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'grado_anterior' => NM_utf8_urldecode($grado_anterior),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_grado_anterior

    function ajax_form_students_validate_last_year($last_year, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_last_year';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'last_year' => NM_utf8_urldecode($last_year),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_last_year

    function ajax_form_students_validate_nombre_ult_plantel($nombre_ult_plantel, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_nombre_ult_plantel';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'nombre_ult_plantel' => NM_utf8_urldecode($nombre_ult_plantel),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_nombre_ult_plantel

    function ajax_form_students_validate_resultado($resultado, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_resultado';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'resultado' => NM_utf8_urldecode($resultado),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_resultado

    function ajax_form_students_validate_subsidado($subsidado, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_subsidado';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'subsidado' => NM_utf8_urldecode($subsidado),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_subsidado

    function ajax_form_students_validate_interno($interno, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_interno';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'interno' => NM_utf8_urldecode($interno),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_interno

    function ajax_form_students_validate_otro_modelo($otro_modelo, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_otro_modelo';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'otro_modelo' => NM_utf8_urldecode($otro_modelo),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_otro_modelo

    function ajax_form_students_validate_caracter($caracter, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_caracter';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'caracter' => NM_utf8_urldecode($caracter),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_caracter

    function ajax_form_students_validate_especialidad($especialidad, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_especialidad';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'especialidad' => NM_utf8_urldecode($especialidad),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_especialidad

    function ajax_form_students_validate_year_mat($year_mat, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_year_mat';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'year_mat' => NM_utf8_urldecode($year_mat),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_year_mat

    function ajax_form_students_validate_matricular($matricular, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_matricular';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'matricular' => NM_utf8_urldecode($matricular),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_matricular

    function ajax_form_students_validate_eps($eps, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_eps';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'eps' => NM_utf8_urldecode($eps),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_eps

    function ajax_form_students_validate_ips($ips, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_ips';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'ips' => NM_utf8_urldecode($ips),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_ips

    function ajax_form_students_validate_ars($ars, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_ars';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'ars' => NM_utf8_urldecode($ars),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_ars

    function ajax_form_students_validate_tipo_sangre($tipo_sangre, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_tipo_sangre';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'tipo_sangre' => NM_utf8_urldecode($tipo_sangre),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_tipo_sangre

    function ajax_form_students_validate_victima_conflicto($victima_conflicto, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_victima_conflicto';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'victima_conflicto' => NM_utf8_urldecode($victima_conflicto),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_victima_conflicto

    function ajax_form_students_validate_peso($peso, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_peso';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'peso' => NM_utf8_urldecode($peso),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_peso

    function ajax_form_students_validate_talla($talla, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_talla';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'talla' => NM_utf8_urldecode($talla),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_talla

    function ajax_form_students_validate_cobertura($cobertura, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_cobertura';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'cobertura' => NM_utf8_urldecode($cobertura),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_cobertura

    function ajax_form_students_validate_vive_con($vive_con, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_vive_con';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'vive_con' => NM_utf8_urldecode($vive_con),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_vive_con

    function ajax_form_students_validate_subsidio($subsidio, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_subsidio';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'subsidio' => NM_utf8_urldecode($subsidio),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_subsidio

    function ajax_form_students_validate_estatus_vca($estatus_vca, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_estatus_vca';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'estatus_vca' => NM_utf8_urldecode($estatus_vca),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_estatus_vca

    function ajax_form_students_validate_depto_expulsor($depto_expulsor, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_depto_expulsor';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'depto_expulsor' => NM_utf8_urldecode($depto_expulsor),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_depto_expulsor

    function ajax_form_students_validate_municipio_expulsor($municipio_expulsor, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_municipio_expulsor';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'municipio_expulsor' => NM_utf8_urldecode($municipio_expulsor),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_municipio_expulsor

    function ajax_form_students_validate_fecha_expulsion($fecha_expulsion, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_fecha_expulsion';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'fecha_expulsion' => NM_utf8_urldecode($fecha_expulsion),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_fecha_expulsion

    function ajax_form_students_validate_certificado($certificado, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_certificado';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'certificado' => NM_utf8_urldecode($certificado),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_certificado

    function ajax_form_students_validate_semestre($semestre, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_semestre';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'semestre' => NM_utf8_urldecode($semestre),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_semestre

    function ajax_form_students_validate_numero_carne_sisben($numero_carne_sisben, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_numero_carne_sisben';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'numero_carne_sisben' => NM_utf8_urldecode($numero_carne_sisben),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_numero_carne_sisben

    function ajax_form_students_validate_nivel_sisben($nivel_sisben, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_nivel_sisben';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'nivel_sisben' => NM_utf8_urldecode($nivel_sisben),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_nivel_sisben

    function ajax_form_students_validate_estrato($estrato, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_estrato';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'estrato' => NM_utf8_urldecode($estrato),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_estrato

    function ajax_form_students_validate_fuente_recurso($fuente_recurso, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_fuente_recurso';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'fuente_recurso' => NM_utf8_urldecode($fuente_recurso),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_fuente_recurso

    function ajax_form_students_validate_opcion($opcion, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_opcion';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'opcion' => NM_utf8_urldecode($opcion),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_opcion

    function ajax_form_students_validate_resguardo($resguardo, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_resguardo';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'resguardo' => NM_utf8_urldecode($resguardo),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_resguardo

    function ajax_form_students_validate_negritudes($negritudes, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_negritudes';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'negritudes' => NM_utf8_urldecode($negritudes),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_negritudes

    function ajax_form_students_validate_etnia($etnia, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_etnia';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'etnia' => NM_utf8_urldecode($etnia),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_etnia

    function ajax_form_students_validate_discapacidades($discapacidades, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_discapacidades';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'discapacidades' => NM_utf8_urldecode($discapacidades),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_discapacidades

    function ajax_form_students_validate_capacidades($capacidades, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_capacidades';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'capacidades' => NM_utf8_urldecode($capacidades),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_capacidades

    function ajax_form_students_validate_novedades($novedades, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'validate_novedades';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'novedades' => NM_utf8_urldecode($novedades),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_validate_novedades

    function ajax_form_students_refresh_departanebti_expedicion($departanebti_expedicion, $nmgp_refresh_fields, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'refresh_departanebti_expedicion';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'departanebti_expedicion' => NM_utf8_urldecode($departanebti_expedicion),
                  'nmgp_refresh_fields' => NM_utf8_urldecode($nmgp_refresh_fields),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_refresh_departanebti_expedicion

    function ajax_form_students_refresh_dpto_nacimiento($dpto_nacimiento, $nmgp_refresh_fields, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'refresh_dpto_nacimiento';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'dpto_nacimiento' => NM_utf8_urldecode($dpto_nacimiento),
                  'nmgp_refresh_fields' => NM_utf8_urldecode($nmgp_refresh_fields),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_refresh_dpto_nacimiento

    function ajax_form_students_refresh_state($state, $nmgp_refresh_fields, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'refresh_state';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'state' => NM_utf8_urldecode($state),
                  'nmgp_refresh_fields' => NM_utf8_urldecode($nmgp_refresh_fields),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_refresh_state

    function ajax_form_students_refresh_id_nivel($id_nivel, $nmgp_refresh_fields, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'refresh_id_nivel';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'id_nivel' => NM_utf8_urldecode($id_nivel),
                  'nmgp_refresh_fields' => NM_utf8_urldecode($nmgp_refresh_fields),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_refresh_id_nivel

    function ajax_form_students_refresh_grado_igreso($grado_igreso, $nmgp_refresh_fields, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'refresh_grado_igreso';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'grado_igreso' => NM_utf8_urldecode($grado_igreso),
                  'nmgp_refresh_fields' => NM_utf8_urldecode($nmgp_refresh_fields),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_refresh_grado_igreso

    function ajax_form_students_refresh_depto_expulsor($depto_expulsor, $nmgp_refresh_fields, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'refresh_depto_expulsor';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'depto_expulsor' => NM_utf8_urldecode($depto_expulsor),
                  'nmgp_refresh_fields' => NM_utf8_urldecode($nmgp_refresh_fields),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_refresh_depto_expulsor

    function ajax_form_students_event_fecha_nacimiento_onchange($fecha_nacimiento, $anos_cumplidos, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'event_fecha_nacimiento_onchange';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'fecha_nacimiento' => NM_utf8_urldecode($fecha_nacimiento),
                  'anos_cumplidos' => NM_utf8_urldecode($anos_cumplidos),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_event_fecha_nacimiento_onchange

    function ajax_form_students_event_victima_conflicto_onchange($victima_conflicto, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'event_victima_conflicto_onchange';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'victima_conflicto' => NM_utf8_urldecode($victima_conflicto),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_event_victima_conflicto_onchange

    function ajax_form_students_submit_form($estatus, $fecha_matricula, $genero, $fecha_nacimiento, $primer_apellido, $segundo_apellido, $primer_nombre, $segundo_nombre, $tipo_identificacion, $numero_documento, $departanebti_expedicion, $municipio_expedicion, $firstname, $lastname, $anos_cumplidos, $dpto_nacimiento, $municipio_nacimiento, $observaciones, $login, $pswd, $confirm_pswd, $photo, $state, $city, $address, $barrio, $postalcode, $zona, $telefono, $email, $id_sede, $id_jornada, $id_nivel, $grado_igreso, $id_grupo, $grado_anterior, $last_year, $nombre_ult_plantel, $resultado, $subsidado, $interno, $otro_modelo, $caracter, $especialidad, $year_mat, $matricular, $eps, $ips, $ars, $tipo_sangre, $victima_conflicto, $peso, $talla, $cobertura, $vive_con, $subsidio, $estatus_vca, $depto_expulsor, $municipio_expulsor, $fecha_expulsion, $certificado, $semestre, $numero_carne_sisben, $nivel_sisben, $estrato, $fuente_recurso, $opcion, $resguardo, $negritudes, $etnia, $discapacidades, $capacidades, $photo_ul_name, $photo_ul_type, $photo_salva, $photo_limpa, $nm_form_submit, $nmgp_url_saida, $nmgp_opcao, $nmgp_ancora, $nmgp_num_form, $nmgp_parms, $script_case_init, $csrf_token)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'submit_form';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'estatus' => NM_utf8_urldecode($estatus),
                  'fecha_matricula' => NM_utf8_urldecode($fecha_matricula),
                  'genero' => NM_utf8_urldecode($genero),
                  'fecha_nacimiento' => NM_utf8_urldecode($fecha_nacimiento),
                  'primer_apellido' => NM_utf8_urldecode($primer_apellido),
                  'segundo_apellido' => NM_utf8_urldecode($segundo_apellido),
                  'primer_nombre' => NM_utf8_urldecode($primer_nombre),
                  'segundo_nombre' => NM_utf8_urldecode($segundo_nombre),
                  'tipo_identificacion' => NM_utf8_urldecode($tipo_identificacion),
                  'numero_documento' => NM_utf8_urldecode($numero_documento),
                  'departanebti_expedicion' => NM_utf8_urldecode($departanebti_expedicion),
                  'municipio_expedicion' => NM_utf8_urldecode($municipio_expedicion),
                  'firstname' => NM_utf8_urldecode($firstname),
                  'lastname' => NM_utf8_urldecode($lastname),
                  'anos_cumplidos' => NM_utf8_urldecode($anos_cumplidos),
                  'dpto_nacimiento' => NM_utf8_urldecode($dpto_nacimiento),
                  'municipio_nacimiento' => NM_utf8_urldecode($municipio_nacimiento),
                  'observaciones' => NM_utf8_urldecode($observaciones),
                  'login' => NM_utf8_urldecode($login),
                  'pswd' => NM_utf8_urldecode($pswd),
                  'confirm_pswd' => NM_utf8_urldecode($confirm_pswd),
                  'photo' => NM_utf8_urldecode($photo),
                  'state' => NM_utf8_urldecode($state),
                  'city' => NM_utf8_urldecode($city),
                  'address' => NM_utf8_urldecode($address),
                  'barrio' => NM_utf8_urldecode($barrio),
                  'postalcode' => NM_utf8_urldecode($postalcode),
                  'zona' => NM_utf8_urldecode($zona),
                  'telefono' => NM_utf8_urldecode($telefono),
                  'email' => NM_utf8_urldecode($email),
                  'id_sede' => NM_utf8_urldecode($id_sede),
                  'id_jornada' => NM_utf8_urldecode($id_jornada),
                  'id_nivel' => NM_utf8_urldecode($id_nivel),
                  'grado_igreso' => NM_utf8_urldecode($grado_igreso),
                  'id_grupo' => NM_utf8_urldecode($id_grupo),
                  'grado_anterior' => NM_utf8_urldecode($grado_anterior),
                  'last_year' => NM_utf8_urldecode($last_year),
                  'nombre_ult_plantel' => NM_utf8_urldecode($nombre_ult_plantel),
                  'resultado' => NM_utf8_urldecode($resultado),
                  'subsidado' => NM_utf8_urldecode($subsidado),
                  'interno' => NM_utf8_urldecode($interno),
                  'otro_modelo' => NM_utf8_urldecode($otro_modelo),
                  'caracter' => NM_utf8_urldecode($caracter),
                  'especialidad' => NM_utf8_urldecode($especialidad),
                  'year_mat' => NM_utf8_urldecode($year_mat),
                  'matricular' => NM_utf8_urldecode($matricular),
                  'eps' => NM_utf8_urldecode($eps),
                  'ips' => NM_utf8_urldecode($ips),
                  'ars' => NM_utf8_urldecode($ars),
                  'tipo_sangre' => NM_utf8_urldecode($tipo_sangre),
                  'victima_conflicto' => NM_utf8_urldecode($victima_conflicto),
                  'peso' => NM_utf8_urldecode($peso),
                  'talla' => NM_utf8_urldecode($talla),
                  'cobertura' => NM_utf8_urldecode($cobertura),
                  'vive_con' => NM_utf8_urldecode($vive_con),
                  'subsidio' => NM_utf8_urldecode($subsidio),
                  'estatus_vca' => NM_utf8_urldecode($estatus_vca),
                  'depto_expulsor' => NM_utf8_urldecode($depto_expulsor),
                  'municipio_expulsor' => NM_utf8_urldecode($municipio_expulsor),
                  'fecha_expulsion' => NM_utf8_urldecode($fecha_expulsion),
                  'certificado' => NM_utf8_urldecode($certificado),
                  'semestre' => NM_utf8_urldecode($semestre),
                  'numero_carne_sisben' => NM_utf8_urldecode($numero_carne_sisben),
                  'nivel_sisben' => NM_utf8_urldecode($nivel_sisben),
                  'estrato' => NM_utf8_urldecode($estrato),
                  'fuente_recurso' => NM_utf8_urldecode($fuente_recurso),
                  'opcion' => NM_utf8_urldecode($opcion),
                  'resguardo' => NM_utf8_urldecode($resguardo),
                  'negritudes' => NM_utf8_urldecode($negritudes),
                  'etnia' => NM_utf8_urldecode($etnia),
                  'discapacidades' => NM_utf8_urldecode($discapacidades),
                  'capacidades' => NM_utf8_urldecode($capacidades),
                  'photo_ul_name' => NM_utf8_urldecode($photo_ul_name),
                  'photo_ul_type' => NM_utf8_urldecode($photo_ul_type),
                  'photo_salva' => NM_utf8_urldecode($photo_salva),
                  'photo_limpa' => NM_utf8_urldecode($photo_limpa),
                  'nm_form_submit' => NM_utf8_urldecode($nm_form_submit),
                  'nmgp_url_saida' => NM_utf8_urldecode($nmgp_url_saida),
                  'nmgp_opcao' => NM_utf8_urldecode($nmgp_opcao),
                  'nmgp_ancora' => NM_utf8_urldecode($nmgp_ancora),
                  'nmgp_num_form' => NM_utf8_urldecode($nmgp_num_form),
                  'nmgp_parms' => NM_utf8_urldecode($nmgp_parms),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'csrf_token' => NM_utf8_urldecode($csrf_token),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_submit_form

    function ajax_form_students_navigate_form($idstudents, $nm_form_submit, $nmgp_opcao, $nmgp_ordem, $nmgp_fast_search, $nmgp_cond_fast_search, $nmgp_arg_fast_search, $nmgp_arg_dyn_search, $script_case_init)
    {
        global $inicial_form_students;
        //register_shutdown_function("form_students_pack_ajax_response");
        $inicial_form_students->contr_form_students->NM_ajax_flag          = true;
        $inicial_form_students->contr_form_students->NM_ajax_opcao         = 'navigate_form';
        $inicial_form_students->contr_form_students->NM_ajax_info['param'] = array(
                  'idstudents' => NM_utf8_urldecode($idstudents),
                  'nm_form_submit' => NM_utf8_urldecode($nm_form_submit),
                  'nmgp_opcao' => NM_utf8_urldecode($nmgp_opcao),
                  'nmgp_ordem' => NM_utf8_urldecode($nmgp_ordem),
                  'nmgp_fast_search' => NM_utf8_urldecode($nmgp_fast_search),
                  'nmgp_cond_fast_search' => NM_utf8_urldecode($nmgp_cond_fast_search),
                  'nmgp_arg_fast_search' => NM_utf8_urldecode($nmgp_arg_fast_search),
                  'nmgp_arg_dyn_search' => NM_utf8_urldecode($nmgp_arg_dyn_search),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_students->contr_form_students->controle();
        exit;
    } // ajax_navigate_form


   function form_students_pack_ajax_response()
   {
      global $inicial_form_students;
      $aResp = array();

      if (isset($inicial_form_students->contr_form_students->NM_ajax_info['empty_filter']))
      {
          $aResp['empty_filter'] = $inicial_form_students->contr_form_students->NM_ajax_info['empty_filter'];
      }
      if (isset($inicial_form_students->contr_form_students->NM_ajax_info['dyn_search']['NM_Dynamic_Search']))
      {
          $aResp['dyn_search']['NM_Dynamic_Search'] = $inicial_form_students->contr_form_students->NM_ajax_info['dyn_search']['NM_Dynamic_Search'];
      }
      if (isset($inicial_form_students->contr_form_students->NM_ajax_info['dyn_search']['id_dyn_search_cmd_str']))
      {
          $aResp['dyn_search']['id_dyn_search_cmd_str'] = $inicial_form_students->contr_form_students->NM_ajax_info['dyn_search']['id_dyn_search_cmd_str'];
      }
      if ($inicial_form_students->contr_form_students->NM_ajax_info['calendarReload'])
      {
         $aResp['result'] = 'CALENDARRELOAD';
      }
      elseif ('' != $inicial_form_students->contr_form_students->NM_ajax_info['autoComp'])
      {
         $aResp['result'] = 'AUTOCOMP';
      }
//mestre_detalhe
      elseif (!empty($inicial_form_students->contr_form_students->NM_ajax_info['newline']))
      {
         $aResp['result'] = 'NEWLINE';
         ob_end_clean();
      }
      elseif (!empty($inicial_form_students->contr_form_students->NM_ajax_info['tableRefresh']))
      {
         $aResp['result'] = 'TABLEREFRESH';
      }
//-----
      elseif (!empty($inicial_form_students->contr_form_students->NM_ajax_info['errList']))
      {
         $aResp['result'] = 'ERROR';
      }
      elseif (!empty($inicial_form_students->contr_form_students->NM_ajax_info['fldList']))
      {
         $aResp['result'] = 'SET';
      }
      else
      {
         $aResp['result'] = 'OK';
      }
      if ('AUTOCOMP' == $aResp['result'])
      {
         $aResp = $inicial_form_students->contr_form_students->NM_ajax_info['autoComp'];
      }
//mestre_detalhe
      elseif ('NEWLINE' == $aResp['result'])
      {
         $aResp = $inicial_form_students->contr_form_students->NM_ajax_info['newline'];
      }
      else
//-----
      {
         $aResp['ajaxRequest'] = $inicial_form_students->contr_form_students->NM_ajax_opcao;
         if ('CALENDARRELOAD' == $aResp['result'])
         {
            form_students_pack_calendar_reload($aResp);
         }
         elseif ('ERROR' == $aResp['result'])
         {
            form_students_pack_ajax_errors($aResp);
         }
         elseif ('SET' == $aResp['result'])
         {
            form_students_pack_ajax_set_fields($aResp);
         }
         elseif ('TABLEREFRESH' == $aResp['result'])
         {
            form_students_pack_ajax_set_fields($aResp);
            $aResp['tableRefresh'] = form_students_pack_protect_string($inicial_form_students->contr_form_students->NM_ajax_info['tableRefresh']);
         }
         if ('OK' == $aResp['result'] || 'SET' == $aResp['result'])
         {
            form_students_pack_ajax_ok($aResp);
         }
         if (isset($inicial_form_students->contr_form_students->NM_ajax_info['focus']) && '' != $inicial_form_students->contr_form_students->NM_ajax_info['focus'])
         {
            $aResp['setFocus'] = $inicial_form_students->contr_form_students->NM_ajax_info['focus'];
         }
         if (isset($inicial_form_students->contr_form_students->NM_ajax_info['closeLine']) && '' != $inicial_form_students->contr_form_students->NM_ajax_info['closeLine'])
         {
            $aResp['closeLine'] = $inicial_form_students->contr_form_students->NM_ajax_info['closeLine'];
         }
         else
         {
            $aResp['closeLine'] = 'N';
         }
         if (isset($inicial_form_students->contr_form_students->NM_ajax_info['clearUpload']) && '' != $inicial_form_students->contr_form_students->NM_ajax_info['clearUpload'])
         {
            $aResp['clearUpload'] = $inicial_form_students->contr_form_students->NM_ajax_info['clearUpload'];
         }
         else
         {
            $aResp['clearUpload'] = 'N';
         }
         if (isset($inicial_form_students->contr_form_students->NM_ajax_info['masterValue']) && '' != $inicial_form_students->contr_form_students->NM_ajax_info['masterValue'])
         {
            form_students_pack_master_value($aResp);
         }
         if (isset($inicial_form_students->contr_form_students->NM_ajax_info['ajaxAlert']) && '' != $inicial_form_students->contr_form_students->NM_ajax_info['ajaxAlert'])
         {
            form_students_pack_ajax_alert($aResp);
         }
         if (isset($inicial_form_students->contr_form_students->NM_ajax_info['ajaxMessage']) && '' != $inicial_form_students->contr_form_students->NM_ajax_info['ajaxMessage'])
         {
            form_students_pack_ajax_message($aResp);
         }
         if (isset($inicial_form_students->contr_form_students->NM_ajax_info['ajaxJavascript']) && '' != $inicial_form_students->contr_form_students->NM_ajax_info['ajaxJavascript'])
         {
            form_students_pack_ajax_javascript($aResp);
         }
         if (isset($inicial_form_students->contr_form_students->NM_ajax_info['redir']) && !empty($inicial_form_students->contr_form_students->NM_ajax_info['redir']))
         {
            form_students_pack_ajax_redir($aResp);
         }
         if (isset($inicial_form_students->contr_form_students->NM_ajax_info['redirExit']) && !empty($inicial_form_students->contr_form_students->NM_ajax_info['redirExit']))
         {
            form_students_pack_ajax_redir_exit($aResp);
         }
         if (isset($inicial_form_students->contr_form_students->NM_ajax_info['blockDisplay']) && !empty($inicial_form_students->contr_form_students->NM_ajax_info['blockDisplay']))
         {
            form_students_pack_ajax_block_display($aResp);
         }
         if (isset($inicial_form_students->contr_form_students->NM_ajax_info['fieldDisplay']) && !empty($inicial_form_students->contr_form_students->NM_ajax_info['fieldDisplay']))
         {
            form_students_pack_ajax_field_display($aResp);
         }
         if (isset($inicial_form_students->contr_form_students->NM_ajax_info['buttonDisplay']) && !empty($inicial_form_students->contr_form_students->NM_ajax_info['buttonDisplay']))
         {
            $inicial_form_students->contr_form_students->NM_ajax_info['buttonDisplay'] = $inicial_form_students->contr_form_students->nmgp_botoes;
            form_students_pack_ajax_button_display($aResp);
         }
         if (isset($inicial_form_students->contr_form_students->NM_ajax_info['fieldLabel']) && !empty($inicial_form_students->contr_form_students->NM_ajax_info['fieldLabel']))
         {
            form_students_pack_ajax_field_label($aResp);
         }
         if (isset($inicial_form_students->contr_form_students->NM_ajax_info['readOnly']) && !empty($inicial_form_students->contr_form_students->NM_ajax_info['readOnly']))
         {
            form_students_pack_ajax_readonly($aResp);
         }
         if (isset($inicial_form_students->contr_form_students->NM_ajax_info['navStatus']) && !empty($inicial_form_students->contr_form_students->NM_ajax_info['navStatus']))
         {
            form_students_pack_ajax_nav_status($aResp);
         }
         if (isset($inicial_form_students->contr_form_students->NM_ajax_info['navSummary']) && !empty($inicial_form_students->contr_form_students->NM_ajax_info['navSummary']))
         {
            form_students_pack_ajax_nav_Summary($aResp);
         }
         if (isset($inicial_form_students->contr_form_students->NM_ajax_info['navPage']))
         {
            form_students_pack_ajax_navPage($aResp);
         }
         if (isset($inicial_form_students->contr_form_students->NM_ajax_info['btnVars']) && !empty($inicial_form_students->contr_form_students->NM_ajax_info['btnVars']))
         {
            form_students_pack_ajax_btn_vars($aResp);
         }
         if (isset($inicial_form_students->contr_form_students->NM_ajax_info['quickSearchRes']) && $inicial_form_students->contr_form_students->NM_ajax_info['quickSearchRes'])
         {
            $aResp['quickSearchRes'] = 'Y';
         }
         else
         {
            $aResp['quickSearchRes'] = 'N';
         }
         $aResp['htmOutput'] = '';
    
         if (isset($inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output']) && $inicial_form_students->contr_form_students->NM_ajax_info['param']['buffer_output'])
         {
            $aResp['htmOutput'] = ob_get_contents();
            if (false === $aResp['htmOutput'])
            {
               $aResp['htmOutput'] = '';
            }
            else
            {
               $aResp['htmOutput'] = form_students_pack_protect_string(NM_charset_to_utf8($aResp['htmOutput']));
               ob_end_clean();
            }
         }
      }
      if (is_array($aResp))
      {
          $oJson = new Services_JSON();
          echo "var res = " . trim(sajax_get_js_repr($oJson->encode($aResp))) . "; res;";
      }
      else
      {
          echo "var res = " . trim(sajax_get_js_repr($aResp)) . "; res;";
      }
      exit;
   } // form_students_pack_ajax_response

   function form_students_pack_calendar_reload(&$aResp)
   {
      global $inicial_form_students;
      $aResp['calendarReload'] = 'OK';
   } // form_students_pack_calendar_reload

   function form_students_pack_ajax_errors(&$aResp)
   {
      global $inicial_form_students;
      $aResp['errList'] = array();
      foreach ($inicial_form_students->contr_form_students->NM_ajax_info['errList'] as $sField => $aMsg)
      {
         if ('geral_form_students' == $sField)
         {
             $aMsg = form_students_pack_ajax_remove_erros($aMsg);
         }
         foreach ($aMsg as $sMsg)
         {
            $iNumLinha = (isset($inicial_form_students->contr_form_students->NM_ajax_info['param']['nmgp_refresh_row']) && 'geral_form_students' != $sField)
                       ? $inicial_form_students->contr_form_students->NM_ajax_info['param']['nmgp_refresh_row'] : "";
            $aResp['errList'][] = array('fldName'  => $sField,
                                        'msgText'  => form_students_pack_protect_string(NM_charset_to_utf8($sMsg)),
                                        'numLinha' => $iNumLinha);
         }
      }
   } // form_students_pack_ajax_errors

   function form_students_pack_ajax_remove_erros($aErrors)
   {
       $aNewErrors = array();
       if (!empty($aErrors))
       {
           $sErrorMsgs = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), implode('<br />', $aErrors));
           $aErrorMsgs = explode('<BR>', $sErrorMsgs);
           foreach ($aErrorMsgs as $sErrorMsg)
           {
               $sErrorMsg = trim($sErrorMsg);
               if ('' != $sErrorMsg && !in_array($sErrorMsg, $aNewErrors))
               {
                   $aNewErrors[] = $sErrorMsg;
               }
           }
       }
       return $aNewErrors;
   } // form_students_pack_ajax_remove_erros

   function form_students_pack_ajax_ok(&$aResp)
   {
      global $inicial_form_students;
      $iNumLinha = (isset($inicial_form_students->contr_form_students->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $inicial_form_students->contr_form_students->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      $aResp['msgDisplay'] = array('msgText'  => form_students_pack_protect_string($inicial_form_students->contr_form_students->NM_ajax_info['msgDisplay']),
                                   'numLinha' => $iNumLinha);
   } // form_students_pack_ajax_ok

   function form_students_pack_ajax_set_fields(&$aResp)
   {
      global $inicial_form_students;
      $iNumLinha = (isset($inicial_form_students->contr_form_students->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $inicial_form_students->contr_form_students->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      if ('' != $inicial_form_students->contr_form_students->NM_ajax_info['rsSize'])
      {
         $aResp['rsSize'] = $inicial_form_students->contr_form_students->NM_ajax_info['rsSize'];
      }
      $aResp['fldList'] = array();
      foreach ($inicial_form_students->contr_form_students->NM_ajax_info['fldList'] as $sField => $aData)
      {
         $aField = array();
         if (isset($aData['colNum']))
         {
            $aField['colNum'] = $aData['colNum'];
         }
         if (isset($aData['row']))
         {
            $aField['row'] = $aData['row'];
         }
         if (isset($aData['imgFile']))
         {
            $aField['imgFile'] = form_students_pack_protect_string($aData['imgFile']);
         }
         if (isset($aData['imgOrig']))
         {
            $aField['imgOrig'] = form_students_pack_protect_string($aData['imgOrig']);
         }
         if (isset($aData['imgLink']))
         {
            $aField['imgLink'] = form_students_pack_protect_string($aData['imgLink']);
         }
         if (isset($aData['keepImg']))
         {
            $aField['keepImg'] = $aData['keepImg'];
         }
         if (isset($aData['hideName']))
         {
            $aField['hideName'] = $aData['hideName'];
         }
         if (isset($aData['docLink']))
         {
            $aField['docLink'] = form_students_pack_protect_string($aData['docLink']);
         }
         if (isset($aData['docIcon']))
         {
            $aField['docIcon'] = form_students_pack_protect_string($aData['docIcon']);
         }
         if (isset($aData['keyVal']))
         {
            $aField['keyVal'] = $aData['keyVal'];
         }
         if (isset($aData['optComp']))
         {
            $aField['optComp'] = $aData['optComp'];
         }
         if (isset($aData['optClass']))
         {
            $aField['optClass'] = $aData['optClass'];
         }
         if (isset($aData['optMulti']))
         {
            $aField['optMulti'] = $aData['optMulti'];
         }
         if (isset($aData['lookupCons']))
         {
            $aField['lookupCons'] = $aData['lookupCons'];
         }
         if (isset($aData['imgHtml']))
         {
            $aField['imgHtml'] = form_students_pack_protect_string($aData['imgHtml']);
         }
         if (isset($aData['mulHtml']))
         {
            $aField['mulHtml'] = form_students_pack_protect_string($aData['mulHtml']);
         }
         if (isset($aData['updInnerHtml']))
         {
            $aField['updInnerHtml'] = $aData['updInnerHtml'];
         }
         if (isset($aData['htmComp']))
         {
            $aField['htmComp'] = str_replace("'", '__AS__', str_replace('"', '__AD__', $aData['htmComp']));
         }
         $aField['fldName']  = $sField;
         $aField['fldType']  = $aData['type'];
         $aField['numLinha'] = $iNumLinha;
         $aField['valList']  = array();
         foreach ($aData['valList'] as $iIndex => $sValue)
         {
            $aValue = array();
            if (isset($aData['labList'][$iIndex]))
            {
               $aValue['label'] = form_students_pack_protect_string($aData['labList'][$iIndex]);
            }
            $aValue['value']     = ('_autocomp' != substr($sField, -9)) ? form_students_pack_protect_string($sValue) : $sValue;
            $aField['valList'][] = $aValue;
         }
         foreach ($aField['valList'] as $iIndex => $aFieldData)
         {
             if ("null" == $aFieldData['value'])
             {
                 $aField['valList'][$iIndex]['value'] = '';
             }
         }
         if (isset($aData['optList']) && false !== $aData['optList'])
         {
            if (is_array($aData['optList']))
            {
               $aField['optList'] = array();
               foreach ($aData['optList'] as $aOptList)
               {
                  foreach ($aOptList as $sValue => $sLabel)
                  {
                     $sOpt = ($sValue !== $sLabel) ? $sValue : $sLabel;
                     $aField['optList'][] = array('value' => form_students_pack_protect_string($sOpt),
                                                  'label' => form_students_pack_protect_string($sLabel));
                  }
               }
            }
            else
            {
               $aField['optList'] = $aData['optList'];
            }
         }
         $aResp['fldList'][] = $aField;
      }
   } // form_students_pack_ajax_set_fields

   function form_students_pack_ajax_redir(&$aResp)
   {
      global $inicial_form_students;
      $aInfo              = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init', 'script_case_session', 'h_modal', 'w_modal');
      $aResp['redirInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($inicial_form_students->contr_form_students->NM_ajax_info['redir'][$sTag]))
         {
            $aResp['redirInfo'][$sTag] = $inicial_form_students->contr_form_students->NM_ajax_info['redir'][$sTag];
         }
      }
   } // form_students_pack_ajax_redir

   function form_students_pack_ajax_redir_exit(&$aResp)
   {
      global $inicial_form_students;
      $aInfo                  = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init', 'script_case_session');
      $aResp['redirExitInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($inicial_form_students->contr_form_students->NM_ajax_info['redirExit'][$sTag]))
         {
            $aResp['redirExitInfo'][$sTag] = $inicial_form_students->contr_form_students->NM_ajax_info['redirExit'][$sTag];
         }
      }
   } // form_students_pack_ajax_redir_exit

   function form_students_pack_master_value(&$aResp)
   {
      global $inicial_form_students;
      foreach ($inicial_form_students->contr_form_students->NM_ajax_info['masterValue'] as $sIndex => $sValue)
      {
         $aResp['masterValue'][] = array('index' => $sIndex,
                                         'value' => $sValue);
      }
   } // form_students_pack_master_value

   function form_students_pack_ajax_alert(&$aResp)
   {
      global $inicial_form_students;
      $aResp['ajaxAlert'] = array('message' => $inicial_form_students->contr_form_students->NM_ajax_info['ajaxAlert']['message']);
   } // form_students_pack_ajax_alert

   function form_students_pack_ajax_message(&$aResp)
   {
      global $inicial_form_students;
      $aResp['ajaxMessage'] = array('message'      => form_students_pack_protect_string($inicial_form_students->contr_form_students->NM_ajax_info['ajaxMessage']['message']),
                                    'title'        => form_students_pack_protect_string($inicial_form_students->contr_form_students->NM_ajax_info['ajaxMessage']['title']),
                                    'modal'        => isset($inicial_form_students->contr_form_students->NM_ajax_info['ajaxMessage']['modal'])        ? $inicial_form_students->contr_form_students->NM_ajax_info['ajaxMessage']['modal']        : 'N',
                                    'timeout'      => isset($inicial_form_students->contr_form_students->NM_ajax_info['ajaxMessage']['timeout'])      ? $inicial_form_students->contr_form_students->NM_ajax_info['ajaxMessage']['timeout']      : '',
                                    'button'       => isset($inicial_form_students->contr_form_students->NM_ajax_info['ajaxMessage']['button'])       ? $inicial_form_students->contr_form_students->NM_ajax_info['ajaxMessage']['button']       : '',
                                    'button_label' => isset($inicial_form_students->contr_form_students->NM_ajax_info['ajaxMessage']['button_label']) ? $inicial_form_students->contr_form_students->NM_ajax_info['ajaxMessage']['button_label'] : 'Ok',
                                    'top'          => isset($inicial_form_students->contr_form_students->NM_ajax_info['ajaxMessage']['top'])          ? $inicial_form_students->contr_form_students->NM_ajax_info['ajaxMessage']['top']          : '',
                                    'left'         => isset($inicial_form_students->contr_form_students->NM_ajax_info['ajaxMessage']['left'])         ? $inicial_form_students->contr_form_students->NM_ajax_info['ajaxMessage']['left']         : '',
                                    'width'        => isset($inicial_form_students->contr_form_students->NM_ajax_info['ajaxMessage']['width'])        ? $inicial_form_students->contr_form_students->NM_ajax_info['ajaxMessage']['width']        : '',
                                    'height'       => isset($inicial_form_students->contr_form_students->NM_ajax_info['ajaxMessage']['height'])       ? $inicial_form_students->contr_form_students->NM_ajax_info['ajaxMessage']['height']       : '',
                                    'redir'        => isset($inicial_form_students->contr_form_students->NM_ajax_info['ajaxMessage']['redir'])        ? $inicial_form_students->contr_form_students->NM_ajax_info['ajaxMessage']['redir']        : '',
                                    'show_close'   => isset($inicial_form_students->contr_form_students->NM_ajax_info['ajaxMessage']['show_close'])   ? $inicial_form_students->contr_form_students->NM_ajax_info['ajaxMessage']['show_close']   : 'Y',
                                    'body_icon'    => isset($inicial_form_students->contr_form_students->NM_ajax_info['ajaxMessage']['body_icon'])    ? $inicial_form_students->contr_form_students->NM_ajax_info['ajaxMessage']['body_icon']    : 'Y',
                                    'redir_target' => isset($inicial_form_students->contr_form_students->NM_ajax_info['ajaxMessage']['redir_target']) ? $inicial_form_students->contr_form_students->NM_ajax_info['ajaxMessage']['redir_target'] : '',
                                    'redir_par'    => isset($inicial_form_students->contr_form_students->NM_ajax_info['ajaxMessage']['redir_par'])    ? $inicial_form_students->contr_form_students->NM_ajax_info['ajaxMessage']['redir_par']    : '');
   } // form_students_pack_ajax_message

   function form_students_pack_ajax_javascript(&$aResp)
   {
      global $inicial_form_students;
      foreach ($inicial_form_students->contr_form_students->NM_ajax_info['ajaxJavascript'] as $aJsFunc)
      {
         $aResp['ajaxJavascript'][] = $aJsFunc;
      }
   } // form_students_pack_ajax_javascript

   function form_students_pack_ajax_block_display(&$aResp)
   {
      global $inicial_form_students;
      $aResp['blockDisplay'] = array();
      foreach ($inicial_form_students->contr_form_students->NM_ajax_info['blockDisplay'] as $sBlockName => $sBlockStatus)
      {
        $aResp['blockDisplay'][] = array($sBlockName, $sBlockStatus);
      }
   } // form_students_pack_ajax_block_display

   function form_students_pack_ajax_field_display(&$aResp)
   {
      global $inicial_form_students;
      $aResp['fieldDisplay'] = array();
      foreach ($inicial_form_students->contr_form_students->NM_ajax_info['fieldDisplay'] as $sFieldName => $sFieldStatus)
      {
        $aResp['fieldDisplay'][] = array($sFieldName, $sFieldStatus);
      }
   } // form_students_pack_ajax_field_display

   function form_students_pack_ajax_button_display(&$aResp)
   {
      global $inicial_form_students;
      $aResp['buttonDisplay'] = array();
      foreach ($inicial_form_students->contr_form_students->NM_ajax_info['buttonDisplay'] as $sButtonName => $sButtonStatus)
      {
        $aResp['buttonDisplay'][] = array($sButtonName, $sButtonStatus);
      }
   } // form_students_pack_ajax_button_display

   function form_students_pack_ajax_field_label(&$aResp)
   {
      global $inicial_form_students;
      $aResp['fieldLabel'] = array();
      foreach ($inicial_form_students->contr_form_students->NM_ajax_info['fieldLabel'] as $sFieldName => $sFieldLabel)
      {
        $aResp['fieldLabel'][] = array($sFieldName, form_students_pack_protect_string($sFieldLabel));
      }
   } // form_students_pack_ajax_field_label

   function form_students_pack_ajax_readonly(&$aResp)
   {
      global $inicial_form_students;
      $aResp['readOnly'] = array();
      foreach ($inicial_form_students->contr_form_students->NM_ajax_info['readOnly'] as $sFieldName => $sFieldStatus)
      {
        $aResp['readOnly'][] = array($sFieldName, $sFieldStatus);
      }
   } // form_students_pack_ajax_readonly

   function form_students_pack_ajax_nav_status(&$aResp)
   {
      global $inicial_form_students;
      $aResp['navStatus'] = array();
      if (isset($inicial_form_students->contr_form_students->NM_ajax_info['navStatus']['ret']) && '' != $inicial_form_students->contr_form_students->NM_ajax_info['navStatus']['ret'])
      {
         $aResp['navStatus']['ret'] = $inicial_form_students->contr_form_students->NM_ajax_info['navStatus']['ret'];
      }
      if (isset($inicial_form_students->contr_form_students->NM_ajax_info['navStatus']['ava']) && '' != $inicial_form_students->contr_form_students->NM_ajax_info['navStatus']['ava'])
      {
         $aResp['navStatus']['ava'] = $inicial_form_students->contr_form_students->NM_ajax_info['navStatus']['ava'];
      }
   } // form_students_pack_ajax_nav_status

   function form_students_pack_ajax_nav_Summary(&$aResp)
   {
      global $inicial_form_students;
      $aResp['navSummary'] = array();
      $aResp['navSummary']['reg_ini'] = $inicial_form_students->contr_form_students->NM_ajax_info['navSummary']['reg_ini'];
      $aResp['navSummary']['reg_qtd'] = $inicial_form_students->contr_form_students->NM_ajax_info['navSummary']['reg_qtd'];
      $aResp['navSummary']['reg_tot'] = $inicial_form_students->contr_form_students->NM_ajax_info['navSummary']['reg_tot'];
   } // form_students_pack_ajax_nav_Summary

   function form_students_pack_ajax_navPage(&$aResp)
   {
      global $inicial_form_students;
      $aResp['navPage'] = $inicial_form_students->contr_form_students->NM_ajax_info['navPage'];
   } // form_students_pack_ajax_navPage


   function form_students_pack_ajax_btn_vars(&$aResp)
   {
      global $inicial_form_students;
      $aResp['btnVars'] = array();
      foreach ($inicial_form_students->contr_form_students->NM_ajax_info['btnVars'] as $sBtnName => $sBtnValue)
      {
        $aResp['btnVars'][] = array($sBtnName, form_students_pack_protect_string($sBtnValue));
      }
   } // form_students_pack_ajax_btn_vars

   function form_students_pack_protect_string($sString)
   {
      $sString = (string) $sString;

      if (!empty($sString))
      {
         if (function_exists('NM_is_utf8') && NM_is_utf8($sString))
         {
             return $sString;
         }
         else
         {
/*             return htmlentities($sString, ENT_COMPAT, $_SESSION['scriptcase']['charset']); */
             return sc_htmlentities($sString);
         }
      }
      elseif ('0' === $sString || 0 === $sString)
      {
         return '0';
      }
      else
      {
         return '';
      }
   } // form_students_pack_protect_string
?>