let status = '';

function auxStatus(value)
{
    status = value
}


function changeStatusOrder(id_order, id_company)
{

    let error = document.querySelector('#msg-m-status'+id_order);

    if(status == '') {
        error.classList.remove('d-none')
    } else {
        document.querySelector('#div-m-loading'+id_order).classList.remove('d-none');
    
        fetch(`http://localhost/fit/portal/pedido/changeStatus/${status}/${id_order}/${id_company}`)
        .then((r) => r.json())
        .then((result) => {
            if(result.code === 0) {
                document.querySelector('#div-m-loading'+id_order).classList.add('d-none');
                window.location.reload();
            } else {
                error.classList.remove('d-none')
                error.innerHTML = '<p class="alert alert-danger">Algo deu errado tente novamente.</p>'
            }
        }); 
    }
}