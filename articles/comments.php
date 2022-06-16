<?php 

if(isset($_GET['id']) AND !empty($_GET['id'])) 
{
   $getIdArticle = htmlspecialchars($_GET['id']);
   $article = $database->prepare('SELECT * FROM articles WHERE id = ?');
   $article->execute(array($getIdArticle));
   $article = $article->fetch();

    if(isset($_POST['submit_comment'])) 
    {
        if(isset($_POST['content'], $_SESSION['id'], $_SESSION['nickname']) AND !empty($_POST['content']) AND !empty($_SESSION['id']) AND !empty($_SESSION['nickname']) ) 
        {
            $userId = htmlspecialchars($_SESSION['id']);
            $userNickname = htmlspecialchars($_SESSION['nickname']);
            $content = htmlspecialchars($_POST['content']);

            $query = $database->prepare('INSERT INTO comments (`user_id`, `user_nickname`, `content`, `articles_id`) VALUES (:user_id, :user_nickname, :content, :article_id)');

            $query->bindValue(':user_id', $userId, PDO::PARAM_INT);
            $query->bindValue(':user_nickname', $userNickname, PDO::PARAM_STR);
            $query->bindValue(':content', $content, PDO::PARAM_STR);
            $query->bindValue(':article_id', $getIdArticle, PDO::PARAM_INT);

            $query->execute();
            $comments = $query->fetchAll(PDO::FETCH_ASSOC);
            $msg = "<span style='color:green'>Votre commentaire a bien été posté</span>";
            
        } 
        else 
        {
            $msg = "Erreur: Tous les champs doivent être complétés";
        }
    }
        $comments = $database->prepare('SELECT * FROM comments WHERE articles_id = ? ORDER BY comments.id DESC;');
        $comments->execute([$getIdArticle]);
        $comments = $comments->fetchAll(PDO::FETCH_ASSOC);

?>

<section class="comment">
    <div class="comment__container">
        <h2>Exprimez vous !</h2>
        <form method="POST">
            <?php if(isset($msg)) 
            {
                echo $msg; 
            } ?>
            <input type="hidden" id="nickname" name="nickname" value="<?= htmlspecialchars($_SESSION['nickname']); ?>"> Votre pseudo: <?= htmlspecialchars($_SESSION['nickname']); ?>
            <textarea name="content" placeholder="Votre commentaire..."></textarea>
            <input type="submit" value="Poster mon commentaire" name="submit_comment" />
        </form>

        <?php foreach($comments as $comment) { ?>
            <div class="comment_posted">
                <p>
                    <?= $comment['user_nickname']; ?>
                    <?php 
                        $formDate = strtotime($comment['created_at']); ?>
                        Envoyé le : <?= date("d-m-Y", $formDate) . " à " . date("H:i", $formDate); ?>
                </p>
                <?= $comment['content']; ?>
            </div>
        <?php } ?>
    </div>  
</section>
<?php } ?>