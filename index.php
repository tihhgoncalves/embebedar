<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
</head>
<body>
<?php
// Verifique se os parâmetros GET existem
if(isset($_GET['source']) && isset($_GET['id'])) {
    $source = strtolower($_GET['source']);
    $id = $_GET['id'];
    $controls = isset($_GET['controls']) ? $_GET['controls'] : 1;
    $autoplay = isset($_GET['autoplay']) ? $_GET['autoplay'] : 0;
    $muted = isset($_GET['muted']) ? $_GET['muted'] : 0;
    $speed = isset($_GET['speed']) ? $_GET['speed'] : 1;
    $quality = isset($_GET['quality']) ? $_GET['quality'] : 1080;

    // Verifique se o tipo é youtube ou vimeo
    if($source == 'youtube' || $source == 'vimeo') {
        // Código para incorporar o vídeo aqui
        if($source == 'youtube') {
            echo '<div class="plyr__video-embed" id="player">
                    <iframe src="https://www.youtube.com/embed/'.$id.'?origin=https://plyr.io&controls='.$controls.'&autoplay='.$autoplay.'&muted='.$muted.'&speed='.$speed.'&vq='.$quality.'&rel=0" allowfullscreen allowtransparency allow="autoplay"></iframe>
                  </div>';
        } else if($source == 'vimeo') {
            echo '<div class="plyr__video-embed" id="player">
                    <iframe src="https://player.vimeo.com/video/'.$id.'?loop=false&byline=false&portrait=false&title=false&speed=true&transparent=0&gesture=media&controls='.$controls.'&autoplay='.$autoplay.'&muted='.$muted.'&speed='.$speed.'&quality='.$quality.'" allowfullscreen allowtransparency allow="autoplay"></iframe>
                  </div>';
        }
    } else {
        echo "Source inválido. Deve ser youtube ou vimeo.";
    }
} else {
    echo "Parâmetros source e id são necessários.";
}
?>
    <script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>
    <script>
        const player = new Plyr('#player');
    </script>
</body>
</html>
