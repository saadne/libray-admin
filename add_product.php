<?php
    include('config.php');
    echo "111111111";
    if(isset($_POST['submit'])){
        $nomLivre = mysqli_real_escape_string($conn, $_POST['nomLivre']);
        $auteur = mysqli_real_escape_string($conn, $_POST['auteur']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $prix = mysqli_real_escape_string($conn, $_POST['prix']);
        $image_name = $_FILES["image_name"]["name"]; 
        $categoryId = mysqli_real_escape_string($conn, $_POST['categoryId']);
        $tempname = $_FILES["image_name"]["tmp_name"]; 
        $folder = "images/".$image_name;
        echo "222222222";
        move_uploaded_file($tempname, $folder);
        echo "33333333";
        $sql = "INSERT INTO produit(nomLivre, auteur,description,prix,image_name,categoryId)
        VALUES('$nomLivre','$auteur','$description','$prix','$image_name','$categoryId')";
        echo "4444444";
        if(mysqli_query($conn,$sql)){
            header('Location: products.php');
            echo "666666";
        }else{
            echo "query error:" . mysqli_error($conn);
        }
    }
    echo "555555";
    $sql = "SELECT categoryId FROM category";
    $result = mysqli_query($conn, $sql);
    // afficher les donnees sous form de list
    $categorys = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // free result from memory
    mysqli_free_result($result);
    // close connection
    mysqli_close($conn);
?>

<html>
    <?php include('templates/header.php')?>
    <div class="container">
        <h1 class="big-text" >Ajouter Produit</h1>
        <form action="add_product.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label style="font-size:1.5rem" for="exampleInputEmail1">Nom de Livre</label>
            <input style="height:4rem;margin-bottom:1.5rem" name="nomLivre" type="text" class="form-control"aria-describedby="emailHelp" placeholder="Entrer Nom de livre">
        </div>
        <div class="form-group">
            <label style="font-size:1.5rem" for="exampleInputEmail1">Auteur</label>
            <input style="height:4rem;margin-bottom:1.5rem"  name="auteur" type="text" class="form-control"  placeholder="Entrer L'auteur">
        </div>
        <div class="form-group">
            <label style="font-size:1.5rem" for="exampleInputEmail1">Prix</label>
            <input style="height:4rem;margin-bottom:1.5rem"  name="prix" type="number" class="form-control" placeholder="Entrer le Prix">
        </div>
        <div class="form-group">
            <label style="font-size:1.5rem" for="exampleInputEmail1">Description</label>
            <input style="height:4rem;margin-bottom:1.5rem"  name="description" type="text" class="form-control" placeholder="Entrer la Description">
        </div>
        <div class="form-group">
            <label style="font-size:1.5rem" for="exampleInputEmail1">Image</label>
            <input style="height:4rem;margin-bottom:1.5rem"  name="image_name" type="file" class="form-control" placeholder="Entrer Date de Naissance">
        </div>
        <div class="form-group">
            <label style="font-size:1.5rem;" for="exampleInputEmail1">Nom de Category</label>
            <select style="font-size:1.5rem;margin-bottom:1.5rem" class="form-select" aria-label="Default select example">
            <?php foreach($categorys as $category){?>           
                    <option name="categoryId" value="<?php echo intval($category['categoryId']);?>">
                    <?php echo intval($category['categotyId']);?></option>
            <?php }?> 
            </select>
        </div>
        <button style="font-size:2rem" type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>   
    <script src="app.js"></script>  
</html>
    

