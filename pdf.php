<?php
    require_once('./lib/tcpdf.php');

    session_start();


    $name = $_SESSION['name'];
    $name_jp = $_SESSION['name_jp'];
    $age = $_SESSION['age'];
    $gender = $_SESSION['gender'];
    $phone = $_SESSION['phone'];
    $address = $_SESSION['address'];
    $conditions = $_SESSION['condition'];
    $treats = $_SESSION['treat'];
    $allergy = $_SESSION['allergy'];

 
   
    
    $filename = $name.".pdf";

    $pdf = new TCPDF("P", "mm", "A4");

    $pdf->setPrintHeader(True);

    $header_font = array('kozminproregular', '', 20);

    $pdf->setHeaderFont($header_font);

    $pdf->setHeaderData('', 0, $name.'様 問診票', '文字を出力します');

    $pdf->setFont('kozminProregular', '', 26);

    $pdf->AddPage();

    $pdf->Text(10, 15, "氏名:".$name); 
    $pdf->Text(10, 30, "しめい:".$name_jp);
    $pdf->Text(10, 45, "年齢:".$age);
    $pdf->Text(10, 60, "性別:".$gender);
    $pdf->Text(10, 75, "電話番号:".$phone);
    $pdf->Text(10, 90, "住所:".$address);
     $pdf->Text(10, 105, "どのような状況ですか？:");
     $y = 105; 
     foreach($conditions as $condition) {

        if($condition){
           $pdf->Text(120, $y, $condition);
            $y += 10;
 
        }
        
        

    }
    $y += 15;
  
    $pdf->Text(10, $y, "現在治療中の病気はありますか？:");
    foreach($treats as $treat) {

        if($treat){
           $pdf->Text(150, $y, $treat);
            $y += 10;
 
        }
    }
    $y += 15;
    $pdf->Text(10, $y, "アレルギー体質ですか？:".$allergy);

    //$pdf->Output($filename, "D");
    $pdf->Output($filename, "I");

    //window.open($filename, '_blank');


    //ここでセッションデストロイするとリロードすると読みこめない
    // $_SESSION= array();
    // session_destroy();
 ?>
