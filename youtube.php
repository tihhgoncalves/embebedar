<!DOCTYPE html>
<html>
<head>
    <style>
      body{
        overflow: hidden;
      }
        /* Estilos para o contêiner responsivo */
        .videoWrapper {
            position: relative;
            padding-bottom: 56.25%; /* Aspect ratio de 16:9 (dividindo a altura pela largura) */
            height: 0;
            overflow: hidden;
        }
        .videoWrapper iframe {
          position: absolute;
          top: -50%;
          left: 0;
          width: 100%;
          height: 200%;
        }
        /* Estilos para as imagens */
        .videoWrapper img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: opacity 0.5s linear;
            visibility: visible;
        }
        .videoWrapper img.hide {
            opacity: 0;
            visibility: hidden;
            transition: visibility 0s 0.5s, opacity 0.5s linear;
        }
        /* Estilo para o botão de play */
        .videoWrapper .playButton {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            cursor: pointer;
            max-width: 100px;
            max-height: 100px;
        }

    </style>

    <script src="https://www.youtube.com/iframe_api"></script>
</head>
<body>

    <?php
    if(!isset($_GET['id']) || empty($_GET['id'])){

      die('<p>Faltando parâmetro ID</p>');
    }
    ?>
    <div class="videoWrapper">
        <div id="videoContainer"></div>
        <img id="coverImage" src="https://cdn.rocket.srv.br/videos/capa-padrao.png" />
        <img id="playImage" class="playButton" src="./botao-play.png" />
    </div>

    <script>
        // Variáveis globais para o objeto do player do YouTube e o ID do vídeo
        let player;
        const videoId = '<?= $_GET['id']; ?>'; // Substitua pelo ID do seu vídeo
        let iniciado = false;

        // Função para carregar o player do YouTube
        function onYouTubeIframeAPIReady() {
            player = new YT.Player('videoContainer', {
                videoId: videoId,
                playerVars: {
                    autoplay: 0 // Defina como 1 se quiser reprodução automática
                },
                events: {
                    'onStateChange': onPlayerStateChange
                }
            });

            // Adiciona um evento de mouseout ao iframe do YouTube
            const iframe = document.querySelector('.videoWrapper iframe');
            iframe.addEventListener('mouseout', function() {
                const coverImage = document.getElementById('coverImage');
                const playImage = document.getElementById('playImage');

                if(!iniciado){
                    coverImage.classList.remove('hide');
                    playImage.classList.remove('hide');
                }
            });
        }

        // Função para lidar com mudanças de estado do player
        function onPlayerStateChange(event) {
            const coverImage = document.getElementById('coverImage');
            const playImage = document.getElementById('playImage');

            iniciado = true;
            
            if (event.data == YT.PlayerState.PLAYING) {
                coverImage.classList.add('hide');
                playImage.classList.add('hide');
            } else if (event.data == YT.PlayerState.PAUSED) {
                
                coverImage.classList.remove('hide');
                playImage.classList.remove('hide');
            }
        }

        // Adiciona um evento de mouseover às imagens
        const coverImage = document.getElementById('coverImage');
        const playImage = document.getElementById('playImage');
        
        coverImage.addEventListener('click', function() {
            player.playVideo();
        });
        playImage.addEventListener('click', function() {
            player.playVideo();
        });

        /** O primeiro play nunca funciona via API, porque o iframe do Youtube está dentro de outro iframe, por isso esse esquema */
        coverImage.addEventListener('mouseover', function() {

          if(!iniciado){
            coverImage.classList.add('hide');
            playImage.classList.add('hide');
          }
          
        });

        playImage.addEventListener('mouseover', function() {

          if(!iniciado){
            coverImage.classList.add('hide');
            playImage.classList.add('hide');
            console.log('hide-4');
          }

        });

        //verifica se está dentro de um iframe
        if (window.self == window.top){
          iniciado = true;
        }

    </script>
</body>
</html>
