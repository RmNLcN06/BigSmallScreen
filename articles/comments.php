<?php 

if(isset($_GET['id']) AND !empty($_GET['id'])) {
   $getIdArticle = htmlspecialchars($_GET['id']);
   $article = $database->prepare('SELECT * FROM articles WHERE id = ?');
   $article->execute(array($getIdArticle));
   $article = $article->fetch();

    if(isset($_POST['submit_comment'])) 
    {
        if(isset($_POST['content']) AND !empty($_POST['content'])) {

            $content = htmlspecialchars($_POST['content']);

            $ins = $database->prepare('INSERT INTO comments (content, articles_id, created_at) VALUES (?,?, NOW())');
            $ins->execute([$content, $getIdArticle]);
            $msg = "<span style='color:green'>Votre commentaire a bien été posté</span>";
            
        } 
        else 
        {
            $msg = "Erreur: Tous les champs doivent être complétés";
        }
    }
        $comments = $database->prepare('SELECT comments.id, comments.articles_id, comments.content, comments.created_at FROM comments INNER JOIN articles ON comments.articles_id = articles.id WHERE articles_id = ? ORDER BY comments.id DESC;');
        $comments->execute([$getIdArticle]);

?>

<section class="comment">

        <h2>Commentaires:</h2>

        <form method="POST">
            <?php if(isset($msg)) 
            {
                 echo $msg; 
            } ?>
            <input type="hidden" id="nickname" name="nickname" value="<?= htmlspecialchars($_SESSION['nickname']); ?>"> Votre pseudo: <?= htmlspecialchars($_SESSION['nickname']); ?><br>
            <textarea name="content" placeholder="Votre commentaire..."></textarea>
            <input type="submit" value="Poster mon commentaire" name="submit_comment" />
        </form>
        
        <?php foreach($comments->fetch() as $comment) { ?>
            <div class="comment_posted">
                <p>
                    <?= htmlspecialchars($_SESSION['nickname']); ?>
                    <?php $formDate = strtotime($comment['created_at']); ?>
                    Envoyé le : <?= date("d-m-Y", $formDate) . " à " . date("H:i", $formDate); ?>
                </p>
                <?= $comment['content'] ?><br><br>
            </div>
        <?php } ?>
</section>
<?php } ?>