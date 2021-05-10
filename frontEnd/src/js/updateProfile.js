async function updateProfile() {
    const form = document.querySelector(".profInfoCont");
    form.addEventListener("submit",(e)=>{
        e.preventDefault();

        const formData = new FormData(form)

        const url = "/server/php/updateProfile.php";
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
                title: 'Perfil Atualizado',
                icon: 'success',
                showConfirmButton: false,
                position: 'top-end',
                timer: 1000,
                timerProgressBar: true,
            }).then(()=>loadProfile())          
        })
        .catch((err) => {
            Swal.fire({
                title: 'Oops!',
                text: err,
                icon: 'error',
                confirmButtonText: "Tentar novamente"
            })
        });  
            
    })
    
}