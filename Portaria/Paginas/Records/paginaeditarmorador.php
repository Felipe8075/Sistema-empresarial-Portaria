<?php
include_once("../../conexao.php");
$sql = "select * from cmoradores";
$consulta = mysqli_query($conexao,$sql);
$busca = mysqli_num_rows($consulta);

$id = filter_input (INPUT_GET, 'inviarid');
$sql = "SELECT * FROM cmoradores WHERE codigo = '$id'";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../../CSS/bootstrap-tagsinput.css">
    <script src="../../functions.js"></script>
    <link rel="stylesheet" href="../../CSS/firststyle.css">
    <title>Cadastro de moradores</title>

    <style type="text/css">
		.carregando{
			color:#ff0000;
			display:none;
		}
	</style>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@200&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap');
    </style>

    <script>
        function escondereditarfotomor(){
            var wappercompleto = document.getElementById("wepper_conteiner_edita_foto_moradores");

            wappercompleto.style.display = "none";
        };

        function monstrareditafotomor(){
            var wappercompleto = document.getElementById("wepper_conteiner_edita_foto_moradores");

            wappercompleto.style.display = "block";
        };
    </script>

</head>
<body onload="escondereditarfotomor()">

            
    <!--INICIANDO A PAGINA DE CADASTRO DE CONDOMÍNOS-->
    <div class="warpper-cdtmoradores">
        <!--CABEÇALHO DA PAGINA DE CADASTRO DE CONDOMÍNOS-->
        <div class="header-cdtmoradores">
            <div class="title-cdtmoradores">
                <h2>Editar o Cadastro do Morador</h2>
                <div class="informtion-title-cdtmoradores">
                    <p><i class="fas fa-caret-left seta"></i>Tela de edição do Morador</p>
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
                <p>Dados Editáveis do Comdômino</p>
            </div>

            <form method="post" action="eviaredtarmorador.php" enctype="multipart/form-data">
                <div class="dados-cdtmoradores" id="paicdtmorador">
                    
                    <div class="content-input">
                        <input type="text" name="num-apartamento" class="input-dados-cdtmoradores" id="nuaprt" onblur="casa()" placeholder="N° Ap e bloco" value="<?php echo $lenderesult['apt']; ?>" required>
                    </div>
                    <select name="alocacao" class="selecttypealocado">
                        <option class="oselectionprincipal" value="<?php echo $lenderesult['alocado'];?>"><?php echo $lenderesult['alocado'];?></option>
                        <option value="Esquerda">Esquerda</option>
                        <option value="Direita">Direita</option>
                        <option value="Meio">Meio</option>
                        <option value="Frente">Frente</option>
                        <option value="Fundos">Fundos</option>
                    </select>
                     
                    <div class="content-input">
                        <input type="text" id="datanascimento" name="data" placeholder="Ano de Nascimento" class="input-dados-cdtmoradores" onblur="soma()" maxlength="4" value="<?php echo $lenderesult['anonasc']; ?>" required >
                    </div>


                    <input type="text" name="id" value="<?php echo $lenderesult['codigo']; ?>" hidden>
                    
                    <div class="content-input">
                        <input type="text" name="nome_moradorC"class="input-dados-cdtmoradores-nome" placeholder="Nome Completo do Morador" value="<?php echo $lenderesult['nomeMor']; ?>" required>
                    </div>
                    
                    <select name="sexo" class="selecttypealocado" >
                        <option class="oselectionprincipal" value="<?php echo $lenderesult['sexo'];?>"><?php echo $lenderesult['sexo'];?></option>
                        <option  value="Feminino" >Feminino</option>
                        <option  value="Masculino">Masculino</option>
                    </select>

                    <div class="content-input">
                        <input type="text" name="telef-residencial"class="input-dados-cdtmoradores" placeholder="Telefone ou Ramal" value="<?php echo $lenderesult['teleRes']; ?>" required>
                    </div>

                    <div class="content-input">
                        <input type="text" name="telef-celular1"class="input-dados-cdtmoradores" placeholder="Celular" value="<?php echo $lenderesult['teleCel1']; ?>" required>
                    </div>
                    <select name="situacao" class="selecttypealocado" >
                        <option class="oselectionprincipal" value="<?php echo $lenderesult['situacao'];?>"><?php echo $lenderesult['situacao'];?></option>
                        <option value="Proprietário" >Proprietário</option>
                        <option value="Inquilino">Inquilino</option>
                        <option value="conjugue">conjugue</option>
                        <option value="Familiar">Familiar</option>
                    </select>

                    <div class="content-input">
                        <input type="text" name="telef-celular2"class="input-dados-cdtmoradores-nome" placeholder="Nome do portador do número de emergencia" value="<?php echo $lenderesult['teleCel2']; ?>">
                    </div>
                    <div class="content-input">
                        <input type="text" name="tel"class="input-dados-cdtmoradores" placeholder="Tel Emergência" value="<?php echo $lenderesult['teleEMR']; ?>" required>
                    </div>

                    <select name="existe" class="selecttypealocado" id="selectdefi" >
                        <option class="oselectionprincipal" value="<?php echo $lenderesult['deficiente'];?>"><?php echo $lenderesult['deficiente'];?></option>
                        <option value="Sim" >Sim</option>
                        <option value="Não">Não</option>
                    </select>
                    <div class="content-input">
                        <input type="text" name="daycadastro"class="input-dados-cdtmoradores" value="<?php echo $lenderesult['datacadastro']; ?>">
                    </div>
                    <div class="content-input">
                        <input type="text" name="idademorador" class="input-dados-cdtmoradores" id="resultadonascimento" placeholder="Idade" value="<?php echo $lenderesult['idade']; ?>" required>
                    </div>

                    <div class="content-input" id="Sim">
                        <input type="text" name="tipo-defi"class="input-dados-cdtmoradores-nome" placeholder="Tipo de deficiência (exemplo: física, mental) " >
                    </div>

                    <div class="content-input">
                        <input type="text" name="email"class="input-dados-cdtmoradores-nome" placeholder="E-mail (exemplo:   joãoluca@gmail.com) " value="<?php echo $lenderesult['emailMor']; ?>" required>
                    </div>

                    <div class="content-input">
                        <input type="text" name="apartamentonumber"class="input-dados-cdtmoradores" id="datahoje" value="<?php echo date('Y'); ?>" hidden>
                    </div>
                </div>

                <div class="visualize_fotodomorador">
                    <img src="../Galeria/Fotomoradores/<?php echo $lenderesult['fotografia']; ?>">
                </div>

                            <div class="btnsalvarcdtmoradoresdadosedi">
                                <button type="submit" value="salvar" class="btn btn-primary salvarimorador"><ion-icon name="save-outline" class="iconcadastrarmorador"></ion-icon>Salvar Dados</button>
                            </div>
                            <div class="btnbuscarfotocdtmoradordadosedi">
                                <button type="button" class="btn btn-success" onclick="monstrareditafotomor()" id="custom-btn"><ion-icon name="image-outline" class="buscar-foto"></ion-icon>Carregar foto</button>
                            </div>
                            
                   
                    
                <!-- BOTÕES DE SALVAR CADASTRO E ADICIONAR UMA IMAGEM DO MORADOR-->

                
            </form>
            <div id="wepper_conteiner_edita_foto_moradores">
                <form method="post" action="edicaofotodemorador.php" enctype="multipart/form-data">
                    <input type="text" name="id" value="<?php echo $lenderesult['codigo']; ?>" hidden>
                    <div class="mostrarimagemparaeditar">
                        <div class="wapper_btn_fecha_ftedid">
                            <div class="btn_fechar_ftedid" onclick="escondereditarfotomor()">
                                X
                            </div>
                        </div>
                        <div class="estilizaedicaoimagem">
                            <div class="warpper-fotografia-cdtmoradores-edit">
                                <div class="container"> 
                                    <div class="wrapper-content">

                                        <div class="image">
                                            <img src="../Galeria/Fotomoradores/<?php echo $lenderesult['fotografia'];?>">
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
                            <div class="btnbuscarfotocdtmoradored">
                                <button type="button" class="btn btn-success" onclick="Botaoativar()" id="custom-btn"><ion-icon name="image-outline" class="buscar-foto"></ion-icon>Escolher foto</button>
                            </div>

                            <div class="btnsalvarcdtmoradoresed">
                                <button type="submit" value="salvar" class="btn btn-primary salvarimorador"><ion-icon name="save-outline" class="iconcadastrarmorador"></ion-icon>Salvar Foto</button>
                            </div>
                        </div>     
                    </div>
                </form>
                <!-- FIM BOTÕES DE SALVAR CADASTRO E ADICIONAR UMA IMAGEM DO MORADOR-->
            </div>
               
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