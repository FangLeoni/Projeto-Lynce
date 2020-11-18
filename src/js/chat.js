
let chat = document.querySelector(".chat");
const envio = document.querySelector(".formMensagem");
const menssageInput = document.querySelector("#mensagem");

envio.addEventListener("submit",async (e) => {
    e.preventDefault();

    const formData = new FormData(envio)

    const url = "../php/chat.php";
    const options = {
        method: "POST",
        body: formData
      }

    await fetch(url, options).then(menssageInput.value = "").catch((err)=> console.log(err))
    
})
    
var pusher = new Pusher('a43c43e8323a364ec612', {
  cluster: 'us2'
});

var channel = pusher.subscribe('chat');
channel.bind('send-message', function(data) {
    const line = `<div class="mainUserMessage"><p>${data.message}</p></div>`

    let tempDiv = document.createElement('div');
    tempDiv.className = "mainUserContainer"
    tempDiv.innerHTML = line
    chat.appendChild(tempDiv);
    // cha;
});