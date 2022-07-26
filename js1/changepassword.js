function validation() {
   var pass = document.getElementById("pass1").value;
   var confirmpass = document.getElementById("pass1");
   var passregex = /^[a-zA-Z0-9!@#$%^&*]+$/;
   if (pass.match(passregex)) {
      confirmpass.style.border = "2px solid green";
   } else {
      confirmpass.style.border = "2px solid red";
   }


   ////////////////////////////////////////////////////////////////////////////

   var confirmpasswords = document.getElementById("cp1").value;
   var confirmpassword = document.getElementById("cp1");
   var confirmregex = /^[a-zA-Z0-9!@#$%^&*]+$/;
   if (confirmpasswords.match(confirmregex)) {
      confirmpassword.style.border = "2px solid green";
   } else {
      confirmpassword.style.border = "2px solid red";
   }

   ///////////////////////////////////////////////////////////////////////////

   var validate1 = document.getElementById("pass1");
   var validate2 = document.getElementById("cp1");
   var btn = document.getElementById("button");
   if (pass == confirmpasswords && pass != "" && confirmpasswords != "") {
      btn.disabled = false;
      document.getElementById("write").innerHTML = "";
      validate1.style.border = "2px solid green";
      validate2.style.border = "2px solid green";
   } else {
      btn.disabled = true;
      document.getElementById("write").innerHTML = "**Password Not Matched"
      validate1.style.border = "2px solid red";
      validate2.style.border = "2px solid red";

   }
}