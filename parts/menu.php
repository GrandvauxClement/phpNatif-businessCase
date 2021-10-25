<?php
    echo ('
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="index.php"><img src="assets/images/navbar-logo.svg" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="restaurant-add.php">Ajout Resto Pref</a></li>
                        ');
                        if (isConnected()){
                            echo ('
                                <li class="nav-item"><a class="nav-link" href="monCompte.php">Mon Compte</a></li>
                                <li class="nav-item"><a class="nav-link" href="disconnect.php">Déconnexion</a></li>');
                        } else {
                            echo ('<li class="nav-item"><a class="nav-link" href="login.php">Connexion</a></li>');
                        }

                    echo ('<li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    ');