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

    <script src="scripts/product_manager.js"></script>
    <link rel="stylesheet" href="styles/product_manager.css">
</head>

<body>
    <?php include 'header.php' ?>
    
    <div class="container">
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
                        <form method="POST" action="product_crud.php">
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
        <h2>View Messages</h2>
        <table id="messagesTable" class="table table-dark table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>No</th>    
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Subject</th>
                    <th>Message</th>
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
                        <form method="POST" action="message_crud.php">
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
    </div>
    <?php include 'footer.php' ?>
    <script>
        $(document).ready(function() {
            $('#productsTable').DataTable();
            $('#messagesTable').DataTable();
        });
    </script>
</body>

</html>