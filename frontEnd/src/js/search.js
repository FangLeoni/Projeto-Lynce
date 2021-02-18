const barraPesquisa = document.querySelector(".pesquisa");
const formPesquisa = document.querySelector(".formPesquisa");
// let conversationCont = document.querySelector(".conversationContainer");




barraPesquisa.addEventListener("keyup", async (e) => {
    e.preventDefault();

    if(barraPesquisa.value.length > 3) {
        
        const url = "../php/search.php?pesquisa=" + barraPesquisa.value;

        await fetch(url)
        .then((res) => res.text())
        .then((html) => {
            conversationCont.innerHTML = html;
            console.log(html);
        })
        .catch((err) => console.log(`Não foi possivel carregar: ${err}`))
    
    }
})