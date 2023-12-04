<!DOCTYPE html>
<html lang="pt-br">

<?php require_once 'inc/head.php' ?>

<body>

    <!-- Cabecalho -->
    <?php require_once 'inc/header.php' ?>

    <main class="container">

        <form class="container__formulario" method="post">
            <h2 class="formulario__titulo">Efetue login</h2>
                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="usuario">Usuário</label>
                    <input name="email" class="campo__escrita" required
                        placeholder="Digite seu email" id='usuario' />
                </div>


                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="senha">Senha</label>
                    <input type="password" name="password" class="campo__escrita" required placeholder="Digite sua senha"
                        id='senha' />
                </div>

                <input class="formulario__botao" type="submit" value="Entrar" />
        </form>

    </main>

</body>

</html>