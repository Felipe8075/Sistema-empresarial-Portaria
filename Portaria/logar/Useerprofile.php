<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
    <link rel="stylesheet" href="../CSS/pages.css">
    <link rel="stylesheet" href="../CSS/fonts.css">
    <script src="../js/scrips.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>

    <form action="executelogin.php" method="POST">
        <div id="mainpagelogin">
            <div class="headerprimarypagelogin">
                <div class="titlepagelogin">
                    Login
                </div>
                <div class="inputpagelogin">
                    <div class="form-group">
                        <label>E-mail</label>
                        <input name="emailloginuser" type="email" class="form-control" placeholder="Digite se E-mail" required>
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input name="senhaloginuser" type="password" class="form-control" placeholder="Digite sua senha"
                            required>
                    </div>
                    <div class="buttonpagelogin">
                        <button name="button_login">
                            Logar</button>
                    </div>
                    <?php
                    session_start();
                    if(isset($_SESSION['nao_autenticado'])):
                    ?>
                        <div class="senhauserinvalid">
                            E-mail ou Senha de usuário inválido!
                        </div>
                        <?php
                        endif;
                        unset($_SESSION['nao_autenticado']);
                    ?>
                </div>
            </div>
        </div>
        </div>
    </form>

</body>

</html>