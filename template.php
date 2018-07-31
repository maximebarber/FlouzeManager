<!doctype html>
<html lang="fr">

    <head>
        <meta charset="UTF-8" />
        <!-- CSS maison -->
        <link rel="stylesheet" href="style.css" />
        <!-- CSS Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title><?= $titre ?></title>   <!-- Élément spécifique -->
    </head>

    <body>

        <div id="global">

            <!-- Navbar -->
            <header>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="index.php">Flouze Manager</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Opérations <!--<span class="sr-only">(current)</span>--></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="addOperation.php">Ajout opération</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <!-- Contenu -->
            <div id="contenu">
                <?= $contenu ?>   <!-- Élément spécifique -->
            </div>

            <!-- Footer -->
            <footer id="footer">
                Flouze Manager &#xA9; Site réalisé avec beaucoup d'argent par Maxime Barber
            </footer>

        </div> <!-- #global -->

        <!-- JS Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    </body>
</html>