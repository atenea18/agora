<?php
//
   include_once('form_t_evaluacion_p1_m2_prueba_session.php');
   @session_start() ;
   $_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_nm_perfil']          = "conn_mysql";
   $_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_nm_path_prod']       = "";
   $_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_nm_path_imagens']    = "";
   $_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_nm_path_imag_temp']  = "";
   $_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_nm_path_doc']        = "";
//
class form_t_evaluacion_p1_m2_prueba_ini
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
   var $link_form_inasistencias_edit;
   var $link_form_rel_desemp_posicion_1_edit;
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
      $_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_p1_m2_prueba']['decimal_db'] = "."; 

      $this->nm_cod_apl      = "form_t_evaluacion_p1_m2_prueba"; 
      $this->nm_nome_apl     = ""; 
      $this->nm_seguranca    = ""; 
      $this->nm_grupo        = "agora_IV"; 
      $this->nm_grupo_versao = "1"; 
      $this->nm_autor        = "admin"; 
      $this->nm_versao_sc    = "v8"; 
      $this->nm_tp_lic_sc    = "pe_mysql_bronze"; 
      $this->nm_dt_criacao   = "20170404"; 
      $this->nm_hr_criacao   = "045245"; 
      $this->nm_autor_alt    = "admin"; 
      $this->nm_dt_ult_alt   = "20170407"; 
      $this->nm_hr_ult_alt   = "172636"; 
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
      if(empty($_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_nm_path_prod']))
      {
              /*check prod*/$_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
      }
      //check img
      if(empty($_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_nm_path_imagens']))
      {
              /*check img*/$_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
      }
      //check tmp
      if(empty($_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_nm_path_imag_temp']))
      {
              /*check tmp*/$_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
      }
      //check doc
      if(empty($_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_nm_path_doc']))
      {
              /*check doc*/$_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
      }
      //end check publication with the prod
// 
      $this->sc_site_ssl     = (isset($_SERVER['HTTP_REFERER']) && strtolower(substr($_SERVER['HTTP_REFERER'], 0, 5)) == 'https') ? true : false;
      $this->sc_protocolo    = ($this->sc_site_ssl) ? 'https://' : 'http://';
      $this->path_prod       = $_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_nm_path_prod'];
      $this->path_imagens    = $_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_nm_path_imag_temp'];
      $this->path_doc        = $_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_nm_path_doc'];
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
      $this->str_schema_all  = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "evaluacion/evaluacion";
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
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/form_t_evaluacion_p1_m2_prueba';
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

      global $inicial_form_t_evaluacion_p1_m2_prueba;
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
                  if (isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag) && $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag)
                  {
                      $inicial_form_t_evaluacion_p1_m2_prueba->contr_->NM_ajax_info['redir']['action']  = $nm_apl_dest;
                      $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['redir']['target']  = $parms['T'];
                      $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['redir']['metodo']  = "post";
                      $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['redir']['script_case_init']  = $this->sc_page;
                      $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['redir']['script_case_session']  = session_id();
                      form_t_evaluacion_p1_m2_prueba_pack_ajax_response();
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
          unset($_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_nm_conexao']);
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
      $_SESSION['sc_session']['SC_download_violation'] = $this->Nm_lang['lang_errm_fnfd'];
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
      $Tmp_apl_lig = "form_inasistencias";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/form_inasistencias_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/form_inasistencias_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/form_inasistencias_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/form_inasistencias_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["form_inasistencias"] = 'S';
          }
      }
      $Tmp_apl_lig = "form_rel_desemp_posicion_1";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/form_rel_desemp_posicion_1_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/form_rel_desemp_posicion_1_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/form_rel_desemp_posicion_1_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/form_rel_desemp_posicion_1_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["form_rel_desemp_posicion_1"] = 'S';
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
      $_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_p1_m2_prueba']['path_doc'] = $this->path_doc; 
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
          if (!$_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['sc_outra_jan']) || $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['sc_outra_jan'] != 'form_t_evaluacion_p1_m2_prueba')) 
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

      $this->link_form_inasistencias_edit = $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('form_inasistencias') . "/" ; 
      $this->link_form_rel_desemp_posicion_1_edit = $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('form_rel_desemp_posicion_1') . "/" ; 
      $this->nm_cont_lin       = 0;
      $this->nm_limite_lin     = 0;
      $this->nm_limite_lin_prt = 0;
// 
      include_once($this->path_adodb . "/adodb.inc.php"); 
      $this->sc_Include($this->path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
      $this->sc_Include($this->path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
      if(function_exists('set_php_timezone'))  set_php_timezone('form_t_evaluacion_p1_m2_prueba'); 
      $this->sc_Include($this->path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->sc_Include($this->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      $this->sc_Include($this->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->sc_Include($this->path_lib_php . "/nm_functions.php", "", "") ; 
      $this->nm_data = new nm_data("es");
      global $inicial_form_t_evaluacion_p1_m2_prueba, $NM_run_iframe;
      if ((isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag) && $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag) || (isset($_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_p1_m2_prueba']['embutida_call']) && $_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_p1_m2_prueba']['embutida_call']) || $NM_run_iframe == 1)
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
      $this->nm_font_ttf = array("ar", "ja", "pl", "ru", "sk", "thai", "zh_cn", "zh_hk", "cz", "el", "ko", "mk");
      $this->nm_ttf_arab = array("ar");
      $this->nm_ttf_jap  = array("ja");
      $this->nm_ttf_rus  = array("pl", "ru", "sk", "cz", "el", "mk");
      $this->nm_ttf_thai = array("thai");
      $this->nm_ttf_chi  = array("zh_cn", "zh_hk", "ko");
      $_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1D9XsDQBqHAveHQJsHuvmV9FeDur/VoBqDcJUH9BqHAN7HQJwDEBODkFeH5FYVoFGHQJKDQBqHArYHQXGDMvsVIBsH5XKVEFGHQBsVIJsHANOHQFUHgvCHArCDWr/HMFaHQJKDuFaZ1BYHuB/DMrwV9BUH5XCHIrqDcFYH9BODSrYHuX7HgvCHArCV5FqHMX7HQFYZ9F7HANOHQB/HgNKDkBODuFqDoFGDcBqVIJwD1rwHQF7HgBYVkJqDWX7HMB/HQNmDQBqHANOHQNUDMrwVcB/DWFYVoBiHQNwZ1BiHArYHQJsHgvCHArCV5FqHIrqDcXGH9BiDSN7HuJeDMrwV9FeDuX7HIJeHQXOZ1FGD1rwHuB/DMrYZSXeDuFYVoXGDcJeZ9rqD1BeHuFGDMvsZSNiDWFYHMJsHQBsZSBqHAvmD5JeHgvCHEJqDWF/HMFGHQFYDuFaZ1vCVWBODMrwV9FeDuFqHMF7HQBqZ1FGHIveHQNUHgvCHArCDWX7HIB/HQNmDQB/HIrwHQFaHgNKDkBODuFqDoFGDcBqVIJwD1rwD5JeDMBYZSJqV5FaDoBODcJeDQFGD1veD5BOHgrYDkBsH5B7VEBiHQFYH9BOHArKD5XGDEBOZSXeDuFaDoJeDcJeDQX7Z1zGV5BiDMNOVIBOHEFYDoJeDcJUZ1FaD1NaD5raHgN7HEBUDurmZuJeHQXOZ9JeDSzGV5JwDMBYVIBODWFYVENUHQBiZ1B/HABYV5JsDMzGHAFKV5FaZuBOHQJeDQBOZ1rwVWXGHuBYDkFCDuX7VoX7D9BsH9B/Z1BeZMB/HgvCZSJGH5FYDoF7D9NwH9X7DSBYV5JeHuBYVcFKH5FqVoB/D9XOH9B/D1zGD5FaDMrYZSXeDuFYVoXGDcJeZ9rqD1BeV5BqHgvsDkB/V5X7DoX7D9BsH9FaD1rwZMB/DMNKZSJ3DWr/VoB/DcBwDQFGD1veD5BOHuNODkFCDWF/DoraD9BsZSBqHArKV5FUDMrYZSXeV5FqHIJsDcXGZSFUHABYHQBOHuBYDkBOV5X/VErqDcNmZSB/Z1NOV5JeDErKHENiDurmDoXGDcJeH9FGHIrwHuFaHuNOZSrCH5FqDoXGHQJmZ1FUZ1BeV5BqDEBOZSJGDWr/VoFGDcXOZSFGD1veV5raHgrKVcFCDWF/VoB/D9BsZ1rqHArYD5NUDMBYZSXeHEFqDoB/D9XsH9FUZ1rwV5JeDMvOVcB/V5X7DoXGHQNmZSBOZ1BeD5BqDErKVkJGDWFqVoB/DcJeH9X7HAvOD5NUHuzGVcFKDur/VorqHQJmZ1F7Z1vmD5rqDEBOHArCDWF/HIJsD9XsZ9JeD1BeD5F7DMvmVcXKDWJeVoBqHQJmZSFaHABYHuXGDMzGHEXeV5FqHMJwHQJKDQJsZ1vCV5FGHuNOV9FeDWXCVorqDcJUZ1BOZ1BeV5X7DENOHEJGH5FYDoBqD9XsDQB/Z1rwV5X7HuzGVIBOV5X7DoJsD9XGZSB/HArYHQJwDEBODkFeH5FYVoFGHQJKDQBqHAvmV5JeDMvOV9BUDuFGVorqHQNwZ1BiHAvsZMBOHgBeHEFiV5B3DoF7D9XsDuFaHAveHQJwHgrKVIBODuX7HMF7D9BsZ1FaHIBeZMBqDMveHEXeV5XCHIX7HQJKDQJsZ1vCV5FGHuNOV9FeDWXCHIJeD9JmZ1B/D1rwD5NUDErKVkXeH5F/DoB/DcJUDQFaHAN7D5rqHuNODkFCDWJeDoraD9XGZSBqHArKV5FUDMrYZSXeV5FqHIJsHQJeDQBOZ1vCV5Je";
      $this->prep_conect();
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m2_prueba']['ordem_cmp'] = "primer_apellido, segundo_apellido, primer_nombre, segundo_nombre"; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m2_prueba']['ordem_ord'] = ""; 
      if (isset($_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_p1_m2_prueba']['initialize']) && $_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_p1_m2_prueba']['initialize'])  
      { 
          $this->conectDB();
      }
   }

   function init2()
   {
      if (isset($_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_p1_m2_prueba']['initialize']) && $_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_p1_m2_prueba']['initialize'])  
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_p1_m2_prueba']['initialize'] = false;
          $this->Db->Close(); 
      } 
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
          if (!$_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['sc_outra_jan']) || $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['sc_outra_jan'] != 'form_t_evaluacion_p1_m2_prueba')) 
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
      $con_devel             =  (isset($_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_nm_conexao'])) ? $_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
      {
          foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
          {
              if (isset($_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_nm_conexao']) && $_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_nm_perfil']) && $_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      if (isset($_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_nm_conexao']))
      {
          db_conect_devel($con_devel, $this->root . $this->path_prod, 'agora_IV', 2); 
          if (empty($_SESSION['scriptcase']['glo_tpbanco']) && empty($_SESSION['scriptcase']['glo_banco']))
          {
              $nm_crit_perfil = true;
          }
      }
      if (isset($_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_nm_perfil'];
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
      if (!$_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_p1_m2_prueba']['embutida_form'] || !$_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_p1_m2_prueba']['embutida_proc']) 
      {
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
         $_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_p1_m2_prueba']['decimal_db'] = $_SESSION['scriptcase']['glo_decimal_db']; 
      }
      if (isset($_SESSION['scriptcase']['glo_date_separator']) && !empty($_SESSION['scriptcase']['glo_date_separator']))
      {
          $SC_temp = trim($_SESSION['scriptcase']['glo_date_separator']);
          if (strlen($SC_temp) == 2)
          {
              $_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_p1_m2_prueba']['SC_sep_date']  = substr($SC_temp, 0, 1); 
              $_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_p1_m2_prueba']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
          }
          else
          {
              $_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_p1_m2_prueba']['SC_sep_date']  = $SC_temp; 
              $_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_p1_m2_prueba']['SC_sep_date1'] = $SC_temp; 
          }
          $this->date_delim  = $_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_p1_m2_prueba']['SC_sep_date'];
          $this->date_delim1 = $_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_p1_m2_prueba']['SC_sep_date1'];
      }
      if (empty($this->nm_tabela))
      {
          $this->nm_tabela = "t_evaluacion"; 
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
          if (!$_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_p1_m2_prueba']['iframe_menu'] && (!isset($_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_p1_m2_prueba']['sc_outra_jan']) || $_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_p1_m2_prueba']['sc_outra_jan'] != 'form_t_evaluacion_p1_m2_prueba')) 
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
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['glo_nm_conexao'], $this->root . $this->path_prod, 'agora_IV'); 
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
           if (isset($_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_p1_m2_prueba']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_p1_m2_prueba']['SC_sep_date']))
           {
               $delim  = $_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_p1_m2_prueba']['SC_sep_date'];
               $delim1 = $_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_p1_m2_prueba']['SC_sep_date1'];
           }
           return $delim . $var . $delim1;
       }
       else
       {
           return $var;
       }
   } // sc_Sql_Protect
function get_evaluados($array) {
$_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['contr_erro'] = 'on';
                                
         $i = 0; foreach ($array as $x) 
                    if ($x > 0) $i++; 
         return $i; 
    
$_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['contr_erro'] = 'off';
}
function calcula_nota()
{
$_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['contr_erro'] = 'on';
if (!isset($this->sc_temp_porcent_autoevaluacion)) {$this->sc_temp_porcent_autoevaluacion = (isset($_SESSION['porcent_autoevaluacion'])) ? $_SESSION['porcent_autoevaluacion'] : "";}
if (!isset($this->sc_temp_porcentaje_gr3)) {$this->sc_temp_porcentaje_gr3 = (isset($_SESSION['porcentaje_gr3'])) ? $_SESSION['porcentaje_gr3'] : "";}
if (!isset($this->sc_temp_porcentaje_gr2)) {$this->sc_temp_porcentaje_gr2 = (isset($_SESSION['porcentaje_gr2'])) ? $_SESSION['porcentaje_gr2'] : "";}
if (!isset($this->sc_temp_porcentaje_gr1)) {$this->sc_temp_porcentaje_gr1 = (isset($_SESSION['porcentaje_gr1'])) ? $_SESSION['porcentaje_gr1'] : "";}
if (!isset($this->sc_temp_nota_maxima)) {$this->sc_temp_nota_maxima = (isset($_SESSION['nota_maxima'])) ? $_SESSION['nota_maxima'] : "";}
                               
if ($this->dc1_  > $this->sc_temp_nota_maxima || $this->dc2_  > $this->sc_temp_nota_maxima || $this->dc3_  > $this->sc_temp_nota_maxima|| $this->dc4_  > $this->sc_temp_nota_maxima|| $this->dc5_  > $this->sc_temp_nota_maxima || $this->dc6_  > $this->sc_temp_nota_maxima|| $this->dc7_  > $this->sc_temp_nota_maxima|| $this->dc8_  > $this->sc_temp_nota_maxima|| $this->dc9_  > $this->sc_temp_nota_maxima|| $this->dc10_  > $this->sc_temp_nota_maxima|| $this->dc11_  > $this->sc_temp_nota_maxima|| $this->dc12_  > $this->sc_temp_nota_maxima||$this->ds1_ > $this->sc_temp_nota_maxima||$this->ds2_ > $this->sc_temp_nota_maxima||$this->ds3_ > $this->sc_temp_nota_maxima||$this->ds4_ > $this->sc_temp_nota_maxima||$this->ds5_ > $this->sc_temp_nota_maxima||$this->dp1_ > $this->sc_temp_nota_maxima||$this->dp2_2p_  > $this->sc_temp_nota_maxima||$this->dp3_ > $this->sc_temp_nota_maxima||$this->dp4_ > $this->sc_temp_nota_maxima||$this->dp5_ > $this->sc_temp_nota_maxima  )
{

 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= " Error La maxima nota es".$this->sc_temp_nota_maxima;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_t_evaluacion_p1_m2_prueba' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = " Error La maxima nota es".$this->sc_temp_nota_maxima;
 }
;
}

$dc_p1=array($this->dc1_ ,$this->dc2_ ,$this->dc3_ ,$this->dc4_ );
$dp_p1=array($this->dc5_ ,$this->dc6_ ,$this->dc7_ ,$this->dc8_ );
$ds_p1=array($this->dc9_ ,$this->dc10_ ,$this->dc11_ ,$this->dc12_ );


$evaluados_dc_p1=$this->get_evaluados($dc_p1);

if ($evaluados_dc_p1== 0){   
	$evaluados_dc_p1 = 1;
	}
$evaluados_dp_p1=$this->get_evaluados($dp_p1);

if ($evaluados_dp_p1== 0){  
	$evaluados_dp_p1 = 1;
	}
$evaluados_ds_p1=$this->get_evaluados($ds_p1);

if ($evaluados_ds_p1== 0){  
	$evaluados_ds_p1 = 1;
	}





$this->pcent_dc_ =(($this->dc1_ +$this->dc2_ +$this->dc3_ +$this->dc4_ )/$evaluados_dc_p1)*$this->sc_temp_porcentaje_gr1/100;
$this->pcent_dp_ =(($this->dc5_ +$this->dc6_ +$this->dc7_ +$this->dc8_ )/$evaluados_dp_p1)*$this->sc_temp_porcentaje_gr2/100;
$this->pcent_ds_ =(($this->dc9_ +$this->dc10_ +$this->dc11_ +$this->dc12_ )/$evaluados_ds_p1)*$this->sc_temp_porcentaje_gr3 /100;
$this->porcent_aeep1_ =($this->aeep1_ *$this->sc_temp_porcent_autoevaluacion)/100;

$this->eval_1_per_ = $this->pcent_dc_ +$this->pcent_dp_ +$this->pcent_ds_ +$this->porcent_aeep1_ ;
if (isset($this->sc_temp_nota_maxima)) { $_SESSION['nota_maxima'] = $this->sc_temp_nota_maxima;}
if (isset($this->sc_temp_porcentaje_gr1)) { $_SESSION['porcentaje_gr1'] = $this->sc_temp_porcentaje_gr1;}
if (isset($this->sc_temp_porcentaje_gr2)) { $_SESSION['porcentaje_gr2'] = $this->sc_temp_porcentaje_gr2;}
if (isset($this->sc_temp_porcentaje_gr3)) { $_SESSION['porcentaje_gr3'] = $this->sc_temp_porcentaje_gr3;}
if (isset($this->sc_temp_porcent_autoevaluacion)) { $_SESSION['porcent_autoevaluacion'] = $this->sc_temp_porcent_autoevaluacion;}
$_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['contr_erro'] = 'off';
}
function dc10__onBlur()
{
$_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['contr_erro'] = 'on';
                               
$original_dc1_ = $this->dc1_;
$original_dc2_ = $this->dc2_;
$original_dc3_ = $this->dc3_;
$original_dc4_ = $this->dc4_;
$original_dc5_ = $this->dc5_;
$original_dc6_ = $this->dc6_;
$original_dc7_ = $this->dc7_;
$original_dc8_ = $this->dc8_;
$original_dc9_ = $this->dc9_;
$original_dc10_ = $this->dc10_;
$original_dc11_ = $this->dc11_;
$original_dc12_ = $this->dc12_;
$original_pcent_dc_ = $this->pcent_dc_;
$original_pcent_dp_ = $this->pcent_dp_;
$original_pcent_ds_ = $this->pcent_ds_;
$original_eval_1_per_ = $this->eval_1_per_;
$this->calcula_nota();

$modificado_dc1_ = $this->dc1_;
$modificado_dc2_ = $this->dc2_;
$modificado_dc3_ = $this->dc3_;
$modificado_dc4_ = $this->dc4_;
$modificado_dc5_ = $this->dc5_;
$modificado_dc6_ = $this->dc6_;
$modificado_dc7_ = $this->dc7_;
$modificado_dc8_ = $this->dc8_;
$modificado_dc9_ = $this->dc9_;
$modificado_dc10_ = $this->dc10_;
$modificado_dc11_ = $this->dc11_;
$modificado_dc12_ = $this->dc12_;
$modificado_pcent_dc_ = $this->pcent_dc_;
$modificado_pcent_dp_ = $this->pcent_dp_;
$modificado_pcent_ds_ = $this->pcent_ds_;
$modificado_eval_1_per_ = $this->eval_1_per_;
$this->nm_formatar_campos('dc1_', 'dc2_', 'dc3_', 'dc4_', 'dc5_', 'dc6_', 'dc7_', 'dc8_', 'dc9_', 'dc10_', 'dc11_', 'dc12_', 'pcent_dc_', 'pcent_dp_', 'pcent_ds_', 'eval_1_per_');
$this->nmgp_refresh_fields = array();
if ($original_dc1_ !== $modificado_dc1_ || (isset($bFlagRead_dc1_) && $bFlagRead_dc1_))
{
    $this->nmgp_refresh_fields[] = 'dc1_';
    $this->NM_ajax_changed['dc1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc2_ !== $modificado_dc2_ || (isset($bFlagRead_dc2_) && $bFlagRead_dc2_))
{
    $this->nmgp_refresh_fields[] = 'dc2_';
    $this->NM_ajax_changed['dc2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc3_ !== $modificado_dc3_ || (isset($bFlagRead_dc3_) && $bFlagRead_dc3_))
{
    $this->nmgp_refresh_fields[] = 'dc3_';
    $this->NM_ajax_changed['dc3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc4_ !== $modificado_dc4_ || (isset($bFlagRead_dc4_) && $bFlagRead_dc4_))
{
    $this->nmgp_refresh_fields[] = 'dc4_';
    $this->NM_ajax_changed['dc4_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc5_ !== $modificado_dc5_ || (isset($bFlagRead_dc5_) && $bFlagRead_dc5_))
{
    $this->nmgp_refresh_fields[] = 'dc5_';
    $this->NM_ajax_changed['dc5_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc6_ !== $modificado_dc6_ || (isset($bFlagRead_dc6_) && $bFlagRead_dc6_))
{
    $this->nmgp_refresh_fields[] = 'dc6_';
    $this->NM_ajax_changed['dc6_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc7_ !== $modificado_dc7_ || (isset($bFlagRead_dc7_) && $bFlagRead_dc7_))
{
    $this->nmgp_refresh_fields[] = 'dc7_';
    $this->NM_ajax_changed['dc7_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc8_ !== $modificado_dc8_ || (isset($bFlagRead_dc8_) && $bFlagRead_dc8_))
{
    $this->nmgp_refresh_fields[] = 'dc8_';
    $this->NM_ajax_changed['dc8_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc9_ !== $modificado_dc9_ || (isset($bFlagRead_dc9_) && $bFlagRead_dc9_))
{
    $this->nmgp_refresh_fields[] = 'dc9_';
    $this->NM_ajax_changed['dc9_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc10_ !== $modificado_dc10_ || (isset($bFlagRead_dc10_) && $bFlagRead_dc10_))
{
    $this->nmgp_refresh_fields[] = 'dc10_';
    $this->NM_ajax_changed['dc10_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc11_ !== $modificado_dc11_ || (isset($bFlagRead_dc11_) && $bFlagRead_dc11_))
{
    $this->nmgp_refresh_fields[] = 'dc11_';
    $this->NM_ajax_changed['dc11_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc12_ !== $modificado_dc12_ || (isset($bFlagRead_dc12_) && $bFlagRead_dc12_))
{
    $this->nmgp_refresh_fields[] = 'dc12_';
    $this->NM_ajax_changed['dc12_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dc_ !== $modificado_pcent_dc_ || (isset($bFlagRead_pcent_dc_) && $bFlagRead_pcent_dc_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dc_';
    $this->NM_ajax_changed['pcent_dc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dp_ !== $modificado_pcent_dp_ || (isset($bFlagRead_pcent_dp_) && $bFlagRead_pcent_dp_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dp_';
    $this->NM_ajax_changed['pcent_dp_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_ds_ !== $modificado_pcent_ds_ || (isset($bFlagRead_pcent_ds_) && $bFlagRead_pcent_ds_))
{
    $this->nmgp_refresh_fields[] = 'pcent_ds_';
    $this->NM_ajax_changed['pcent_ds_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_eval_1_per_ !== $modificado_eval_1_per_ || (isset($bFlagRead_eval_1_per_) && $bFlagRead_eval_1_per_))
{
    $this->nmgp_refresh_fields[] = 'eval_1_per_';
    $this->NM_ajax_changed['eval_1_per_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
form_t_evaluacion_p1_m2_prueba_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['contr_erro'] = 'off';
}
function dc11__onBlur()
{
$_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['contr_erro'] = 'on';
                               
$original_dc1_ = $this->dc1_;
$original_dc2_ = $this->dc2_;
$original_dc3_ = $this->dc3_;
$original_dc4_ = $this->dc4_;
$original_dc5_ = $this->dc5_;
$original_dc6_ = $this->dc6_;
$original_dc7_ = $this->dc7_;
$original_dc8_ = $this->dc8_;
$original_dc9_ = $this->dc9_;
$original_dc10_ = $this->dc10_;
$original_dc11_ = $this->dc11_;
$original_dc12_ = $this->dc12_;
$original_pcent_dc_ = $this->pcent_dc_;
$original_pcent_dp_ = $this->pcent_dp_;
$original_pcent_ds_ = $this->pcent_ds_;
$original_eval_1_per_ = $this->eval_1_per_;
$this->calcula_nota();

$modificado_dc1_ = $this->dc1_;
$modificado_dc2_ = $this->dc2_;
$modificado_dc3_ = $this->dc3_;
$modificado_dc4_ = $this->dc4_;
$modificado_dc5_ = $this->dc5_;
$modificado_dc6_ = $this->dc6_;
$modificado_dc7_ = $this->dc7_;
$modificado_dc8_ = $this->dc8_;
$modificado_dc9_ = $this->dc9_;
$modificado_dc10_ = $this->dc10_;
$modificado_dc11_ = $this->dc11_;
$modificado_dc12_ = $this->dc12_;
$modificado_pcent_dc_ = $this->pcent_dc_;
$modificado_pcent_dp_ = $this->pcent_dp_;
$modificado_pcent_ds_ = $this->pcent_ds_;
$modificado_eval_1_per_ = $this->eval_1_per_;
$this->nm_formatar_campos('dc1_', 'dc2_', 'dc3_', 'dc4_', 'dc5_', 'dc6_', 'dc7_', 'dc8_', 'dc9_', 'dc10_', 'dc11_', 'dc12_', 'pcent_dc_', 'pcent_dp_', 'pcent_ds_', 'eval_1_per_');
$this->nmgp_refresh_fields = array();
if ($original_dc1_ !== $modificado_dc1_ || (isset($bFlagRead_dc1_) && $bFlagRead_dc1_))
{
    $this->nmgp_refresh_fields[] = 'dc1_';
    $this->NM_ajax_changed['dc1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc2_ !== $modificado_dc2_ || (isset($bFlagRead_dc2_) && $bFlagRead_dc2_))
{
    $this->nmgp_refresh_fields[] = 'dc2_';
    $this->NM_ajax_changed['dc2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc3_ !== $modificado_dc3_ || (isset($bFlagRead_dc3_) && $bFlagRead_dc3_))
{
    $this->nmgp_refresh_fields[] = 'dc3_';
    $this->NM_ajax_changed['dc3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc4_ !== $modificado_dc4_ || (isset($bFlagRead_dc4_) && $bFlagRead_dc4_))
{
    $this->nmgp_refresh_fields[] = 'dc4_';
    $this->NM_ajax_changed['dc4_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc5_ !== $modificado_dc5_ || (isset($bFlagRead_dc5_) && $bFlagRead_dc5_))
{
    $this->nmgp_refresh_fields[] = 'dc5_';
    $this->NM_ajax_changed['dc5_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc6_ !== $modificado_dc6_ || (isset($bFlagRead_dc6_) && $bFlagRead_dc6_))
{
    $this->nmgp_refresh_fields[] = 'dc6_';
    $this->NM_ajax_changed['dc6_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc7_ !== $modificado_dc7_ || (isset($bFlagRead_dc7_) && $bFlagRead_dc7_))
{
    $this->nmgp_refresh_fields[] = 'dc7_';
    $this->NM_ajax_changed['dc7_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc8_ !== $modificado_dc8_ || (isset($bFlagRead_dc8_) && $bFlagRead_dc8_))
{
    $this->nmgp_refresh_fields[] = 'dc8_';
    $this->NM_ajax_changed['dc8_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc9_ !== $modificado_dc9_ || (isset($bFlagRead_dc9_) && $bFlagRead_dc9_))
{
    $this->nmgp_refresh_fields[] = 'dc9_';
    $this->NM_ajax_changed['dc9_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc10_ !== $modificado_dc10_ || (isset($bFlagRead_dc10_) && $bFlagRead_dc10_))
{
    $this->nmgp_refresh_fields[] = 'dc10_';
    $this->NM_ajax_changed['dc10_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc11_ !== $modificado_dc11_ || (isset($bFlagRead_dc11_) && $bFlagRead_dc11_))
{
    $this->nmgp_refresh_fields[] = 'dc11_';
    $this->NM_ajax_changed['dc11_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc12_ !== $modificado_dc12_ || (isset($bFlagRead_dc12_) && $bFlagRead_dc12_))
{
    $this->nmgp_refresh_fields[] = 'dc12_';
    $this->NM_ajax_changed['dc12_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dc_ !== $modificado_pcent_dc_ || (isset($bFlagRead_pcent_dc_) && $bFlagRead_pcent_dc_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dc_';
    $this->NM_ajax_changed['pcent_dc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dp_ !== $modificado_pcent_dp_ || (isset($bFlagRead_pcent_dp_) && $bFlagRead_pcent_dp_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dp_';
    $this->NM_ajax_changed['pcent_dp_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_ds_ !== $modificado_pcent_ds_ || (isset($bFlagRead_pcent_ds_) && $bFlagRead_pcent_ds_))
{
    $this->nmgp_refresh_fields[] = 'pcent_ds_';
    $this->NM_ajax_changed['pcent_ds_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_eval_1_per_ !== $modificado_eval_1_per_ || (isset($bFlagRead_eval_1_per_) && $bFlagRead_eval_1_per_))
{
    $this->nmgp_refresh_fields[] = 'eval_1_per_';
    $this->NM_ajax_changed['eval_1_per_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
form_t_evaluacion_p1_m2_prueba_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['contr_erro'] = 'off';
}
function dc12__onBlur()
{
$_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['contr_erro'] = 'on';
                               
$original_dc1_ = $this->dc1_;
$original_dc2_ = $this->dc2_;
$original_dc3_ = $this->dc3_;
$original_dc4_ = $this->dc4_;
$original_dc5_ = $this->dc5_;
$original_dc6_ = $this->dc6_;
$original_dc7_ = $this->dc7_;
$original_dc8_ = $this->dc8_;
$original_dc9_ = $this->dc9_;
$original_dc10_ = $this->dc10_;
$original_dc11_ = $this->dc11_;
$original_dc12_ = $this->dc12_;
$original_pcent_dc_ = $this->pcent_dc_;
$original_pcent_dp_ = $this->pcent_dp_;
$original_pcent_ds_ = $this->pcent_ds_;
$original_eval_1_per_ = $this->eval_1_per_;
$this->calcula_nota();

$modificado_dc1_ = $this->dc1_;
$modificado_dc2_ = $this->dc2_;
$modificado_dc3_ = $this->dc3_;
$modificado_dc4_ = $this->dc4_;
$modificado_dc5_ = $this->dc5_;
$modificado_dc6_ = $this->dc6_;
$modificado_dc7_ = $this->dc7_;
$modificado_dc8_ = $this->dc8_;
$modificado_dc9_ = $this->dc9_;
$modificado_dc10_ = $this->dc10_;
$modificado_dc11_ = $this->dc11_;
$modificado_dc12_ = $this->dc12_;
$modificado_pcent_dc_ = $this->pcent_dc_;
$modificado_pcent_dp_ = $this->pcent_dp_;
$modificado_pcent_ds_ = $this->pcent_ds_;
$modificado_eval_1_per_ = $this->eval_1_per_;
$this->nm_formatar_campos('dc1_', 'dc2_', 'dc3_', 'dc4_', 'dc5_', 'dc6_', 'dc7_', 'dc8_', 'dc9_', 'dc10_', 'dc11_', 'dc12_', 'pcent_dc_', 'pcent_dp_', 'pcent_ds_', 'eval_1_per_');
$this->nmgp_refresh_fields = array();
if ($original_dc1_ !== $modificado_dc1_ || (isset($bFlagRead_dc1_) && $bFlagRead_dc1_))
{
    $this->nmgp_refresh_fields[] = 'dc1_';
    $this->NM_ajax_changed['dc1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc2_ !== $modificado_dc2_ || (isset($bFlagRead_dc2_) && $bFlagRead_dc2_))
{
    $this->nmgp_refresh_fields[] = 'dc2_';
    $this->NM_ajax_changed['dc2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc3_ !== $modificado_dc3_ || (isset($bFlagRead_dc3_) && $bFlagRead_dc3_))
{
    $this->nmgp_refresh_fields[] = 'dc3_';
    $this->NM_ajax_changed['dc3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc4_ !== $modificado_dc4_ || (isset($bFlagRead_dc4_) && $bFlagRead_dc4_))
{
    $this->nmgp_refresh_fields[] = 'dc4_';
    $this->NM_ajax_changed['dc4_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc5_ !== $modificado_dc5_ || (isset($bFlagRead_dc5_) && $bFlagRead_dc5_))
{
    $this->nmgp_refresh_fields[] = 'dc5_';
    $this->NM_ajax_changed['dc5_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc6_ !== $modificado_dc6_ || (isset($bFlagRead_dc6_) && $bFlagRead_dc6_))
{
    $this->nmgp_refresh_fields[] = 'dc6_';
    $this->NM_ajax_changed['dc6_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc7_ !== $modificado_dc7_ || (isset($bFlagRead_dc7_) && $bFlagRead_dc7_))
{
    $this->nmgp_refresh_fields[] = 'dc7_';
    $this->NM_ajax_changed['dc7_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc8_ !== $modificado_dc8_ || (isset($bFlagRead_dc8_) && $bFlagRead_dc8_))
{
    $this->nmgp_refresh_fields[] = 'dc8_';
    $this->NM_ajax_changed['dc8_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc9_ !== $modificado_dc9_ || (isset($bFlagRead_dc9_) && $bFlagRead_dc9_))
{
    $this->nmgp_refresh_fields[] = 'dc9_';
    $this->NM_ajax_changed['dc9_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc10_ !== $modificado_dc10_ || (isset($bFlagRead_dc10_) && $bFlagRead_dc10_))
{
    $this->nmgp_refresh_fields[] = 'dc10_';
    $this->NM_ajax_changed['dc10_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc11_ !== $modificado_dc11_ || (isset($bFlagRead_dc11_) && $bFlagRead_dc11_))
{
    $this->nmgp_refresh_fields[] = 'dc11_';
    $this->NM_ajax_changed['dc11_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc12_ !== $modificado_dc12_ || (isset($bFlagRead_dc12_) && $bFlagRead_dc12_))
{
    $this->nmgp_refresh_fields[] = 'dc12_';
    $this->NM_ajax_changed['dc12_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dc_ !== $modificado_pcent_dc_ || (isset($bFlagRead_pcent_dc_) && $bFlagRead_pcent_dc_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dc_';
    $this->NM_ajax_changed['pcent_dc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dp_ !== $modificado_pcent_dp_ || (isset($bFlagRead_pcent_dp_) && $bFlagRead_pcent_dp_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dp_';
    $this->NM_ajax_changed['pcent_dp_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_ds_ !== $modificado_pcent_ds_ || (isset($bFlagRead_pcent_ds_) && $bFlagRead_pcent_ds_))
{
    $this->nmgp_refresh_fields[] = 'pcent_ds_';
    $this->NM_ajax_changed['pcent_ds_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_eval_1_per_ !== $modificado_eval_1_per_ || (isset($bFlagRead_eval_1_per_) && $bFlagRead_eval_1_per_))
{
    $this->nmgp_refresh_fields[] = 'eval_1_per_';
    $this->NM_ajax_changed['eval_1_per_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
form_t_evaluacion_p1_m2_prueba_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['contr_erro'] = 'off';
}
function dc1__onBlur()
{
$_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['contr_erro'] = 'on';
                               
$original_dc1_ = $this->dc1_;
$original_dc2_ = $this->dc2_;
$original_dc3_ = $this->dc3_;
$original_dc4_ = $this->dc4_;
$original_dc5_ = $this->dc5_;
$original_dc6_ = $this->dc6_;
$original_dc7_ = $this->dc7_;
$original_dc8_ = $this->dc8_;
$original_dc9_ = $this->dc9_;
$original_dc10_ = $this->dc10_;
$original_dc11_ = $this->dc11_;
$original_dc12_ = $this->dc12_;
$original_pcent_dc_ = $this->pcent_dc_;
$original_pcent_dp_ = $this->pcent_dp_;
$original_pcent_ds_ = $this->pcent_ds_;
$original_eval_1_per_ = $this->eval_1_per_;
$this->calcula_nota();

$modificado_dc1_ = $this->dc1_;
$modificado_dc2_ = $this->dc2_;
$modificado_dc3_ = $this->dc3_;
$modificado_dc4_ = $this->dc4_;
$modificado_dc5_ = $this->dc5_;
$modificado_dc6_ = $this->dc6_;
$modificado_dc7_ = $this->dc7_;
$modificado_dc8_ = $this->dc8_;
$modificado_dc9_ = $this->dc9_;
$modificado_dc10_ = $this->dc10_;
$modificado_dc11_ = $this->dc11_;
$modificado_dc12_ = $this->dc12_;
$modificado_pcent_dc_ = $this->pcent_dc_;
$modificado_pcent_dp_ = $this->pcent_dp_;
$modificado_pcent_ds_ = $this->pcent_ds_;
$modificado_eval_1_per_ = $this->eval_1_per_;
$this->nm_formatar_campos('dc1_', 'dc2_', 'dc3_', 'dc4_', 'dc5_', 'dc6_', 'dc7_', 'dc8_', 'dc9_', 'dc10_', 'dc11_', 'dc12_', 'pcent_dc_', 'pcent_dp_', 'pcent_ds_', 'eval_1_per_');
$this->nmgp_refresh_fields = array();
if ($original_dc1_ !== $modificado_dc1_ || (isset($bFlagRead_dc1_) && $bFlagRead_dc1_))
{
    $this->nmgp_refresh_fields[] = 'dc1_';
    $this->NM_ajax_changed['dc1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc2_ !== $modificado_dc2_ || (isset($bFlagRead_dc2_) && $bFlagRead_dc2_))
{
    $this->nmgp_refresh_fields[] = 'dc2_';
    $this->NM_ajax_changed['dc2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc3_ !== $modificado_dc3_ || (isset($bFlagRead_dc3_) && $bFlagRead_dc3_))
{
    $this->nmgp_refresh_fields[] = 'dc3_';
    $this->NM_ajax_changed['dc3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc4_ !== $modificado_dc4_ || (isset($bFlagRead_dc4_) && $bFlagRead_dc4_))
{
    $this->nmgp_refresh_fields[] = 'dc4_';
    $this->NM_ajax_changed['dc4_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc5_ !== $modificado_dc5_ || (isset($bFlagRead_dc5_) && $bFlagRead_dc5_))
{
    $this->nmgp_refresh_fields[] = 'dc5_';
    $this->NM_ajax_changed['dc5_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc6_ !== $modificado_dc6_ || (isset($bFlagRead_dc6_) && $bFlagRead_dc6_))
{
    $this->nmgp_refresh_fields[] = 'dc6_';
    $this->NM_ajax_changed['dc6_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc7_ !== $modificado_dc7_ || (isset($bFlagRead_dc7_) && $bFlagRead_dc7_))
{
    $this->nmgp_refresh_fields[] = 'dc7_';
    $this->NM_ajax_changed['dc7_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc8_ !== $modificado_dc8_ || (isset($bFlagRead_dc8_) && $bFlagRead_dc8_))
{
    $this->nmgp_refresh_fields[] = 'dc8_';
    $this->NM_ajax_changed['dc8_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc9_ !== $modificado_dc9_ || (isset($bFlagRead_dc9_) && $bFlagRead_dc9_))
{
    $this->nmgp_refresh_fields[] = 'dc9_';
    $this->NM_ajax_changed['dc9_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc10_ !== $modificado_dc10_ || (isset($bFlagRead_dc10_) && $bFlagRead_dc10_))
{
    $this->nmgp_refresh_fields[] = 'dc10_';
    $this->NM_ajax_changed['dc10_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc11_ !== $modificado_dc11_ || (isset($bFlagRead_dc11_) && $bFlagRead_dc11_))
{
    $this->nmgp_refresh_fields[] = 'dc11_';
    $this->NM_ajax_changed['dc11_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc12_ !== $modificado_dc12_ || (isset($bFlagRead_dc12_) && $bFlagRead_dc12_))
{
    $this->nmgp_refresh_fields[] = 'dc12_';
    $this->NM_ajax_changed['dc12_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dc_ !== $modificado_pcent_dc_ || (isset($bFlagRead_pcent_dc_) && $bFlagRead_pcent_dc_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dc_';
    $this->NM_ajax_changed['pcent_dc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dp_ !== $modificado_pcent_dp_ || (isset($bFlagRead_pcent_dp_) && $bFlagRead_pcent_dp_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dp_';
    $this->NM_ajax_changed['pcent_dp_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_ds_ !== $modificado_pcent_ds_ || (isset($bFlagRead_pcent_ds_) && $bFlagRead_pcent_ds_))
{
    $this->nmgp_refresh_fields[] = 'pcent_ds_';
    $this->NM_ajax_changed['pcent_ds_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_eval_1_per_ !== $modificado_eval_1_per_ || (isset($bFlagRead_eval_1_per_) && $bFlagRead_eval_1_per_))
{
    $this->nmgp_refresh_fields[] = 'eval_1_per_';
    $this->NM_ajax_changed['eval_1_per_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
form_t_evaluacion_p1_m2_prueba_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['contr_erro'] = 'off';
}
function dc2__onBlur()
{
$_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['contr_erro'] = 'on';
                               
$original_dc1_ = $this->dc1_;
$original_dc2_ = $this->dc2_;
$original_dc3_ = $this->dc3_;
$original_dc4_ = $this->dc4_;
$original_dc5_ = $this->dc5_;
$original_dc6_ = $this->dc6_;
$original_dc7_ = $this->dc7_;
$original_dc8_ = $this->dc8_;
$original_dc9_ = $this->dc9_;
$original_dc10_ = $this->dc10_;
$original_dc11_ = $this->dc11_;
$original_dc12_ = $this->dc12_;
$original_pcent_dc_ = $this->pcent_dc_;
$original_pcent_dp_ = $this->pcent_dp_;
$original_pcent_ds_ = $this->pcent_ds_;
$original_eval_1_per_ = $this->eval_1_per_;
$this->calcula_nota();

$modificado_dc1_ = $this->dc1_;
$modificado_dc2_ = $this->dc2_;
$modificado_dc3_ = $this->dc3_;
$modificado_dc4_ = $this->dc4_;
$modificado_dc5_ = $this->dc5_;
$modificado_dc6_ = $this->dc6_;
$modificado_dc7_ = $this->dc7_;
$modificado_dc8_ = $this->dc8_;
$modificado_dc9_ = $this->dc9_;
$modificado_dc10_ = $this->dc10_;
$modificado_dc11_ = $this->dc11_;
$modificado_dc12_ = $this->dc12_;
$modificado_pcent_dc_ = $this->pcent_dc_;
$modificado_pcent_dp_ = $this->pcent_dp_;
$modificado_pcent_ds_ = $this->pcent_ds_;
$modificado_eval_1_per_ = $this->eval_1_per_;
$this->nm_formatar_campos('dc1_', 'dc2_', 'dc3_', 'dc4_', 'dc5_', 'dc6_', 'dc7_', 'dc8_', 'dc9_', 'dc10_', 'dc11_', 'dc12_', 'pcent_dc_', 'pcent_dp_', 'pcent_ds_', 'eval_1_per_');
$this->nmgp_refresh_fields = array();
if ($original_dc1_ !== $modificado_dc1_ || (isset($bFlagRead_dc1_) && $bFlagRead_dc1_))
{
    $this->nmgp_refresh_fields[] = 'dc1_';
    $this->NM_ajax_changed['dc1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc2_ !== $modificado_dc2_ || (isset($bFlagRead_dc2_) && $bFlagRead_dc2_))
{
    $this->nmgp_refresh_fields[] = 'dc2_';
    $this->NM_ajax_changed['dc2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc3_ !== $modificado_dc3_ || (isset($bFlagRead_dc3_) && $bFlagRead_dc3_))
{
    $this->nmgp_refresh_fields[] = 'dc3_';
    $this->NM_ajax_changed['dc3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc4_ !== $modificado_dc4_ || (isset($bFlagRead_dc4_) && $bFlagRead_dc4_))
{
    $this->nmgp_refresh_fields[] = 'dc4_';
    $this->NM_ajax_changed['dc4_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc5_ !== $modificado_dc5_ || (isset($bFlagRead_dc5_) && $bFlagRead_dc5_))
{
    $this->nmgp_refresh_fields[] = 'dc5_';
    $this->NM_ajax_changed['dc5_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc6_ !== $modificado_dc6_ || (isset($bFlagRead_dc6_) && $bFlagRead_dc6_))
{
    $this->nmgp_refresh_fields[] = 'dc6_';
    $this->NM_ajax_changed['dc6_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc7_ !== $modificado_dc7_ || (isset($bFlagRead_dc7_) && $bFlagRead_dc7_))
{
    $this->nmgp_refresh_fields[] = 'dc7_';
    $this->NM_ajax_changed['dc7_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc8_ !== $modificado_dc8_ || (isset($bFlagRead_dc8_) && $bFlagRead_dc8_))
{
    $this->nmgp_refresh_fields[] = 'dc8_';
    $this->NM_ajax_changed['dc8_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc9_ !== $modificado_dc9_ || (isset($bFlagRead_dc9_) && $bFlagRead_dc9_))
{
    $this->nmgp_refresh_fields[] = 'dc9_';
    $this->NM_ajax_changed['dc9_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc10_ !== $modificado_dc10_ || (isset($bFlagRead_dc10_) && $bFlagRead_dc10_))
{
    $this->nmgp_refresh_fields[] = 'dc10_';
    $this->NM_ajax_changed['dc10_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc11_ !== $modificado_dc11_ || (isset($bFlagRead_dc11_) && $bFlagRead_dc11_))
{
    $this->nmgp_refresh_fields[] = 'dc11_';
    $this->NM_ajax_changed['dc11_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc12_ !== $modificado_dc12_ || (isset($bFlagRead_dc12_) && $bFlagRead_dc12_))
{
    $this->nmgp_refresh_fields[] = 'dc12_';
    $this->NM_ajax_changed['dc12_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dc_ !== $modificado_pcent_dc_ || (isset($bFlagRead_pcent_dc_) && $bFlagRead_pcent_dc_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dc_';
    $this->NM_ajax_changed['pcent_dc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dp_ !== $modificado_pcent_dp_ || (isset($bFlagRead_pcent_dp_) && $bFlagRead_pcent_dp_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dp_';
    $this->NM_ajax_changed['pcent_dp_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_ds_ !== $modificado_pcent_ds_ || (isset($bFlagRead_pcent_ds_) && $bFlagRead_pcent_ds_))
{
    $this->nmgp_refresh_fields[] = 'pcent_ds_';
    $this->NM_ajax_changed['pcent_ds_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_eval_1_per_ !== $modificado_eval_1_per_ || (isset($bFlagRead_eval_1_per_) && $bFlagRead_eval_1_per_))
{
    $this->nmgp_refresh_fields[] = 'eval_1_per_';
    $this->NM_ajax_changed['eval_1_per_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
form_t_evaluacion_p1_m2_prueba_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['contr_erro'] = 'off';
}
function dc3__onBlur()
{
$_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['contr_erro'] = 'on';
                               
$original_dc1_ = $this->dc1_;
$original_dc2_ = $this->dc2_;
$original_dc3_ = $this->dc3_;
$original_dc4_ = $this->dc4_;
$original_dc5_ = $this->dc5_;
$original_dc6_ = $this->dc6_;
$original_dc7_ = $this->dc7_;
$original_dc8_ = $this->dc8_;
$original_dc9_ = $this->dc9_;
$original_dc10_ = $this->dc10_;
$original_dc11_ = $this->dc11_;
$original_dc12_ = $this->dc12_;
$original_pcent_dc_ = $this->pcent_dc_;
$original_pcent_dp_ = $this->pcent_dp_;
$original_pcent_ds_ = $this->pcent_ds_;
$original_eval_1_per_ = $this->eval_1_per_;
$this->calcula_nota();

$modificado_dc1_ = $this->dc1_;
$modificado_dc2_ = $this->dc2_;
$modificado_dc3_ = $this->dc3_;
$modificado_dc4_ = $this->dc4_;
$modificado_dc5_ = $this->dc5_;
$modificado_dc6_ = $this->dc6_;
$modificado_dc7_ = $this->dc7_;
$modificado_dc8_ = $this->dc8_;
$modificado_dc9_ = $this->dc9_;
$modificado_dc10_ = $this->dc10_;
$modificado_dc11_ = $this->dc11_;
$modificado_dc12_ = $this->dc12_;
$modificado_pcent_dc_ = $this->pcent_dc_;
$modificado_pcent_dp_ = $this->pcent_dp_;
$modificado_pcent_ds_ = $this->pcent_ds_;
$modificado_eval_1_per_ = $this->eval_1_per_;
$this->nm_formatar_campos('dc1_', 'dc2_', 'dc3_', 'dc4_', 'dc5_', 'dc6_', 'dc7_', 'dc8_', 'dc9_', 'dc10_', 'dc11_', 'dc12_', 'pcent_dc_', 'pcent_dp_', 'pcent_ds_', 'eval_1_per_');
$this->nmgp_refresh_fields = array();
if ($original_dc1_ !== $modificado_dc1_ || (isset($bFlagRead_dc1_) && $bFlagRead_dc1_))
{
    $this->nmgp_refresh_fields[] = 'dc1_';
    $this->NM_ajax_changed['dc1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc2_ !== $modificado_dc2_ || (isset($bFlagRead_dc2_) && $bFlagRead_dc2_))
{
    $this->nmgp_refresh_fields[] = 'dc2_';
    $this->NM_ajax_changed['dc2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc3_ !== $modificado_dc3_ || (isset($bFlagRead_dc3_) && $bFlagRead_dc3_))
{
    $this->nmgp_refresh_fields[] = 'dc3_';
    $this->NM_ajax_changed['dc3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc4_ !== $modificado_dc4_ || (isset($bFlagRead_dc4_) && $bFlagRead_dc4_))
{
    $this->nmgp_refresh_fields[] = 'dc4_';
    $this->NM_ajax_changed['dc4_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc5_ !== $modificado_dc5_ || (isset($bFlagRead_dc5_) && $bFlagRead_dc5_))
{
    $this->nmgp_refresh_fields[] = 'dc5_';
    $this->NM_ajax_changed['dc5_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc6_ !== $modificado_dc6_ || (isset($bFlagRead_dc6_) && $bFlagRead_dc6_))
{
    $this->nmgp_refresh_fields[] = 'dc6_';
    $this->NM_ajax_changed['dc6_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc7_ !== $modificado_dc7_ || (isset($bFlagRead_dc7_) && $bFlagRead_dc7_))
{
    $this->nmgp_refresh_fields[] = 'dc7_';
    $this->NM_ajax_changed['dc7_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc8_ !== $modificado_dc8_ || (isset($bFlagRead_dc8_) && $bFlagRead_dc8_))
{
    $this->nmgp_refresh_fields[] = 'dc8_';
    $this->NM_ajax_changed['dc8_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc9_ !== $modificado_dc9_ || (isset($bFlagRead_dc9_) && $bFlagRead_dc9_))
{
    $this->nmgp_refresh_fields[] = 'dc9_';
    $this->NM_ajax_changed['dc9_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc10_ !== $modificado_dc10_ || (isset($bFlagRead_dc10_) && $bFlagRead_dc10_))
{
    $this->nmgp_refresh_fields[] = 'dc10_';
    $this->NM_ajax_changed['dc10_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc11_ !== $modificado_dc11_ || (isset($bFlagRead_dc11_) && $bFlagRead_dc11_))
{
    $this->nmgp_refresh_fields[] = 'dc11_';
    $this->NM_ajax_changed['dc11_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc12_ !== $modificado_dc12_ || (isset($bFlagRead_dc12_) && $bFlagRead_dc12_))
{
    $this->nmgp_refresh_fields[] = 'dc12_';
    $this->NM_ajax_changed['dc12_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dc_ !== $modificado_pcent_dc_ || (isset($bFlagRead_pcent_dc_) && $bFlagRead_pcent_dc_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dc_';
    $this->NM_ajax_changed['pcent_dc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dp_ !== $modificado_pcent_dp_ || (isset($bFlagRead_pcent_dp_) && $bFlagRead_pcent_dp_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dp_';
    $this->NM_ajax_changed['pcent_dp_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_ds_ !== $modificado_pcent_ds_ || (isset($bFlagRead_pcent_ds_) && $bFlagRead_pcent_ds_))
{
    $this->nmgp_refresh_fields[] = 'pcent_ds_';
    $this->NM_ajax_changed['pcent_ds_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_eval_1_per_ !== $modificado_eval_1_per_ || (isset($bFlagRead_eval_1_per_) && $bFlagRead_eval_1_per_))
{
    $this->nmgp_refresh_fields[] = 'eval_1_per_';
    $this->NM_ajax_changed['eval_1_per_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
form_t_evaluacion_p1_m2_prueba_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['contr_erro'] = 'off';
}
function dc4__onBlur()
{
$_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['contr_erro'] = 'on';
                               
$original_dc1_ = $this->dc1_;
$original_dc2_ = $this->dc2_;
$original_dc3_ = $this->dc3_;
$original_dc4_ = $this->dc4_;
$original_dc5_ = $this->dc5_;
$original_dc6_ = $this->dc6_;
$original_dc7_ = $this->dc7_;
$original_dc8_ = $this->dc8_;
$original_dc9_ = $this->dc9_;
$original_dc10_ = $this->dc10_;
$original_dc11_ = $this->dc11_;
$original_dc12_ = $this->dc12_;
$original_pcent_dc_ = $this->pcent_dc_;
$original_pcent_dp_ = $this->pcent_dp_;
$original_pcent_ds_ = $this->pcent_ds_;
$original_eval_1_per_ = $this->eval_1_per_;
$this->calcula_nota();

$modificado_dc1_ = $this->dc1_;
$modificado_dc2_ = $this->dc2_;
$modificado_dc3_ = $this->dc3_;
$modificado_dc4_ = $this->dc4_;
$modificado_dc5_ = $this->dc5_;
$modificado_dc6_ = $this->dc6_;
$modificado_dc7_ = $this->dc7_;
$modificado_dc8_ = $this->dc8_;
$modificado_dc9_ = $this->dc9_;
$modificado_dc10_ = $this->dc10_;
$modificado_dc11_ = $this->dc11_;
$modificado_dc12_ = $this->dc12_;
$modificado_pcent_dc_ = $this->pcent_dc_;
$modificado_pcent_dp_ = $this->pcent_dp_;
$modificado_pcent_ds_ = $this->pcent_ds_;
$modificado_eval_1_per_ = $this->eval_1_per_;
$this->nm_formatar_campos('dc1_', 'dc2_', 'dc3_', 'dc4_', 'dc5_', 'dc6_', 'dc7_', 'dc8_', 'dc9_', 'dc10_', 'dc11_', 'dc12_', 'pcent_dc_', 'pcent_dp_', 'pcent_ds_', 'eval_1_per_');
$this->nmgp_refresh_fields = array();
if ($original_dc1_ !== $modificado_dc1_ || (isset($bFlagRead_dc1_) && $bFlagRead_dc1_))
{
    $this->nmgp_refresh_fields[] = 'dc1_';
    $this->NM_ajax_changed['dc1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc2_ !== $modificado_dc2_ || (isset($bFlagRead_dc2_) && $bFlagRead_dc2_))
{
    $this->nmgp_refresh_fields[] = 'dc2_';
    $this->NM_ajax_changed['dc2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc3_ !== $modificado_dc3_ || (isset($bFlagRead_dc3_) && $bFlagRead_dc3_))
{
    $this->nmgp_refresh_fields[] = 'dc3_';
    $this->NM_ajax_changed['dc3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc4_ !== $modificado_dc4_ || (isset($bFlagRead_dc4_) && $bFlagRead_dc4_))
{
    $this->nmgp_refresh_fields[] = 'dc4_';
    $this->NM_ajax_changed['dc4_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc5_ !== $modificado_dc5_ || (isset($bFlagRead_dc5_) && $bFlagRead_dc5_))
{
    $this->nmgp_refresh_fields[] = 'dc5_';
    $this->NM_ajax_changed['dc5_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc6_ !== $modificado_dc6_ || (isset($bFlagRead_dc6_) && $bFlagRead_dc6_))
{
    $this->nmgp_refresh_fields[] = 'dc6_';
    $this->NM_ajax_changed['dc6_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc7_ !== $modificado_dc7_ || (isset($bFlagRead_dc7_) && $bFlagRead_dc7_))
{
    $this->nmgp_refresh_fields[] = 'dc7_';
    $this->NM_ajax_changed['dc7_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc8_ !== $modificado_dc8_ || (isset($bFlagRead_dc8_) && $bFlagRead_dc8_))
{
    $this->nmgp_refresh_fields[] = 'dc8_';
    $this->NM_ajax_changed['dc8_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc9_ !== $modificado_dc9_ || (isset($bFlagRead_dc9_) && $bFlagRead_dc9_))
{
    $this->nmgp_refresh_fields[] = 'dc9_';
    $this->NM_ajax_changed['dc9_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc10_ !== $modificado_dc10_ || (isset($bFlagRead_dc10_) && $bFlagRead_dc10_))
{
    $this->nmgp_refresh_fields[] = 'dc10_';
    $this->NM_ajax_changed['dc10_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc11_ !== $modificado_dc11_ || (isset($bFlagRead_dc11_) && $bFlagRead_dc11_))
{
    $this->nmgp_refresh_fields[] = 'dc11_';
    $this->NM_ajax_changed['dc11_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc12_ !== $modificado_dc12_ || (isset($bFlagRead_dc12_) && $bFlagRead_dc12_))
{
    $this->nmgp_refresh_fields[] = 'dc12_';
    $this->NM_ajax_changed['dc12_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dc_ !== $modificado_pcent_dc_ || (isset($bFlagRead_pcent_dc_) && $bFlagRead_pcent_dc_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dc_';
    $this->NM_ajax_changed['pcent_dc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dp_ !== $modificado_pcent_dp_ || (isset($bFlagRead_pcent_dp_) && $bFlagRead_pcent_dp_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dp_';
    $this->NM_ajax_changed['pcent_dp_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_ds_ !== $modificado_pcent_ds_ || (isset($bFlagRead_pcent_ds_) && $bFlagRead_pcent_ds_))
{
    $this->nmgp_refresh_fields[] = 'pcent_ds_';
    $this->NM_ajax_changed['pcent_ds_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_eval_1_per_ !== $modificado_eval_1_per_ || (isset($bFlagRead_eval_1_per_) && $bFlagRead_eval_1_per_))
{
    $this->nmgp_refresh_fields[] = 'eval_1_per_';
    $this->NM_ajax_changed['eval_1_per_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
form_t_evaluacion_p1_m2_prueba_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['contr_erro'] = 'off';
}
function dc5__onBlur()
{
$_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['contr_erro'] = 'on';
                               
$original_dc1_ = $this->dc1_;
$original_dc2_ = $this->dc2_;
$original_dc3_ = $this->dc3_;
$original_dc4_ = $this->dc4_;
$original_dc5_ = $this->dc5_;
$original_dc6_ = $this->dc6_;
$original_dc7_ = $this->dc7_;
$original_dc8_ = $this->dc8_;
$original_dc9_ = $this->dc9_;
$original_dc10_ = $this->dc10_;
$original_dc11_ = $this->dc11_;
$original_dc12_ = $this->dc12_;
$original_pcent_dc_ = $this->pcent_dc_;
$original_pcent_dp_ = $this->pcent_dp_;
$original_pcent_ds_ = $this->pcent_ds_;
$original_eval_1_per_ = $this->eval_1_per_;
$this->calcula_nota();

$modificado_dc1_ = $this->dc1_;
$modificado_dc2_ = $this->dc2_;
$modificado_dc3_ = $this->dc3_;
$modificado_dc4_ = $this->dc4_;
$modificado_dc5_ = $this->dc5_;
$modificado_dc6_ = $this->dc6_;
$modificado_dc7_ = $this->dc7_;
$modificado_dc8_ = $this->dc8_;
$modificado_dc9_ = $this->dc9_;
$modificado_dc10_ = $this->dc10_;
$modificado_dc11_ = $this->dc11_;
$modificado_dc12_ = $this->dc12_;
$modificado_pcent_dc_ = $this->pcent_dc_;
$modificado_pcent_dp_ = $this->pcent_dp_;
$modificado_pcent_ds_ = $this->pcent_ds_;
$modificado_eval_1_per_ = $this->eval_1_per_;
$this->nm_formatar_campos('dc1_', 'dc2_', 'dc3_', 'dc4_', 'dc5_', 'dc6_', 'dc7_', 'dc8_', 'dc9_', 'dc10_', 'dc11_', 'dc12_', 'pcent_dc_', 'pcent_dp_', 'pcent_ds_', 'eval_1_per_');
$this->nmgp_refresh_fields = array();
if ($original_dc1_ !== $modificado_dc1_ || (isset($bFlagRead_dc1_) && $bFlagRead_dc1_))
{
    $this->nmgp_refresh_fields[] = 'dc1_';
    $this->NM_ajax_changed['dc1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc2_ !== $modificado_dc2_ || (isset($bFlagRead_dc2_) && $bFlagRead_dc2_))
{
    $this->nmgp_refresh_fields[] = 'dc2_';
    $this->NM_ajax_changed['dc2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc3_ !== $modificado_dc3_ || (isset($bFlagRead_dc3_) && $bFlagRead_dc3_))
{
    $this->nmgp_refresh_fields[] = 'dc3_';
    $this->NM_ajax_changed['dc3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc4_ !== $modificado_dc4_ || (isset($bFlagRead_dc4_) && $bFlagRead_dc4_))
{
    $this->nmgp_refresh_fields[] = 'dc4_';
    $this->NM_ajax_changed['dc4_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc5_ !== $modificado_dc5_ || (isset($bFlagRead_dc5_) && $bFlagRead_dc5_))
{
    $this->nmgp_refresh_fields[] = 'dc5_';
    $this->NM_ajax_changed['dc5_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc6_ !== $modificado_dc6_ || (isset($bFlagRead_dc6_) && $bFlagRead_dc6_))
{
    $this->nmgp_refresh_fields[] = 'dc6_';
    $this->NM_ajax_changed['dc6_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc7_ !== $modificado_dc7_ || (isset($bFlagRead_dc7_) && $bFlagRead_dc7_))
{
    $this->nmgp_refresh_fields[] = 'dc7_';
    $this->NM_ajax_changed['dc7_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc8_ !== $modificado_dc8_ || (isset($bFlagRead_dc8_) && $bFlagRead_dc8_))
{
    $this->nmgp_refresh_fields[] = 'dc8_';
    $this->NM_ajax_changed['dc8_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc9_ !== $modificado_dc9_ || (isset($bFlagRead_dc9_) && $bFlagRead_dc9_))
{
    $this->nmgp_refresh_fields[] = 'dc9_';
    $this->NM_ajax_changed['dc9_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc10_ !== $modificado_dc10_ || (isset($bFlagRead_dc10_) && $bFlagRead_dc10_))
{
    $this->nmgp_refresh_fields[] = 'dc10_';
    $this->NM_ajax_changed['dc10_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc11_ !== $modificado_dc11_ || (isset($bFlagRead_dc11_) && $bFlagRead_dc11_))
{
    $this->nmgp_refresh_fields[] = 'dc11_';
    $this->NM_ajax_changed['dc11_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc12_ !== $modificado_dc12_ || (isset($bFlagRead_dc12_) && $bFlagRead_dc12_))
{
    $this->nmgp_refresh_fields[] = 'dc12_';
    $this->NM_ajax_changed['dc12_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dc_ !== $modificado_pcent_dc_ || (isset($bFlagRead_pcent_dc_) && $bFlagRead_pcent_dc_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dc_';
    $this->NM_ajax_changed['pcent_dc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dp_ !== $modificado_pcent_dp_ || (isset($bFlagRead_pcent_dp_) && $bFlagRead_pcent_dp_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dp_';
    $this->NM_ajax_changed['pcent_dp_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_ds_ !== $modificado_pcent_ds_ || (isset($bFlagRead_pcent_ds_) && $bFlagRead_pcent_ds_))
{
    $this->nmgp_refresh_fields[] = 'pcent_ds_';
    $this->NM_ajax_changed['pcent_ds_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_eval_1_per_ !== $modificado_eval_1_per_ || (isset($bFlagRead_eval_1_per_) && $bFlagRead_eval_1_per_))
{
    $this->nmgp_refresh_fields[] = 'eval_1_per_';
    $this->NM_ajax_changed['eval_1_per_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
form_t_evaluacion_p1_m2_prueba_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['contr_erro'] = 'off';
}
function dc6__onBlur()
{
$_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['contr_erro'] = 'on';
                               
$original_dc1_ = $this->dc1_;
$original_dc2_ = $this->dc2_;
$original_dc3_ = $this->dc3_;
$original_dc4_ = $this->dc4_;
$original_dc5_ = $this->dc5_;
$original_dc6_ = $this->dc6_;
$original_dc7_ = $this->dc7_;
$original_dc8_ = $this->dc8_;
$original_dc9_ = $this->dc9_;
$original_dc10_ = $this->dc10_;
$original_dc11_ = $this->dc11_;
$original_dc12_ = $this->dc12_;
$original_pcent_dc_ = $this->pcent_dc_;
$original_pcent_dp_ = $this->pcent_dp_;
$original_pcent_ds_ = $this->pcent_ds_;
$original_eval_1_per_ = $this->eval_1_per_;
$this->calcula_nota();

$modificado_dc1_ = $this->dc1_;
$modificado_dc2_ = $this->dc2_;
$modificado_dc3_ = $this->dc3_;
$modificado_dc4_ = $this->dc4_;
$modificado_dc5_ = $this->dc5_;
$modificado_dc6_ = $this->dc6_;
$modificado_dc7_ = $this->dc7_;
$modificado_dc8_ = $this->dc8_;
$modificado_dc9_ = $this->dc9_;
$modificado_dc10_ = $this->dc10_;
$modificado_dc11_ = $this->dc11_;
$modificado_dc12_ = $this->dc12_;
$modificado_pcent_dc_ = $this->pcent_dc_;
$modificado_pcent_dp_ = $this->pcent_dp_;
$modificado_pcent_ds_ = $this->pcent_ds_;
$modificado_eval_1_per_ = $this->eval_1_per_;
$this->nm_formatar_campos('dc1_', 'dc2_', 'dc3_', 'dc4_', 'dc5_', 'dc6_', 'dc7_', 'dc8_', 'dc9_', 'dc10_', 'dc11_', 'dc12_', 'pcent_dc_', 'pcent_dp_', 'pcent_ds_', 'eval_1_per_');
$this->nmgp_refresh_fields = array();
if ($original_dc1_ !== $modificado_dc1_ || (isset($bFlagRead_dc1_) && $bFlagRead_dc1_))
{
    $this->nmgp_refresh_fields[] = 'dc1_';
    $this->NM_ajax_changed['dc1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc2_ !== $modificado_dc2_ || (isset($bFlagRead_dc2_) && $bFlagRead_dc2_))
{
    $this->nmgp_refresh_fields[] = 'dc2_';
    $this->NM_ajax_changed['dc2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc3_ !== $modificado_dc3_ || (isset($bFlagRead_dc3_) && $bFlagRead_dc3_))
{
    $this->nmgp_refresh_fields[] = 'dc3_';
    $this->NM_ajax_changed['dc3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc4_ !== $modificado_dc4_ || (isset($bFlagRead_dc4_) && $bFlagRead_dc4_))
{
    $this->nmgp_refresh_fields[] = 'dc4_';
    $this->NM_ajax_changed['dc4_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc5_ !== $modificado_dc5_ || (isset($bFlagRead_dc5_) && $bFlagRead_dc5_))
{
    $this->nmgp_refresh_fields[] = 'dc5_';
    $this->NM_ajax_changed['dc5_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc6_ !== $modificado_dc6_ || (isset($bFlagRead_dc6_) && $bFlagRead_dc6_))
{
    $this->nmgp_refresh_fields[] = 'dc6_';
    $this->NM_ajax_changed['dc6_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc7_ !== $modificado_dc7_ || (isset($bFlagRead_dc7_) && $bFlagRead_dc7_))
{
    $this->nmgp_refresh_fields[] = 'dc7_';
    $this->NM_ajax_changed['dc7_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc8_ !== $modificado_dc8_ || (isset($bFlagRead_dc8_) && $bFlagRead_dc8_))
{
    $this->nmgp_refresh_fields[] = 'dc8_';
    $this->NM_ajax_changed['dc8_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc9_ !== $modificado_dc9_ || (isset($bFlagRead_dc9_) && $bFlagRead_dc9_))
{
    $this->nmgp_refresh_fields[] = 'dc9_';
    $this->NM_ajax_changed['dc9_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc10_ !== $modificado_dc10_ || (isset($bFlagRead_dc10_) && $bFlagRead_dc10_))
{
    $this->nmgp_refresh_fields[] = 'dc10_';
    $this->NM_ajax_changed['dc10_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc11_ !== $modificado_dc11_ || (isset($bFlagRead_dc11_) && $bFlagRead_dc11_))
{
    $this->nmgp_refresh_fields[] = 'dc11_';
    $this->NM_ajax_changed['dc11_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc12_ !== $modificado_dc12_ || (isset($bFlagRead_dc12_) && $bFlagRead_dc12_))
{
    $this->nmgp_refresh_fields[] = 'dc12_';
    $this->NM_ajax_changed['dc12_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dc_ !== $modificado_pcent_dc_ || (isset($bFlagRead_pcent_dc_) && $bFlagRead_pcent_dc_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dc_';
    $this->NM_ajax_changed['pcent_dc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dp_ !== $modificado_pcent_dp_ || (isset($bFlagRead_pcent_dp_) && $bFlagRead_pcent_dp_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dp_';
    $this->NM_ajax_changed['pcent_dp_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_ds_ !== $modificado_pcent_ds_ || (isset($bFlagRead_pcent_ds_) && $bFlagRead_pcent_ds_))
{
    $this->nmgp_refresh_fields[] = 'pcent_ds_';
    $this->NM_ajax_changed['pcent_ds_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_eval_1_per_ !== $modificado_eval_1_per_ || (isset($bFlagRead_eval_1_per_) && $bFlagRead_eval_1_per_))
{
    $this->nmgp_refresh_fields[] = 'eval_1_per_';
    $this->NM_ajax_changed['eval_1_per_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
form_t_evaluacion_p1_m2_prueba_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['contr_erro'] = 'off';
}
function dc7__onBlur()
{
$_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['contr_erro'] = 'on';
                               
$original_dc1_ = $this->dc1_;
$original_dc2_ = $this->dc2_;
$original_dc3_ = $this->dc3_;
$original_dc4_ = $this->dc4_;
$original_dc5_ = $this->dc5_;
$original_dc6_ = $this->dc6_;
$original_dc7_ = $this->dc7_;
$original_dc8_ = $this->dc8_;
$original_dc9_ = $this->dc9_;
$original_dc10_ = $this->dc10_;
$original_dc11_ = $this->dc11_;
$original_dc12_ = $this->dc12_;
$original_pcent_dc_ = $this->pcent_dc_;
$original_pcent_dp_ = $this->pcent_dp_;
$original_pcent_ds_ = $this->pcent_ds_;
$original_eval_1_per_ = $this->eval_1_per_;
$this->calcula_nota();

$modificado_dc1_ = $this->dc1_;
$modificado_dc2_ = $this->dc2_;
$modificado_dc3_ = $this->dc3_;
$modificado_dc4_ = $this->dc4_;
$modificado_dc5_ = $this->dc5_;
$modificado_dc6_ = $this->dc6_;
$modificado_dc7_ = $this->dc7_;
$modificado_dc8_ = $this->dc8_;
$modificado_dc9_ = $this->dc9_;
$modificado_dc10_ = $this->dc10_;
$modificado_dc11_ = $this->dc11_;
$modificado_dc12_ = $this->dc12_;
$modificado_pcent_dc_ = $this->pcent_dc_;
$modificado_pcent_dp_ = $this->pcent_dp_;
$modificado_pcent_ds_ = $this->pcent_ds_;
$modificado_eval_1_per_ = $this->eval_1_per_;
$this->nm_formatar_campos('dc1_', 'dc2_', 'dc3_', 'dc4_', 'dc5_', 'dc6_', 'dc7_', 'dc8_', 'dc9_', 'dc10_', 'dc11_', 'dc12_', 'pcent_dc_', 'pcent_dp_', 'pcent_ds_', 'eval_1_per_');
$this->nmgp_refresh_fields = array();
if ($original_dc1_ !== $modificado_dc1_ || (isset($bFlagRead_dc1_) && $bFlagRead_dc1_))
{
    $this->nmgp_refresh_fields[] = 'dc1_';
    $this->NM_ajax_changed['dc1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc2_ !== $modificado_dc2_ || (isset($bFlagRead_dc2_) && $bFlagRead_dc2_))
{
    $this->nmgp_refresh_fields[] = 'dc2_';
    $this->NM_ajax_changed['dc2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc3_ !== $modificado_dc3_ || (isset($bFlagRead_dc3_) && $bFlagRead_dc3_))
{
    $this->nmgp_refresh_fields[] = 'dc3_';
    $this->NM_ajax_changed['dc3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc4_ !== $modificado_dc4_ || (isset($bFlagRead_dc4_) && $bFlagRead_dc4_))
{
    $this->nmgp_refresh_fields[] = 'dc4_';
    $this->NM_ajax_changed['dc4_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc5_ !== $modificado_dc5_ || (isset($bFlagRead_dc5_) && $bFlagRead_dc5_))
{
    $this->nmgp_refresh_fields[] = 'dc5_';
    $this->NM_ajax_changed['dc5_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc6_ !== $modificado_dc6_ || (isset($bFlagRead_dc6_) && $bFlagRead_dc6_))
{
    $this->nmgp_refresh_fields[] = 'dc6_';
    $this->NM_ajax_changed['dc6_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc7_ !== $modificado_dc7_ || (isset($bFlagRead_dc7_) && $bFlagRead_dc7_))
{
    $this->nmgp_refresh_fields[] = 'dc7_';
    $this->NM_ajax_changed['dc7_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc8_ !== $modificado_dc8_ || (isset($bFlagRead_dc8_) && $bFlagRead_dc8_))
{
    $this->nmgp_refresh_fields[] = 'dc8_';
    $this->NM_ajax_changed['dc8_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc9_ !== $modificado_dc9_ || (isset($bFlagRead_dc9_) && $bFlagRead_dc9_))
{
    $this->nmgp_refresh_fields[] = 'dc9_';
    $this->NM_ajax_changed['dc9_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc10_ !== $modificado_dc10_ || (isset($bFlagRead_dc10_) && $bFlagRead_dc10_))
{
    $this->nmgp_refresh_fields[] = 'dc10_';
    $this->NM_ajax_changed['dc10_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc11_ !== $modificado_dc11_ || (isset($bFlagRead_dc11_) && $bFlagRead_dc11_))
{
    $this->nmgp_refresh_fields[] = 'dc11_';
    $this->NM_ajax_changed['dc11_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc12_ !== $modificado_dc12_ || (isset($bFlagRead_dc12_) && $bFlagRead_dc12_))
{
    $this->nmgp_refresh_fields[] = 'dc12_';
    $this->NM_ajax_changed['dc12_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dc_ !== $modificado_pcent_dc_ || (isset($bFlagRead_pcent_dc_) && $bFlagRead_pcent_dc_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dc_';
    $this->NM_ajax_changed['pcent_dc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dp_ !== $modificado_pcent_dp_ || (isset($bFlagRead_pcent_dp_) && $bFlagRead_pcent_dp_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dp_';
    $this->NM_ajax_changed['pcent_dp_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_ds_ !== $modificado_pcent_ds_ || (isset($bFlagRead_pcent_ds_) && $bFlagRead_pcent_ds_))
{
    $this->nmgp_refresh_fields[] = 'pcent_ds_';
    $this->NM_ajax_changed['pcent_ds_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_eval_1_per_ !== $modificado_eval_1_per_ || (isset($bFlagRead_eval_1_per_) && $bFlagRead_eval_1_per_))
{
    $this->nmgp_refresh_fields[] = 'eval_1_per_';
    $this->NM_ajax_changed['eval_1_per_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
form_t_evaluacion_p1_m2_prueba_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['contr_erro'] = 'off';
}
function dc8__onBlur()
{
$_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['contr_erro'] = 'on';
                               
$original_dc1_ = $this->dc1_;
$original_dc2_ = $this->dc2_;
$original_dc3_ = $this->dc3_;
$original_dc4_ = $this->dc4_;
$original_dc5_ = $this->dc5_;
$original_dc6_ = $this->dc6_;
$original_dc7_ = $this->dc7_;
$original_dc8_ = $this->dc8_;
$original_dc9_ = $this->dc9_;
$original_dc10_ = $this->dc10_;
$original_dc11_ = $this->dc11_;
$original_dc12_ = $this->dc12_;
$original_pcent_dc_ = $this->pcent_dc_;
$original_pcent_dp_ = $this->pcent_dp_;
$original_pcent_ds_ = $this->pcent_ds_;
$original_eval_1_per_ = $this->eval_1_per_;
$this->calcula_nota();

$modificado_dc1_ = $this->dc1_;
$modificado_dc2_ = $this->dc2_;
$modificado_dc3_ = $this->dc3_;
$modificado_dc4_ = $this->dc4_;
$modificado_dc5_ = $this->dc5_;
$modificado_dc6_ = $this->dc6_;
$modificado_dc7_ = $this->dc7_;
$modificado_dc8_ = $this->dc8_;
$modificado_dc9_ = $this->dc9_;
$modificado_dc10_ = $this->dc10_;
$modificado_dc11_ = $this->dc11_;
$modificado_dc12_ = $this->dc12_;
$modificado_pcent_dc_ = $this->pcent_dc_;
$modificado_pcent_dp_ = $this->pcent_dp_;
$modificado_pcent_ds_ = $this->pcent_ds_;
$modificado_eval_1_per_ = $this->eval_1_per_;
$this->nm_formatar_campos('dc1_', 'dc2_', 'dc3_', 'dc4_', 'dc5_', 'dc6_', 'dc7_', 'dc8_', 'dc9_', 'dc10_', 'dc11_', 'dc12_', 'pcent_dc_', 'pcent_dp_', 'pcent_ds_', 'eval_1_per_');
$this->nmgp_refresh_fields = array();
if ($original_dc1_ !== $modificado_dc1_ || (isset($bFlagRead_dc1_) && $bFlagRead_dc1_))
{
    $this->nmgp_refresh_fields[] = 'dc1_';
    $this->NM_ajax_changed['dc1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc2_ !== $modificado_dc2_ || (isset($bFlagRead_dc2_) && $bFlagRead_dc2_))
{
    $this->nmgp_refresh_fields[] = 'dc2_';
    $this->NM_ajax_changed['dc2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc3_ !== $modificado_dc3_ || (isset($bFlagRead_dc3_) && $bFlagRead_dc3_))
{
    $this->nmgp_refresh_fields[] = 'dc3_';
    $this->NM_ajax_changed['dc3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc4_ !== $modificado_dc4_ || (isset($bFlagRead_dc4_) && $bFlagRead_dc4_))
{
    $this->nmgp_refresh_fields[] = 'dc4_';
    $this->NM_ajax_changed['dc4_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc5_ !== $modificado_dc5_ || (isset($bFlagRead_dc5_) && $bFlagRead_dc5_))
{
    $this->nmgp_refresh_fields[] = 'dc5_';
    $this->NM_ajax_changed['dc5_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc6_ !== $modificado_dc6_ || (isset($bFlagRead_dc6_) && $bFlagRead_dc6_))
{
    $this->nmgp_refresh_fields[] = 'dc6_';
    $this->NM_ajax_changed['dc6_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc7_ !== $modificado_dc7_ || (isset($bFlagRead_dc7_) && $bFlagRead_dc7_))
{
    $this->nmgp_refresh_fields[] = 'dc7_';
    $this->NM_ajax_changed['dc7_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc8_ !== $modificado_dc8_ || (isset($bFlagRead_dc8_) && $bFlagRead_dc8_))
{
    $this->nmgp_refresh_fields[] = 'dc8_';
    $this->NM_ajax_changed['dc8_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc9_ !== $modificado_dc9_ || (isset($bFlagRead_dc9_) && $bFlagRead_dc9_))
{
    $this->nmgp_refresh_fields[] = 'dc9_';
    $this->NM_ajax_changed['dc9_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc10_ !== $modificado_dc10_ || (isset($bFlagRead_dc10_) && $bFlagRead_dc10_))
{
    $this->nmgp_refresh_fields[] = 'dc10_';
    $this->NM_ajax_changed['dc10_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc11_ !== $modificado_dc11_ || (isset($bFlagRead_dc11_) && $bFlagRead_dc11_))
{
    $this->nmgp_refresh_fields[] = 'dc11_';
    $this->NM_ajax_changed['dc11_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc12_ !== $modificado_dc12_ || (isset($bFlagRead_dc12_) && $bFlagRead_dc12_))
{
    $this->nmgp_refresh_fields[] = 'dc12_';
    $this->NM_ajax_changed['dc12_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dc_ !== $modificado_pcent_dc_ || (isset($bFlagRead_pcent_dc_) && $bFlagRead_pcent_dc_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dc_';
    $this->NM_ajax_changed['pcent_dc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dp_ !== $modificado_pcent_dp_ || (isset($bFlagRead_pcent_dp_) && $bFlagRead_pcent_dp_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dp_';
    $this->NM_ajax_changed['pcent_dp_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_ds_ !== $modificado_pcent_ds_ || (isset($bFlagRead_pcent_ds_) && $bFlagRead_pcent_ds_))
{
    $this->nmgp_refresh_fields[] = 'pcent_ds_';
    $this->NM_ajax_changed['pcent_ds_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_eval_1_per_ !== $modificado_eval_1_per_ || (isset($bFlagRead_eval_1_per_) && $bFlagRead_eval_1_per_))
{
    $this->nmgp_refresh_fields[] = 'eval_1_per_';
    $this->NM_ajax_changed['eval_1_per_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
form_t_evaluacion_p1_m2_prueba_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['contr_erro'] = 'off';
}
function dc9__onBlur()
{
$_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['contr_erro'] = 'on';
                               
$original_dc1_ = $this->dc1_;
$original_dc2_ = $this->dc2_;
$original_dc3_ = $this->dc3_;
$original_dc4_ = $this->dc4_;
$original_dc5_ = $this->dc5_;
$original_dc6_ = $this->dc6_;
$original_dc7_ = $this->dc7_;
$original_dc8_ = $this->dc8_;
$original_dc9_ = $this->dc9_;
$original_dc10_ = $this->dc10_;
$original_dc11_ = $this->dc11_;
$original_dc12_ = $this->dc12_;
$original_pcent_dc_ = $this->pcent_dc_;
$original_pcent_dp_ = $this->pcent_dp_;
$original_pcent_ds_ = $this->pcent_ds_;
$original_eval_1_per_ = $this->eval_1_per_;
$this->calcula_nota();

$modificado_dc1_ = $this->dc1_;
$modificado_dc2_ = $this->dc2_;
$modificado_dc3_ = $this->dc3_;
$modificado_dc4_ = $this->dc4_;
$modificado_dc5_ = $this->dc5_;
$modificado_dc6_ = $this->dc6_;
$modificado_dc7_ = $this->dc7_;
$modificado_dc8_ = $this->dc8_;
$modificado_dc9_ = $this->dc9_;
$modificado_dc10_ = $this->dc10_;
$modificado_dc11_ = $this->dc11_;
$modificado_dc12_ = $this->dc12_;
$modificado_pcent_dc_ = $this->pcent_dc_;
$modificado_pcent_dp_ = $this->pcent_dp_;
$modificado_pcent_ds_ = $this->pcent_ds_;
$modificado_eval_1_per_ = $this->eval_1_per_;
$this->nm_formatar_campos('dc1_', 'dc2_', 'dc3_', 'dc4_', 'dc5_', 'dc6_', 'dc7_', 'dc8_', 'dc9_', 'dc10_', 'dc11_', 'dc12_', 'pcent_dc_', 'pcent_dp_', 'pcent_ds_', 'eval_1_per_');
$this->nmgp_refresh_fields = array();
if ($original_dc1_ !== $modificado_dc1_ || (isset($bFlagRead_dc1_) && $bFlagRead_dc1_))
{
    $this->nmgp_refresh_fields[] = 'dc1_';
    $this->NM_ajax_changed['dc1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc2_ !== $modificado_dc2_ || (isset($bFlagRead_dc2_) && $bFlagRead_dc2_))
{
    $this->nmgp_refresh_fields[] = 'dc2_';
    $this->NM_ajax_changed['dc2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc3_ !== $modificado_dc3_ || (isset($bFlagRead_dc3_) && $bFlagRead_dc3_))
{
    $this->nmgp_refresh_fields[] = 'dc3_';
    $this->NM_ajax_changed['dc3_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc4_ !== $modificado_dc4_ || (isset($bFlagRead_dc4_) && $bFlagRead_dc4_))
{
    $this->nmgp_refresh_fields[] = 'dc4_';
    $this->NM_ajax_changed['dc4_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc5_ !== $modificado_dc5_ || (isset($bFlagRead_dc5_) && $bFlagRead_dc5_))
{
    $this->nmgp_refresh_fields[] = 'dc5_';
    $this->NM_ajax_changed['dc5_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc6_ !== $modificado_dc6_ || (isset($bFlagRead_dc6_) && $bFlagRead_dc6_))
{
    $this->nmgp_refresh_fields[] = 'dc6_';
    $this->NM_ajax_changed['dc6_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc7_ !== $modificado_dc7_ || (isset($bFlagRead_dc7_) && $bFlagRead_dc7_))
{
    $this->nmgp_refresh_fields[] = 'dc7_';
    $this->NM_ajax_changed['dc7_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc8_ !== $modificado_dc8_ || (isset($bFlagRead_dc8_) && $bFlagRead_dc8_))
{
    $this->nmgp_refresh_fields[] = 'dc8_';
    $this->NM_ajax_changed['dc8_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc9_ !== $modificado_dc9_ || (isset($bFlagRead_dc9_) && $bFlagRead_dc9_))
{
    $this->nmgp_refresh_fields[] = 'dc9_';
    $this->NM_ajax_changed['dc9_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc10_ !== $modificado_dc10_ || (isset($bFlagRead_dc10_) && $bFlagRead_dc10_))
{
    $this->nmgp_refresh_fields[] = 'dc10_';
    $this->NM_ajax_changed['dc10_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc11_ !== $modificado_dc11_ || (isset($bFlagRead_dc11_) && $bFlagRead_dc11_))
{
    $this->nmgp_refresh_fields[] = 'dc11_';
    $this->NM_ajax_changed['dc11_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dc12_ !== $modificado_dc12_ || (isset($bFlagRead_dc12_) && $bFlagRead_dc12_))
{
    $this->nmgp_refresh_fields[] = 'dc12_';
    $this->NM_ajax_changed['dc12_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dc_ !== $modificado_pcent_dc_ || (isset($bFlagRead_pcent_dc_) && $bFlagRead_pcent_dc_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dc_';
    $this->NM_ajax_changed['pcent_dc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_dp_ !== $modificado_pcent_dp_ || (isset($bFlagRead_pcent_dp_) && $bFlagRead_pcent_dp_))
{
    $this->nmgp_refresh_fields[] = 'pcent_dp_';
    $this->NM_ajax_changed['pcent_dp_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_pcent_ds_ !== $modificado_pcent_ds_ || (isset($bFlagRead_pcent_ds_) && $bFlagRead_pcent_ds_))
{
    $this->nmgp_refresh_fields[] = 'pcent_ds_';
    $this->NM_ajax_changed['pcent_ds_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_eval_1_per_ !== $modificado_eval_1_per_ || (isset($bFlagRead_eval_1_per_) && $bFlagRead_eval_1_per_))
{
    $this->nmgp_refresh_fields[] = 'eval_1_per_';
    $this->NM_ajax_changed['eval_1_per_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
form_t_evaluacion_p1_m2_prueba_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['contr_erro'] = 'off';
}
function parametrosGenerales()
{
$_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['contr_erro'] = 'on';
if (!isset($this->sc_temp_nota_maxima)) {$this->sc_temp_nota_maxima = (isset($_SESSION['nota_maxima'])) ? $_SESSION['nota_maxima'] : "";}
if (!isset($this->sc_temp_porcent_autoevaluacion)) {$this->sc_temp_porcent_autoevaluacion = (isset($_SESSION['porcent_autoevaluacion'])) ? $_SESSION['porcent_autoevaluacion'] : "";}
if (!isset($this->sc_temp_etoqieta_autoevaluacion)) {$this->sc_temp_etoqieta_autoevaluacion = (isset($_SESSION['etoqieta_autoevaluacion'])) ? $_SESSION['etoqieta_autoevaluacion'] : "";}
if (!isset($this->sc_temp_criterio_ds5)) {$this->sc_temp_criterio_ds5 = (isset($_SESSION['criterio_ds5'])) ? $_SESSION['criterio_ds5'] : "";}
if (!isset($this->sc_temp_criterio_ds4)) {$this->sc_temp_criterio_ds4 = (isset($_SESSION['criterio_ds4'])) ? $_SESSION['criterio_ds4'] : "";}
if (!isset($this->sc_temp_criterio_ds3)) {$this->sc_temp_criterio_ds3 = (isset($_SESSION['criterio_ds3'])) ? $_SESSION['criterio_ds3'] : "";}
if (!isset($this->sc_temp_criterio_ds2)) {$this->sc_temp_criterio_ds2 = (isset($_SESSION['criterio_ds2'])) ? $_SESSION['criterio_ds2'] : "";}
if (!isset($this->sc_temp_criterio_ds1)) {$this->sc_temp_criterio_ds1 = (isset($_SESSION['criterio_ds1'])) ? $_SESSION['criterio_ds1'] : "";}
if (!isset($this->sc_temp_criterio_dp5)) {$this->sc_temp_criterio_dp5 = (isset($_SESSION['criterio_dp5'])) ? $_SESSION['criterio_dp5'] : "";}
if (!isset($this->sc_temp_criterio_dp4)) {$this->sc_temp_criterio_dp4 = (isset($_SESSION['criterio_dp4'])) ? $_SESSION['criterio_dp4'] : "";}
if (!isset($this->sc_temp_criterio_dp3)) {$this->sc_temp_criterio_dp3 = (isset($_SESSION['criterio_dp3'])) ? $_SESSION['criterio_dp3'] : "";}
if (!isset($this->sc_temp_criterio_dp2)) {$this->sc_temp_criterio_dp2 = (isset($_SESSION['criterio_dp2'])) ? $_SESSION['criterio_dp2'] : "";}
if (!isset($this->sc_temp_criterio_dp1)) {$this->sc_temp_criterio_dp1 = (isset($_SESSION['criterio_dp1'])) ? $_SESSION['criterio_dp1'] : "";}
if (!isset($this->sc_temp_porcentaje_gr3)) {$this->sc_temp_porcentaje_gr3 = (isset($_SESSION['porcentaje_gr3'])) ? $_SESSION['porcentaje_gr3'] : "";}
if (!isset($this->sc_temp_porcentaje_gr2)) {$this->sc_temp_porcentaje_gr2 = (isset($_SESSION['porcentaje_gr2'])) ? $_SESSION['porcentaje_gr2'] : "";}
if (!isset($this->sc_temp_porcentaje_gr1)) {$this->sc_temp_porcentaje_gr1 = (isset($_SESSION['porcentaje_gr1'])) ? $_SESSION['porcentaje_gr1'] : "";}
                               
$check_sql = "SELECT 
etiqueta_grupo_1,
porcentaje_grupo1,
etiqueta_grupo_2,
criterio_1_grupo2,
criterio_2_grupo2,
criterio_3_grupo2,
criterio_4_grupo2,
criterio_5_grupo2,
porcentaje_grupo2,
etiqueta_grupo_3,
criterio_1_grupo3,
criterio_2_grupo3,
criterio_3_grupo3,
criterio_4_grupo3,
criterio_5_grupo3,
porcentaje_grupo3,
etiqtiqueta_autoevaluacion,
porcentaje_autoevaluacion
FROM
parametros_evaluacion
";
  
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

   if (isset($this->rs[0][0]))     
{
   $_etiqueta_g1 = $this->rs[0][0];	 
	$_porce_g1 = $this->rs[0][1];
    $_etique_g2 = $this->rs[0][2];	
    $_crite_1_g2 = $this->rs[0][3];
	$_crite_2_g2 = $this->rs[0][4];
	$_crite_3_g2 = $this->rs[0][5];
	$_crite_4_g2 = $this->rs[0][6];
	$_crite_5_g2 = $this->rs[0][7];
	$_porce_g2 = $this->rs[0][8];
	$_etiqueta_g3 = $this->rs[0][9];	
	$_crite_1_g3 = $this->rs[0][10];
	$_crite_2_g3 = $this->rs[0][11];
	$_crite_3_g3 = $this->rs[0][12];
	$_crite_4_g3 = $this->rs[0][13];
	$_crite_5_g3 = $this->rs[0][14];
	$_porce_g3 = $this->rs[0][15];
	$_etique_autoeval = $this->rs[0][16];
	$_porce_auto_eval = $this->rs[0][17];
	
}
		else     
{
    $_etiqueta_g1 = "";     
	$_porce_g1 =  "";
    $_etique_g2 =  "";    
    $_crite_1_g2 =  "";
	$_crite_2_g2 =  "";
	$_crite_3_g2 =  "";
	$_crite_4_g2 =  "";
	$_crite_5_g2 =  "";
	$_porce_g2 =  "";
	$_etiqueta_g3 =  "";	
	$_crite_1_g3 =  "";
	$_crite_2_g3 =  "";
	$_crite_3_g3 =  "";
	$_crite_4_g3 =  "";
	$_crite_5_g3 =  "";
	$_porce_g3 =  "";	
	$_etique_autoeval =  "";
	$_porce_auto_eval =  "";
	
}

$this->sc_temp_porcentaje_gr1 = $_porce_g1;
$this->sc_temp_porcentaje_gr2 = $_porce_g2;
$this->sc_temp_porcentaje_gr3 = $_porce_g3;
$this->sc_temp_criterio_dp1 = $_crite_1_g2;
$this->sc_temp_criterio_dp2 = $_crite_2_g2;
$this->sc_temp_criterio_dp3 = $_crite_3_g2;
$this->sc_temp_criterio_dp4 = $_crite_4_g2;
$this->sc_temp_criterio_dp5 = $_crite_5_g2;
$this->sc_temp_criterio_ds1 = $_crite_1_g3;
$this->sc_temp_criterio_ds2 = $_crite_2_g3;
$this->sc_temp_criterio_ds3 = $_crite_3_g3;
$this->sc_temp_criterio_ds4 = $_crite_4_g3;
$this->sc_temp_criterio_ds5 = $_crite_5_g3;
$this->sc_temp_etoqieta_autoevaluacion = $_etique_autoeval;
$this->sc_temp_porcent_autoevaluacion = $_porce_auto_eval;
$this->sc_temp_porcentaje_gr1 = $_porce_g1;
$this->sc_temp_porcentaje_gr2 = $_porce_g2;
$this->sc_temp_porcentaje_gr3 = $_porce_g3;




$check_sql = "SELECT maximo"
   . " FROM valoracion"
   . " WHERE valoracion = 'Superior'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[0][0]))     
{
    $this->sc_temp_nota_maxima = $this->rs[0][0];
    
}
		else     
{
	    $this->sc_temp_nota_maxima = '';   
}
if (isset($this->sc_temp_porcentaje_gr1)) { $_SESSION['porcentaje_gr1'] = $this->sc_temp_porcentaje_gr1;}
if (isset($this->sc_temp_porcentaje_gr2)) { $_SESSION['porcentaje_gr2'] = $this->sc_temp_porcentaje_gr2;}
if (isset($this->sc_temp_porcentaje_gr3)) { $_SESSION['porcentaje_gr3'] = $this->sc_temp_porcentaje_gr3;}
if (isset($this->sc_temp_criterio_dp1)) { $_SESSION['criterio_dp1'] = $this->sc_temp_criterio_dp1;}
if (isset($this->sc_temp_criterio_dp2)) { $_SESSION['criterio_dp2'] = $this->sc_temp_criterio_dp2;}
if (isset($this->sc_temp_criterio_dp3)) { $_SESSION['criterio_dp3'] = $this->sc_temp_criterio_dp3;}
if (isset($this->sc_temp_criterio_dp4)) { $_SESSION['criterio_dp4'] = $this->sc_temp_criterio_dp4;}
if (isset($this->sc_temp_criterio_dp5)) { $_SESSION['criterio_dp5'] = $this->sc_temp_criterio_dp5;}
if (isset($this->sc_temp_criterio_ds1)) { $_SESSION['criterio_ds1'] = $this->sc_temp_criterio_ds1;}
if (isset($this->sc_temp_criterio_ds2)) { $_SESSION['criterio_ds2'] = $this->sc_temp_criterio_ds2;}
if (isset($this->sc_temp_criterio_ds3)) { $_SESSION['criterio_ds3'] = $this->sc_temp_criterio_ds3;}
if (isset($this->sc_temp_criterio_ds4)) { $_SESSION['criterio_ds4'] = $this->sc_temp_criterio_ds4;}
if (isset($this->sc_temp_criterio_ds5)) { $_SESSION['criterio_ds5'] = $this->sc_temp_criterio_ds5;}
if (isset($this->sc_temp_etoqieta_autoevaluacion)) { $_SESSION['etoqieta_autoevaluacion'] = $this->sc_temp_etoqieta_autoevaluacion;}
if (isset($this->sc_temp_porcent_autoevaluacion)) { $_SESSION['porcent_autoevaluacion'] = $this->sc_temp_porcent_autoevaluacion;}
if (isset($this->sc_temp_nota_maxima)) { $_SESSION['nota_maxima'] = $this->sc_temp_nota_maxima;}
$_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['contr_erro'] = 'off';
}
//
}
//===============================================================================
class form_t_evaluacion_p1_m2_prueba_edit
{
    var $contr_form_t_evaluacion_p1_m2_prueba;
    function inicializa()
    {
        global $nm_opc_lookup, $nm_opc_php, $script_case_init;
        require_once("form_t_evaluacion_p1_m2_prueba_apl.php");
        require_once("form_t_evaluacion_p1_m2_prueba_form0.php");
        $this->contr_form_t_evaluacion_p1_m2_prueba = new form_t_evaluacion_p1_m2_prueba_form();
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
    $_SESSION['scriptcase']['form_t_evaluacion_p1_m2_prueba']['contr_erro'] = 'off';
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
    $sc_conv_var['id_estudiante'] = "id_estudiante_";
    $sc_conv_var['primer_apellido'] = "primer_apellido_";
    $sc_conv_var['segundo_apellido'] = "segundo_apellido_";
    $sc_conv_var['primer_nombre'] = "primer_nombre_";
    $sc_conv_var['segundo_nombre'] = "segundo_nombre_";
    $sc_conv_var['id_grupo'] = "id_grupo_";
    $sc_conv_var['id_area'] = "id_area_";
    $sc_conv_var['id_asignatura'] = "id_asignatura_";
    $sc_conv_var['id_grado'] = "id_grado_";
    $sc_conv_var['id_nivel'] = "id_nivel_";
    $sc_conv_var['ihs'] = "ihs_";
    $sc_conv_var['pfa'] = "pfa_";
    $sc_conv_var['tipo_asig'] = "tipo_asig_";
    $sc_conv_var['novedad'] = "novedad_";
    $sc_conv_var['estatus'] = "estatus_";
    $sc_conv_var['inasistencia_p1'] = "inasistencia_p1_";
    $sc_conv_var['eval_1_per'] = "eval_1_per_";
    $sc_conv_var['dc1'] = "dc1_";
    $sc_conv_var['dc2'] = "dc2_";
    $sc_conv_var['dc3'] = "dc3_";
    $sc_conv_var['dc4'] = "dc4_";
    $sc_conv_var['dc5'] = "dc5_";
    $sc_conv_var['dc6'] = "dc6_";
    $sc_conv_var['dc7'] = "dc7_";
    $sc_conv_var['dc8'] = "dc8_";
    $sc_conv_var['dc9'] = "dc9_";
    $sc_conv_var['dc10'] = "dc10_";
    $sc_conv_var['dc11'] = "dc11_";
    $sc_conv_var['dc12'] = "dc12_";
    $sc_conv_var['letras_p1'] = "letras_p1_";
    $sc_conv_var['pcent_dc'] = "pcent_dc_";
    $sc_conv_var['ds1'] = "ds1_";
    $sc_conv_var['ds2'] = "ds2_";
    $sc_conv_var['ds3'] = "ds3_";
    $sc_conv_var['ds4'] = "ds4_";
    $sc_conv_var['ds5'] = "ds5_";
    $sc_conv_var['pcent_ds'] = "pcent_ds_";
    $sc_conv_var['dp1'] = "dp1_";
    $sc_conv_var['dp2'] = "dp2_";
    $sc_conv_var['dp3'] = "dp3_";
    $sc_conv_var['dp4'] = "dp4_";
    $sc_conv_var['dp5'] = "dp5_";
    $sc_conv_var['pcent_dp'] = "pcent_dp_";
    $sc_conv_var['aeep1'] = "aeep1_";
    $sc_conv_var['porcent_aeep1'] = "porcent_aeep1_";
    $sc_conv_var['inasistencia_p2'] = "inasistencia_p2_";
    $sc_conv_var['eval_2_per'] = "eval_2_per_";
    $sc_conv_var['dc1_2p'] = "dc1_2p_";
    $sc_conv_var['dc2_2p'] = "dc2_2p_";
    $sc_conv_var['dc3_2p'] = "dc3_2p_";
    $sc_conv_var['dc4_2p'] = "dc4_2p_";
    $sc_conv_var['dc5_2p'] = "dc5_2p_";
    $sc_conv_var['pcent_dc2'] = "pcent_dc2_";
    $sc_conv_var['ds1_2p'] = "ds1_2p_";
    $sc_conv_var['ds2_2p'] = "ds2_2p_";
    $sc_conv_var['ds3_2p'] = "ds3_2p_";
    $sc_conv_var['ds4_2p'] = "ds4_2p_";
    $sc_conv_var['ds5_2p'] = "ds5_2p_";
    $sc_conv_var['pcent_ds2'] = "pcent_ds2_";
    $sc_conv_var['dp1_2p'] = "dp1_2p_";
    $sc_conv_var['dp2_2p'] = "dp2_2p_";
    $sc_conv_var['dp3_2p'] = "dp3_2p_";
    $sc_conv_var['dp4_2p'] = "dp4_2p_";
    $sc_conv_var['dp5_2p'] = "dp5_2p_";
    $sc_conv_var['pcent_dp2'] = "pcent_dp2_";
    $sc_conv_var['aee_p2'] = "aee_p2_";
    $sc_conv_var['letras_p2'] = "letras_p2_";
    $sc_conv_var['porcet_aee_p2'] = "porcet_aee_p2_";
    $sc_conv_var['inasistencia_p3'] = "inasistencia_p3_";
    $sc_conv_var['eval_3_per'] = "eval_3_per_";
    $sc_conv_var['dc1_3p'] = "dc1_3p_";
    $sc_conv_var['dc2_3p'] = "dc2_3p_";
    $sc_conv_var['dc3_3p'] = "dc3_3p_";
    $sc_conv_var['dc4_3p'] = "dc4_3p_";
    $sc_conv_var['dc5_3p'] = "dc5_3p_";
    $sc_conv_var['pcent_dc3'] = "pcent_dc3_";
    $sc_conv_var['ds1_p3'] = "ds1_p3_";
    $sc_conv_var['ds2_p3'] = "ds2_p3_";
    $sc_conv_var['ds3_p3'] = "ds3_p3_";
    $sc_conv_var['ds4_p3'] = "ds4_p3_";
    $sc_conv_var['ds5_p3'] = "ds5_p3_";
    $sc_conv_var['pcent_ds3'] = "pcent_ds3_";
    $sc_conv_var['dp1_p3'] = "dp1_p3_";
    $sc_conv_var['dp2_p3'] = "dp2_p3_";
    $sc_conv_var['dp3_p3'] = "dp3_p3_";
    $sc_conv_var['dp4_p3'] = "dp4_p3_";
    $sc_conv_var['dp5-p3'] = "sc_field_0_";
    $sc_conv_var['pcent_dp3'] = "pcent_dp3_";
    $sc_conv_var['aee_p3'] = "aee_p3_";
    $sc_conv_var['letras_p3'] = "letras_p3_";
    $sc_conv_var['porcent_aee_p3'] = "porcent_aee_p3_";
    $sc_conv_var['inasistencia_p4'] = "inasistencia_p4_";
    $sc_conv_var['eval_4_per'] = "eval_4_per_";
    $sc_conv_var['dc1_p4'] = "dc1_p4_";
    $sc_conv_var['dc2_p4'] = "dc2_p4_";
    $sc_conv_var['dc3_p4'] = "dc3_p4_";
    $sc_conv_var['dc4_p4'] = "dc4_p4_";
    $sc_conv_var['dc5_p4'] = "dc5_p4_";
    $sc_conv_var['pcent_dc4'] = "pcent_dc4_";
    $sc_conv_var['ds1_p4'] = "ds1_p4_";
    $sc_conv_var['ds2_p4'] = "ds2_p4_";
    $sc_conv_var['ds3_p4'] = "ds3_p4_";
    $sc_conv_var['ds4_p4'] = "ds4_p4_";
    $sc_conv_var['ds5_p4'] = "ds5_p4_";
    $sc_conv_var['pcent_ds4'] = "pcent_ds4_";
    $sc_conv_var['dp1_p4'] = "dp1_p4_";
    $sc_conv_var['dp2_p4'] = "dp2_p4_";
    $sc_conv_var['dp3_p4'] = "dp3_p4_";
    $sc_conv_var['dp4_p4'] = "dp4_p4_";
    $sc_conv_var['dp5_p4'] = "dp5_p4_";
    $sc_conv_var['aee_p4'] = "aee_p4_";
    $sc_conv_var['letras_p4'] = "letras_p4_";
    $sc_conv_var['porcent_aee_p4'] = "porcent_aee_p4_";
    $sc_conv_var['pcent_dp4'] = "pcent_dp4_";
    $sc_conv_var['eval_final'] = "eval_final_";
    $sc_conv_var['entorno'] = "entorno_";
    $sc_conv_var['asienta_inasistencias'] = "asienta_inasistencias_";
    $sc_conv_var['nom_grupo'] = "nom_grupo_";
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
             nm_limpa_str_form_t_evaluacion_p1_m2_prueba($nmgp_val);
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
             nm_limpa_str_form_t_evaluacion_p1_m2_prueba($nmgp_val);
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
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['where_filter'] = $SC_where_pdf;
    }

    if (isset($_POST['rs']) && !is_array($_POST['rs']) && 'ajax_' == substr($_POST['rs'], 0, 5) && isset($_POST['rsargs']) && !empty($_POST['rsargs']))
    {
        if ('ajax_form_t_evaluacion_p1_m2_prueba_validate_id_estudiante_' == $_POST['rs'])
        {
            $id_estudiante_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_validate_estatus_' == $_POST['rs'])
        {
            $estatus_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_validate_novedad_' == $_POST['rs'])
        {
            $novedad_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_validate_asienta_inasistencias_' == $_POST['rs'])
        {
            $asienta_inasistencias_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_validate_inasistencia_p1_' == $_POST['rs'])
        {
            $inasistencia_p1_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_validate_eval_1_per_' == $_POST['rs'])
        {
            $eval_1_per_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_validate_dc1_' == $_POST['rs'])
        {
            $dc1_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_validate_dc2_' == $_POST['rs'])
        {
            $dc2_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_validate_dc3_' == $_POST['rs'])
        {
            $dc3_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_validate_dc4_' == $_POST['rs'])
        {
            $dc4_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_validate_pcent_dc_' == $_POST['rs'])
        {
            $pcent_dc_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_validate_dc5_' == $_POST['rs'])
        {
            $dc5_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_validate_dc6_' == $_POST['rs'])
        {
            $dc6_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_validate_dc7_' == $_POST['rs'])
        {
            $dc7_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_validate_dc8_' == $_POST['rs'])
        {
            $dc8_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_validate_pcent_dp_' == $_POST['rs'])
        {
            $pcent_dp_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_validate_dc9_' == $_POST['rs'])
        {
            $dc9_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_validate_dc10_' == $_POST['rs'])
        {
            $dc10_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_validate_dc11_' == $_POST['rs'])
        {
            $dc11_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_validate_dc12_' == $_POST['rs'])
        {
            $dc12_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_validate_pcent_ds_' == $_POST['rs'])
        {
            $pcent_ds_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_event_dc10__onblur' == $_POST['rs'])
        {
            $dc1_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $dc2_ = NM_utf8_urldecode($_POST['rsargs'][1]);
            $dc3_ = NM_utf8_urldecode($_POST['rsargs'][2]);
            $dc4_ = NM_utf8_urldecode($_POST['rsargs'][3]);
            $dc5_ = NM_utf8_urldecode($_POST['rsargs'][4]);
            $dc6_ = NM_utf8_urldecode($_POST['rsargs'][5]);
            $dc7_ = NM_utf8_urldecode($_POST['rsargs'][6]);
            $dc8_ = NM_utf8_urldecode($_POST['rsargs'][7]);
            $dc9_ = NM_utf8_urldecode($_POST['rsargs'][8]);
            $dc10_ = NM_utf8_urldecode($_POST['rsargs'][9]);
            $dc11_ = NM_utf8_urldecode($_POST['rsargs'][10]);
            $dc12_ = NM_utf8_urldecode($_POST['rsargs'][11]);
            $pcent_dc_ = NM_utf8_urldecode($_POST['rsargs'][12]);
            $pcent_dp_ = NM_utf8_urldecode($_POST['rsargs'][13]);
            $pcent_ds_ = NM_utf8_urldecode($_POST['rsargs'][14]);
            $eval_1_per_ = NM_utf8_urldecode($_POST['rsargs'][15]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][16]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][17]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_event_dc11__onblur' == $_POST['rs'])
        {
            $dc1_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $dc2_ = NM_utf8_urldecode($_POST['rsargs'][1]);
            $dc3_ = NM_utf8_urldecode($_POST['rsargs'][2]);
            $dc4_ = NM_utf8_urldecode($_POST['rsargs'][3]);
            $dc5_ = NM_utf8_urldecode($_POST['rsargs'][4]);
            $dc6_ = NM_utf8_urldecode($_POST['rsargs'][5]);
            $dc7_ = NM_utf8_urldecode($_POST['rsargs'][6]);
            $dc8_ = NM_utf8_urldecode($_POST['rsargs'][7]);
            $dc9_ = NM_utf8_urldecode($_POST['rsargs'][8]);
            $dc10_ = NM_utf8_urldecode($_POST['rsargs'][9]);
            $dc11_ = NM_utf8_urldecode($_POST['rsargs'][10]);
            $dc12_ = NM_utf8_urldecode($_POST['rsargs'][11]);
            $pcent_dc_ = NM_utf8_urldecode($_POST['rsargs'][12]);
            $pcent_dp_ = NM_utf8_urldecode($_POST['rsargs'][13]);
            $pcent_ds_ = NM_utf8_urldecode($_POST['rsargs'][14]);
            $eval_1_per_ = NM_utf8_urldecode($_POST['rsargs'][15]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][16]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][17]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_event_dc12__onblur' == $_POST['rs'])
        {
            $dc1_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $dc2_ = NM_utf8_urldecode($_POST['rsargs'][1]);
            $dc3_ = NM_utf8_urldecode($_POST['rsargs'][2]);
            $dc4_ = NM_utf8_urldecode($_POST['rsargs'][3]);
            $dc5_ = NM_utf8_urldecode($_POST['rsargs'][4]);
            $dc6_ = NM_utf8_urldecode($_POST['rsargs'][5]);
            $dc7_ = NM_utf8_urldecode($_POST['rsargs'][6]);
            $dc8_ = NM_utf8_urldecode($_POST['rsargs'][7]);
            $dc9_ = NM_utf8_urldecode($_POST['rsargs'][8]);
            $dc10_ = NM_utf8_urldecode($_POST['rsargs'][9]);
            $dc11_ = NM_utf8_urldecode($_POST['rsargs'][10]);
            $dc12_ = NM_utf8_urldecode($_POST['rsargs'][11]);
            $pcent_dc_ = NM_utf8_urldecode($_POST['rsargs'][12]);
            $pcent_dp_ = NM_utf8_urldecode($_POST['rsargs'][13]);
            $pcent_ds_ = NM_utf8_urldecode($_POST['rsargs'][14]);
            $eval_1_per_ = NM_utf8_urldecode($_POST['rsargs'][15]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][16]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][17]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_event_dc1__onblur' == $_POST['rs'])
        {
            $dc1_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $dc2_ = NM_utf8_urldecode($_POST['rsargs'][1]);
            $dc3_ = NM_utf8_urldecode($_POST['rsargs'][2]);
            $dc4_ = NM_utf8_urldecode($_POST['rsargs'][3]);
            $dc5_ = NM_utf8_urldecode($_POST['rsargs'][4]);
            $dc6_ = NM_utf8_urldecode($_POST['rsargs'][5]);
            $dc7_ = NM_utf8_urldecode($_POST['rsargs'][6]);
            $dc8_ = NM_utf8_urldecode($_POST['rsargs'][7]);
            $dc9_ = NM_utf8_urldecode($_POST['rsargs'][8]);
            $dc10_ = NM_utf8_urldecode($_POST['rsargs'][9]);
            $dc11_ = NM_utf8_urldecode($_POST['rsargs'][10]);
            $dc12_ = NM_utf8_urldecode($_POST['rsargs'][11]);
            $pcent_dc_ = NM_utf8_urldecode($_POST['rsargs'][12]);
            $pcent_dp_ = NM_utf8_urldecode($_POST['rsargs'][13]);
            $pcent_ds_ = NM_utf8_urldecode($_POST['rsargs'][14]);
            $eval_1_per_ = NM_utf8_urldecode($_POST['rsargs'][15]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][16]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][17]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_event_dc2__onblur' == $_POST['rs'])
        {
            $dc1_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $dc2_ = NM_utf8_urldecode($_POST['rsargs'][1]);
            $dc3_ = NM_utf8_urldecode($_POST['rsargs'][2]);
            $dc4_ = NM_utf8_urldecode($_POST['rsargs'][3]);
            $dc5_ = NM_utf8_urldecode($_POST['rsargs'][4]);
            $dc6_ = NM_utf8_urldecode($_POST['rsargs'][5]);
            $dc7_ = NM_utf8_urldecode($_POST['rsargs'][6]);
            $dc8_ = NM_utf8_urldecode($_POST['rsargs'][7]);
            $dc9_ = NM_utf8_urldecode($_POST['rsargs'][8]);
            $dc10_ = NM_utf8_urldecode($_POST['rsargs'][9]);
            $dc11_ = NM_utf8_urldecode($_POST['rsargs'][10]);
            $dc12_ = NM_utf8_urldecode($_POST['rsargs'][11]);
            $pcent_dc_ = NM_utf8_urldecode($_POST['rsargs'][12]);
            $pcent_dp_ = NM_utf8_urldecode($_POST['rsargs'][13]);
            $pcent_ds_ = NM_utf8_urldecode($_POST['rsargs'][14]);
            $eval_1_per_ = NM_utf8_urldecode($_POST['rsargs'][15]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][16]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][17]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_event_dc3__onblur' == $_POST['rs'])
        {
            $dc1_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $dc2_ = NM_utf8_urldecode($_POST['rsargs'][1]);
            $dc3_ = NM_utf8_urldecode($_POST['rsargs'][2]);
            $dc4_ = NM_utf8_urldecode($_POST['rsargs'][3]);
            $dc5_ = NM_utf8_urldecode($_POST['rsargs'][4]);
            $dc6_ = NM_utf8_urldecode($_POST['rsargs'][5]);
            $dc7_ = NM_utf8_urldecode($_POST['rsargs'][6]);
            $dc8_ = NM_utf8_urldecode($_POST['rsargs'][7]);
            $dc9_ = NM_utf8_urldecode($_POST['rsargs'][8]);
            $dc10_ = NM_utf8_urldecode($_POST['rsargs'][9]);
            $dc11_ = NM_utf8_urldecode($_POST['rsargs'][10]);
            $dc12_ = NM_utf8_urldecode($_POST['rsargs'][11]);
            $pcent_dc_ = NM_utf8_urldecode($_POST['rsargs'][12]);
            $pcent_dp_ = NM_utf8_urldecode($_POST['rsargs'][13]);
            $pcent_ds_ = NM_utf8_urldecode($_POST['rsargs'][14]);
            $eval_1_per_ = NM_utf8_urldecode($_POST['rsargs'][15]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][16]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][17]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_event_dc4__onblur' == $_POST['rs'])
        {
            $dc1_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $dc2_ = NM_utf8_urldecode($_POST['rsargs'][1]);
            $dc3_ = NM_utf8_urldecode($_POST['rsargs'][2]);
            $dc4_ = NM_utf8_urldecode($_POST['rsargs'][3]);
            $dc5_ = NM_utf8_urldecode($_POST['rsargs'][4]);
            $dc6_ = NM_utf8_urldecode($_POST['rsargs'][5]);
            $dc7_ = NM_utf8_urldecode($_POST['rsargs'][6]);
            $dc8_ = NM_utf8_urldecode($_POST['rsargs'][7]);
            $dc9_ = NM_utf8_urldecode($_POST['rsargs'][8]);
            $dc10_ = NM_utf8_urldecode($_POST['rsargs'][9]);
            $dc11_ = NM_utf8_urldecode($_POST['rsargs'][10]);
            $dc12_ = NM_utf8_urldecode($_POST['rsargs'][11]);
            $pcent_dc_ = NM_utf8_urldecode($_POST['rsargs'][12]);
            $pcent_dp_ = NM_utf8_urldecode($_POST['rsargs'][13]);
            $pcent_ds_ = NM_utf8_urldecode($_POST['rsargs'][14]);
            $eval_1_per_ = NM_utf8_urldecode($_POST['rsargs'][15]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][16]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][17]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_event_dc5__onblur' == $_POST['rs'])
        {
            $dc1_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $dc2_ = NM_utf8_urldecode($_POST['rsargs'][1]);
            $dc3_ = NM_utf8_urldecode($_POST['rsargs'][2]);
            $dc4_ = NM_utf8_urldecode($_POST['rsargs'][3]);
            $dc5_ = NM_utf8_urldecode($_POST['rsargs'][4]);
            $dc6_ = NM_utf8_urldecode($_POST['rsargs'][5]);
            $dc7_ = NM_utf8_urldecode($_POST['rsargs'][6]);
            $dc8_ = NM_utf8_urldecode($_POST['rsargs'][7]);
            $dc9_ = NM_utf8_urldecode($_POST['rsargs'][8]);
            $dc10_ = NM_utf8_urldecode($_POST['rsargs'][9]);
            $dc11_ = NM_utf8_urldecode($_POST['rsargs'][10]);
            $dc12_ = NM_utf8_urldecode($_POST['rsargs'][11]);
            $pcent_dc_ = NM_utf8_urldecode($_POST['rsargs'][12]);
            $pcent_dp_ = NM_utf8_urldecode($_POST['rsargs'][13]);
            $pcent_ds_ = NM_utf8_urldecode($_POST['rsargs'][14]);
            $eval_1_per_ = NM_utf8_urldecode($_POST['rsargs'][15]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][16]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][17]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_event_dc6__onblur' == $_POST['rs'])
        {
            $dc1_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $dc2_ = NM_utf8_urldecode($_POST['rsargs'][1]);
            $dc3_ = NM_utf8_urldecode($_POST['rsargs'][2]);
            $dc4_ = NM_utf8_urldecode($_POST['rsargs'][3]);
            $dc5_ = NM_utf8_urldecode($_POST['rsargs'][4]);
            $dc6_ = NM_utf8_urldecode($_POST['rsargs'][5]);
            $dc7_ = NM_utf8_urldecode($_POST['rsargs'][6]);
            $dc8_ = NM_utf8_urldecode($_POST['rsargs'][7]);
            $dc9_ = NM_utf8_urldecode($_POST['rsargs'][8]);
            $dc10_ = NM_utf8_urldecode($_POST['rsargs'][9]);
            $dc11_ = NM_utf8_urldecode($_POST['rsargs'][10]);
            $dc12_ = NM_utf8_urldecode($_POST['rsargs'][11]);
            $pcent_dc_ = NM_utf8_urldecode($_POST['rsargs'][12]);
            $pcent_dp_ = NM_utf8_urldecode($_POST['rsargs'][13]);
            $pcent_ds_ = NM_utf8_urldecode($_POST['rsargs'][14]);
            $eval_1_per_ = NM_utf8_urldecode($_POST['rsargs'][15]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][16]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][17]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_event_dc7__onblur' == $_POST['rs'])
        {
            $dc1_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $dc2_ = NM_utf8_urldecode($_POST['rsargs'][1]);
            $dc3_ = NM_utf8_urldecode($_POST['rsargs'][2]);
            $dc4_ = NM_utf8_urldecode($_POST['rsargs'][3]);
            $dc5_ = NM_utf8_urldecode($_POST['rsargs'][4]);
            $dc6_ = NM_utf8_urldecode($_POST['rsargs'][5]);
            $dc7_ = NM_utf8_urldecode($_POST['rsargs'][6]);
            $dc8_ = NM_utf8_urldecode($_POST['rsargs'][7]);
            $dc9_ = NM_utf8_urldecode($_POST['rsargs'][8]);
            $dc10_ = NM_utf8_urldecode($_POST['rsargs'][9]);
            $dc11_ = NM_utf8_urldecode($_POST['rsargs'][10]);
            $dc12_ = NM_utf8_urldecode($_POST['rsargs'][11]);
            $pcent_dc_ = NM_utf8_urldecode($_POST['rsargs'][12]);
            $pcent_dp_ = NM_utf8_urldecode($_POST['rsargs'][13]);
            $pcent_ds_ = NM_utf8_urldecode($_POST['rsargs'][14]);
            $eval_1_per_ = NM_utf8_urldecode($_POST['rsargs'][15]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][16]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][17]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_event_dc8__onblur' == $_POST['rs'])
        {
            $dc1_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $dc2_ = NM_utf8_urldecode($_POST['rsargs'][1]);
            $dc3_ = NM_utf8_urldecode($_POST['rsargs'][2]);
            $dc4_ = NM_utf8_urldecode($_POST['rsargs'][3]);
            $dc5_ = NM_utf8_urldecode($_POST['rsargs'][4]);
            $dc6_ = NM_utf8_urldecode($_POST['rsargs'][5]);
            $dc7_ = NM_utf8_urldecode($_POST['rsargs'][6]);
            $dc8_ = NM_utf8_urldecode($_POST['rsargs'][7]);
            $dc9_ = NM_utf8_urldecode($_POST['rsargs'][8]);
            $dc10_ = NM_utf8_urldecode($_POST['rsargs'][9]);
            $dc11_ = NM_utf8_urldecode($_POST['rsargs'][10]);
            $dc12_ = NM_utf8_urldecode($_POST['rsargs'][11]);
            $pcent_dc_ = NM_utf8_urldecode($_POST['rsargs'][12]);
            $pcent_dp_ = NM_utf8_urldecode($_POST['rsargs'][13]);
            $pcent_ds_ = NM_utf8_urldecode($_POST['rsargs'][14]);
            $eval_1_per_ = NM_utf8_urldecode($_POST['rsargs'][15]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][16]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][17]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_event_dc9__onblur' == $_POST['rs'])
        {
            $dc1_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $dc2_ = NM_utf8_urldecode($_POST['rsargs'][1]);
            $dc3_ = NM_utf8_urldecode($_POST['rsargs'][2]);
            $dc4_ = NM_utf8_urldecode($_POST['rsargs'][3]);
            $dc5_ = NM_utf8_urldecode($_POST['rsargs'][4]);
            $dc6_ = NM_utf8_urldecode($_POST['rsargs'][5]);
            $dc7_ = NM_utf8_urldecode($_POST['rsargs'][6]);
            $dc8_ = NM_utf8_urldecode($_POST['rsargs'][7]);
            $dc9_ = NM_utf8_urldecode($_POST['rsargs'][8]);
            $dc10_ = NM_utf8_urldecode($_POST['rsargs'][9]);
            $dc11_ = NM_utf8_urldecode($_POST['rsargs'][10]);
            $dc12_ = NM_utf8_urldecode($_POST['rsargs'][11]);
            $pcent_dc_ = NM_utf8_urldecode($_POST['rsargs'][12]);
            $pcent_dp_ = NM_utf8_urldecode($_POST['rsargs'][13]);
            $pcent_ds_ = NM_utf8_urldecode($_POST['rsargs'][14]);
            $eval_1_per_ = NM_utf8_urldecode($_POST['rsargs'][15]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][16]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][17]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_submit_form' == $_POST['rs'])
        {
            $id_estudiante_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $estatus_ = NM_utf8_urldecode($_POST['rsargs'][1]);
            $novedad_ = NM_utf8_urldecode($_POST['rsargs'][2]);
            $asienta_inasistencias_ = NM_utf8_urldecode($_POST['rsargs'][3]);
            $inasistencia_p1_ = NM_utf8_urldecode($_POST['rsargs'][4]);
            $eval_1_per_ = NM_utf8_urldecode($_POST['rsargs'][5]);
            $dc1_ = NM_utf8_urldecode($_POST['rsargs'][6]);
            $dc2_ = NM_utf8_urldecode($_POST['rsargs'][7]);
            $dc3_ = NM_utf8_urldecode($_POST['rsargs'][8]);
            $dc4_ = NM_utf8_urldecode($_POST['rsargs'][9]);
            $pcent_dc_ = NM_utf8_urldecode($_POST['rsargs'][10]);
            $dc5_ = NM_utf8_urldecode($_POST['rsargs'][11]);
            $dc6_ = NM_utf8_urldecode($_POST['rsargs'][12]);
            $dc7_ = NM_utf8_urldecode($_POST['rsargs'][13]);
            $dc8_ = NM_utf8_urldecode($_POST['rsargs'][14]);
            $pcent_dp_ = NM_utf8_urldecode($_POST['rsargs'][15]);
            $dc9_ = NM_utf8_urldecode($_POST['rsargs'][16]);
            $dc10_ = NM_utf8_urldecode($_POST['rsargs'][17]);
            $dc11_ = NM_utf8_urldecode($_POST['rsargs'][18]);
            $dc12_ = NM_utf8_urldecode($_POST['rsargs'][19]);
            $pcent_ds_ = NM_utf8_urldecode($_POST['rsargs'][20]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][21]);
            $nm_form_submit = NM_utf8_urldecode($_POST['rsargs'][22]);
            $nmgp_url_saida = NM_utf8_urldecode($_POST['rsargs'][23]);
            $nmgp_opcao = NM_utf8_urldecode($_POST['rsargs'][24]);
            $nmgp_ancora = NM_utf8_urldecode($_POST['rsargs'][25]);
            $nmgp_num_form = NM_utf8_urldecode($_POST['rsargs'][26]);
            $nmgp_parms = NM_utf8_urldecode($_POST['rsargs'][27]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][28]);
            $csrf_token = NM_utf8_urldecode($_POST['rsargs'][29]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_navigate_form' == $_POST['rs'])
        {
            $id_estudiante_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $id_grupo_ = NM_utf8_urldecode($_POST['rsargs'][1]);
            $id_asignatura_ = NM_utf8_urldecode($_POST['rsargs'][2]);
            $nm_form_submit = NM_utf8_urldecode($_POST['rsargs'][3]);
            $nmgp_opcao = NM_utf8_urldecode($_POST['rsargs'][4]);
            $nmgp_ordem = NM_utf8_urldecode($_POST['rsargs'][5]);
            $nmgp_arg_dyn_search = NM_utf8_urldecode($_POST['rsargs'][6]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][7]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_add_new_line' == $_POST['rs'])
        {
            $sc_clone = NM_utf8_urldecode($_POST['rsargs'][0]);
            $sc_seq_clone = NM_utf8_urldecode($_POST['rsargs'][1]);
            $sc_seq_vert = NM_utf8_urldecode($_POST['rsargs'][2]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][3]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_backup_line' == $_POST['rs'])
        {
            $id_estudiante_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $id_grupo_ = NM_utf8_urldecode($_POST['rsargs'][1]);
            $id_asignatura_ = NM_utf8_urldecode($_POST['rsargs'][2]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][3]);
            $nm_form_submit = NM_utf8_urldecode($_POST['rsargs'][4]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][5]);
        }
        if ('ajax_form_t_evaluacion_p1_m2_prueba_table_refresh' == $_POST['rs'])
        {
            $id_estudiante_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $id_grupo_ = NM_utf8_urldecode($_POST['rsargs'][1]);
            $id_asignatura_ = NM_utf8_urldecode($_POST['rsargs'][2]);
            $nm_form_submit = NM_utf8_urldecode($_POST['rsargs'][3]);
            $nmgp_opcao = NM_utf8_urldecode($_POST['rsargs'][4]);
            $nmgp_ordem = NM_utf8_urldecode($_POST['rsargs'][5]);
            $nmgp_fast_search = NM_utf8_urldecode($_POST['rsargs'][6]);
            $nmgp_cond_fast_search = NM_utf8_urldecode($_POST['rsargs'][7]);
            $nmgp_arg_fast_search = NM_utf8_urldecode($_POST['rsargs'][8]);
            $nmgp_arg_dyn_search = NM_utf8_urldecode($_POST['rsargs'][9]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][10]);
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
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['lig_edit_lookup']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['lig_edit_lookup']     = false;
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['lig_edit_lookup_cb']  = '';
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['lig_edit_lookup_row'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['embutida_call']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['embutida_call'] = false;
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['embutida_proc']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['embutida_proc'] = false;
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['embutida_liga_form_insert']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['embutida_liga_form_insert'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['embutida_liga_form_update']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['embutida_liga_form_update'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['embutida_liga_form_delete']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['embutida_liga_form_delete'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['embutida_liga_form_btn_nav']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['embutida_liga_form_btn_nav'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['embutida_liga_grid_edit']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['embutida_liga_grid_edit'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['embutida_liga_grid_edit_link']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['embutida_liga_grid_edit_link'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['embutida_liga_qtd_reg']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['embutida_liga_qtd_reg'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['embutida_liga_tp_pag']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['embutida_liga_tp_pag'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['run_modal']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['run_modal'] = isset($_GET['nmgp_url_saida']) && 'modal' == $_GET['nmgp_url_saida'];
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['embutida_proc'])
    {
        return;
    }
    if (isset($script_case_init) && !is_array($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['embutida_parms']))
    { 
        $tmp_nmgp_parms = '';
        if (isset($nmgp_parms) && '' != $nmgp_parms)
        {
            $tmp_nmgp_parms = $nmgp_parms . '?@?';
        }
        $nmgp_parms = $tmp_nmgp_parms . $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['embutida_parms'];
        unset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['embutida_parms']);
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
               nm_limpa_str_form_t_evaluacion_p1_m2_prueba($cadapar[1]);
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
        if (isset($par_idgrupo)) 
        {
            $_SESSION['par_idgrupo'] = $par_idgrupo;
        }
        if (isset($par_id_asignatura)) 
        {
            $_SESSION['par_id_asignatura'] = $par_id_asignatura;
        }
        if (isset($entorno)) 
        {
            $_SESSION['entorno'] = $entorno;
        }
        if (isset($asigna)) 
        {
            $_SESSION['asigna'] = $asigna;
        }
        if (isset($par_cod_desemp)) 
        {
            $_SESSION['par_cod_desemp'] = $par_cod_desemp;
        }
        if (isset($par_cod_desemp10)) 
        {
            $_SESSION['par_cod_desemp10'] = $par_cod_desemp10;
        }
        if (isset($par_cod_desemp11)) 
        {
            $_SESSION['par_cod_desemp11'] = $par_cod_desemp11;
        }
        if (isset($par_cod_desemp12)) 
        {
            $_SESSION['par_cod_desemp12'] = $par_cod_desemp12;
        }
        if (isset($par_cod_desemp2)) 
        {
            $_SESSION['par_cod_desemp2'] = $par_cod_desemp2;
        }
        if (isset($par_cod_desemp3)) 
        {
            $_SESSION['par_cod_desemp3'] = $par_cod_desemp3;
        }
        if (isset($par_cod_desemp4)) 
        {
            $_SESSION['par_cod_desemp4'] = $par_cod_desemp4;
        }
        if (isset($par_cod_desemp5)) 
        {
            $_SESSION['par_cod_desemp5'] = $par_cod_desemp5;
        }
        if (isset($par_cod_desemp6)) 
        {
            $_SESSION['par_cod_desemp6'] = $par_cod_desemp6;
        }
        if (isset($par_cod_desemp7)) 
        {
            $_SESSION['par_cod_desemp7'] = $par_cod_desemp7;
        }
        if (isset($par_cod_desemp8)) 
        {
            $_SESSION['par_cod_desemp8'] = $par_cod_desemp8;
        }
        if (isset($par_cod_desemp9)) 
        {
            $_SESSION['par_cod_desemp9'] = $par_cod_desemp9;
        }
        if (isset($nota_maxima)) 
        {
            $_SESSION['nota_maxima'] = $nota_maxima;
        }
        if (isset($porcentaje_gr1)) 
        {
            $_SESSION['porcentaje_gr1'] = $porcentaje_gr1;
        }
        if (isset($porcentaje_gr2)) 
        {
            $_SESSION['porcentaje_gr2'] = $porcentaje_gr2;
        }
        if (isset($porcentaje_gr3)) 
        {
            $_SESSION['porcentaje_gr3'] = $porcentaje_gr3;
        }
        if (isset($porcent_autoevaluacion)) 
        {
            $_SESSION['porcent_autoevaluacion'] = $porcent_autoevaluacion;
        }
        if (isset($par_desmpeno)) 
        {
            $_SESSION['par_desmpeno'] = $par_desmpeno;
        }
        if (isset($par_desmpeno2)) 
        {
            $_SESSION['par_desmpeno2'] = $par_desmpeno2;
        }
        if (isset($par_desmpeno3)) 
        {
            $_SESSION['par_desmpeno3'] = $par_desmpeno3;
        }
        if (isset($par_desmpeno4)) 
        {
            $_SESSION['par_desmpeno4'] = $par_desmpeno4;
        }
        if (isset($par_desmpeno5)) 
        {
            $_SESSION['par_desmpeno5'] = $par_desmpeno5;
        }
        if (isset($par_desmpeno6)) 
        {
            $_SESSION['par_desmpeno6'] = $par_desmpeno6;
        }
        if (isset($par_desmpeno7)) 
        {
            $_SESSION['par_desmpeno7'] = $par_desmpeno7;
        }
        if (isset($par_desmpeno8)) 
        {
            $_SESSION['par_desmpeno8'] = $par_desmpeno8;
        }
        if (isset($par_desmpeno9)) 
        {
            $_SESSION['par_desmpeno9'] = $par_desmpeno9;
        }
        if (isset($par_desmpeno10)) 
        {
            $_SESSION['par_desmpeno10'] = $par_desmpeno10;
        }
        if (isset($par_desmpeno11)) 
        {
            $_SESSION['par_desmpeno11'] = $par_desmpeno11;
        }
        if (isset($par_desmpeno12)) 
        {
            $_SESSION['par_desmpeno12'] = $par_desmpeno12;
        }
        if (isset($par_asignatura)) 
        {
            $_SESSION['par_asignatura'] = $par_asignatura;
        }
        if (isset($nombre_asignatura)) 
        {
            $_SESSION['nombre_asignatura'] = $nombre_asignatura;
        }
        if (isset($par_periodo)) 
        {
            $_SESSION['par_periodo'] = $par_periodo;
        }
        if (isset($par_idestudiante)) 
        {
            $_SESSION['par_idestudiante'] = $par_idestudiante;
        }
        if (isset($criterio_dp1)) 
        {
            $_SESSION['criterio_dp1'] = $criterio_dp1;
        }
        if (isset($criterio_dp2)) 
        {
            $_SESSION['criterio_dp2'] = $criterio_dp2;
        }
        if (isset($criterio_dp3)) 
        {
            $_SESSION['criterio_dp3'] = $criterio_dp3;
        }
        if (isset($criterio_dp4)) 
        {
            $_SESSION['criterio_dp4'] = $criterio_dp4;
        }
        if (isset($criterio_dp5)) 
        {
            $_SESSION['criterio_dp5'] = $criterio_dp5;
        }
        if (isset($criterio_ds1)) 
        {
            $_SESSION['criterio_ds1'] = $criterio_ds1;
        }
        if (isset($criterio_ds2)) 
        {
            $_SESSION['criterio_ds2'] = $criterio_ds2;
        }
        if (isset($criterio_ds3)) 
        {
            $_SESSION['criterio_ds3'] = $criterio_ds3;
        }
        if (isset($criterio_ds4)) 
        {
            $_SESSION['criterio_ds4'] = $criterio_ds4;
        }
        if (isset($criterio_ds5)) 
        {
            $_SESSION['criterio_ds5'] = $criterio_ds5;
        }
        if (isset($etoqieta_autoevaluacion)) 
        {
            $_SESSION['etoqieta_autoevaluacion'] = $etoqieta_autoevaluacion;
        }
    } 
    elseif (isset($script_case_init) && !empty($script_case_init) && !is_array($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['parms']))
    {
        if (!isset($nmgp_opcao) || ($nmgp_opcao != "incluir" && $nmgp_opcao != "novo" && $nmgp_opcao != "recarga" && $nmgp_opcao != "muda_form"))
        {
            $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['parms']);
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
    if (isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['iframe_menu']))
    {
        $salva_iframe = $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['iframe_menu'];
        unset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['iframe_menu']);
    }
    if (isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['run_iframe']))
    {
        $salva_run = $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['run_iframe'];
        unset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['run_iframe']);
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
        $_SESSION['scriptcase']['sc_apl_menu_atual'] = "form_t_evaluacion_p1_m2_prueba";
        $achou = false;
        if (isset($_SESSION['sc_session'][$script_case_init]))
        {
            foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'form_t_evaluacion_p1_m2_prueba' || $achou)
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
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['iframe_menu']  = true;
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['mostra_cab']   = "S";
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['run_iframe']   = "N";
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['retorno_edit'] = "";
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['run_iframe']  = $salva_run;
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['iframe_menu'] = $salva_iframe;
    }

    if (!isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['db_changed']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['db_changed'] = false;
    }
    if (isset($_GET['nmgp_outra_jan']) && 'true' == $_GET['nmgp_outra_jan'] && isset($_GET['nmgp_url_saida']) && 'modal' == $_GET['nmgp_url_saida'])
    {
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['db_changed'] = false;
    }

    if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'form_t_evaluacion_p1_m2_prueba')
    {
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['sc_outra_jan'] = true;
         unset($_SESSION['scriptcase']['sc_outra_jan']);
    }
    if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
    {
        if (isset($nmgp_url_saida) && $nmgp_url_saida == "modal")
        {
            $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['sc_modal'] = true;
            $nm_url_saida = "form_t_evaluacion_p1_m2_prueba_fim.php"; 
        }
        $nm_apl_dependente = 0;
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['sc_outra_jan'] = true;
    }

    if (!isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['initialize']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['initialize'] = true;
    }
    elseif (!isset($_SERVER['HTTP_REFERER']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['initialize'] = false;
    }
    elseif (false === strpos($_SERVER['HTTP_REFERER'], '/form_t_evaluacion_p1_m2_prueba/'))
    {
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['initialize'] = true;
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['initialize'] = false;
    }

    if (isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['first_time']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['first_time'] = false;
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['first_time'] = true;
    }

    $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['menu_desenv'] = false;   
    if (!defined("SC_ERROR_HANDLER"))
    {
        define("SC_ERROR_HANDLER", 1);
    }
    include_once(dirname(__FILE__) . "/form_t_evaluacion_p1_m2_prueba_erro.php");
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
            $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['opcao'] = $nmgp_opcao ; 
        }
        if (isset($_POST["par_idgrupo"])) 
        {
            $_SESSION['par_idgrupo'] = $_POST["par_idgrupo"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_idgrupo']);
        }
        if (isset($_GET["par_idgrupo"])) 
        {
            $_SESSION['par_idgrupo'] = $_GET["par_idgrupo"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_idgrupo']);
        }
        if (isset($_POST["par_id_asignatura"])) 
        {
            $_SESSION['par_id_asignatura'] = $_POST["par_id_asignatura"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_id_asignatura']);
        }
        if (isset($_GET["par_id_asignatura"])) 
        {
            $_SESSION['par_id_asignatura'] = $_GET["par_id_asignatura"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_id_asignatura']);
        }
        if (isset($_POST["entorno"])) 
        {
            $_SESSION['entorno'] = $_POST["entorno"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['entorno']);
        }
        if (isset($_GET["entorno"])) 
        {
            $_SESSION['entorno'] = $_GET["entorno"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['entorno']);
        }
        if (isset($_POST["asigna"])) 
        {
            $_SESSION['asigna'] = $_POST["asigna"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['asigna']);
        }
        if (isset($_GET["asigna"])) 
        {
            $_SESSION['asigna'] = $_GET["asigna"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['asigna']);
        }
        if (isset($_POST["par_cod_desemp"])) 
        {
            $_SESSION['par_cod_desemp'] = $_POST["par_cod_desemp"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_cod_desemp']);
        }
        if (isset($_GET["par_cod_desemp"])) 
        {
            $_SESSION['par_cod_desemp'] = $_GET["par_cod_desemp"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_cod_desemp']);
        }
        if (isset($_POST["par_cod_desemp10"])) 
        {
            $_SESSION['par_cod_desemp10'] = $_POST["par_cod_desemp10"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_cod_desemp10']);
        }
        if (isset($_GET["par_cod_desemp10"])) 
        {
            $_SESSION['par_cod_desemp10'] = $_GET["par_cod_desemp10"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_cod_desemp10']);
        }
        if (isset($_POST["par_cod_desemp11"])) 
        {
            $_SESSION['par_cod_desemp11'] = $_POST["par_cod_desemp11"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_cod_desemp11']);
        }
        if (isset($_GET["par_cod_desemp11"])) 
        {
            $_SESSION['par_cod_desemp11'] = $_GET["par_cod_desemp11"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_cod_desemp11']);
        }
        if (isset($_POST["par_cod_desemp12"])) 
        {
            $_SESSION['par_cod_desemp12'] = $_POST["par_cod_desemp12"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_cod_desemp12']);
        }
        if (isset($_GET["par_cod_desemp12"])) 
        {
            $_SESSION['par_cod_desemp12'] = $_GET["par_cod_desemp12"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_cod_desemp12']);
        }
        if (isset($_POST["par_cod_desemp2"])) 
        {
            $_SESSION['par_cod_desemp2'] = $_POST["par_cod_desemp2"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_cod_desemp2']);
        }
        if (isset($_GET["par_cod_desemp2"])) 
        {
            $_SESSION['par_cod_desemp2'] = $_GET["par_cod_desemp2"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_cod_desemp2']);
        }
        if (isset($_POST["par_cod_desemp3"])) 
        {
            $_SESSION['par_cod_desemp3'] = $_POST["par_cod_desemp3"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_cod_desemp3']);
        }
        if (isset($_GET["par_cod_desemp3"])) 
        {
            $_SESSION['par_cod_desemp3'] = $_GET["par_cod_desemp3"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_cod_desemp3']);
        }
        if (isset($_POST["par_cod_desemp4"])) 
        {
            $_SESSION['par_cod_desemp4'] = $_POST["par_cod_desemp4"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_cod_desemp4']);
        }
        if (isset($_GET["par_cod_desemp4"])) 
        {
            $_SESSION['par_cod_desemp4'] = $_GET["par_cod_desemp4"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_cod_desemp4']);
        }
        if (isset($_POST["par_cod_desemp5"])) 
        {
            $_SESSION['par_cod_desemp5'] = $_POST["par_cod_desemp5"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_cod_desemp5']);
        }
        if (isset($_GET["par_cod_desemp5"])) 
        {
            $_SESSION['par_cod_desemp5'] = $_GET["par_cod_desemp5"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_cod_desemp5']);
        }
        if (isset($_POST["par_cod_desemp6"])) 
        {
            $_SESSION['par_cod_desemp6'] = $_POST["par_cod_desemp6"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_cod_desemp6']);
        }
        if (isset($_GET["par_cod_desemp6"])) 
        {
            $_SESSION['par_cod_desemp6'] = $_GET["par_cod_desemp6"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_cod_desemp6']);
        }
        if (isset($_POST["par_cod_desemp7"])) 
        {
            $_SESSION['par_cod_desemp7'] = $_POST["par_cod_desemp7"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_cod_desemp7']);
        }
        if (isset($_GET["par_cod_desemp7"])) 
        {
            $_SESSION['par_cod_desemp7'] = $_GET["par_cod_desemp7"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_cod_desemp7']);
        }
        if (isset($_POST["par_cod_desemp8"])) 
        {
            $_SESSION['par_cod_desemp8'] = $_POST["par_cod_desemp8"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_cod_desemp8']);
        }
        if (isset($_GET["par_cod_desemp8"])) 
        {
            $_SESSION['par_cod_desemp8'] = $_GET["par_cod_desemp8"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_cod_desemp8']);
        }
        if (isset($_POST["par_cod_desemp9"])) 
        {
            $_SESSION['par_cod_desemp9'] = $_POST["par_cod_desemp9"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_cod_desemp9']);
        }
        if (isset($_GET["par_cod_desemp9"])) 
        {
            $_SESSION['par_cod_desemp9'] = $_GET["par_cod_desemp9"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_cod_desemp9']);
        }
        if (isset($_POST["nota_maxima"])) 
        {
            $_SESSION['nota_maxima'] = $_POST["nota_maxima"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['nota_maxima']);
        }
        if (isset($_GET["nota_maxima"])) 
        {
            $_SESSION['nota_maxima'] = $_GET["nota_maxima"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['nota_maxima']);
        }
        if (isset($_POST["porcentaje_gr1"])) 
        {
            $_SESSION['porcentaje_gr1'] = $_POST["porcentaje_gr1"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['porcentaje_gr1']);
        }
        if (isset($_GET["porcentaje_gr1"])) 
        {
            $_SESSION['porcentaje_gr1'] = $_GET["porcentaje_gr1"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['porcentaje_gr1']);
        }
        if (isset($_POST["porcentaje_gr2"])) 
        {
            $_SESSION['porcentaje_gr2'] = $_POST["porcentaje_gr2"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['porcentaje_gr2']);
        }
        if (isset($_GET["porcentaje_gr2"])) 
        {
            $_SESSION['porcentaje_gr2'] = $_GET["porcentaje_gr2"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['porcentaje_gr2']);
        }
        if (isset($_POST["porcentaje_gr3"])) 
        {
            $_SESSION['porcentaje_gr3'] = $_POST["porcentaje_gr3"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['porcentaje_gr3']);
        }
        if (isset($_GET["porcentaje_gr3"])) 
        {
            $_SESSION['porcentaje_gr3'] = $_GET["porcentaje_gr3"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['porcentaje_gr3']);
        }
        if (isset($_POST["porcent_autoevaluacion"])) 
        {
            $_SESSION['porcent_autoevaluacion'] = $_POST["porcent_autoevaluacion"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['porcent_autoevaluacion']);
        }
        if (isset($_GET["porcent_autoevaluacion"])) 
        {
            $_SESSION['porcent_autoevaluacion'] = $_GET["porcent_autoevaluacion"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['porcent_autoevaluacion']);
        }
        if (isset($_POST["par_desmpeno"])) 
        {
            $_SESSION['par_desmpeno'] = $_POST["par_desmpeno"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_desmpeno']);
        }
        if (isset($_GET["par_desmpeno"])) 
        {
            $_SESSION['par_desmpeno'] = $_GET["par_desmpeno"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_desmpeno']);
        }
        if (isset($_POST["par_desmpeno2"])) 
        {
            $_SESSION['par_desmpeno2'] = $_POST["par_desmpeno2"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_desmpeno2']);
        }
        if (isset($_GET["par_desmpeno2"])) 
        {
            $_SESSION['par_desmpeno2'] = $_GET["par_desmpeno2"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_desmpeno2']);
        }
        if (isset($_POST["par_desmpeno3"])) 
        {
            $_SESSION['par_desmpeno3'] = $_POST["par_desmpeno3"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_desmpeno3']);
        }
        if (isset($_GET["par_desmpeno3"])) 
        {
            $_SESSION['par_desmpeno3'] = $_GET["par_desmpeno3"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_desmpeno3']);
        }
        if (isset($_POST["par_desmpeno4"])) 
        {
            $_SESSION['par_desmpeno4'] = $_POST["par_desmpeno4"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_desmpeno4']);
        }
        if (isset($_GET["par_desmpeno4"])) 
        {
            $_SESSION['par_desmpeno4'] = $_GET["par_desmpeno4"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_desmpeno4']);
        }
        if (isset($_POST["par_desmpeno5"])) 
        {
            $_SESSION['par_desmpeno5'] = $_POST["par_desmpeno5"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_desmpeno5']);
        }
        if (isset($_GET["par_desmpeno5"])) 
        {
            $_SESSION['par_desmpeno5'] = $_GET["par_desmpeno5"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_desmpeno5']);
        }
        if (isset($_POST["par_desmpeno6"])) 
        {
            $_SESSION['par_desmpeno6'] = $_POST["par_desmpeno6"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_desmpeno6']);
        }
        if (isset($_GET["par_desmpeno6"])) 
        {
            $_SESSION['par_desmpeno6'] = $_GET["par_desmpeno6"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_desmpeno6']);
        }
        if (isset($_POST["par_desmpeno7"])) 
        {
            $_SESSION['par_desmpeno7'] = $_POST["par_desmpeno7"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_desmpeno7']);
        }
        if (isset($_GET["par_desmpeno7"])) 
        {
            $_SESSION['par_desmpeno7'] = $_GET["par_desmpeno7"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_desmpeno7']);
        }
        if (isset($_POST["par_desmpeno8"])) 
        {
            $_SESSION['par_desmpeno8'] = $_POST["par_desmpeno8"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_desmpeno8']);
        }
        if (isset($_GET["par_desmpeno8"])) 
        {
            $_SESSION['par_desmpeno8'] = $_GET["par_desmpeno8"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_desmpeno8']);
        }
        if (isset($_POST["par_desmpeno9"])) 
        {
            $_SESSION['par_desmpeno9'] = $_POST["par_desmpeno9"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_desmpeno9']);
        }
        if (isset($_GET["par_desmpeno9"])) 
        {
            $_SESSION['par_desmpeno9'] = $_GET["par_desmpeno9"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_desmpeno9']);
        }
        if (isset($_POST["par_desmpeno10"])) 
        {
            $_SESSION['par_desmpeno10'] = $_POST["par_desmpeno10"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_desmpeno10']);
        }
        if (isset($_GET["par_desmpeno10"])) 
        {
            $_SESSION['par_desmpeno10'] = $_GET["par_desmpeno10"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_desmpeno10']);
        }
        if (isset($_POST["par_desmpeno11"])) 
        {
            $_SESSION['par_desmpeno11'] = $_POST["par_desmpeno11"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_desmpeno11']);
        }
        if (isset($_GET["par_desmpeno11"])) 
        {
            $_SESSION['par_desmpeno11'] = $_GET["par_desmpeno11"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_desmpeno11']);
        }
        if (isset($_POST["par_desmpeno12"])) 
        {
            $_SESSION['par_desmpeno12'] = $_POST["par_desmpeno12"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_desmpeno12']);
        }
        if (isset($_GET["par_desmpeno12"])) 
        {
            $_SESSION['par_desmpeno12'] = $_GET["par_desmpeno12"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_desmpeno12']);
        }
        if (isset($_POST["par_asignatura"])) 
        {
            $_SESSION['par_asignatura'] = $_POST["par_asignatura"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_asignatura']);
        }
        if (isset($_GET["par_asignatura"])) 
        {
            $_SESSION['par_asignatura'] = $_GET["par_asignatura"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_asignatura']);
        }
        if (isset($_POST["nombre_asignatura"])) 
        {
            $_SESSION['nombre_asignatura'] = $_POST["nombre_asignatura"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['nombre_asignatura']);
        }
        if (isset($_GET["nombre_asignatura"])) 
        {
            $_SESSION['nombre_asignatura'] = $_GET["nombre_asignatura"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['nombre_asignatura']);
        }
        if (isset($_POST["par_periodo"])) 
        {
            $_SESSION['par_periodo'] = $_POST["par_periodo"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_periodo']);
        }
        if (isset($_GET["par_periodo"])) 
        {
            $_SESSION['par_periodo'] = $_GET["par_periodo"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_periodo']);
        }
        if (isset($_POST["par_idestudiante"])) 
        {
            $_SESSION['par_idestudiante'] = $_POST["par_idestudiante"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_idestudiante']);
        }
        if (isset($_GET["par_idestudiante"])) 
        {
            $_SESSION['par_idestudiante'] = $_GET["par_idestudiante"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['par_idestudiante']);
        }
        if (isset($_POST["criterio_dp1"])) 
        {
            $_SESSION['criterio_dp1'] = $_POST["criterio_dp1"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['criterio_dp1']);
        }
        if (isset($_GET["criterio_dp1"])) 
        {
            $_SESSION['criterio_dp1'] = $_GET["criterio_dp1"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['criterio_dp1']);
        }
        if (isset($_POST["criterio_dp2"])) 
        {
            $_SESSION['criterio_dp2'] = $_POST["criterio_dp2"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['criterio_dp2']);
        }
        if (isset($_GET["criterio_dp2"])) 
        {
            $_SESSION['criterio_dp2'] = $_GET["criterio_dp2"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['criterio_dp2']);
        }
        if (isset($_POST["criterio_dp3"])) 
        {
            $_SESSION['criterio_dp3'] = $_POST["criterio_dp3"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['criterio_dp3']);
        }
        if (isset($_GET["criterio_dp3"])) 
        {
            $_SESSION['criterio_dp3'] = $_GET["criterio_dp3"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['criterio_dp3']);
        }
        if (isset($_POST["criterio_dp4"])) 
        {
            $_SESSION['criterio_dp4'] = $_POST["criterio_dp4"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['criterio_dp4']);
        }
        if (isset($_GET["criterio_dp4"])) 
        {
            $_SESSION['criterio_dp4'] = $_GET["criterio_dp4"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['criterio_dp4']);
        }
        if (isset($_POST["criterio_dp5"])) 
        {
            $_SESSION['criterio_dp5'] = $_POST["criterio_dp5"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['criterio_dp5']);
        }
        if (isset($_GET["criterio_dp5"])) 
        {
            $_SESSION['criterio_dp5'] = $_GET["criterio_dp5"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['criterio_dp5']);
        }
        if (isset($_POST["criterio_ds1"])) 
        {
            $_SESSION['criterio_ds1'] = $_POST["criterio_ds1"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['criterio_ds1']);
        }
        if (isset($_GET["criterio_ds1"])) 
        {
            $_SESSION['criterio_ds1'] = $_GET["criterio_ds1"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['criterio_ds1']);
        }
        if (isset($_POST["criterio_ds2"])) 
        {
            $_SESSION['criterio_ds2'] = $_POST["criterio_ds2"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['criterio_ds2']);
        }
        if (isset($_GET["criterio_ds2"])) 
        {
            $_SESSION['criterio_ds2'] = $_GET["criterio_ds2"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['criterio_ds2']);
        }
        if (isset($_POST["criterio_ds3"])) 
        {
            $_SESSION['criterio_ds3'] = $_POST["criterio_ds3"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['criterio_ds3']);
        }
        if (isset($_GET["criterio_ds3"])) 
        {
            $_SESSION['criterio_ds3'] = $_GET["criterio_ds3"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['criterio_ds3']);
        }
        if (isset($_POST["criterio_ds4"])) 
        {
            $_SESSION['criterio_ds4'] = $_POST["criterio_ds4"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['criterio_ds4']);
        }
        if (isset($_GET["criterio_ds4"])) 
        {
            $_SESSION['criterio_ds4'] = $_GET["criterio_ds4"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['criterio_ds4']);
        }
        if (isset($_POST["criterio_ds5"])) 
        {
            $_SESSION['criterio_ds5'] = $_POST["criterio_ds5"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['criterio_ds5']);
        }
        if (isset($_GET["criterio_ds5"])) 
        {
            $_SESSION['criterio_ds5'] = $_GET["criterio_ds5"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['criterio_ds5']);
        }
        if (isset($_POST["etoqieta_autoevaluacion"])) 
        {
            $_SESSION['etoqieta_autoevaluacion'] = $_POST["etoqieta_autoevaluacion"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['etoqieta_autoevaluacion']);
        }
        if (isset($_GET["etoqieta_autoevaluacion"])) 
        {
            $_SESSION['etoqieta_autoevaluacion'] = $_GET["etoqieta_autoevaluacion"];
            nm_limpa_str_form_t_evaluacion_p1_m2_prueba($_SESSION['etoqieta_autoevaluacion']);
        }
        if (!empty($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['volta_redirect_apl']))
        {
            $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['volta_redirect_apl']; 
            $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['volta_redirect_tp']; 
            $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['volta_redirect_apl'] = "";
            $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['volta_redirect_tp'] = "";
            $nm_url_saida = "form_t_evaluacion_p1_m2_prueba_fim.php"; 
        }
        elseif (isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['sc_outra_jan'] == 'true')
        {
               $nm_url_saida = "form_t_evaluacion_p1_m2_prueba_fim.php"; 
        }
        elseif ($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['run_iframe'] != "R")
        {
           $nm_url_saida = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ""; 
           $nm_url_saida = str_replace("_fim.php", ".php", $nm_url_saida); 
            $nm_saida_global = $nm_url_saida;
            if (!empty($nmgp_url_saida) && empty($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['retorno_edit'])) 
            {
                $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['retorno_edit'] = $nmgp_url_saida ; 
            } 
            if (!empty($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['retorno_edit'])) 
            {
                $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['retorno_edit'] . "?script_case_init=" . $script_case_init . "&script_case_session=" . session_id();  
                $nm_apl_dependente = 1 ; 
                $nm_saida_global = $nm_url_saida;
            } 
            if ($nm_apl_dependente != 1) 
            { 
                $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['run_iframe'] = "N"; 
            } 
            if ($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['run_iframe'] != "R" && (!isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['embutida_call']) || !$_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['embutida_call']))
            { 
                $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $nm_url_saida; 
                $nm_url_saida = "form_t_evaluacion_p1_m2_prueba_fim.php"; 
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
        if (empty($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['volta_tp']) && $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['run_iframe'] != "R")
        {
            $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['volta_php'] = $nm_url_saida;
            $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['volta_apl'] = $nm_saida_global;
            $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['volta_ss']  = (isset($_SESSION['scriptcase']['sc_url_saida'][$script_case_init])) ? $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] : "";
            $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['volta_dep'] = $nm_apl_dependente;
            $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['volta_tp']  = (isset($_SESSION['scriptcase']['sc_tp_saida'])) ? $_SESSION['scriptcase']['sc_tp_saida'] : "";
        }
        $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['volta_php'];
        $nm_saida_global = $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['volta_php'];
        $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['volta_dep'];
        if ($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['run_iframe'] != "R" && !empty($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['volta_ss'])) 
        { 
            $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['volta_ss'];
            $_SESSION['scriptcase']['sc_tp_saida']  = $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['volta_tp'];
        } 
        if ($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['run_iframe'] == "F" || $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['run_iframe'] == "R") 
        { 
            if (!empty($nmgp_url_saida) && empty($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['retorno_edit'])) 
            {
                $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['retorno_edit'] = $nmgp_url_saida . "?script_case_init=" . $script_case_init . "&script_case_session=" . session_id(); 
            } 
        } 
        if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['run_iframe'] != "R") 
        { 
            $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['menu_desenv'] = true;   
        } 
    }
    if (isset($nmgp_redir)) 
    { 
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['redir'] = $nmgp_redir;   
    } 
    if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
    {
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['sc_outra_jan'] = true;
         if ($nmgp_url_saida == "modal")
         {
             $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['sc_modal'] = true;
             $nm_url_saida = "form_t_evaluacion_p1_m2_prueba_fim.php"; 
         }
    }
    if (isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_p1_m2_prueba']['sc_outra_jan'])
    {
        $nm_apl_dependente = 0;
    }
    $GLOBALS["NM_ERRO_IBASE"] = 0;  
    $inicial_form_t_evaluacion_p1_m2_prueba = new form_t_evaluacion_p1_m2_prueba_edit();
    $inicial_form_t_evaluacion_p1_m2_prueba->inicializa();

    $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['select_html'] = array();
    $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['select_html']['id_estudiante_'] = "class=\\\"sc-js-input scFormObjectOddMult css_id_estudiante__obj\\\" style=\\\"\\\" id=\\\"id_sc_field_id_estudiante_\" . \$sc_seq_vert . \"\\\" name=\\\"id_estudiante_\" . \$sc_seq_vert . \"\\\" size=\\\"1\\\" alt=\\\"{type: 'select', enterTab: true}\\\"";

    if (!defined('SC_SAJAX_LOADED'))
    {
        include_once(dirname(__FILE__) . '/form_t_evaluacion_p1_m2_prueba_sajax.php');
        define('SC_SAJAX_LOADED', 'YES');
    }
    if (!class_exists('Services_JSON'))
    {
        include_once(dirname(__FILE__) . '/form_t_evaluacion_p1_m2_prueba_json.php');
    }
    $sajax_request_type = "POST";
    sajax_init();
    //$sajax_debug_mode = 1;
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_validate_id_estudiante_");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_validate_estatus_");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_validate_novedad_");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_validate_asienta_inasistencias_");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_validate_inasistencia_p1_");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_validate_eval_1_per_");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_validate_dc1_");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_validate_dc2_");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_validate_dc3_");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_validate_dc4_");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_validate_pcent_dc_");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_validate_dc5_");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_validate_dc6_");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_validate_dc7_");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_validate_dc8_");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_validate_pcent_dp_");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_validate_dc9_");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_validate_dc10_");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_validate_dc11_");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_validate_dc12_");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_validate_pcent_ds_");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_event_dc10__onblur");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_event_dc11__onblur");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_event_dc12__onblur");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_event_dc1__onblur");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_event_dc2__onblur");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_event_dc3__onblur");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_event_dc4__onblur");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_event_dc5__onblur");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_event_dc6__onblur");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_event_dc7__onblur");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_event_dc8__onblur");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_event_dc9__onblur");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_submit_form");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_navigate_form");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_add_new_line");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_backup_line");
    sajax_export("ajax_form_t_evaluacion_p1_m2_prueba_table_refresh");
    sajax_handle_client_request();

    $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
//
    function nm_limpa_str_form_t_evaluacion_p1_m2_prueba(&$str)
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

    function ajax_form_t_evaluacion_p1_m2_prueba_validate_id_estudiante_($id_estudiante_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'validate_id_estudiante_';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'id_estudiante_' => NM_utf8_urldecode($id_estudiante_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_validate_id_estudiante_

    function ajax_form_t_evaluacion_p1_m2_prueba_validate_estatus_($estatus_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'validate_estatus_';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'estatus_' => NM_utf8_urldecode($estatus_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_validate_estatus_

    function ajax_form_t_evaluacion_p1_m2_prueba_validate_novedad_($novedad_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'validate_novedad_';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'novedad_' => NM_utf8_urldecode($novedad_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_validate_novedad_

    function ajax_form_t_evaluacion_p1_m2_prueba_validate_asienta_inasistencias_($asienta_inasistencias_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'validate_asienta_inasistencias_';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'asienta_inasistencias_' => NM_utf8_urldecode($asienta_inasistencias_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_validate_asienta_inasistencias_

    function ajax_form_t_evaluacion_p1_m2_prueba_validate_inasistencia_p1_($inasistencia_p1_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'validate_inasistencia_p1_';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'inasistencia_p1_' => NM_utf8_urldecode($inasistencia_p1_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_validate_inasistencia_p1_

    function ajax_form_t_evaluacion_p1_m2_prueba_validate_eval_1_per_($eval_1_per_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'validate_eval_1_per_';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'eval_1_per_' => NM_utf8_urldecode($eval_1_per_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_validate_eval_1_per_

    function ajax_form_t_evaluacion_p1_m2_prueba_validate_dc1_($dc1_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'validate_dc1_';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'dc1_' => NM_utf8_urldecode($dc1_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_validate_dc1_

    function ajax_form_t_evaluacion_p1_m2_prueba_validate_dc2_($dc2_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'validate_dc2_';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'dc2_' => NM_utf8_urldecode($dc2_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_validate_dc2_

    function ajax_form_t_evaluacion_p1_m2_prueba_validate_dc3_($dc3_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'validate_dc3_';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'dc3_' => NM_utf8_urldecode($dc3_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_validate_dc3_

    function ajax_form_t_evaluacion_p1_m2_prueba_validate_dc4_($dc4_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'validate_dc4_';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'dc4_' => NM_utf8_urldecode($dc4_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_validate_dc4_

    function ajax_form_t_evaluacion_p1_m2_prueba_validate_pcent_dc_($pcent_dc_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'validate_pcent_dc_';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'pcent_dc_' => NM_utf8_urldecode($pcent_dc_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_validate_pcent_dc_

    function ajax_form_t_evaluacion_p1_m2_prueba_validate_dc5_($dc5_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'validate_dc5_';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'dc5_' => NM_utf8_urldecode($dc5_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_validate_dc5_

    function ajax_form_t_evaluacion_p1_m2_prueba_validate_dc6_($dc6_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'validate_dc6_';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'dc6_' => NM_utf8_urldecode($dc6_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_validate_dc6_

    function ajax_form_t_evaluacion_p1_m2_prueba_validate_dc7_($dc7_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'validate_dc7_';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'dc7_' => NM_utf8_urldecode($dc7_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_validate_dc7_

    function ajax_form_t_evaluacion_p1_m2_prueba_validate_dc8_($dc8_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'validate_dc8_';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'dc8_' => NM_utf8_urldecode($dc8_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_validate_dc8_

    function ajax_form_t_evaluacion_p1_m2_prueba_validate_pcent_dp_($pcent_dp_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'validate_pcent_dp_';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'pcent_dp_' => NM_utf8_urldecode($pcent_dp_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_validate_pcent_dp_

    function ajax_form_t_evaluacion_p1_m2_prueba_validate_dc9_($dc9_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'validate_dc9_';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'dc9_' => NM_utf8_urldecode($dc9_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_validate_dc9_

    function ajax_form_t_evaluacion_p1_m2_prueba_validate_dc10_($dc10_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'validate_dc10_';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'dc10_' => NM_utf8_urldecode($dc10_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_validate_dc10_

    function ajax_form_t_evaluacion_p1_m2_prueba_validate_dc11_($dc11_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'validate_dc11_';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'dc11_' => NM_utf8_urldecode($dc11_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_validate_dc11_

    function ajax_form_t_evaluacion_p1_m2_prueba_validate_dc12_($dc12_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'validate_dc12_';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'dc12_' => NM_utf8_urldecode($dc12_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_validate_dc12_

    function ajax_form_t_evaluacion_p1_m2_prueba_validate_pcent_ds_($pcent_ds_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'validate_pcent_ds_';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'pcent_ds_' => NM_utf8_urldecode($pcent_ds_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_validate_pcent_ds_

    function ajax_form_t_evaluacion_p1_m2_prueba_event_dc10__onblur($dc1_, $dc2_, $dc3_, $dc4_, $dc5_, $dc6_, $dc7_, $dc8_, $dc9_, $dc10_, $dc11_, $dc12_, $pcent_dc_, $pcent_dp_, $pcent_ds_, $eval_1_per_, $script_case_init, $nmgp_refresh_row)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'event_dc10__onblur';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'dc1_' => NM_utf8_urldecode($dc1_),
                  'dc2_' => NM_utf8_urldecode($dc2_),
                  'dc3_' => NM_utf8_urldecode($dc3_),
                  'dc4_' => NM_utf8_urldecode($dc4_),
                  'dc5_' => NM_utf8_urldecode($dc5_),
                  'dc6_' => NM_utf8_urldecode($dc6_),
                  'dc7_' => NM_utf8_urldecode($dc7_),
                  'dc8_' => NM_utf8_urldecode($dc8_),
                  'dc9_' => NM_utf8_urldecode($dc9_),
                  'dc10_' => NM_utf8_urldecode($dc10_),
                  'dc11_' => NM_utf8_urldecode($dc11_),
                  'dc12_' => NM_utf8_urldecode($dc12_),
                  'pcent_dc_' => NM_utf8_urldecode($pcent_dc_),
                  'pcent_dp_' => NM_utf8_urldecode($pcent_dp_),
                  'pcent_ds_' => NM_utf8_urldecode($pcent_ds_),
                  'eval_1_per_' => NM_utf8_urldecode($eval_1_per_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_event_dc10__onblur

    function ajax_form_t_evaluacion_p1_m2_prueba_event_dc11__onblur($dc1_, $dc2_, $dc3_, $dc4_, $dc5_, $dc6_, $dc7_, $dc8_, $dc9_, $dc10_, $dc11_, $dc12_, $pcent_dc_, $pcent_dp_, $pcent_ds_, $eval_1_per_, $script_case_init, $nmgp_refresh_row)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'event_dc11__onblur';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'dc1_' => NM_utf8_urldecode($dc1_),
                  'dc2_' => NM_utf8_urldecode($dc2_),
                  'dc3_' => NM_utf8_urldecode($dc3_),
                  'dc4_' => NM_utf8_urldecode($dc4_),
                  'dc5_' => NM_utf8_urldecode($dc5_),
                  'dc6_' => NM_utf8_urldecode($dc6_),
                  'dc7_' => NM_utf8_urldecode($dc7_),
                  'dc8_' => NM_utf8_urldecode($dc8_),
                  'dc9_' => NM_utf8_urldecode($dc9_),
                  'dc10_' => NM_utf8_urldecode($dc10_),
                  'dc11_' => NM_utf8_urldecode($dc11_),
                  'dc12_' => NM_utf8_urldecode($dc12_),
                  'pcent_dc_' => NM_utf8_urldecode($pcent_dc_),
                  'pcent_dp_' => NM_utf8_urldecode($pcent_dp_),
                  'pcent_ds_' => NM_utf8_urldecode($pcent_ds_),
                  'eval_1_per_' => NM_utf8_urldecode($eval_1_per_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_event_dc11__onblur

    function ajax_form_t_evaluacion_p1_m2_prueba_event_dc12__onblur($dc1_, $dc2_, $dc3_, $dc4_, $dc5_, $dc6_, $dc7_, $dc8_, $dc9_, $dc10_, $dc11_, $dc12_, $pcent_dc_, $pcent_dp_, $pcent_ds_, $eval_1_per_, $script_case_init, $nmgp_refresh_row)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'event_dc12__onblur';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'dc1_' => NM_utf8_urldecode($dc1_),
                  'dc2_' => NM_utf8_urldecode($dc2_),
                  'dc3_' => NM_utf8_urldecode($dc3_),
                  'dc4_' => NM_utf8_urldecode($dc4_),
                  'dc5_' => NM_utf8_urldecode($dc5_),
                  'dc6_' => NM_utf8_urldecode($dc6_),
                  'dc7_' => NM_utf8_urldecode($dc7_),
                  'dc8_' => NM_utf8_urldecode($dc8_),
                  'dc9_' => NM_utf8_urldecode($dc9_),
                  'dc10_' => NM_utf8_urldecode($dc10_),
                  'dc11_' => NM_utf8_urldecode($dc11_),
                  'dc12_' => NM_utf8_urldecode($dc12_),
                  'pcent_dc_' => NM_utf8_urldecode($pcent_dc_),
                  'pcent_dp_' => NM_utf8_urldecode($pcent_dp_),
                  'pcent_ds_' => NM_utf8_urldecode($pcent_ds_),
                  'eval_1_per_' => NM_utf8_urldecode($eval_1_per_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_event_dc12__onblur

    function ajax_form_t_evaluacion_p1_m2_prueba_event_dc1__onblur($dc1_, $dc2_, $dc3_, $dc4_, $dc5_, $dc6_, $dc7_, $dc8_, $dc9_, $dc10_, $dc11_, $dc12_, $pcent_dc_, $pcent_dp_, $pcent_ds_, $eval_1_per_, $script_case_init, $nmgp_refresh_row)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'event_dc1__onblur';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'dc1_' => NM_utf8_urldecode($dc1_),
                  'dc2_' => NM_utf8_urldecode($dc2_),
                  'dc3_' => NM_utf8_urldecode($dc3_),
                  'dc4_' => NM_utf8_urldecode($dc4_),
                  'dc5_' => NM_utf8_urldecode($dc5_),
                  'dc6_' => NM_utf8_urldecode($dc6_),
                  'dc7_' => NM_utf8_urldecode($dc7_),
                  'dc8_' => NM_utf8_urldecode($dc8_),
                  'dc9_' => NM_utf8_urldecode($dc9_),
                  'dc10_' => NM_utf8_urldecode($dc10_),
                  'dc11_' => NM_utf8_urldecode($dc11_),
                  'dc12_' => NM_utf8_urldecode($dc12_),
                  'pcent_dc_' => NM_utf8_urldecode($pcent_dc_),
                  'pcent_dp_' => NM_utf8_urldecode($pcent_dp_),
                  'pcent_ds_' => NM_utf8_urldecode($pcent_ds_),
                  'eval_1_per_' => NM_utf8_urldecode($eval_1_per_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_event_dc1__onblur

    function ajax_form_t_evaluacion_p1_m2_prueba_event_dc2__onblur($dc1_, $dc2_, $dc3_, $dc4_, $dc5_, $dc6_, $dc7_, $dc8_, $dc9_, $dc10_, $dc11_, $dc12_, $pcent_dc_, $pcent_dp_, $pcent_ds_, $eval_1_per_, $script_case_init, $nmgp_refresh_row)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'event_dc2__onblur';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'dc1_' => NM_utf8_urldecode($dc1_),
                  'dc2_' => NM_utf8_urldecode($dc2_),
                  'dc3_' => NM_utf8_urldecode($dc3_),
                  'dc4_' => NM_utf8_urldecode($dc4_),
                  'dc5_' => NM_utf8_urldecode($dc5_),
                  'dc6_' => NM_utf8_urldecode($dc6_),
                  'dc7_' => NM_utf8_urldecode($dc7_),
                  'dc8_' => NM_utf8_urldecode($dc8_),
                  'dc9_' => NM_utf8_urldecode($dc9_),
                  'dc10_' => NM_utf8_urldecode($dc10_),
                  'dc11_' => NM_utf8_urldecode($dc11_),
                  'dc12_' => NM_utf8_urldecode($dc12_),
                  'pcent_dc_' => NM_utf8_urldecode($pcent_dc_),
                  'pcent_dp_' => NM_utf8_urldecode($pcent_dp_),
                  'pcent_ds_' => NM_utf8_urldecode($pcent_ds_),
                  'eval_1_per_' => NM_utf8_urldecode($eval_1_per_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_event_dc2__onblur

    function ajax_form_t_evaluacion_p1_m2_prueba_event_dc3__onblur($dc1_, $dc2_, $dc3_, $dc4_, $dc5_, $dc6_, $dc7_, $dc8_, $dc9_, $dc10_, $dc11_, $dc12_, $pcent_dc_, $pcent_dp_, $pcent_ds_, $eval_1_per_, $script_case_init, $nmgp_refresh_row)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'event_dc3__onblur';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'dc1_' => NM_utf8_urldecode($dc1_),
                  'dc2_' => NM_utf8_urldecode($dc2_),
                  'dc3_' => NM_utf8_urldecode($dc3_),
                  'dc4_' => NM_utf8_urldecode($dc4_),
                  'dc5_' => NM_utf8_urldecode($dc5_),
                  'dc6_' => NM_utf8_urldecode($dc6_),
                  'dc7_' => NM_utf8_urldecode($dc7_),
                  'dc8_' => NM_utf8_urldecode($dc8_),
                  'dc9_' => NM_utf8_urldecode($dc9_),
                  'dc10_' => NM_utf8_urldecode($dc10_),
                  'dc11_' => NM_utf8_urldecode($dc11_),
                  'dc12_' => NM_utf8_urldecode($dc12_),
                  'pcent_dc_' => NM_utf8_urldecode($pcent_dc_),
                  'pcent_dp_' => NM_utf8_urldecode($pcent_dp_),
                  'pcent_ds_' => NM_utf8_urldecode($pcent_ds_),
                  'eval_1_per_' => NM_utf8_urldecode($eval_1_per_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_event_dc3__onblur

    function ajax_form_t_evaluacion_p1_m2_prueba_event_dc4__onblur($dc1_, $dc2_, $dc3_, $dc4_, $dc5_, $dc6_, $dc7_, $dc8_, $dc9_, $dc10_, $dc11_, $dc12_, $pcent_dc_, $pcent_dp_, $pcent_ds_, $eval_1_per_, $script_case_init, $nmgp_refresh_row)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'event_dc4__onblur';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'dc1_' => NM_utf8_urldecode($dc1_),
                  'dc2_' => NM_utf8_urldecode($dc2_),
                  'dc3_' => NM_utf8_urldecode($dc3_),
                  'dc4_' => NM_utf8_urldecode($dc4_),
                  'dc5_' => NM_utf8_urldecode($dc5_),
                  'dc6_' => NM_utf8_urldecode($dc6_),
                  'dc7_' => NM_utf8_urldecode($dc7_),
                  'dc8_' => NM_utf8_urldecode($dc8_),
                  'dc9_' => NM_utf8_urldecode($dc9_),
                  'dc10_' => NM_utf8_urldecode($dc10_),
                  'dc11_' => NM_utf8_urldecode($dc11_),
                  'dc12_' => NM_utf8_urldecode($dc12_),
                  'pcent_dc_' => NM_utf8_urldecode($pcent_dc_),
                  'pcent_dp_' => NM_utf8_urldecode($pcent_dp_),
                  'pcent_ds_' => NM_utf8_urldecode($pcent_ds_),
                  'eval_1_per_' => NM_utf8_urldecode($eval_1_per_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_event_dc4__onblur

    function ajax_form_t_evaluacion_p1_m2_prueba_event_dc5__onblur($dc1_, $dc2_, $dc3_, $dc4_, $dc5_, $dc6_, $dc7_, $dc8_, $dc9_, $dc10_, $dc11_, $dc12_, $pcent_dc_, $pcent_dp_, $pcent_ds_, $eval_1_per_, $script_case_init, $nmgp_refresh_row)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'event_dc5__onblur';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'dc1_' => NM_utf8_urldecode($dc1_),
                  'dc2_' => NM_utf8_urldecode($dc2_),
                  'dc3_' => NM_utf8_urldecode($dc3_),
                  'dc4_' => NM_utf8_urldecode($dc4_),
                  'dc5_' => NM_utf8_urldecode($dc5_),
                  'dc6_' => NM_utf8_urldecode($dc6_),
                  'dc7_' => NM_utf8_urldecode($dc7_),
                  'dc8_' => NM_utf8_urldecode($dc8_),
                  'dc9_' => NM_utf8_urldecode($dc9_),
                  'dc10_' => NM_utf8_urldecode($dc10_),
                  'dc11_' => NM_utf8_urldecode($dc11_),
                  'dc12_' => NM_utf8_urldecode($dc12_),
                  'pcent_dc_' => NM_utf8_urldecode($pcent_dc_),
                  'pcent_dp_' => NM_utf8_urldecode($pcent_dp_),
                  'pcent_ds_' => NM_utf8_urldecode($pcent_ds_),
                  'eval_1_per_' => NM_utf8_urldecode($eval_1_per_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_event_dc5__onblur

    function ajax_form_t_evaluacion_p1_m2_prueba_event_dc6__onblur($dc1_, $dc2_, $dc3_, $dc4_, $dc5_, $dc6_, $dc7_, $dc8_, $dc9_, $dc10_, $dc11_, $dc12_, $pcent_dc_, $pcent_dp_, $pcent_ds_, $eval_1_per_, $script_case_init, $nmgp_refresh_row)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'event_dc6__onblur';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'dc1_' => NM_utf8_urldecode($dc1_),
                  'dc2_' => NM_utf8_urldecode($dc2_),
                  'dc3_' => NM_utf8_urldecode($dc3_),
                  'dc4_' => NM_utf8_urldecode($dc4_),
                  'dc5_' => NM_utf8_urldecode($dc5_),
                  'dc6_' => NM_utf8_urldecode($dc6_),
                  'dc7_' => NM_utf8_urldecode($dc7_),
                  'dc8_' => NM_utf8_urldecode($dc8_),
                  'dc9_' => NM_utf8_urldecode($dc9_),
                  'dc10_' => NM_utf8_urldecode($dc10_),
                  'dc11_' => NM_utf8_urldecode($dc11_),
                  'dc12_' => NM_utf8_urldecode($dc12_),
                  'pcent_dc_' => NM_utf8_urldecode($pcent_dc_),
                  'pcent_dp_' => NM_utf8_urldecode($pcent_dp_),
                  'pcent_ds_' => NM_utf8_urldecode($pcent_ds_),
                  'eval_1_per_' => NM_utf8_urldecode($eval_1_per_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_event_dc6__onblur

    function ajax_form_t_evaluacion_p1_m2_prueba_event_dc7__onblur($dc1_, $dc2_, $dc3_, $dc4_, $dc5_, $dc6_, $dc7_, $dc8_, $dc9_, $dc10_, $dc11_, $dc12_, $pcent_dc_, $pcent_dp_, $pcent_ds_, $eval_1_per_, $script_case_init, $nmgp_refresh_row)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'event_dc7__onblur';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'dc1_' => NM_utf8_urldecode($dc1_),
                  'dc2_' => NM_utf8_urldecode($dc2_),
                  'dc3_' => NM_utf8_urldecode($dc3_),
                  'dc4_' => NM_utf8_urldecode($dc4_),
                  'dc5_' => NM_utf8_urldecode($dc5_),
                  'dc6_' => NM_utf8_urldecode($dc6_),
                  'dc7_' => NM_utf8_urldecode($dc7_),
                  'dc8_' => NM_utf8_urldecode($dc8_),
                  'dc9_' => NM_utf8_urldecode($dc9_),
                  'dc10_' => NM_utf8_urldecode($dc10_),
                  'dc11_' => NM_utf8_urldecode($dc11_),
                  'dc12_' => NM_utf8_urldecode($dc12_),
                  'pcent_dc_' => NM_utf8_urldecode($pcent_dc_),
                  'pcent_dp_' => NM_utf8_urldecode($pcent_dp_),
                  'pcent_ds_' => NM_utf8_urldecode($pcent_ds_),
                  'eval_1_per_' => NM_utf8_urldecode($eval_1_per_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_event_dc7__onblur

    function ajax_form_t_evaluacion_p1_m2_prueba_event_dc8__onblur($dc1_, $dc2_, $dc3_, $dc4_, $dc5_, $dc6_, $dc7_, $dc8_, $dc9_, $dc10_, $dc11_, $dc12_, $pcent_dc_, $pcent_dp_, $pcent_ds_, $eval_1_per_, $script_case_init, $nmgp_refresh_row)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'event_dc8__onblur';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'dc1_' => NM_utf8_urldecode($dc1_),
                  'dc2_' => NM_utf8_urldecode($dc2_),
                  'dc3_' => NM_utf8_urldecode($dc3_),
                  'dc4_' => NM_utf8_urldecode($dc4_),
                  'dc5_' => NM_utf8_urldecode($dc5_),
                  'dc6_' => NM_utf8_urldecode($dc6_),
                  'dc7_' => NM_utf8_urldecode($dc7_),
                  'dc8_' => NM_utf8_urldecode($dc8_),
                  'dc9_' => NM_utf8_urldecode($dc9_),
                  'dc10_' => NM_utf8_urldecode($dc10_),
                  'dc11_' => NM_utf8_urldecode($dc11_),
                  'dc12_' => NM_utf8_urldecode($dc12_),
                  'pcent_dc_' => NM_utf8_urldecode($pcent_dc_),
                  'pcent_dp_' => NM_utf8_urldecode($pcent_dp_),
                  'pcent_ds_' => NM_utf8_urldecode($pcent_ds_),
                  'eval_1_per_' => NM_utf8_urldecode($eval_1_per_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_event_dc8__onblur

    function ajax_form_t_evaluacion_p1_m2_prueba_event_dc9__onblur($dc1_, $dc2_, $dc3_, $dc4_, $dc5_, $dc6_, $dc7_, $dc8_, $dc9_, $dc10_, $dc11_, $dc12_, $pcent_dc_, $pcent_dp_, $pcent_ds_, $eval_1_per_, $script_case_init, $nmgp_refresh_row)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'event_dc9__onblur';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'dc1_' => NM_utf8_urldecode($dc1_),
                  'dc2_' => NM_utf8_urldecode($dc2_),
                  'dc3_' => NM_utf8_urldecode($dc3_),
                  'dc4_' => NM_utf8_urldecode($dc4_),
                  'dc5_' => NM_utf8_urldecode($dc5_),
                  'dc6_' => NM_utf8_urldecode($dc6_),
                  'dc7_' => NM_utf8_urldecode($dc7_),
                  'dc8_' => NM_utf8_urldecode($dc8_),
                  'dc9_' => NM_utf8_urldecode($dc9_),
                  'dc10_' => NM_utf8_urldecode($dc10_),
                  'dc11_' => NM_utf8_urldecode($dc11_),
                  'dc12_' => NM_utf8_urldecode($dc12_),
                  'pcent_dc_' => NM_utf8_urldecode($pcent_dc_),
                  'pcent_dp_' => NM_utf8_urldecode($pcent_dp_),
                  'pcent_ds_' => NM_utf8_urldecode($pcent_ds_),
                  'eval_1_per_' => NM_utf8_urldecode($eval_1_per_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_event_dc9__onblur

    function ajax_form_t_evaluacion_p1_m2_prueba_submit_form($id_estudiante_, $estatus_, $novedad_, $asienta_inasistencias_, $inasistencia_p1_, $eval_1_per_, $dc1_, $dc2_, $dc3_, $dc4_, $pcent_dc_, $dc5_, $dc6_, $dc7_, $dc8_, $pcent_dp_, $dc9_, $dc10_, $dc11_, $dc12_, $pcent_ds_, $nmgp_refresh_row, $nm_form_submit, $nmgp_url_saida, $nmgp_opcao, $nmgp_ancora, $nmgp_num_form, $nmgp_parms, $script_case_init, $csrf_token)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'submit_form';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'id_estudiante_' => NM_utf8_urldecode($id_estudiante_),
                  'estatus_' => NM_utf8_urldecode($estatus_),
                  'novedad_' => NM_utf8_urldecode($novedad_),
                  'asienta_inasistencias_' => NM_utf8_urldecode($asienta_inasistencias_),
                  'inasistencia_p1_' => NM_utf8_urldecode($inasistencia_p1_),
                  'eval_1_per_' => NM_utf8_urldecode($eval_1_per_),
                  'dc1_' => NM_utf8_urldecode($dc1_),
                  'dc2_' => NM_utf8_urldecode($dc2_),
                  'dc3_' => NM_utf8_urldecode($dc3_),
                  'dc4_' => NM_utf8_urldecode($dc4_),
                  'pcent_dc_' => NM_utf8_urldecode($pcent_dc_),
                  'dc5_' => NM_utf8_urldecode($dc5_),
                  'dc6_' => NM_utf8_urldecode($dc6_),
                  'dc7_' => NM_utf8_urldecode($dc7_),
                  'dc8_' => NM_utf8_urldecode($dc8_),
                  'pcent_dp_' => NM_utf8_urldecode($pcent_dp_),
                  'dc9_' => NM_utf8_urldecode($dc9_),
                  'dc10_' => NM_utf8_urldecode($dc10_),
                  'dc11_' => NM_utf8_urldecode($dc11_),
                  'dc12_' => NM_utf8_urldecode($dc12_),
                  'pcent_ds_' => NM_utf8_urldecode($pcent_ds_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
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
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_submit_form

    function ajax_form_t_evaluacion_p1_m2_prueba_navigate_form($id_estudiante_, $id_grupo_, $id_asignatura_, $nm_form_submit, $nmgp_opcao, $nmgp_ordem, $nmgp_arg_dyn_search, $script_case_init)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'navigate_form';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'id_estudiante_' => NM_utf8_urldecode($id_estudiante_),
                  'id_grupo_' => NM_utf8_urldecode($id_grupo_),
                  'id_asignatura_' => NM_utf8_urldecode($id_asignatura_),
                  'nm_form_submit' => NM_utf8_urldecode($nm_form_submit),
                  'nmgp_opcao' => NM_utf8_urldecode($nmgp_opcao),
                  'nmgp_ordem' => NM_utf8_urldecode($nmgp_ordem),
                  'nmgp_arg_dyn_search' => NM_utf8_urldecode($nmgp_arg_dyn_search),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_navigate_form

    function ajax_form_t_evaluacion_p1_m2_prueba_add_new_line($sc_clone, $sc_seq_clone, $sc_seq_vert, $script_case_init)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'add_new_line';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'sc_clone' => NM_utf8_urldecode($sc_clone),
                  'sc_seq_clone' => NM_utf8_urldecode($sc_seq_clone),
                  'sc_seq_vert' => NM_utf8_urldecode($sc_seq_vert),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_add_new_line

    function ajax_form_t_evaluacion_p1_m2_prueba_backup_line($id_estudiante_, $id_grupo_, $id_asignatura_, $nmgp_refresh_row, $nm_form_submit, $script_case_init)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'backup_line';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'id_estudiante_' => NM_utf8_urldecode($id_estudiante_),
                  'id_grupo_' => NM_utf8_urldecode($id_grupo_),
                  'id_asignatura_' => NM_utf8_urldecode($id_asignatura_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'nm_form_submit' => NM_utf8_urldecode($nm_form_submit),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_backup_line

    function ajax_form_t_evaluacion_p1_m2_prueba_table_refresh($id_estudiante_, $id_grupo_, $id_asignatura_, $nm_form_submit, $nmgp_opcao, $nmgp_ordem, $nmgp_fast_search, $nmgp_cond_fast_search, $nmgp_arg_fast_search, $nmgp_arg_dyn_search, $script_case_init)
    {
        global $inicial_form_t_evaluacion_p1_m2_prueba;
        //register_shutdown_function("form_t_evaluacion_p1_m2_prueba_pack_ajax_response");
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao         = 'table_refresh';
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param'] = array(
                  'id_estudiante_' => NM_utf8_urldecode($id_estudiante_),
                  'id_grupo_' => NM_utf8_urldecode($id_grupo_),
                  'id_asignatura_' => NM_utf8_urldecode($id_asignatura_),
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
        if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->controle();
        exit;
    } // ajax_table_refresh


   function form_t_evaluacion_p1_m2_prueba_pack_ajax_response()
   {
      global $inicial_form_t_evaluacion_p1_m2_prueba;
      $aResp = array();

      if (isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['empty_filter']))
      {
          $aResp['empty_filter'] = $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['empty_filter'];
      }
      if (isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['dyn_search']['NM_Dynamic_Search']))
      {
          $aResp['dyn_search']['NM_Dynamic_Search'] = $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['dyn_search']['NM_Dynamic_Search'];
      }
      if (isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['dyn_search']['id_dyn_search_cmd_str']))
      {
          $aResp['dyn_search']['id_dyn_search_cmd_str'] = $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['dyn_search']['id_dyn_search_cmd_str'];
      }
      if ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['calendarReload'])
      {
         $aResp['result'] = 'CALENDARRELOAD';
      }
      elseif ('' != $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['autoComp'])
      {
         $aResp['result'] = 'AUTOCOMP';
      }
//mestre_detalhe
      elseif (!empty($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['newline']))
      {
         $aResp['result'] = 'NEWLINE';
         ob_end_clean();
      }
      elseif (!empty($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['tableRefresh']))
      {
         $aResp['result'] = 'TABLEREFRESH';
      }
//-----
      elseif (!empty($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['errList']))
      {
         $aResp['result'] = 'ERROR';
      }
      elseif (!empty($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['fldList']))
      {
         $aResp['result'] = 'SET';
      }
      else
      {
         $aResp['result'] = 'OK';
      }
      if ('AUTOCOMP' == $aResp['result'])
      {
         $aResp = $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['autoComp'];
      }
//mestre_detalhe
      elseif ('NEWLINE' == $aResp['result'])
      {
         $aResp = $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['newline'];
      }
      else
//-----
      {
         $aResp['ajaxRequest'] = $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_opcao;
         if ('CALENDARRELOAD' == $aResp['result'])
         {
            form_t_evaluacion_p1_m2_prueba_pack_calendar_reload($aResp);
         }
         elseif ('ERROR' == $aResp['result'])
         {
            form_t_evaluacion_p1_m2_prueba_pack_ajax_errors($aResp);
         }
         elseif ('SET' == $aResp['result'])
         {
            form_t_evaluacion_p1_m2_prueba_pack_ajax_set_fields($aResp);
         }
         elseif ('TABLEREFRESH' == $aResp['result'])
         {
            form_t_evaluacion_p1_m2_prueba_pack_ajax_set_fields($aResp);
            $aResp['tableRefresh'] = form_t_evaluacion_p1_m2_prueba_pack_protect_string($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['tableRefresh']);
         }
         if ('OK' == $aResp['result'] || 'SET' == $aResp['result'])
         {
            form_t_evaluacion_p1_m2_prueba_pack_ajax_ok($aResp);
         }
         if (isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['focus']) && '' != $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['focus'])
         {
            $aResp['setFocus'] = $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['focus'];
         }
         if (isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['closeLine']) && '' != $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['closeLine'])
         {
            $aResp['closeLine'] = $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['closeLine'];
         }
         else
         {
            $aResp['closeLine'] = 'N';
         }
         if (isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['clearUpload']) && '' != $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['clearUpload'])
         {
            $aResp['clearUpload'] = $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['clearUpload'];
         }
         else
         {
            $aResp['clearUpload'] = 'N';
         }
         if (isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['masterValue']) && '' != $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['masterValue'])
         {
            form_t_evaluacion_p1_m2_prueba_pack_master_value($aResp);
         }
         if (isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxAlert']) && '' != $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxAlert'])
         {
            form_t_evaluacion_p1_m2_prueba_pack_ajax_alert($aResp);
         }
         if (isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxMessage']) && '' != $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxMessage'])
         {
            form_t_evaluacion_p1_m2_prueba_pack_ajax_message($aResp);
         }
         if (isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxJavascript']) && '' != $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxJavascript'])
         {
            form_t_evaluacion_p1_m2_prueba_pack_ajax_javascript($aResp);
         }
         if (isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['redir']) && !empty($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['redir']))
         {
            form_t_evaluacion_p1_m2_prueba_pack_ajax_redir($aResp);
         }
         if (isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['redirExit']) && !empty($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['redirExit']))
         {
            form_t_evaluacion_p1_m2_prueba_pack_ajax_redir_exit($aResp);
         }
         if (isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['blockDisplay']) && !empty($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['blockDisplay']))
         {
            form_t_evaluacion_p1_m2_prueba_pack_ajax_block_display($aResp);
         }
         if (isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['fieldDisplay']) && !empty($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['fieldDisplay']))
         {
            form_t_evaluacion_p1_m2_prueba_pack_ajax_field_display($aResp);
         }
         if (isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['buttonDisplay']) && !empty($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['buttonDisplay']))
         {
            $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['buttonDisplay'] = $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->nmgp_botoes;
            form_t_evaluacion_p1_m2_prueba_pack_ajax_button_display($aResp);
         }
         if (isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['fieldLabel']) && !empty($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['fieldLabel']))
         {
            form_t_evaluacion_p1_m2_prueba_pack_ajax_field_label($aResp);
         }
         if (isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['readOnly']) && !empty($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['readOnly']))
         {
            form_t_evaluacion_p1_m2_prueba_pack_ajax_readonly($aResp);
         }
         if (isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['navStatus']) && !empty($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['navStatus']))
         {
            form_t_evaluacion_p1_m2_prueba_pack_ajax_nav_status($aResp);
         }
         if (isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['navSummary']) && !empty($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['navSummary']))
         {
            form_t_evaluacion_p1_m2_prueba_pack_ajax_nav_Summary($aResp);
         }
         if (isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['navPage']))
         {
            form_t_evaluacion_p1_m2_prueba_pack_ajax_navPage($aResp);
         }
         if (isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['btnVars']) && !empty($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['btnVars']))
         {
            form_t_evaluacion_p1_m2_prueba_pack_ajax_btn_vars($aResp);
         }
         if (isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['quickSearchRes']) && $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['quickSearchRes'])
         {
            $aResp['quickSearchRes'] = 'Y';
         }
         else
         {
            $aResp['quickSearchRes'] = 'N';
         }
         $aResp['htmOutput'] = '';
    
         if (isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output']) && $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['buffer_output'])
         {
            $aResp['htmOutput'] = ob_get_contents();
            if (false === $aResp['htmOutput'])
            {
               $aResp['htmOutput'] = '';
            }
            else
            {
               $aResp['htmOutput'] = form_t_evaluacion_p1_m2_prueba_pack_protect_string(NM_charset_to_utf8($aResp['htmOutput']));
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
   } // form_t_evaluacion_p1_m2_prueba_pack_ajax_response

   function form_t_evaluacion_p1_m2_prueba_pack_calendar_reload(&$aResp)
   {
      global $inicial_form_t_evaluacion_p1_m2_prueba;
      $aResp['calendarReload'] = 'OK';
   } // form_t_evaluacion_p1_m2_prueba_pack_calendar_reload

   function form_t_evaluacion_p1_m2_prueba_pack_ajax_errors(&$aResp)
   {
      global $inicial_form_t_evaluacion_p1_m2_prueba;
      $aResp['errList'] = array();
      foreach ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['errList'] as $sField => $aMsg)
      {
         if ('geral_form_t_evaluacion_p1_m2_prueba' == $sField)
         {
             $aMsg = form_t_evaluacion_p1_m2_prueba_pack_ajax_remove_erros($aMsg);
         }
         foreach ($aMsg as $sMsg)
         {
            $iNumLinha = (isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['nmgp_refresh_row']) && 'geral_form_t_evaluacion_p1_m2_prueba' != $sField)
                       ? $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['nmgp_refresh_row'] : "";
            $aResp['errList'][] = array('fldName'  => $sField,
                                        'msgText'  => form_t_evaluacion_p1_m2_prueba_pack_protect_string(NM_charset_to_utf8($sMsg)),
                                        'numLinha' => $iNumLinha);
         }
      }
   } // form_t_evaluacion_p1_m2_prueba_pack_ajax_errors

   function form_t_evaluacion_p1_m2_prueba_pack_ajax_remove_erros($aErrors)
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
   } // form_t_evaluacion_p1_m2_prueba_pack_ajax_remove_erros

   function form_t_evaluacion_p1_m2_prueba_pack_ajax_ok(&$aResp)
   {
      global $inicial_form_t_evaluacion_p1_m2_prueba;
      $iNumLinha = (isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      $aResp['msgDisplay'] = array('msgText'  => form_t_evaluacion_p1_m2_prueba_pack_protect_string($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['msgDisplay']),
                                   'numLinha' => $iNumLinha);
   } // form_t_evaluacion_p1_m2_prueba_pack_ajax_ok

   function form_t_evaluacion_p1_m2_prueba_pack_ajax_set_fields(&$aResp)
   {
      global $inicial_form_t_evaluacion_p1_m2_prueba;
      $iNumLinha = (isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      if ('' != $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['rsSize'])
      {
         $aResp['rsSize'] = $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['rsSize'];
      }
      $aResp['fldList'] = array();
      foreach ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['fldList'] as $sField => $aData)
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
            $aField['imgFile'] = form_t_evaluacion_p1_m2_prueba_pack_protect_string($aData['imgFile']);
         }
         if (isset($aData['imgOrig']))
         {
            $aField['imgOrig'] = form_t_evaluacion_p1_m2_prueba_pack_protect_string($aData['imgOrig']);
         }
         if (isset($aData['imgLink']))
         {
            $aField['imgLink'] = form_t_evaluacion_p1_m2_prueba_pack_protect_string($aData['imgLink']);
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
            $aField['docLink'] = form_t_evaluacion_p1_m2_prueba_pack_protect_string($aData['docLink']);
         }
         if (isset($aData['docIcon']))
         {
            $aField['docIcon'] = form_t_evaluacion_p1_m2_prueba_pack_protect_string($aData['docIcon']);
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
            $aField['imgHtml'] = form_t_evaluacion_p1_m2_prueba_pack_protect_string($aData['imgHtml']);
         }
         if (isset($aData['mulHtml']))
         {
            $aField['mulHtml'] = form_t_evaluacion_p1_m2_prueba_pack_protect_string($aData['mulHtml']);
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
               $aValue['label'] = form_t_evaluacion_p1_m2_prueba_pack_protect_string($aData['labList'][$iIndex]);
            }
            $aValue['value']     = ('_autocomp' != substr($sField, -9)) ? form_t_evaluacion_p1_m2_prueba_pack_protect_string($sValue) : $sValue;
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
                     $aField['optList'][] = array('value' => form_t_evaluacion_p1_m2_prueba_pack_protect_string($sOpt),
                                                  'label' => form_t_evaluacion_p1_m2_prueba_pack_protect_string($sLabel));
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
   } // form_t_evaluacion_p1_m2_prueba_pack_ajax_set_fields

   function form_t_evaluacion_p1_m2_prueba_pack_ajax_redir(&$aResp)
   {
      global $inicial_form_t_evaluacion_p1_m2_prueba;
      $aInfo              = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init', 'script_case_session', 'h_modal', 'w_modal');
      $aResp['redirInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['redir'][$sTag]))
         {
            $aResp['redirInfo'][$sTag] = $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['redir'][$sTag];
         }
      }
   } // form_t_evaluacion_p1_m2_prueba_pack_ajax_redir

   function form_t_evaluacion_p1_m2_prueba_pack_ajax_redir_exit(&$aResp)
   {
      global $inicial_form_t_evaluacion_p1_m2_prueba;
      $aInfo                  = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init', 'script_case_session');
      $aResp['redirExitInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['redirExit'][$sTag]))
         {
            $aResp['redirExitInfo'][$sTag] = $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['redirExit'][$sTag];
         }
      }
   } // form_t_evaluacion_p1_m2_prueba_pack_ajax_redir_exit

   function form_t_evaluacion_p1_m2_prueba_pack_master_value(&$aResp)
   {
      global $inicial_form_t_evaluacion_p1_m2_prueba;
      foreach ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['masterValue'] as $sIndex => $sValue)
      {
         $aResp['masterValue'][] = array('index' => $sIndex,
                                         'value' => $sValue);
      }
   } // form_t_evaluacion_p1_m2_prueba_pack_master_value

   function form_t_evaluacion_p1_m2_prueba_pack_ajax_alert(&$aResp)
   {
      global $inicial_form_t_evaluacion_p1_m2_prueba;
      $aResp['ajaxAlert'] = array('message' => $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxAlert']['message']);
   } // form_t_evaluacion_p1_m2_prueba_pack_ajax_alert

   function form_t_evaluacion_p1_m2_prueba_pack_ajax_message(&$aResp)
   {
      global $inicial_form_t_evaluacion_p1_m2_prueba;
      $aResp['ajaxMessage'] = array('message'      => form_t_evaluacion_p1_m2_prueba_pack_protect_string($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxMessage']['message']),
                                    'title'        => form_t_evaluacion_p1_m2_prueba_pack_protect_string($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxMessage']['title']),
                                    'modal'        => isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxMessage']['modal'])        ? $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxMessage']['modal']        : 'N',
                                    'timeout'      => isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxMessage']['timeout'])      ? $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxMessage']['timeout']      : '',
                                    'button'       => isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxMessage']['button'])       ? $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxMessage']['button']       : '',
                                    'button_label' => isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxMessage']['button_label']) ? $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxMessage']['button_label'] : 'Ok',
                                    'top'          => isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxMessage']['top'])          ? $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxMessage']['top']          : '',
                                    'left'         => isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxMessage']['left'])         ? $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxMessage']['left']         : '',
                                    'width'        => isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxMessage']['width'])        ? $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxMessage']['width']        : '',
                                    'height'       => isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxMessage']['height'])       ? $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxMessage']['height']       : '',
                                    'redir'        => isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxMessage']['redir'])        ? $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxMessage']['redir']        : '',
                                    'show_close'   => isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxMessage']['show_close'])   ? $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxMessage']['show_close']   : 'Y',
                                    'body_icon'    => isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxMessage']['body_icon'])    ? $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxMessage']['body_icon']    : 'Y',
                                    'redir_target' => isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxMessage']['redir_target']) ? $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxMessage']['redir_target'] : '',
                                    'redir_par'    => isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxMessage']['redir_par'])    ? $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxMessage']['redir_par']    : '');
   } // form_t_evaluacion_p1_m2_prueba_pack_ajax_message

   function form_t_evaluacion_p1_m2_prueba_pack_ajax_javascript(&$aResp)
   {
      global $inicial_form_t_evaluacion_p1_m2_prueba;
      foreach ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['ajaxJavascript'] as $aJsFunc)
      {
         $aResp['ajaxJavascript'][] = $aJsFunc;
      }
   } // form_t_evaluacion_p1_m2_prueba_pack_ajax_javascript

   function form_t_evaluacion_p1_m2_prueba_pack_ajax_block_display(&$aResp)
   {
      global $inicial_form_t_evaluacion_p1_m2_prueba;
      $aResp['blockDisplay'] = array();
      foreach ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['blockDisplay'] as $sBlockName => $sBlockStatus)
      {
        $aResp['blockDisplay'][] = array($sBlockName, $sBlockStatus);
      }
   } // form_t_evaluacion_p1_m2_prueba_pack_ajax_block_display

   function form_t_evaluacion_p1_m2_prueba_pack_ajax_field_display(&$aResp)
   {
      global $inicial_form_t_evaluacion_p1_m2_prueba;
      $aResp['fieldDisplay'] = array();
      foreach ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['fieldDisplay'] as $sFieldName => $sFieldStatus)
      {
        $aResp['fieldDisplay'][] = array($sFieldName, $sFieldStatus);
      }
   } // form_t_evaluacion_p1_m2_prueba_pack_ajax_field_display

   function form_t_evaluacion_p1_m2_prueba_pack_ajax_button_display(&$aResp)
   {
      global $inicial_form_t_evaluacion_p1_m2_prueba;
      $aResp['buttonDisplay'] = array();
      foreach ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['buttonDisplay'] as $sButtonName => $sButtonStatus)
      {
        $aResp['buttonDisplay'][] = array($sButtonName, $sButtonStatus);
      }
   } // form_t_evaluacion_p1_m2_prueba_pack_ajax_button_display

   function form_t_evaluacion_p1_m2_prueba_pack_ajax_field_label(&$aResp)
   {
      global $inicial_form_t_evaluacion_p1_m2_prueba;
      $aResp['fieldLabel'] = array();
      foreach ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['fieldLabel'] as $sFieldName => $sFieldLabel)
      {
        $aResp['fieldLabel'][] = array($sFieldName, form_t_evaluacion_p1_m2_prueba_pack_protect_string($sFieldLabel));
      }
   } // form_t_evaluacion_p1_m2_prueba_pack_ajax_field_label

   function form_t_evaluacion_p1_m2_prueba_pack_ajax_readonly(&$aResp)
   {
      global $inicial_form_t_evaluacion_p1_m2_prueba;
      $aResp['readOnly'] = array();
      foreach ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['readOnly'] as $sFieldName => $sFieldStatus)
      {
        $aResp['readOnly'][] = array($sFieldName, $sFieldStatus);
      }
   } // form_t_evaluacion_p1_m2_prueba_pack_ajax_readonly

   function form_t_evaluacion_p1_m2_prueba_pack_ajax_nav_status(&$aResp)
   {
      global $inicial_form_t_evaluacion_p1_m2_prueba;
      $aResp['navStatus'] = array();
      if (isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['navStatus']['ret']) && '' != $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['navStatus']['ret'])
      {
         $aResp['navStatus']['ret'] = $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['navStatus']['ret'];
      }
      if (isset($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['navStatus']['ava']) && '' != $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['navStatus']['ava'])
      {
         $aResp['navStatus']['ava'] = $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['navStatus']['ava'];
      }
   } // form_t_evaluacion_p1_m2_prueba_pack_ajax_nav_status

   function form_t_evaluacion_p1_m2_prueba_pack_ajax_nav_Summary(&$aResp)
   {
      global $inicial_form_t_evaluacion_p1_m2_prueba;
      $aResp['navSummary'] = array();
      $aResp['navSummary']['reg_ini'] = $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['navSummary']['reg_ini'];
      $aResp['navSummary']['reg_qtd'] = $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['navSummary']['reg_qtd'];
      $aResp['navSummary']['reg_tot'] = $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['navSummary']['reg_tot'];
   } // form_t_evaluacion_p1_m2_prueba_pack_ajax_nav_Summary

   function form_t_evaluacion_p1_m2_prueba_pack_ajax_navPage(&$aResp)
   {
      global $inicial_form_t_evaluacion_p1_m2_prueba;
      $aResp['navPage'] = $inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['navPage'];
   } // form_t_evaluacion_p1_m2_prueba_pack_ajax_navPage


   function form_t_evaluacion_p1_m2_prueba_pack_ajax_btn_vars(&$aResp)
   {
      global $inicial_form_t_evaluacion_p1_m2_prueba;
      $aResp['btnVars'] = array();
      foreach ($inicial_form_t_evaluacion_p1_m2_prueba->contr_form_t_evaluacion_p1_m2_prueba->NM_ajax_info['btnVars'] as $sBtnName => $sBtnValue)
      {
        $aResp['btnVars'][] = array($sBtnName, form_t_evaluacion_p1_m2_prueba_pack_protect_string($sBtnValue));
      }
   } // form_t_evaluacion_p1_m2_prueba_pack_ajax_btn_vars

   function form_t_evaluacion_p1_m2_prueba_pack_protect_string($sString)
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
   } // form_t_evaluacion_p1_m2_prueba_pack_protect_string
?>
