<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
    <style>
        body{
            overflow: hidden;
        }
    </style>
</head>
<body>
<?php
// Verifique se os parâmetros GET existem
if(!isset($_GET['source']) || !isset($_GET['id'])) {
    die('<p>Os parâmetros "source" e "id" são obrigatórios.</p>');
}


// Prepara parâmetros
$source = strtolower($_GET['source']);
$id = $_GET['id'];

$controls = isset($_GET['controls']) ? $_GET['controls'] : 'default';
$autoplay = isset($_GET['autoplay']) ? (bool)$_GET['autoplay'] : false;
$muted = isset($_GET['muted']) ? (bool)$_GET['muted'] : false;
$speed = isset($_GET['speed']) ? $_GET['speed'] : 1;
$quality = isset($_GET['quality']) ? $_GET['quality'] : 1080;

// Código para incorporar o vídeo aqui
if($source == 'youtube') {
    echo '<div class="plyr__video-embed" id="player">
            <iframe src="https://www.youtube.com/embed/'.$id.'"></iframe>
            </div>';
} else if($source == 'vimeo') {
    echo '<div class="plyr__video-embed" id="player">
            <iframe src="https://player.vimeo.com/video/'.$id.'"></iframe>
            </div>';
} else {
    die('<p>Source inválido. Deve ser youtube ou vimeo.</p>');
}

$plyr = [
    'muted' => $muted,
    'autoplay' => $autoplay,
    'speed' => [ 'selected' => $speed, 'options' => [0.5, 0.75, 1, 1.25, 1.5, 1.75, 2, 4]],
    'quality' => $quality,
    'controls' => ['play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'captions', 'settings', 'pip', 'airplay', 'fullscreen']
];

if($controls == 'minimalist'){
    $plyr['controls'] = ['play-large', 'play'];
} else if($controls == 'full'){
    $plyr['controls'] = ['play-large', 'play', 'progress', 'current-time', 'duration', 'mute', 'volume', 'captions', 'settings', 'pip', 'airplay', 'fullscreen'];
}


?>
    <script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>
    <script>
        var plyr = <?= json_encode($plyr, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK); ?>;
        const player = new Plyr('#player', plyr);
    </script>
</body>
</html>
