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