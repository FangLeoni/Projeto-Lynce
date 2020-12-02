let conversationCont = document.querySelector(".conversationContainer");

async function loadInbox() {

    const url = "../php/loadInbox.php";

    await fetch(url)
    .then((res) => res.text())
    .then((html) => {
        conversationCont.innerHTML = html;
        // console.log(html);
    })
    .catch((err) => console.log(`Não foi possivel carregar: ${err}`));
}


document.addEventListener("DOMContentLoaded", () => {

    loadInbox();
    
});

