<?php

$data = file("liens.txt");
$lines = count($data);
$categories = array();

for ($i = 0; $i < $lines; $i++) {
    $values = explode(',', $data[$i]);
    $cat = $values[1];
    if (!in_array($cat, $categories)) {
        $categories[] = $cat;
    }
}

sort($categories);
sort($data);


function getMetaTags($value) {
    return get_meta_tags('http://' . $value);
}

function getNameFromTags($value) {
    if (strlen($value) > 15)
        $value = substr($value, 0, 15) . '...';
    return $value;
}

function getDescriptionFromTags($value) {
    $description = getMetaTags($value)['description'];
    if (isset($description)) {
        if (strlen($description) > 100) {
            $description = substr($description, 0, 100) . '...';
        }
    } else {
        $description = '<font color="red">Impossible de récupérer la description de ce site.</font>';
    }
    return $description;
}

function buildRandomCard($value) {
    return '<div class="col-sm-4 col-md-6">
        <div class="card wow fadeInUp">
            <div class="view overlay hm-white-slight">
                <img src="//www.apercite.fr/api/apercite/800x500/yes/' . $value . '" alt="Miniature du site ' . $value . '" class="img-fluid"/>
                <a href="http://' . $value . '"><div class="mask"></div></a>
            </div>
            <div class="card-block text-xs-center">
                <h4 class="card-title">' . getNameFromTags($value) . '</h4>
                <hr>
                <p class="card-text">' . getDescriptionFromTags($value) . '</p>
                <a href="http://' . $value . '" class="btn btn-success waves-effect">Visiter</a>
            </div>
        </div>
    </div>';
}

function buildCard($value) {
    return '<div class="col-md-3">
                <div class="card wow fadeInUp">
                    <div class="view overlay hm-white-slight">
                        <img src="//www.apercite.fr/api/apercite/800x500/yes/' . $value . '" alt="Miniature du site ' . $value . '" class="img-fluid"/>
                        <a href="http://' . $value . '"><div class="mask"></div></a>
                    </div>
                    <div class="card-block text-xs-center">
                        <h4 class="card-title">' . getNameFromTags($value) . '</h4>
                        <hr>
                        <p class="card-text">' . getDescriptionFromTags($value) . '</p>
                        <a href="http://' . $value . '" class="btn btn-success waves-effect">Visiter</a>
                    </div>
                </div>
            </div>';
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Linkroll</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mdb.min.css" rel="stylesheet">

    <!-- Template styles -->
    <style>
        html,
        body,
        .view {
            height: 100%;
        }

        .navbar {
            background-color: transparent;
        }

        @media only screen and (max-width: 768px) {
            .navbar {
                background-color: #1C2331;
            }
        }

        .view {
            background: url("http://mdbootstrap.com/images/regular/city/img%20(17).jpg")no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>

</head>

<body>


<!--Navbar-->
<nav class="navbar navbar-dark bg-primary">

    <!-- Collapse button-->
    <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx">
        <i class="fa fa-bars"></i>
    </button>

    <div class="container">

        <div class="collapse navbar-toggleable-xs" id="collapseEx">
            <a class="navbar-brand" href="http://mdbootstrap.com/material-design-for-bootstrap/" target="_blank">Linkroll</a>
            <ul class="nav navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>

    </div>

</nav>
<!--/.Navbar-->

<!-- Main container-->
<div class="container">


    <section id="categories">
        <div class="divider-new">
            <h2 class="h2-responsive wow fadeInDown">2 sites aléatoires</h2>
        </div>
    </section>

    <?php

    $value1 = array_rand($data);
    $value2 = array_rand($data);

    while ($value2 == $value1)
        $value2 = array_rand($data);

    $randomSite1 = explode(',', $data[$value1])[0];
    $randomSite2 = explode(',', $data[$value2])[0];

    echo '<div class="row">';
    echo '<div class="col-sm-4 col-md-6">
        <div class="card wow fadeInUp">
            <div class="view overlay hm-white-slight">
                <img src="//www.apercite.fr/api/apercite/800x500/yes/' . $randomSite1 . '" alt="Miniature du site ' . $randomSite1 . '" class="img-fluid"/>
                <a href="http://' . $randomSite1 . '"><div class="mask"></div></a>
            </div>
            <div class="card-block text-xs-center">
                <h4 class="card-title">' . getNameFromTags($randomSite1) . '</h4>
                <hr>
                <p class="card-text">' . getDescriptionFromTags($randomSite1) . '</p>
                <a href="http://' . $randomSite1 . '" class="btn btn-success waves-effect">Visiter</a>
            </div>
        </div>
    </div>';

    echo '<div class="col-sm-4 col-md-6">
        <div class="card wow fadeInUp">
            <div class="view overlay hm-white-slight">
                <img src="//www.apercite.fr/api/apercite/800x500/yes/' . $randomSite2 . '" alt="Miniature du site ' . $randomSite2 . '" class="img-fluid"/>
                <a href="http://' . $randomSite2 . '"><div class="mask"></div></a>
            </div>
            <div class="card-block text-xs-center">
                <h4 class="card-title">' . getNameFromTags($randomSite2) . '</h4>
                <hr>
                <p class="card-text">' . getDescriptionFromTags($randomSite2) . '</p>
                <a href="http://' . $randomSite2 . '" class="btn btn-success waves-effect">Visiter</a>
            </div>
        </div>
    </div>';
    echo '</div>';

    ?>

    <section id="categories">
        <div class="divider-new">
            <h2 class="h2-responsive wow fadeInDown">Toutes les catégories</h2>
        </div>
        <ul>
            <?php
            foreach ($categories as $cat) {
                echo '<li><a class="nav-link" href="#' . $cat . '"> • ' . $cat . '</a></li>';
            }
            ?>
        </ul>
    </section>

    <?php
    $n = 0;
    $b = false;
    foreach ($categories as $cat) {
        if ($n != 0 && !$b) {
            echo '</div>';
        }
        echo '<section id="' . $cat . '">
                <div class="divider-new">
                    <h2 class="h2-responsive wow fadeInDown">' . $cat . '</h2>
                </div>
              </section>';
        $o = 0;
        for ($i = 1; $i < $lines; $i++) {
            $values = explode(',', $data[$i]);
            if ($cat == $values[1]) {
                $tags = get_meta_tags('http://' . $values[0]);
                $name = $tags['title'];
                $description = $tags['description'];
                if (!isset($name))
                    $name = explode(".", $values[0]);
                if (isset($description)) {
                    if (strlen($description) > 100) {
                        $description = substr($description, 0, 100) . '...';
                    }
                } else {
                    $description = '<font color="red">Impossible de récupérer la description de ce site.</font>';
                }
                if (strlen($name[0]) > 15)
                    $name[0] = substr($name[0], 0, 15) . '...';
                $b = false;
                if ($o == 0) {
                    echo '<div class="row">';
                }
                echo '<div class="col-md-3">
                        <div class="card wow fadeInUp">
                            <div class="view overlay hm-white-slight">
                                <img src="//www.apercite.fr/api/apercite/800x500/yes/' . $values[0] . '" alt="Miniature du site ' . $values[0] . '" class="img-fluid"/>
                                <a href="http://' . $values[0] . '"><div class="mask"></div></a>
                            </div>
                                <div class="card-block text-xs-center">
                                <h4 class="card-title">' . $name[0] . '</h4>
                                <hr>
                                <p class="card-text">' . $description . '</p>
                                <a href="http://' . $values[0] . '" class="btn btn-success waves-effect">Visiter</a>
                            </div>
                        </div>
                    </div>';
                $o++;
                if ($o == 4) {
                echo '</div>';
                $b = true;
                $o = 0;
                }
            }
        }
        $n++;
    }
    ?>

</div>

<!-- JQuery -->
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/tether.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>

</body>

</html>
