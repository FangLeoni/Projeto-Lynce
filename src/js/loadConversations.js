const barraPesquisa = document.querySelector(".pesquisa");
const formPesquisa = document.querySelector(".formPesquisa");
let conversationCont = document.querySelector(".conversationContainer");

// function loadInbox(){
//     $.ajax({ 
//         url: 'process/inbox.php',
//         success: (data) => {
//             $('#inbox .container').html(data);
//         },
//         error: (error)=>{
//             Swal.fire({
//                 title: 'Erro',
//                 text: error.statusText,
//                 icon: 'error',
//                 confirmButtonText: "OK"
//             })
//         }
//     })
// }

barraPesquisa.addEventListener("keyup", (e) => {
    e.preventDefault();

    if(barraPesquisa.value.length > 3) {
        
    const url = "../php/loadConversations.php?pesquisa=" + barraPesquisa.value;

    fetch(url).then((res) =>console.log(res)).catch((err) => console.log(err))
    }
})

// function load(nome, cidade) {
//     const line =   `
//                         <img src="../../assets/icons/user.svg" alt="user">
//                         <div>
//                             <h4>${nome}</h4>
//                             <h4>${cidade}</h4>
//                         </div>
//                     `
//     let tempDiv = document.createElement('div');
//     tempDiv.className = "userConversation";
//     tempDiv.innerHTML = line

//     conversationCont.appendChild(tempDiv);
    
// }