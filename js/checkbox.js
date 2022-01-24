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


    //====================
    //チェックボックス必須化
    //====================
    $(function() {
        //チェックしたら発火
        $('.condition').change(function() {
 
            //選択したinputのname値を変数に格納
            var name = $(this).attr('name');
 
            //control用のIDを連結
            var control_name = name + '_control';
            var control_checkbox = document.getElementById( control_name );
 
            //チェックされているチェックボックスの数が0より多い場合
            if ($("input[name='" + name + "']:checked").length > 0) {
                //チェック有効
                control_checkbox.checked = true;
            } else {
                //チェック有効
                control_checkbox.checked = false;
            }
        });
    });