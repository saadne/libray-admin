<?php 
    include('config.php');
    $sql = "SELECT * FROM produit";
    $result = mysqli_query($conn, $sql);
    $produits = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if(isset($_POST['delete'])){
        $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
        $sql_delete = "DELETE FROM produit WHERE produitId = $id_to_delete";

        if(mysqli_query($conn, $sql_delete)){
            header('Location: products.php');
        }else{
            echo "query error" . mysqli_error($conn);
        }
    }

?>
<html>
    <style>
        .buttons{
            display:flex;
        }
        .buttons .btn{
            margin-right:1rem;
        }
    </style>
    <?php include('./templates/header.php')?>
    <div class="container">
        <h1>List Des Produits</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom Livre</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Category</th>
                    <th scope="col">Operations</th>
                    <th scope="col">
                        <a href="add_product.php">
                            <button class="btn btn-warning">Ajouter</button>
                        </a>
                    </th>

                </tr>
            </thead>
            <tbody>
                <?php foreach($produits as $produit):  ?>
                <tr>
                    <th scope="row"><?php echo $produit['produitId'] ?></th>
                    <td><?php echo $produit['nomLivre'] ?></td>
                    <td><?php echo $produit['auteur'] ?></td>
                    <td><?php echo $produit['prix'] ?></td>
                    <td><?php echo $produit['description'] ?></td>
                    <td><?php echo $produit['image_name'] ?></td>
                    <td><?php echo $produit['categoryId'] ?></td>
                    <td>
                        <div class="buttons">
                            <a href="#"><button class="btn btn-info">Modifier</button></a>
                            <form action="clients.php" method="POST">
                                <input type="hidden" name="id_to_delete" value="<?php echo $produit['produitId'] ?>">
                                <button type="submit" name="delete" value="delete" class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</html>