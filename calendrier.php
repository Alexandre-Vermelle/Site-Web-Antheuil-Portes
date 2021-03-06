<?php
require 'calendarCtrl.php';
?>

<!DOCTYPE html>
    <html lang="fr" dir="ltr">
        <head>
            <title>Site Internet Antheuil-Portes</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
            <link href="assets/css/calendrier.css" type="text/css" rel="stylesheet">
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Bentham&display=swap" rel="stylesheet">
        </head>
        <body>
            <!--SECTION NAVBAR-->
            <section>
                <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: rgb(13, 48, 77)">
                    <a class="navbar-brand" href="index.html"><img class="px-2"src="assets/img/blason-navbar.png" />ANTHEUIL-PORTES</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link px-2" href="mairie.html">MAIRIE</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-2" href="actualites.html">ACTUALITES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-2" href="services.html">SERVICES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-2" href="patrimoine.html">PATRIMOINE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-2" href="animations.html">ANIMATIONS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-2" href="histoire.html">UN PEU D'HISTOIRE</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link px-2" href="tourisme.html">TOURISME</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-2" href="informations.html">INFORMATIONS PRATIQUES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-2" href="calendrier.php">CALENDRIER</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-2" href="contact.html">CONTACT</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </section>
            <!--FIN SECTION NAVBAR-->
            <!--SECTION TITLE JAVASCRIPT-->
            <section id="titlePresentation">
                <div class="container">
                <div class="row">
                    <div class= "titleStyle col-sm-12 pt-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chat-right-text-fill" viewBox="0 0 16 16">
                        <path d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h9.586a1 1 0 0 1 .707.293l2.853 2.853a.5.5 0 0 0 .854-.353V2zM3.5 3h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1 0-1zm0 2.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1 0-1zm0 2.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1z"/>
                        </svg>
                    </div>
                    <div class= "titleStyle col-sm-12 ml-5"> 
                        <span id="type-text">...</span>
                    </div>
                </div>
            </div>
            </section>
            <!--FIN SECTION TITLE JAVASCRIPT-->
            <!--SECTION CALENDAR-->
            <section>
                <form action="calendrier.php" method="POST">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-3 list"></div>
                            <div class="col-sm-2 list">
                                <select name="month" id="month" class="form-select btn btn-secondary dropdown-toggle">
                                    <option value="" disabled selected>Veuillez choisir un mois</option>
                                    <?php foreach ($monthList as $monthNumber => $monthName) : ?>
                                    <option value="<?= $monthNumber ?>" <?= (isset($_POST['month']) && $monthNumber ==  $_POST['month'] ? 'selected' : ''); ?>><?= $monthName ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <p><?= isset($formError['month']) ? $formError['month']  : ''; ?></p>
                            </div>
                            <div class="col-sm-2 list">
                                <select name="year" id="year" class="form-select btn btn-secondary dropdown-toggle">
                                    <option value="" disabled selected>Veuillez choisir une année</option>
                                    <?php for ($years = $firstYear; $years <= $lastYear; $years++) : ?>
                                    <option value="<?= $years ?>" <?= (isset($_POST['year']) && $years ==  $_POST['year'] ? 'selected' : ''); ?>><?= $years ?></option>
                                    <?php endfor; ?>
                                </select>
                                <p><?= isset($formError['year']) ? $formError['year']  : ''; ?></p>
                            </div>
                            <div class="col-sm-2 list">
                                <input type="submit" value="Afficher le calendrier" name="showCalendar" class="btn btn-secondary" />
                            </div>
                            <div class="col-sm-3 list"></div>
                        </div>
                    </div>
                </form>
                <?php if (count($formError) == 0 && isset($_POST['showCalendar'])) : ?>
                <div class="container-fluid">
                    <table>
                        <thead>
                            <tr>
                                <th>Lun</th>
                                <th>Mar</th>
                                <th>Mer</th>
                                <th>Jeu</th>
                                <th>Ven</th>
                                <th>Sam</th>
                                <th>Dim</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php $daysInMonth = 2;
                                for ($days = 1; $days <= 7; $days++) : ?>
                                <td class="<?= $days < $firstDayOfMonth ? 'blank' : '' ?>"><?php if ($days == $firstDayOfMonth) : ?>
                                1
                                <?php endif;
                                if ($days > $firstDayOfMonth):
                                    echo $daysInMonth++;
                                endif;
                                ?></td>
                                <?php endfor; ?>
                            </tr>
                            <?php while ($daysInMonth <= $daysNumberOfMonth) : ?>
                            <tr>
                                <?php for ($days = 1; $days <= 7; $days++) : ?>
                                <td class="<?= $daysInMonth > $daysNumberOfMonth  ? 'blank' : '' ?>"><?php if ($daysInMonth <= $daysNumberOfMonth) : ?>
                                <?= $daysInMonth++ ?>
                                <?php endif; ?>
                                </td>
                                <?php endfor; ?>   
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                <?php endif; ?>    

                <div class="container pt-5">
        <div class="row">
            <div class="col-md-12">

            </div>
        </div>
    </div>

    <div class="parallax"></div>
            </section>


            <!--SECTION FOOTER-->
            <section id="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 m-3">
                        <img src="assets/img/blason-navbar.png" />
                        <p><strong>MAIRIE D'ANTHEUIL PORTES</strong></br>61 Place Aristide Boulanger</br>60162 Antheuil-Portes</br>03 44 42 60 43</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 m-3">
                        <p>Suivez nous sur : </p>
                        <img class="logo" src="assets/img/facebook.png" /><img class="logo px-1" src="assets/img/twitter.png" /><img class="logo" src="assets/img/instagram.png" /><img class="logo" src="assets/img/flickr.png" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 m-3">
                        <p>Mentions légales</p>
                        </div>
                    </div>
                </div>
            </section>
            <!--FIN SECTION FOOTER--> 
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
            <script src="assets/js/calendrier-script.js"></script>
        </body>
    </html>