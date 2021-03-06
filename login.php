<?php include "_partials/header-login.php" ?>

<?php
// Initialize the session

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: welcome.php");
    exit;
}



// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";


// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Vyplň uživatelské jméno";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Vyplň heslo";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            if (!isset($_SESSION)) {
                                session_start();
                            }

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else {
                            // Password is not valid, display a generic error message
                            $login_err = "Neplatné jméno, nebo heslo";
                        }
                    }
                } else {
                    // Username doesn't exist, display a generic error message
                    $login_err = "Neplatné jméno, nebo heslo";
                }
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



<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container">

        <div class="section-title">
            <h2>Přihlášení</h2>
            <p>Vyplň níže svoje přihlašovací údaje. Pokud ještě nemáš svůj myBike účet, tak si ho můžeš
                <a href="register.php">zaregistrovat.</a>
            </p>
            <p>Pokud jsi zapomněl heslo, tak mě prosím kontaktuj na mailu: nesquick.true@gmail.com. Automatická obnova hesla je zatím ve vývoji.</p>
        </div>


        <?php
        // Přicházím z registrace? Ano -> doplň uživatelské jméno a hlášku
        if (isset($_GET['status'])) {
            switch ($_GET['status']) {
                case 'ok':
                    echo '<div class="registration_message">
                            Registrace proběhla v pořádku, nyní se můžeš přihlásit
                            </div>';
                    if (isset($_GET['user'])) {
                        $username = $_GET['user'];
                    }
                    // prostor pro další statusy
                default:
                    break;
            }
        }
        ?>

        <div class="login-form">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" role="form" class="php-email-form">

                <div class="form-group mt-3">
                    <label>Uživatelské jméno</label>
                    <input type="text" class="form-control" name="username" id="subject" <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?> value="<?php echo $username; ?>" required>
                    <span class="invalid-feedback"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group mt-3">
                    <label>Heslo</label>
                    <input type="password" name="password" class="form-control" <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?> required>
                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                </div>
                <div class="my-3">
                    <?php
                    if (!empty($login_err)) {
                        echo '<div class="invalid" style="background-color:#e46363;color:#fff;text-align:center">' . $login_err . '</div>';
                    }
                    ?>
                </div>
                <div class="text-center mb-2">
                    <button id="btn-login" type="submit">Přihlásit se</button>
                </div>
                <p>Ještě nemáš účet?<a href="register.php"> Registruj se tady</a>.</p>
            </form>
        </div>

    </div>
</section><!-- End Contact Section -->



<?php include "_partials/footer.php" ?>