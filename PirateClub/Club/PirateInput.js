var mon;
var year;
var yearly = [0,31,28,31,30,31,30,31,31,30,31,30,31];
function CheckDate(){
    var valid = Validation();
    var submitButton = document.getElementById("submit");
    submitButton.disabled = !valid;
}
function Validation(){
    var a = CheckYear();
    if(a == false)
        return false;
    return true;
}

function CheckYear(){
    year = document.getElementById("year").value;
    var errMsg = document.getElementById("errMsg");
    var b = CheckMonth();
    if(b == false)
        return false;

    if(year == ""){
        errMsg.innerText = "invalid year: must be between 1900>entry<2100";
        return false
    }
    if(isNaN(year)||year<=1900 || year >=2100){
        errMsg.innerText = "invalid year: must be between 1900>entry<2100";
        return false;
    }
    errMsg.innerText = " ";
    return true;
}


function CheckMonth(){
    var errMsg = document.getElementById("errMsg");
    var radios = document.getElementsByName('month');

    for (var i = 0, length = radios.length; i < length; i++)
        {
        if (radios[i].checked)
            {
                mon= (radios[i].value);
                break;
            }
        }

        mon = Number(mon);
        if(!mon || mon > 12 || mon<1){
            errMsg.innerText = "incorect Entry";
            return false;

        }
     var val = CheckDay();
    if(val == false)
        return false

    return true;
}

function CheckDay(){
    var day = document.getElementById("day").value;
    var errMsg = document.getElementById("errMsg");
    if(day=="0"){
        errMsg.innerText = "The day was not selected please select a day";
        return false;
    }
     var day = Number(day);

    for(var i=1; i<=yearly.length; i++){
        if(i == mon){
            if( mon == 2){
                if(year%4!=0){
                    if(day>28){
                       errMsg.innerText = "Error not a Leap year Febuary only has 28 days";
                      return false;
                    }

                } else if(day>29){
                    errMsg.innerText = "Error Febuary only has 29 days";
                    return false;
                    }

                return true;
            }

            if(day>yearly[i]){
                errMsg.innerText = "Error day selected greater than days in month.";
                return false;
            }
            break;
        }
    }
    return true;
}
function GraphIt(id,data){

    var canvas = document.getElementById(id);
    var context = canvas.getContext("2d");
    context.font="20px Arial";
    var margin = canvas.width*.9;
    var height = canvas.height*.9;
    var colors = ["Tomato", "MediumSeaGreen", "DodgerBlue", "DarkOliveGreen ", "Green", "Gray", "RebeccaPurple"];
    GW = canvas.width;
    GH = canvas.height;
    context.rect(0,0,GW, GH-20);
    context.strokeStyle="black";
    context.stroke();

    for(var x =0; x<=GH; x+=40){
        context.moveTo(0,x);
        context.lineTo(GW,x);
    }
    context.strokeStyle="lightgray";
    context.stroke();

    for(var i = 0; i< data.length; i++){
        value = data[i].val;
        text = data[i].lbl;
        x = Math.round(margin/6);
        x = x*(i+1);
        HeightValue = height * (value/.45);
        context.fillStyle=colors[i];
        context.fillRect(x-55,GH-20,80,-HeightValue);
        context.fillStyle="Black";
        context.fillText(data[i].lbl, x-40, height+37);

    }

}

