<?php
include 'parts/start_session.php';
?>
<?php
include 'parts/function.php';
?>
<!DOCTYPE html>
<html lang="fr">
<?php
include 'parts/headStyleMeta.php';
?>
<body id="page-top">
<!-- Navigation-->
<?php
include 'parts/menu.php';
?>
<!-- Masthead-->
<?php
include 'parts/header.php';
?>
<section id="about">
    <div class="container px-4">
        <div class="row gx-4 justify-content-center">
            <div class="col-lg-8">
                <div class="row">
                    <h1>Ajouter un restaurant préféré !</h1>

                    <?php

                    // De base on a pas d'erreurs

                    $errors = null;

                    // On vérifie que le champs nom n'est pas vide
                    if(empty($_POST['nom'])){
                        // Si il est vide, on dit qu'il y a une erreur
                        $errors['nom']['error'] = true;
                        // On indique la cause de l'erreur
                        $errors['nom']['cause'] = 'Veuillez saisir le nom du resto!';
                    } else {
                        // Sinon c'est cool il n'y a pas d'erreur
                        $errors['nom']['error'] = false;
                        // J'ajoute la valeur qui fonctionne
                        $errors['nom']['value'] = $_POST['nom'];
                    }


                    // Idem pour le nom de la rue
                    if(empty($_POST['nom_rue'])){
                        $errors['nom_rue']['error'] = true;
                        $errors['nom_rue']['cause'] = 'Veuillez saisir un nom de rue !';
                    } else {
                        $errors['nom_rue']['error'] = false;
                        $errors['nom_rue']['value'] = $_POST['nom_rue'];
                    }

                    // Ici j'ajoute un vérification qui véréfie que c'est bien un format numérique
                    // Pour vérifier que c'est bien un nombre qui a été saisi
                    if(empty($_POST['num_rue'])){
                        $errors['num_rue']['error'] = true;
                        $errors['num_rue']['cause'] = 'Veuillez saisir le numéro de rue !';
                        // is_numeric retourne true si une chaine de caractère représente un nombre
                        // https://www.php.net/manual/fr/function.is-numeric.php
                    } elseif(!is_numeric($_POST['num_rue'])) {
                        $errors['num_rue']['error'] = true;
                        $errors['num_rue']['cause'] = 'Veuillez saisir un nombre !';
                    } else {
                        $errors['num_rue']['error'] = false;
                        $errors['num_rue']['value'] = $_POST['num_rue'];
                    }

                    // En plus je vérifie que l'adresse email est bien valide
                    if(empty($_POST['email'])){
                        $errors['email']['error'] = true;
                        $errors['email']['cause'] = 'Veuillez saisir un email !';
                        // la fonction filter_var permet de vérifier une chaine de caractère.
                        // Dans notre cas, on vérifie que l'email est bien valide.
                    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                        $errors['email']['error'] = true;
                        $errors['email']['cause'] = 'Votre email n\'est pas valide !';
                    } else {
                        $errors['email']['error'] = false;
                        $errors['email']['value'] = $_POST['email'];
                    }
                    ?>

                    <!-- On a ajouté l'attribut method="post" et action = j'ai réutilisé le meme nom de fichier -->

                    <form class="row g-3" method="post" action="restaurant-add.php">


                        <!-- documentation validation des formulaires de bootstrap -->
                        <!-- https://getbootstrap.com/docs/5.0/forms/validation/ -->

                        <!-- Div d'un élément de mon formulaire ici ça concerne le nom du resto -->
                        <div class="col-md-12">
                            <!-- Label de mon formulaire -->
                            <label for="nom" class="form-label">Nom</label>
                            <!--Input -->
                            <input type="text" id="nom" class="form-control <?php
                            // Si le champ nom a une erreur, alors j'ajoute la classe is-invalid à mon input

                            echo switchClassFormValid($errors['nom']['error']);
                            ?>" name="nom"
                                <?php
                                // Si il n'y a pas d'erreurs dans le champ, j'affiche l'ancienne valeur
                                // Cela permet à l'utilisateur de ne pas la resaisir.
                               echo displayValueIfIsValid($errors['nom']);
                                ?>
                                   placeholder="Veuillez entrer un nom">

                            <!--Validation -->
                            <?php

                            // Si il y a une erreur, en dessous j'affiche une div de champs invalides
                            echo displayErrors($errors['nom']);
                            ?>
                        </div>

                        <!-- Div d'un élément de mon formulaire ici ça concerne le nom de la rue du resto -->
                        <div class="col-md-12">
                            <!-- Label de mon formulaire -->
                            <label for="nom_rue" class="form-label">Nom rue</label>
                            <!--Input -->
                            <input type="text" id="nom_rue" class="form-control <?php
                            // Si le champ nom a une erreur, alors j'ajoute la classe is-invalid à mon input
                            echo switchClassFormValid($errors['nom_rue']['error']);
                            ?>" name="nom_rue"
                                <?php
                                // Si il n'y a pas d'erreurs dans le champ, j'affiche l'ancienne valeur
                                // Cela permet à l'utilisateur de ne pas la resaisir.
                                echo displayValueIfIsValid($errors['nom_rue']);
                                ?>
                                   placeholder="Veuillez entrer un nom de rue">

                            <!--Validation -->
                            <?php

                            // Si il y a une erreur, en dessous j'affiche une div de champs invalides
                            echo displayErrors($errors['nom_rue']);
                            ?>
                        </div>



                        <!-- Div d'un élément de mon formulaire ici ça concerne le numéro de la rue -->
                        <div class="col-md-12">
                            <label for="numRue" class="form-label">Numero rue</label>
                            <input type="number" name="num_rue" id="numRue" class="form-control <?php
                            echo switchClassFormValid($errors['num_rue']['error']);
                            ?>" placeholder="Numéro de rue"  <?php
                            echo displayValueIfIsValid($errors['num_rue']);
                            ?>
                            />
                            <?php
                            echo displayErrors($errors['num_rue']);
                            ?>
                        </div>

                        <!-- Div d'un élément de mon formulaire ici ça concerne l'email du restaurant' -->
                        <div class="col-md-12">
                            <label for="email" class="form-label">Email du restaurant</label>
                            <input type="email" name="email" id="email" class="form-control <?php
                            echo switchClassFormValid($errors['email']['error']);
                            ?>"
                                <?php
                                echo displayValueIfIsValid($errors['email']);
                                ?>

                                   placeholder="Adresse email">

                            <?php
                            echo displayErrors($errors['email']);
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