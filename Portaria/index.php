<!-- CONECXÃO COM O BANCO DE DADO MSQL-->
<?php
include_once("conexao.php");
session_start();


include("logar/verifica.php");


$email = $_SESSION['Emaail'];
$testedenome = $_SESSION['nome'];
$fotografia = $_SESSION['Fotouser'];
$idcodigo = $_SESSION['Codigo'];

$sql = "SELECT * FROM cmoradores";
$consulta = mysqli_query($conexao,$sql);

$seleciinardbuser = "SELECT Foto FROM user WHERE  ID ='$idcodigo'";
$resultadoebuser = mysqli_query($conexao,$seleciinardbuser);


$selecionar = "SELECT * FROM registrosdeentrada WHERE  button ='btnsaidavisitaaa.png'";
$resultadodaselecao = mysqli_query($conexao,$selecionar);
$contandoregistro = mysqli_num_rows($resultadodaselecao);

$selecionarnovamente = "SELECT * FROM registrosdeentrada WHERE  abaprestador ='Prestador de serviços'";
$resultadodeprestador = mysqli_query($conexao,$selecionarnovamente);
$contandorprestador = mysqli_num_rows($resultadodeprestador);


$selecionarentrega = "SELECT * FROM entregas WHERE  resposta ='imgbtnentregar.png'";
$resultadocontentrega = mysqli_query($conexao,$selecionarentrega);
$contandoregistroentrega = mysqli_num_rows($resultadocontentrega);


$selecionarfromfuncionarios = "SELECT * FROM funcionarioos";
$resultadodabuscadefuncionarios = mysqli_query($conexao,$selecionarfromfuncionarios);
$resoltadodacontagemdefuncionarios = mysqli_num_rows($resultadodabuscadefuncionarios);


$selecionarfrommensagens = "SELECT * FROM msgparaportaria WHERE locaal = 'Portaria'";
$resultadodadosmensagens = mysqli_query($conexao,$selecionarfrommensagens);
$resultadodacoletamsg = mysqli_num_rows($resultadodadosmensagens);

$selecionarfromutilizar = "SELECT * FROM dbutilizar WHERE Locaal = 'Salão de festas' and Statuus = 'CONCLUÍDO'";
$resultadodadosutilizar = mysqli_query($conexao,$selecionarfromutilizar);
$resultadodacoletautilizar = mysqli_num_rows($resultadodadosutilizar);

$selecionarfromvagas = "SELECT * FROM registrosentradadeveiculos";
$resultadodadosvagas = mysqli_query($conexao,$selecionarfromvagas);
$resultadodacoletavagas = mysqli_num_rows($resultadodadosvagas);

$selecinarbancomsg = "SELECT * FROM msgparaportaria";
$resultadodobancomsg = mysqli_query($conexao,$selecinarbancomsg);
?>
<!--TÉRMINNO-->
<?php  
    date_default_timezone_set('America/Sao_Paulo'); 
    date_default_timezone_set("Brazil/East");

?>

<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./CSS/firststyle.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="functions.js"></script>
    <title>Portaria</title>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@200&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Oxygen:wght@300&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap');
    </style>
    <script>
    function escondercontagem() {
        contadorresult = document.getElementById("resutzero");
        inputzero = document.getElementById("zero");
        contadorservicosico = document.getElementById("contadorservicos");

        if (contadorresult.value != inputzero.value) {
            contadorservicosico.style.display = "block";
        } else {
            contadorservicosico.style.display = "none";
        };

        inputquantidademgs = document.getElementById("resultvalormsg");
        contadordemensagens = document.getElementById("contadormensagens");

        if (inputquantidademgs.value != inputzero.value) {
            contadordemensagens.style.display = "block";
        } else {
            contadordemensagens.style.display = "none";
        };

    };


    function escodendoaseta() {
        esconderseta = document.getElementById("setagif_para_esquerda");

        esconderseta.style.display = "none";
    };

    function fechacomunicadoimpor() {
        fechacomic = document.getElementById("viewdeatencion");

        fechacomic.style.display = "none";

    };
    </script>

</head>

<body id="body-pd" onload="escondercontagem()">
    <!-- INÍCIO DO CONTEINER DE MENU-->
    <div class="I-navbar" id="navbar">
        <nav class="nav">
            <div class="profile">
                <img src="" alt="">
                <p></p>
            </div>
            <div class="nav_brand">
                <ion-icon name="grid-outline" class="nav_toggle" id="nav_toggle"></ion-icon>
                <a href="#" class="nav_logo">Menu Principal</a>
            </div>
            <div class="nav_list">
                <a href="index.php" class="nav_link">
                    <ion-icon name="home-outline" class="icone"></ion-icon>
                    <span class="nav-nome">Home</span>
                </a>

                <a href="#" class="nav_link">
                    <i class="far fa-calendar-alt icone "></i>
                    <span class="nav-nome">Agendamentos</span>
                </a>
                <a href="#" class="nav_link">
                    <i class="fas fa-phone icone"></i>
                    <span class="nav-nome">Contatos</span>
                </a>
                <a href="./Paginas/menuserv.php" class="nav_link">
                    <ion-icon name="albums-outline" class="icone"></ion-icon>
                    <span class="nav-nome">Serviços</span>
                </a>
                <a href="" class="nav_link">
                    <i class="fas fa-truck-loading icone"></i>
                    <span class="nav-nome">Entregas</span>
                </a>

                <a href="#" class="nav_link">
                    <ion-icon name="mail-unread-outline" class="icone"></ion-icon>
                    <span class="nav-nome">Avisos</span>
                </a>

                <a href="./Paginas/liberarvisitas.php" class="nav_link">
                    <ion-icon name="walk-outline" class="icone"></ion-icon>
                    <span class="nav-nome">Visitas</span>
                </a>

                <a href="#" class="nav_link">
                    <ion-icon name="bicycle-outline" class="icone"></ion-icon>
                    <span class="nav-nome">Bicicletário</span>
                </a>

                <a href="./Paginas/Agendamentos.php" class="nav_link">
                    <ion-icon name="clipboard-outline" class="icone"></ion-icon>
                    <span class="nav-nome">Ocorrências</span>
                </a>

                <a href="./Paginas/Saladeaula.php" class="nav_link">
                    <ion-icon name="videocam-outline" class="icone"></ion-icon>
                    <span class="nav-nome">Aula</span>
                </a>

                <a href="#" class="nav_link">
                    <ion-icon name="people-outline" class="icone"></ion-icon>
                    <span class="nav-nome">Funcionários</span>
                </a>

                <a href="./Paginas/Logout.php" class="nav_link">
                    <ion-icon name="power-outline" class="icone"></ion-icon>
                    <span class="nav-nome">Sair</span>
                </a>

            </div>
    </div>
    <!-- VIEW DE INFORMAÇÃO PARA ATENÇÃO AO COLABORADORE -->
    <!-- <div class="viewdeatencion" id="viewdeatencion">
                <div class="contentviewaticion">
                    <div class="buttonfechaerviewatencion" onClick="fechacomunicadoimpor()"><p>X</p></div>
                    <div class="iconeviewaticion">
                        <p class="titleviewatecion">
                            UNIFORTE INFORMA
                        </p>
                        <ion-icon name="alert-circle-outline"></ion-icon>
                    </div>
                    <p class="conteudodetextatencion">
                        Aos colaboradores!  O sistema integrado na portaria é de extrema importância
                        para o nosso trabalho e controle, por esse motivo nosso sistema esta sendo 
                        monitorado de ponta a ponta 24 horas diárias contando com  suporte técnico 
                        totalmente online e remoto por tanto é obrigatório o registro de visitas e 
                        prestadores de serviços c/ (FOTO), veículos, entregas e correspondências no ato 
                        de recebimento pelo colaborador  bem como no ate de retirada pelo destinatário,
                        ocorrências gravíssimas além de seu relato no grupo de whatsapp, devem ser
                        relatados no sistema para que se necessário uma consulta rápida pela nossa
                        equipe tenhamos excelência nas exigências para com o solicitante.


                           <p class="atenciosamente">Att:  Uniforte Serviços e Segurança</p>
                    </p>
                </div>
            </div>  -->


    <!-- FIM DA VIEW DE INFORMAÇÃO PARA ATENÇÃO AO COLABORADORE -->




    <!-- SETA DE IDENTIFICAÇÃO PARA MOSTRAR ATUALIZAÇÃO NO SISTEMA  -->

    <!-- <div class="setagif_para_esquerda" id="setagif_para_esquerda" onClick="escodendoaseta()">
                <img src="imagens/Gif/setaparaesquerda.gif" alt=""> <p>Página de Aulas Liberada</p>
            </div> -->

    <!--FIM DA SETA DE IDENTIFICAÇÃO PARA MOSTRAR ATUALIZAÇÃO NO SISTEMA  -->


    </div><!-- FIM DO MENU -->
    <!-- FIM DO CONTEINER DE MENU -->
    <script>
    const showMenu = (toggLeId, navbarId, bodyId) => {
        const toggle = document.getElementById(toggLeId),
            navbar = document.getElementById(navbarId)
        bodypadding = document.getElementById(bodyId)
        if (toggle && navbar) {
            toggle.addEventListener('click', () => {
                navbar.classList.toggle('expander')

                bodypadding.classList.toggle('body-pd')
            })
        }
    }
    showMenu('nav_toggle', 'navbar', 'body-pd')
    </script>
    <!-- INÍCIO DO CONTEINER DE PAGINA HOME-->
    <main class="mainhomer">
        <div class="warpper-home">
            <div class="haeder-logo">
                <img src="" alt="">
            </div>
            <div class="center-pagina">
                <input type="text" id="resutzero" value="<?php echo $contandorprestador; ?>" hidden>
                <input type="text" id="zero" value="0" hidden>

                <div class="iconesinformaciosservices">
                    <p class="contadorservicos" id="contadorservicos"><?php echo $contandorprestador; ?></p>
                    <div class="contagemprestaservices"><img src="Galeria/imagensdiversas/work.png"></div>
                </div>

                <div class="iconesinformaciosmsg">
                    <input type="text" id="resultvalormsg" value="<?php echo $resultadodacoletamsg; ?>" hidden>
                    <p class="contadormensagens" id="contadormensagens"><?php echo $resultadodacoletamsg; ?></p>
                    <div><img src="Galeria/imagensdiversas/iconenotification.png"></div>
                </div>
                <!-- BOTÃO DE SUPORTE LINK DIRETO WHATSAPP -->
                <a href="https://web.whatsapp.com/send?phone=5511939551106" target="_blank" class="mybuttonsuport">
                    <img src="Galeria/imagensdiversas/whatsapp.png" alt="">
                </a>

                <!-- FIM DO BOTÃO DE SUPORTE -->

                <?php
                while($trazerfoto = mysqli_fetch_array($resultadoebuser)){
                    $foto = $trazerfoto['Foto'];
                }
            ?>
                <div class="photo_profile">
                    <img src="Galeria/Useer/<?php echo $foto;?>">
                </div>
                <div class="nameuserlogin">
                    <p><?php echo $testedenome;?></p>
                </div>

                <div class="vetorpredio">
                    <svg viewBox="0 0 837 520" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill="none"
                            d="M367.594 242.848L369.594 242.825L369.571 240.825L367.542 238.348L367.507 235.349L284.513 236.312L279.984 233.865L276.484 233.906L280.013 236.365L282.048 239.341L284.577 241.812L289.611 244.754L291.129 246.236L293.628 246.207L369.623 245.325M365.101 200.374L365.246 212.873L266.753 214.017L261.753 214.075L253.201 209.674L247.15 205.244L242.563 197.797L245.063 197.768L255.108 201.652L365.101 200.374ZM261.817 219.575L264.363 223.546L266.898 226.516L268.898 226.493L272.432 229.452L276.432 229.406L365.426 228.372L365.31 218.373L276.316 219.406L266.817 219.517L261.782 216.575L259.782 216.598L261.817 219.575ZM370.112 201.316C369.854 207.82 369.541 221.024 370.35 221.815C371.16 222.605 370.738 226.477 370.426 228.314L371.995 234.296L373.042 238.285L375.623 245.255L381.733 254.685L385.779 258.638L392.842 264.056L397.888 267.998L399.9 268.975L408.824 262.371L413.277 258.319L419.672 249.244L424.091 242.192L425.021 236.181L425.992 233.669L425.835 220.17L425.62 201.672L370.112 201.316ZM430.608 200.614L430.689 207.613L430.742 212.113L487.238 211.457L518.736 211.091L532.735 210.928L537.235 210.876L541.682 206.324L548.612 200.243L551.542 194.209L548.542 194.244L541.589 198.325L430.608 200.614ZM430.806 217.612L430.922 227.612L518.916 226.59L525.88 223.509L529.845 220.463L532.799 216.428L537.264 213.376L529.799 216.463L430.806 217.612ZM431.003 234.611L428.567 240.14L426.119 244.669L504.114 243.763L509.585 241.199L513.532 236.653L518.985 232.589L431.003 234.611ZM384.943 186.643L387.512 192.613L385.053 196.142L397.052 196.003L408.052 195.875L405.011 192.41L402.442 186.44L402.389 181.94L398.832 176.981L393.309 175.045L387.309 175.115L384.833 177.144L380.862 179.69L374.862 179.759L373.415 184.277L374.944 186.759L380.943 186.689L384.943 186.643Z" />
                        <path fill="none"
                            d="M385.945 179.108L393.445 179.036L389.979 182.57L385.95 179.608M377.684 256.69L381.227 261.157L381.26 264.656L377.817 270.689L374.879 277.218L372.398 279.241L365.899 279.303L365.794 268.304L377.684 256.69ZM387.274 266.099L391.317 270.561L388.993 289.084L381.541 294.155L377.917 281.189L387.274 266.099ZM396.335 272.513L403.335 272.446L405.511 290.927L399.592 299.483L393.521 292.041L396.335 272.513ZM407.806 269.404L411.773 265.866L420.415 280.784L418.039 293.807L410.001 289.884L407.806 269.404ZM415.249 263.333L424.905 279.741L433.405 279.66L433.281 266.661L420.687 256.781L415.249 263.333Z" />
                        <path fill="none"
                            d="M374.736 209.716L374.698 205.716L422.696 205.259L422.953 232.258L420.053 242.786L416.115 249.324L403.702 258.442L406.182 256.419L413.054 242.853L415.953 232.325L415.734 209.326L374.736 209.716Z" />
                    </svg>
                </div>

                <div class="titulouniforte">
                    <svg width="297" height="39" viewBox="0 0 297 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill="none"
                            d="M7.792 30.324C5.752 30.324 4.156 29.916 3.004 29.1C1.876 28.284 1.096 27.144 0.664 25.68C0.232 24.216 0.0160001 22.38 0.0160001 20.172V0.839998H3.904V20.352C3.904 22.56 4.156 24.24 4.66 25.392C5.188 26.544 6.232 27.12 7.792 27.12C9.352 27.12 10.384 26.544 10.888 25.392C11.416 24.24 11.68 22.56 11.68 20.352V0.839998H15.532V20.172C15.532 22.38 15.316 24.216 14.884 25.68C14.452 27.144 13.672 28.284 12.544 29.1C11.416 29.916 9.832 30.324 7.792 30.324ZM19.8149 0.839998H22.5869L30.8669 20.208V0.839998H34.2509V30H31.6589L23.2709 10.092V30H19.8149V0.839998ZM39.0504 0.839998H43.0464V30H39.0504V0.839998ZM47.7641 0.839998H59.0321V3.756H51.8321V13.476H57.4121V16.356H51.8321V30H47.7641V0.839998ZM69.2786 30.324C66.4226 30.324 64.3706 29.52 63.1226 27.912C61.8986 26.28 61.2866 23.928 61.2866 20.856V9.804C61.2866 6.78 61.9106 4.488 63.1586 2.928C64.4066 1.368 66.4466 0.587999 69.2786 0.587999C72.1106 0.587999 74.1386 1.38 75.3626 2.964C76.6106 4.524 77.2346 6.804 77.2346 9.804V20.892C77.2346 23.916 76.6106 26.244 75.3626 27.876C74.1146 29.508 72.0866 30.324 69.2786 30.324ZM69.2786 27.12C70.7906 27.12 71.8106 26.676 72.3386 25.788C72.8666 24.9 73.1306 23.556 73.1306 21.756V8.976C73.1306 7.2 72.8666 5.892 72.3386 5.052C71.8106 4.188 70.7906 3.756 69.2786 3.756C67.7426 3.756 66.7106 4.188 66.1826 5.052C65.6546 5.892 65.3906 7.2 65.3906 8.976V21.756C65.3906 23.556 65.6546 24.9 66.1826 25.788C66.7106 26.676 67.7426 27.12 69.2786 27.12ZM81.2328 0.839998H87.1008C90.0528 0.839998 92.2128 1.452 93.5808 2.676C94.9728 3.876 95.6688 5.844 95.6688 8.58C95.6688 12.324 94.4688 14.592 92.0688 15.384L96.2088 30H92.2848L88.4688 16.32H85.3008V30H81.2328V0.839998ZM86.8488 13.404C88.6008 13.404 89.8488 13.056 90.5928 12.36C91.3608 11.664 91.7448 10.404 91.7448 8.58C91.7448 7.38 91.6128 6.444 91.3488 5.772C91.0848 5.076 90.6168 4.572 89.9448 4.26C89.2728 3.924 88.3248 3.756 87.1008 3.756H85.3008V13.404H86.8488ZM103.105 3.864H98.1728V0.839998H111.961V3.864H107.173V30H103.105V3.864ZM114.772 0.839998H126.076V3.864H118.84V13.512H124.708V16.392H118.84V27.084H126.148V30H114.772V0.839998ZM144.535 30.324C142.087 30.324 140.215 29.568 138.919 28.056C137.647 26.544 136.939 24.468 136.795 21.828L140.395 20.856C140.515 22.728 140.875 24.24 141.475 25.392C142.099 26.544 143.119 27.12 144.535 27.12C145.591 27.12 146.383 26.832 146.911 26.256C147.463 25.656 147.739 24.804 147.739 23.7C147.739 22.5 147.487 21.504 146.983 20.712C146.479 19.92 145.675 19.044 144.571 18.084L139.675 13.764C138.691 12.9 137.971 11.976 137.515 10.992C137.083 9.984 136.867 8.76 136.867 7.32C136.867 5.184 137.479 3.528 138.703 2.352C139.927 1.176 141.595 0.587999 143.707 0.587999C146.011 0.587999 147.751 1.2 148.927 2.424C150.103 3.648 150.811 5.544 151.051 8.112L147.595 9.048C147.475 7.344 147.139 6.036 146.587 5.124C146.059 4.188 145.099 3.72 143.707 3.72C142.675 3.72 141.883 3.996 141.331 4.548C140.779 5.076 140.503 5.868 140.503 6.924C140.503 7.788 140.647 8.52 140.935 9.12C141.223 9.696 141.715 10.284 142.411 10.884L147.343 15.204C148.615 16.332 149.623 17.556 150.367 18.876C151.135 20.196 151.519 21.696 151.519 23.376C151.519 25.512 150.871 27.204 149.575 28.452C148.279 29.7 146.599 30.324 144.535 30.324ZM154.674 0.839998H165.978V3.864H158.742V13.512H164.61V16.392H158.742V27.084H166.05V30H154.674V0.839998ZM176.282 30.36C173.642 30.36 171.734 29.532 170.558 27.876C169.382 26.196 168.794 23.712 168.794 20.424V10.668C168.794 8.412 169.022 6.564 169.478 5.124C169.958 3.66 170.762 2.544 171.89 1.776C173.042 0.983999 174.614 0.587999 176.606 0.587999C179.294 0.587999 181.226 1.272 182.402 2.64C183.602 4.008 184.202 6.156 184.202 9.084V10.164H180.386V9.264C180.386 7.872 180.302 6.804 180.134 6.06C179.966 5.292 179.606 4.716 179.054 4.332C178.526 3.948 177.734 3.756 176.678 3.756C175.55 3.756 174.71 4.02 174.158 4.548C173.606 5.052 173.246 5.736 173.078 6.6C172.934 7.464 172.862 8.616 172.862 10.056V20.856C172.862 23.088 173.126 24.696 173.654 25.68C174.206 26.64 175.25 27.12 176.786 27.12C178.298 27.12 179.33 26.592 179.882 25.536C180.458 24.48 180.746 22.788 180.746 20.46V18.444H177.038V15.564H184.418V30H181.862L181.466 26.652C180.554 29.124 178.826 30.36 176.282 30.36ZM196.124 30.324C194.084 30.324 192.488 29.916 191.336 29.1C190.208 28.284 189.428 27.144 188.996 25.68C188.564 24.216 188.348 22.38 188.348 20.172V0.839998H192.236V20.352C192.236 22.56 192.488 24.24 192.992 25.392C193.52 26.544 194.564 27.12 196.124 27.12C197.684 27.12 198.716 26.544 199.22 25.392C199.748 24.24 200.012 22.56 200.012 20.352V0.839998H203.864V20.172C203.864 22.38 203.648 24.216 203.216 25.68C202.784 27.144 202.004 28.284 200.876 29.1C199.748 29.916 198.164 30.324 196.124 30.324ZM208.147 0.839998H214.015C216.967 0.839998 219.127 1.452 220.495 2.676C221.887 3.876 222.583 5.844 222.583 8.58C222.583 12.324 221.383 14.592 218.983 15.384L223.123 30H219.199L215.383 16.32H212.215V30H208.147V0.839998ZM213.763 13.404C215.515 13.404 216.763 13.056 217.507 12.36C218.275 11.664 218.659 10.404 218.659 8.58C218.659 7.38 218.527 6.444 218.263 5.772C217.999 5.076 217.531 4.572 216.859 4.26C216.187 3.924 215.239 3.756 214.015 3.756H212.215V13.404H213.763ZM231.423 0.839998H235.347L241.575 30H237.723L236.391 22.656H230.451L229.047 30H225.231L231.423 0.839998ZM235.851 19.74L233.403 6.6L230.991 19.74H235.851ZM244.534 0.839998H247.306L255.586 20.208V0.839998H258.97V30H256.378L247.99 10.092V30H244.534V0.839998ZM270.861 30.324C267.981 30.324 265.953 29.472 264.777 27.768C263.601 26.04 263.013 23.664 263.013 20.64V10.344C263.013 7.152 263.589 4.728 264.741 3.072C265.893 1.416 267.933 0.587999 270.861 0.587999C273.477 0.587999 275.349 1.296 276.477 2.712C277.629 4.128 278.205 6.216 278.205 8.976V11.28H274.353V9.228C274.353 7.884 274.293 6.852 274.173 6.132C274.053 5.412 273.741 4.836 273.237 4.404C272.757 3.972 271.977 3.756 270.897 3.756C269.793 3.756 268.965 3.996 268.413 4.476C267.885 4.932 267.537 5.58 267.369 6.42C267.201 7.236 267.117 8.34 267.117 9.732V21.288C267.117 22.776 267.237 23.94 267.477 24.78C267.717 25.62 268.101 26.22 268.629 26.58C269.181 26.94 269.937 27.12 270.897 27.12C271.929 27.12 272.697 26.892 273.201 26.436C273.705 25.98 274.017 25.356 274.137 24.564C274.281 23.772 274.353 22.692 274.353 21.324V19.164H278.205V21.324C278.205 24.228 277.653 26.46 276.549 28.02C275.469 29.556 273.573 30.324 270.861 30.324ZM271.041 38.46C270.345 38.46 269.541 38.34 268.629 38.1V36.156C269.205 36.324 269.817 36.408 270.465 36.408C271.113 36.408 271.641 36.288 272.049 36.048C272.457 35.832 272.661 35.484 272.661 35.004C272.661 34.404 272.409 33.948 271.905 33.636C271.425 33.348 270.657 33.132 269.601 32.988V30H271.545V32.016C272.745 32.016 273.705 32.292 274.425 32.844C275.169 33.42 275.541 34.176 275.541 35.112C275.541 36.216 275.121 37.044 274.281 37.596C273.465 38.172 272.385 38.46 271.041 38.46ZM286.689 0.839998H290.613L296.841 30H292.989L291.657 22.656H285.717L284.312 30H280.497L286.689 0.839998ZM291.117 19.74L288.669 6.6L286.257 19.74H291.117Z"
                            fill="black" />
                    </svg>
                </div>

                <!-- <div class="vetorpredio">
            <svg viewBox="0 0 52 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill="none" d="M46.434 0H19.4021C16.3931 0 13.9583 2.2475 13.9583 5.025V19.1175L1.22375 30.7225C0.842186 31.0708 0.581336 31.516 0.474304 32.0014C0.367272 32.4868 0.418883 32.9907 0.622587 33.449C0.826291 33.9073 1.17291 34.2994 1.61844 34.5755C2.06397 34.8517 2.58834 34.9994 3.125 35V47.5C3.125 48.163 3.41034 48.7989 3.91825 49.2678C4.42616 49.7366 5.11504 50 5.83333 50H49.1667C49.885 50 50.5738 49.7366 51.0817 49.2678C51.5897 48.7989 51.875 48.163 51.875 47.5V5.0225C51.875 2.2475 49.4429 0 46.434 0ZM24.5804 32.7775V45H8.54167V31.08L16.6315 23.7075L24.5804 31.215V32.7775V32.7775ZM30.2083 17.5H24.7917V12.5H30.2083V17.5ZM41.0417 37.5H35.625V32.5H41.0417V37.5ZM41.0417 27.5H35.625V22.5H41.0417V27.5ZM41.0417 17.5H35.625V12.5H41.0417V17.5Z" fill="black"/>
            </svg>
            </div> -->
                <div class="information">
                    <div class="title-information">
                        <p>INFORMAÇÕES DE EXTREMA IMPORTÂNCIA PARA O SEU DIA DE TRABALHO!</p>
                    </div>

                    <div class="title_caixademensagens">
                        <p>Caixa de Mensagens</p>
                    </div>
                    <div class="caixede_mensagens" id="rolagemmsg">
                        <table>
                            <?php
                            while($registrosmsg = mysqli_fetch_array($resultadodobancomsg)){
                                $tipodamsg = $registrosmsg['tipodamesg'];
                                $data = $registrosmsg['datadamensg'];
                                $hora = $registrosmsg['horadamensg'];
                                $msg = $registrosmsg['suamesng'];
                            ?>



                            <tr>
                                <td>
                                    <div class="tipando"><?php echo $tipodamsg?><p>Anexado</p>
                                </td>
                    </div>

                    </tr>

                    <tr>
                        <td>
                            <div class="horariodamsgregistra"><?php echo $data?> ¨ <?php echo $hora?> </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="amsgdetexto"><?php echo $msg?> </div>
                        </td>
                    </tr>

                    <?php }; ?>

                    </table>
                </div>
                <div class="title_vista_pendente">
                    <p>ATENÇÃO !</p>
                </div>
                <div class="caixa-informations">
                    <a href="Paginas/finalizarsaida.php"><?php echo $contandoregistro?> Visitas pendente</a>
                    <a href="Paginas/pageentregs.php?p=tableentregas"><?php echo $contandoregistroentrega?> Entregas
                        pendente</a>
                    <a href="Paginas/menuserv.php?p=pageprofile"><?php echo $resoltadodacontagemdefuncionarios?>
                        Funcionários com Permissão </a>
                    <a href="Paginas/Rolatoriooperacionalmoduportaria.php">Relatório Operacional</a>
                    <a href="#"><?php echo $resultadodacoletautilizar?> Festas autorizadas</a>
                    <a class="corestavagas" href="Paginas/pageveicles.php">Buscar veículo</a>
                </div>
            </div>

            <button class="btn-novo-infor" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <p>Mensagem</p>
                <ion-icon name="mail-open-outline" class="msg-icon-nova-porttari">
                    </ion-iconLaunch>
            </button>
            <!-- ACHAR -->

        </div>
        <!--BOTÃO DE-->
        <?php
            include_once("./conexao.php");

            $filtro_sql = "";

            if ( $_POST != NULL) {
                $filtro = $_POST["filtra-busca"];

                    $filtro_sql = "WHERE apt ='$filtro'
                        OR codigo LIKE '%$filtro%'
                        OR nomeMor LIKE '%$filtro%'
                        OR bloco LIKE '%$filtro%'";

            }
        
            $busca2 = filter_input(INPUT_GET,"filtra-busca");

            $sql = "SELECT * FROM cmoradores $filtro_sql";
            $consulta = mysqli_query($conexao,$sql);
            
            ?>

        <div class="input-group mb-3">
            <form method="post" class="formulari-busca-home">
                <input type="text" name="filtra-busca" class="form-control" placeholder="Buscar morador"
                    aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Limpar Campo</button>
            </form>
        </div>
        <!--FINALIZAÇÃO DO CAMPO DE BUSCA-->

        <!--INICIO DA TABELA DE INFORMAÇÕES DOS MORADORES-->
        <div class="titlo-morator-colaborator">
            INFORMAÇÕES DE MORADORES E ENQUILINOS
        </div>
        <div class="title-informaitoion-colaborator">
            SENHORES nunca forneça informações de qualquer morador que esteja cadastrado a este condomínio, dependete de
            quem seja a pessoa que requer quais quer tipo de informações, seja eles(a)parentesco ou amigo!
        </div>
        <div class="centar-table" id="row">
            <table class="table table-dark table-striped">
                <tr>
                    <th>Restrição</th>
                    <th>Apartamento</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Celular</th>
                    <th>Foto</th>
                    <th>Entrega</th>
                    <th>Visita</th>
                </tr>
                <tbody>
                    <?php
                        while($receberRegistros = mysqli_fetch_array($consulta)){
                        $id = $receberRegistros[2];
                        $ap = $receberRegistros[1];
                        $morador = $receberRegistros[4];
                        $Cel1 = $receberRegistros[9];
                        $fot = $receberRegistros['fotografia'];
                        $telre = $receberRegistros[8]; 
                        $imgrestri = $receberRegistros['imgcam']        
                        ?>

                    <tr>
                        <td><a
                                href="Paginas/informarestriaportaria.php?inviarid=<?php echo $receberRegistros['nomeMor'];?>"><img
                                    src="./Galeria/imagensdiversas/<?php echo $imgrestri;?>" alt=""></a></td>
                        <td>
                            <div class="btn-mais"><?php echo $ap;?></div>
                        </td>
                        <td>
                            <div class="tb-nomemor-home"></i><?php echo $morador;?></div>
                        </td>
                        <td>
                            <div class="tb-fone-home"></i><?php echo $telre;?></div>
                        </td>
                        <td>
                            <div class="tb-fone-home"><?php echo $Cel1;?></div>
                        </td>
                        <td><a class="arredondandofotoindextaga"
                                href="Paginas/informactiondemor.php?inviarid=<?php echo $receberRegistros['codigo'];?>">
                                <div id="mostra_fot" class="arredondandofotoindex"><img id="img_mor"
                                        src="./Galeria/Fotomoradores/<?php echo $fot;?>" width="90" height="90"
                                        alt="SEM FOTO"></div>
                            </a></td>
                        <td><a
                                href="Paginas/pageentregs.php?recebedordocodigo=<?php echo $receberRegistros['codigo'];?>">
                                <div class="btn-mais">
                                    <ion-icon name="mail-open-outline" class="icon-btn-mais"></ion-icon>
                                </div>
                        </td></a>
                        <td><a href="Paginas/liberarvisitas.php?resultdados=<?php echo $receberRegistros['codigo'];?>">
                                <div class="btn-mais">
                                    <ion-icon name="log-in-outline" class="icon-btn-mais"></ion-icon>
                                </div>
                        </td></a>
                    </tr>
                    <?php }; ?>
                </tbody>
            </table>
        </div>
        <!--FINALIZAÇÃO DA TABALE DE INFORMAÇÕES DOS MORADORES-->
        </div>
        <div class="pane">
            <ion-icon name="alert-outline"></ion-icon>
        </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Mensagens para a Portaria</h5>
                    </div>
                    <form method="POST" action="./Paginas/cadnovamsgportaria.php">
                        <div class="modal-body">
                            <select name="otipodemsg" class="selectmodalindex" required>
                                <option value=""></option>
                                <option value="EMERGÊNCIA">EMERGÊNCIA</option>
                                <option value="IMPORTANTE">IMPORTANTE</option>
                                <option value="LEMBRETE">LEMBRETE</option>
                                <option value="COMUNICADO">COMUNICADO</option>
                            </select>
                            <div class="content-input _page_entrags">
                                <input type="text" name="datadamsg" id="ovalornumcasa" class="input_dados_modal"
                                    value="<?php echo date('d/m/Y');?>" placeholder="DATA" required>
                            </div>
                            <div class="content-input _page_entrags">
                                <input type="text" name="horadamsg" id="ovalornumcasa" class="input_dados_modal"
                                    value="<?php echo date('H:i:s');?>" placeholder="HORAS" required>
                            </div>

                            <textarea name="otextodamsg" id="" class="textareaindex"></textarea>
                            <input type="text" name="localportaria" value="Portaria" hidden>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </main>



</body>

</html>