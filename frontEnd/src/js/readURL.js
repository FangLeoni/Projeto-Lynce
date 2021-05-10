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