<?php
   include("../config/cabecalho.php");
?>

<div class="container">
    <h1>Registro de usuário</h1>
    <form action="" method="post">
        <label for="nome">Nome</label>
        <input type="text" name= "nome" id="nome" required placeholder="Informe seu nome">

        <label for="login">Login</label>
        <input type="text" name= "login" id="login" required placeholder="Informe seu login">

        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" required placeholder="Informe seu E-mail">

        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha" required placeholder="Informe sua senha">

        <button type="submit">Registrar</button>
    </form>

    <?php
        //conectar com o banco
        include("../conexao.php");

        //formulario foi enviado?
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nome = $_POST["nome"];
            $login = $_POST["login"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];

            $sql = "INSERT INTO usuario(nome, login, email, senha) VALUES(:nome, :login, :email, :senha )";
            $stnt = $conexao->prepare($sql);
            $stnt->execute([
                "nome" => $nome,
                "login" => $login,
                "email" => $email,
                "senha" => $senha

            ]);

            if($stnt-> rowCount() > 0){
                echo "<div class= 'sucess'>Usuário cadastrado com sucesso.</div>";
            }else{
                echo "<div class= 'error'>Erro ao cadastrar o usuário</div>";
            }

            //fechar conexao
            $conexao = null;
        }
    ?>

</div>

<?php
    include("../config/rodape.php");
?>