<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'parts/meta.php'; ?>

    <title>MrPoke - Accueil</title>
</head>

<body>
    <?php include 'parts/header.php'; ?>

    <div class="content">
        <div class="hero w-100 text-center">
            <h1>
                Mister Poke
            </h1>

            <p class="text text-white  text-center bold">
                Cuisine Hawaïenne
            </p>

            <a class="btn btn-primary" href="https://linktr.ee/misterpoke972">
                Commander
            </a>
        </div>

        <div class="container mt-2" id='services'>
            <div class="row services">
                <div class=" col-sm-12 col-md-12 col-lg-6 bg-light  icons mt-2">
                    <div class="service">
                        <div class="service__img">
                            <img src="public/img/icon-service3.jpg" alt="">
                        </div>

                        <div class="service__text text-left">
                            <span>
                                100% healthy
                            </span> <br>

                            <p class="text text-grey">
                                Poissons et légumes frais
                            </p>
                        </div>


                    </div>

                    <div class="service">
                        <div class="service__img">
                            <img src="public/img/icon-service2.jpg" alt="">
                        </div>

                        <div class="service__text">
                            <span>
                                Cuisine saine
                            </span> <br>

                            <p class="text text-grey text-left">
                                Personnel qualifié et dévoué
                            </p>
                        </div>

                    </div>

                    <div class="service">
                        <div class="service__img">
                            <img src="public/img/icon-service4.jpg" alt="">
                        </div>

                        <div class="service__text">
                            <span>
                                Livraison offerte
                            </span> <br>

                            <p class="text text-grey text-left">
                                Livraison offerte quelque soit le montant
                            </p>
                        </div>

                    </div>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-6 text-center image mt-2 mx-auto">
                    <img src="public/img/services1.jpg" class="mx-auto text-center" alt="">
                </div>
            </div>
        </div>

        <div class="container mt-4" id='gallery'>
            <div class="row gallery text-center">
                <h2 class="text-center">
                    Appréciez la Cuisine Hawaïenne
                </h2>

                <p class="text text-center">
                    Sur place, à emporter ou en réservation
                </p>
            </div>

            <div class="row">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-4">
                                    <img class="d-block w-100" src="public/img/services1.jpg"
                                        alt="specialite hawaienne en martinique">
                                </div>

                                <div class="col-4">
                                    <img class="d-block w-100" src="public/img/food3.jpg"
                                        alt="specialite hawaienne en martinique">
                                </div>

                                <div class="col-4">
                                    <img class="d-block w-100" src="public/img/food4.jpg"
                                        alt="specialite hawaienne en martinique">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-4">
                                    <img class="d-block w-100" src="public/img/food4.jpg"
                                        alt="specialite hawaienne en martinique">
                                </div>

                                <div class="col-4">
                                    <img class="d-block w-100" src="public/img/food5.jpg"
                                        alt="specialite hawaienne en martinique">
                                </div>

                                <div class="col-4">
                                    <img class="d-block w-100" src="public/img/food6.jpg"
                                        alt="specialite hawaienne en martinique">
                                </div>
                            </div>

                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-4">
                                    <img class="d-block w-100" src="public/img/food7.jpg"
                                        alt="specialite hawaienne en martinique">
                                </div>

                                <div class="col-4">
                                    <img class="d-block w-100" src="public/img/food8.jpg"
                                        alt="specialite hawaienne en martinique">
                                </div>

                                <div class="col-4">
                                    <img class="d-block w-100" src="public/img/food9.jpg"
                                        alt="specialite hawaienne en martinique">
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Précédent</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Suivant</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row about">
                <div class="col-sm-12  col-md-12 col-lg-4">
                    <div class="container">
                        <div class="row">
                            <div class="images">
                                <img src="public/img/hawai1.jpg" alt="" class="">
                                <img src="public/img/hawai2.jpg" alt="" class="">
                                <img src="public/img/hawai3.jpg" alt="" class="">
                                <img src="public/img/hawai4.jpg" alt="" class="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-8">
                    <h2 class="mt-3">
                        Mister Poke 972
                    </h2>

                    <p class="text">
                        Venez savourer la cuisine Hawaïenne dans votre restaurant Mister Poke à Fort de France et
                        Schoelcher <br>
                        Un Poke Hawaïen est un mélange coloré et délicieux de poisson cru coupé en cubes, mariné avec
                        des ingrédients frais et épicés pour un goût authentique de Hawaï. Ce plat est souvent préparé
                        avec
                        du Thon frais, mais peut également être fait avec d'autres types de poisson, et se mélange
                        parfaitement
                        avec des Oignons verts, de l'Ail, du Gingembre, de la sauce Soja et d'autres herbes et épices.
                        Servi avec du Riz, des Algues et d'autres accompagnements, le Poke est une combinaison
                        parfaite de saveurs et de textures, idéale pour ceux qui recherchent une option saine et
                        délicieuse.
                    </p>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row ads">
                <div class="col-sm-12 col-md-3 box">
                    <img src="public/img/ad4.jpg" alt="repas au poisson en martinique">
                </div>
                <div class="col-sm-12 col-md-3 box">
                    <img src="public/img/ad3.jpg" alt="repas au poisson en martinique">
                </div>
                <div class="col-sm-12 col-md-3 box">
                    <img src="public/img/ad1.jpg" alt="repas au poisson en martinique">
                </div>

                <div class="col-sm-12 col-md-3 box">
                    <img src="public/img/ad5.jpg" alt="repas au poisson en martinique">
                </div>
            </div>
        </div>

        <div class="game text-center" id='game'>
            <h2>
                Jeu concours
            </h2>
            <p class="text text-black text-center">
                Avez vous entendu parler de notre jeu concours ??
            </p>

            <div class="audio">
                <audio controls src="public/audio/jingle.mp3">
                    <a href="public/audio/jingle.mp3">
                        Télécharger
                    </a>
                </audio>
            </div>
        </div>

        <div class="container">
            <div class="row book">
                <div class="col-sm-12 col-md-4 ">
                    <div class="book__form">
                        <p class="text ">
                            Cliquez ici pour réserver votre repas maintenant
                        </p>
                        <a class="btn btn-success" href="https://linktr.ee/misterpoke972">
                            Commander
                        </a>
                    </div>
                </div>

                <div class="col-sm-12 col-md-8">
                    <div class="map mx-auto">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2990.274257380938!2d-70.56068388481569!3d41.45496659976631!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e52963ac45bbcb%3A0xf05e8d125e82af10!2sDos%20Mas!5e0!3m2!1sen!2sus!4v1671220374408!5m2!1sen!2sus"
                            style="border:0;" class="mx-auto" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'parts/footer.php'; ?>
</body>

</html>