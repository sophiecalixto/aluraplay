<?php

require __DIR__ . '/../vendor/autoload.php';

use SophieCalixto\AluraPlay\model\Video;

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
$video = '';
if ($id) {
    $video = Video::get($id);
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<?php require_once 'inc/head.php' ?>

<body>

<!-- Cabecalho -->
<?php require_once 'inc/header.php' ?>

<main class="container">

    <form class="container__formulario" method="post">
        <?php if ($id != null): ?>
            <input type="hidden" name="id" value="<?= $id ?>">
        <?php endif; ?>
        <h2 class="formulario__titulo">Envie um vídeo!</h2>
        <div class="formulario__campo">
            <label class="campo__etiqueta" for="url">Link embed</label>
            <input name="url" class="campo__escrita" required value="<?= $id != null ? $video->url() : ''?>"
                   placeholder="Por exemplo: https://www.youtube.com/embed/FAY1K2aUg5g" id='url'/>
        </div>


        <div class="formulario__campo">
            <label class="campo__etiqueta" for="titulo">Titulo do vídeo</label>
            <input name="title" class="campo__escrita" required placeholder="Neste campo, dê o nome do vídeo"
                   value="<?= $id != null ? $video->title() : '' ?>"
                   id='titulo'/>
        </div>

        <input class="formulario__botao" type="submit" value="Enviar"/>
    </form>

</main>

</body>

</html>