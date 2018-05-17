<?php 
    require_once "user.php";
    if(!isset($admin)) {
        header("Location: signin_admin.php");
        exit;
    }
    require_once "db.php"; 
    include_once "admin_crud.php";
?>  
<!DOCTYPE html>
<html>
<head>
    <?php include 'default_head.php' ?>    
    <title>GGWP | Admin Panel</title>

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.js"></script>
    <!-- Number Format -->
    <script src="plugins/number-format/jquery.number.js"></script>

    <!--<script src="scripts/product_manager.js"></script>-->
    <link rel="stylesheet" href="styles/admin.css">
</head>

<body>
    <?php include 'header.php' ?>
    
    <div class="container">
        <?php
            if (isset($_SESSION["error"])) {
        ?>
            <div class="form-group">
                <div class="alert alert-danger">
                    <?php 
                        echo $_SESSION["error"]; 
                        unset($_SESSION["error"]);
                    ?>
                </div>
            </div>
        <?php
            }
        ?>
        <h2>Manage Product</h2>
        <a href="product_manage.php">
            <button class="btn btn-primary ml-3 mb-3">+ Add Product</button>
        </a>
        <table id="productsTable" class="table table-dark table-striped table-hover table-bordered">
            <thead>
                <tr>    
                    <th>No</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sql = "SELECT id, name, brand, category, price FROM products";
                    $query = $db->query($sql);
                    if($query->num_rows > 0) {
                        $i = 0;
                        while($row = $query->fetch_assoc()) {
                            $id = $row["id"];
                ?>
                
                <tr>
                    <td><?= ++$i ?></td>    
                    <td><?= $row["name"] ?></td>
                    <td><?= $row["brand"] ?></td>
                    <td><?= $row["category"] ?></td>
                    <td class="price"><?= $row["price"] ?></td>
                    <td>
                        <form method="POST" action="product_manage.php">
                            <input type="hidden" name="id" value=<?="'$id'"?>>    
                            <button type="submit" name="update" class="btn btn-warning"><i class="fa fa-pencil-square" aria-hidden="true"></i></button>
                        </form>
                        <form method="POST">
                            <input type="hidden" name="id" value=<?="'$id'"?>>
                            <button type="submit" name="delete" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                    </td>
                </tr>

                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
        <h2 class="mt-5">View Messages</h2>
        <table id="messagesTable" class="table table-dark table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>No</th>    
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sql = "SELECT id, name, email, subject, message FROM messages";
                    $query = $db->query($sql);
                    if($query->num_rows > 0) {
                        $i = 0;
                        while($row = $query->fetch_assoc()) {
                            $id = $row["id"];
                ?>
                
                <tr>
                    <td><?= ++$i ?></td>        
                    <td><?= $row["name"] ?></td>
                    <td><?= $row["email"] ?></td>
                    <td><?= $row["subject"] ?></td>
                    <td><?= $row["message"] ?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="msgId" value=<?="'$id'"?>>
                            <button type="submit" name="msgDelete" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                    </td>
                </tr>

                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
    <?php include 'footer.php' ?>
    <script>
        $(document).ready(function() {
            $("table.table").DataTable();
            $(".price").each(function(i, p) {
                $(p).text("Rp " + $.number($(p).text(), 0, ',', '.') + ",-");
            });
        });
    </script>
</body>

</html>