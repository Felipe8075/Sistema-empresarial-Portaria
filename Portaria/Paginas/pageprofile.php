
<!-- CONECXÃO COM O BANCO DE DADO MSQL-->
<?php
include_once("../conexao.php");
$consultprofile = "SELECT * FROM funcionarioos";
$resulttableprofile = mysqli_query($conexao,$consultprofile);

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
            Relação de Funcionário dos Condomínos
        </div>
        
        
        <?php
            $filtrandoo = isset($_POST['filtra-busca'])?$_POST['filtra-busca']:"";
            
            $resulttableprofile = "SELECT * FROM funcionarioos WHERE numapartament LIKE '$filtrandoo'
            OR bloco LIKE '$filtrandoo'
            OR nomefunc LIKE '%$filtrandoo%'
            OR documentofunc LIKE '$filtrandoo'
            OR horario LIKE '%$filtrandoo%'";
            $resulttableprofile = mysqli_query($conexao,$resulttableprofile);

            ?>
            <!-- Modal -->
            <div class="package_filter_veicle">
                <form method="POST">
                    <input class="inputdoveicle" type="text" name="filtra-busca" placeholder="Buscar o Funcionário desejado">
                    <!-- <button type="submit" onclick="submt" class="btn btn-primary">Confirmar busca</button> -->
                </form>
            </div>
                <div id="row">
                    <table class="table_entregas">
                        <tr>
                            <th class="borderesquerda">Apartamento</th>
                            <th>Bloco</th>
                            <th>Nome</th>
                            <th>Rg</th>
                            <th>Telefone</th>
                            <th>Horário</th>
                            <th>Permitir</th>
                            <th>Dias</th>
                            <th>Foto</th>
                            <th class="borderdireita">Liberar</th>
                            
                        </th>
                                        
                                    
                        <?php
                        while($registroprofile= mysqli_fetch_array($resulttableprofile)){
                        $residenci = $registroprofile['numapartament'];
                        $bloco = $registroprofile['bloco'];
                        $nomeprofile = $registroprofile['nomefunc'];
                        $document = $registroprofile['documentofunc'];
                        $fone = $registroprofile['celularfunc'];
                        $horaentr = $registroprofile['horario'];
                        $permission = $registroprofile['permicao'];
                        $diastrab = $registroprofile['segunda'];
                        $fotografia = $registroprofile['fotofunc'];
                        ?>
                        

                            <tr>
                                <td><div class="tdprofile"><?php echo $residenci;?></div></td>
                                <td><div class="tdprofile"><?php echo $bloco;?></div></td>
                                <td><div class="tdprofile"><?php echo $nomeprofile;?></div></td>
                                <td><div class="tdprofile"><?php echo $document;?></div></td>
                                <td><div class="tdprofilefone"><?php echo $fone;?></div></td>
                                <td><div class="tdprofile"><?php echo $horaentr;?></div></td>
                                <td><div class="tdprofile"><?php echo $permission;?></div></td>
                                <td><div class="tdprofile"><?php echo $diastrab;?></div></td>
                                <td><img id="img_mor" src="../Galeria/funcionarios/<?php echo $fotografia;?>"width="100" height="100" alt="SEM FOTO"></td>
                                <td><button class="btn btn-primary btnentrada">Entrada</button></td>
                            </tr>
                        <?php }; ?>
                    </table>
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