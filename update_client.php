<?php
    include('config.php');
    $result = mysqli_query($conn, "SELECT * FROM client WHERE id = '" . $_GET['id'] . "'");
    $data = mysqli_fetch_array($result);
    $id=$_GET['id'];
    echo $id;
    if(count($_POST)>0){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $adress = mysqli_real_escape_string($conn, $_POST['adress']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $sex = mysqli_real_escape_string($conn, $_POST['sex']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        echo $username;
        $query = "UPDATE client SET username= '$username', adress='$adress',
            date='$date',sex='$sex',password='$password'
            WHERE id= '" . $_GET['id'] . "'";
        if(mysqli_query($conn,$query)){
            header("Location: clients.php");
        }else{
            echo "Erreur";
        }  
    }
  


        
?>

<html>
    <?php include('templates/header.php')?>
    <div class="center">
        <h1 class="big-text">Modifier l'annonce</h1>
            <form action="update_client.php" method="POST">
        <div class="form-group">
            <label style="font-size:1.5rem" for="exampleInputEmail1">Username</label>
            <input value="<?php echo $data['username'];  ?>" style="height:4rem;margin-bottom:1.5rem"  name="username" type="text" class="form-control"aria-describedby="emailHelp" placeholder="Entrer Nom d'utilisateur">
    
        </div>
        <div class="form-group">
            <label style="font-size:1.5rem" for="exampleInputEmail1">Adress</label>
            <input  style="height:4rem;margin-bottom:1.5rem"  name="adress" type="text" class="form-control" value="<?php echo $data['adress'];  ?>"  placeholder="Entrer Adresse">
            
        </div>
        <div class="form-group">
            <label style="font-size:1rem" for="exampleInputEmail1">Date de Naissance</label>
            <input value="<?php echo $data['date'];  ?>" style="height:4rem;margin-bottom:1.5rem"  name="date" type="date" class="form-control" placeholder="Entrer Date de Naissance">
            
        </div>
        <div class="form-check">
        <input style="font-size:1rem; " class="form-check-input"  value="1" name="sex" type="radio" <?php if($data['sex'] == 1) { ?> checked  <?php } ?>>
        <label style="font-size:1rem;" class="form-check-label" for="flexRadioDefault1">
            Male
        </label>
        </div>
        <div class="form-check">
        <input style="font-size:1rem" class="form-check-input" value="0" name="sex" type="radio" <?php if($data['sex'] == 0) { ?> checked  <?php } ?>>
        <label style="font-size:1.rem" class="form-check-label" for="flexRadioDefault2" >
            Femmele
        </label>
        </div>
        <div class="form-group">
            <label style="font-size:1.5rem" for="exampleInputPassword1">Password</label>
            <input value="<?php echo $data['password'];  ?>" style="height:4rem;margin-bottom:2rem" type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button style="font-size:2rem" type="submit" name="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>

    <script src="app.js"></script>  
    
</html>