<script>
    $( function() {

        jQuery('#datetimepicker').datetimepicker({format:'Y-m-d H:i:s', minDate:0});

    } );
</script>
<div class="row">
    <div class="col-md-4 col-md-offset-4 well">
        <?php echo validation_errors(); ?>
        <legend>Dodaj auckję</legend>
        <?php
        $attributes = array('name' => 'formularz');
        echo form_open('', $attributes); ?>

        <input type="text" id="nazwa" class="form-control" name="nazwa" value="<?php echo set_value('nazwa'); ?>" placeholder="Nazwa">
        <input type="radio" name="typ" value="1" checked>klasyczna<br>
        <input type="radio" name="typ" value="2">z ceną minimalną<br>
        <input type="radio"  name="typ" value="3">holenderska
        <input type="text" id="cena" class="form-control" name="cena" value="<?php echo set_value('cena'); ?>" placeholder="Cena">
        <input type="text" id="datetimepicker" class="form-control" name = "kiedy" value="<?php echo set_value('kiedy')?>" placeholder="Czas zakończenia aukcji">
        <textarea name = "opis" class="form-control" <?php echo set_value('opis');?> placeholder="Opis"></textarea>
        <center><button class="btn btn-info btn-block" type="submit">Dodaj</button></center>
        <?php echo form_close(); ?>
    </div>
</div>

