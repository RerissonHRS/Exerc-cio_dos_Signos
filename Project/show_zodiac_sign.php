<?php include('layouts/header.php'); ?>

<div class="container mt-5">
    <div class="card shadow p-4">
        <?php
        $data_nascimento = $_POST['data_nascimento'] ?? null;
        $signos = simplexml_load_file("signos.xml");

        if ($data_nascimento) {
            $data = DateTime::createFromFormat('Y-m-d', $data_nascimento);
            $diaMes = $data->format('d/m');

            $signoEncontrado = null;

            foreach ($signos->signo as $signo) {
                $inicio = DateTime::createFromFormat('d/m/Y', $signo->dataInicio . '/' . $data->format('Y'));
                $fim = DateTime::createFromFormat('d/m/Y', $signo->dataFim . '/' . $data->format('Y'));

                if ($fim < $inicio) {
                    $fim->modify('+1 year');
                }

                if ($data >= $inicio && $data <= $fim) {
                    $signoEncontrado = $signo;
                    break;
                }
            }

            if ($signoEncontrado) {
                echo "<h2 class='text-center'>{$signoEncontrado->signoNome}</h2>";
                echo "<p class='mt-3'>{$signoEncontrado->descricao}</p>";
            } else {
                echo "<p class='text-danger'>Não foi possível identificar o signo.</p>";
            }
        } else {
            echo "<p class='text-warning'>Por favor, insira sua data de nascimento.</p>";
        }
        ?>
        <div class="mt-4 text-center">
            <a href="index.php" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</div>

</body>
</html>
