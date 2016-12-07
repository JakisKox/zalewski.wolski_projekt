<div class="row well" id="glowne">
    <div class="col-md-2" id="menu"><br>

    </div>

    <div class="col-md-10">
        <h1>Witaj!</h1>
        <center>


            <?php foreach ($aukcje as $a): ?>
                <div class="col-md-4 produkty">
                    <h1><a href="<?= site_url() ?>/users/aukcja/<?= $a['id'] ?>">
                            <strong>     <?= $a['nazwa'] ?></strong></h1>
                    <?= $a['cena'] ?>zł<br>
                    <?= $a['koniec'] ?>
                </div>
            <?php endforeach; ?></center>

    </div>


</div>
