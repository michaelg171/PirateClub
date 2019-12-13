function UNcheck(){
    var username= document.getElementById("UserName");

}
function cipher(){
    var pw = document.getElementById("PassWord").value;
    var cipher="";
    var decipher = document.getElementById("decipher");
    var shift = 5;
    for(var i=0; i<pw.length; i++){
        var c = pw.charCodeAt(i)
        c = c+shift;
        cipher+=String.fromCharCode(c);
    }
    document.getElementById("PassWord").value = cipher;

}
