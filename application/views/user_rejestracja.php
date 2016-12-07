	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
	<?php echo validation_errors(); ?>
     
		<legend>Rejestracja</legend>
		<?php 
	 $attributes = array('name' => 'formularz');
	 echo form_open('', $attributes); ?>

		<input type="text" id="imie" class="form-control" name="imie" value="<?php echo set_value('imie'); ?>" placeholder="Imię">
		<input type="text" id="nazwisko" class="form-control" name="nazwisko" value="<?php echo set_value('nazwisko'); ?>" placeholder="Nazwisko">
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" placeholder="Email">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>" placeholder="Password">     
		 <div class="checkbox">        </div>  
		  <center><button class="btn btn-info btn-block" type="submit">Zarejestruj</button></center>
      <?php echo form_close(); ?>
</div>
</div>
	  
