<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir</title>
</head>
<body>
<a href="index.html"><button type="button" class="voltar">←</button></a>
    <div class="pai">
        <div class="filho">
        <h1>Inclusão dos Registros</h1>
        <center>
            <form id="form" name="dados" method="POST" action="">
                Nome <br>
                <input type="text" class="caixa" name="txtnome" size="40" maxlength="30" autofocus><br>
                Telefone <br>
                <input type="text" class="caixa" name="txttelefone" size="40" maxlength="30" ><br>
                Email <br>
                <input type="text" class="caixa" name="txtemail" size="40" maxlength="50" ><br><br>
                <input type="submit" class="botao" name="btngravar" value="Gravar">
                <input type="reset" class="botao" name="btnlimpar" value="Limpar"><br>
            </form>
        </center>
        </div>
    </div>

<style>
    body {
        margin: 0px;
    }

    h1 {
        margin-bottom: 15%;
        position: relative;
        font-size: 25px;
        color: black;
        text-align: center;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }

    .pai {
        width: 100vw;
        height: 100vh;
        background: black;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }

    .filho {
        display: flex;
        flex-direction: column;
        width: 400px;
        height: 500px;
        background: #fff;
        border-radius: 20px;
        box-shadow: 3px 2px 6px 1px #424242;
        justify-content: center;
        align-items: center;
    }

    #form {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }

    .caixa {
        height: 30px;
        display: block;
        background: #575757;
        justify-content: center;
        align-items: center;
        border-radius: 20px;
        border: 2px solid black;
        margin-top: 3px;
        color: white;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }

    .botao {
        width: 100px;
        height: 40px;
        background: #575757;
        justify-content: center;
        align-items: center;
        border-radius: 20px;
        margin: 30px;
        margin-top: 20px;
        border: 2px solid black;
        cursor: pointer;
        color: white;
    }

.voltar {
        display: flex;
        border: none;
        padding-bottom: 5px;
        border-radius: 360px;
        font-size: 40px;
        color: black;
        background-color: white;
        cursor: pointer;
        margin-top: 2%;
        margin-left: 2%;
        position: absolute;
    }

    .voltar:hover {
        background-color: #555555;
        color: white;
    }

</style>

<?php
    include('conectar.php');
    if(!empty($_POST['txtnome']))
    {
        $nome = $_POST['txtnome'];
        $telefone = $_POST['txttelefone'];
        $email = $_POST['txtemail'];
        $sql="insert into tbagenda(nome,telefone,email)
        values('$nome','$telefone','$email')";
        if (mysqli_query($conexao,$sql))
        {
            echo "<script>alert('Gravado com sucesso!');</script>";
        }
        mysqli_close($conexao);        
    }
?>

</body>
</html>