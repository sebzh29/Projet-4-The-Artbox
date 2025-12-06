<?php
    require 'header.php';   

// Connexion a la BDD
    require 'bdd.php';
    $db = connectDB();

// Récupération des oeuvres depuis le serveur BDD    
    $stmt = $db->prepare("SELECT * FROM oeuvres");
    $stmt->execute();
    $oeuvres = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div id="liste-oeuvres">
    <?php foreach($oeuvres as $oeuvre): ?>
        <article class="oeuvre">
            <a href="oeuvre.php?id=<?= $oeuvre['id'] ?>">
                <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['titre'] ?>">
                <h2><?= $oeuvre['titre'] ?></h2>
                <p class="description"><?= $oeuvre['artiste'] ?></p>
            </a>
        </article>
    <?php endforeach; ?>
</div>   
    
<?php require 'footer.php'; ?>
