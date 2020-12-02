let chatHTML = document.querySelector(".chat");
let scrolled = false;

function chat(id) {
    let idConv = id;
    

    const url = `../php/loadChat.php?id=${idConv}`;

    
    setInterval(async () => {

        await fetch(url)
        .then((res) => res.text())
        .then((html) => {
            chatHTML.innerHTML = html;
            // console.log(html);
        })
        .catch((err) => console.log(`Não foi possivel carregar: ${err}`));

        
        if(!scrolled){
            chatHTML.scrollTop = chatHTML.scrollHeight;
            scrolled=true;
        } 

        
        
        

    }, 20);

}