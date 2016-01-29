<?php include "include/_inc_header.php"; ?>

<section id="contact-info">
    <div class="center">
        <h2>How to Reach Us?</h2>
    </div>
    <div class="gmap-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 text-center">
                    <div class="">
                        <img src="admin/images/Sweet-Girls-Wallpapers.jpg" style="width: 300px; height: 300px; border: 7px solid #fff" class="img-circle"> 
                    </div>
                </div>

                <div class="col-sm-7 map-content">
                    <ul class="row">
                        <li class="col-sm-6">
                            <?php
                                $sql = $mysqli->query("SELECT * FROM jtl_contacts");
                                while($row = $sql->fetch_array()){ ?>
                                    <?php echo $row['contacts'] ?>
                                <?php 
                                
                                }
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>  <!--/gmap_area -->
<?php include "include/_inc_footer.php" ?>

