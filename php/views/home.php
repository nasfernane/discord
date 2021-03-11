<?php if (!isset($_SESSION['userid'])) header('location: /?page=login') ?>

<main class="mainWrap">
<header class="mainWrap__header">
    <p class="mainWrap__header__title">Simplon Paca</p>
    <div class="mainWrap__header__content">
        <p># annonces</p>
        <div class="navBar">
            <img src="../../assets/img/bell.png" alt="Bell">
            <img src="../../assets/img/pin.png" alt="Pin">
            <img src="../../assets/img/members.png" alt="Members">
            <input type="text" placeholder="Rechercher"/>
        </div>
    </div>
</header>

<div class="mainWrap__content">
    <section class="channelSection">
    <p>Salons</p>
    </section>

    <section class="mainSection">
    <p>Main view</p>
    <form method="POST" class="mainSection__form" action="/php/scripts/functions.php">
        <label for="msgInput"><img src="/assets/img/plus.png" alt=""></label>
        <input type="text" id ="msgInput" name="message" class="mainSection__form--input" placeholder="Envoyer un message à #live">
    </form>
    </section>

    <section class="userSection">
    <p>Utilisateurs</p>
    </section>
</div>

</main>

