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