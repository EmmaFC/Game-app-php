<?php

    require "../../../app/config/db.php";
    require "../../../app/Controllers/UserController.php";
    
    $conn = mysqli_connect("localhost", "root", "", "support-crud-app") or die("Connection failed");
    
    
    if (isset($_POST["delete"])) 
    {
        $conn = mysqli_connect("localhost", "root", "", "support-crud-app") or die("Connection failed");
        $id = mysqli_real_escape_string($conn, $_POST["user_id"]);
        
        /*       
        $name = mysqli_real_escape_string($conn, $_POST["user_name"]);
        $email = mysqli_real_escape_string($conn, $_POST["user_email"]);
        $password = mysqli_real_escape_string($conn, $_POST["user_password"]); */
        
        $user = $user_controller->delete($id);
        $root = $db_connection->redirect();
        header("Location: " . $root ."/src/views/users/index.php?id=". $id);

    }
    
    $id = isset($_GET['id']) ? $_GET['id'] : 'error getting id';
    $user = $user_controller->show($id);

?>


<!DOCTYPE html>
<html lang="en">
    <?php require "../components/head.php"; ?>
    <body><!--  -->
    <header id="header">
            <div id="header-container">
                <div id="logo_container">
                <a href="http://localhost/game-app-php">
                        <h3>Request Center</h3>
                    </a>
                </div>
                <nav id="nav_menu">
                    <a class="btn" href="../../src/Views/user/show.php?id= <?php /* echo $user["id"] */ ?>">Mi Perfil</a>
                    <a class="btn" href="http://localhost/game-app-php">Logout</a>
                </nav>
            </div>    
        </header>        <main>
            <section>
                <div class="container">
                    <h1>Nombre : <?php echo $user["user_name"] ?></h1>
                    <p>Email : <?php echo $user["user_email"] ?></p>
                    <p>Contraseña : <?php echo $user["user_password"]?></p>
                </div>
                <a class="btn"  href="update.php?id=<?php echo $user["user_id"]?>">Editar Usuario</a>
                <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                    <input type="hidden" name="user_id" value="<?php echo $user["user_id"]?>">
                    <input class="btn" type="submit" name="delete" value="Eliminar">
                </form>
                <a class="btn" href="index.php">Volver</a>
            </section>
        </main>
        <?php require "../components/footer.php"; ?>
    </body>
</html>




