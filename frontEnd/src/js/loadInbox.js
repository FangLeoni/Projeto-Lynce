async function loadInbox() {

    const url = "/server/php/loadInbox.php";
    console.log("FOI")
    await fetch(url)
    .then((res) => res.text())
    .then((html) => {
        // console.log( typeof html)
        if(html != false) {
            leftBar.innerHTML = html;
        } else {
            inbox.innerHTML = html
        }
    })
    .catch((err) => console.log(`Não foi possivel carregar: ${err}`));
    const photoCont = document.querySelector(".photoCont");
    
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

// document.addEventListener("DOMContentLoaded", function(event) {
//     console.log("DOM completamente carregado e analisado");
//   });

document.addEventListener("DOMContentLoaded", () => { 
    loadInbox(); 
    console.log("OLA")
});