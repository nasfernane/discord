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
    </section>

    <section class="userSection">
    <p>Utilisateurs</p>
    </section>
</div>

</main>

