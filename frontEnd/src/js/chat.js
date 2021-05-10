async function chat(id,cd) {
    const idConv = id;
    const cdUser = cd;
    
    const url = `/server/php/loadChat.php?id=${idConv}&otherUsu=${cdUser}`;
    
    await fetch(url)
    .then((res) => res.text())
    .then((html) => {
        if(html) { 
            chatHTML.innerHTML = html;
            subscribe(id)
        }
    })
    .catch((err) => console.log(`Não foi possivel carregar: ${err}`));
    
    let chatConv = document.querySelector(".Chat");
    chatConv.scrollTop = chatConv.scrollHeight;
    
    let messageForm = document.querySelector(".messageForm");
    const menssageInput = document.querySelector("#message");
    
    conn.onmessage = function(e) {
        
        chatConv.innerHTML += e.data;
        chatConv.scrollTop = chatConv.scrollHeight;
    };
            
    messageForm.addEventListener("submit", (e)=>{
        e.preventDefault();

        const url = `/server/php/sendMessage.php?idConv=${idConv}&cdUser=${cdUser}&message=${menssageInput.value}`;

        if(menssageInput.value.length > 0) {
            
            let d = new Date(); 
            d = `${d.getHours()}/${d.getMinutes()}/${d.getSeconds()}`
            chatConv.innerHTML += `
                <div class="mainMessageCont">
                    <div class="mainUserCont">
                        <p>${menssageInput.value}</p>
                        <span> ${d} //</span>
                    </div>
                </div>
            `;
            fetch(url)
            .catch((err) => console.log(`Não foi possivel carregar: ${err}`))
            
            sendMessage(menssageInput.value)

            menssageInput.value = "";
            chatConv.scrollTop = chatConv.scrollHeight;
        }
    })
}