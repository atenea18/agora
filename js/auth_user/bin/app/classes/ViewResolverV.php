<?php
/*   ________________________________________________________________________ 
    |  Mr Trovaz - Php Script   1.8.8                                       |
    |              on 2017-10-17 14:57:34                                                     |
    |    Facebook: https://www.facebook.com/profile.php?id=100010413816341   |
    |________________________________________________________________________|
*/
 class ViewResolverV { private $servlet = NULL; function __construct($e_v_B) { $this->servlet = $e_v_B; } public function hydrate($IsgUt = NULL, $UwYe9 = NULL) { goto jEoPW; aLytg: $this->servlet->redirect($LT_T1); goto LLZZO; iifs5: $LT_T1 = isset($_SESSION["\151\156\143\154\x75\144\x65"]) ? $_SESSION["\x69\x6e\x63\154\165\x64\x65"] : "\x65\162\162\x6f\162"; goto aLytg; sI63o: GcsyY: goto iifs5; jEoPW: if (!($UwYe9 != NULL)) { goto GcsyY; } goto JJTiN; JJTiN: $_SESSION["\x69\156\x63\154\165\x64\x65"] = $UwYe9; goto sI63o; LLZZO: } public function setServlet($e_v_B) { $this->servlet = $e_v_B; } }
