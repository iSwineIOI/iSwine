
function passwordfunction() {
    var pass1 = document.getElementById("password").value;
    var pass2 = document.getElementById("confirm_password").value;
    var ok = true;
    if (pass1 != pass2) {
        //alert("Passwords Do not match");
        document.getElementById("password").style.borderColor = "#E34234";
        document.getElementById("confirm_password").style.borderColor = "#E34234";
        ok = false;
        $('#message').html('Password does not match').css('color', 'red');
    }
    return ok;
}