<div id="topNavbar" class="fixed-top">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">
                    <img src="images/logo-navbar-40px.png">
                </a>
            </div>
            <ul class="nav justify-content-center" id="menuNavbar">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products.php">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contacts.php">Contacts</a>
                </li>
            </ul>
            <ul class="nav justify-content-right">
                <li class="nav-item" id="loggedUser">
                    <?php 
                        session_start();
                        if(isset($_SESSION["username"])) {
                            echo "Welcome, ". $_SESSION["username"]. ". ";
                    ?>
                            <a class="nav-link" href="signout.php"><i class="fa fa-user"></i> Sign-out</a>
                    <?php
                        }
                        else {
                    ?>
                            <a class="nav-link" href="signin.php"><i class="fa fa-user"></i> Sign-in</a>
                    <?php
                        }
                    ?>
                </li>
            </ul>
        </div>
    </nav>
</div>