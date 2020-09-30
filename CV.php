<?php
$cv = array(
    'nom' => 'Julien Buabent',
    'date_naissance' => '1985-12-10',
    'adresse' => '1, rue des fleurs 31500 Toulouse',
    'tel' => '0612345678',
    'photo' => 'julien.jpg',
    'metier' => 'Développeur web',
    'diplomes' => array(
        'Baccalauréat - Lycée Pierre et Marie Curie' => 2004,
        'BTS - Greta Montpellier' => 2008,
        'Licence - Université de Toulouse Paul Sabatier' => 2010,
        'Master - Université de Toulouse Paul Sabatier' => 2013,
    ),
    'experiences' => array(
        array(
            'libelle' => "Job d'été (serveur)",
            'debut' => '2002-06-01',
            'fin' => '2002-09-01',
        ),
        array(
            'libelle' => "Stage service informatique chez EDF",
            'debut' => '2008-03-01',
            'fin' => '2008-10-01',
        ),
        array(
            'libelle' => "Développeur web chez Google",
            'debut' => '2013-10-01',
            'fin' => 'now',
        ),
    ),
    'competences' => array(
        'html' => 4,
        'css' => 3,
        'javascript' => 5,
        'php' => 3,
    ),
);
?>


<?php

//trouver l'age avec la date de naissance
$birthDate = new DateTime($cv['date_naissance']);
$dateNow = new DateTime('today');
$age = $dateNow->diff($birthDate)->y;

//Formatage numero de téléphone
$phonePreFormat = $cv['tel'];
$phoneFormate = sprintf("%s-%s-%s-%s-%s",
    substr($phonePreFormat, 0, 2),
    substr($phonePreFormat, 2, 2),
    substr($phonePreFormat, 4, 2),
    substr($phonePreFormat, 6, 2),
    substr($phonePreFormat, 8, 2));

//Changer le format des dates d'experiences

$date = '2012-11-20';
setlocale(LC_TIME, 'fra_fra');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>







<!-- CV -->

<h1> <?=$cv['nom']?> - <?=$cv['metier']?> </h1>
<img src ="img/CV.jpg" height="300" width="300">
<p> <?=$age?> ans</p>
<p> <?=$cv['adresse']?> </p>
<p>Téléphone : <?=$phoneFormate?> </p>

<h2>Diplômes</h2>

<ul>

<?php foreach ($cv['diplomes'] as $diplome => $obtention) {?>
    <li><?=$obtention?> : <?=$diplome?></li>
<?php }?>

</ul>







<h2>Expériences</h2>
<ul>
<?php foreach ($cv['experiences'] as $experience) {
    $dateDebut = strftime('%e %B %G', strtotime($experience['debut']));
    $dateFin = strftime('%e %B %G', strtotime($experience['fin']));
    $dateNow = strftime('%e %B %G');

    if ($dateFin == $dateNow) {
        $dateFin = "a <b>maintenant</b>";
    } else {
        $dateFin = "au" . $dateFin;
    }?>
    <li> du <?=$dateDebut?> <?=$dateFin?> : <?=$experience['libelle']?> </li>
<?php }?>

</ul>







<h2>Compétences</h2>

<?php
foreach ($cv['competences'] as $techno => $rating) {?>
 
        <p><?=$techno?></p>
        <div class="rating">   
<?php
    for ($i = 0; $i < 5; $i++) {
        if ($i < $rating) {
        echo '<span class="fa fa-star checked"></span>';
    } else {
        echo '<span class="fa fa-star"></span>';
    }
}?>
</div>

   <?php }?>


<style>

.checked {
  color: orange;
}

.rating {
    display: inline;
}

</style>
</body>
</html>