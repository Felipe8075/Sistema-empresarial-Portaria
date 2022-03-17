// mascara para formatação de documento rg

function Mascara_rg(Mascara_rg, input) { 

    const recebe = Mascara_rg.split("")
    const numRg = input.value.replace(/\D/g, "")
    const cursor = input.selectionStart
  
    for(let i=0; i<numRg.length; i++){
        recebe.splice(recebe.indexOf('#'), 1,numRg[i])
    }
  
    var rg = document.getElementById('doocumentobloc')
    if (rg.value.length == 2 || rg.value.length == 6) {
        rg.value += "."
    } else if(rg.value.length == 10){
        rg.value += "-"
    }
  }
  
  // Fim da mascara mascara para formatação de documento rg

// FUNÇÃO PARA CARREGAR A FOTO NO MORADOR //

function Botaoativar(){
    const wrapper =  document.querySelector(".wrapper-content");
    const nomeaquivo =  document.querySelector(".nome-aquivo");
    const sairbt =  document.querySelector("#fechar");
    const btcarfot =  document.querySelector("#bt-carfot");
    const custombtn =  document.querySelector("#custom-btn");
    const img =  document.querySelector("img");
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

// FIM DA FUNÇÃO PARA CARREGAR A FOTO NO MORADOR //

// FUNÇÃO PARA CARREGAR A FOTO DO VEÍCULO DOS MORADORES //

function Botaoativarfotoveiculo(){
    const wrapper =  document.querySelector(".wrapper-content-capfotveiculo");
    const nomeaquivo =  document.querySelector(".nome-aquivo-capfotveiculo");
    const sairbt =  document.querySelector("#fechar-capfotveiculo");
    const btcarfot =  document.querySelector("#bt-carfot-capfotveiculo");
    const custombtn =  document.querySelector("#custom-btn-car");
    const img =  document.querySelector("#imgeve");
    let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;
        btcarfot.click();
    
    btcarfot.addEventListener("change", function(){
        const file = this.files[0];
        if(file){
            const reader = new FileReader();
            reader.onload =function(){
                const result = reader.result;
                img.src = result;
                wrapper.classList.add("activee");
            }
            sairbt.addEventListener("click", function(){
                img.src = "";
                wrapper.classList.remove("activee");
            });
            reader.readAsDataURL(file);
        }
        if(this.value){
            let valueStore =  this.value.match(regExp);
            nomeaquivo.textContent = valueStore;
        }
    });
}

// FIM DA FUNÇÃO PARA CARREGAR A FOTO DO VEÍCULO DOS MORADORES //

// FUNÇÃO PARA CARREGAR A FOTO DO FUNCIONÁRIO DOS MORADORES //

function Botaoativarfotofuncinario(){
    const wrapper =  document.querySelector(".wrapper-content-funcionario");
    const nomeaquivo =  document.querySelector(".nome-aquivo-funcionario");
    const sairbt =  document.querySelector("#fechar-funcionario");
    const btcarfot =  document.querySelector("#bt-carfot-funcionario");
    const custombtn =  document.querySelector("#custom-btn-func");
    const img =  document.querySelector("#imgefuncionario");
    let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;
        btcarfot.click();
    
    btcarfot.addEventListener("change", function(){
        const file = this.files[0];
        if(file){
            const reader = new FileReader();
            reader.onload =function(){
                const result = reader.result;
                img.src = result;
                wrapper.classList.add("activeee");
            }
            sairbt.addEventListener("click", function(){
                img.src = "";
                wrapper.classList.remove("activeee");
            });
            reader.readAsDataURL(file);
        }
        if(this.value){
            let valueStore =  this.value.match(regExp);
            nomeaquivo.textContent = valueStore;
        }
    });
}


// FIM DA FUNÇÃO PARA CARREGAR A FOTO DO FUNCIONÁRIO DOS MORADORES //


// FUNÇÃO PARA CARREGAR A FOTO DO FUNCIONÁRIO DOS MORADORES //

function Botaoativarfotopetanimal(){
    const wrapper =  document.querySelector(".wrapper-content-petanimal");
    const nomeaquivo =  document.querySelector(".nome-aquivo-petanimal");
    const sairbt =  document.querySelector("#fechar-petanimal");
    const btcarfot =  document.querySelector("#bt-carfot-petanimal");
    const custombtn =  document.querySelector("#custom-btn-pet");
    const img =  document.querySelector("#petanimal");
    let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;
        btcarfot.click();
    
    btcarfot.addEventListener("change", function(){
        const file = this.files[0];
        if(file){
            const reader = new FileReader();
            reader.onload =function(){
                const result = reader.result;
                img.src = result;
                wrapper.classList.add("activeee");
            }
            sairbt.addEventListener("click", function(){
                img.src = "";
                wrapper.classList.remove("activeee");
            });
            reader.readAsDataURL(file);
        }
        if(this.value){
            let valueStore =  this.value.match(regExp);
            nomeaquivo.textContent = valueStore;
        }
    });
}


// FIM DA FUNÇÃO PARA CARREGAR A FOTO DO FUNCIONÁRIO DOS MORADORES //petanimal

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

// FIM DA FUNÇÃO PARA CARREGAR A FOTO DO VEÍCULO DOS MORADORES //


// FIM DA FUNÇÃO PARA CARREGAR A FOTO DA CORRESPONDÊNCIA DOS MORADORES //

function Botaoativarfotocorrespondencia(){
    const wrapper =  document.querySelector(".wrapper-foto-correspondencias");
    const nomeaquivo =  document.querySelector(".nome-aquivo-foto-correspondencias");
    const sairbt =  document.querySelector("#sair-bt-foto-correspondencias");
    const btcarfot =  document.querySelector("#bt-carfot-foto-correspondencias");
    const custombtn =  document.querySelector("#custom-btn-foto-correspondencia");
    const img =  document.querySelector("#fotocorrespondencias");
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

// FIM DA FUNÇÃO PARA CARREGAR A FOTO DO VEÍCULO DOS MORADORES //

//FUNÇÃO QUE NOS PERMITE MOSTRAR E ESCUNDER UMA DETERMINADA DIV ATRAVES DE UMA SELEÇÃO COM O SELECT//

$(document).ready(function(){

    $('#animais').on('change',function(){

        var selectValor = '#'+$(this).val();

        $('#paiselect').children('div').hide();

        $('#paiselect').children(selectValor).show();

    });

});

$(document).ready(function(){

    $('#inputpai').on('change',function(){

        var selectValoor = $(this).val();
        alert (selectValoor);
    })
})





$(document).ready(function(){

    $('#selectdefi').on('change',function(){

        var selectValoor = '#'+$(this).val();

        $('#paicdtmorador').children('#Sim').hide();

        $('#paicdtmorador').children(selectValoor).show();

    });

});

//FIM DA FUNÇÃO QUE NOS PERMITE MOSTRAR E ESCUNDER UMA DETERMINADA DIV ATRAVES DE UMA SELEÇÃO COM O SELECT//




//FUNÇÃO QUE NOS PERMITE MOSTRAR E ESCUNDER UMA DETERMINADA DIV ATRAVES DO UM CLICK NO BOTÃO DESTINADO//

var buttontrasport = document.getElementById("solicitar");
var bttransport = document.getElementById("form-solicitar");


buttontrasport.addEventListener("click", function() {

    var bttransport = document.getElementById("form-solicitar");

    if (bttransport.style.display==="none"){
        bttransport.style.display = "block";
    }else{
        bttransport.style.display = "none";
    }

});              
//FIM DA FUNÇÃO QUE NOS PERMITE MOSTRAR E ESCUNDER UMA DETERMINADA DIV ATRAVES DO UM CLICK NO BOTÃO DESTINADO//



//FUNÇÃO QUE NOS PERMITE MOSTRAR E ESCUNDER O MENU PRINCIPAL DA TELA INICIAL// OBSERVAÇÃO ESTÁ FUNÇÃO EXIGE MAIS ALGUMAS DETERMINADAS FUNÇÕES QUE SE ENCONTRAM NO BADY DA PAGINA QUE ESTA O MENU //
let btn = document.querySelector("#nav_toggle");
let sidebar = document.querySelector("#navbar");

btn.onclick = function() {
    sidebar.classList.toggle("active");
}
//FIM DA FUNÇÃO QUE NOS PERMITA MOSTRAR E ESCUNDER O MENU PRINCIPAL DA TELA INICIAL//

//FUNÇÃO QUE NOS PERMITE PEGAR DADOS DE UM INPUT E COLOCAR E OUTRO INPUT//

function fuc(valor_num){
    return document.getElementById(valor_num);
}

function ed(valor_num){
    return document.getElementById(valor_num);
}

function gitvalor(valor_num){
    var valorcasa = document.getElementById(valor_num).value;

    return parseFloat( valorcasa );
}

function casa(){
    var resultnumcasa = gitvalor ('nuaprt');
    ed('ovalornumcasa').value = resultnumcasa;
    fuc('casafunc').value = resultnumcasa;
    ed('casapet').value = resultnumcasa;

}

//FIM DA FUNÇÃO QUE NOS PERMITE PEGAR DADOS DE UM INPUT E COLOCAR E OUTRO INPUT//


//FUNÇÃO QUE NOS PERMITE PEGAR DADOS DE UM INPUT E COLOCAR E OUTRO INPUT//

function recebloc(valor_bloc){
    return document.getElementById(valor_bloc);
}

function gitvalor(valor_bloc){
    var valorcasa = document.getElementById(valor_bloc).value;

    return parseFloat( valorcasa );
}

function levbloc(){
    var resultnumcasa =  gitvalor ('lavbloco');
    recebloc('trasbloco').value = resultnumcasa;
    recebloc('blocpet').value = resultnumcasa;
    recebloc('blococarmoradaor').value = resultnumcasa;

}

function mostradivatualizarfoto(){

    inputcomvalordaimagem = document.getElementById("esconder_input").value;
    pegandodivconform = document.getElementById("form_atualizar_foto");

    if ( inputcomvalordaimagem == ""){
        pegandodivconform.style.display = "block";
    };

   
} 


