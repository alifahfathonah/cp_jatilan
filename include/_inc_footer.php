
<footer id="footer" class="midnight-blue">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <?php
                $sql= $mysqli->query("SELECT * FROM jtl_general");
                if(mysqli_num_rows($sql) == null){ ?>
                     &copy; <?php echo date('Y'); ?> <a href="index.php">Jatilan</a>. All Rights Reserved.
                <?php }else{
                    while($row=$sql->fetch_array()){ ?>
                      &copy; <?php echo date('Y'); ?> <a href="index.php"><b><?php echo $row['site_title']; ?></b></a>
                    <?php }
                    }
                ?>
            </div>
            <div class="col-sm-6">
                <ul class="pull-right">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="acc_jatilan.php">Accessories Jatilan</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer><!--/#footer-->

<script src="_template/js/jquery.js"></script>
<script src="_template/js/bootstrap.min.js"></script>
<script src="_template/js/jquery.prettyPhoto.js"></script>
<script src="_template/js/jquery.isotope.min.js"></script>
<script src="_template/js/main.js"></script>
<script src="_template/js/wow.min.js"></script>
</body>
</html>