function myvalidation() {


    var username = document.getElementById("remail1").value;
    var username1 = document.getElementById("remail1");
    var pattern = /^[a-zA-Z0-9]+$/
    if (username.match(pattern)) {

        username1.style.border = "2px solid green";
    } else {
        username1.style.border = "2px solid red ";
    }

    var cpass1 = document.getElementById("cp1").value;
    var cpassword1 = document.getElementById("cp1");
    var confirmpass = /^[a-zA-Z0-9!@#$%^&*]+$/;
    if (cpass1.match(confirmpass)) {
        cpassword1.style.border = "2px solid green";
    } else {
        cpassword1.style.border = "2px solid red";
    }
    


}

