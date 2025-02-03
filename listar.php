<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
</head>
<body>

    <h1>
        <a href="index.html"><button type="button" class="voltar">←</button></a>
        Listagem dos Registros
    </h1><hr>

    <style>

        body {
            margin: 0px;
            background-color: black;
        }

        h1 {
            color: white;
            text-align: center;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        hr {
            width: 80%;
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
            margin-left: 2%;
            position: absolute;
        }

        .voltar:hover {
            background-color: #555555;
            color: white;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(500px, 1fr));
            gap: 24px;
            padding: 24px;
            justify-content: center;
        }

        .quadrado {
            width: 100%;
            height: 240px;
            border-radius: 20px;
            -webkit-box-shadow: 10px 10px 5px -6px rgba(82,82,82,1);
            -moz-box-shadow: 10px 10px 5px -6px rgba(82,82,82,1);
            box-shadow: 10px 10px 5px -6px rgba(82,82,82,1);
        }

        .dados {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white;
            border-radius: 20px;
        }

        .info {
            max-width: 90%;
            text-align: center;
            font-size: 20px;
            line-height: 2;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            word-wrap: break-word;
        }


    </style>
<div class="container">
    <?php
        include('conectar.php');
        $sql="select * from tbagenda";
        $resultado=mysqli_query($conexao,$sql);
        while($reg=mysqli_fetch_array($resultado)) {
            echo"<div class='quadrado'>
                    <div class='dados'>
                        <p class='info' name='txtcodigo' rows='4'>
                            Código: $reg[codigo]
                            <br>Nome: $reg[nome]
                            <br>Telefone: $reg[telefone]
                            <br>Email: $reg[email]
                        </p>
                    </div>
            </div>";
        }
    ?>
</div>

</body>
</html>