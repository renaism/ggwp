<?php require_once "user.php"; ?>
<div id="topNavbar" class="fixed-top">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">
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
                        if(isset($username)) {
                    ?>
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle text-white" data-toggle="dropdown" role="button" aria-haspopup="true"aria-expanded="false">
                                <i class="fa fa-user"></i>&nbsp;<?php echo $username; ?>
                                </a>
                                <ul class="dropdown-menu bg-dark pl-2">
                                    <?php if(isset($admin)) { ?>
                                        <li><a href="admin.php">Admin Panel</a></li>
                                    <?php } else { ?>
                                        <li><a href="profile.php">Profile</a></li>
                                    <?php } ?>
                                    <li><a href="signout.php">Sign out</a></li>
                                </ul>
                            </div>
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