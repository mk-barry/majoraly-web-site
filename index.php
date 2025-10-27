<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="height=device-height, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <link rel="stylesheet" href="../booticons/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/index-mobile.css">
    <link rel="stylesheet" href="css/footer.css">
    <!-- <script src="js/nav-footer.js"></script> -->
    <script src="js/scroll.js" defer></script>
    <script src="js/script.js" defer></script>
    <title>Chez MAJORALY</title>
</head>

<body>
    <nav>
        <div class="logo">
            <img src="images/logo.png" alt="">
            MAJORALY
        </div>
        <div class="menu">
            <div class="links">
                <!-- <a href="index.php" class="link">accueil</a> -->
                <a href="#about" class="link">à propos</a>
                <a href="#menu" class="link">menu</a>
                <a href="#services" class="link">services</a>
                <a href="#avis" class="link">avis</a>
                <a href="#contact" class="link">contact-us</a>
            </div>
            <input type="checkbox" name="toggle" id="toggle" />
            <label for="toggle">
                <span class="bi bi-list"></span>
                <span class="bi bi-chevron-contract"></span>
            </label>
        </div>
    </nav>
    <main>
        <section id="about" class="">
            <img src="images/bg.jpg" alt="">
            <div class="view">
                <h4>bienvenue chez <span>majoraly</span></h4>
                <p>la plateforme à l'ambiance mythique. ici, vous pourrez consulter les menus du jour, ceux en promotion, reserver pour des diner, des mariages, des baptêmes, des anniversaires, et consulter les avis de nos differents clients.</p>
                <span>7j/7 ~~~ 7h-24h</span>
            </div>
        </section>
        <section id="menu" class="">
            <header>Nos menus</header>
            <div class="menu-container">
                <div class="menu">
                    <img src="images/dejeuner.jpeg" alt="">
                    <h5>Petit-déjeuners</h5>
                    <p>prenez place pour un bon petit-déjeuner avec vos proches ou en solo...</p>
                </div>
                <div class="menu">
                    <img src="images/boisson.jpeg" alt="">
                    <h5>boissons</h5>
                    <p>vos boissons avec ou sans alcool disponible à petits prix, n’hésitez pas à vous faire plaisir.</p>
                </div>
                <div class="menu">
                    <img src="images/dessert.jpeg" alt="">
                    <h5>desserts</h5>
                    <p>vos desserts tranquilles pour accompagner chacun de vos repas, et rendre chaque moment inoubliables.</p>
                </div>
                <div class="menu">
                    <img src="images/diner.jpeg" alt="">
                    <h5>dîners</h5>
                    <p>nous sommes là pour vous, et même tard le soir, nous assurons vos dîners d'affaires, entre-amis ou en famille.</p>
                </div>
            </div>
            <a href="menu.php">Consultez nos menus</a>
        </section>
        <section id="services" class="">
            <header>nos services</header>
            <div class="services-container">
                <div class="blocks">
                    <p>Nous vous assistons pour toutes vos cérémonies, et nous nous assurons de rendre chaque instant inoubliable.</p>
                    <a href="reservation.html">Réservez dès maintenant</a>
                </div>
                <div class="blocks">
                    <div class="service">
                        <img src="images/mariage.png" alt="">
                        <h5>mariages</h5>
                        <p>Pour la gestion efficace de vos repas de mariage.</p>
                    </div>
                    <div class="service">
                        <img src="images/bapteme.png" alt="">
                        <h5>baptêmes</h5>
                        <p>Pour donner de la joie à vos invités pour des baptêmes.</p>
                    </div>
                    <div class="service">
                        <img src="images/anniversaire.png" alt="">
                        <h5>anniversaires</h5>
                        <p>Pour que votre anniversaire soit le plus mémorable possible.</p>
                    </div>
                    <div class="service">
                        <img src="images/diner.png" alt="">
                        <h5>fêtes</h5>
                        <p>Pour vos ambiances festives.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- <section id="avis" class="">
            <div>
                <img src="" alt="" class="avatar">
                <div class="infos">
                    <h5><span></span></h5>
                    <p class="comment"></p>
                </div>
            </div>
            <div>
                <img src="" alt="" class="avatar">
                <div class="infos">
                    <h5><span></span></h5>
                    <p class="comment"></p>
                </div>
            </div>
            <div>
                <img src="" alt="" class="avatar">
                <div class="infos">
                    <h5><span></span></h5>
                    <p class="comment"></p>
                </div>
            </div>
            <div>
                <img src="" alt="" class="avatar">
                <div class="infos">
                    <h5><span></span></h5>
                    <p class="comment"></p>
                </div>
            </div>
            </div>
            </div>
        </section> -->
        <section id="contact" class="">
            <header>Nous contacter</header>
            <form id="form" action="" method="post">
                <fieldset>
                    <label for="prenom">
                        Votre Prénom
                        <input type="text" name="" id="prenom" required placeholder="Luma">
                    </label>
                    <label for="nom">
                        Votre Nom
                        <input type="text" name="" id="nom" required placeholder="Abene">
                    </label>
                </fieldset>
                <label for="sujet" class="diff">
                    Votre Sujet
                    <input type="text" name="" id="sujet" required placeholder="Indisponibilité du service de réservation.">
                </label>
                <label for="message" class="diff">
                    <textarea name="" id="message" placeholder="Votre message ici" required></textarea>
                </label>
                <input type="submit" value="ENVOYER">
            </form>
        </section>
    </main>
    <footer>
       <div class="design">
        <p>Designé par <span class="blue">Barry</span> avec HTML and CSS</p>
       </div>
       <div class="right">
        <p>Tous droits réservés &copy; 2025.</p>
       </div>
    </footer>
</body>
</html>