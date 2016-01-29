<?php include "include/_inc_header.php"; ?>
    <section id="portfolio">
        <div class="container">
            <div class="center">
                <?php
    $sql = $mysqli->query('SELECT * FROM jtl_general');
    $rowG = $sql->fetch_array();
    ?>
                <h2>Accessories of <?php echo $rowG['site_title'] ?></h2>
            </div>

            <div class="row">
                <?php
                $sql = $mysqli->query("SELECT * FROM jtl_accessories");
                while($row = $sql->fetch_array()){ ?>

                    <div class="col-xs-6 col-sm-6">
                        <div class="tab-wrap">
                            <div class="media">
                                <div class="parrent media-body">
                                    <div class="tab-content">
                                        <div class="">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <img class="img-responsive" src="admin/<?php echo $row['image']; ?>" style="width: 200px; height: 200px">
                                                </div>
                                                <div class="media-body">
                                                    <h4><?php echo $row['name']; ?></h4>
                                                    <p><?php echo $row['descriptions']?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!--/.tab-content-->
                                </div> <!--/.media-body-->
                            </div> <!--/.media-->
                        </div><!--/.tab-wrap-->
                    </div>

                <?php
                }
                ?>
            </div>
        </div>
    </section><!--/#portfolio-item-->

<?php include "include/_inc_footer.php"; ?>