$(document).on("change", ".uploadProfileInput", function () {
    var triggerInput = this;
    var currentImg = $(this).closest(".pic-holder").find(".pic").attr("src");
    var holder = $(this).closest(".pic-holder");
    var wrapper = $(this).closest(".profile-pic-wrapper");
    $(wrapper).find('[role="alert"]').remove();
    var files = !!this.files ? this.files : [];
    if (!files.length || !window.FileReader) {
        return;
    }
    if (/^image/.test(files[0].type)) {
        var reader = new FileReader();
        reader.readAsDataURL(files[0]);

        reader.onloadend = function () {
            $(holder).addClass("uploadInProgress");
            $(holder).find(".pic").attr("src", this.result);
            $(holder).append(
                '<div class="upload-loader"><div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div></div>'
            );

            setTimeout(() => {
                $(holder).removeClass("uploadInProgress");
                $(holder).find(".upload-loader").remove();
            }, 1500);
        };
    } else {
        $(wrapper).append(
            '<div class="snackbar show" role="alert"><i class="fa fa-times-circle text-danger"></i> Ocorreu um erro. Tente novamente</div>'
        );

        $(holder).find(".pic").attr("src", "../includes/images/user2.png");
        $(triggerInput).val("");

        setTimeout(() => {
            $(wrapper).find('[role="alert"]').remove();
        }, 3000);
    }
});

$(document).ready(function () {
    var $cpfInput = $("#cpf");
    var $phoneInput = $("#phone");

    $cpfInput.mask('000.000.000-00');
    $phoneInput.mask('00 00000-0000');

    var i = $("form input, form select").not(":input[type=file], :input[type=checkbox]").length;
    $("form input, form select").not(":input[type=file], :input[type=checkbox]").each(function(index) {
        validateFields(this);
        $(this).on("input", function() {
            validateFields(this);
            if ($(".is-valid").length == i) {
                $("button[type=submit]").attr("disabled", false);
            } else {
                $("button[type=submit]").attr("disabled", true);
            }
        });
    });
});

const modal = document.getElementById('deleteModal');
modal.addEventListener('show.mdb.modal', (event) => {
  let id = $(event.relatedTarget).data("userid");
  let name = $(event.relatedTarget).data("name");

  $("#deleteId").text(id);
  $("#deleteName").text(name);

  $("#deleteBtn").attr("href", "../public/delete.php?id=" + id);
});

function validateFields(el) {
    switch (el.id) {
        case "name":
            if ($(el).val() != "") {
                $(el).addClass("is-valid");
                $(el).removeClass("is-invalid");
            } else {
                $(el).addClass("is-invalid");
                $(el).removeClass("is-valid");
            }
            break;

        case "email":
            if (isEmail($(el).val())) {
                $(el).addClass("is-valid");
                $(el).removeClass("is-invalid");
            } else {
                $(el).addClass("is-invalid");
                $(el).removeClass("is-valid");
            }
            break;

        case "cpf":
            if (isCpf($(el).val())) {
                $(el).addClass("is-valid");
                $(el).removeClass("is-invalid");
            } else {
                $(el).addClass("is-invalid");
                $(el).removeClass("is-valid");
            }
            break;

        case "phone":
            if (($(el).val()).length == 13) {
                $(el).addClass("is-valid");
                $(el).removeClass("is-invalid");
            } else {
                $(el).addClass("is-invalid");
                $(el).removeClass("is-valid");
            }
            break;

        case "datebirth":
            if ($(el).val() != "") {
                $(el).addClass("is-valid");
                $(el).removeClass("is-invalid");
            } else {
                $(el).addClass("is-invalid");
                $(el).removeClass("is-valid");
            }
            break;

        case "username":
            if ($(el).val() != "") {
                $(el).addClass("is-valid");
                $(el).removeClass("is-invalid");
            } else {
                $(el).addClass("is-invalid");
                $(el).removeClass("is-valid");
            }
            break;

        case "password":
            if (($(el).val()).length >= 4) {
                $(el).addClass("is-valid");
                $(el).removeClass("is-invalid");
            } else {
                $(el).addClass("is-invalid");
                $(el).removeClass("is-valid");
            }
            break;
    
        default:
            break;
    }
}

function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

function isCpf(cpf) {
    exp = /\.|-/g;
    cpf = cpf.toString().replace(exp, "");
    var digitoDigitado = eval(cpf.charAt(9) + cpf.charAt(10));
    var soma1 = 0,
            soma2 = 0;
    var vlr = 11;
    for (i = 0; i < 9; i++) {
        soma1 += eval(cpf.charAt(i) * (vlr - 1));
        soma2 += eval(cpf.charAt(i) * vlr);
        vlr--;
    }
    soma1 = (((soma1 * 10) % 11) === 10 ? 0 : ((soma1 * 10) % 11));
    soma2 = (((soma2 + (2 * soma1)) * 10) % 11);
    if (cpf === "11111111111" || cpf === "22222222222" || cpf === "33333333333" || cpf === "44444444444" || cpf === "55555555555" || cpf === "66666666666" || cpf === "77777777777" || cpf === "88888888888" || cpf === "99999999999" || cpf === "00000000000") {
        var digitoGerado = null;
    } else {
        var digitoGerado = (soma1 * 10) + soma2;
    }
    if (digitoGerado !== digitoDigitado) {
        return false;
    }
    return true;
}
