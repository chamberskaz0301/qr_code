const fetchForm = document.querySelector('.fetchForm');
const btn = document.querySelector('.btn');
const url = 'https://jsonplaceholder.typicode.com/posts/';

const postFetch = () => {
    let formData = new FormData(fetchForm);
    for (let value of formData.entries()) {
        console.log(value);
    }

    fetch(url, {
        method: 'POST',
        body: formData
    }).then((response) => {
        if(!response.ok) {
            console.log('error!');
        } 
        console.log('ok!');
        return response.json();
    }).then((data)  => {
        console.log(data);
    }).catch((error) => {
        console.log(error);
    });
};

btn.addEventListener('click', postFetch, false);
