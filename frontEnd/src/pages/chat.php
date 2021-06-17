<?php
    session_start();

    if($_SESSION['logado'] != true ) {
        header("Location: login.html");
    }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/images/logo_semFundo.png" type="image/x-icon">
    <title>Chat</title>

    
    <!-- ---- CSS ---- -->
        <link rel="stylesheet" href="../../themes/global.css">
        <link rel="stylesheet" href="../styles/chat.css">
    <!-- ------------- -->

    <!-- ---- Sweet_Alert2 ---- -->
        <link rel="stylesheet" href="../libraries/Sweet_alert2/sweetalert2.css">
        <script src="../libraries/Sweet_alert2/sweetalert2.js"></script>
    <!-- ---------------------- -->
</head>
<body>

	<section class="leftBar">
		<div class="topCont">
			<a href="./home.php" class="voltar"><--</a>

			<div class="photoCont" onclick="loadProfile()">
				<img src="/server/profilePics/<?php echo $_SESSION['codigo']?>/<?php echo $_SESSION['profPic'] ?>" alt="perfil">
			</div>
		</div>
			<form class="searchBar">
				<!-- <input type="text" name="search" autocomplete="off"> -->
				<input 
					type="text" 
					name="search" 
					autocomplete="off"
					value="
					<?php 
						if(isset($_GET["addTech"])) {
							echo  $_GET["addTech"] ;
						}
					?>"
				>	
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
			
		const inbox = document.querySelector(".inbox");
		const chatHTML = document.querySelector(".rightBar");
		
		const leftBar = document.querySelector(".leftBar")

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

		function sendFile(filePath) {
				conn.send(JSON.stringify({command: "arquivo", fileName: filePath }));
		}     

		async function updateProfile() {
				const form = document.querySelector(".profInfoCont");
				form.addEventListener("submit",(e)=>{
						e.preventDefault();

						const formData = new FormData(form)

						const url = "/server/php/updateProfile.php";
						const options = {
								method: "POST",
								body: formData
						}
						
						fetch(url,options)
						.then(function(response) {
								if (!response.ok) {
										throw Error(response.statusText);
								}
								return response;
						})
						.then((res) => {
								Swal.fire({
										toast: true,
										title: 'Perfil Atualizado',
										icon: 'success',
										showConfirmButton: false,
										position: 'top-end',
										timer: 1000,
										timerProgressBar: true,
								}).then(()=>loadProfile())          
						})
						.catch((err) => {
								Swal.fire({
										title: 'Oops!',
										text: err,
										icon: 'error',
										confirmButtonText: "Tentar novamente"
								})
						});  
								
				})
				
		}

		async function loadProfile() {
				const url = "/server/php/profile.php";
				
				await fetch(url)
				.then((res) => res.text())
				.then((html) => {
							
						leftBar.innerHTML = html;
						
				})
				.catch((err) => console.log(`Não foi possivel carregar: ${err}`));

				const profilePhotoInput = document.querySelector("#profilePhotoInput");
				const uploadPic = document.querySelector("#uploadPic");
				updateProfile()
				profilePhotoInput.addEventListener("change",async () => { 
						const formData = new FormData(uploadPic)
						const url = "/server/php/updatePhoto.php";
						
						const options = {
								method: "POST",
								body: formData
						}

						await fetch(url,options)
						.then((res) => loadProfile())
						.catch((err) => console.log(`Não foi possivel carregar: ${err}`));
				})
		}
		
		async function loadInbox() {

				const url = "/server/php/loadInbox.php?addTech=<?php 
						if(isset($_GET["addTech"])) {
							echo  $_GET["addTech"] ;
						}
							
						?>";
				
				await fetch(url)
				.then((res) => res.text())
				.then((html) => {
						if(html != false) {
								leftBar.innerHTML = html;
						} else {
								// inbox.innerHTML = html;
								// console.log(html)
						}
				})
				.catch((err) => console.log(`Não foi possivel carregar: ${err}`));
				// const photoCont = document.querySelector(".photoCont");
				
				// photoCont.addEventListener("click",() => {
				//     loadProfile();
				// })

				const clickables = document.querySelectorAll('.userConversation')
				const menus = document.querySelectorAll('#menu')
				
				clickables.forEach((clickable,idx)=>{
						clickable.addEventListener('contextmenu', e => {
						e.preventDefault()
								menus[idx].style.top = `${e.clientY}px`
								menus[idx].style.left = `${e.clientX}px`
								menus[idx].classList.toggle('show')
						})
				})

				
				
				const search = document.querySelector(".searchBar");
				search.addEventListener("keyup", async (e) => {
						e.preventDefault();
						searchFunc() 
				})
		}

		async function otherProfile(otherId) {
				const url = `/server/php/otherProfile.php?otherId=${otherId}`;
				
				await fetch(url)
				.then((res) => res.text())
				.then((html) => {
						leftBar.innerHTML = html;
				})
				.catch((err) => console.log(`Não foi possivel carregar: ${err}`));
		}

		async function deleteConv(idConv) {
				const formData = new FormData()
				formData.append("idConv", idConv);

				const url = "/server/php/deleteConversation.php";
				const options = {
						method: "POST",
						body: formData
				}
				
				fetch(url,options)
				.then(function(response) {
						if (!response.ok) {
								throw Error(response.statusText);
						}
						return response;
				})
				.then((res) => {
						Swal.fire({
								toast: true,
								title: 'Conversa deletada!',
								icon: 'success',
								showConfirmButton: false,
								position: 'top-end',
								timer: 1000,
								timerProgressBar: true,
						}).then(()=>loadInbox())          
				})
				.catch((err) => {
						Swal.fire({
								title: 'Oops!',
								text: err,
								icon: 'error',
								confirmButtonText: "Tentar novamente"
						})
				});  
		}

		function checkDeleteConv(idConv) {

				const isConfirmed = Swal.fire({
						title: 'Cuidado!',
						text: "Tem certeza que quer deletar essa conversa?",
						icon: 'warning',
						showCancelButton: true,
						cancelButtonText: "Não",
						confirmButtonText: "Sim"
				}).then((lol)=>{if(lol.isConfirmed) deleteConv(idConv)})
		}

		async function searchFunc() {
				const inbox = document.querySelector(".inbox");
				let searchData = document.querySelector(".searchBar > input");

				const url = `/server/php/search.php?pesquisa=${searchData.value}`;

				if(searchData.value.trim().length > 0){
						await fetch(url)
						.then((res) => res.text())
						.then((html) => {
										inbox.innerHTML = html
						})
						.catch((err) => console.log(`Não foi possivel carregar: ${err}`))
						const clickables = document.querySelectorAll('.userConversation')
						const menus = document.querySelectorAll('#menu')
						
						clickables.forEach((clickable,idx)=>{
								clickable.addEventListener('contextmenu', e => {
								e.preventDefault()

										menus[idx].style.top = `${e.clientY}px`
										menus[idx].style.left = `${e.clientX}px`
										menus[idx].classList.toggle('show')
								})
						})
				} else {
						loadInbox();
				}
				
		}

		function enviarArquivoChat(idConv, cdOther) {
			let chatConv = document.querySelector(".Chat");
				let arquivoInput = document.querySelector("#arquivo");
				arquivoInput.addEventListener("change", async () => { 
					const formData = new FormData();

          formData.append("idConv", idConv)
          formData.append("cdUser", cdOther)
          formData.append("arquivo", arquivoInput.files[0])

						const url = `/server/php/enviarArquivoChat.php`;
						
						const options = {
								method: "POST",
								body: formData
						}

						const res = await fetch(url,options).catch((err) => console.log(`Não foi possivel carregar: ${err}`));
						const data = await res.text()
						
						sendFile(data)

						const ext = data.split('.').pop();
						const nome = data.split('\\').pop().split('/').pop();

						let d = new Date(); 

						if(
							ext == "png" ||
							ext == "jpeg" ||
							ext == "jpg" ||
							ext == "svg"
						) {
							chatConv.innerHTML += `
								<div class="mainMessageCont">
										<div class="mainUserCont">
										<div> <img src="${data}" alt=""> </div>
											<span> ${d.getFullYear()}-${d.getMonth()}-${d.getDate()} ${d.getHours()}:${d.getMinutes()}:${d.getSeconds()} //</span>
										</div>
								</div>
						`;
							
						} else {
							chatConv.innerHTML += `
								<div class="mainMessageCont">
										<div class="mainUserCont">
										<a href="${data}" download>${nome}</a>
											<span> ${d.getFullYear()}-${d.getMonth()}-${d.getDate()} ${d.getHours()}:${d.getMinutes()}:${d.getSeconds()} //</span>
										</div>
								</div>
						`;
						}

						chatConv.scrollTop = chatConv.scrollHeight;
						
						
				})
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
				
				enviarArquivoChat(idConv,cdUser);

				conn.onmessage = function(e) {
						
						chatConv.innerHTML += e.data;
						chatConv.scrollTop = chatConv.scrollHeight;
				};
								
				messageForm.addEventListener("submit", (e)=>{
						e.preventDefault();

						const url = `/server/php/sendMessage.php?idConv=${idConv}&cdUser=${cdUser}&message=${menssageInput.value}`;

						if(menssageInput.value.length > 0) {
								
								let d = new Date(); 
								chatConv.innerHTML += `
										<div class="mainMessageCont">
												<div class="mainUserCont">
														<p>${menssageInput.value}</p>
														<span> ${d.getFullYear()}-${d.getMonth()}-${d.getDate()} ${d.getHours()}:${d.getMinutes()}:${d.getSeconds()} //</span>
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

		function readURL(input) {
				
				if (input && input[0]) {
						const profilePhoto = document.querySelector("#profilePhoto");
						let reader = new FileReader();

						reader.addEventListener("load", function () {
								profilePhoto.src = reader.result;
						}, false);

						if (input[0]) {
								reader.readAsDataURL(input[0]);
						}
				}
		}

		document.addEventListener("DOMContentLoaded", () => { 
				loadInbox();
		});	
	</script>

<!-- <script src="../js/loadInbox.js"></script> -->
    <!-- <script src="../js/loadProfile.js"></script> -->
    <!-- <script src="../js/webSocket.js"></script>
    <script src="../js/updateProfile.js"></script>
    <script src="../js/searchFunc.js"></script>
    <script src="../js/readURL.js"></script>
    <script src="../js/otherProfile.js"></script>
    <script src="../js/deleteConv.js"></script>
    <script src="../js/checkDeleteConv.js"></script>
    <script src="../js/chat.js"></script> -->

</body>
</html>