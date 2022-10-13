<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/assets/css/notas.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular Média</title>


</head>

<body>

    <div class="container">
        <div class="home">
            <div class="text-title">
                <h1>Calcula Média</h1>
            </div>


            <form class="form" action="./form_notas.php" method="post">

                <label for="nota1">Primeira nota</label>
                <div class="input">
                    <input type="text" name="nota1" id="nota1" required>
                </div>
                <br>
                <label for="nota2">Segunda nota</label>
                <div class="input">
                    <input type="text" name="nota2" id="nota2" required>
                </div>
                <div class="input">
                    <br>
                    <input name="calcular média" type="submit" value="Calcular média">
                </div>


                <?php
                if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                    die();
                }


                $nota1 = $_POST['nota1'];
                $nota2 = $_POST['nota2'];


                $media = calculaMedia($nota1, $nota2);
                $situacao = situacao($media);

                function calculaMedia($_nota1, $_nota2)
                {
                    return ($_nota1 + $_nota2) / 2;
                }

                # Função que retorna a situação do aluno.
                function situacao($_media)
                {
                    $situacao = '';

                    if ($_media < 4.0) :
                        $situacao = 'Reprovado';
                    elseif ($_media >= 4.0 && $_media < 6.0) :
                        $situacao = 'Exame final';
                    else :
                        $situacao = 'Aprovado';
                    endif;
                    return $situacao;
                }
                ?>

                <h2>Situação Aluno</h2>

                <p>Sua primeira nota é: <?php echo $nota1 ?></p>
                <p>Sua segunda nota é: <?php echo $nota2 ?></p>
                <p>Sua média é: <?php echo $media ?></p>

                <p>SItuação: <?php echo $situacao ?></p>


            </form>
            <a href="../../index.html"><button id="link">Voltar ao menu</button></a>
        </div>
    </div>

</body>

</html>