<?php 
// connecter sur base de donnee
$conn = mysqli_connect('localhost', 'root', '', 'library');
// validation de connection
if(!$conn){
    echo "Connection Erreur: " . mysqli_connect_error();
}else{
    // echo "Connect";
}
?>