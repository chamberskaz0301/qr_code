<?php

require_once('../lib/tcpdf.php');

<?php
    //TCPDFというライブラリを読み込む
    require_once('../lib/tcpdf.php');

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
    $pdf = new TCPDF("L", "mm", "A4");

    /**
     * ドキュメントヘッダーの出力設定
     * 引数:true(ヘッダーを出力する),false(ヘッダーを出力しない)
     */

    $pdf->setPrintHeader(True);

    /**
     * 小塚明朝フォントを使って文字を表現する
     * 3番目の要素はフォントサイズ（文字の大きさ）を指定する
     */
    $header_font = array('kozminproregular', '', 9);

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
    $pdf->setHeaderData('', 0, 'ヘッダータイトル', '文字を出力します');

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
    $pdf->Text(10, 15, "1行目：練習問題１の完成PDF");
    $pdf->Text(10, 30, "2行目：練習問題１の完成PDF");
    $pdf->Text(10, 45, "3行目：練習問題１の完成PDF");

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




?>