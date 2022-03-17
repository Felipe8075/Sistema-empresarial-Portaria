<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
		<link rel="stylesheet" href="../CSS/firststyle.css"> 
		<script src="../functions.js" defer></script>
		

		<title>Sala de Aula</title>

		<style>
			@import url('https://fonts.googleapis.com/css2?family=Just+Another+Hand&display=swap');
			@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Delius&display=swap');
		</style>

        <script>
            function escondertodososvideos(){   
               var divprimeiraaula = document.getElementById("primeiraaula");
               divprimeiraaula.style.display = "none" ; // função para esconder a div completa da aula 1
            };
            function mostraprimeiraaula(){
                var divprimeiraaula = document.getElementById("primeiraaula");
                divprimeiraaula.style.display = "block";
            };

            function mostrarsegundaaula(){
                var divsegundaaula = document.getElementById("segundaaula");
                divsegundaaula.style.display = "block";
            };


            function escondersegundaaula(){   
               var divprimeiraaula = document.getElementById("segundaaula");
               divprimeiraaula.style.display = "none" ; // função para esconder a div completa da aula 1
            };

            function mostrarterceiraaula(){
                var divterceiraaula = document.getElementById("terceiraaula");
                divterceiraaula.style.display = "block";
            };

            function esconderterceiraaula(){   
               var divprimeiraaula = document.getElementById("terceiraaula");
               divprimeiraaula.style.display = "none" ; // função para esconder a div completa da aula 1
            };


        </script>
    <title>Sala de Aula</title>
</head>
<body>
    <div class="header_saladeaula">
        <div class="gifsaladeaula">
            <img src="../imagens/Gif/video-animation-1.gif" alt="">
            <p>Sala de Aula</p>
        </div>
        <div class="linhaestila"></div>

        <div class="viewprimeiraaula">
            <div class="numerodovideo">
                1
            </div>
            <video class="video" controls autoplay loop src="../Galeria/Aulasvideos/metadeprimeiraaula.mp4"></video>
            <div class="conteudodescriciao">
                <div>
                    <p>Primeira interação com o Sistema</p>
                    <p class="novovideos">Aula</p>
                    <ion-icon name="play-circle-outline" id="icone_play" onClick="mostraprimeiraaula()"></ion-icon>
                    <ion-icon name="thumbs-up-outline" id="icone_estudos"></ion-icon>
                    <ion-icon name="videocam-outline" id="icone_estudosdois"></ion-icon>
                    <p class="decriciondosvideos">Nesta Aula vocês vão aprender a dar os primeiros passos no sistema
                        conhecendo a tela principal onde irã fazer buscar de moradores, acesso ao menu,
                        saber quantidade de visitas e correspondências entre outras funções.
                    </p>
                </div>    
            </div>
        </div>
        <div class="primeiraaula" id="primeiraaula">
            <dvi onClick="escondertodososvideos()" class="ficharvideo">
                <p>Fechar</p>
            </dvi>
            <iframe width="600" height="400" src="https://www.youtube.com/embed/yqT1Wk1TpTQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <div class="viewprimeiraaula">
            <div class="numerodovideo">
                2
            </div>
            <video class="video" controls autoplay loop src="../Galeria/Aulasvideos/metadeauladois.mp4"></video>
            <div class="conteudodescriciao">
                <div>
                    <p>Liberação de Visitas</p>
                    <p class="novovideos">Aula</p>
                    <ion-icon name="play-circle-outline" id="icone_play" onClick="mostrarsegundaaula()"></ion-icon>
                    <ion-icon name="thumbs-up-outline" id="icone_estudos"></ion-icon>
                    <ion-icon name="videocam-outline" id="icone_estudosdois"></ion-icon>
                    <p class="decriciondosvideos">Nesta Aula vocês vão aprender a Cadastrar visitantes no sistema
                        obtendo fotos salvando em lista irã fazer buscas de cadastro de visitantes,
                        saber a quantidade de visitas e prestadores que existem dentro do condomínio.
                    </p>
                </div>    
            </div>
        </div>

        <div class="primeiraaula" id="segundaaula">
            <dvi onClick="escondersegundaaula()" class="ficharvideo">
                <p>Fechar</p>
            </dvi>
            <iframe width="600" height="400" src="https://www.youtube.com/embed/uHn5S81t0eY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <div class="viewprimeiraaula">
            <div class="numerodovideo">
                3
            </div>
            <video class="video" controls autoplay loop src="../Galeria/Aulasvideos/pedacoterceitaaula.mp4"></video>
            <div class="conteudodescriciao">
                <div>
                    <p>Baixar Saída</p>
                    <p class="novovideos">Aula</p>
                    <ion-icon name="play-circle-outline" id="icone_play" onClick="mostrarterceiraaula()"></ion-icon>
                    <ion-icon name="thumbs-up-outline" id="icone_estudos"></ion-icon>
                    <ion-icon name="videocam-outline" id="icone_estudosdois"></ion-icon>
                    <p class="decriciondosvideos">Nesta Aula vocês vão aprender a dar a baixa de visitantes no sistema
                        obtendo relatório de entrada e saída assim poderão fazer buscas de visitantes,
                        saber quando as visitas e prestadores entraram e sairam do condomínio.
                    </p>
                </div>    
            </div>
        </div>

        <div class="primeiraaula" id="terceiraaula">
            <dvi onClick="esconderterceiraaula()" class="ficharvideo">
                <p>Fechar</p>
            </dvi>
            <iframe width="600" height="400" src="https://www.youtube.com/embed/PW4DdrIqCKc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        
    </div>

        <script src="../js/bootstrap.min.js"></script>
		<script src="../js/bootstrap-tagsinput.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</body>
</html>