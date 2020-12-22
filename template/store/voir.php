<?php 

    $product = $response['data'];

?>
    <p>
        <a href="?ctrl=store">&larr; Retour à la liste</a>
    </p>

    <article>
        <h1><?= $product->getName() ?></h1>
        <p>Meowwwwwwwwwwwwwwwwwwwww</p>

        <p>
            <?= $product->getPrice(true) ?>&nbsp;€
        </p>

        <p>
            <a href="">Ajouter au panier</a>

        </p>

    </article>