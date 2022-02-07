// List keys
function listKeys() {
    $.ajax({
        url: "controllers/keys.php",
        type: "POST",
        data: { "listRequest": true },
        success: function (reply) {
            // Print
            $("#listKeys").html(reply)
        },
        error: function (jqXHR, state, error) {
            // Log
            console.log(error)
        }
    })
}

// Delete key
$(document).on("click", "#btnDeleteKey", function () {
    $.ajax({
        url: "controllers/keys.php",
        type: "POST",
        data: { "deleteKey": $(this).val() },
        success: function (reply) {
            // Toast
            $(".toast").toast("show")
            // Print
            if (reply == 1) {
                $(".toast .toast-body").addClass("bg-success").text("Key eliminada")
            }
            else {
                $(".toast .toast-body").addClass("bg-danger").text("Key no eliminada")
            }
        },
        error: function (jqXHR, state, error) {
            // Log
            console.log(error)
        },
        complete: function (jqXHR, state) {
            // Modal
            $("#modalKey").modal("hide")
            // Update list keys
            listKeys()
        }
    })
})

// Show information key
$(document).on("click", "#listKeys > li", function () {
    $.ajax({
        url: "controllers/keys.php",
        type: "POST",
        data: { "informationKey": $(this).val() },
        success: function (reply) {
            // Convert data
            var data = JSON.parse(reply)
            // Print
            $(".modal-title").text(data["Name"])
            $("#formKey input#keyName").val(data["Name"])
            $("#formKey input#keyUser").val(data["User"])
            $("#formKey input#keyPassword").val(data["Password"])
        },
        error: function (jqXHR, state, error) {
            // Log
            console.log(error)
        }
    })
})

// Submit modalKey
$(document).on("submit", "#formKey", function (e) {
    // Avoid default process
    e.preventDefault()

    // Declare
    var error = 0

    // Check key name
    if (/^[\w\d\sñÑáéíóúÁÉÍÓÚ.]{3,32}$/.test($("#keyName").val()) == false) {
        // Print
        $("#keyName").addClass("is-invalid")
        error++
    }
    else {
        // Print
        $("#keyName").removeClass("is-invalid").addClass("is-valid")
    }

    // Check key user
    if (/^[\w\d\sñÑáéíóúÁÉÍÓÚ.@]{5,32}$/.test($("#keyUser").val()) == false) {
        // Print
        $("#keyUser").addClass("is-invalid")
        error++
    }
    else {
        // Print
        $("#keyUser").removeClass("is-invalid").addClass("is-valid")
    }

    // Check key password
    if (/^[\w\d\s.!¡@#$%&()\[\]]{3,32}$/.test($("#keyPassword").val()) == false) {
        // Print
        $("#keyPassword").addClass("is-invalid")
        error++
    }
    else {
        // Print
        $("#keyPassword").removeClass("is-invalid").addClass("is-valid")
    }

    // Return
    if (error != 0) {
        return false
    }
    else {
        // Add key
        if ($("#btnEditKey").val() == "") {
            $.ajax({
                url: "controllers/keys.php",

                type: "POST",

                data: {
                    "registerKeyName": $("#keyName").val(),
                    "registerKeyUser": $("#keyUser").val(),
                    "registerKeyPassword": $("#keyPassword").val()
                },

                success: function (reply) {
                    // Toast
                    $(".toast").toast("show")
                    // Print
                    if (reply == 1) {
                        $(".toast .toast-body").addClass("bg-success").text("Key registrada")
                    }
                    else {
                        $(".toast .toast-body").addClass("bg-danger").text("Key no registrada")
                    }
                },
                error: function (jqXHR, state, error) {
                    // Log
                    console.log(error)
                },
                complete: function (jqXHR, state) {
                    // Modal
                    $("#modalKey").modal("hide")
                    // Update list
                    listKeys()
                }
            })
        }
        else {
            $.ajax({
                url: "controllers/keys.php",
                type: "POST",
                data: { "editKeyName": $("#keyName").val(), "editKeyUser": $("#keyUser").val(), "editKeyPassword": $("#keyPassword").val(), "editKey": $("#btnEditKey").val() },
                success: function (reply) {
                    // Toast
                    $(".toast").toast("show")
                    // Print
                    if (reply == 1) {
                        $(".toast .toast-body").addClass("bg-success").text("Key actualizada")
                    }
                    else {
                        $(".toast .toast-body").addClass("bg-danger").text("Key no actualizada")
                    }
                },
                error: function (jqXHR, state, error) {
                    // Log
                    console.log(error)
                },
                complete: function (jqXHR, state) {
                    // Modal
                    $("#modalKey").modal("hide")
                    // Update list
                    listKeys()
                }
            })
        }
    }
})
