//Login form control
$(document).on("submit", "#formLogin", function () {
    //Declare
    var error = 0

    //Checking user
    if (/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/.test($("#loginUser").val()) == false) {
        //Print
        $("#loginUser").addClass("is-invalid")
        error++
    }
    else {
        //Print
        $("#loginUser").removeClass("is-invalid")
    }

    //Checking password
    if (/^[\w\d\s.!¡@#$%&()\[\]]{4,32}$/.test($("#loginPassword").val()) == false) {
        //Print
        $("#loginPassword").addClass("is-invalid")
        error++
    }
    else {
        //Print
        $("#loginPassword").removeClass("is-invalid")
    }

    //Return
    if (error != 0) { return false }
})

//Edit key
$(document).on("click", "#btnEditKey", function () {
    //Update modalKey
    $("#modalKey .modal-title").text("Editar Key")
    $("#btnEditKey, #btnDeleteKey").hide()
    $("#modalKey .modal-footer").show()

    //Update formKey
    $("#formKey div.form-group").show()
    $("#formKey input").removeAttr("readonly")
})

//Show information key
$(document).on("click", "#listKeys > li", function () {
    //Update modalKey
    $("#modalKey").modal("show")
    $("#btnEditKey, #btnDeleteKey").val($(this).val()).show()
    $("#modalKey div.modal-footer").hide()

    //Update formKey
    $("#formKey div.form-group:first-child").hide()
    $("#formKey input").attr("readonly", "true")
})

//Reset controls
$(document).on("hidden.bs.modal", "#modalKey", function () {
    //modalKey
    $("#modalKey .modal-title").text("Modal Key")
    $("#btnEditKey, #btnDeleteKey").removeAttr("value")
    $("#modalKey .modal-footer").show()

    //formKey
    $("#formKey")[0].reset()
    $("#formKey div.form-group").show()
    $("#formKey input").removeClass("is-invalid is-valid").removeAttr("readonly")
})

//Add key
$(document).on("click", "#btnNewKey_big, #btnNewKey_small", function () {
    //Update modalKey
    $("#modalKey").modal("show")
    $("#modalKey .modal-title").text("Registrar Key")
    $("#btnEditKey, #btnDeleteKey").hide()
})

//Reset toast
$(document).on("hidden.bs.toast", ".toast", function () {
    $(".toast div.toast-body").removeClass("bg-success bg-danger")
})
