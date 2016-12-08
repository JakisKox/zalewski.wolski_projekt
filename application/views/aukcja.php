<style>
    h1 {
        font-family: Indie Flower;
        font-size: 24px;
        font-style: normal;
        font-variant: normal;
        font-weight: 500;
        line-height: 26.4px;
    }
    h3 {
        font-family: Indie Flower;
        font-size: 14px;
        font-style: normal;
        font-variant: normal;
        font-weight: 500;
        line-height: 15.4px;
    }
    p {
        font-family: Indie Flower;
        font-size: 14px;
        font-style: normal;
        font-variant: normal;
        font-weight: 400;
        line-height: 20px;
    }
    blockquote {
        font-family: Indie Flower;
        font-size: 21px;
        font-style: normal;
        font-variant: normal;
        font-weight: 400;
        line-height: 30px;
    }
    pre {
        font-family: Indie Flower;
        font-size: 13px;
        font-style: normal;
        font-variant: normal;
        font-weight: 400;
        line-height: 18.5667px;
    }
</style>
<div class="row well" id="glowne">
    <div class="col-md-2" id="menu"><br>

    </div>

    <div class="col-md-10">
        <h1> <?= $aukcja['nazwa'] ?>!</h1>
        <center>
            <?php echo validation_errors(); ?>

            <?php
            $this->session->set_userdata('aukcja', $aukcja['id']);
            $czas = strtotime($aukcja['koniec']) - strtotime($aukcja['created_at']);
            $zostało = strtotime($aukcja['koniec']) - strtotime('now');
            $cena = number_format($aukcja['cena'] * ($zostało / ($czas)), 2, '.', '');
            ?>
            <legend>                <?= $aukcja['cena'] ?>zł<br>
                <?= $aukcja['koniec'] ?><br></legend>
            <?php
            $attributes = array('name' => 'formularz');
            echo form_open('', $attributes); ?>
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h1>
                    <strong> </strong></h1>
                <?php if ($photos != NULL): ?>
                    <?php foreach ($photos as $p) : ?>
                        <div class="col-sm-12">
                            <img src="<?= base_url() ?>/photos/<?= $p['photo'] ?>" width="500px" style="padding-bottom: 30px;">
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <p class="page-header">
                <?= $aukcja['opis'] ?></p>
                <?php if ($aukcja['typ'] != 3) {
                    $d = date('Y-m-d H:m:s');
                    if ($d < $aukcja['koniec']) {
                        if ($this->session->userdata('user_id') != NULL) {
                            echo "<input type='text' id='cena' class='form-control' name='cena'  placeholder='Cena'>";
                            echo "<button class=\"btn btn-info btn-block\" type=\"submit\">Licytuj</button>";
                        }
                    } else {
                        echo "Auckja zakończona";
                    }
                } else {
                    $d = date('Y-m-d H:m:s');
                    echo "<input type='hidden' name='kup' value='" . $cena . "'>";
                    if ($d < $aukcja['koniec']) {
                        if ($this->session->userdata('user_id') != NULL) {
                            echo "<legend>Aktualna cena: " . $cena . "</legend>";
                            echo "<a href='" . site_url() . "/users/kup/" . $aukcja['id'] . "/" . $cena . "' class='btn btn-info btn-block'>Kup</a>";
                        }
                    } else {
                        echo "Aukcja zakończona";
                    }
                }
                ?>
                </form>
                <?php
                if ($aukcja['id_wlasciciela'] == $this->session->userdata('user_id')):
                    ?>
                    <?php echo form_open_multipart('users/do_upload'); ?>

                    <input type="file" name="userfile" size="20"/>

                    <br/><br/>

                    <input type="submit" value="upload"/>

                    </form>
                <?php endif; ?>
                <?php if ($aukcja['id_wlasciciela'] == $this->session->userdata('user_id') && $story != NULL): ?>
                <table class="table">
                    <tr>
                        <td>Użytkownik</td>
                        <td>Cena</td>
                        <td>Kiedy</td>
                    </tr>

                    <?php
                    foreach ($story as $s):
                        ?>
                        <tr>
                            <td><?= $s['id_użytkownika'] ?></td>
                            <td><?= $s['cena'] ?></td>
                            <td><?= $s['created_at'] ?></td>
                        </tr>
                    <?php endforeach; ?>


                    <?php endif; ?>
                </table>
            </div>
            <div class="col-md-5"></div>


        </center>

    </div>
    <div class="col-sm-3"></div>
    <div class="col-sm-9">


    </div>

</div>
