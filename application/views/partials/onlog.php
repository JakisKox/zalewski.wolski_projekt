<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FreeFakturaMaker</title>
    <link href="<?php echo base_url();?>/css/bootstrap.min.css" rel="stylesheet">

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
            <ul class="nav navbar-nav">
              <!-- 
                  Poniżej sprawdzamy, czy dana pozycja w menu jest aktualnie odwiedzaną stroną. 
                  Jeśli tak, to do tagu <li> dodajemy klasę "active", która zmieni wygląd tego elementu.
                  Aby dowiedzieć się jak działa funkcja rsegment zajrzyj do podręcznika: http://podrecznik.codeigniter.org.pl/libraries/uri.html
              -->
                            <?php if ($this->session->userdata('user_id')): ?>
                <li <?php echo ($this->uri->rsegment('2') == 'uslugi') ? 'class="active"' : ''; ?>><a href="<?php echo site_url('start/uslugi'); ?>">Dodaj usługę</a></li>
				<li <?php echo ($this->uri->rsegment('2') == 'klient') ? 'class="active"' : ''; ?>><a href="<?php echo site_url('start/klient'); ?>">Dodaj Klienta</a></li>
				<li <?php echo ($this->uri->rsegment('2') == 'faktura') ? 'class="active"' : ''; ?>><a href="<?php echo site_url('start/faktura'); ?>">Stwórz fakturę</a></li>
              <?php else: ?>
              <?php endif; ?>
            </ul>
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