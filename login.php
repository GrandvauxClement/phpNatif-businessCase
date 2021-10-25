<?php session_start()?>
<!DOCTYPE html>
<html lang="fr">
<?php
include 'parts/headStyleMeta.php';
?>
<?php
include 'parts/function.php';
?>
<body id="page-top">
<!-- Navigation-->

<!-- Masthead-->
<section id="about">
    <div class="container px-4">
        <div class="row gx-4 justify-content-center">
            <div class="col-lg-8">
                <div class="row">
                    <h1>Connecte -toi !</h1>

                    <?php

                    // De base on a pas d'erreurs

                    $errors = null;

                    // On vérifie que le champs nom n'est pas vide
                    if(empty($_POST['username'])){
                        // Si il est vide, on dit qu'il y a une erreur
                        $errors['username']['error'] = true;
                        // On indique la cause de l'erreur
                        $errors['username']['cause'] = 'Veuillez saisir votre nom utilisateur!';
                    } else {
                        // Sinon c'est cool il n'y a pas d'erreur
                        $errors['username']['error'] = false;
                        // J'ajoute la valeur qui fonctionne
                        $errors['username']['value'] = $_POST['username'];
                    }


                    // Idem pour le nom de la rue
                    if(empty($_POST['password'])){
                        $errors['password']['error'] = true;
                        $errors['password']['cause'] = 'Veuillez saisir votre mot de passe !';
                    } else {
                        $errors['password']['error'] = false;
                        $errors['password']['value'] = $_POST['password'];
                    }

                    if (!$errors['password']['error'] && !$errors['username']['error']){

                        $_SESSION['username'] = $errors['username']['value'];
                        header('Location: index.php');
                        exit();
                    }
                    ?>

                    <!-- On a ajouté l'attribut method="post" et action = j'ai réutilisé le meme nom de fichier -->

                    <form class="row g-3" method="post" action="login.php">


                        <!-- documentation validation des formulaires de bootstrap -->
                        <!-- https://getbootstrap.com/docs/5.0/forms/validation/ -->

                        <!-- Div d'un élément de mon formulaire ici ça concerne le nom du resto -->
                        <div class="col-md-12">
                            <!-- Label de mon formulaire -->
                            <label for="username" class="form-label">Username</label>
                            <!--Input -->
                            <input type="text" id="username" class="form-control <?php
                            // Si le champ nom a une erreur, alors j'ajoute la classe is-invalid à mon input

                            echo switchClassFormValid($errors['username']['error']);
                            ?>" name="username"
                                <?php
                                // Si il n'y a pas d'erreurs dans le champ, j'affiche l'ancienne valeur
                                // Cela permet à l'utilisateur de ne pas la resaisir.
                                echo displayValueIfIsValid($errors['username']);
                                ?>
                                   placeholder="Veuillez entrer votre nom d'utilisateur">

                            <!--Validation -->
                            <?php

                            // Si il y a une erreur, en dessous j'affiche une div de champs invalides
                            echo displayErrors($errors['username']);
                            ?>
                        </div>

                        <!-- Div d'un élément de mon formulaire ici ça concerne le nom de la rue du resto -->
                        <div class="col-md-12">
                            <!-- Label de mon formulaire -->
                            <label for="password" class="form-label">Nom rue</label>
                            <!--Input -->
                            <input type="password" id="password" class="form-control <?php
                            // Si le champ nom a une erreur, alors j'ajoute la classe is-invalid à mon input
                            echo switchClassFormValid($errors['password']['error']);
                            ?>" name="password"
                                <?php
                                // Si il n'y a pas d'erreurs dans le champ, j'affiche l'ancienne valeur
                                // Cela permet à l'utilisateur de ne pas la resaisir.
                                echo displayValueIfIsValid($errors['password']);
                                ?>
                                   placeholder="Veuillez saisir votre mot de passe">

                            <!--Validation -->
                            <?php

                            // Si il y a une erreur, en dessous j'affiche une div de champs invalides
                            echo displayErrors($errors['password']);
                            ?>
                        </div>
                        <input type="submit" class="btn btn-primary mt-5"/>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer-->
<?php include 'parts/footer.php' ?>
<!--script loader -->
<?php include 'parts/loadScript.php'?>
</body>
</html>