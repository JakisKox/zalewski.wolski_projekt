<div class="row well" id="glowne">

    <?php foreach ($aukcje as $a): ?>
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <?php $d = date('Y-m-d H:m:s');
        if ($d < $a['koniec']):?>

            <div class="col-md-12" style="padding-top: 20px;">
                <div class="row">
                    <div class="col-md-4">
                        <!-- begin panel group -->
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                            <!-- panel 1 -->
                            <div class="panel panel-default">
                                <!--wrap panel heading in span to trigger image change as well as collapse -->
                    <span class="side-tab" data-target="#tab1<?= $a['id'] ?>" data-toggle="tab" role="tab"
                          aria-expanded="false">
                        <div class="panel-heading" role="tab" id="headingOne" data-toggle="collapse"
                             data-parent="#accordion" href="#collapseOne<?= $a['id'] ?>" aria-expanded="true"
                             aria-controls="collapseOne<?= $a['id'] ?>">
                            <h1 class="panel-title">
            <strong> <?= $a['nazwa'] ?></h1>
                        </div>
                    </span>

                                <div id="collapseOne<?= $a['id'] ?>" class="panel-collapse collapse in" role="tabpanel"
                                     aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <!-- Tab content goes here -->
                                        <a href="<?= base_url() ?>index.php/users/aukcja/<?= $a['id'] ?>"><?= $a['opis']; ?></a>
                                    </div>
                                </div>
                            </div>
                            <!-- / panel 1 -->

                            <!-- panel 2 -->
                            <div class="panel panel-default">
                                <!--wrap panel heading in span to trigger image change as well as collapse -->
                    <span class="side-tab" data-target="#tab2<?= $a['id'] ?>" data-toggle="tab" role="tab"
                          aria-expanded="false">
                        <div class="panel-heading" role="tab" id="headingTwo" data-toggle="collapse"
                             data-parent="#accordion" href="#collapseTwo<?= $a['id'] ?>" aria-expanded="false"
                             aria-controls="collapseTwo">
                            <h4 class="panel-title collapsed">    Cena<br>

</h4>
                        </div>
                    </span>

                                <div id="collapseTwo<?= $a['id'] ?>" class="panel-collapse collapse" role="tabpanel"
                                     aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <!-- Tab content goes here -->
                                        <?= $a['cena'] ?>zł
                                    </div>
                                </div>
                            </div>
                            <!-- / panel 2 -->

                            <!--  panel 3 -->
                            <div class="panel panel-default">
                                <!--wrap panel heading in span to trigger image change as well as collapse -->
                    <span class="side-tab" data-target="#tab3<?= $a['id'] ?>" data-toggle="tab" role="tab"
                          aria-expanded="false">
                        <div class="panel-heading" role="tab" id="headingThree" class="collapsed" data-toggle="collapse"
                             data-parent="#accordion" href="#collapseThree<?= $a['id'] ?>" aria-expanded="false"
                             aria-controls="collapseThree">
                            <h4 class="panel-title">                              Koniec aukcji:  </h4>
                        </div>
                    </span>

                                <div id="collapseThree<?= $a['id'] ?>" class="panel-collapse collapse" role="tabpanel"
                                     aria-labelledby="headingThree">
                                    <div class="panel-body">
                                        <!-- tab content goes here -->
                                        <?= $a['koniec'] ?>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- / panel-group -->

                    </div> <!-- /col-md-4 -->

                    <div class="col-md-8">
                        <!-- begin macbook pro mockup -->
                        <div class="md-macbook-pro md-glare">
                            <div class="md-lid">
                                <div class="md-camera"></div>
                                <div class="md-screen">
                                    <!-- content goes here -->
                                    <div class="tab-featured-image">
                                        <div class="tab-content">
                                            <?php $i = 1; ?>
                                            <?php foreach ($photos as $p): ?>
                                                <?php if ($p['id_aukcji'] != $a['id']) continue; ?>
                                                <?php if ($i == 1): ?>
                                                    <div class="tab-pane  in active" id="tab1<?= $a['id'] ?>">
                                                        <img src="<?= base_url() ?>photos/<?= $p['photo'] ?>" alt="tab1"
                                                             class="img img-responsive">
                                                    </div>
                                                <?php endif;
                                                if ($i != 1):?>
                                                    <div class="tab-pane " id="tab<?= $i ?><?= $a['id'] ?>">

                                                        <img
                                                            src="<?= base_url() ?>photos/<?= $p['photo'] ?>"
                                                            class="img img-responsive">

                                                    </div>
                                                <?php endif;
                                                $i++; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="md-base"></div>
                        </div> <!-- end macbook pro mockup -->


                    </div> <!-- / .col-md-8 -->
                </div> <!--/ .row -->
            </div> <!-- end sidetab container -->
        <?php endif; ?>
    <?php endforeach; ?>
</div>

