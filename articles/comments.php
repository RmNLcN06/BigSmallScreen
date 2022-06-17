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
        $comments = $database->prepare('SELECT * FROM comments WHERE articles_id = ? ORDER BY comments.id;');
        $comments->execute([$getIdArticle]);


// 1ère Etape
// Position de l'utilisateur (sur quelle page se trouve-t'il ?)
// S'il la page existe et qu'elle n'est pas vide

if(isset($_GET['numCommentPages']) && !empty($_GET['numCommentPages']))
{
    // On supprime les balises HTML et PHP de la chaîne avec strip_tags
    $currentCommentPage = (int) strip_tags($_GET['numCommentPages']);
}
else
{
    $currentCommentPage = 1;
}


// Connexion à la base de donnée
require_once('req/_connect.php');

// Nombre total d'articles en base de données
$commentAmount = "SELECT count(*) AS comment_amount FROM `comments` WHERE articles_id = $getIdArticle";

// Préparation de la requête
$request = $database->prepare($commentAmount);

// Exécution de la requête
$request->execute();

// Récupération du nombre d'articles dans la base de données
$result = $request->fetch();

$nbrComment = (int) $result['comment_amount'];

// Combien d'articles par page ?
$commentsPerPage = 5;

// Nombre de pages totales pour afficher tous les articles
$nbrPages = ceil($nbrComment / $commentsPerPage);

// Premier article pour la première page
// $firstArticle = ($currentPage * $articlesPerPage) - $articlesPerPage;
$firstComment = ($currentCommentPage - 1) * $commentsPerPage;


// 2ème Etape
// Sélectionne tous les articles en base de données et on les affiche 
// par date de création décroissante en limitant l'affichage entre le premier 
// article et le nombre d'article par page
$commentAmount = "SELECT * FROM comments WHERE articles_id = $getIdArticle ORDER BY comments.id DESC LIMIT :firstcomment, :commentsperpage";

// Préparation de la requête
$request = $database->prepare($commentAmount);

$request->bindValue(':commentsperpage', $commentsPerPage, PDO::PARAM_INT);
$request->bindValue(':firstcomment', $firstComment, PDO::PARAM_INT);


// Exécution de la requête
$request->execute();

// Récupération du résultat dans un tableau associatif
$comments = $request->fetchAll(PDO::FETCH_ASSOC);

?>

<section class="comment">
    <div class="comment__container">
        <h2>Exprimez vous !</h2>
        <form method="POST">
            <?php if(isset($msg)) 
            {
                echo $msg; 
            } ?>
            <input type="hidden" id="nickname" name="nickname" value="<?= htmlspecialchars($_SESSION['nickname']); ?>"> 
            <p>Votre pseudo: <?= htmlspecialchars($_SESSION['nickname']); ?></p>
            <textarea name="content" placeholder="Votre message" rows="10"></textarea>
            <input class="btn" type="submit" value="Envoyer" name="submit_comment" />
        </form>

        <h2>Commentaires</h2>
        <?php foreach($comments as $comment) { ?>
            <div class="comment__posted">
                <div class="comment__informations">
                    <h4>
                        <?= $comment['user_nickname']; ?> -
                    </h4>
                    <p>
                        <?php $formDate = strtotime($comment['created_at']); ?>
                        <?= date("d-m-Y", $formDate) . " à " . date("H:i", $formDate); ?>
                    </p>
                </div>
                <div class="comment__message">
                    <?= $comment['content']; ?>
                </div>
            </div>
        <?php } ?>

        <nav class="page">
            <ul class="page__list">
                <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                <?php if($currentCommentPage > 1) { ?>
                    <li class="page__list--item">
                        <a href="./?page=<?= $_GET['page']; ?>&id=<?= $getIdArticle; ?>&numCommentPages=<?= $currentCommentPage - 1 ?>" class="item-link"><i class="fa-solid fa-chevron-left"></i></a>
                    </li>
                <?php } ?>
                
                <?php for($i = 1; $i <= $nbrPages; $i++) { ?>
                <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                <li class="page__list--item <?= ($currentCommentPage == $i) ? "active" : "" ?>">
                    <a href="./?page=<?= $_GET['page']; ?>&id=<?= $getIdArticle; ?>&numCommentPages=<?= $i ?>" class="item-link"><?= $i ?></a>
                </li>
                <?php } ?>


                <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                <?php if($currentCommentPage < $nbrPages) { ?>
                <li class="page__list--item">
                    <a href="./?page=<?= $_GET['page']; ?>&id=<?= $getIdArticle; ?>&numCommentPages=<?= $currentCommentPage + 1 ?>" class="item-link"><i class="fa-solid fa-chevron-right"></i></a>
                </li>
                <?php } ?>
            </ul>
        </nav>
    </div>  
</section>
<?php } ?>