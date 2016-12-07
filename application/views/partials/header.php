<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projekt</title>
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="<?=base_url('datetimepicker-master/jquery.datetimepicker.css')?>"/ >
    <script src="<?=base_url('datetimepicker-master/jquery.js')?>"></script>
    <script src="<?=base_url('datetimepicker-master/build/jquery.datetimepicker.full.min.js')?>"></script>
  </head>
  <body id="tlo">
    <div class="navbar navbar-inverse navbar-fixed-top">

        <div class="container">

            <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo site_url('users/start'); ?>">Projekt</a>
    </div>

          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav pull-right">
              <!--
                  Sprawdzamy, czy użytkownik jest zalogowany i w zależności od tego wyświetlamy
                  odpowiednie pozycje w menu.
              -->
              <?php if ($this->session->userdata('user_id')): ?>
                <li><a href="<?php echo site_url('users/logout'); ?>">Wyloguj</a></li>
				<li <?php echo ($this->uri->rsegment('2') == 'ustawienia') ? 'class="active"' : ''; ?>><a href="<?php echo site_url('users/ustawienia'); ?>">Ustawienia</a></li>
              <?php else: ?>
                <li <?php echo ($this->uri->rsegment('2') == 'login') ? 'class="active"' : ''; ?>><a href="<?php echo site_url('users/login'); ?>">Logowanie</a></li>
				<li <?php echo ($this->uri->rsegment('2') == 'rejestracja') ? 'class="active"' : ''; ?>><a href="<?php echo site_url('users/rejestracja'); ?>">Rejestracja</a></li>
              <?php endif; ?>

            </ul>
          </div><!--/.nav-collapse -->
        </div>

    </div>
