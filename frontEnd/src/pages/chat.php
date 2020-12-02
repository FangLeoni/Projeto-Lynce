<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="../../themes/global.css">
    <link rel="stylesheet" href="../styles/chat.css">

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
</head>
<body>
     
    <?php
        session_start();

        if($_SESSION['logado'] != true ) {
            header("Location: index.html");
        }

    ?> 

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
        <div class="conversationContainer">
            
            <!-- <div class="userConversation" >
                <img src="../../assets/icons/user.svg" alt="user">
    
                <div>
                    <h4>Leonardo Martines</h4>
                    <h4>São Vicente</h4>
                </div>
            </div> -->
        </div>
        <!-- <div class="inbox">

        </div> -->

    </section>
    <section class="chatContainer">
        <main class="chat">
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
        </main>
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
    <!-- <script src="../js/webSocket.js" ></script> -->

</body>
</html>