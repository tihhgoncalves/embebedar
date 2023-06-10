<p align="center">
 <img src="https://raw.githubusercontent.com/filipedeschamps/rss-feed-emitter/master/content/logo.gif">
</p>

# Embebedor - Incorporador de Vídeos

Este projeto permite que você incorpore vídeos do YouTube e Vimeo em seu site usando o Plyr, um simples e personalizável player de mídia HTML5. Você pode personalizar a experiência de visualização do vídeo usando vários parâmetros GET.

## Uso

Para incorporar um vídeo, você precisa fornecer os seguintes parâmetros GET:

- `source`: O tipo de vídeo. Deve ser 'youtube', 'vimeo', 'url' ou 'cdn-rocket'. **(obrigatório)**
- `id`: O ID do vídeo que você deseja incorporar. **(obrigatório)**
- `controls`: Para controlar o tipo de controles do Plyr. Valores possíveis são 'default', 'minimalist', 'full'. O padrão é 'default' (Padrão).
- `autoplay`: Para iniciar o vídeo automaticamente (1 para autoplay, 0 para não autoplay). O padrão é 0.
- `muted`: Para iniciar o vídeo sem som (1 para mudo, 0 para som). O padrão é 0.
- `speed`: Para controlar a velocidade de reprodução do vídeo (valores possíveis são 0.5, 1, 1.5, 2). O padrão é 1.
- `quality`: Para controlar a qualidade do vídeo (valores possíveis são 576, 720, 1080, 1440, 2160). O padrão é 1080.


Exemplo:

```
https://rocket.srv.br/apps/embebedar?source=youtube&id=dQw4w9WgXcQ
```

## Gerador Online

Existe um gerador online disponível em [http://rocket.srv.br/apps/embebedar/gerador/](http://rocket.srv.br/apps/embebedar/gerador/). Você pode usar esta ferramenta para gerar facilmente a URL de incorporação com os parâmetros desejados.


## Autor

| [<img src="https://avatars.githubusercontent.com/u/4672934?v=4" style="border:0;" width="155"><br><sub>@tihhgoncalves</sub><br><sub>https://t.me/tihhgoncalves</sub>](https://github.com/tihhgoncalves) |
| :---: |