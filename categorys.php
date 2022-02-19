<?php 
    include('config.php');
    $sql = "SELECT * FROM category";
    $result = mysqli_query($conn, $sql);
    $categorys = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if(isset($_POST['delete'])){
        $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
        $sql_delete = "DELETE FROM category WHERE id = $id_to_delete";

        if(mysqli_query($conn, $sql_delete)){
            header('Location: categorys.php');
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
        <h1>List Des Categorys</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Parent Categoty</th>
                    <th scope="col">Description</th>
                    <th scope="col">Operations</th>
                    <th scope="col">
                        <a href="add_category.php">
                            <button class="btn btn-warning">Ajouter</button>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($categorys as $category):  ?>
                <tr>
                    <th scope="row"><?php echo $category['categoryId'] ?></th>
                    <td><?php echo $category['name'] ?></td>
                    <td><?php echo $category['parentCategoryId'] ?></td>
                    <td><?php echo $category['description'] ?></td>
                    <td>
                        <div class="buttons">
                            <a href="update_category.php?id=<?php echo $category['categoryId'];?>"><button class="btn btn-info">Modifier</button></a>
                            <form action="categorys.php" method="POST">
                                <input type="hidden" name="id_to_delete" value="<?php echo $category['categoryId'] ?>">
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