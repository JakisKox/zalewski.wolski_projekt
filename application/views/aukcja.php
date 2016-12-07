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
            <legend>Aukcja</legend>
            <?php
            $attributes = array('name' => 'formularz');
            echo form_open('', $attributes); ?>
            <div class="col-md-3"></div>
            <div class="col-md-4">
                <h1>
                    <strong> </strong></h1>
                <?= $aukcja['cena'] ?>zł<br>
                <?= $aukcja['koniec'] ?><br>
                <?= $aukcja['opis'] ?>
                <?php if ($aukcja['typ'] != 3) {
                    if ($zostało > 0) {
                        if ($this->session->userdata('user_id') != NULL) {
                            echo "<input type='text' id='cena' class='form-control' name='cena'  placeholder='Cena'>";
                            echo "<button class=\"btn btn-info btn-block\" type=\"submit\">Licytuj</button>";
                        }
                    } else {
                        echo "Auckja zakończona";
                    }
                } else {

                    echo "<input type='hidden' name='kup' value='" . $cena . "'>";
                    if ($zostało > 0) {
                        if ($this->session->userdata('user_id') != NULL) {
                            echo "Aktualna cena: " . $cena;
                            echo "<a href='" . site_url() . "/users/kup/" . $aukcja['id'] . "/" . $cena . "' class='btn btn-info btn-block'>Kup</a>";
                        }
                    } else {
                        echo "Aukcja zakończona";
                    }
                }
                ?>
                </form>
                <?php
                if ($aukcja['id_wlasciciela'] == $this->session->userdata('user_id') && $story != NULL):
                ?>
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

                    <?php echo form_open_multipart('users/do_upload'); ?>

                    <input type="file" name="userfile" size="20"/>

                    <br/><br/>

                    <input type="submit" value="upload"/>

                    </form>
                    <?php endif; ?>
                </table>
            </div>
            <div class="col-md-5"></div>


        </center>

    </div>
    <div class="col-sm-3"></div>
    <div class="col-sm-9">
    <?php if ($photos != NULL): ?>
        <?php foreach ($photos as $p) : ?>
            <div class="col-sm-12">
                <img src="<?= base_url() ?>/photos/<?= $p['photo'] ?>" width="500px">
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    </div>

</div>
