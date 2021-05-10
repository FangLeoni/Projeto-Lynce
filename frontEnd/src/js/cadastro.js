let formulario = document.querySelector("form");
let pswd = document.querySelector("#senha")
let confPswd = document.querySelector("#confSenha")
let line = document.querySelector(".inputBox > div")

formulario.addEventListener("submit",(e)=>{
    e.preventDefault();

    if(pswd.value != confPswd.value){
        e.preventDefault();
        Swal.fire({
                title: 'Oops!',
                text: "Senhas diferentes",
                icon: 'error',
                confirmButtonText: "Tentar novamente"
            })
        line.style.backgroundColor = "#FF2D2D";
        return false;
    }
    else {
        line.style.backgroundColor = "#2EFF81";

        const formData = new FormData(formulario)

        const url = "/server/php/cadastro.php";
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
                title: 'Sucesso!',
                text: "Cadastro realizado com sucesso!",
                icon: 'success',
                confirmButtonText: "Ok"
            }).then((isConfirmed) => {if(isConfirmed) location.href = './login.html'})               
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
})

// ------------------------------------------------------------------------------- //

function inputHandler(masks, max, event) {
    let c = event.target;
    let v = c.value.replace(/\D/g, '');
    let m = c.value.length > max ? 1 : 0;
    VMasker(c).unMask();
    VMasker(c).maskPattern(masks[m]);
    c.value = VMasker.toPattern(v, masks[m]);
}

let telMask = ['(99) 9999-99999', '(99) 99999-9999'];
let tel = document.querySelector('#tel');
VMasker(tel).maskPattern(telMask[0]);
tel.addEventListener('input', inputHandler.bind(undefined, telMask, 14), false);

// ------------------------------------------------------------------------------- //

const tipos = document.querySelectorAll('input[name="tipo_conta"]')
        const tec_col = document.querySelectorAll(".tec_col")
        for (const tipo of tipos) {
            tipo.addEventListener("click",()=>{
                if (tipo.checked && (tipo.value == "tecnico")) {
                    for(const col of tec_col ) {
                        col.className = "col"
                    }
                } else if (tipo.checked && tipo.value == "cliente") {
                    for(const col of tec_col ) {
                        col.className = "tec_col"
                    }
                }
            })

            
        }