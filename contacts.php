<!DOCTYPE html>
<html>

<head>
    <?php include 'default_head.php' ?>
    <title>GGWP | Contact Us</title>
    <link rel="stylesheet" href="styles/contacts.css">
</head>

<body>
    <?php include 'header.php' ?>
    <div class="row">
        <img class="bg1" src="images/contacts/bg1.jpg">
    </div>
    <div class="container mt-5 mb-5">
        <div class="row">
            <!--Konten-->
            <div class="col-lg-5">
                <!--Konten Kiri-->
                <div class="row">
                    <h3>
                        <u>Location</u>
                    </h3>
                </div>
                <div class="row">
                    Komplek. Pengkolan No.60 Banjaran
                    <br> Kab Bandung, Jawa Barat, Indonesia
                </div>
                <br>
                <br>
                <div class="row">
                    <h3>
                        <u>Contact Person</u>
                    </h3>
                </div>
                <div class="row">
                    <h4>Bayu</h4>
                </div>
                <div class="row">
                    Mobile Phone : +6289652703833
                </div>
                <div class="row">
                    WhatsApp: +6289652703833
                </div>
                <div class="row">
                    Line : @BayuGanteng
                </div>
                <br>
                <br>
                <div class="row">
                    <h3>
                        <u>Reseller Inquiries</u>
                    </h3>
                </div>
                <div class="row">
                    <a href="#">reseller@ggwp-store.telkomuniversity.ac.id</a>
                </div>
                <br>
                <br>
                <div class="row">
                    <h3>
                        <u>Warranty & RMA Services</u>
                    </h3>
                </div>
                <div class="row">
                    <a href="#">rma@ggwp-store.telkomuniversity.ac.id</a>
                </div>
                <br>
                <br>
                <div class="row">
                    <h3>
                        <u>Customer Support</u>
                    </h3>
                </div>
                <div class="row">
                    <a href="#">cs@ggwp-store.telkomuniversity.ac.id</a>
                </div>
                <br>
                <br>
                <div class="row">
                    <h3>
                        <u>Open Hours</u>
                    </h3>
                </div>
                <div class="row">
                    Mon. - Fri. : 8 AM to 8 PM
                </div>
                <div class="row">
                    Sat. : 8 AM to 6 PM
                </div>
            </div>
            <div class="col-lg-7" id="kanan">
                <!--Konten Kanan-->
                <form method="POST" action="message_submit.php">
                <h2>
                    <u>Send Us A Message</u>
                </h2>
                -Customer is a King-
                <br>
                <br>
                <table>
                    <form>
                        <tr>
                            <td>
                                <h5>
                                    <u>Nama : </u>
                                </h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="ipt1" name="nama">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>
                                    <u>Email : </u>
                                </h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="ipt1" name="email">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>
                                    <u>Subject : </u>
                                </h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="ipt1" name="subject">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>
                                    <u>Message : </u>
                                </h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <textarea class="ipt2" name="pesan"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="submit" value="Submit">
                            </td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>
</body>

</html>