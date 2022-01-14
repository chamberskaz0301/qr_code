const fetchForm = document.querySelector('.fetchForm');

// const btn = document.querySelector('.send');
// const url = 'confirm.php';

// const postFetch = () => {
//     let formData = new FormData(fetchForm);
//     fetch(url, {
//         method: 'POST',
//         body: formData
//     }).then((response) => {
//         if(!response.ok) {
//             console.log('error!');
//         } 
//     //     console.log('ok!');
//     //     return response.json();
//     // }).then((data)  => {
//     //     console.log(data);
//     }).catch((error) => {
//         console.log(error);
//     });
// };

fetchForm.addEventListener("submit", (event) => {
    event.preventDefault();
    // postFetch();

    // 氏名などの入力チェック

    // もし一個もエラーがなければ
        // config.phpに値をもったまっま,POST遷移
    // そうでなければエラーメッセージを表示
})