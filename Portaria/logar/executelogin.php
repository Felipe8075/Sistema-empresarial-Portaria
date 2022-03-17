<?php

include_once("../conexaodbbase.php");

// and Senha = '{$senha}'


$usuario = mysqli_real_escape_string($conexao, $_POST['emailloginuser']);
$senha = mysqli_real_escape_string($conexao, $_POST['senhaloginuser']);

$query = "SELECT * FROM register_functions_uniforte WHERE email_funcionario = '$usuario' LIMIT 1";
$result = mysqli_query($conexao, $query);
$mostrardados = mysqli_num_rows($result);


$localTrabalho = $_SESSION['Condominio'] = "Manuel Bueno II";

session_start();
if($mostrardados > 0){
    $sql = "SELECT * FROM register_functions_uniforte WHERE email_funcionario = '$usuario' LIMIT 1";
    $receberRegistros = mysqli_query($conexao, $sql);

    if(mysqli_num_rows($receberRegistros) == 1){ // Se a busca do usuário for igual a 1 ou verdadeira (fassa)
        $result_busca = mysqli_fetch_assoc($receberRegistros);
            if(password_verify($senha, $result_busca['Senha'])){ //verificando a senha do usuário (criptografada)
                if($result_busca['acessosistamas'] != 'Liberado'){
                    echo "<script>alert('Permissão de acesso negada pela central !'); window.location = 'Useerprofile.php';</script>";
                }else{
                        if($result_busca['condominio'] != $localTrabalho){
                            echo "<script>alert('Permissão de acesso á este condomínio negada pela central, entre em contato com a central através do whatsapp '); window.location = 'Useerprofile.php';</script>";
                        }else{
                            $dados = mysqli_fetch_array($receberRegistros);
                            $_SESSION['Emaail'] = $usuario;
                            $_SESSION['nome'] = $result_busca['Nome_funcionario'];
                            $_SESSION['Codigo'] = $result_busca['ID'];
                            $_SESSION['Fotouser'] = $result_busca['Foto_funcionário'];
                            header('Location: ../Paginas/home0232022520portarias458pages5658.php');
                        }
                    
                };
            }else{
                $_SESSION['nao_autenticado'] = true;
                header('Location: Useerprofile.php');
                exit;
            };
    };
}else{
    $_SESSION['nao_autenticado'] = true;
    header('Location: Useerprofile.php');
    exit;
}
?>