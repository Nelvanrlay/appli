<?php
    $products = $response["data"];
?>    
    
    <h1>PANEL ADMIN</h1>
    <p>
        <a href="?ctrl=admin&action=add">Ajouter un produit</a>
    </p>
        <table>
            <thead>
                <tr>
                    <th>NOM</th>
                    <th>PRIX</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                
                    foreach($products as $product): ?>
                    <div class="product">
                        <tr>
                            <td><?= $product->getName() ?></ts>
                            <td><?= $product->getPrice(true) ?>¥</td>
                            <td><a onclick="getConfirm(<?= $product->getId() ?>)" href='#'>Supprimer</a></td>
                        <tr>
                    </div>
            
                <?php endforeach; ?>
            </tbody>
        </table>

        <script type="text/javascript">
            function getConfirm(id){
                let choice = confirm("Etes-vous sur ?");
                if (choice == true) {
                    location.replace('?ctrl=admin&action=delete&id=' + id);
                } else {

                }
            }
        </script>
