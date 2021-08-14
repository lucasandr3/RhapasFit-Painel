setInterval(function (){

    const audio = document.querySelector('audio')
    const button = document.querySelector('#btn-noty')

    button.addEventListener('click', function() {
        audio.play();
    })


    fetch('http://localhost/zapdevelop/portal/home/verifyNewOrders')
    .then((r) => r.json())
    .then((response) => {

        if(response.length === 0) {
            localStorage.setItem('count_orders', 0)
        } 
        
        if(response.length !== parseInt(localStorage.getItem('count_orders'))){
            let count = parseInt(localStorage.getItem('count_orders'));
            localStorage.setItem('count_orders', count + 1)
            button.click();
            window.location.reload();
        }
    })

},3000);