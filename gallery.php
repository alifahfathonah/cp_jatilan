<?php include "include/_inc_header.php"; ?>

<?php
$sql2 = $mysqli->query("SELECT * FROM jtl_general");
$row2 = $sql2->fetch_array();
?>
<section id="portfolio">
    <div class="container">
        <div class="center">
            <h2>Gallery of <?php echo $row2['site_title'] ?></h2>
        </div>

        <ul class="portfolio-filter text-center">
            <li><a class="btn btn-default active" href="gallery.php" data-filter="*">All Category</a></li>
            <?php
            /* $sql = $mysqli->query("SELECT * FROM jtl_category_gallery");
              while ($row = $sql->fetch_array()) {
              ?>
              <li><a class="btn btn-default" href="category_gallery.php" data-filter="*"><?php echo $row['name']; ?></a></li>
              <?php
              }
             */
            ?>
        </ul><!--/#portfolio-filter-->

        <div class="row">
            <div class="portfolio-items" style="text-align: center; padding-left: 10%; padding-right: 10%">
                <?php
                $sql = $mysqli->query("SELECT * FROM jtl_gallery");
                while ($row = $sql->fetch_array()) {
                    ?>
                    <div class="portfolio-item apps col-xs-12 col-sm-4 col-md-3" style="margin-left: 10px; margin-top: 10px">
                        <div class="recent-work-wrap">
                            <img class="img-responsive" src="admin/<?php echo $row['image']; ?>" alt="" style="width: 300px; height: 200px">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <p><?php echo $row['descriptions']; ?></p>
                                    <a class="preview" href="admin/<?php echo $row['image']; ?>" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                                </div>
                            </div>
                        </div>
                    </div><!--/.portfolio-item-->
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section><!--/#portfolio-item-->

<?php include "include/_inc_footer.php"; ?>
