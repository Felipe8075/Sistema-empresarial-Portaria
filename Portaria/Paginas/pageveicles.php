
<!-- CONECXÃO COM O BANCO DE DADO MSQL-->
<?php
include_once("../conexao.php");
$consultveicle = "SELECT * FROM veiculos";
$resulttablevei = mysqli_query($conexao,$consultveicle);

?>
<!--TÉRMINNO-->



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
    <title>Pagina 1</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@200&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Oxygen:wght@300&display=swap');
    </style>
</head>
<body>
<main class="main_principal_home_menu_principal">
    
        <div class="tatle_tela_veicle">
            Relação de Veículos de Moradores 
        </div>
        
        
        <?php
            $filtrandoo = isset($_POST['filtra-busca'])?$_POST['filtra-busca']:"";
            
            $cunsultatablepet = "SELECT * FROM veiculos WHERE residencia LIKE '$filtrandoo'
             OR nomeveiculo LIKE '$filtrandoo'
             OR marcaveiculo LIKE '$filtrandoo'
             OR cordoveiculo LIKE '$filtrandoo'
             OR pladoveiculo LIKE '$filtrandoo'";
            $resulttablevei = mysqli_query($conexao,$cunsultatablepet);

        ?>

            <div class="package_filter_veicle">
                <form method="POST">
                    <input class="inputdoveicle" type="text" name="filtra-busca" placeholder="Buscar veículos desejados">
                    <!-- <button type="submit" onclick="submt" class="btn btn-primary">Confirmar busca</button> -->
                </form>
            </div>
                    <table class="table table-hover">
                        <tr>
                            <th><span class="tdtipo">NOME DO VEÍCULO</span></th>
                            <th><span class="tdraca">MARCA DO VEÍCULO</span></th>
                            <th><span class="rdnome">COR DO VEÍCULO</span></th>
                            <th><span class="rdnome">PLACA DO VEÍCULO</span></th>
                            <th><span class="rdnome">ANO DO VEÍCULO</span></th>
                            <th><span class="rdnome">FOTO DO VEÍCULO</span></th>
                        </th>
                                        
                                    
                        <?php
                        while($registrosveicle= mysqli_fetch_array($resulttablevei)){
                        $nomedovaicle = $registrosveicle['nomeveiculo'];
                        $marcaveicle = $registrosveicle['marcaveiculo'];
                        $corveicle = $registrosveicle['cordoveiculo'];
                        $placaveicle = $registrosveicle['pladoveiculo'];
                        $anoveicle = $registrosveicle['anodoveiculo'];
                        $fotografia = $registrosveicle['fotodoveiculo'];
                        ?>
                        

                            <tr>
                                <td><div class="tdveicle"><?php echo $nomedovaicle;?></div></td>
                                <td><div class="tdveicle"><?php echo $marcaveicle;?></div></td>
                                <td><div class="tdveicle"><?php echo $corveicle;?></div></td>
                                <td><div class="tdveicle"><?php echo $placaveicle;?></div></td>
                                <td><div class="tdveicle"><?php echo $anoveicle;?></div></td>
                                <td><img id="img_mor" src="../Galeria/Veiculos/<?php echo $fotografia;?>"width="100" height="100"></td>
                            </tr>
                        <?php }; ?>
                    </table>


                    


</main>


    
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap-tagsinput.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</body>
</html>