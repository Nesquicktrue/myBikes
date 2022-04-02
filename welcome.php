<?php include "_partials/header.php" ?>
<?php include "_partials/check-login.php" ?>


<?php
// Initialize the session
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
 
?>
 

    <h1 class="my-5">Ahoj <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b> !</h1>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Změna hesla</a>
        <a href="_inc/logout.php" class="btn btn-danger ml-3">Odhlásit se</a>
    </p>
    <p>
        <?php
        print_r($_SESSION);
        ?>
    </p>



<section></section>

<?php include "_partials/footer.php" ?>