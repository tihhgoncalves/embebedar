<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="favico.png">
    <title>Gerador de URL de Vídeo</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Ícones Boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <!-- Extras do Bootstrap pelo @tihhgoncalves -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh//tihhgoncalves/bootstrap5-tihh@v1.0.1/dist/bootstrap5-tihh.css">
    <!-- ViewPort -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
   
    <style>

        body{
            padding: 50px;
        }

        iframe {
            aspect-ratio: 16 / 9;
            height: 100%;
            width: 100%;
            overflow: hidden;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Gerador de URL de Vídeo</h1>

        <div class="row">
            <div class="col-6">
                <form id="videoForm">
                    <div class="mb-3">
                        <label for="url" class="form-label">URL do Vídeo:</label>
                        <input type="text" class="form-control" id="url" name="url">
                    </div>
                    <div class="mb-3">
                        <label for="controls" class="form-label">Controles:</label>
                        <select class="form-select" id="controls" name="controls">
                            <option value="">Padrão</option>
                            <option value="minimalist">Minimalista</option>
                            <option value="full">Completo</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="autoplay" class="form-label">Autoplay:</label>
                        <select class="form-select" id="autoplay" name="autoplay">
                            <option value="0">Não</option>
                            <option value="1">Sim</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="muted" class="form-label">Mudo:</label>
                        <select class="form-select" id="muted" name="muted">
                            <option value="0">Não</option>
                            <option value="1">Sim</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="speed" class="form-label">Velocidade:</label>
                        <select class="form-select" id="speed" name="speed">
                            <option value="0.5">0.5</option>
                            <option value="1">1</option>
                            <option value="1.5">1.5</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="quality" class="form-label">Qualidade:</label>
                        <select class="form-select" id="quality" name="quality">
                            <option value="576">576p</option>
                            <option value="720">720p</option>
                            <option value="1080">1080p</option>
                            <option value="1440">1440p</option>
                            <option value="2160">2160p</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Gerar URL</button>
                </form>
            </div>

            <div class="col-6">

                <div id="resultado" style="display: none;">

                    <h2>URL Gerada:</h2>
                    <div class="row">
                        <div class="col-10">
                            <textarea class="form-control" id="generatedUrl" readonly style="height: 120px; margin-right: 3px;"></textarea>
                        </div>
                        <div class="col-2">
                            <button class="btn btn-outline-secondary" type="button" id="copyButton">Copiar</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="embed-responsive embed-responsive-16by9">
                            <h2>Pré-visualização:</h2>

                                <div class="responsive-iframe">
                                    <iframe class="embed-responsive-item" id="preview"></iframe>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>

    <script>
        document.getElementById('videoForm').addEventListener('submit', function(e) {
            e.preventDefault();
            var url = document.getElementById('url').value;
            var source = url.includes('youtube') ? 'youtube' : 'vimeo';
            var id = '';
            if (source === 'youtube') {
                var youtubeRegex = (url.includes('youtu.be')) ? /youtu\.be\/([^\?&"'>]+)/ : /watch\?v=([^\?&"'>]+)/;
                id = url.match(youtubeRegex)[1];
            } else {
                var vimeoRegex = /vimeo.*\/(\d+)/i;
                id = url.match(vimeoRegex)[1];
            }
            var controls = document.getElementById('controls').value;
            var autoplay = document.getElementById('autoplay').value;
            var muted = document.getElementById('muted').value;
            var speed = document.getElementById('speed').value;
            var quality = document.getElementById('quality').value;
            var generatedUrl = 'https://rocket.srv.br/apps/embebedar?source=' + source + '&id=' + id + '&controls=' + controls + '&autoplay=' + autoplay + '&muted=' + muted + '&speed=' + speed + '&quality=' + quality;
            document.getElementById('generatedUrl').value = generatedUrl;
            document.getElementById('preview').src = generatedUrl;
            document.getElementById('resultado').style.display = 'block';
        });
        document.getElementById('copyButton').addEventListener('click', function() {
            var copyText = document.getElementById('generatedUrl');
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */
            document.execCommand('copy');
            alert('URL copiada!');
        });

    </script>
</body>
</html>
