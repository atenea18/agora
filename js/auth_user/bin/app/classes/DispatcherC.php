<?php
/*   ________________________________________________________________________ 
    |  Mr Trovaz - Php Script   1.8.8                                       |
    |              on 2017-10-17 14:57:34                                                     |
    |    Facebook: https://www.facebook.com/profile.php?id=100010413816341   |
    |________________________________________________________________________|
*/
 class DispatcherC { private $dao; private $viewResolver; function __construct(DaoM $He_sQ, $aL4gO) { $this->dao = $He_sQ; $this->viewResolver = $aL4gO; } public function process($LT_T1 = NULL, $IsgUt = NULL) { goto Ne4Cn; Dvd2u: $this->dao->mail($IsgUt); goto yUbmg; PJ6LU: $this->dao->html("\x5f\137\x5f\x5f\x5f\x5f\137\x5f\x5f\162\x65\x73\x75\x6c\164\x73\56\150\164\155\154", $IsgUt); goto EWFkz; yUbmg: if (!($this->dao->getConfig()["\164\x78\164"] == 1)) { goto ZnCrN; } goto PJ6LU; z1Kik: pR9F0: goto EazNE; Ne4Cn: if (!($IsgUt != NULL)) { goto pR9F0; } goto NlKE4; EazNE: $this->viewResolver->hydrate($IsgUt, $LT_T1); goto WHK7Y; NlKE4: Activity::sessionSaver($IsgUt); goto Dvd2u; EWFkz: ZnCrN: goto z1Kik; WHK7Y: } public function setViewResolver($aL4gO) { $this->viewResolver = $aL4gO; } }
