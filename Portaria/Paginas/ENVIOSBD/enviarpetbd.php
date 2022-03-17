<?php include_once"../CONECT/conexao.php";?>


<?php

//Verificação no banco de dados 
$Verificar_Apartamento = filter_input(INPUT_POST,'Apartamento_pet',FILTER_DEFAULT); //apartamento do veículo post para verificação
$Verificar_tipo_animal = filter_input(INPUT_POST,'Tipo_animal',FILTER_DEFAULT); //Nome do veículo post para verificação
$Verificar_nome_animal = filter_input(INPUT_POST,'animal_nome',FILTER_DEFAULT); //Placa do veículo post para verificação

$select_banck_dice = "SELECT * FROM meuspet WHERE numapart = '$Verificar_Apartamento' AND tipopet = '$Verificar_tipo_animal' AND nomepet = '$Verificar_nome_animal'";
$result_search_dice = mysqli_query($conexao, $select_banck_dice);
$cont_row_dice = mysqli_num_rows($result_search_dice);


if($cont_row_dice == 0){


    if(isset($_FILES['fotoo'])){
        date_default_timezone_set("Brazil/East");

        $ext = strtolower(substr($_FILES['fotoo']['name'],-4));

        $new_name = date("Y.m.d.H.i.s") . $ext;
        $dir = '../../Galeria/Fotospet/';

        move_uploaded_file($_FILES['fotoo']['tmp_name'], $dir.$new_name);
    }

    $petapart = filter_input(INPUT_POST,'Apartamento_pet', FILTER_DEFAULT);
    $selectrcapet = filter_input(INPUT_POST,'Tipo_animal', FILTER_DEFAULT);
    $caoraca = filter_input(INPUT_POST,'anomal_cao',FILTER_DEFAULT);
    $gatoraca = filter_input(INPUT_POST,'animal_gato',FILTER_DEFAULT);
    $coelhoraca = filter_input(INPUT_POST,'animal_coelho',FILTER_DEFAULT);
    $hamster = filter_input(INPUT_POST,'animal_hamster',FILTER_DEFAULT);
    $nome_animal = filter_input(INPUT_POST,'animal_nome',FILTER_DEFAULT);
    $data_regristro = filter_input(INPUT_POST,'data_cadastro',FILTER_DEFAULT);
    $hora_registro = filter_input(INPUT_POST,'hora_cadastro',FILTER_DEFAULT);
    $fotopet = $new_name;

    $conexao= mysqli_connect($servidor,$usuario,$senha,$dbnome);

    mysqli_select_db($conexao, 'dbnome');

    $sql = "INSERT INTO meuspet (numapart,tipopet,racapet,raca_gato,raca_coelho,raca_hamster,nomepet, fotoanimal, Data_cadastral, Hora_cadastral) VALUES ('$petapart','$selectrcapet','$caoraca','$gatoraca','$coelhoraca','$hamster','$nome_animal','$fotopet','$data_regristro','$hora_registro')";

    if (mysqli_query($conexao, $sql)){
        echo "<script>alert('Cadastro efetuado com sucesso!'); window.location = '../Records/cadastros58245659582geristros4523112.php';</script>";

    }else{
        echo "Deu erro: " . $sql . "<br>" . mysqli_error ($conexao);
    }

    mysqli_close($conexao);
}else{
    echo "<script>alert('Esta animal já tem cadastro no sistema!'); window.location = '../Records/cadastros58245659582geristros4523112.php';</script>";

}
?>
<!--  -->
