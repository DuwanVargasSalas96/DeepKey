/*--------------------------------------
  Keys UI
--------------------------------------*/

/* Controls to show data */
function showKeyData(deepKeyID) {
    // Change controls
    $("#btnEditKey, #btnDeleteKey").show();
    $("#btnDeleteKey").val(deepKeyID);
    $("#formKey input, #formKey textarea").attr("readonly", "true");
    $("#keyName, #modalKeys .modal-content .modal-footer").hide();
    $("#modalKeys").modal("show");
}


/* Create key */
$(document).on("click", "#btnNewKey", function () {
    // Change controls
    $("#modalKeys .modal-title").text("Registrar Key");
    $("#btnEditKey, #btnDeleteKey").hide();
    $("#btnDeleteKey").val("");
    $("#formKey input, #formKey textarea").show().removeAttr("readonly").val("");
    $("#modalKeys .modal-content .modal-footer").show();
    $("#modalKeys").modal("show");
});


/* Show key data */
$(document).on("click", "#keyList > li", function () {
    // Change controls
    showKeyData($(this).val());
});


/* Edit key */
$(document).on("click", "#btnEditKey", function() {
    // Change controls
    $("#modalKeys .modal-title").text("Editando Key");
    $("#btnEditKey, #btnDeleteKey").hide();
    $("#formKey input, #formKey textarea").removeAttr("readonly");
    $("#keyName, #modalKeys .modal-content .modal-footer").show();
});