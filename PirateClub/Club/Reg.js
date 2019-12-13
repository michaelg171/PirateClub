function UName(){
    var screen = /^[A-Za-z]+$/;
    var Uname = document.getElementById("UserName").value;
    var err = document.getElementById("errMsg");

    if(screen.test(Uname)){
        return true;
        err.innerText="";

    }else{

        err.innerText = "user name must only have [A-Z][a-z]";
        return false;
    }
}

function nameEdit(){
    var specChar =  "~`!#$%^&*+=-[]\\\';,/{}|\":<>?";
    var fname = document.getElementById("FirstName").value;
    var newName= "";
    for (var i=0; i<fname.length; i++){
        if(specChar.indexOf(fname.charAt(i))!=-1){
            var val = fname.charAt(i);
            fname = fname.replace(val,'');
            i=i-1;
        }
    }
  document.getElementById("FirstName").value=fname
}

-function LnameEdit(){
    var specChar =  "~`!#$%^&*+=-[]\\\';,/{}|\":<>?";
     var fname = document.getElementById("LastName").value;
     var newName= "";
    for (var i=0; i<fname.length; i++){
        if(specChar.indexOf(fname.charAt(i))!=-1){
            var val = fname.charAt(i);
            fname = fname.replace(val,'');
            i=i-1;
}
    }
   document.getElementById("LastName").value=fname
 }

function cipher(){
    var pw = document.getElementById("PassWord").value;
    var cipher="";
    var shift = 5;

    for(var i=0; i<pw.length; i++){
        var c = pw.charCodeAt(i)
        c = c+shift;
        cipher+=String.fromCharCode(c);
    }
    document.getElementById("PassWord").value = cipher;
    return true;
}


function deCipher(){
    var decipher = "";
    var pw = document.getElementById("PassWord").value;
    var shitf = 5;
for(var i=0; i<pw.length; i++){
        var c = str.charCodeAt(i);
        c=c-shift;
        decipher+=String.fromCharCode(c);
    }
    return true;
}

