<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ações</title>
    <style>
        body {
            margin: 0;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .pai {
            width: 100vw;
            height: 100vh;
            background: black;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .filho {
            display: flex;
            flex-direction: column;
            width: 400px;
            height: 200px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 3px 2px 6px 1px #424242;
            text-align: center;
            justify-content: center;
            align-items: center;
            color: black;
            margin: 10px;
        }

        .filho2 {
            display: flex;
            flex-direction: column;
            width: 400px;
            height: 390px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 3px 2px 6px 1px #424242;
            text-align: center;
            justify-content: center;
            align-items: center;
            color: black;
            margin: 10px;
        }

        h1 {
            margin-bottom: 5%;
            position: relative;
            font-size: 25px;
            color: black;
            text-align: center;
        }

        .caixa {
            height: 30px;
            width: 300px;
            text-align: center;
            display: block;
            background: #575757;
            justify-content: center;
            align-items: center;
            border-radius: 20px;
            border: 2px solid black;
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
            margin-top: 10px;
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
</head>
<body>
<a href="index.html"><button type="button" class="voltar">←</button></a>
<div class="pai">
        <div class="filho">
            <h1>Pesquisa dos Registros</h1>
            <form method="post" action="">
                <input type="text" class="caixa" name="txtcodigo" placeholder="Digite o código do registro">
                <input type="submit" class="botao" name="btnpesquisar" value="Pesquisar">
            </form>
    </div>

    <div class="container result-container">
        <?php
            if(isset($_POST['btnpesquisar']) && !empty($_POST['txtcodigo'])) {
                include("conectar.php");
                
                $codigo = $_POST['txtcodigo'];
                $sql = "SELECT * FROM tbagenda WHERE codigo = '$codigo'";
                $resultado = mysqli_query($conexao, $sql);
                
                if(mysqli_num_rows($resultado) == 0) {
                    echo "<p>Registro não encontrado!</p>";
                } else {
                    while($reg = mysqli_fetch_array($resultado)) {
                        echo "<div class='filho2'>
                                <form method='post'>
                                    Código: <input type='text' class='caixa' name='codigo' value='$reg[codigo]' readonly><br>
                                    Nome: <input type='text' class='caixa' name='nome' value='$reg[nome]'><br>
                                    Telefone: <input type='text' class='caixa' name='telefone' value='$reg[telefone]'><br>
                                    Email: <input type='text' class='caixa' name='email' value='$reg[email]'><br>
                                    <input type='submit' class='botao' name='btneditar' value='Editar'>
                                    <input type='submit' class='botao' name='btnexcluir' value='Excluir'>
                                </form>
                            </div>";
                    }
                }
                mysqli_close($conexao);
            }

            if(isset($_POST['btneditar'])) {
                include("conectar.php");
                $id=$_POST['codigo'];
                $nome=$_POST['nome'];
                $telefone=$_POST['telefone'];
                $email=$_POST['email'];
                $sql="update tbagenda set nome='$nome', telefone='$telefone', email='$email' where codigo='$id'";
                $resultado = mysqli_query($conexao,$sql);
                echo "<script>alert('Editado com sucesso!');</script>";
                mysqli_close($conexao);
            }

            if(isset($_POST['btnexcluir'])) {
                include("conectar.php");
                $id=$_POST['codigo'];
                $sql="delete from tbagenda where '$id' = codigo";
                $resultado = mysqli_query($conexao,$sql);
                echo "<script>alert('Excluído com sucesso!');</script>";
                mysqli_close($conexao);
            }
        ?>
    </div>
</div>
</body>
</html>
