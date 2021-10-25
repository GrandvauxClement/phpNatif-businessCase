<?php
include 'parts/start_session.php';
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
<!-- Mes Restaurants Favoris -->
<div class="container">
    <?php
    if (isConnected()){
        echo '<h1 class="text-primary"> Salut,'.$_SESSION['username'].' tu es sur ton compte</h1>';
        }
    else {
        echo '<h1 class="text-danger"> Tu n\'as rien à faire là hacker !! Page reserver</h1>';
    }
    ?>
</div>

<!-- Footer-->
<?php include 'parts/footer.php' ?>

<?php include 'parts/loadScript.php'?>
</body>
</html>