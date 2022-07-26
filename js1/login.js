function myvalidation() {
    var username = document.getElementById("remail1").value;
    var username1 = document.getElementById("remail1");
    var useremail=document.getElementById("login");
    var pattern = /^(?:[A-Z\d][A-Z\d_-]{1,}|[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4})$/i;
    if (username.match(pattern)) {
        username1.style.border = "2px solid green";
        useremail.innerHTML="";
    } else {
        username1.style.border = "2px solid red ";
        return false;
    }

//////////////////////////////////////////////////////////////////////////////////////


    var cpass1 = document.getElementById("cp1").value;
    var cpassword1 = document.getElementById("cp1");
    var useremail=document.getElementById("passwordmatch");
    var confirmpass = /^[a-zA-Z0-9!@#$%^&*]+$/;
    if (cpass1.match(confirmpass)) {
        cpassword1.style.border = "2px solid green";
        useremail.innerHTML="";
    } else {
        cpassword1.style.border = "2px solid red";
        return false;
    } 
    if (! username) {
        return false

    } else {
        return true
    }

}

