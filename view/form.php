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

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/estilos-form.css">
    <link rel="stylesheet" href="../css/flexbox.css">
    <title>AluraPlay</title>
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
</head>

<body>

<!-- Cabecalho -->
<header>

    <nav class="cabecalho">
        <a class="logo" href="../index.php"></a>

        <div class="cabecalho__icones">
            <a href="form.php" class="cabecalho__videos"></a>
            <a href="/login.html" class="cabecalho__sair">Sair</a>
        </div>
    </nav>

</header>

<main class="container">

    <form class="container__formulario"
          action="<?= $id == null ? '../controller/AddVideoController.php' : '../controller/UpdateVideoController.php' ?>"
          method="post">
        <?php if ($id != null): ?>
            <input type="hidden" name="id" value="<?= $id ?>">
        <?php endif; ?>
        <h2 class="formulario__titulo">Envie um vídeo!</h2>
        <div class="formulario__campo">
            <label class="campo__etiqueta" for="url">Link embed</label>
            <input name="url" class="campo__escrita" required value="<?= $video->url(); ?>"
                   placeholder="Por exemplo: https://www.youtube.com/embed/FAY1K2aUg5g" id='url'/>
        </div>


        <div class="formulario__campo">
            <label class="campo__etiqueta" for="titulo">Titulo do vídeo</label>
            <input name="title" class="campo__escrita" required placeholder="Neste campo, dê o nome do vídeo"
                   value="<?= $video->title(); ?>"
                   id='titulo'/>
        </div>

        <input class="formulario__botao" type="submit" value="Enviar"/>
    </form>

</main>

</body>

</html>