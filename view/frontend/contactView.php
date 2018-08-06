<?php $title = 'contact'; ?>
<?php ob_start(); ?>
<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <h1>Contact</h1>
      <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
      <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
      <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
      <form name="sentMessage" id="contactForm" action="index.php?action=contactMe" method="post">
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Nom</label>
            <input type="text" class="form-control" placeholder="Nom" name="nom" id="nom" required data-validation-required-message="Entrez votre nom svp.">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Prénom</label>
            <input type="text" class="form-control" placeholder="Prénom" name="prenom" id="prenom" required data-validation-required-message="Entrez votre prénom svp.">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Adresse Email</label>
            <input type="email" class="form-control" placeholder="Adresse Email" name="email" id="email" required data-validation-required-message="Renseignez votre adresse mail svp.">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Message</label>
            <textarea rows="5" class="form-control" placeholder="Message" name="message" id="message" required data-validation-required-message="Ecrivez un message svp."></textarea>
            <p class="help-block text-danger"></p>
          </div>
        </div>
        <br>
        <div id="success"></div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Envoyer</button>
        </div>
      </form>
    </div>
  </div>
</div>

<hr>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>