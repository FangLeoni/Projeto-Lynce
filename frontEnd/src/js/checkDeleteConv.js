function checkDeleteConv(idConv) {

    const isConfirmed = Swal.fire({
        title: 'Cuidado!',
        text: "Tem certeza que quer deletar essa conversa?",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: "Não",
        confirmButtonText: "Sim"
    }).then((lol)=>{if(lol.isConfirmed) deleteConv(idConv)})
}