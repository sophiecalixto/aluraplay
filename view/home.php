<?php
    $videos = require(__DIR__ . '/../controller/GetAllVideosController.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<?php require_once 'inc/head.php' ?>

<body>

<?php require_once 'inc/header.php' ?>

<ul class="videos__container" alt="videos alura">

    <?php foreach ($videos as $video): ?>
        <li class="videos__item">
            <iframe width="100%" height="72%" src="<?= $video->url() ?>"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            <div class="descricao-video">
                <img src="./img/logo.png" alt="logo canal alura">
                <h3><?= $video->title() ?></h3>
                <div class="acoes-video">
                    <a href="/editar-video?id=<?= $video->id() ?>">Editar</a>
                    <a href="/remover-video?id=<?= $video->id() ?>">Excluir</a>
                </div>
            </div>
        </li>
    <?php endforeach; ?>
</ul>
</body>

</html>
