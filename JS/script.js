// Add Record
function addRecord() {
    // get values
    var username = $("#username").val();
    username = username.trim();
    var password = $("#password").val();
    password = password.trim();
    // var email = $("#email").val();
    // email = email.trim();

    if (username == "") {
        alert("First name field is required!");
    }
    else if (password == "") {
        alert("Last name field is required!");
    }
    
    else {
        // Add record
        $.post("ajax/create.php", {
            username: username,
            password: password,
        }, function (data, status) {
            // close the popup
            $("#add_new_record_modal").modal("hide");

            // read records again
            readRecords();

            // clear fields from the popup
            $("#username").val("");
            $("#password").val("");
            // $("#email").val("");
        });
    }
}