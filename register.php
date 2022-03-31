<?php include "_partials/header-login.php" ?>

<?php
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Prosím zadejte uživatelské jméno";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
        $username_err = "Uživaterlské jméno může obsahovat pouze písmena, číslice a podtržítko";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "Tohle jméno už ti někdo zabral :-/";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Shit! Něco se nepovedlo, zkusíš to znovu?";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Zadej heslo";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Dej si do hesla alespoň 6 znaků";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Potvrď heslo";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Hesla nesouhlasí :-/";
        }
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: login.php");
            } else {
                echo "Shit! Něco se nepovedlo, zkusíš to znovu?";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>

<section id="contact" class="contact">

    <div class="container">
        <div class="section-title">
            <h2>Registrace uživatele</h2>
            <p>Pro založení účtu vyplň prosím formulář níže.</p>
        </div>

        <div class="login-form">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="php-email-form">
                <div class="form-group mt-3">
                    <label>Uživatelské jméno</label>
                    <input id="subject" type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" required>
                    <span class="invalid-feedback"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group mt-3">
                    <label>Heslo</label>
                    <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" required>
                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group mt-3">
                    <label>Potvrď heslo</label>
                    <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>" required>
                    <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                </div>
                <div class="text-center mb-2">
                    <button type="submit" class="m-2" id="btn-login">Registrovat se</button>
                </div>
                <p>Už máš účet?<a href="login.php"> Přihlaš se tady</a>.</p>
            </form>
        </div>
    </div>
</section>


<?php include "_partials/footer.php" ?>