<?php
    //TCPDFというライブラリを読み込む
    require_once('./lib/tcpdf.php');

    session_start();

    $name = $_SESSION['name'];
    $name_jp = $_SESSION['name_jp'];
    $age = $_SESSION['age'];
    $gender = $_SESSION['gender'];
    $phone = $_SESSION['phone'];
    $address = $_SESSION['address'];
    $condition = $_SESSION['condition'];
    $treat = $_SESSION['treat'];
    $allergy = $_SESSION['allergy'];

    
    //TCPDFクラスのインスタンス作成
    /**
     * 引数1:用紙の向き(P:portrait:縦向き（標準設定）
     *                 LLandScape:横向き
     * 引数2:用紙の単位(mm(ミリメートル)
     *                  cm(センチメートル)
     *                  in(インチ)
     *                  pt(ポンド)))
     * 引数3:用紙のサイズ(A$が標準設定、A3, B4, B5
     *                     海外向けのサイズ->　LETTER, LEGAL)
     * 
     * 引数4:ドキュメントの文字コードがUnicodeの場合はTrueを設定する
     * 引数5:PDFの文字コード(UTF-8が標準設定)
     * 引数6:PDF作成時にメモリの消費量を抑える時にはTureを設定する
     */
    $pdf = new TCPDF("P", "mm", "A4");

    /**
     * ドキュメントヘッダーの出力設定
     * 引数:true(ヘッダーを出力する),false(ヘッダーを出力しない)
     */

    $pdf->setPrintHeader(True);

    /**
     * 小塚明朝フォントを使って文字を表現する
     * 3番目の要素はフォントサイズ（文字の大きさ）を指定する
     */
    $header_font = array('kozminproregular', '', 20);

    /**
     * setHeaderFontメソッドでヘッダー部の文字の体裁を決める
     * setHeaderFontメソッド
     * 引数:フォント情報が入った配列
     */

    $pdf->setHeaderFont($header_font);

    /**
     * ヘッダー部に文字や画像を表示する
     * setHeaderDataメソッド
     * 引数1:ヘッダーのロゴ画像に使うファイルパス
     * 引数2:ヘッダーのロゴ画像の幅(mm単位
     * 引数3:ヘッダーのタイトル
     * 引数4:ヘッダーに表示する文字列
     */
    $pdf->setHeaderData('', 10, '問診票', '文字を出力します');

    /**
     * 本文に出力するフォントの設定
     * setFontメソッド
     * 引数1:フォント名
     * 引数2:フォントスタイル(B:太字,I:斜体, U:下線付き)
     * 引数3:文字の大きさ
     */
    $pdf->setFont('kozminProregular', '', 26);

    /**
     * ページの追加
     */
    $pdf->AddPage();

    /**
     * PDFに文字を追加
     * Textメソッド
     * 引数1:出力する起点となるX軸の座標
     * 引数2:出力する起点となるY軸の座標
     * 引数3:出力する文字列
     */
    $pdf->Text(10, 15, "氏名:".$name); 
    $pdf->Text(10, 30, "しめい:".$name_jp);
    $pdf->Text(10, 45, "年齢:".$age);
    $pdf->Text(10, 60, "性別:".$gender);
    $pdf->Text(10, 75, "電話番号:".$phone);
    $pdf->Text(10, 90, "住所:".$address);
    $pdf->Text(10, 105, "どのような状況ですか？:");
    $pdf->Text(10, 120, "現在治療中の病気はありますか？:");
    $pdf->Text(10, 135, "アレルギー体質ですか？:".$allergy);

    /**
     * PDFを出力する
     * 引数1:出力するPDFのファイル名
     * 引数2:出力方法
     *          I:ブラウザに出力する
     *          D:ブラウザでダウンロード
     *          F:ローカルファイルとして保存
     *          S:PDFドキュメントを文字列として出力する
     */
    $pdf->Output("Sample.pdf", "I");
?>
