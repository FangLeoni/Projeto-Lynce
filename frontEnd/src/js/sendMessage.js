
const envio = document.querySelector(".formMensagem");
const menssageInput = document.querySelector("#mensagem");

envio.addEventListener("submit",async (e) => {
    e.preventDefault();

    const formData = new FormData(envio)

    const url = "../php/sendMessage.php";
    const options = {
        method: "POST",
        body: formData
      }

    if(menssageInput.value.length > 0) {
      await fetch(url, options).then(menssageInput.value = "").catch((err)=> console.log(err));
    }

    scrolled = false;
    
})
