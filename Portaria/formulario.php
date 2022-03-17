<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de cadastro</title>

    <link rel="stylesheet" href="estilo.css">
    <script src="functions.js"></script>
    

    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap');

    @import url('https://fonts.googleapis.com/css2?family=DM+Mono:wght@300&display=swap');
    </style>
    
</head>
<body>
<p class="titulando-form">FORMULÁRIO DE CADASTRO</p>
    <div id="centralizando">
        <main id="fotografia">
            <div id="Form-cadastro">
                <div id="cont-input">
                    <form method="post" action="processa.php" enctype="multipart/form-data">
                    
                    <input type="number" name="num-apartamento" class="ap" placeholder="Num apartamento" required>
                    <input type="text" name="bloco" class="ap" placeholder="bloco" required>
                    <input type="text" name="alocacao"class="ap"  placeholder="Alocação">
                    <input type="text" name="nome-moradorC" class="moradorC" placeholder="Nome do morador" required>
                    <input type="date" name="data" class="nascimento" placeholder="Data de Nascimento" required>
                    <input type="text" name="documentacao" id="doc" placeholder="Documento RG" autocomplete="off" maxlength="12" onkeyup="Mascara_rg('##.###.###-#', this)" required>
                    <section class="chack-sexo">
                    Sexo<input type="radio" name="sexo" value="Maculino">Masculino
                    <input type="radio" name="sexo" value="Feminino">Feminino
                    </section>

                    <input type="text" name="telef-residencial" class="tel" placeholder="Telefone Residêncial">
                    <input type="text" name="telef-celular1" class="tel" placeholder="Telefone Celular" required>
                    <input type="text" name="telef-celular2" class="tel" placeholder="Telefone Celular">
                    <section class="chack">
                    <input type="radio" name="situacao" value="Proprietário"> Proprietário
                    <input type="radio" name="situacao" value="Inquilino">Inquilino
                    </section>

                    <input type="email" name="email" class="email" placeholder="E-mail" required>

                    <section id="chack-defok">
                    Existe deficiênte na residência ?<input type="radio" name="existe" value="Existe pessoas com defeciência"> Sim
                    <input type="radio" name="existe" value="Não existe pessoas com defeciência">Não
                    </section>

                    <input type="text" name="tipo-defi" class="type-def" placeholder="Tipo de deficiência">
                    <input type="text" name="nome-deficiente" class="type-def" placeholder="Nome do Deficiênte">
                    <input type="text" name="grau" class="tel" placeholder="Crie uma senha" required>
                    <input type="tel" name="tel" class="tel" placeholder="Telefone para emergência">
                    </div>

                    <div class="container"> 
                        <div class="wrapper">
                        
                            <div class="image">
                                <img src="" alt="">
                            </div>
                        
                            <div class="content">
                                <div class="icon"><i class="fas fa-cloud-upload-alt up"></i></div>
                                <div class="text">Selecione uma imagem</div>
                                </div>
                                <div id="sair-bt"><i class="fas fa-times"></i></div>
                                <div class="nome-aquivo">Nome do Arquivo</i></div>
                            </div>
                            <label for="inputlg" for="name"></label>
                            <input id="bt-carfot" type="file" name="fotoo" hidden>
                        </div>    
                    </div> 
                    <button type="submit" value="salvar" id="btn-salvar"><i class="fas fa-file-export"></i></button>
                    </form>
                    <button onclick="Botaoativar()" id="custom-btn"><i class="fas fa-camera"></i></button>
                    <button type="exit" id="btn-sair"><i class="fas fa-times-circle"></i></button>
                </div>
            </div>    
        </main>
    </div>    

    <div class="conteiner-floter" id="conteiner-floter">
        <div class="floter">
            <h2>Aviso</h2>
            <div class="barrabr"></div>
            <div class="descricion">
            <samp>A uniforte com a prioridade em zelar da segurança dos condôminos, também esta na luta contra a   covid 19 e devido aos agravamentos que o mundo vem enfrentando na luta contra essa pandemia,  desenvolvemos um método simples para que todos estejam no parâmetro de segurança, através desta ficha pré cadastral facilitarão o nosso trabalho em reconhecimento e preservação de todos os condôminos. </samp>
            <p>Ass. Gestão uniforte e segurança em serviços</p>
            </div>
            <button class="btn-fechar" id="btn-fechar">Fechar</button>
        </div>
    </div>

    <!--INCLUINDO BOTÃO DE FECHAR NO FORMULÁRIO DE PRÉ CADASTRO-->
    
    <script>
        var buttonfecharformu = document.getElementById("btn-fechar");

        buttonfecharformu.addEventListener("click", function() {

            var btt = document.getElementById("conteiner-floter");

            btt.classList.toggle("hide");


        });
    </script>
</body>
</html>