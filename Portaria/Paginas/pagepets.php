<!-- CONECXÃO COM O BANCO DE DADO MSQL-->
<?php
include_once("../conexao.php");
$cunsultatablepet = "SELECT * FROM meuspet";
$resulttablepet = mysqli_query($conexao,$cunsultatablepet);

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

        <div class="tatle_tela_veicle">
            Relação de Pets de Moradores
        </div>
    
                    <table class="table table-hover ">
                        <tr>

                            <th><span class="tdtipo">TIPO DE ANIMAL</span></th>
                            <th><span class="tdraca">RAÇA DO ANIMAL</span></th>
                            <th><span class="rdnome">NOME DO PET</span></th>
                                        
                                    
                        <?php
                        while($registrospet = mysqli_fetch_array($resulttablepet)){
                        $teste = $registrospet['numapart'];
                        $tipoani = $registrospet['tipopet'];
                        $racacao = $registrospet['racapet'];
                        $racagato = $registrospet['raca_gato'];
                        $racacorlho = $registrospet['raca_coelho'];
                        $rachamister = $registrospet['raca_hamster'];
                        $nomepet = $registrospet['nomepet'];
                        ?>

                            <tr>
                                <td><?php echo $tipoani;?></td>
                                <td><?php echo $racacao,$racagato,$racacorlho,$rachamister;?></td>
                                <td><?php echo $nomepet;?></td>
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