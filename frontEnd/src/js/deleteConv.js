async function deleteConv(idConv) {
    const formData = new FormData()
    formData.append("idConv", idConv);

    const url = "/server/php/deleteConversation.php";
    const options = {
        method: "POST",
        body: formData
    }
    
    fetch(url,options)
    .then(function(response) {
        if (!response.ok) {
            throw Error(response.statusText);
        }
        return response;
    })
    .then((res) => {
        Swal.fire({
            toast: true,
            title: 'Conversa deletada!',
            icon: 'success',
            showConfirmButton: false,
            position: 'top-end',
            timer: 1000,
            timerProgressBar: true,
        }).then(()=>loadInbox())          
    })
    .catch((err) => {
        Swal.fire({
            title: 'Oops!',
            text: err,
            icon: 'error',
            confirmButtonText: "Tentar novamente"
        })
    });  
}