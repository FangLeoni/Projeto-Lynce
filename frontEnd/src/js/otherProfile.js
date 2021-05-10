async function otherProfile(otherId) {
    const url = `/server/php/otherProfile.php?otherId=${otherId}`;
    
    await fetch(url)
    .then((res) => res.text())
    .then((html) => {
        leftBar.innerHTML = html;
    })
    .catch((err) => console.log(`Não foi possivel carregar: ${err}`));
}