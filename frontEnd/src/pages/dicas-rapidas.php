<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/dicas-rapidas.css">
    <link rel="stylesheet" href="../styles/scroll-css.css">
    <title>Dicas Rápidas</title>
</head>



<body>

    <?php
        session_start();

        if($_SESSION['logado'] != true ) {
            header("Location: ./login.html");
        }
        else {
        }
    ?>

        <div class="container">
            <!-- <header class="navbar"></header> -->
            <!-- LISTA DE DICAS -->
            <main class="lista">
                <div class="container-lista">

                    <scroll-container class="scroll-1">
                        <div class="top-titulo">
                            <!--COLOCAR O LINK DA PAGINA HOME-->
                            <a href="./home.php" class="voltar">Clique AQUI para voltar</a>
                            <a href="#page-0">
                                <h1 class="titulo">Bem vindo à nossa página de dicas rápidas</h1>
                            </a>

                        </div>
                        <main class="lista-box">

                            <main class="scroll-dicas">
                                <a href="#page-1">
                                    <div class="conteudo-dica">
                                        <h3>Meu aparelho molhou</h3>
                                    </div>
                                </a>
                            </main>
                            <main class="scroll-dicas">
                                <a href="#page-2">
                                    <div class="conteudo-dica">
                                        <h3>Como posso economizar a bateria do meu celular?</h3>
                                    </div>
                                </a>
                            </main>
                            <main class="scroll-dicas">
                                <a href="#page-3">
                                    <div class="conteudo-dica">
                                        <h3>Meu celular está muito cheio</h3>
                                    </div>
                                </a>
                            </main>
                            <main class="scroll-dicas">
                                <a href="#page-4">
                                    <div class="conteudo-dica">
                                        <h3>Como posso localizar meu aparelho em caso de furto</h3>
                                    </div>
                                </a>

                                <!--FALTA FAZER-->
                                <!-- </main>
                        <main class="scroll-dicas">
                            <a href="#page-5">
                                <div class="conteudo-dica">
                                    <h3>Como forçar a reinicialização do meu aparelho?</h3>
                                </div>
                            </a>
                        </main> -->

                            </main>
                    </scroll-container>
                </div>
                </main>

                <!-- CONTEÚDOS -->
                <main class="conteudo">
                    <scroll-container class="scroll-top">
                        <scroll-page id="page-1">
                            <div class="dica">
                                <scroll-container class="scroll-3">
                                    <h3>Meu aparelho molhou, o que devo fazer?</h3>
                                    <h4> Seu aparelho caiu na água? bem, se sim e seu celular não é a prova d'água, vamos passar o melhor procedimento a se fazer para evitar futuros problemas maiores</h4>
                                    <img src="../../assets/img-dicas/celular_molhado.jpg" class="img-conteudo">
                                    <h4> A primeira coisa a se fazer é evitar usar o aparelho, as vezes o aparelho mesmo molhado, continua em pleno funcionamento, porém, caso tenha entrado umidade no interior do dispositivo, assim como um câncer, pode ir se
                                        expalhando gradativamente pela placa, assim o danificando</h4>
                                    <img src="../../assets/img-dicas/cuba.jpg" class="img-conteudo">
                                    <h4>É muito importante que ao levar uma assistência técnica, não haja omissão ao explicar o que de fato causou o problema, portanto, se seu celular obteve contato com qualquer tipo de líquido, não exite em expor o ocorrido
                                        ao técnico, a falta dessa informação pode fazer com que o técnico recorra a procedimentos que, se o aparelho tiver molhado, pode causar danos irreversíveis no aparelho, portanto, sem medo diga ,sempre que for o
                                        caso, que seu aparelho molhou, assim o técnico irá fazer os procedimentos corretos de desoxidação de placa normalmente por meio de uma cuba ultrassônica.</h4>
                                    <img src="../../assets/img-dicas/arroz.jpg" class="img-conteudo" alt="">
                                    <h4>E caso esteja pensando em colocar o seu aparelho no arroz, sinto lhe informar mas o procedimento não funciona, pelo menos não de forma definitiva, bem, mas então, o que acontece quando colocamos o celular no arroz?
                                        Quando você insere o dispositivo no arroz, ele absorve apenas uma pequena, quase que insignificante quantidade da umidade do aparelho, as vezes (se você der sorte) o suficiente para o aparelho voltar a ligar, porém,
                                        já tenha em mente que talvez em poucas horas o aparelho volte a apresentar defeitos.</h4>
                                </scroll-container>
                            </div>
                        </scroll-page>
                        <scroll-page id="page-2">
                            <div class="dica">
                                <scroll-container class="scroll-3">
                                    <h3>Como posso economizar a bateria do meu celular?</h3>
                                    <h4> descarrega rápidamente? bem, se a sua resposta for sim, temos aqui algumas dicas que podem ajudar a aumentar a durabilidade de seu dispositivo</h4>
                                    <img src="../../assets/img-dicas/celular-bateria.jpg" class="img-conteudo" alt="file:///C:/Users/Galeno/Desktop/ProjetoLynce/ProjetoLynce/frontEnd/assets/img-dicas/celular-bateria.jpg">
                                    <h4> bem, as dicas que vamos dar aqui te ajudará a aumentar a durabilidade do seu dispositivo, porém, caso esteja tendo problema com a bateria de seu dispositivo, recomendamos que leve a alguma das assistências recomendadas
                                        aqui pelo site para que seja feita a subtituição da bateria</h4>

                                    <h4>
                                        <b>DICA 1 - Use Somente o Necessário</b>
                                    </h4>
                                    <img src="../../assets/img-dicas/notifica.jpg" class=" img-conteudo ">
                                    <h4>
                                        Sabe aquelas funções que ficam na sua barra com as funções de ativar Wi-Fi, Bluetooth, GPS, dados móveis, rotação de tela e diversas outras funções? Pois bem, se quer ver uma boa melhora no rendimento de sua bateria, aconcelhamos que deixe ativado somente
                                        o que você está realmente usando, como por exemplo, ao sair na rua, você não estará conectado mais com a rede Wi-Fi de sua casa certo? Logo ao desativar o Wi-Fi irá fazer com que seu smartphone esteja executando
                                        menos uma função, isso serve também para o bluetooth, se você não está realizando nenhuma conexão bluetooth, não há porque deixa-lo ativado, garanto que com essa dica com certeza sua bateria terá um melhor rendimento
                                        longe das tomadas.
                                    </h4>
                                    <h4>
                                        <b>DICA 2 - Evite a Vibração de seu Smartphone</b>
                                    </h4>
                                    <img src="../../assets/img-dicas/vibrate.jpg" class="img-conteudo">
                                    <h4>
                                        Sabia que a vibração do seu smartphone demanda uma energia absurda pra funcionar? Pois é, portanto o quanto você puder evitar vibrações em games, silenciar notificações em apps que não usa com frequência ou até mesmo selecionar uma vibração mais curta
                                        nas configurações do seu aparelho, melhor será, com certeza seu aparelho vai agradecer depois desse pequeno ajuste.
                                    </h4>

                                    <h4>
                                        <b>DICA 3 - Ajustes de Tela</b>
                                    </h4>
                                    <img src="../../assets/img-dicas/brilho.jpg" class="img-conteudo">
                                    <h4>
                                        Outra coisa que também demanda muita bateria, se não o que mais demanda bateria no smastphone é o uso da tela, e tudo bem que esse parece que não dá pra evitar, mas garanto que sim, tem como realizar pequenos ajustes para que seu dispositivo dure mais
                                        tempo longe das tomadas. Ajustar o brilho da tela conforme o uso não o deixando sempre no seu máximo pode ajudar, ir nas configurações e ajustar o desligamento automático da tela por menos de 5 minutos também pode
                                        ser uma boa.
                                    </h4>
                                    <h4>
                                        <b>DICA 4 - Ou Wi-Fi ou Dados Móveis</b>
                                    </h4>
                                    <img src="../../assets/img-dicas/wifi-dados.jpg" class="img-conteudo">
                                    <h4>
                                        Lembra da primeira dica citada aqui? Então, nesta dica estamos reforçando um hábito insistente na vida de muitos smartphones por ai. Muitas vezes você acaba deixando o Wi-Fi ativado e os Dados Móveis também, porém não é fazer isso que vai melhorar o desempenho
                                        de seu smartphone pela internet, na verdade ele só consegue desfrutar ou de um ou de outro, portanto ao fazer isso, você está literalmente desperdiçando bateria a toa, logo, fuja disso, ou um ou outro, garanto que
                                        fará diferença.
                                    </h4>

                                    <h4>
                                        <b>DICA 5 - Apps em Segundo Plano</b>
                                    </h4>
                                    <img src="../../assets/img-dicas/desinstalar.jpg" class="img-conteudo">
                                    <h4>
                                        Nesta dica, você além de ajudar no rendimento de sua bateria, irá também dar um pequeno alívio para o armazenamento de seu smartphone, sabe aquele app que você já não usa faz tempo, já nem lembrava mais que tinha instalado ele e ainda vive te enchendo
                                        de notificações que lotam sua barra de navegação, realizar a desinstalação desse app pode ajudar no rendimento de sua bateria pois, esse app pode funcionar em segundo plano (funcionar enquanto você utiliza outros
                                        apps, ou enquanto não usa o smartphone) além de estar consumindo o tão precioso armazenamento de seu dispositivo.
                                    </h4>
                                </scroll-container>
                            </div>
                        </scroll-page>
                        <scroll-page id="page-3">
                            <div class="dica">
                                <scroll-container class="scroll-3">
                                    <h3>Como liberar espaço no meu aparelho?</h3>
                                    <h4> Seu aparelho está lotado?, lnão consegue baixar mais nem um app, não consegue baixar nem uma simples foto? sua galeria nem abre mais? Não se preocupe pois com as dicas que daremos a seguir, você provavelmente possa
                                        finalmente tirar aquela notificação irritante de "armazenamento sem espaço ".</h4>
                                    <img src="../../assets/img-dicas/varroura-celular.jpg " class="img-conteudo ">
                                    <h4> Bem, vamos lá, primeiramente, já vou avisando de que você terá que desapegar de alguns apps que você não use com frequência, sabe aquele joguinho que já está mofando na sua lista de app? ou aquele aplicativo que você
                                        nem sabe o que faz ou o porque está ali mas você sempre procrastina para desinstalar? Iremos acabar com eles de uma vez por todas.</h4>
                                    <h4>Depois disso iremos excluir alguns arquivos desnecessários, normalmente arquivos de vídeo costumam ocupar bastante espaço, vá até sua galeria (Caso ela não abra vá até seus arquivos, e encontre a pasta "DCIM " e vá
                                        em "Câmera ") e exclua aquele vídeo que você gravou a anos atrás e já não faz mais questão de sua exietência, se puder, apague também os vídeos e gifs de bom dia que você recebe daquele grupo de WhatsApp. </h4>
                                    <img src="../../assets/img-dicas/files.jpg " class="img-conteudo ">
                                    <h4>Após seguir os passos acima, iremos agora dar dicas de como impedir que seu armazenamento lote novamente. Recomendamos que instale o app "Google Files ", ele é um app que serve tanto para ajudar você a limpar seu armazenamento
                                        quanto para gerencia-lo. Ele é gratuito e não tem anuncios no app.</h4>
                                </scroll-container>
                            </div>
                        </scroll-page>
                        <!--INICIO-->
                        <scroll-page id="page-4">
                            <div class="dica">
                                <scroll-container class="scroll-3">
                                    <h3>Como localizar seu aparelho em caso de furto ou perda do aparelho.</h3>
                                    <h4> Teve seu dispositivo perdido ou furtado? sem problemas, iremos dar possíveis formas de localizar seu dispositivo.</h4>
                                    <a href="https://www.google.com/android/find">
                                        <img src="../../assets/img-dicas/find-my-device-pc.jpg " class="img-conteudo-link ">
                                    </a>
                                    <h4> O "Encontre meu dispositivo" pode ser sua salvação, ele é vinculado a sua conta google e você pode ir por um computador até o site, logando com sua conta e ele irá mostrar a localização e outras informações sobre seu
                                        dispositivo.
                                    </h4>
                                    <h4>
                                        Se você perdeu um dispositivo da Apple, saiba que seu iPhone, graças a sua conta da iCloud, pode ser localizado, assim como o funcionamento do "Encontre Meu Dispositivo", a Apple tem uma parte do site que serve especialmente para a localização de seu
                                        dispositivo, basta logar com sua conta iCloud e ,baseado em sua última sincronização, a localização do dispositivo será apresentada na tela.
                                    </h4>
                                    <a href="https://www.apple.com/br/icloud/find-my/">
                                        <img src="../../assets/img-dicas/apple.png " class="img-conteudo-link ">
                                    </a>
                                    <h4>
                                        Clicando nas imagens que disponibilizamos, você será encaminhado para os sites referentes a cada imagem, espero que consiga encontrar seu dispositivo, boa sorte.
                                    </h4>
                                </scroll-container>
                            </div>
                        </scroll-page>
                        <!--FIM-->

                </main>
        </div>
</body>

</html>