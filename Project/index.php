<?php include('layouts/header.php'); ?>

<div class="container mt-5">
    <div class="card shadow p-4">
        <h2 class="text-center mb-4">Qual é o seu Signo?</h2>
        <form id="signo-form" method="POST" action="show_zodiac_sign.php">
            <div class="mb-3">
                <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
                <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Descobrir</button>
        </form>
    </div>
</div>

</body>
</html>
