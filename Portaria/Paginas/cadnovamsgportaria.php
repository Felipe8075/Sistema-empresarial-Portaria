<?php include_once "../conexao.php";?>


<?php

    $tipo = $_POST["otipodemsg"];
    $data = $_POST["datadamsg"];
    $hora =$_POST["horadamsg"];
    $msg = $_POST["otextodamsg"];
    $deonde = $_POST["localportaria"];
    $conexao = mysqli_connect ($servidor,$usuario,$senha,$dbnome);

    mysqli_select_db($conexao, 'dbname');
    $sql = "INSERT INTO msgparaportaria (tipodamesg,datadamensg,horadamensg,suamesng,locaal) VALUES ('$tipo','$data','$hora','$msg','$deonde')";

    if (mysqli_query($conexao, $sql)) {
        echo "<script>alert('Mensagem Registrada para a portaria!');window.location = '../index.php';</script>";
        
    }else{
        echo "Deu erro: " . $sql . "<br>" . mysqli_error ($conexao);
    }
    mysqli_close($conexao);
?>

 