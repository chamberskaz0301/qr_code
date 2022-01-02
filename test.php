<?php
    //require_once('./functions.php');
    require_once('./lib/tcpdf.php');

    //A4縦の空の用紙を作成
    $pdf = new TCPDF("P", "mm", "A4");

    //$pdf->SetPrintHeader(True);

    //$header_font = array('kozminproregular', '', 9);

    //$pdf->setHeaderFont($header_font);

    //$pdf->setHeaderData('', 0, 'ヘッダータイトル', '文字を出力します');

    $pdf->AddPage();

    //$pdf->Text(10, 20, "PHPでTCPDFを使ったPDFを作成");

    $pdf->Output("./test.pdf", "I");


?> 