<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<p>
<?php 
    if (isset($_COOKIE['login']) && isset($_COOKIE['pass'])) {
?>
        <a href="index.php?action=showModifPage">Retour à la liste des chapitres</a>
<?php 
    }
    else {
?>
        <a href="index.php?action=listPosts">Retour à la liste des chapitres</a></p>
<?php
    }
?>
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <?= $post['title'] ?>
                        </h3>
                    </div>
                    <div class="card-body">
                        <p><?= nl2br(strip_tags($post['content'])) ?></p>
                        <p><em><strong>le <?= $post['creation_date_fr'] ?></strong></em></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
<h1>Commentaires</h1>
<?php
while ($comment = $comments->fetch())
{
?>
    <div class="comment">
        <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?>
        </p>
        <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        <p>
            <?php 
            if (isset($comment['report']) && $comment['report'] == 1) {
                echo  '<div class="alert alert-danger" role="alert"><strong><i class="fa fa-exclamation-triangle"></i> Commentaire signalé !!! <i class="fa fa-exclamation-triangle"></i></strong></div><hr>';
            }   
            else 
            {
            ?>
                <p><a class="btn-outline-primary" href="index.php?action=reportCom&amp;idc=<?=$comment['id'] ?>&amp;idp=<?=$comment['post_id'] ?>"><strong><i class="fa fa-exclamation-circle"></i> Signaler !!</strong></a>
                </p>
                <hr>
            <?php
            } 
            ?>
        </p>
    </div>
<?php 
}
?>
<br />
<h1>Ajouter des commentaires</h1>
<div class="adcomment">
    <form action="index.php?action=addComment&amp;id=<?=$post['id'] ?>" method="post">
        <div>
            <label for="author">Auteur</label><br />
            <input type="text" id="author" name="author" required="required" />
        </div>
        <div>
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment" required="required"></textarea>
        </div>
        <div>
            <input type="submit" value="Envoyer" />
        </div>
    </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>