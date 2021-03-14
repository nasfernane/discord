<!-- si l'id utilisateur n'est pas défini dans la session, redirige vers la page de connexion -->
<?php if (!isset($_SESSION['userid'])) header('location: /?page=login') ?>

<!-- page principale du chat -->
<main class="mainWrap">
    <!-- header avec titre du chat, options de navigation et barre de recherche -->
    <header class="mainWrap__header">
        <p class="mainWrap__header__title">Simplon Paca</p>
        <div class="mainWrap__header__content">
            <div class="navChan">   
                <img src="/assets/img/hashtag.png" alt="">
                <p class="chanTitle">general</p>
            </div>
            <div class="navBar">
                <img src="../../assets/img/bell.png" alt="Bell">
                <img src="../../assets/img/pin.png" alt="Pin">
                <img src="../../assets/img/members.png" alt="Members">
                <input type="text" placeholder="Rechercher"/>
            </div>
        </div>
    </header>

    <!-- contenu principal -->
    <div class="mainWrap__content">
        <!-- section des salons  -->
        <section class="channelSection">
            <div class="channelSection__Container">
                <h3>Salons textuels</h3>
                <form class="channelSection__Container__channel channelSection__Container__channel--general" action="/php/scripts/handler.php?chan=general">
                    <button name="chan" value="general"><img src="/assets/img/hashtag.png" alt=""><p>general</p></button>  
                </form>
                <form class="channelSection__Container__channel channelSection__Container__channel--live" action="/php/scripts/handler.php?chan=live">
                    <button name="chan" value="live"><img src="/assets/img/hashtag.png" alt=""><p>live</p></button>
                </form>
                <form class="channelSection__Container__channel channelSection__Container__channel--tutos" action="/php/scripts/handler.php?chan=tutos">
                    <button name="chan" value="live"><img src="/assets/img/hashtag.png" alt=""><p>tutos</p></button>
                    
                </form>
            </div>

            <!-- encadré utilisateur avec son nom, son id et bouton logout -->
            <div class="channelSection__user">
                <div class="channelSection__user__container">
                    <img src="/assets/img/user.png" alt="Avatar">
                    <div class="channelSection__user__container--infos">
                        <span><?= $_SESSION['userName'] ?></span>
                        <span>#<?= $_SESSION['userid'] ?></span>
                    </div>
                </div>

                <form action="/php/scripts/logout.php">
                    <button><img class="logout" src="/assets/img/logout.png" alt="Log Out" /></button>
                </form>
            </div>
        </section>

        <!-- section chat -->
        <section class="mainSection">
            <!-- conteneur des messages -->
            <div class="messages">
            </div>

            <form class="mainSection__form" action="/php/scripts/handler.php?" >
                <label for="msgInput"><img src="/assets/img/plus.png" alt=""></label>
                <input type="text" id ="msgInput" name="content" class="mainSection__form--input" placeholder="Envoyer un message à #live" autocomplete="off">
            </form>
        </section>

        <!-- section utilisateurs en ligne ou hors-ligne -->
        <section class="userSection">
            <div class="userSection__category">
                <h3>En ligne</h3>
                <!-- conteneur utilisateurs en ligne -->
                <div class="onlineUsers"></div>
            </div>

            <div class="userSection__category">
                <h3>Hors-ligne</h3>
                <!-- conteneur utilisateurs hors-ligne -->
                <div class="offlineUsers"></div>
            </div>
            
        </section>
    </div>

</main>

