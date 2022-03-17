<?php
include_once("../conexao.php");
$sql = "select * FROM cmoradores";
$consulta = mysqli_query($conexao,$sql);
$busca = mysqli_num_rows($consulta);

$id = filter_input (INPUT_GET, 'inviarid');
$sql = "SELECT * FROM solicitacdmorador WHERE codigo = '$id'";
$resultadouser = mysqli_query($conexao,$sql);
$lenderesult = mysqli_fetch_assoc($resultadouser);

?>

<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/bootstrap-tagsinput.css">
    <script src="../functions.js"></script>
    <link rel="stylesheet" href="../CSS/firststyle.css">
    <title>Cadastro de moradores</title>


    <style>
    @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@200&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap');
    </style>

    <script type="text/javascript">
    function mostrar_btncad() {
        var primeirasenha = document.getElementById("digitasenhaum");
        var segundasenha = document.getElementById("digitasenhadois");
        var paragrafo = document.getElementById("pmostrarsesenhaestacorreta");

        var mousbtncad = document.getElementById("btncadastrarcsr");

        if (primeirasenha.value != segundasenha.value) {
            mousbtncad.disabled = true;
            paragrafo.style.display = "block";
        } else {
            mousbtncad.disabled = false;
            paragrafo.style.display = "none";
        };
    };

    function esconderoparagrafosenha() {
        var paragrafoa = document.getElementById("pmostrarsesenhaestacorreta");
        var mousbtncad = document.getElementById("btncadastrarcsr");

        paragrafoa.style.display = "none";
        mousbtncad.disabled = true;
    }
    </script>

    <script>
    function mascara_apart() {
        var numapart = document.getElementById("nuaprt");
        if (numapart.value.length == 2) {
            numapart.value += "-"
        }
    };

    function mascara_telefoneresi() {
        var pegartele = document.getElementById("telef-residencial");
        if (pegartele.value.length == 4) {
            pegartele.value += "-"
        }
    };

    function mascara_celular() {
        var pegarcel = document.getElementById("masckcelular");
        if (pegarcel.value.length == 5) {
            pegarcel.value += "-"
        }
    };

    function mascara_celularopcinal() {
        var pegarcelopci = document.getElementById("msckcalopcional");
        if (pegarcelopci.value.length == 5) {
            pegarcelopci.value += "-"
        }
    };

    function mascara_celularemergenc() {
        var pegarcelemerg = document.getElementById("msckcalemergen");
        if (pegarcelemerg.value.length == 5) {
            pegarcelemerg.value += "-"
        }
    };
    </script>



</head>

<body onload="esconderoparagrafosenha()">

    <script>
    function id(valor_campo) {
        return document.getElementById(valor_campo);
    }

    function getValor(valor_campo) {

        var valor = document.getElementById(valor_campo).value.replace('/', '');

        //document.write("Valor" + valor);//

        return parseFloat(valor);

    }


    function soma() {

        var total = getValor('datahoje') - getValor('datanascimento');
        id('resultadonascimento').value = total;

    }
    </script>




    <!--INICIANDO A PAGINA DE CADASTRO DE CONDOMÍNOS-->
    <div class="warpper-cdtmoradores">
        <!--CABEÇALHO DA PAGINA DE CADASTRO DE CONDOMÍNOS-->
        <div class="header-cdtmoradores">
            <div class="title-cdtmoradores">
                <h2>Cadastrar Condôminos</h2>
                <div id="timer"></div>
                <div class="informtion-title-cdtmoradores">
                    <p><i class="fas fa-caret-left seta"></i>Tela de Cadastro de Moradores</p>
                </div>
            </div>

            <div class="conteiner-btnvoltar">
                <div class="voltar-home">
                    <a href="../index.php">
                        <ion-icon name="arrow-back-circle-outline" class="msg-icon"></ion-icon>
                        <span class="nome-novo-msg">Voltar</span>
                    </a>
                </div>
                <div class="information-btnvoltar">
                    <p>Voltar ao início</p>
                </div>
            </div>
        </div>
        <!--FIM DO CABEÇALHO DA PAGINA DE CADASTRO DE CONDOMÍNOS-->

        <!--MEIO (PRINCIPIO) DA PAGINA DE CADASTRO DE CONDOMÍNOS-->
        <div class="meio-primary" id="myGroup">
            <div class="title-dados-condominos">
                <p>Dados do Comdômino</p>
            </div>

            <form method="post" action="processa.php" enctype="multipart/form-data">
                <div class="dados-cdtmoradores" id="paicdtmorador">

                    <div class="content-input">
                        <input type="text" name="num-apartamento" class="input-dados-cdtmoradores" id="nuaprt"
                            onKeyUp="mascara_apart()" placeholder="N° Ap e bloco"
                            value="<?php echo $lenderesult['apt']; ?>" required>
                        <div class="exempl">
                            <p>Exem: cs/aprt 25</p>
                        </div>
                    </div>
                    <select name="alocacao" class="selecttypealocado">
                        <option class="oselectionprincipal" value="<?php echo $lenderesult['alocado'];?>">
                            <?php echo $lenderesult['alocado'];?></option>
                        <option value="Esquerda">Esquerda</option>
                        <option value="Direita">Direita</option>
                        <option value="Meio">Meio</option>
                        <option value="Frente">Frente</option>
                        <option value="Fundos">Fundos</option>
                    </select>

                    <div class="content-input">
                        <input type="text" id="datanascimento" name="data" placeholder="Ano de Nascimento"
                            class="input-dados-cdtmoradores" onblur="soma()" maxlength="4"
                            value="<?php echo $lenderesult['anonasc']; ?>" required>
                        <div class="exempldta">
                            <p>Exem: 1865</p>
                        </div>
                    </div>

                    <div class="content-input">
                        <input type="text" name="nome-moradorC" class="input-dados-cdtmoradores-nome"
                            placeholder="Nome Completo do Morador" value="<?php echo $lenderesult['nomeMor']; ?>"
                            required>
                    </div>

                    <div class="content-input">
                        <input type="text" name="documentacao" id="doc" class="input-dados-cdtmoradores"
                            placeholder="Documento" autocomplete="off" maxlength="12"
                            onkeyup="Mascara_rg('##.###.###-#', this)" value="<?php echo $lenderesult['documento']; ?>"
                            required>
                        <div class="exempldocu">
                            <p>Exem: 45.625.585-6</p>
                        </div>
                    </div>

                    <select name="sexo" class="selecttypealocado">
                        <option class="oselectionprincipal" value="<?php echo $lenderesult['sexo'];?>">
                            <?php echo $lenderesult['sexo'];?></option>
                        <option value="Feminino">Feminino</option>
                        <option value="Masculino">Masculino</option>
                    </select>

                    <div class="content-input">
                        <input type="text" name="telef-residencial" class="input-dados-cdtmoradores"
                            id="telef-residencial" placeholder="Telefone" onKeyUp="mascara_telefoneresi()"
                            value="<?php echo $lenderesult['teleRes']; ?>" required>
                        <div class="exempltel">
                            <p>(11)2500-5684 ou 02</p>
                        </div>
                    </div>

                    <div class="content-input">
                        <input type="text" name="telef-celular1" class="input-dados-cdtmoradores" id="masckcelular"
                            placeholder="Celular" onKeyUp="mascara_celular()"
                            value="<?php echo $lenderesult['teleCel1']; ?>" required>
                        <div class="exemplcel">
                            <p>Exem:(11)95566-4488</p>
                        </div>
                    </div>

                    <div class="content-input">
                        <input type="text" name="telef-celular2" class="input-dados-cdtmoradores" id="msckcalopcional"
                            onKeyUp="mascara_celularopcinal()" placeholder="Celular opcional">
                        <div class="exemplcelop">
                            <p>Exem:(11)95566-4488</p>
                        </div>
                    </div>

                    <select name="situacao" class="selecttypealocado">
                        <option class="oselectionprincipal" value="<?php echo $lenderesult['situacao'];?>">
                            <?php echo $lenderesult['situacao'];?></option>
                        <option value="Proprietário">Proprietário</option>
                        <option value="Inquilino">Inquilino</option>
                        <option value="Inquilino">Filho(a)</option>
                        <option value="Inquilino">conjugue</option>
                        <option value="Inquilino">Familiar</option>
                    </select>

                    <div class="content-input">
                        <input type="text" name="tel" class="input-dados-cdtmoradores" id="msckcalemergen"
                            placeholder="Tel Emergência" onKeyUp="mascara_celularemergenc()" value="<?php echo $lenderesult['teleEMR']; ?>" required>
                        <div class="exemplcelemer">
                            <p>Exem:(11)95566-4488</p>
                        </div>
                    </div>

                    <select name="existe" class="selecttypealocado" id="selectdefi">
                        <option class="oselectionprincipal" value="<?php echo $lenderesult['deficiente'];?>"><?php echo $lenderesult['deficiente'];?></option>
                        <option value="Sim">Sim</option>
                        <option value="O Morador não tem nem um tipo de deficiência">Não</option>
                    </select>

                    <div class="content-input" id="Sim">
                        <input type="text" name="tipo-defi" class="input-dados-cdtmoradores-nome"
                            placeholder="Tipo de deficiência (exemplo: física, mental) ">
                    </div>

                    <div class="content-input">
                        <input type="text" name="email" class="input-dados-cdtmoradores-nome"
                            placeholder="E-mail (exemplo:   joãoluca@gimail.com)" value="<?php echo $lenderesult['emailMor']; ?>" required>
                    </div>

                    <div class="content-input">
                        <input type="password" name="grau" class="input-dados-cdtmoradores" id="digitasenhaum"
                            placeholder="Crie uma Senha" value="<?php echo $lenderesult['nomeDef']; ?>" required>
                    </div>

                    <div class="content-input">
                        <input type="password" name="nome-deficiente" class="input-dados-cdtmoradores"
                            id="digitasenhadois" placeholder="Confirmar Senha" onKeyUp="mostrar_btncad()" value="<?php echo $lenderesult['grauPar']; ?>" required>
                    </div>
                    <?php  
                    date_default_timezone_set('America/Sao_Paulo'); 
                    date_default_timezone_set("Brazil/East");
                    ?>
                    <div class="content-input">
                        <input type="text" name="daycadastro" class="input-dados-cdtmoradores"
                            value="<?php echo date('d/m/Y'); ?>">
                    </div>

                    <div class="content-input">
                        <input type="text" name="apartamentonumber" class="input-dados-cdtmoradores" id="datahoje"
                            value="<?php echo date('Y'); ?>" hidden>
                    </div>

                    <div class="content-input">
                        <input type="text" name="idademorador" class="input-dados-cdtmoradores" id="resultadonascimento"
                            placeholder="Idade" value="<?php echo $lenderesult['idade']; ?>" required>
                        <div class="exemplidade">
                            <p>Esta é a sua Idade</p>
                        </div>
                    </div>
                </div>



                <div class="warpper-fotografia-cdtmoradores">
                    <div class="container">
                        <div class="wrapper-content">

                            <div class="image">
                                <img src="" alt="">
                            </div>

                            <div class="content">
                                <div class="icon-foto"><i class="fas fa-cloud-upload-alt up"></i></div>
                                <div class="text">Selecione uma imagem</div>
                            </div>
                            <div id="fechar"><i class="fas fa-times"></i></div>
                            <div class="nome-aquivo">Nome do Arquivo</i></div>
                        </div>
                        <label for="inputlg" for="name"></label>
                        <input id="bt-carfot" type="file" name="foto" hidden>
                    </div>
                </div>
        </div>

        <div class="btnsalvarcdtmoradores">
            <button type="submit" value="salvar" class="btn btn-primary salvarimorador" id="btncadastrarcsr">
                <ion-icon name="save-outline" class="iconcadastrarmorador"></ion-icon>Cadastrar
            </button>
        </div>

        <div class="btnbuscarfotocdtmorador">
            <button type="button" class="btn btn-success" onclick="Botaoativar()" id="custom-btn">
                <ion-icon name="image-outline" class="buscar-foto"></ion-icon>Escolher foto
            </button>
        </div>
    </div>

    <p class="pmostrarsesenhaestacorreta" id="pmostrarsesenhaestacorreta">A senha digitada esta diferente !</p>

    <!-- BOTÕES DE SALVAR CADASTRO E ADICIONAR UMA IMAGEM DO MORADOR-->


    </form>

    <!--FIM DO MEIO (PRINCIPIO) DA PAGINA DE CADASTRO DE CONDOMÍNOS-->

    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap-tagsinput.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    </div>
    <!--FIM DA PAGINA DE CADASTRO DE CONDOMÍNOS-->
</body>

</html>