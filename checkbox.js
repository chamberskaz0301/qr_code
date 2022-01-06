function changeDisabled(){
    var obj = document.getElementById("0");
    if(obj.disabled == true){
      obj.disabled = false;  //Enableに設定
    }else{
      obj.disabled = true;   //Disableに設定
    }
  }