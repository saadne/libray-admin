<?php 
    include('config.php');
    $sql = "SELECT * FROM client";
    $result = mysqli_query($conn, $sql);
    $clients = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if(isset($_POST['delete'])){
        $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
        $sql_delete = "DELETE FROM client WHERE id = $id_to_delete";

        if(mysqli_query($conn, $sql_delete)){
            header('Location: clients.php');
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
        <h1>List Des Clients</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Adress</th>
                    <th scope="col">Date</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Operations</th>
                    <th scope="col">
                        <a href="add_client.php">
                            <button class="btn btn-warning">Ajouter</button>
                        </a>
                    </th>

                </tr>
            </thead>
            <tbody>
                <?php foreach($clients as $client):  ?>
                <tr>
                    <th scope="row"><?php echo $client['id'] ?></th>
                    <td><?php echo $client['username'] ?></td>
                    <td><?php echo $client['adress'] ?></td>
                    <td><?php echo $client['date'] ?></td>
                    <?php if($client['sex'] == 1) { ?>
                    <td>Male</td>
                    <?php }else { ?>
                    <td>Femmele</td>
                    <?php }?>
                    <td>
                        <div class="buttons">
                            <a href="update_client.php?id=<?php echo $client['id'];?>"><button class="btn btn-info">Modifier</button></a>
                            <form action="clients.php" method="POST">
                                <input type="hidden" name="id_to_delete" value="<?php echo $client['id'] ?>">
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