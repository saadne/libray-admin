<?php 
    include('./templates/header.php');
    include('config.php');
    
    
    if(isset($_POST['submit'])){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $adress = mysqli_real_escape_string($conn, $_POST['adress']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $sex = mysqli_real_escape_string($conn, $_POST['sex']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $sql = "INSERT INTO client(username, adress,date,sex,password)
         VALUES('$username','$adress','$date','$sex','$password')";
        if(mysqli_query($conn,$sql)){
            header('Location: index.php');
        
        }else{
            echo "query error:" . mysqli_error($conn);
        }
    }
    
?>


<html>
    <?php include('templates/header.php')?>
    <div class="container">
        <h1 class="big-text" >Register</h1>
<form action="add_client.php" method="POST">
  <div class="form-group">
    <label style="font-size:1.5rem" for="exampleInputEmail1">Username</label>
    <input style="height:4rem;margin-bottom:1.5rem" name="username" type="text" class="form-control"aria-describedby="emailHelp" placeholder="Entrer Nom d'utilisateur">
    
  </div>
  <div class="form-group">
    <label style="font-size:1.5rem" for="exampleInputEmail1">Adress</label>
    <input style="height:4rem;margin-bottom:1.5rem"  name="adress" type="text" class="form-control"  placeholder="Entrer Adresse">
    
  </div>
  <div class="form-group">
    <label style="font-size:1rem" for="exampleInputEmail1">Date de Naissance</label>
    <input style="height:4rem;margin-bottom:1.5rem"  name="date" type="date" class="form-control" placeholder="Entrer Date de Naissance">
    
  </div>
  <div class="form-check">
  <input style="font-size:1rem; " class="form-check-input" value="1" name="sex" type="radio" >
  <label style="font-size:1rem;" class="form-check-label" for="flexRadioDefault1">
    Male
  </label>
</div>
<div class="form-check">
  <input style="font-size:1rem" class="form-check-input" value="0" name="sex" type="radio">
  <label style="font-size:1.rem" class="form-check-label" for="flexRadioDefault2" >
    Femmele
  </label>
</div>
  <div class="form-group">
    <label style="font-size:1.5rem" for="exampleInputPassword1">Password</label>
    <input style="height:4rem;margin-bottom:2rem" type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button style="font-size:2rem" type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
    <script src="app.js"></script>  
    
</html>
    </div>

</html>