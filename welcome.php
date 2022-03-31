<?php include "_partials/header.php" ?>


<?php
// Initialize the session
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 

    <h1 class="my-5">Ahoj <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b> !</h1>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Změna hesla</a>
        <a href="_inc/logout.php" class="btn btn-danger ml-3">Odhlásit se</a>
    </p>



<section></section>

<?php include "_partials/footer.php" ?>