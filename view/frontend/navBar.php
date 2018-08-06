<?php
session_start();
if (isset($_SESSION['login']) AND isset($_SESSION['pass'])) {
  require('view/backend/navBar.php');
}
else {
  ?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php?action=lastPost">Billet simple pour l'Alaska</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fa fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php?action=lastPost"><i class="fa fa-home" aria-hidden="true"></i> Accueil</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="index.php?action=listPosts"><i class="fa fa-list" aria-hidden="true"></i> Liste des chapitres</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="index.php?action=showContactView"><i class="fa fa-envelope" aria-hidden="true"></i> Contact</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="index.php?action=biography"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Biographie</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link bg-danger" id="connexion" href="index.php?action=showConnectionView"><i class="fa fa-sign-in" aria-hidden="true"></i> Connexion</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php
}
?>
<!-- /.container -->
