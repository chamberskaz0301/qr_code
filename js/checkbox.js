//いいえ
function treatflg1(ischecked){
if(ischecked == true){
    document.getElementById("treat2").disabled = true;
    document.getElementById("disease1").disabled = true;
    document.getElementById("disease2").disabled = true;
    document.getElementById("disease3").disabled = true;
} else {
    document.getElementById("treat2").disabled = false;
}
}
//はい
function treatflg2(ischecked){
if(ischecked == true){
    document.getElementById("treat1").disabled = true;
    document.getElementById("disease1").disabled = false;
    document.getElementById("disease2").disabled = false;
    document.getElementById("disease3").disabled = false;
} else {
    document.getElementById("treat1").disabled = false;
}
}
