<?php 
    include('./templates/header.php');
    include('config.php');
        
    if(isset($_POST['submit'])){
        $parentCategotyId = mysqli_real_escape_string($conn, $_POST['parentCategoryId']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $sql = "INSERT INTO category(parentCategoryId, name,description)
        VALUES('$parentCategotyId','$name','$description')";
        if(mysqli_query($conn,$sql)){
            header('Location: categorys.php');
        }else{
            echo "query error:" . mysqli_error($conn);
        }
    }

?>
<html>
    <?php include('templates/header.php')?>
    <div class="container">
        <h1 class="big-text" >Ajouter Category</h1>
<form action="add_category.php" method="POST">
  <div class="form-group">
    <label style="font-size:1.5rem" for="exampleInputEmail1">Nom</label>
    <input style="height:4rem;margin-bottom:1.5rem" name="name" type="text" class="form-control"aria-describedby="emailHelp" placeholder="Entrer le Nom de la Gategory">
  </div>
  <div class="form-group">
    <label style="font-size:1.5rem" for="exampleInputEmail1">Parent Category Id</label>
    <input style="height:4rem;margin-bottom:1.5rem"  name="parentCategoryId" type="number" class="form-control"  placeholder="Entrer Parent Category Id">
  </div>
  <div class="form-group">
    <label style="font-size:1rem" for="exampleInputEmail1">Description</label>
    <input style="height:4rem;margin-bottom:1.5rem"  name="description" type="text" class="form-control" placeholder="Entrer la Description">
  </div>
  <button style="font-size:2rem" type="submit" name="submit" class="btn btn-primary">Ajouter</button>
</form>
    </div>
    <script src="app.js"></script>  
    
</html>
    </div>

</html>