<?php
$dbUrl = 'database';
$port = '3306';
$dbName = 'php_natif_resto';
$user = 'root';
$password = 'root';

$connexion = new PDO('mysql:host='.$dbUrl.';port='.$port.';dbname='.$dbName, $user, $password);

if (!empty($_GET) && $_GET['type']) {
    $type = $_GET['type'];
    $query = $connexion->prepare('SELECT * FROM favorite_restaurant WHERE type = :type');
    $query->execute(['type'=>$type]);
} else if (!empty($_GET) && $_GET['ville']) {
    $ville = $_GET['ville'];
    $query = $connexion->prepare('SELECT * FROM favorite_restaurant WHERE ville = :ville');
    $query->execute(['ville'=>$ville]);
} else {
    $query = $connexion->prepare('SELECT * FROM favorite_restaurant');
    $query->execute();
}


$restaurants = $query->fetchAll();
?>
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
    <h1 class="text-center text-danger mt-4">Mes restaurants ! (filtrer en fonction des filtres et de la ville )</h1>
    <div class="row">
        <div class="col-2">
            <a class="btn btn-success me-3" href="index.php">Tous les resto</a>
        </div>
        <div class="col-2">
            <a class="btn btn-success me-3" href="index.php?type=Gastronomique">Les Restos Gastro</a>
        </div>
        <div class="col-2">
            <a class="btn btn-success me-3" href="index.php?type=Fast Food">Les Fast-food</a>
        </div>
        <div class="col-2">
            <a class="btn btn-success me-3" href="index.php?ville=Clermont-Fd">Les restos de clermont</a>
        </div>
    </div>
    <div class="row">
        <?php
        foreach ($restaurants as $resto) {

            $classeTypeResto = "";
            if ($resto['type'] === "fast-food"){
                $classeTypeResto = "bg-light";
            }
            $etoiles = "";
            $adresse = $resto['num_rue'].' '.$resto['nom_rue'].' '.$resto['code_postal'].' '.$resto['ville'];
            for ($i=1; $i<=5; $i++){
                if ($resto['star']>= $i){
                    $etoiles .= '<i class="fas fa-star text-warning"></i>';
                } else {
                    $etoiles .= '<i class="far fa-star text-warning"></i>';
                }

            }
            echo('<div class="card m-1 px-0 '.$classeTypeResto.'" style="width: 24rem;">
                                <img src="assets/'.$resto['image_link'].'" class="card-img-top img-fluid w-100" alt="..." style="height: 280px">
                                <div class="card-body">
                                    <h5 class="card-title">'.$resto['nom'].'</h5>
                                    <p class="card-text"><u>Adresse : </u> '.$adresse.'</p>
                                    <p class="card-text"> <u>Téléphone : </u> '.$resto['telephone'].'</p>
                                    <button class="btn btn-danger mb-2">'.$resto['type'].'</button>
                                    <p>'.$etoiles.'</p>
                                    <a href="#" class="btn btn-primary">RESERVEZ</a>
                                </div>
                              </div>');

        }
        ?>
    </div>
</div>

<!-- Footer-->
<?php include 'parts/footer.php' ?>

<?php include 'parts/loadScript.php'?>
</body>
</html>
