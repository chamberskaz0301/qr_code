<?php

$html = array();

if(isset($_POST['back'])){
    //HTMLコードをエスケープ
    $html['name'] = htmlentities($_SESSION['name'], ENT_QUOTES, 'UTF-8');
    $html["kana"] = htmlentities($_SESSION["kana"], ENT_QUOTES, 'UTF-8');
    $html['age'] = htmlentities($_SESSION["age"], ENT_QUOTES, 'UTF-8');
    $html["gender"] = htmlentities($_SESSION["gender"], ENT_QUOTES, 'UTF-8');
    $html["phone"] = htmlentities($_SESSION["phone"], ENT_QUOTES, 'UTF-8');
    $html["address"] = htmlentities($_SESSION["address"], ENT_QUOTES, 'UTF-8');
    $html['condition']['fever'] = htmlentities($_SESSION["condition"]['fever'], ENT_QUOTES, 'UTF-8');
    $html['condition']['throat'] = htmlentities($_SESSION["condition"]['throat'], ENT_QUOTES, 'UTF-8');
    $html['condition']['cough'] = htmlentities($_SESSION["condition"]['cough'], ENT_QUOTES, 'UTF-8');
    $html['condition']['spit'] = htmlentities($_SESSION["condition"]['spit'], ENT_QUOTES, 'UTF-8');
    $html['treat']['none'] = htmlentities($_SESSION['treat']['none'], ENT_QUOTES, 'UTF-8');
    $html['treat']['hbp'] = htmlentities($_SESSION['treat']['hbp'], ENT_QUOTES, 'UTF-8');
    $html['treat']['diabetic'] = htmlentities($_SESSION['treat']['diabetic'], ENT_QUOTES, 'UTF-8');
    $html['treat']['asthma'] = htmlentities($_SESSION['treat']['asthma'], ENT_QUOTES, 'UTF-8');
    $html["allergy"] = htmlentities($_SESSION["allergy"], ENT_QUOTES, 'UTF-8');

}else{
    //初期化
    $_SESSION =  array();
    $html['name'] =  '';
    $html['kana'] = '';
    $html['age'] = '';
    $html['gender'] = '';
    $html['phone'] =  '';
    $html['address'] =  '';
    $html['condition']['fever'] = '';
    $html['condition']['throat'] =  '';
    $html['condition']['cough'] = '';
    $html['condition']['spit'] =  '';
    $html['treat']['none'] = '';
    $html['treat']['hbp'] =  '';
    $html['treat']['diabetic'] =  '';
    $html['treat']['asthma'] =  '';
    $html['allergy'] =  '';
}
