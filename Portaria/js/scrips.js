// tudo referente a pagina home

// mostrar e esconder submenu do usuário logad
function mostrarsubmenuuser(){
    let submenuuser = document.getElementById("submenuperfil");
    submenuuser.style.display = "block"
}
function fecharsubmenuuser(){
    let submenuuser = document.getElementById("submenuperfil");
    submenuuser.style.display = "none"

}

// Função de fortação para input's com RG

function Mascara_rghome(Mascara_rg, input) { 

    const recebe = Mascara_rg.split("")
    const numRg = input.value.replace(/\D/g, "")
    const cursor = input.selectionStart
  
    for(let i=0; i<numRg.length; i++){
        recebe.splice(recebe.indexOf('#'), 1,numRg[i])
    }
  
    var rg = document.getElementById('doocumento')
    if (rg.value.length == 2 || rg.value.length == 6) {
        rg.value += "."
    } else if(rg.value.length == 10){
        rg.value += "-"
    }
  };
  // Função de fortação para input's com RG para retrigir

function Mascara_rg(Mascara_rg, input) { 

    const recebe = Mascara_rg.split("")
    const numRg = input.value.replace(/\D/g, "")
    const cursor = input.selectionStart
  
    for(let i=0; i<numRg.length; i++){
        recebe.splice(recebe.indexOf('#'), 1,numRg[i])
    }
  
    var rg = document.getElementById('doocumentorestringir')
    if (rg.value.length == 2 || rg.value.length == 6) {
        rg.value += "."
    } else if(rg.value.length == 10){
        rg.value += "-"
    }
  };

  function Mascara_rgfuncionario(Mascara_rg, input) { 

    const recebe = Mascara_rg.split("")
    const numRg = input.value.replace(/\D/g, "")
    const cursor = input.selectionStart
  
    for(let i=0; i<numRg.length; i++){
        recebe.splice(recebe.indexOf('#'), 1,numRg[i])
    }
  
    var rg = document.getElementById('documentfuncionario')
    if (rg.value.length == 2 || rg.value.length == 6) {
        rg.value += "."
    } else if(rg.value.length == 10){
        rg.value += "-"
    }
  };


//   Mascara de celular
function mascara_celular() {
    var pegarcel = document.getElementById("masckcelular");
    if (pegarcel.value.length == 5) {
        pegarcel.value += "-"
    }
};

// Somar e dar a resultado de nascimento e idade do morador
function id(valor_campo) {
    return document.getElementById(valor_campo);
}
function getValor(valor_campo) {

    var valor = document.getElementById(valor_campo).value.replace('/', '');

    //document.write("Valor" + valor);//

    return parseFloat(valor);

}
function somaridade() {
    var total = getValor('datahoje') - getValor('datanascimento');
    id('resultadonascimento').value = total;

};

// Adicionar foto dos visitantes

function Botaoativarfotovisita(){
    const wrapper =  document.querySelector(".wrapper-foto-visit");
    const nomeaquivo =  document.querySelector(".nome-aquivo-foto-visit");
    const sairbt =  document.querySelector("#sair-bt-foto-visit");
    const btcarfot =  document.querySelector("#bt-carfot-foto-visit");
    const custombtn =  document.querySelector("#custom-btn-foto-visit");
    const img =  document.querySelector("#fotovisit");
    let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;
        btcarfot.click();
    
    btcarfot.addEventListener("change", function(){
        const file = this.files[0];
        if(file){
            const reader = new FileReader();
            reader.onload =function(){
                const result = reader.result;
                img.src = result;
                wrapper.classList.add("active");
            }
            sairbt.addEventListener("click", function(){
                img.src = "";
                wrapper.classList.remove("active");
            });
            reader.readAsDataURL(file);
        }
        if(this.value){
            let valueStore =  this.value.match(regExp);
            nomeaquivo.textContent = valueStore;
        }
    });
}

// Adicionar foto dos bloqueados
function Botaoativarfotobloqueados(){
    const wrapper =  document.querySelector(".addphotoblock");
    const nomeaquivo =  document.querySelector(".nome-aquivo-foto-visit");
    const sairbt =  document.querySelector("#sair-bt-foto-visit");
    const btcarfot =  document.querySelector("#bt-carfot-foto-bloqueados");
    const custombtn =  document.querySelector("#custom-btn-foto-bloqueados");
    const img =  document.querySelector("#fotobloqueados");
    let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;
        btcarfot.click();
    
    btcarfot.addEventListener("change", function(){
        const file = this.files[0];
        if(file){
            const reader = new FileReader();
            reader.onload =function(){
                const result = reader.result;
                img.src = result;
                wrapper.classList.add("active");
            }
            sairbt.addEventListener("click", function(){
                img.src = "";
                wrapper.classList.remove("active");
            });
            reader.readAsDataURL(file);
        }
        if(this.value){
            let valueStore =  this.value.match(regExp);
            nomeaquivo.textContent = valueStore;
        }
    });
}

// Adicionar foto dos Funconários
function Botaoativarfotofuncionario(){
    const wrapper =  document.querySelector(".addphotofuncionario");
    const nomeaquivo =  document.querySelector(".nome-aquivo-foto-visit");
    const sairbt =  document.querySelector("#sair-bt-foto-visit");
    const btcarfot =  document.querySelector("#bt-carfot-foto-funcionarios");
    const custombtn =  document.querySelector("#custom-btn-foto-bloqueados");
    const img =  document.querySelector("#fotofuncionarios");
    let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;
        btcarfot.click();
    
    btcarfot.addEventListener("change", function(){
        const file = this.files[0];
        if(file){
            const reader = new FileReader();
            reader.onload =function(){
                const result = reader.result;
                img.src = result;
                wrapper.classList.add("active");
            }
            sairbt.addEventListener("click", function(){
                img.src = "";
                wrapper.classList.remove("active");
            });
            reader.readAsDataURL(file);
        }
        if(this.value){
            let valueStore =  this.value.match(regExp);
            nomeaquivo.textContent = valueStore;
        }
    });
}

// Adicionar foto dos Veículo
function Botaoativarfotoveiculo(){
    const wrapper =  document.querySelector(".addphotoveiculo");
    const nomeaquivo =  document.querySelector(".nome-aquivo-foto-visit");
    const sairbt =  document.querySelector("#sair-bt-foto-visit");
    const btcarfot =  document.querySelector("#bt-carfot-foto-veiculo");
    const custombtn =  document.querySelector("#custom-btn-foto-bloqueados");
    const img =  document.querySelector("#fotoveiculo");
    let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;
        btcarfot.click();
    
    btcarfot.addEventListener("change", function(){
        const file = this.files[0];
        if(file){
            const reader = new FileReader();
            reader.onload =function(){
                const result = reader.result;
                img.src = result;
                wrapper.classList.add("active");
            }
            sairbt.addEventListener("click", function(){
                img.src = "";
                wrapper.classList.remove("active");
            });
            reader.readAsDataURL(file);
        }
        if(this.value){
            let valueStore =  this.value.match(regExp);
            nomeaquivo.textContent = valueStore;
        }
    });
}

// Adicionar foto dos Animais
function Botaoativarfotoanimais(){
    const wrapper =  document.querySelector(".addphotoanimais");
    const nomeaquivo =  document.querySelector(".nome-aquivo-foto-visit");
    const sairbt =  document.querySelector("#sair-bt-foto-visit");
    const btcarfot =  document.querySelector("#bt-carfot-foto-animais");
    const custombtn =  document.querySelector("#custom-btn-foto-bloqueados");
    const img =  document.querySelector("#fotoanimais");
    let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;
        btcarfot.click();
    
    btcarfot.addEventListener("change", function(){
        const file = this.files[0];
        if(file){
            const reader = new FileReader();
            reader.onload =function(){
                const result = reader.result;
                img.src = result;
                wrapper.classList.add("active");
            }
            sairbt.addEventListener("click", function(){
                img.src = "";
                wrapper.classList.remove("active");
            });
            reader.readAsDataURL(file);
        }
        if(this.value){
            let valueStore =  this.value.match(regExp);
            nomeaquivo.textContent = valueStore;
        }
    });
}

// função mostrar senha

function mostrarSenha(){
    let olhoone = document.getElementById("viewone");
    let olhodou = document.getElementById("viewduo");
    var tipo = document.getElementById("formmoradorsenha");
    if(tipo.type == "password"){
        tipo.type = "text";
        olhoone.style.display = "block";
        olhodou.style.display = "none";
    }else{
        tipo.type = "password";
        olhoone.style.display = "none";
        olhodou.style.display = "block";
    }
};

