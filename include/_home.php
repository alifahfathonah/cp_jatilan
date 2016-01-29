<section id="main-slider" class="no-margin">
    <div class="carousel slide">
        <div class="carousel-inner">
            <div class="item active" style="background-image: url(_template/images/slider/bg1.jpg)">
                <div class="container">
                    <?php
                    $sql = $mysqli->query("SELECT * FROM jtl_about");
                while ($row = $sql->fetch_array()) { ?>
                    <div class="row slide-margin">
                        <div class="col-sm-6">
                            <div class="carousel-content">
                                <h1 class="animation animated-item-1"><?php echo $row['title'];  ?></h1>
                                <h2 class="animation animated-item-2"><?php echo $row['content'];  ?></h2>
                                <a class="btn-slide animation animated-item-3" href="about.php">Read More</a>
                            </div>
                        </div>

                        <div class="col-sm-6 hidden-xs animation animated-item-4">
                            <div class="slider-img">
                                <img src="admin/<?php echo $row['image'] ?>" class="img-responsive">
                            </div>
                        </div>

                    </div>
                    <?php }
                    ?>
                </div>
            </div><!--/.item-->
        </div><!--/.carousel-inner-->
    </div><!--/.carousel-->
</section><!--/#main-slider-->