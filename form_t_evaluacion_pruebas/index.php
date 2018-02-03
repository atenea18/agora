<?php
//
   include_once('form_t_evaluacion_pruebas_session.php');
   @session_start() ;
   $_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_nm_perfil']          = "conn_mysql";
   $_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_nm_path_prod']       = "";
   $_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_nm_path_imagens']    = "";
   $_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_nm_path_imag_temp']  = "";
   $_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_nm_path_doc']        = "";
//
class form_t_evaluacion_pruebas_ini
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
      $_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_pruebas']['decimal_db'] = "."; 

      $this->nm_cod_apl      = "form_t_evaluacion_pruebas"; 
      $this->nm_nome_apl     = ""; 
      $this->nm_seguranca    = ""; 
      $this->nm_grupo        = "agora_IV"; 
      $this->nm_grupo_versao = "1"; 
      $this->nm_autor        = "admin"; 
      $this->nm_versao_sc    = "v8"; 
      $this->nm_tp_lic_sc    = "pe_mysql_bronze"; 
      $this->nm_dt_criacao   = "20170331"; 
      $this->nm_hr_criacao   = "071837"; 
      $this->nm_autor_alt    = "admin"; 
      $this->nm_dt_ult_alt   = "20170331"; 
      $this->nm_hr_ult_alt   = "072015"; 
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
      if(empty($_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_nm_path_prod']))
      {
              /*check prod*/$_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
      }
      //check img
      if(empty($_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_nm_path_imagens']))
      {
              /*check img*/$_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
      }
      //check tmp
      if(empty($_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_nm_path_imag_temp']))
      {
              /*check tmp*/$_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
      }
      //check doc
      if(empty($_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_nm_path_doc']))
      {
              /*check doc*/$_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
      }
      //end check publication with the prod
// 
      $this->sc_site_ssl     = (isset($_SERVER['HTTP_REFERER']) && strtolower(substr($_SERVER['HTTP_REFERER'], 0, 5)) == 'https') ? true : false;
      $this->sc_protocolo    = ($this->sc_site_ssl) ? 'https://' : 'http://';
      $this->path_prod       = $_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_nm_path_prod'];
      $this->path_imagens    = $_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_nm_path_imag_temp'];
      $this->path_doc        = $_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_nm_path_doc'];
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
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/form_t_evaluacion_pruebas';
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

      global $inicial_form_t_evaluacion_pruebas;
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
                  if (isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag) && $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag)
                  {
                      $inicial_form_t_evaluacion_pruebas->contr_->NM_ajax_info['redir']['action']  = $nm_apl_dest;
                      $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['redir']['target']  = $parms['T'];
                      $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['redir']['metodo']  = "post";
                      $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['redir']['script_case_init']  = $this->sc_page;
                      $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['redir']['script_case_session']  = session_id();
                      form_t_evaluacion_pruebas_pack_ajax_response();
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
          unset($_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_nm_conexao']);
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
      $_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_pruebas']['path_doc'] = $this->path_doc; 
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
          if (!$_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['sc_outra_jan']) || $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['sc_outra_jan'] != 'form_t_evaluacion_pruebas')) 
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

      $this->nm_cont_lin       = 0;
      $this->nm_limite_lin     = 0;
      $this->nm_limite_lin_prt = 0;
// 
      include_once($this->path_adodb . "/adodb.inc.php"); 
      $this->sc_Include($this->path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
      $this->sc_Include($this->path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
      if(function_exists('set_php_timezone'))  set_php_timezone('form_t_evaluacion_pruebas'); 
      $this->sc_Include($this->path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->sc_Include($this->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      $this->sc_Include($this->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->sc_Include($this->path_lib_php . "/nm_functions.php", "", "") ; 
      $this->nm_data = new nm_data("es");
      global $inicial_form_t_evaluacion_pruebas, $NM_run_iframe;
      if ((isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag) && $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag) || (isset($_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_pruebas']['embutida_call']) && $_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_pruebas']['embutida_call']) || $NM_run_iframe == 1)
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
      $_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1DcXGH9BiZ1rwHQJsHuzGVcBUDuX7VoX7DcNmZ1FaHABYZMJwDMvCHErsDWX7HIJsD9XsZ9JeD1BeD5F7DMvmVcBUDWJeHMBiD9BsVIraD1rwV5X7HgBeHEFiDWXCHMJeD9XsZSX7D1NKVWXGHgrwVIBODuB7VEX7HQNmH9BqHArKV5FUDMrYZSXeV5FqHIJsD9NwDQJsHABYV5raHuNOVcFCHEFYVoFGD9XOZ1B/HIrwD5BiDMBYVkJGDWr/DoB/D9XsH9FGDSN7D5JwDMvmVcFKV5BmVoBqD9BsZkFGHAvsD5FaDMzGVkXeV5FaDoJeD9XsDQFUZ1rwVWJsHgrYDkBODWFYVErqDcBqZ1B/HIrwZMFaDMBYHEXeH5FYVoXGD9XsZSX7Z1N7V5raHuzGVcrsDWJeVEraDcJUZ1B/HAN7D5NUDErKDkBsV5XCDoBOD9JKDQJwHAveHuFaHuNOZSrCH5FqDoXGHQJmZ1BiHIBeZMFaDMvCZSJGDWF/VoBOHQNmDQFaHABYHuBOHuzGVcFeDWFYHMrqDcBqZ1BOHAN7D5NUHgBeHEFiV5B3DoF7D9XsDuFaHAveHQXGDMvsVIBsH5XKVEFGHQBsVIJsHANOHQFUHgvCHArCDWr/HMFaHQJKDuFaZ1BYHuB/DMrwV9BUH5XCHIrqDcFYH9BODSrYHuX7HgvCHArCV5FqHMX7HQFYZ9F7HANOHQB/HgNKDkBODuFqDoFGDcBqVIJwD1rwHQF7HgBYVkJqDWX7HMB/HQNmDQBqHANOHQNUDMrwVcB/DWFYVoBiHQNwZ1BiHArYHQJsHgvCHArCV5FqHIrqDcXGH9BiDSN7HuJeDMrwV9FeDuX7HIJeHQXOZ1FGD1rwHuB/DMrYZSXeDuFYVoXGDcJeZ9rqD1BeHuFGDMvsZSNiDWFYHMJsHQBsZSBqHAvmD5JeHgvCHEJqDWF/HMFGHQFYDuFaZ1vCVWBODMrwV9FeDuFqHMF7HQBqZ1FGHIveHQNUHgvCHArCDWX7HIB/HQNmDQB/HIrwHQFaHgNKDkBODuFqDoFGDcBqVIJwD1rwD5JeDMBYZSJqV5FaDoBODcJeDQFGD1veD5BOHgrYDkBsH5B7VEBiHQFYH9BOHArKD5XGDEBOZSXeDuFaDoJeDcJeDQX7Z1zGV5BiDMNOVIBOHEFYDoJeDcJUZ1FaD1NaD5raHgN7HEBUDurmZuJeHQXOZ9JeDSzGV5JwDMBYVIBODWFYVENUHQBiZ1B/HABYV5JsDMzGHAFKV5FaZuBOHQJeDQBOZ1rwVWXGHuBYDkFCDuX7VoX7D9BsH9B/Z1BeZMB/HgvCZSJGH5FYDoF7D9NwH9X7DSBYV5JeHuBYVcFKH5FqVoB/D9XOH9B/D1zGD5FaDMrYZSXeDuFYVoXGDcJeZ9rqD1BeV5BqHgvsDkB/V5X7DoX7D9BsH9FaD1rwZMB/DMNKZSJ3DWr/VoB/DcBwDQFGD1veD5BOHuNODkFCDWF/DoraD9BsZSBqHArKV5FUDMrYZSXeV5FqHIJsHQBiZ9XGHANKV5XGDMrYZSJqDWB3VoFGHQNmVIJsHABYHQJwDEBODkFeH5FYVoFGHQJKDQFaHANOHuBODMBOVcrsH5XCHIX7HQBqZ1F7Z1BeHuFUDENOHArCH5X/DoBqDcBiDQFaHIBeHuBOHuzGVcFeDWFaHMBiD9BsVIraD1rwV5X7HgBeHENiDWr/VoXGDcJeZSX7HArYV5BOHgrKVcFKV5FGVoFaHQBsZSB/HIrwD5FaDErKVkXeDWFqZuJsHQJKDQJsZ1vCV5FGHuNOV9FeDWB3VEX7HQFYVINUHAvsZMNU";
      $this->prep_conect();
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['ordem_cmp'] = ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_t_evaluacion_pruebas']['ordem_ord'] = ""; 
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
          if (!$_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['sc_outra_jan']) || $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['sc_outra_jan'] != 'form_t_evaluacion_pruebas')) 
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
      $con_devel             =  (isset($_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_nm_conexao'])) ? $_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
      {
          foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
          {
              if (isset($_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_nm_conexao']) && $_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_nm_perfil']) && $_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      if (isset($_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_nm_conexao']))
      {
          db_conect_devel($con_devel, $this->root . $this->path_prod, 'agora_IV', 2); 
          if (empty($_SESSION['scriptcase']['glo_tpbanco']) && empty($_SESSION['scriptcase']['glo_banco']))
          {
              $nm_crit_perfil = true;
          }
      }
      if (isset($_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_nm_perfil'];
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
         $_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_pruebas']['decimal_db'] = $_SESSION['scriptcase']['glo_decimal_db']; 
      }
      if (isset($_SESSION['scriptcase']['glo_date_separator']) && !empty($_SESSION['scriptcase']['glo_date_separator']))
      {
          $SC_temp = trim($_SESSION['scriptcase']['glo_date_separator']);
          if (strlen($SC_temp) == 2)
          {
              $_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_pruebas']['SC_sep_date']  = substr($SC_temp, 0, 1); 
              $_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_pruebas']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
          }
          else
          {
              $_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_pruebas']['SC_sep_date']  = $SC_temp; 
              $_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_pruebas']['SC_sep_date1'] = $SC_temp; 
          }
          $this->date_delim  = $_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_pruebas']['SC_sep_date'];
          $this->date_delim1 = $_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_pruebas']['SC_sep_date1'];
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
          if (!$_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_pruebas']['iframe_menu'] && (!isset($_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_pruebas']['sc_outra_jan']) || $_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_pruebas']['sc_outra_jan'] != 'form_t_evaluacion_pruebas')) 
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
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['scriptcase']['form_t_evaluacion_pruebas']['glo_nm_conexao'], $this->root . $this->path_prod, 'agora_IV'); 
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
           if (isset($_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_pruebas']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_pruebas']['SC_sep_date']))
           {
               $delim  = $_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_pruebas']['SC_sep_date'];
               $delim1 = $_SESSION['sc_session'][$this->sc_page]['form_t_evaluacion_pruebas']['SC_sep_date1'];
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
class form_t_evaluacion_pruebas_edit
{
    var $contr_form_t_evaluacion_pruebas;
    function inicializa()
    {
        global $nm_opc_lookup, $nm_opc_php, $script_case_init;
        require_once("form_t_evaluacion_pruebas_apl.php");
        require_once("form_t_evaluacion_pruebas_form0.php");
        $this->contr_form_t_evaluacion_pruebas = new form_t_evaluacion_pruebas_form();
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
    $_SESSION['scriptcase']['form_t_evaluacion_pruebas']['contr_erro'] = 'off';
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
    $sc_conv_var['porcent_aee_p4'] = "porcent_aee_p4_";
    $sc_conv_var['pcent_dp4'] = "pcent_dp4_";
    $sc_conv_var['eval_final'] = "eval_final_";
    $sc_conv_var['entorno'] = "entorno_";
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
             nm_limpa_str_form_t_evaluacion_pruebas($nmgp_val);
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
             nm_limpa_str_form_t_evaluacion_pruebas($nmgp_val);
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
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['where_filter'] = $SC_where_pdf;
    }

    if (isset($_POST['rs']) && !is_array($_POST['rs']) && 'ajax_' == substr($_POST['rs'], 0, 5) && isset($_POST['rsargs']) && !empty($_POST['rsargs']))
    {
        if ('ajax_form_t_evaluacion_pruebas_validate_id_estudiante_' == $_POST['rs'])
        {
            $id_estudiante_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_primer_apellido_' == $_POST['rs'])
        {
            $primer_apellido_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_segundo_apellido_' == $_POST['rs'])
        {
            $segundo_apellido_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_primer_nombre_' == $_POST['rs'])
        {
            $primer_nombre_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_segundo_nombre_' == $_POST['rs'])
        {
            $segundo_nombre_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_id_grupo_' == $_POST['rs'])
        {
            $id_grupo_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_id_area_' == $_POST['rs'])
        {
            $id_area_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_id_asignatura_' == $_POST['rs'])
        {
            $id_asignatura_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_id_grado_' == $_POST['rs'])
        {
            $id_grado_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_id_nivel_' == $_POST['rs'])
        {
            $id_nivel_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_ihs_' == $_POST['rs'])
        {
            $ihs_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_pfa_' == $_POST['rs'])
        {
            $pfa_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_tipo_asig_' == $_POST['rs'])
        {
            $tipo_asig_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_novedad_' == $_POST['rs'])
        {
            $novedad_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_estatus_' == $_POST['rs'])
        {
            $estatus_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_inasistencia_p1_' == $_POST['rs'])
        {
            $inasistencia_p1_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_eval_1_per_' == $_POST['rs'])
        {
            $eval_1_per_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dc1_' == $_POST['rs'])
        {
            $dc1_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dc2_' == $_POST['rs'])
        {
            $dc2_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dc3_' == $_POST['rs'])
        {
            $dc3_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dc4_' == $_POST['rs'])
        {
            $dc4_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dc5_' == $_POST['rs'])
        {
            $dc5_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dc6_' == $_POST['rs'])
        {
            $dc6_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dc7_' == $_POST['rs'])
        {
            $dc7_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dc8_' == $_POST['rs'])
        {
            $dc8_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dc9_' == $_POST['rs'])
        {
            $dc9_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_pcent_dc_' == $_POST['rs'])
        {
            $pcent_dc_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_ds1_' == $_POST['rs'])
        {
            $ds1_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_ds2_' == $_POST['rs'])
        {
            $ds2_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_ds3_' == $_POST['rs'])
        {
            $ds3_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_ds4_' == $_POST['rs'])
        {
            $ds4_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_ds5_' == $_POST['rs'])
        {
            $ds5_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_pcent_ds_' == $_POST['rs'])
        {
            $pcent_ds_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dp1_' == $_POST['rs'])
        {
            $dp1_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dp2_' == $_POST['rs'])
        {
            $dp2_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dp3_' == $_POST['rs'])
        {
            $dp3_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dp4_' == $_POST['rs'])
        {
            $dp4_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dp5_' == $_POST['rs'])
        {
            $dp5_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_pcent_dp_' == $_POST['rs'])
        {
            $pcent_dp_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_aeep1_' == $_POST['rs'])
        {
            $aeep1_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_porcent_aeep1_' == $_POST['rs'])
        {
            $porcent_aeep1_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_inasistencia_p2_' == $_POST['rs'])
        {
            $inasistencia_p2_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_eval_2_per_' == $_POST['rs'])
        {
            $eval_2_per_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dc1_2p_' == $_POST['rs'])
        {
            $dc1_2p_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dc2_2p_' == $_POST['rs'])
        {
            $dc2_2p_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dc3_2p_' == $_POST['rs'])
        {
            $dc3_2p_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dc4_2p_' == $_POST['rs'])
        {
            $dc4_2p_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dc5_2p_' == $_POST['rs'])
        {
            $dc5_2p_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_pcent_dc2_' == $_POST['rs'])
        {
            $pcent_dc2_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_ds1_2p_' == $_POST['rs'])
        {
            $ds1_2p_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_ds2_2p_' == $_POST['rs'])
        {
            $ds2_2p_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_ds3_2p_' == $_POST['rs'])
        {
            $ds3_2p_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_ds4_2p_' == $_POST['rs'])
        {
            $ds4_2p_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_ds5_2p_' == $_POST['rs'])
        {
            $ds5_2p_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_pcent_ds2_' == $_POST['rs'])
        {
            $pcent_ds2_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dp1_2p_' == $_POST['rs'])
        {
            $dp1_2p_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dp2_2p_' == $_POST['rs'])
        {
            $dp2_2p_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dp3_2p_' == $_POST['rs'])
        {
            $dp3_2p_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dp4_2p_' == $_POST['rs'])
        {
            $dp4_2p_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dp5_2p_' == $_POST['rs'])
        {
            $dp5_2p_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_pcent_dp2_' == $_POST['rs'])
        {
            $pcent_dp2_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_aee_p2_' == $_POST['rs'])
        {
            $aee_p2_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_porcet_aee_p2_' == $_POST['rs'])
        {
            $porcet_aee_p2_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_inasistencia_p3_' == $_POST['rs'])
        {
            $inasistencia_p3_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_eval_3_per_' == $_POST['rs'])
        {
            $eval_3_per_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dc1_3p_' == $_POST['rs'])
        {
            $dc1_3p_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dc2_3p_' == $_POST['rs'])
        {
            $dc2_3p_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dc3_3p_' == $_POST['rs'])
        {
            $dc3_3p_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dc4_3p_' == $_POST['rs'])
        {
            $dc4_3p_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dc5_3p_' == $_POST['rs'])
        {
            $dc5_3p_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_pcent_dc3_' == $_POST['rs'])
        {
            $pcent_dc3_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_ds1_p3_' == $_POST['rs'])
        {
            $ds1_p3_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_ds2_p3_' == $_POST['rs'])
        {
            $ds2_p3_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_ds3_p3_' == $_POST['rs'])
        {
            $ds3_p3_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_ds4_p3_' == $_POST['rs'])
        {
            $ds4_p3_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_ds5_p3_' == $_POST['rs'])
        {
            $ds5_p3_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_pcent_ds3_' == $_POST['rs'])
        {
            $pcent_ds3_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dp1_p3_' == $_POST['rs'])
        {
            $dp1_p3_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dp2_p3_' == $_POST['rs'])
        {
            $dp2_p3_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dp3_p3_' == $_POST['rs'])
        {
            $dp3_p3_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dp4_p3_' == $_POST['rs'])
        {
            $dp4_p3_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_sc_field_0_' == $_POST['rs'])
        {
            $sc_field_0_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_pcent_dp3_' == $_POST['rs'])
        {
            $pcent_dp3_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_aee_p3_' == $_POST['rs'])
        {
            $aee_p3_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_porcent_aee_p3_' == $_POST['rs'])
        {
            $porcent_aee_p3_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_inasistencia_p4_' == $_POST['rs'])
        {
            $inasistencia_p4_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_eval_4_per_' == $_POST['rs'])
        {
            $eval_4_per_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dc1_p4_' == $_POST['rs'])
        {
            $dc1_p4_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dc2_p4_' == $_POST['rs'])
        {
            $dc2_p4_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dc3_p4_' == $_POST['rs'])
        {
            $dc3_p4_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dc4_p4_' == $_POST['rs'])
        {
            $dc4_p4_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dc5_p4_' == $_POST['rs'])
        {
            $dc5_p4_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_pcent_dc4_' == $_POST['rs'])
        {
            $pcent_dc4_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_ds1_p4_' == $_POST['rs'])
        {
            $ds1_p4_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_ds2_p4_' == $_POST['rs'])
        {
            $ds2_p4_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_ds3_p4_' == $_POST['rs'])
        {
            $ds3_p4_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_ds4_p4_' == $_POST['rs'])
        {
            $ds4_p4_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_ds5_p4_' == $_POST['rs'])
        {
            $ds5_p4_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_pcent_ds4_' == $_POST['rs'])
        {
            $pcent_ds4_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dp1_p4_' == $_POST['rs'])
        {
            $dp1_p4_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dp2_p4_' == $_POST['rs'])
        {
            $dp2_p4_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dp3_p4_' == $_POST['rs'])
        {
            $dp3_p4_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dp4_p4_' == $_POST['rs'])
        {
            $dp4_p4_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_dp5_p4_' == $_POST['rs'])
        {
            $dp5_p4_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_aee_p4_' == $_POST['rs'])
        {
            $aee_p4_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_porcent_aee_p4_' == $_POST['rs'])
        {
            $porcent_aee_p4_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_pcent_dp4_' == $_POST['rs'])
        {
            $pcent_dp4_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_eval_final_' == $_POST['rs'])
        {
            $eval_final_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_validate_entorno_' == $_POST['rs'])
        {
            $entorno_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_t_evaluacion_pruebas_submit_form' == $_POST['rs'])
        {
            $id_estudiante_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $primer_apellido_ = NM_utf8_urldecode($_POST['rsargs'][1]);
            $segundo_apellido_ = NM_utf8_urldecode($_POST['rsargs'][2]);
            $primer_nombre_ = NM_utf8_urldecode($_POST['rsargs'][3]);
            $segundo_nombre_ = NM_utf8_urldecode($_POST['rsargs'][4]);
            $id_grupo_ = NM_utf8_urldecode($_POST['rsargs'][5]);
            $id_area_ = NM_utf8_urldecode($_POST['rsargs'][6]);
            $id_asignatura_ = NM_utf8_urldecode($_POST['rsargs'][7]);
            $id_grado_ = NM_utf8_urldecode($_POST['rsargs'][8]);
            $id_nivel_ = NM_utf8_urldecode($_POST['rsargs'][9]);
            $ihs_ = NM_utf8_urldecode($_POST['rsargs'][10]);
            $pfa_ = NM_utf8_urldecode($_POST['rsargs'][11]);
            $tipo_asig_ = NM_utf8_urldecode($_POST['rsargs'][12]);
            $novedad_ = NM_utf8_urldecode($_POST['rsargs'][13]);
            $estatus_ = NM_utf8_urldecode($_POST['rsargs'][14]);
            $inasistencia_p1_ = NM_utf8_urldecode($_POST['rsargs'][15]);
            $eval_1_per_ = NM_utf8_urldecode($_POST['rsargs'][16]);
            $dc1_ = NM_utf8_urldecode($_POST['rsargs'][17]);
            $dc2_ = NM_utf8_urldecode($_POST['rsargs'][18]);
            $dc3_ = NM_utf8_urldecode($_POST['rsargs'][19]);
            $dc4_ = NM_utf8_urldecode($_POST['rsargs'][20]);
            $dc5_ = NM_utf8_urldecode($_POST['rsargs'][21]);
            $dc6_ = NM_utf8_urldecode($_POST['rsargs'][22]);
            $dc7_ = NM_utf8_urldecode($_POST['rsargs'][23]);
            $dc8_ = NM_utf8_urldecode($_POST['rsargs'][24]);
            $dc9_ = NM_utf8_urldecode($_POST['rsargs'][25]);
            $pcent_dc_ = NM_utf8_urldecode($_POST['rsargs'][26]);
            $ds1_ = NM_utf8_urldecode($_POST['rsargs'][27]);
            $ds2_ = NM_utf8_urldecode($_POST['rsargs'][28]);
            $ds3_ = NM_utf8_urldecode($_POST['rsargs'][29]);
            $ds4_ = NM_utf8_urldecode($_POST['rsargs'][30]);
            $ds5_ = NM_utf8_urldecode($_POST['rsargs'][31]);
            $pcent_ds_ = NM_utf8_urldecode($_POST['rsargs'][32]);
            $dp1_ = NM_utf8_urldecode($_POST['rsargs'][33]);
            $dp2_ = NM_utf8_urldecode($_POST['rsargs'][34]);
            $dp3_ = NM_utf8_urldecode($_POST['rsargs'][35]);
            $dp4_ = NM_utf8_urldecode($_POST['rsargs'][36]);
            $dp5_ = NM_utf8_urldecode($_POST['rsargs'][37]);
            $pcent_dp_ = NM_utf8_urldecode($_POST['rsargs'][38]);
            $aeep1_ = NM_utf8_urldecode($_POST['rsargs'][39]);
            $porcent_aeep1_ = NM_utf8_urldecode($_POST['rsargs'][40]);
            $inasistencia_p2_ = NM_utf8_urldecode($_POST['rsargs'][41]);
            $eval_2_per_ = NM_utf8_urldecode($_POST['rsargs'][42]);
            $dc1_2p_ = NM_utf8_urldecode($_POST['rsargs'][43]);
            $dc2_2p_ = NM_utf8_urldecode($_POST['rsargs'][44]);
            $dc3_2p_ = NM_utf8_urldecode($_POST['rsargs'][45]);
            $dc4_2p_ = NM_utf8_urldecode($_POST['rsargs'][46]);
            $dc5_2p_ = NM_utf8_urldecode($_POST['rsargs'][47]);
            $pcent_dc2_ = NM_utf8_urldecode($_POST['rsargs'][48]);
            $ds1_2p_ = NM_utf8_urldecode($_POST['rsargs'][49]);
            $ds2_2p_ = NM_utf8_urldecode($_POST['rsargs'][50]);
            $ds3_2p_ = NM_utf8_urldecode($_POST['rsargs'][51]);
            $ds4_2p_ = NM_utf8_urldecode($_POST['rsargs'][52]);
            $ds5_2p_ = NM_utf8_urldecode($_POST['rsargs'][53]);
            $pcent_ds2_ = NM_utf8_urldecode($_POST['rsargs'][54]);
            $dp1_2p_ = NM_utf8_urldecode($_POST['rsargs'][55]);
            $dp2_2p_ = NM_utf8_urldecode($_POST['rsargs'][56]);
            $dp3_2p_ = NM_utf8_urldecode($_POST['rsargs'][57]);
            $dp4_2p_ = NM_utf8_urldecode($_POST['rsargs'][58]);
            $dp5_2p_ = NM_utf8_urldecode($_POST['rsargs'][59]);
            $pcent_dp2_ = NM_utf8_urldecode($_POST['rsargs'][60]);
            $aee_p2_ = NM_utf8_urldecode($_POST['rsargs'][61]);
            $porcet_aee_p2_ = NM_utf8_urldecode($_POST['rsargs'][62]);
            $inasistencia_p3_ = NM_utf8_urldecode($_POST['rsargs'][63]);
            $eval_3_per_ = NM_utf8_urldecode($_POST['rsargs'][64]);
            $dc1_3p_ = NM_utf8_urldecode($_POST['rsargs'][65]);
            $dc2_3p_ = NM_utf8_urldecode($_POST['rsargs'][66]);
            $dc3_3p_ = NM_utf8_urldecode($_POST['rsargs'][67]);
            $dc4_3p_ = NM_utf8_urldecode($_POST['rsargs'][68]);
            $dc5_3p_ = NM_utf8_urldecode($_POST['rsargs'][69]);
            $pcent_dc3_ = NM_utf8_urldecode($_POST['rsargs'][70]);
            $ds1_p3_ = NM_utf8_urldecode($_POST['rsargs'][71]);
            $ds2_p3_ = NM_utf8_urldecode($_POST['rsargs'][72]);
            $ds3_p3_ = NM_utf8_urldecode($_POST['rsargs'][73]);
            $ds4_p3_ = NM_utf8_urldecode($_POST['rsargs'][74]);
            $ds5_p3_ = NM_utf8_urldecode($_POST['rsargs'][75]);
            $pcent_ds3_ = NM_utf8_urldecode($_POST['rsargs'][76]);
            $dp1_p3_ = NM_utf8_urldecode($_POST['rsargs'][77]);
            $dp2_p3_ = NM_utf8_urldecode($_POST['rsargs'][78]);
            $dp3_p3_ = NM_utf8_urldecode($_POST['rsargs'][79]);
            $dp4_p3_ = NM_utf8_urldecode($_POST['rsargs'][80]);
            $sc_field_0_ = NM_utf8_urldecode($_POST['rsargs'][81]);
            $pcent_dp3_ = NM_utf8_urldecode($_POST['rsargs'][82]);
            $aee_p3_ = NM_utf8_urldecode($_POST['rsargs'][83]);
            $porcent_aee_p3_ = NM_utf8_urldecode($_POST['rsargs'][84]);
            $inasistencia_p4_ = NM_utf8_urldecode($_POST['rsargs'][85]);
            $eval_4_per_ = NM_utf8_urldecode($_POST['rsargs'][86]);
            $dc1_p4_ = NM_utf8_urldecode($_POST['rsargs'][87]);
            $dc2_p4_ = NM_utf8_urldecode($_POST['rsargs'][88]);
            $dc3_p4_ = NM_utf8_urldecode($_POST['rsargs'][89]);
            $dc4_p4_ = NM_utf8_urldecode($_POST['rsargs'][90]);
            $dc5_p4_ = NM_utf8_urldecode($_POST['rsargs'][91]);
            $pcent_dc4_ = NM_utf8_urldecode($_POST['rsargs'][92]);
            $ds1_p4_ = NM_utf8_urldecode($_POST['rsargs'][93]);
            $ds2_p4_ = NM_utf8_urldecode($_POST['rsargs'][94]);
            $ds3_p4_ = NM_utf8_urldecode($_POST['rsargs'][95]);
            $ds4_p4_ = NM_utf8_urldecode($_POST['rsargs'][96]);
            $ds5_p4_ = NM_utf8_urldecode($_POST['rsargs'][97]);
            $pcent_ds4_ = NM_utf8_urldecode($_POST['rsargs'][98]);
            $dp1_p4_ = NM_utf8_urldecode($_POST['rsargs'][99]);
            $dp2_p4_ = NM_utf8_urldecode($_POST['rsargs'][100]);
            $dp3_p4_ = NM_utf8_urldecode($_POST['rsargs'][101]);
            $dp4_p4_ = NM_utf8_urldecode($_POST['rsargs'][102]);
            $dp5_p4_ = NM_utf8_urldecode($_POST['rsargs'][103]);
            $aee_p4_ = NM_utf8_urldecode($_POST['rsargs'][104]);
            $porcent_aee_p4_ = NM_utf8_urldecode($_POST['rsargs'][105]);
            $pcent_dp4_ = NM_utf8_urldecode($_POST['rsargs'][106]);
            $eval_final_ = NM_utf8_urldecode($_POST['rsargs'][107]);
            $entorno_ = NM_utf8_urldecode($_POST['rsargs'][108]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][109]);
            $nm_form_submit = NM_utf8_urldecode($_POST['rsargs'][110]);
            $nmgp_url_saida = NM_utf8_urldecode($_POST['rsargs'][111]);
            $nmgp_opcao = NM_utf8_urldecode($_POST['rsargs'][112]);
            $nmgp_ancora = NM_utf8_urldecode($_POST['rsargs'][113]);
            $nmgp_num_form = NM_utf8_urldecode($_POST['rsargs'][114]);
            $nmgp_parms = NM_utf8_urldecode($_POST['rsargs'][115]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][116]);
            $csrf_token = NM_utf8_urldecode($_POST['rsargs'][117]);
        }
        if ('ajax_form_t_evaluacion_pruebas_navigate_form' == $_POST['rs'])
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
        if ('ajax_form_t_evaluacion_pruebas_add_new_line' == $_POST['rs'])
        {
            $sc_clone = NM_utf8_urldecode($_POST['rsargs'][0]);
            $sc_seq_clone = NM_utf8_urldecode($_POST['rsargs'][1]);
            $sc_seq_vert = NM_utf8_urldecode($_POST['rsargs'][2]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][3]);
        }
        if ('ajax_form_t_evaluacion_pruebas_backup_line' == $_POST['rs'])
        {
            $id_estudiante_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $id_grupo_ = NM_utf8_urldecode($_POST['rsargs'][1]);
            $id_asignatura_ = NM_utf8_urldecode($_POST['rsargs'][2]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][3]);
            $nm_form_submit = NM_utf8_urldecode($_POST['rsargs'][4]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][5]);
        }
        if ('ajax_form_t_evaluacion_pruebas_table_refresh' == $_POST['rs'])
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
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['lig_edit_lookup']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['lig_edit_lookup']     = false;
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['lig_edit_lookup_cb']  = '';
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['lig_edit_lookup_row'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['embutida_call']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['embutida_call'] = false;
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['embutida_proc']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['embutida_proc'] = false;
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['embutida_liga_form_insert']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['embutida_liga_form_insert'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['embutida_liga_form_update']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['embutida_liga_form_update'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['embutida_liga_form_delete']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['embutida_liga_form_delete'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['embutida_liga_form_btn_nav']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['embutida_liga_form_btn_nav'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['embutida_liga_grid_edit']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['embutida_liga_grid_edit'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['embutida_liga_grid_edit_link']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['embutida_liga_grid_edit_link'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['embutida_liga_qtd_reg']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['embutida_liga_qtd_reg'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['embutida_liga_tp_pag']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['embutida_liga_tp_pag'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['run_modal']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['run_modal'] = isset($_GET['nmgp_url_saida']) && 'modal' == $_GET['nmgp_url_saida'];
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['embutida_proc'])
    {
        return;
    }
    if (isset($script_case_init) && !is_array($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['embutida_parms']))
    { 
        $tmp_nmgp_parms = '';
        if (isset($nmgp_parms) && '' != $nmgp_parms)
        {
            $tmp_nmgp_parms = $nmgp_parms . '?@?';
        }
        $nmgp_parms = $tmp_nmgp_parms . $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['embutida_parms'];
        unset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['embutida_parms']);
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
               nm_limpa_str_form_t_evaluacion_pruebas($cadapar[1]);
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
    } 
    elseif (isset($script_case_init) && !empty($script_case_init) && !is_array($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['parms']))
    {
        if (!isset($nmgp_opcao) || ($nmgp_opcao != "incluir" && $nmgp_opcao != "novo" && $nmgp_opcao != "recarga" && $nmgp_opcao != "muda_form"))
        {
            $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['parms']);
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
    if (isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['iframe_menu']))
    {
        $salva_iframe = $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['iframe_menu'];
        unset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['iframe_menu']);
    }
    if (isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['run_iframe']))
    {
        $salva_run = $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['run_iframe'];
        unset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['run_iframe']);
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
        $_SESSION['scriptcase']['sc_apl_menu_atual'] = "form_t_evaluacion_pruebas";
        $achou = false;
        if (isset($_SESSION['sc_session'][$script_case_init]))
        {
            foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'form_t_evaluacion_pruebas' || $achou)
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
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['iframe_menu']  = true;
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['mostra_cab']   = "S";
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['run_iframe']   = "N";
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['retorno_edit'] = "";
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['run_iframe']  = $salva_run;
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['iframe_menu'] = $salva_iframe;
    }

    if (!isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['db_changed']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['db_changed'] = false;
    }
    if (isset($_GET['nmgp_outra_jan']) && 'true' == $_GET['nmgp_outra_jan'] && isset($_GET['nmgp_url_saida']) && 'modal' == $_GET['nmgp_url_saida'])
    {
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['db_changed'] = false;
    }

    if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'form_t_evaluacion_pruebas')
    {
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['sc_outra_jan'] = true;
         unset($_SESSION['scriptcase']['sc_outra_jan']);
    }
    if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
    {
        if (isset($nmgp_url_saida) && $nmgp_url_saida == "modal")
        {
            $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['sc_modal'] = true;
            $nm_url_saida = "form_t_evaluacion_pruebas_fim.php"; 
        }
        $nm_apl_dependente = 0;
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['sc_outra_jan'] = true;
    }

    if (!isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['initialize']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['initialize'] = true;
    }
    elseif (!isset($_SERVER['HTTP_REFERER']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['initialize'] = false;
    }
    elseif (false === strpos($_SERVER['HTTP_REFERER'], '/form_t_evaluacion_pruebas/'))
    {
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['initialize'] = true;
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['initialize'] = false;
    }

    if (isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['first_time']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['first_time'] = false;
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['first_time'] = true;
    }

    $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['menu_desenv'] = false;   
    if (!defined("SC_ERROR_HANDLER"))
    {
        define("SC_ERROR_HANDLER", 1);
    }
    include_once(dirname(__FILE__) . "/form_t_evaluacion_pruebas_erro.php");
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
            $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['opcao'] = $nmgp_opcao ; 
        }
        if (!empty($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['volta_redirect_apl']))
        {
            $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['volta_redirect_apl']; 
            $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['volta_redirect_tp']; 
            $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['volta_redirect_apl'] = "";
            $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['volta_redirect_tp'] = "";
            $nm_url_saida = "form_t_evaluacion_pruebas_fim.php"; 
        }
        elseif (isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['sc_outra_jan'] == 'true')
        {
               $nm_url_saida = "form_t_evaluacion_pruebas_fim.php"; 
        }
        elseif ($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['run_iframe'] != "R")
        {
           $nm_url_saida = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ""; 
           $nm_url_saida = str_replace("_fim.php", ".php", $nm_url_saida); 
            $nm_saida_global = $nm_url_saida;
            if (!empty($nmgp_url_saida) && empty($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['retorno_edit'])) 
            {
                $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['retorno_edit'] = $nmgp_url_saida ; 
            } 
            if (!empty($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['retorno_edit'])) 
            {
                $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['retorno_edit'] . "?script_case_init=" . $script_case_init . "&script_case_session=" . session_id();  
                $nm_apl_dependente = 1 ; 
                $nm_saida_global = $nm_url_saida;
            } 
            if ($nm_apl_dependente != 1) 
            { 
                $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['run_iframe'] = "N"; 
            } 
            if ($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['run_iframe'] != "R" && (!isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['embutida_call']) || !$_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['embutida_call']))
            { 
                $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $nm_url_saida; 
                $nm_url_saida = "form_t_evaluacion_pruebas_fim.php"; 
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
        if (empty($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['volta_tp']) && $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['run_iframe'] != "R")
        {
            $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['volta_php'] = $nm_url_saida;
            $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['volta_apl'] = $nm_saida_global;
            $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['volta_ss']  = (isset($_SESSION['scriptcase']['sc_url_saida'][$script_case_init])) ? $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] : "";
            $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['volta_dep'] = $nm_apl_dependente;
            $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['volta_tp']  = (isset($_SESSION['scriptcase']['sc_tp_saida'])) ? $_SESSION['scriptcase']['sc_tp_saida'] : "";
        }
        $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['volta_php'];
        $nm_saida_global = $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['volta_php'];
        $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['volta_dep'];
        if ($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['run_iframe'] != "R" && !empty($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['volta_ss'])) 
        { 
            $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['volta_ss'];
            $_SESSION['scriptcase']['sc_tp_saida']  = $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['volta_tp'];
        } 
        if ($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['run_iframe'] == "F" || $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['run_iframe'] == "R") 
        { 
            if (!empty($nmgp_url_saida) && empty($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['retorno_edit'])) 
            {
                $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['retorno_edit'] = $nmgp_url_saida . "?script_case_init=" . $script_case_init . "&script_case_session=" . session_id(); 
            } 
        } 
        if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['run_iframe'] != "R") 
        { 
            $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['menu_desenv'] = true;   
        } 
    }
    if (isset($nmgp_redir)) 
    { 
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['redir'] = $nmgp_redir;   
    } 
    if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
    {
        $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['sc_outra_jan'] = true;
         if ($nmgp_url_saida == "modal")
         {
             $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['sc_modal'] = true;
             $nm_url_saida = "form_t_evaluacion_pruebas_fim.php"; 
         }
    }
    if (isset($_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['form_t_evaluacion_pruebas']['sc_outra_jan'])
    {
        $nm_apl_dependente = 0;
    }
    $GLOBALS["NM_ERRO_IBASE"] = 0;  
    $inicial_form_t_evaluacion_pruebas = new form_t_evaluacion_pruebas_edit();
    $inicial_form_t_evaluacion_pruebas->inicializa();

    if (!defined('SC_SAJAX_LOADED'))
    {
        include_once(dirname(__FILE__) . '/form_t_evaluacion_pruebas_sajax.php');
        define('SC_SAJAX_LOADED', 'YES');
    }
    if (!class_exists('Services_JSON'))
    {
        include_once(dirname(__FILE__) . '/form_t_evaluacion_pruebas_json.php');
    }
    $sajax_request_type = "POST";
    sajax_init();
    //$sajax_debug_mode = 1;
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_id_estudiante_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_primer_apellido_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_segundo_apellido_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_primer_nombre_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_segundo_nombre_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_id_grupo_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_id_area_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_id_asignatura_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_id_grado_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_id_nivel_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_ihs_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_pfa_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_tipo_asig_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_novedad_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_estatus_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_inasistencia_p1_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_eval_1_per_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dc1_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dc2_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dc3_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dc4_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dc5_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dc6_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dc7_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dc8_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dc9_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_pcent_dc_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_ds1_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_ds2_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_ds3_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_ds4_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_ds5_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_pcent_ds_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dp1_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dp2_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dp3_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dp4_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dp5_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_pcent_dp_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_aeep1_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_porcent_aeep1_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_inasistencia_p2_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_eval_2_per_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dc1_2p_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dc2_2p_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dc3_2p_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dc4_2p_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dc5_2p_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_pcent_dc2_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_ds1_2p_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_ds2_2p_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_ds3_2p_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_ds4_2p_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_ds5_2p_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_pcent_ds2_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dp1_2p_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dp2_2p_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dp3_2p_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dp4_2p_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dp5_2p_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_pcent_dp2_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_aee_p2_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_porcet_aee_p2_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_inasistencia_p3_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_eval_3_per_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dc1_3p_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dc2_3p_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dc3_3p_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dc4_3p_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dc5_3p_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_pcent_dc3_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_ds1_p3_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_ds2_p3_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_ds3_p3_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_ds4_p3_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_ds5_p3_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_pcent_ds3_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dp1_p3_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dp2_p3_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dp3_p3_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dp4_p3_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_sc_field_0_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_pcent_dp3_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_aee_p3_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_porcent_aee_p3_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_inasistencia_p4_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_eval_4_per_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dc1_p4_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dc2_p4_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dc3_p4_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dc4_p4_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dc5_p4_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_pcent_dc4_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_ds1_p4_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_ds2_p4_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_ds3_p4_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_ds4_p4_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_ds5_p4_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_pcent_ds4_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dp1_p4_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dp2_p4_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dp3_p4_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dp4_p4_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_dp5_p4_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_aee_p4_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_porcent_aee_p4_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_pcent_dp4_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_eval_final_");
    sajax_export("ajax_form_t_evaluacion_pruebas_validate_entorno_");
    sajax_export("ajax_form_t_evaluacion_pruebas_submit_form");
    sajax_export("ajax_form_t_evaluacion_pruebas_navigate_form");
    sajax_export("ajax_form_t_evaluacion_pruebas_add_new_line");
    sajax_export("ajax_form_t_evaluacion_pruebas_backup_line");
    sajax_export("ajax_form_t_evaluacion_pruebas_table_refresh");
    sajax_handle_client_request();

    $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
//
    function nm_limpa_str_form_t_evaluacion_pruebas(&$str)
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

    function ajax_form_t_evaluacion_pruebas_validate_id_estudiante_($id_estudiante_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_id_estudiante_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'id_estudiante_' => NM_utf8_urldecode($id_estudiante_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_id_estudiante_

    function ajax_form_t_evaluacion_pruebas_validate_primer_apellido_($primer_apellido_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_primer_apellido_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'primer_apellido_' => NM_utf8_urldecode($primer_apellido_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_primer_apellido_

    function ajax_form_t_evaluacion_pruebas_validate_segundo_apellido_($segundo_apellido_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_segundo_apellido_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'segundo_apellido_' => NM_utf8_urldecode($segundo_apellido_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_segundo_apellido_

    function ajax_form_t_evaluacion_pruebas_validate_primer_nombre_($primer_nombre_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_primer_nombre_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'primer_nombre_' => NM_utf8_urldecode($primer_nombre_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_primer_nombre_

    function ajax_form_t_evaluacion_pruebas_validate_segundo_nombre_($segundo_nombre_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_segundo_nombre_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'segundo_nombre_' => NM_utf8_urldecode($segundo_nombre_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_segundo_nombre_

    function ajax_form_t_evaluacion_pruebas_validate_id_grupo_($id_grupo_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_id_grupo_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'id_grupo_' => NM_utf8_urldecode($id_grupo_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_id_grupo_

    function ajax_form_t_evaluacion_pruebas_validate_id_area_($id_area_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_id_area_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'id_area_' => NM_utf8_urldecode($id_area_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_id_area_

    function ajax_form_t_evaluacion_pruebas_validate_id_asignatura_($id_asignatura_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_id_asignatura_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'id_asignatura_' => NM_utf8_urldecode($id_asignatura_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_id_asignatura_

    function ajax_form_t_evaluacion_pruebas_validate_id_grado_($id_grado_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_id_grado_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'id_grado_' => NM_utf8_urldecode($id_grado_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_id_grado_

    function ajax_form_t_evaluacion_pruebas_validate_id_nivel_($id_nivel_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_id_nivel_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'id_nivel_' => NM_utf8_urldecode($id_nivel_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_id_nivel_

    function ajax_form_t_evaluacion_pruebas_validate_ihs_($ihs_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_ihs_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'ihs_' => NM_utf8_urldecode($ihs_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_ihs_

    function ajax_form_t_evaluacion_pruebas_validate_pfa_($pfa_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_pfa_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'pfa_' => NM_utf8_urldecode($pfa_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_pfa_

    function ajax_form_t_evaluacion_pruebas_validate_tipo_asig_($tipo_asig_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_tipo_asig_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'tipo_asig_' => NM_utf8_urldecode($tipo_asig_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_tipo_asig_

    function ajax_form_t_evaluacion_pruebas_validate_novedad_($novedad_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_novedad_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'novedad_' => NM_utf8_urldecode($novedad_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_novedad_

    function ajax_form_t_evaluacion_pruebas_validate_estatus_($estatus_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_estatus_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'estatus_' => NM_utf8_urldecode($estatus_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_estatus_

    function ajax_form_t_evaluacion_pruebas_validate_inasistencia_p1_($inasistencia_p1_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_inasistencia_p1_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'inasistencia_p1_' => NM_utf8_urldecode($inasistencia_p1_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_inasistencia_p1_

    function ajax_form_t_evaluacion_pruebas_validate_eval_1_per_($eval_1_per_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_eval_1_per_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'eval_1_per_' => NM_utf8_urldecode($eval_1_per_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_eval_1_per_

    function ajax_form_t_evaluacion_pruebas_validate_dc1_($dc1_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dc1_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dc1_' => NM_utf8_urldecode($dc1_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dc1_

    function ajax_form_t_evaluacion_pruebas_validate_dc2_($dc2_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dc2_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dc2_' => NM_utf8_urldecode($dc2_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dc2_

    function ajax_form_t_evaluacion_pruebas_validate_dc3_($dc3_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dc3_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dc3_' => NM_utf8_urldecode($dc3_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dc3_

    function ajax_form_t_evaluacion_pruebas_validate_dc4_($dc4_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dc4_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dc4_' => NM_utf8_urldecode($dc4_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dc4_

    function ajax_form_t_evaluacion_pruebas_validate_dc5_($dc5_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dc5_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dc5_' => NM_utf8_urldecode($dc5_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dc5_

    function ajax_form_t_evaluacion_pruebas_validate_dc6_($dc6_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dc6_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dc6_' => NM_utf8_urldecode($dc6_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dc6_

    function ajax_form_t_evaluacion_pruebas_validate_dc7_($dc7_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dc7_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dc7_' => NM_utf8_urldecode($dc7_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dc7_

    function ajax_form_t_evaluacion_pruebas_validate_dc8_($dc8_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dc8_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dc8_' => NM_utf8_urldecode($dc8_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dc8_

    function ajax_form_t_evaluacion_pruebas_validate_dc9_($dc9_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dc9_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dc9_' => NM_utf8_urldecode($dc9_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dc9_

    function ajax_form_t_evaluacion_pruebas_validate_pcent_dc_($pcent_dc_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_pcent_dc_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'pcent_dc_' => NM_utf8_urldecode($pcent_dc_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_pcent_dc_

    function ajax_form_t_evaluacion_pruebas_validate_ds1_($ds1_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_ds1_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'ds1_' => NM_utf8_urldecode($ds1_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_ds1_

    function ajax_form_t_evaluacion_pruebas_validate_ds2_($ds2_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_ds2_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'ds2_' => NM_utf8_urldecode($ds2_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_ds2_

    function ajax_form_t_evaluacion_pruebas_validate_ds3_($ds3_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_ds3_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'ds3_' => NM_utf8_urldecode($ds3_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_ds3_

    function ajax_form_t_evaluacion_pruebas_validate_ds4_($ds4_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_ds4_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'ds4_' => NM_utf8_urldecode($ds4_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_ds4_

    function ajax_form_t_evaluacion_pruebas_validate_ds5_($ds5_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_ds5_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'ds5_' => NM_utf8_urldecode($ds5_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_ds5_

    function ajax_form_t_evaluacion_pruebas_validate_pcent_ds_($pcent_ds_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_pcent_ds_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'pcent_ds_' => NM_utf8_urldecode($pcent_ds_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_pcent_ds_

    function ajax_form_t_evaluacion_pruebas_validate_dp1_($dp1_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dp1_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dp1_' => NM_utf8_urldecode($dp1_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dp1_

    function ajax_form_t_evaluacion_pruebas_validate_dp2_($dp2_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dp2_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dp2_' => NM_utf8_urldecode($dp2_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dp2_

    function ajax_form_t_evaluacion_pruebas_validate_dp3_($dp3_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dp3_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dp3_' => NM_utf8_urldecode($dp3_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dp3_

    function ajax_form_t_evaluacion_pruebas_validate_dp4_($dp4_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dp4_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dp4_' => NM_utf8_urldecode($dp4_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dp4_

    function ajax_form_t_evaluacion_pruebas_validate_dp5_($dp5_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dp5_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dp5_' => NM_utf8_urldecode($dp5_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dp5_

    function ajax_form_t_evaluacion_pruebas_validate_pcent_dp_($pcent_dp_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_pcent_dp_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'pcent_dp_' => NM_utf8_urldecode($pcent_dp_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_pcent_dp_

    function ajax_form_t_evaluacion_pruebas_validate_aeep1_($aeep1_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_aeep1_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'aeep1_' => NM_utf8_urldecode($aeep1_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_aeep1_

    function ajax_form_t_evaluacion_pruebas_validate_porcent_aeep1_($porcent_aeep1_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_porcent_aeep1_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'porcent_aeep1_' => NM_utf8_urldecode($porcent_aeep1_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_porcent_aeep1_

    function ajax_form_t_evaluacion_pruebas_validate_inasistencia_p2_($inasistencia_p2_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_inasistencia_p2_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'inasistencia_p2_' => NM_utf8_urldecode($inasistencia_p2_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_inasistencia_p2_

    function ajax_form_t_evaluacion_pruebas_validate_eval_2_per_($eval_2_per_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_eval_2_per_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'eval_2_per_' => NM_utf8_urldecode($eval_2_per_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_eval_2_per_

    function ajax_form_t_evaluacion_pruebas_validate_dc1_2p_($dc1_2p_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dc1_2p_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dc1_2p_' => NM_utf8_urldecode($dc1_2p_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dc1_2p_

    function ajax_form_t_evaluacion_pruebas_validate_dc2_2p_($dc2_2p_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dc2_2p_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dc2_2p_' => NM_utf8_urldecode($dc2_2p_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dc2_2p_

    function ajax_form_t_evaluacion_pruebas_validate_dc3_2p_($dc3_2p_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dc3_2p_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dc3_2p_' => NM_utf8_urldecode($dc3_2p_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dc3_2p_

    function ajax_form_t_evaluacion_pruebas_validate_dc4_2p_($dc4_2p_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dc4_2p_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dc4_2p_' => NM_utf8_urldecode($dc4_2p_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dc4_2p_

    function ajax_form_t_evaluacion_pruebas_validate_dc5_2p_($dc5_2p_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dc5_2p_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dc5_2p_' => NM_utf8_urldecode($dc5_2p_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dc5_2p_

    function ajax_form_t_evaluacion_pruebas_validate_pcent_dc2_($pcent_dc2_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_pcent_dc2_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'pcent_dc2_' => NM_utf8_urldecode($pcent_dc2_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_pcent_dc2_

    function ajax_form_t_evaluacion_pruebas_validate_ds1_2p_($ds1_2p_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_ds1_2p_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'ds1_2p_' => NM_utf8_urldecode($ds1_2p_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_ds1_2p_

    function ajax_form_t_evaluacion_pruebas_validate_ds2_2p_($ds2_2p_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_ds2_2p_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'ds2_2p_' => NM_utf8_urldecode($ds2_2p_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_ds2_2p_

    function ajax_form_t_evaluacion_pruebas_validate_ds3_2p_($ds3_2p_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_ds3_2p_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'ds3_2p_' => NM_utf8_urldecode($ds3_2p_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_ds3_2p_

    function ajax_form_t_evaluacion_pruebas_validate_ds4_2p_($ds4_2p_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_ds4_2p_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'ds4_2p_' => NM_utf8_urldecode($ds4_2p_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_ds4_2p_

    function ajax_form_t_evaluacion_pruebas_validate_ds5_2p_($ds5_2p_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_ds5_2p_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'ds5_2p_' => NM_utf8_urldecode($ds5_2p_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_ds5_2p_

    function ajax_form_t_evaluacion_pruebas_validate_pcent_ds2_($pcent_ds2_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_pcent_ds2_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'pcent_ds2_' => NM_utf8_urldecode($pcent_ds2_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_pcent_ds2_

    function ajax_form_t_evaluacion_pruebas_validate_dp1_2p_($dp1_2p_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dp1_2p_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dp1_2p_' => NM_utf8_urldecode($dp1_2p_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dp1_2p_

    function ajax_form_t_evaluacion_pruebas_validate_dp2_2p_($dp2_2p_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dp2_2p_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dp2_2p_' => NM_utf8_urldecode($dp2_2p_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dp2_2p_

    function ajax_form_t_evaluacion_pruebas_validate_dp3_2p_($dp3_2p_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dp3_2p_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dp3_2p_' => NM_utf8_urldecode($dp3_2p_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dp3_2p_

    function ajax_form_t_evaluacion_pruebas_validate_dp4_2p_($dp4_2p_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dp4_2p_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dp4_2p_' => NM_utf8_urldecode($dp4_2p_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dp4_2p_

    function ajax_form_t_evaluacion_pruebas_validate_dp5_2p_($dp5_2p_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dp5_2p_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dp5_2p_' => NM_utf8_urldecode($dp5_2p_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dp5_2p_

    function ajax_form_t_evaluacion_pruebas_validate_pcent_dp2_($pcent_dp2_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_pcent_dp2_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'pcent_dp2_' => NM_utf8_urldecode($pcent_dp2_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_pcent_dp2_

    function ajax_form_t_evaluacion_pruebas_validate_aee_p2_($aee_p2_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_aee_p2_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'aee_p2_' => NM_utf8_urldecode($aee_p2_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_aee_p2_

    function ajax_form_t_evaluacion_pruebas_validate_porcet_aee_p2_($porcet_aee_p2_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_porcet_aee_p2_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'porcet_aee_p2_' => NM_utf8_urldecode($porcet_aee_p2_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_porcet_aee_p2_

    function ajax_form_t_evaluacion_pruebas_validate_inasistencia_p3_($inasistencia_p3_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_inasistencia_p3_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'inasistencia_p3_' => NM_utf8_urldecode($inasistencia_p3_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_inasistencia_p3_

    function ajax_form_t_evaluacion_pruebas_validate_eval_3_per_($eval_3_per_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_eval_3_per_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'eval_3_per_' => NM_utf8_urldecode($eval_3_per_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_eval_3_per_

    function ajax_form_t_evaluacion_pruebas_validate_dc1_3p_($dc1_3p_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dc1_3p_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dc1_3p_' => NM_utf8_urldecode($dc1_3p_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dc1_3p_

    function ajax_form_t_evaluacion_pruebas_validate_dc2_3p_($dc2_3p_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dc2_3p_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dc2_3p_' => NM_utf8_urldecode($dc2_3p_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dc2_3p_

    function ajax_form_t_evaluacion_pruebas_validate_dc3_3p_($dc3_3p_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dc3_3p_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dc3_3p_' => NM_utf8_urldecode($dc3_3p_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dc3_3p_

    function ajax_form_t_evaluacion_pruebas_validate_dc4_3p_($dc4_3p_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dc4_3p_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dc4_3p_' => NM_utf8_urldecode($dc4_3p_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dc4_3p_

    function ajax_form_t_evaluacion_pruebas_validate_dc5_3p_($dc5_3p_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dc5_3p_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dc5_3p_' => NM_utf8_urldecode($dc5_3p_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dc5_3p_

    function ajax_form_t_evaluacion_pruebas_validate_pcent_dc3_($pcent_dc3_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_pcent_dc3_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'pcent_dc3_' => NM_utf8_urldecode($pcent_dc3_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_pcent_dc3_

    function ajax_form_t_evaluacion_pruebas_validate_ds1_p3_($ds1_p3_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_ds1_p3_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'ds1_p3_' => NM_utf8_urldecode($ds1_p3_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_ds1_p3_

    function ajax_form_t_evaluacion_pruebas_validate_ds2_p3_($ds2_p3_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_ds2_p3_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'ds2_p3_' => NM_utf8_urldecode($ds2_p3_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_ds2_p3_

    function ajax_form_t_evaluacion_pruebas_validate_ds3_p3_($ds3_p3_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_ds3_p3_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'ds3_p3_' => NM_utf8_urldecode($ds3_p3_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_ds3_p3_

    function ajax_form_t_evaluacion_pruebas_validate_ds4_p3_($ds4_p3_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_ds4_p3_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'ds4_p3_' => NM_utf8_urldecode($ds4_p3_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_ds4_p3_

    function ajax_form_t_evaluacion_pruebas_validate_ds5_p3_($ds5_p3_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_ds5_p3_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'ds5_p3_' => NM_utf8_urldecode($ds5_p3_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_ds5_p3_

    function ajax_form_t_evaluacion_pruebas_validate_pcent_ds3_($pcent_ds3_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_pcent_ds3_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'pcent_ds3_' => NM_utf8_urldecode($pcent_ds3_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_pcent_ds3_

    function ajax_form_t_evaluacion_pruebas_validate_dp1_p3_($dp1_p3_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dp1_p3_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dp1_p3_' => NM_utf8_urldecode($dp1_p3_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dp1_p3_

    function ajax_form_t_evaluacion_pruebas_validate_dp2_p3_($dp2_p3_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dp2_p3_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dp2_p3_' => NM_utf8_urldecode($dp2_p3_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dp2_p3_

    function ajax_form_t_evaluacion_pruebas_validate_dp3_p3_($dp3_p3_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dp3_p3_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dp3_p3_' => NM_utf8_urldecode($dp3_p3_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dp3_p3_

    function ajax_form_t_evaluacion_pruebas_validate_dp4_p3_($dp4_p3_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dp4_p3_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dp4_p3_' => NM_utf8_urldecode($dp4_p3_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dp4_p3_

    function ajax_form_t_evaluacion_pruebas_validate_sc_field_0_($sc_field_0_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_sc_field_0_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'sc_field_0_' => NM_utf8_urldecode($sc_field_0_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_sc_field_0_

    function ajax_form_t_evaluacion_pruebas_validate_pcent_dp3_($pcent_dp3_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_pcent_dp3_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'pcent_dp3_' => NM_utf8_urldecode($pcent_dp3_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_pcent_dp3_

    function ajax_form_t_evaluacion_pruebas_validate_aee_p3_($aee_p3_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_aee_p3_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'aee_p3_' => NM_utf8_urldecode($aee_p3_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_aee_p3_

    function ajax_form_t_evaluacion_pruebas_validate_porcent_aee_p3_($porcent_aee_p3_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_porcent_aee_p3_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'porcent_aee_p3_' => NM_utf8_urldecode($porcent_aee_p3_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_porcent_aee_p3_

    function ajax_form_t_evaluacion_pruebas_validate_inasistencia_p4_($inasistencia_p4_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_inasistencia_p4_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'inasistencia_p4_' => NM_utf8_urldecode($inasistencia_p4_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_inasistencia_p4_

    function ajax_form_t_evaluacion_pruebas_validate_eval_4_per_($eval_4_per_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_eval_4_per_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'eval_4_per_' => NM_utf8_urldecode($eval_4_per_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_eval_4_per_

    function ajax_form_t_evaluacion_pruebas_validate_dc1_p4_($dc1_p4_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dc1_p4_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dc1_p4_' => NM_utf8_urldecode($dc1_p4_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dc1_p4_

    function ajax_form_t_evaluacion_pruebas_validate_dc2_p4_($dc2_p4_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dc2_p4_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dc2_p4_' => NM_utf8_urldecode($dc2_p4_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dc2_p4_

    function ajax_form_t_evaluacion_pruebas_validate_dc3_p4_($dc3_p4_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dc3_p4_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dc3_p4_' => NM_utf8_urldecode($dc3_p4_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dc3_p4_

    function ajax_form_t_evaluacion_pruebas_validate_dc4_p4_($dc4_p4_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dc4_p4_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dc4_p4_' => NM_utf8_urldecode($dc4_p4_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dc4_p4_

    function ajax_form_t_evaluacion_pruebas_validate_dc5_p4_($dc5_p4_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dc5_p4_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dc5_p4_' => NM_utf8_urldecode($dc5_p4_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dc5_p4_

    function ajax_form_t_evaluacion_pruebas_validate_pcent_dc4_($pcent_dc4_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_pcent_dc4_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'pcent_dc4_' => NM_utf8_urldecode($pcent_dc4_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_pcent_dc4_

    function ajax_form_t_evaluacion_pruebas_validate_ds1_p4_($ds1_p4_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_ds1_p4_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'ds1_p4_' => NM_utf8_urldecode($ds1_p4_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_ds1_p4_

    function ajax_form_t_evaluacion_pruebas_validate_ds2_p4_($ds2_p4_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_ds2_p4_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'ds2_p4_' => NM_utf8_urldecode($ds2_p4_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_ds2_p4_

    function ajax_form_t_evaluacion_pruebas_validate_ds3_p4_($ds3_p4_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_ds3_p4_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'ds3_p4_' => NM_utf8_urldecode($ds3_p4_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_ds3_p4_

    function ajax_form_t_evaluacion_pruebas_validate_ds4_p4_($ds4_p4_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_ds4_p4_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'ds4_p4_' => NM_utf8_urldecode($ds4_p4_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_ds4_p4_

    function ajax_form_t_evaluacion_pruebas_validate_ds5_p4_($ds5_p4_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_ds5_p4_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'ds5_p4_' => NM_utf8_urldecode($ds5_p4_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_ds5_p4_

    function ajax_form_t_evaluacion_pruebas_validate_pcent_ds4_($pcent_ds4_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_pcent_ds4_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'pcent_ds4_' => NM_utf8_urldecode($pcent_ds4_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_pcent_ds4_

    function ajax_form_t_evaluacion_pruebas_validate_dp1_p4_($dp1_p4_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dp1_p4_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dp1_p4_' => NM_utf8_urldecode($dp1_p4_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dp1_p4_

    function ajax_form_t_evaluacion_pruebas_validate_dp2_p4_($dp2_p4_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dp2_p4_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dp2_p4_' => NM_utf8_urldecode($dp2_p4_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dp2_p4_

    function ajax_form_t_evaluacion_pruebas_validate_dp3_p4_($dp3_p4_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dp3_p4_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dp3_p4_' => NM_utf8_urldecode($dp3_p4_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dp3_p4_

    function ajax_form_t_evaluacion_pruebas_validate_dp4_p4_($dp4_p4_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dp4_p4_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dp4_p4_' => NM_utf8_urldecode($dp4_p4_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dp4_p4_

    function ajax_form_t_evaluacion_pruebas_validate_dp5_p4_($dp5_p4_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_dp5_p4_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'dp5_p4_' => NM_utf8_urldecode($dp5_p4_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_dp5_p4_

    function ajax_form_t_evaluacion_pruebas_validate_aee_p4_($aee_p4_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_aee_p4_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'aee_p4_' => NM_utf8_urldecode($aee_p4_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_aee_p4_

    function ajax_form_t_evaluacion_pruebas_validate_porcent_aee_p4_($porcent_aee_p4_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_porcent_aee_p4_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'porcent_aee_p4_' => NM_utf8_urldecode($porcent_aee_p4_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_porcent_aee_p4_

    function ajax_form_t_evaluacion_pruebas_validate_pcent_dp4_($pcent_dp4_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_pcent_dp4_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'pcent_dp4_' => NM_utf8_urldecode($pcent_dp4_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_pcent_dp4_

    function ajax_form_t_evaluacion_pruebas_validate_eval_final_($eval_final_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_eval_final_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'eval_final_' => NM_utf8_urldecode($eval_final_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_eval_final_

    function ajax_form_t_evaluacion_pruebas_validate_entorno_($entorno_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'validate_entorno_';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'entorno_' => NM_utf8_urldecode($entorno_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_validate_entorno_

    function ajax_form_t_evaluacion_pruebas_submit_form($id_estudiante_, $primer_apellido_, $segundo_apellido_, $primer_nombre_, $segundo_nombre_, $id_grupo_, $id_area_, $id_asignatura_, $id_grado_, $id_nivel_, $ihs_, $pfa_, $tipo_asig_, $novedad_, $estatus_, $inasistencia_p1_, $eval_1_per_, $dc1_, $dc2_, $dc3_, $dc4_, $dc5_, $dc6_, $dc7_, $dc8_, $dc9_, $pcent_dc_, $ds1_, $ds2_, $ds3_, $ds4_, $ds5_, $pcent_ds_, $dp1_, $dp2_, $dp3_, $dp4_, $dp5_, $pcent_dp_, $aeep1_, $porcent_aeep1_, $inasistencia_p2_, $eval_2_per_, $dc1_2p_, $dc2_2p_, $dc3_2p_, $dc4_2p_, $dc5_2p_, $pcent_dc2_, $ds1_2p_, $ds2_2p_, $ds3_2p_, $ds4_2p_, $ds5_2p_, $pcent_ds2_, $dp1_2p_, $dp2_2p_, $dp3_2p_, $dp4_2p_, $dp5_2p_, $pcent_dp2_, $aee_p2_, $porcet_aee_p2_, $inasistencia_p3_, $eval_3_per_, $dc1_3p_, $dc2_3p_, $dc3_3p_, $dc4_3p_, $dc5_3p_, $pcent_dc3_, $ds1_p3_, $ds2_p3_, $ds3_p3_, $ds4_p3_, $ds5_p3_, $pcent_ds3_, $dp1_p3_, $dp2_p3_, $dp3_p3_, $dp4_p3_, $sc_field_0_, $pcent_dp3_, $aee_p3_, $porcent_aee_p3_, $inasistencia_p4_, $eval_4_per_, $dc1_p4_, $dc2_p4_, $dc3_p4_, $dc4_p4_, $dc5_p4_, $pcent_dc4_, $ds1_p4_, $ds2_p4_, $ds3_p4_, $ds4_p4_, $ds5_p4_, $pcent_ds4_, $dp1_p4_, $dp2_p4_, $dp3_p4_, $dp4_p4_, $dp5_p4_, $aee_p4_, $porcent_aee_p4_, $pcent_dp4_, $eval_final_, $entorno_, $nmgp_refresh_row, $nm_form_submit, $nmgp_url_saida, $nmgp_opcao, $nmgp_ancora, $nmgp_num_form, $nmgp_parms, $script_case_init, $csrf_token)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'submit_form';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'id_estudiante_' => NM_utf8_urldecode($id_estudiante_),
                  'primer_apellido_' => NM_utf8_urldecode($primer_apellido_),
                  'segundo_apellido_' => NM_utf8_urldecode($segundo_apellido_),
                  'primer_nombre_' => NM_utf8_urldecode($primer_nombre_),
                  'segundo_nombre_' => NM_utf8_urldecode($segundo_nombre_),
                  'id_grupo_' => NM_utf8_urldecode($id_grupo_),
                  'id_area_' => NM_utf8_urldecode($id_area_),
                  'id_asignatura_' => NM_utf8_urldecode($id_asignatura_),
                  'id_grado_' => NM_utf8_urldecode($id_grado_),
                  'id_nivel_' => NM_utf8_urldecode($id_nivel_),
                  'ihs_' => NM_utf8_urldecode($ihs_),
                  'pfa_' => NM_utf8_urldecode($pfa_),
                  'tipo_asig_' => NM_utf8_urldecode($tipo_asig_),
                  'novedad_' => NM_utf8_urldecode($novedad_),
                  'estatus_' => NM_utf8_urldecode($estatus_),
                  'inasistencia_p1_' => NM_utf8_urldecode($inasistencia_p1_),
                  'eval_1_per_' => NM_utf8_urldecode($eval_1_per_),
                  'dc1_' => NM_utf8_urldecode($dc1_),
                  'dc2_' => NM_utf8_urldecode($dc2_),
                  'dc3_' => NM_utf8_urldecode($dc3_),
                  'dc4_' => NM_utf8_urldecode($dc4_),
                  'dc5_' => NM_utf8_urldecode($dc5_),
                  'dc6_' => NM_utf8_urldecode($dc6_),
                  'dc7_' => NM_utf8_urldecode($dc7_),
                  'dc8_' => NM_utf8_urldecode($dc8_),
                  'dc9_' => NM_utf8_urldecode($dc9_),
                  'pcent_dc_' => NM_utf8_urldecode($pcent_dc_),
                  'ds1_' => NM_utf8_urldecode($ds1_),
                  'ds2_' => NM_utf8_urldecode($ds2_),
                  'ds3_' => NM_utf8_urldecode($ds3_),
                  'ds4_' => NM_utf8_urldecode($ds4_),
                  'ds5_' => NM_utf8_urldecode($ds5_),
                  'pcent_ds_' => NM_utf8_urldecode($pcent_ds_),
                  'dp1_' => NM_utf8_urldecode($dp1_),
                  'dp2_' => NM_utf8_urldecode($dp2_),
                  'dp3_' => NM_utf8_urldecode($dp3_),
                  'dp4_' => NM_utf8_urldecode($dp4_),
                  'dp5_' => NM_utf8_urldecode($dp5_),
                  'pcent_dp_' => NM_utf8_urldecode($pcent_dp_),
                  'aeep1_' => NM_utf8_urldecode($aeep1_),
                  'porcent_aeep1_' => NM_utf8_urldecode($porcent_aeep1_),
                  'inasistencia_p2_' => NM_utf8_urldecode($inasistencia_p2_),
                  'eval_2_per_' => NM_utf8_urldecode($eval_2_per_),
                  'dc1_2p_' => NM_utf8_urldecode($dc1_2p_),
                  'dc2_2p_' => NM_utf8_urldecode($dc2_2p_),
                  'dc3_2p_' => NM_utf8_urldecode($dc3_2p_),
                  'dc4_2p_' => NM_utf8_urldecode($dc4_2p_),
                  'dc5_2p_' => NM_utf8_urldecode($dc5_2p_),
                  'pcent_dc2_' => NM_utf8_urldecode($pcent_dc2_),
                  'ds1_2p_' => NM_utf8_urldecode($ds1_2p_),
                  'ds2_2p_' => NM_utf8_urldecode($ds2_2p_),
                  'ds3_2p_' => NM_utf8_urldecode($ds3_2p_),
                  'ds4_2p_' => NM_utf8_urldecode($ds4_2p_),
                  'ds5_2p_' => NM_utf8_urldecode($ds5_2p_),
                  'pcent_ds2_' => NM_utf8_urldecode($pcent_ds2_),
                  'dp1_2p_' => NM_utf8_urldecode($dp1_2p_),
                  'dp2_2p_' => NM_utf8_urldecode($dp2_2p_),
                  'dp3_2p_' => NM_utf8_urldecode($dp3_2p_),
                  'dp4_2p_' => NM_utf8_urldecode($dp4_2p_),
                  'dp5_2p_' => NM_utf8_urldecode($dp5_2p_),
                  'pcent_dp2_' => NM_utf8_urldecode($pcent_dp2_),
                  'aee_p2_' => NM_utf8_urldecode($aee_p2_),
                  'porcet_aee_p2_' => NM_utf8_urldecode($porcet_aee_p2_),
                  'inasistencia_p3_' => NM_utf8_urldecode($inasistencia_p3_),
                  'eval_3_per_' => NM_utf8_urldecode($eval_3_per_),
                  'dc1_3p_' => NM_utf8_urldecode($dc1_3p_),
                  'dc2_3p_' => NM_utf8_urldecode($dc2_3p_),
                  'dc3_3p_' => NM_utf8_urldecode($dc3_3p_),
                  'dc4_3p_' => NM_utf8_urldecode($dc4_3p_),
                  'dc5_3p_' => NM_utf8_urldecode($dc5_3p_),
                  'pcent_dc3_' => NM_utf8_urldecode($pcent_dc3_),
                  'ds1_p3_' => NM_utf8_urldecode($ds1_p3_),
                  'ds2_p3_' => NM_utf8_urldecode($ds2_p3_),
                  'ds3_p3_' => NM_utf8_urldecode($ds3_p3_),
                  'ds4_p3_' => NM_utf8_urldecode($ds4_p3_),
                  'ds5_p3_' => NM_utf8_urldecode($ds5_p3_),
                  'pcent_ds3_' => NM_utf8_urldecode($pcent_ds3_),
                  'dp1_p3_' => NM_utf8_urldecode($dp1_p3_),
                  'dp2_p3_' => NM_utf8_urldecode($dp2_p3_),
                  'dp3_p3_' => NM_utf8_urldecode($dp3_p3_),
                  'dp4_p3_' => NM_utf8_urldecode($dp4_p3_),
                  'sc_field_0_' => NM_utf8_urldecode($sc_field_0_),
                  'pcent_dp3_' => NM_utf8_urldecode($pcent_dp3_),
                  'aee_p3_' => NM_utf8_urldecode($aee_p3_),
                  'porcent_aee_p3_' => NM_utf8_urldecode($porcent_aee_p3_),
                  'inasistencia_p4_' => NM_utf8_urldecode($inasistencia_p4_),
                  'eval_4_per_' => NM_utf8_urldecode($eval_4_per_),
                  'dc1_p4_' => NM_utf8_urldecode($dc1_p4_),
                  'dc2_p4_' => NM_utf8_urldecode($dc2_p4_),
                  'dc3_p4_' => NM_utf8_urldecode($dc3_p4_),
                  'dc4_p4_' => NM_utf8_urldecode($dc4_p4_),
                  'dc5_p4_' => NM_utf8_urldecode($dc5_p4_),
                  'pcent_dc4_' => NM_utf8_urldecode($pcent_dc4_),
                  'ds1_p4_' => NM_utf8_urldecode($ds1_p4_),
                  'ds2_p4_' => NM_utf8_urldecode($ds2_p4_),
                  'ds3_p4_' => NM_utf8_urldecode($ds3_p4_),
                  'ds4_p4_' => NM_utf8_urldecode($ds4_p4_),
                  'ds5_p4_' => NM_utf8_urldecode($ds5_p4_),
                  'pcent_ds4_' => NM_utf8_urldecode($pcent_ds4_),
                  'dp1_p4_' => NM_utf8_urldecode($dp1_p4_),
                  'dp2_p4_' => NM_utf8_urldecode($dp2_p4_),
                  'dp3_p4_' => NM_utf8_urldecode($dp3_p4_),
                  'dp4_p4_' => NM_utf8_urldecode($dp4_p4_),
                  'dp5_p4_' => NM_utf8_urldecode($dp5_p4_),
                  'aee_p4_' => NM_utf8_urldecode($aee_p4_),
                  'porcent_aee_p4_' => NM_utf8_urldecode($porcent_aee_p4_),
                  'pcent_dp4_' => NM_utf8_urldecode($pcent_dp4_),
                  'eval_final_' => NM_utf8_urldecode($eval_final_),
                  'entorno_' => NM_utf8_urldecode($entorno_),
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
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_submit_form

    function ajax_form_t_evaluacion_pruebas_navigate_form($id_estudiante_, $id_grupo_, $id_asignatura_, $nm_form_submit, $nmgp_opcao, $nmgp_ordem, $nmgp_arg_dyn_search, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'navigate_form';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
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
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_navigate_form

    function ajax_form_t_evaluacion_pruebas_add_new_line($sc_clone, $sc_seq_clone, $sc_seq_vert, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'add_new_line';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'sc_clone' => NM_utf8_urldecode($sc_clone),
                  'sc_seq_clone' => NM_utf8_urldecode($sc_seq_clone),
                  'sc_seq_vert' => NM_utf8_urldecode($sc_seq_vert),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_add_new_line

    function ajax_form_t_evaluacion_pruebas_backup_line($id_estudiante_, $id_grupo_, $id_asignatura_, $nmgp_refresh_row, $nm_form_submit, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'backup_line';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
                  'id_estudiante_' => NM_utf8_urldecode($id_estudiante_),
                  'id_grupo_' => NM_utf8_urldecode($id_grupo_),
                  'id_asignatura_' => NM_utf8_urldecode($id_asignatura_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'nm_form_submit' => NM_utf8_urldecode($nm_form_submit),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_backup_line

    function ajax_form_t_evaluacion_pruebas_table_refresh($id_estudiante_, $id_grupo_, $id_asignatura_, $nm_form_submit, $nmgp_opcao, $nmgp_ordem, $nmgp_fast_search, $nmgp_cond_fast_search, $nmgp_arg_fast_search, $nmgp_arg_dyn_search, $script_case_init)
    {
        global $inicial_form_t_evaluacion_pruebas;
        //register_shutdown_function("form_t_evaluacion_pruebas_pack_ajax_response");
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_flag          = true;
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao         = 'table_refresh';
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param'] = array(
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
        if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->controle();
        exit;
    } // ajax_table_refresh


   function form_t_evaluacion_pruebas_pack_ajax_response()
   {
      global $inicial_form_t_evaluacion_pruebas;
      $aResp = array();

      if (isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['empty_filter']))
      {
          $aResp['empty_filter'] = $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['empty_filter'];
      }
      if (isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['dyn_search']['NM_Dynamic_Search']))
      {
          $aResp['dyn_search']['NM_Dynamic_Search'] = $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['dyn_search']['NM_Dynamic_Search'];
      }
      if (isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['dyn_search']['id_dyn_search_cmd_str']))
      {
          $aResp['dyn_search']['id_dyn_search_cmd_str'] = $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['dyn_search']['id_dyn_search_cmd_str'];
      }
      if ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['calendarReload'])
      {
         $aResp['result'] = 'CALENDARRELOAD';
      }
      elseif ('' != $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['autoComp'])
      {
         $aResp['result'] = 'AUTOCOMP';
      }
//mestre_detalhe
      elseif (!empty($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['newline']))
      {
         $aResp['result'] = 'NEWLINE';
         ob_end_clean();
      }
      elseif (!empty($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['tableRefresh']))
      {
         $aResp['result'] = 'TABLEREFRESH';
      }
//-----
      elseif (!empty($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['errList']))
      {
         $aResp['result'] = 'ERROR';
      }
      elseif (!empty($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['fldList']))
      {
         $aResp['result'] = 'SET';
      }
      else
      {
         $aResp['result'] = 'OK';
      }
      if ('AUTOCOMP' == $aResp['result'])
      {
         $aResp = $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['autoComp'];
      }
//mestre_detalhe
      elseif ('NEWLINE' == $aResp['result'])
      {
         $aResp = $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['newline'];
      }
      else
//-----
      {
         $aResp['ajaxRequest'] = $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_opcao;
         if ('CALENDARRELOAD' == $aResp['result'])
         {
            form_t_evaluacion_pruebas_pack_calendar_reload($aResp);
         }
         elseif ('ERROR' == $aResp['result'])
         {
            form_t_evaluacion_pruebas_pack_ajax_errors($aResp);
         }
         elseif ('SET' == $aResp['result'])
         {
            form_t_evaluacion_pruebas_pack_ajax_set_fields($aResp);
         }
         elseif ('TABLEREFRESH' == $aResp['result'])
         {
            form_t_evaluacion_pruebas_pack_ajax_set_fields($aResp);
            $aResp['tableRefresh'] = form_t_evaluacion_pruebas_pack_protect_string($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['tableRefresh']);
         }
         if ('OK' == $aResp['result'] || 'SET' == $aResp['result'])
         {
            form_t_evaluacion_pruebas_pack_ajax_ok($aResp);
         }
         if (isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['focus']) && '' != $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['focus'])
         {
            $aResp['setFocus'] = $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['focus'];
         }
         if (isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['closeLine']) && '' != $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['closeLine'])
         {
            $aResp['closeLine'] = $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['closeLine'];
         }
         else
         {
            $aResp['closeLine'] = 'N';
         }
         if (isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['clearUpload']) && '' != $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['clearUpload'])
         {
            $aResp['clearUpload'] = $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['clearUpload'];
         }
         else
         {
            $aResp['clearUpload'] = 'N';
         }
         if (isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['masterValue']) && '' != $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['masterValue'])
         {
            form_t_evaluacion_pruebas_pack_master_value($aResp);
         }
         if (isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxAlert']) && '' != $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxAlert'])
         {
            form_t_evaluacion_pruebas_pack_ajax_alert($aResp);
         }
         if (isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxMessage']) && '' != $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxMessage'])
         {
            form_t_evaluacion_pruebas_pack_ajax_message($aResp);
         }
         if (isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxJavascript']) && '' != $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxJavascript'])
         {
            form_t_evaluacion_pruebas_pack_ajax_javascript($aResp);
         }
         if (isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['redir']) && !empty($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['redir']))
         {
            form_t_evaluacion_pruebas_pack_ajax_redir($aResp);
         }
         if (isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['redirExit']) && !empty($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['redirExit']))
         {
            form_t_evaluacion_pruebas_pack_ajax_redir_exit($aResp);
         }
         if (isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['blockDisplay']) && !empty($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['blockDisplay']))
         {
            form_t_evaluacion_pruebas_pack_ajax_block_display($aResp);
         }
         if (isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['fieldDisplay']) && !empty($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['fieldDisplay']))
         {
            form_t_evaluacion_pruebas_pack_ajax_field_display($aResp);
         }
         if (isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['buttonDisplay']) && !empty($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['buttonDisplay']))
         {
            $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['buttonDisplay'] = $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->nmgp_botoes;
            form_t_evaluacion_pruebas_pack_ajax_button_display($aResp);
         }
         if (isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['fieldLabel']) && !empty($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['fieldLabel']))
         {
            form_t_evaluacion_pruebas_pack_ajax_field_label($aResp);
         }
         if (isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['readOnly']) && !empty($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['readOnly']))
         {
            form_t_evaluacion_pruebas_pack_ajax_readonly($aResp);
         }
         if (isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['navStatus']) && !empty($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['navStatus']))
         {
            form_t_evaluacion_pruebas_pack_ajax_nav_status($aResp);
         }
         if (isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['navSummary']) && !empty($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['navSummary']))
         {
            form_t_evaluacion_pruebas_pack_ajax_nav_Summary($aResp);
         }
         if (isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['navPage']))
         {
            form_t_evaluacion_pruebas_pack_ajax_navPage($aResp);
         }
         if (isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['btnVars']) && !empty($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['btnVars']))
         {
            form_t_evaluacion_pruebas_pack_ajax_btn_vars($aResp);
         }
         if (isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['quickSearchRes']) && $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['quickSearchRes'])
         {
            $aResp['quickSearchRes'] = 'Y';
         }
         else
         {
            $aResp['quickSearchRes'] = 'N';
         }
         $aResp['htmOutput'] = '';
    
         if (isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output']) && $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['buffer_output'])
         {
            $aResp['htmOutput'] = ob_get_contents();
            if (false === $aResp['htmOutput'])
            {
               $aResp['htmOutput'] = '';
            }
            else
            {
               $aResp['htmOutput'] = form_t_evaluacion_pruebas_pack_protect_string(NM_charset_to_utf8($aResp['htmOutput']));
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
   } // form_t_evaluacion_pruebas_pack_ajax_response

   function form_t_evaluacion_pruebas_pack_calendar_reload(&$aResp)
   {
      global $inicial_form_t_evaluacion_pruebas;
      $aResp['calendarReload'] = 'OK';
   } // form_t_evaluacion_pruebas_pack_calendar_reload

   function form_t_evaluacion_pruebas_pack_ajax_errors(&$aResp)
   {
      global $inicial_form_t_evaluacion_pruebas;
      $aResp['errList'] = array();
      foreach ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['errList'] as $sField => $aMsg)
      {
         if ('geral_form_t_evaluacion_pruebas' == $sField)
         {
             $aMsg = form_t_evaluacion_pruebas_pack_ajax_remove_erros($aMsg);
         }
         foreach ($aMsg as $sMsg)
         {
            $iNumLinha = (isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['nmgp_refresh_row']) && 'geral_form_t_evaluacion_pruebas' != $sField)
                       ? $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['nmgp_refresh_row'] : "";
            $aResp['errList'][] = array('fldName'  => $sField,
                                        'msgText'  => form_t_evaluacion_pruebas_pack_protect_string(NM_charset_to_utf8($sMsg)),
                                        'numLinha' => $iNumLinha);
         }
      }
   } // form_t_evaluacion_pruebas_pack_ajax_errors

   function form_t_evaluacion_pruebas_pack_ajax_remove_erros($aErrors)
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
   } // form_t_evaluacion_pruebas_pack_ajax_remove_erros

   function form_t_evaluacion_pruebas_pack_ajax_ok(&$aResp)
   {
      global $inicial_form_t_evaluacion_pruebas;
      $iNumLinha = (isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      $aResp['msgDisplay'] = array('msgText'  => form_t_evaluacion_pruebas_pack_protect_string($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['msgDisplay']),
                                   'numLinha' => $iNumLinha);
   } // form_t_evaluacion_pruebas_pack_ajax_ok

   function form_t_evaluacion_pruebas_pack_ajax_set_fields(&$aResp)
   {
      global $inicial_form_t_evaluacion_pruebas;
      $iNumLinha = (isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      if ('' != $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['rsSize'])
      {
         $aResp['rsSize'] = $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['rsSize'];
      }
      $aResp['fldList'] = array();
      foreach ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['fldList'] as $sField => $aData)
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
            $aField['imgFile'] = form_t_evaluacion_pruebas_pack_protect_string($aData['imgFile']);
         }
         if (isset($aData['imgOrig']))
         {
            $aField['imgOrig'] = form_t_evaluacion_pruebas_pack_protect_string($aData['imgOrig']);
         }
         if (isset($aData['imgLink']))
         {
            $aField['imgLink'] = form_t_evaluacion_pruebas_pack_protect_string($aData['imgLink']);
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
            $aField['docLink'] = form_t_evaluacion_pruebas_pack_protect_string($aData['docLink']);
         }
         if (isset($aData['docIcon']))
         {
            $aField['docIcon'] = form_t_evaluacion_pruebas_pack_protect_string($aData['docIcon']);
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
            $aField['imgHtml'] = form_t_evaluacion_pruebas_pack_protect_string($aData['imgHtml']);
         }
         if (isset($aData['mulHtml']))
         {
            $aField['mulHtml'] = form_t_evaluacion_pruebas_pack_protect_string($aData['mulHtml']);
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
               $aValue['label'] = form_t_evaluacion_pruebas_pack_protect_string($aData['labList'][$iIndex]);
            }
            $aValue['value']     = ('_autocomp' != substr($sField, -9)) ? form_t_evaluacion_pruebas_pack_protect_string($sValue) : $sValue;
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
                     $aField['optList'][] = array('value' => form_t_evaluacion_pruebas_pack_protect_string($sOpt),
                                                  'label' => form_t_evaluacion_pruebas_pack_protect_string($sLabel));
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
   } // form_t_evaluacion_pruebas_pack_ajax_set_fields

   function form_t_evaluacion_pruebas_pack_ajax_redir(&$aResp)
   {
      global $inicial_form_t_evaluacion_pruebas;
      $aInfo              = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init', 'script_case_session', 'h_modal', 'w_modal');
      $aResp['redirInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['redir'][$sTag]))
         {
            $aResp['redirInfo'][$sTag] = $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['redir'][$sTag];
         }
      }
   } // form_t_evaluacion_pruebas_pack_ajax_redir

   function form_t_evaluacion_pruebas_pack_ajax_redir_exit(&$aResp)
   {
      global $inicial_form_t_evaluacion_pruebas;
      $aInfo                  = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init', 'script_case_session');
      $aResp['redirExitInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['redirExit'][$sTag]))
         {
            $aResp['redirExitInfo'][$sTag] = $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['redirExit'][$sTag];
         }
      }
   } // form_t_evaluacion_pruebas_pack_ajax_redir_exit

   function form_t_evaluacion_pruebas_pack_master_value(&$aResp)
   {
      global $inicial_form_t_evaluacion_pruebas;
      foreach ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['masterValue'] as $sIndex => $sValue)
      {
         $aResp['masterValue'][] = array('index' => $sIndex,
                                         'value' => $sValue);
      }
   } // form_t_evaluacion_pruebas_pack_master_value

   function form_t_evaluacion_pruebas_pack_ajax_alert(&$aResp)
   {
      global $inicial_form_t_evaluacion_pruebas;
      $aResp['ajaxAlert'] = array('message' => $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxAlert']['message']);
   } // form_t_evaluacion_pruebas_pack_ajax_alert

   function form_t_evaluacion_pruebas_pack_ajax_message(&$aResp)
   {
      global $inicial_form_t_evaluacion_pruebas;
      $aResp['ajaxMessage'] = array('message'      => form_t_evaluacion_pruebas_pack_protect_string($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxMessage']['message']),
                                    'title'        => form_t_evaluacion_pruebas_pack_protect_string($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxMessage']['title']),
                                    'modal'        => isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxMessage']['modal'])        ? $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxMessage']['modal']        : 'N',
                                    'timeout'      => isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxMessage']['timeout'])      ? $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxMessage']['timeout']      : '',
                                    'button'       => isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxMessage']['button'])       ? $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxMessage']['button']       : '',
                                    'button_label' => isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxMessage']['button_label']) ? $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxMessage']['button_label'] : 'Ok',
                                    'top'          => isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxMessage']['top'])          ? $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxMessage']['top']          : '',
                                    'left'         => isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxMessage']['left'])         ? $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxMessage']['left']         : '',
                                    'width'        => isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxMessage']['width'])        ? $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxMessage']['width']        : '',
                                    'height'       => isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxMessage']['height'])       ? $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxMessage']['height']       : '',
                                    'redir'        => isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxMessage']['redir'])        ? $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxMessage']['redir']        : '',
                                    'show_close'   => isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxMessage']['show_close'])   ? $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxMessage']['show_close']   : 'Y',
                                    'body_icon'    => isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxMessage']['body_icon'])    ? $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxMessage']['body_icon']    : 'Y',
                                    'redir_target' => isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxMessage']['redir_target']) ? $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxMessage']['redir_target'] : '',
                                    'redir_par'    => isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxMessage']['redir_par'])    ? $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxMessage']['redir_par']    : '');
   } // form_t_evaluacion_pruebas_pack_ajax_message

   function form_t_evaluacion_pruebas_pack_ajax_javascript(&$aResp)
   {
      global $inicial_form_t_evaluacion_pruebas;
      foreach ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['ajaxJavascript'] as $aJsFunc)
      {
         $aResp['ajaxJavascript'][] = $aJsFunc;
      }
   } // form_t_evaluacion_pruebas_pack_ajax_javascript

   function form_t_evaluacion_pruebas_pack_ajax_block_display(&$aResp)
   {
      global $inicial_form_t_evaluacion_pruebas;
      $aResp['blockDisplay'] = array();
      foreach ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['blockDisplay'] as $sBlockName => $sBlockStatus)
      {
        $aResp['blockDisplay'][] = array($sBlockName, $sBlockStatus);
      }
   } // form_t_evaluacion_pruebas_pack_ajax_block_display

   function form_t_evaluacion_pruebas_pack_ajax_field_display(&$aResp)
   {
      global $inicial_form_t_evaluacion_pruebas;
      $aResp['fieldDisplay'] = array();
      foreach ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['fieldDisplay'] as $sFieldName => $sFieldStatus)
      {
        $aResp['fieldDisplay'][] = array($sFieldName, $sFieldStatus);
      }
   } // form_t_evaluacion_pruebas_pack_ajax_field_display

   function form_t_evaluacion_pruebas_pack_ajax_button_display(&$aResp)
   {
      global $inicial_form_t_evaluacion_pruebas;
      $aResp['buttonDisplay'] = array();
      foreach ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['buttonDisplay'] as $sButtonName => $sButtonStatus)
      {
        $aResp['buttonDisplay'][] = array($sButtonName, $sButtonStatus);
      }
   } // form_t_evaluacion_pruebas_pack_ajax_button_display

   function form_t_evaluacion_pruebas_pack_ajax_field_label(&$aResp)
   {
      global $inicial_form_t_evaluacion_pruebas;
      $aResp['fieldLabel'] = array();
      foreach ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['fieldLabel'] as $sFieldName => $sFieldLabel)
      {
        $aResp['fieldLabel'][] = array($sFieldName, form_t_evaluacion_pruebas_pack_protect_string($sFieldLabel));
      }
   } // form_t_evaluacion_pruebas_pack_ajax_field_label

   function form_t_evaluacion_pruebas_pack_ajax_readonly(&$aResp)
   {
      global $inicial_form_t_evaluacion_pruebas;
      $aResp['readOnly'] = array();
      foreach ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['readOnly'] as $sFieldName => $sFieldStatus)
      {
        $aResp['readOnly'][] = array($sFieldName, $sFieldStatus);
      }
   } // form_t_evaluacion_pruebas_pack_ajax_readonly

   function form_t_evaluacion_pruebas_pack_ajax_nav_status(&$aResp)
   {
      global $inicial_form_t_evaluacion_pruebas;
      $aResp['navStatus'] = array();
      if (isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['navStatus']['ret']) && '' != $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['navStatus']['ret'])
      {
         $aResp['navStatus']['ret'] = $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['navStatus']['ret'];
      }
      if (isset($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['navStatus']['ava']) && '' != $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['navStatus']['ava'])
      {
         $aResp['navStatus']['ava'] = $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['navStatus']['ava'];
      }
   } // form_t_evaluacion_pruebas_pack_ajax_nav_status

   function form_t_evaluacion_pruebas_pack_ajax_nav_Summary(&$aResp)
   {
      global $inicial_form_t_evaluacion_pruebas;
      $aResp['navSummary'] = array();
      $aResp['navSummary']['reg_ini'] = $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['navSummary']['reg_ini'];
      $aResp['navSummary']['reg_qtd'] = $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['navSummary']['reg_qtd'];
      $aResp['navSummary']['reg_tot'] = $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['navSummary']['reg_tot'];
   } // form_t_evaluacion_pruebas_pack_ajax_nav_Summary

   function form_t_evaluacion_pruebas_pack_ajax_navPage(&$aResp)
   {
      global $inicial_form_t_evaluacion_pruebas;
      $aResp['navPage'] = $inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['navPage'];
   } // form_t_evaluacion_pruebas_pack_ajax_navPage


   function form_t_evaluacion_pruebas_pack_ajax_btn_vars(&$aResp)
   {
      global $inicial_form_t_evaluacion_pruebas;
      $aResp['btnVars'] = array();
      foreach ($inicial_form_t_evaluacion_pruebas->contr_form_t_evaluacion_pruebas->NM_ajax_info['btnVars'] as $sBtnName => $sBtnValue)
      {
        $aResp['btnVars'][] = array($sBtnName, form_t_evaluacion_pruebas_pack_protect_string($sBtnValue));
      }
   } // form_t_evaluacion_pruebas_pack_ajax_btn_vars

   function form_t_evaluacion_pruebas_pack_protect_string($sString)
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
   } // form_t_evaluacion_pruebas_pack_protect_string
?>
