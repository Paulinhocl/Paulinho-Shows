<?php require_once("ConnectDB.php"); 

    require("Connectdb.php");

    $sql2 = "SELECT * FROM `eventos` ";
    $result = mysqli_query($ConnectDB, $sql2);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paulinho Shows</title>
    <link rel="stylesheet" href="style.css">
    <script src="authController.js"></script>
    <script src="script.js"></script>
    <script src="scriptg.js"></script>
    <script src="scriptp.js"></script>
    <script src="db.js"></script>
    <script src="servid.js"></script>
    <script src="controle.js"></script>
    <script src="app.js"></script>
    <script src="rotaEventos.js"></script>
</head>
<body>
    <header>
        <h1>Eventos Disponíveis</h1>
    </header>
    <main>
        <section class="event-list">
            <?php while($repete = mysqli_fetch_array($result)) { ?>
            <article class="event-item">
                <h2>Show Sertanejo</h2>
                <p>Data: 21 de Agosto, 2024</p>
                <p>Local: Ginásio Municipal Seu Pedro</p>
                <p>Preço: R$ 80,00</p>
                <a href="detalhes.html" class="details-button">Ver Detalhes</a> 
            </article>   
            <?php } ?> 

        </section>
        <section class="event-list">
            <article class="event-item">
                <h2>Show Gospel</h2>
                <p>Data: 25 de Settembro, 2024</p>
                <p>Local: Ginásio Municipal São João</p>
                <p>Preço: R$ 20,00</p>
                <a href="detalhe_gospel.html" class="details-button">Ver Detalhes</a>
            </article>
        </section>
        <section class="event-list">
            <article class="event-item">
                <h2>Show Pagode</h2>
                <p>Data: 12 de Outubro, 2024</p>
                <p>Local: Casa de Shows Paulão</p>
                <p>Preço: R$ 55,00</p>
                <a href="pagode.html" class="details-button">Ver Detalhes</a>
            </article>
        </section>
    </main>
    
</body>
</html>
