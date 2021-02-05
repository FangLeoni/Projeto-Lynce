<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="../../themes/global.css">
    <link rel="stylesheet" href="../styles/chat.css">

</head>
<body>
    <?php
        session_start();

        if($_SESSION['logado'] != true ) {
            header("Location: login.html");
        }
    ?> 

    <section class="leftBar">
        <div class="topCont">
            <a href="./home.php" class="voltar"><--</a>

            <div class="perfCont">
                <img src="/server/profilePics/user.jpg" alt="perfil">
            </div>
        </div>
        <form class="searchBar">
            <input type="text" name="search" autocomplete="off">
        </form>
        
        <div class="inbox">
            <!-- <div class="userConversation" >
                <img src="/server/profilePics/user.jpg" alt="user">
    
                <div>
                    <h4>Leonardo Martines</h4>
                    <h4>São Vicente</h4>
                </div>
            </div> -->
        </div>
    </section>

    <section class="rightBar">

        <img src="/frontEnd/assets/images/startConversation.png" alt="" class="startConvImg">
        <h2>Comece a conversar com alguém</h2>
        <!-- <div class="Chat"> -->
            <!-- <div class="mainMessageCont">
                <div class="mainUserCont">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta quia eum a consequatur, porro fuga sunt cum. Minima, cum? Repellendus eos ducimus adipisci officia eveniet dicta odit amet corrupti reiciendis mollitia culpa accusantium officiis exercitationem provident, tempora assumenda error repudiandae possimus sit tempore aliquam fuga suscipit sequi! Animi, ut accusantium. Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem inventore sed qui, assumenda numquam aut natus voluptatem! Temporibus cupiditate cumque et est odit reiciendis architecto vitae, saepe nulla ab sapiente odio officiis quam dolor veniam consequatur at ipsam deleniti voluptate.</p>
                    <span>12:00 //</span>
                </div>
            </div>
            
            <div class="otherMessageCont">
                <div class="otherUserCont">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta quia eum a consequatur, porro fuga sunt cum. Minima</p>
                    <span>12:00 //</span>
                </div>
            </div> -->
        <!-- </div> -->

        <!-- <form class="messageForm">
            <input type="text" name="message" id="message">
            <button type="submit" class="sendButton"> > </button>
        </form> -->
    </section>

    <script>
        const search = document.querySelector(".searchBar");
        let searchData = document.querySelector(".searchBar > input");
        const inbox = document.querySelector(".inbox");
        const chatHTML = document.querySelector(".rightBar");

        let conn = new WebSocket('ws://localhost:8080');

        conn.onopen = function(e) {
            console.log("Connection established!");
        };

        

        function subscribe(channel) {
            conn.send(JSON.stringify({command: "subscribe", channel: channel}));
        }

        function sendMessage(msg) {
            conn.send(JSON.stringify({command: "message", message: msg}));
        }
        
        async function loadInbox() {

            const url = "/server/php/loadInbox.php";
            
            await fetch(url)
            .then((res) => res.text())
            .then((html) => {
                inbox.innerHTML = html;
            })
            .catch((err) => console.log(`Não foi possivel carregar: ${err}`));
        }

        async function searchFunc() {
            const url = `/server/php/search.php?pesquisa=${searchData.value}`;
            
            if(searchData.value.length > 0){
                await fetch(url)
                .then((res) => res.text())
                .then((html) => {
                    inbox.innerHTML = html;
                })
                .catch((err) => console.log(`Não foi possivel carregar: ${err}`))
            } else {
                loadInbox();
            }
            
        }

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
                console.log(e.data);
                chatConv.innerHTML += e.data;
                chatConv.scrollTop = chatConv.scrollHeight;
            };
                    
            messageForm.addEventListener("submit", (e)=>{
                e.preventDefault();
                // const formData = new FormData(messageForm)
                // formData.append("idConv", idConv);
                // formData.append("cdUser", cdUser);

                const url = `/server/php/sendMessage.php?idConv=${idConv}&cdUser=${cdUser}&message=${menssageInput.value}`;

                if(menssageInput.value.length > 0) {
                    console.log(menssageInput.value)
                    let d = new Date(); // for now
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
                    .then((res) => console.log(res.text()))
                    sendMessage(menssageInput.value)
                    // .then((html) => {
                    //     inbox.innerHTML = html;
                    // })
                    menssageInput.value = "";
                    chatConv.scrollTop = chatConv.scrollHeight;
                }
            })
        }

        document.addEventListener("DOMContentLoaded", () => { loadInbox(); });

        search.addEventListener("keyup", async (e) => {
            e.preventDefault();
            searchFunc() 
        })    
    
    </script>

<!-- 
    <section class="barraLateral">
        <header>
            <div class="voltar">
                <a href="./home.php">
                    <img src="../../assets/icons/voltar.png" alt="voltar">
                </a>              
            </div>
            <div class="perfil">
                <img src="../../assets/icons/user.svg" alt="perfil">
            </div>
        </header>
        <form method="post" class="formPesquisa">
            <input type="text" name="pesquisa" class="pesquisa" >
        </form>
        <div class="conversationContainer"> -->
            
            <!-- <div class="userConversation" >
                <img src="../../assets/icons/user.svg" alt="user">
    
                <div>
                    <h4>Leonardo Martines</h4>
                    <h4>São Vicente</h4>
                </div>
            </div> -->
        <!-- </div>

    </section>
    <section class="chatContainer">
        <main class="chat"> -->
            <!-- <div class="otherUserContainer">
                <div class="otherUserMessage">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                        Nam numquam dicta laboriosam reiciendis cum dolore distinctio libero omnis. 
                        Nam enim quod autem. Est numquam enim veritatis ratione deleniti consequuntur rerum?
                    </p>
                </div>
            </div>
            <div class="mainUserContainer">
                <div class="mainUserMessage">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                        Nam numquam dicta laboriosam reiciendis cum dolore distinctio libero omnis. 
                        Nam enim quod autem. Est numquam enim veritatis ratione deleniti consequuntur rerum?
                    </p>
                </div>
            </div> -->
        <!-- </main>
        <div class="envio">
            <form action="../php/chat.php" method="POST" class="formMensagem" autocomplete="off">
                <button><img src="../../assets/icons/file-plus.png" alt="arquivos"></button>
                <input type="text" name="mensagem" id="mensagem" placeholder="Envie uma mensagem"/>
                <button type="submit" class="btnEnviar" ><img src="../../assets/images/SEND.png" alt="send"></button>
            </form>
        </div>
    </section>
 
    <script src="../js/loadInbox.js" ></script>
    <script src="../js/search.js" ></script>
    <script src="../js/loadChat.js" ></script>
    <script src="../js/sendMessage.js" ></script>
    <script src="../js/webSocket.js" ></script> -->

</body>
</html>