<?php
        
    include('config.php');
    $result = mysqli_query($conn, "SELECT * FROM category WHERE categoryId = '" . $_GET['id'] . "'");
    $data = mysqli_fetch_array($result);
    $id=$_GET['id'];
    if(count($_POST)>0){
        $parentCategoryId = mysqli_real_escape_string($conn, $_POST['parentCategoryId']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $query = "UPDATE client SET parentCategoryId= '$parentCategoryId', name='$name',
            description='$description'
            WHERE categoryId= '" . $_GET['id'] . "'";
        if(mysqli_query($conn,$query)){
            header("Location: categorys.php" );
        }
        
    }
  
    $result = mysqli_query($conn, "SELECT * FROM category WHERE categoryId = '" . $_GET['id'] . "'");
    $data = mysqli_fetch_array($result);

    // $sql1 = "SELECT id FROM client";
    // $result1 = mysqli_query($conn, $sql1);
    
    // // afficher les donnees sous form de list

    // $personnes = mysqli_fetch_all($result1, MYSQLI_ASSOC);

    // // free result from memory
    // mysqli_free_result($result1);
        
?>

<html>
    <?php include('templates/header.php')?>
    <div class="center">
        <h1 class="big-text">Modifier l'annonce</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label  style="font-size:1.5rem" for="exampleInputEmail1">Nom</label>
                <input value="<?php echo $data['name'];  ?>" style="height:4rem;margin-bottom:1.5rem" name="name" type="text" class="form-control"aria-describedby="emailHelp" placeholder="Entrer le Nom de la Gategory">
            </div>
            <div class="form-group">
                <label style="font-size:1.5rem" for="exampleInputEmail1">Parent Category Id</label>
                <input value="<?php echo $data['parentCategoryId'];  ?>" style="height:4rem;margin-bottom:1.5rem"  name="parentCategoryId" type="number" class="form-control"  placeholder="Entrer Parent Category Id">
            </div>
            <div class="form-group">
                <label style="font-size:1rem" for="exampleInputEmail1">Description</label>
                <input value="<?php echo $data['description'];  ?>" style="height:4rem;margin-bottom:1.5rem"  name="description" type="text" class="form-control" placeholder="Entrer la Description">
            </div>
            <button style="font-size:2rem" type="submit" name="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>

    <script src="app.js"></script>  
    
</html>