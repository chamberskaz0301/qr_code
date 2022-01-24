<?php
    require_once('./lib/tcpdf/tcpdf.php');

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

    $pdf->Text(10, 15, "氏名:".$name); 
    $pdf->Text(10, 30, "しめい:".$kana);
    $pdf->Text(10, 45, "年齢:".$age);
    $pdf->Text(10, 60, "性別:".$gender);
    $pdf->Text(10, 75, "電話番号:".$phone);
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
     $pdf->Text(10, $y, "アレルギー体質ですか？:".$i);

     /**
     * setJPEGQualityメソッド
     * 引数:圧縮率（1~100）
     * 数字が小さくなると高圧縮
     * 数値が大きくなると高画質
     */
    $pdf->setJPEGQuality(80);

    //本文のフォント設定
    $pdf->setFont('kozminproregular','',12);
    $pdf->AddPage();


    // $pdf->Cell(400, 40, "セル１", 1, 0, "C", false, 'https://www.google.co.jp');
    // $pdf->Cell(40, 40, "セル１", 1, 0, "C", true, 'https://www.google.co.jp');
  
    //$pdf->Image("a.png", 80, 60, 100, "", "", 'https://www.yahoo.co.jp');


    $pdf->Output($filename, "I");
 


    // if (isset($_SESSION['start']) && (time() - $_SESSION['start'] > 10)) {
    //     session_unset(); 
    //     session_destroy(); 
    //     echo "session destroyed"; 
    // }
    // $_SESSION['start'] = time();


 ?>
