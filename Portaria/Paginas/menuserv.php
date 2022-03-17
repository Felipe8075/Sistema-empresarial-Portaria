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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/firststyle.css">
    <script src="./functions.js"></script>
    <title>Menu de Serviços</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@200&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Oxygen:wght@300&display=swap');
    </style>
</head>
<body>


<main class="main_principal_home_menu_principal">
    <div class="warpper_home_menu_pricipal">
        <div class="header_home_menu_pricipal">

            <div class="principai_menu">
                <div class="pagina_menu_pagunação">
                    <a href="menuserv.php?p=pageveicles">Veículos</a>
                </div>
                <div class="pagina_menu_pagunação">
                    <a href="menuserv.php?p=pagepets">Pets</a>
                </div> 

                <div class="pagina_menu_pagunação">
                    <a href="menuserv.php?p=pageentregs">Correspondência</a>
                </div>


                <div class="pagina_menu_pagunação">
                    <a href="menuserv.php?p=liberarvisitas">Liberar</a>
                </div>

                <div class="pagina_menu_pagunação">
                    <a href="menuserv.php?p=pageprofile">Funcionários</a>
                </div>



                <div class="pagina_menu_pagunação">
                    <a href="../index.php" class="botão-iniciotlvisita">
                        <ion-icon name="home-outline" class="voltar_mult_page"></ion-icon>
                        <span>Sair</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <br>
    <br>
    <div class="center_pages">
        <?php
            
            $valor = @$_GET['p'];
            
            if ($valor == 'pageveicles'){ require_once 'pageveicles.php';}
            if ($valor == 'pagepets'){ require_once 'pagepets.php';}
            if ($valor == 'liberarvisitas'){ require_once 'liberarvisitas.php';}
            if ($valor == 'pageprofile'){ require_once 'pageprofile.php';}
            if ($valor == 'pagevisitas'){ require_once 'pagevisitas.php';}
            if ($valor == 'pageentregs'){ require_once 'pageentregs.php';}
        ?>
    </div>  
    
      
</main>


    
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap-tagsinput.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</body>
</html>