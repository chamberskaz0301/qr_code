/* 名前チェック関数 */
function checkFullName(fname) {
    if(!fname) alert('お名前を入力してください！');
    else {
        fname.match(/^[^\x20-\x7e]*$/) ?
        console.log(`正しい形式のお名前です：${fname}`) :
        alert(`お名前の形式が無効です：${fname}`);
    }
}


/* 電話番号チェック関数 */
//文字数制限追加　未
function checkTelNum(tel) {
    if(!tel) alert(`電話番号を入力してください！`)
    else {
        tel.match(/^0[5-9]0-?\d{4}-?\d{4}$|^0\d{1,4}-?\d{2,5}-?\d{2,5}$/) ?
        console.log(`正しい形式の電話番号です：${tel}`) :
        alert(`電話番号の形式が無効です：${tel}`);
    }
}

/* onclickで呼び出される関数 */
function validate() {
    // お名前を取得して代入
    const fullName = document.getElementById('fullName').value;
    // 名前チェック関数に渡す
    checkFullName(fullName);

    // 電話番号を取得して代入
    const telNum = document.getElementById('tel').value;
    // 電話番号チェック関数に渡す
    checkTelNum(telNum);
}