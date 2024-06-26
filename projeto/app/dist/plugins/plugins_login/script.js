const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

function validacaoEmail(field) {
    usuario = field.value.substring(0, field.value.indexOf("@"));
    dominio = field.value.substring(field.value.indexOf("@")+ 1, field.value.length);
    if ((usuario.length >=1) &&
        (dominio.length >=3) &&
        (usuario.search("@")==-1) &&
        (dominio.search("@")==-1) &&
        (usuario.search(" ")==-1) &&
        (dominio.search(" ")==-1) &&
        (dominio.search(".")!=-1) &&
        (dominio.indexOf(".") >=1)&&
        (dominio.lastIndexOf(".") < dominio.length - 1)) {
    document.getElementById("msgemail").innerHTML="E-mail válido";
    alert("email valido");
    }
    else{
    document.getElementById("msgemail").innerHTML="<font color='red'>Email inválido </font>";
    alert("E-mail invalido");
    }
    }

function formatCPF(cpfInput) {
        let cpf = cpfInput.value;
        
        
        cpf = cpf.replace(/\D/g, "");
        
       
        if (cpf.length > 3 && cpf.length <= 6) {
            cpf = cpf.replace(/^(\d{3})(\d+)/, "$1.$2");
        } else if (cpf.length > 6 && cpf.length <= 9) {
            cpf = cpf.replace(/^(\d{3})(\d{3})(\d+)/, "$1.$2.$3");
        } else if (cpf.length > 9) {
            cpf = cpf.replace(/^(\d{3})(\d{3})(\d{3})(\d+)/, "$1.$2.$3-$4");
        }
        
        
        cpfInput.value = cpf;
    }    

function limitCharacters(input, maxLength) {
        if (input.value.length > maxLength) {
            input.value = input.value.slice(0, maxLength);
        }
    }    