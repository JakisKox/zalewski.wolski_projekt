	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<legend>Logowanie</legend>     
			<!-- Otwieramy formularz za pomocą funkcji z helpera Form. -->    	
			<?php echo form_open(); ?>
				<!-- 
					Również do definicji pól formularza możemy użyć funkcji z helpera Form, 
					ale w tym przypadku nie widać specjalnych korzyści dla których musielibyśmy to robić, 
					dlatego zostaniemy przy "normalnym" zapisie.
				-->
                                <div class="form-group">
                                    <input type="email" id="email" class="form-control" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                   <input type="password" id="password" class="form-control" name="password" placeholder="Hasło">
                                </div>			
				
				<button type="submit" name="submit" class="btn btn-info btn-block">Zaloguj</button>
				<input type="button" class="btn btn-info btn-block" onclick="location.href='<?=site_url()?>/users/przypomnij';" value="Przypomnij hasło" />
			<!-- Zamykamu formularz. -->
			<?php echo form_close(); ?>
		</div>
	</div>