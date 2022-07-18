function validation(){
var email=document.getElementById("emailconfirm").value;
var email_input=document.getElementById("emailconfirm");
var btn = document.getElementById("button");
// var emailspane=document.getElementById("emailerror")
var regex= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(email.match(regex)){
    btn.disabled = false;
    email_input.style.border = "2px solid green";
    emailspane.innerHTML="";
}else{
    btn.disabled = true;
    email_input.style.border="2px solid red";
    emailspane.innerHTML="Not a correct email"; 

}

}