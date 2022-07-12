function myvalidation(){

    var re=document.getElementById("remail1").value;
    var recoveryemail1=document.getElementById("remail1");
    var recov=/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/;
    
    if(re.match(recov)){
    recoveryemail1.style.border="2px solid green";
    
    }else{
        document.getElementById("write").innerHTML="Password Matched";
        recoveryemail1.style.border="2px solid red";
    }
}