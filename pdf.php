<?php
    require_once('./lib/tcpdf/tcpdf.php');
    require_once("./DBAccess.php");

    $mydb = new DBAccess();
    $ret = $mydb->select("SELECT id, name, kana, age, sex, phone, condition_ch, treat_ch,allergy from png");
    foreach($ret as $data){}
    $number = $_GET['id'];
    $id = $data['id'];

    session_start();


    $name = $_SESSION['name'];
    $kana = $_SESSION['kana'];
    $age = $_SESSION['age'];
    $gender = $_SESSION['gender'];
    $phone = $_SESSION['phone'];
    $conditions = $_SESSION['condition'];
    $treats = $_SESSION['treat'];
    $allergy = $_SESSION['allergy'];

    $filename =$name.".pdf";

    $pdf = new TCPDF("P", "mm", "A4");

    $pdf->setPrintHeader(True);

    $header_font = array('kozminproregular', '', 20);

    $pdf->setHeaderFont($header_font);

    $pdf->setHeaderData('', 0, $name.'様 問診票', '文字を出力します');

    $pdf->setFont('kozminProregular', '', 26);


    $pdf->AddPage();

    $pdf->Text(10, 15, "ID:".$id); 

    $pdf->Text(10, 30, "氏名:".$name); 
    $pdf->Text(10, 45, "しめい:".$kana);
    $pdf->Text(10, 60, "年齢:".$age);
    $pdf->Text(10, 75, "性別:".$gender);
    $pdf->Text(10, 105, "電話番号:".$phone);
     $pdf->Text(10, 120, "どのような状況ですか？:");
     $y = 120; 
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
    

    //QR位置
    $y += 10;
    $pdf->SetXY(20,$y);
    
    //QR作成
    $images ='<img src= '; 
    $url =  '"' . 'https://chart.apis.google.com/chart?chs=100x100&cht=qr&chl=localhost/qr/complete_form.php?id=';
    $numbers = $_GET['id'] . '"';
    $full_url = $url.$numbers;
    $end = ">'";
    $full = $images.$full_url.$end;

   
    
	$pdf->writeHTML($full, false, 0, true, true);

    
    //本文のフォント設定
    $pdf->setFont('kozminproregular','',12);

    $pdf->Output($filename, "I");
 



 ?>
