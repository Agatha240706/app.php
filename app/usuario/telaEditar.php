<?php
    

    include("../config/cabecalho.php");
    include("../conexao.php");

    //verificar se o ID foi passado
    if(!isset($_GET['id'])){
        die("ID do usuário invalido");
    }

    //obtem o ID do usuário
    $id = $_GET['id'];

    $sql = "SELECT * FROM usuario WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(":id", $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    //verificar se retornou alguma coisa
    if(!$row){
        die("Usuário não encontrado");
    }

?>
<div class="container">
    <h1>Atualizar seus dados</h1>
    <form action="<?php echo "Atualizar.php?id={$id}"?>" method="post">
        <input type="hidden" name="id" value= "<?php echo $row['id'] ?>">

        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" placeholder="Informe seu nome" required value="<?php echo $row['nome']?>">
 
        <label for="login">login</label>
        <input type="text" id="login" name="login" placeholder="Informe seu login" required value="<?php echo $row['login']?>">
 
        <label for="email">E-mail</label>
        <input type="text" id="email" name="email" placeholder="Informe seu E-mail" required value="<?php echo $row['email']?>">
        
        <button type="submit">Atualizar</button>
    </form>

</div>

<?php
    include("../config/rodape.php");

?>