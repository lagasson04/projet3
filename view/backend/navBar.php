<nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.php?action=lastPost"><i class="fa fa-home" aria-hidden="true"></i> Billet simple pour l'Alaska</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i><?php 
          if (isset($_SESSION['login']))
          {
            echo ' Bonjour ' . $_SESSION['login'];
          } ?></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="index.php?action=adminView"><i class="fa fa-tachometer" aria-hidden="true"></i> Tableau de bord</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="index.php?action=showModifPage"><i class="fa fa-list" aria-hidden="true"></i> Listes des chapitres</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link bg-danger" id="deconnexion" href="index.php?action=log_Out"><i class="fa fa-sign-out" aria-hidden="true"></i> Déconnexion</a>
        </li>
      </ul>
    </div>
  </div>
</nav>