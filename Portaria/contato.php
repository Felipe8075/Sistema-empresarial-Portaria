<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar email</title>
</head>
<body>
    <form action="enviar_email.php" method="POST">
        <div class="conteudoenviodemensagens">
            <input type="text" name="nome" value="PORTARIA NASCER DO SOL">
            <input type="text" name="coment" value="O COMENTARIO A SER ADICIONADO">
            <input type="text" name="mensagem">
            <input type="text" name="emaildestino" placeholder="Digite o e-mail de destino">
            <button>Enviar mensagem</button>
        </div>
    </form>
</body>
</html>