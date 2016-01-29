<?php include "include/_inc_header.php"; ?>

<?php include "include/_home.php"; ?>
<section id="partner">
    <div class="container">
        <div class="center wow fadeInDown">
            <h2>Supported By</h2>
            <p class="lead">Kami di dukung oleh beberapa instansi di Indonesia <br> Terimakasih untuk</p>
        </div>
        <div class="partners">
            <ul style="text-align: center;">
                <?php
                $sql = $mysqli->query("SELECT * FROM jtl_sponsors WHERE status = 1");
                while ($row = $sql->fetch_array()) {
                    ?>
                <li style="margin-right: 10px">
                        <a href="<?php echo $row['link']; ?>">
                            <img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" src="admin/<?php echo $row['icon']; ?>">
                            <p style="color: #ffffff"><b><?php echo $row['name']; ?></b></p>
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div><!--/.container-->
</section><!--/#partner-->

<?php include "include/_inc_footer.php"; ?>