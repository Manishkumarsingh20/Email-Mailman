console.log('ds');
function checkbox() {
    var checkbox = document.getElementById("checkbox");
    console.log(checkbox);
    var button = document.getElementById("hide");

    if (checkbox.checked == true) {
        console.log('lsdk')
        button.style.display = "block";
    } else {
        button.style.display = "none";
        console.log('lsjklsdfjlsdfjlsdfj')
    }
}
