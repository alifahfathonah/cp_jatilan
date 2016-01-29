<?php include "include/_inc_header.php"; ?>

<section id="about-us">
    <div class="container">
        <?php
        $sql2 = $mysqli->query("SELECT * FROM jtl_general");
        $row2 = $sql2->fetch_array();
        $sql = $mysqli->query("SELECT * FROM jtl_about");
        while($row = $sql->fetch_array()){ ?>
            <div class="center wow fadeInDown">
                <h2>About <?php echo $row2['site_title'] ?></h2>
                <p class="lead"><?php echo $row['content']; ?></p>
            </div>
        <!-- about us slider -->
        <div id="about-slider">
            <div id="carousel-slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="span12">
                            <img src="admin/<?php echo $row['image']; ?>" class="img-responsive" alt="" style="width: 100%; height: 400px">
                        </div>
                    </div>
                </div>
            </div> <!--/#carousel-slider-->
        </div><!--/#about-slider-->
        <?php
        }
        ?>
        <!-- our-team -->
        
        <br>
        <br>
        <div class="team">
            <div class="center wow fadeInDown" style="margin-bottom: -20px">
                <h2>Members of <?php echo $row2['site_title'] ?></h2>
            </div>
            <div class="row clearfix"> 
               <?php 
               $sql = $mysqli->query("SELECT * FROM jtl_members JOIN jtl_category_members"); 
               while($rowMember = $sql->fetch_array()){ ?>
                
                  <div class="col-md-4 col-sm-6" style="margin-top: 30px">
                    <div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                        <div class="media">
                            <div class="pull-left">
                                <a href="#"><img class="media-object img-circle" src="admin/<?php echo $rowMember['image'] ?>" alt="" style="width: 90px; height: 90px"></a>
                            </div>
                            <div class="media-body">

                                <h4><?php echo $rowMember['member_name'] ?></h4>
                                <h5><?php echo $rowMember['name']?></h5>
                                <ul class="tag clearfix">
                                    <?php
                                    if($rowMember['gender'] == 1){ ?>
                                    <li class="btn"><a href="#">Laki-Laki</a></li>    
                                    <?php
                                    }else{ ?>
                                    <li class="btn"><a href="#">Perempuan</a></li>    
                                    <?php }
                                    ?>
                                </ul>
                                <ul class="social_icons">
                                    <li><a href="<?php echo $rowMember['facebook_url'] ?>"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="<?php echo $rowMember['twitter_url'] ?>"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="<?php echo $rowMember['instagram_url'] ?>"><i class="fa fa-instagram" style="background-color: #000;"></i></a></li>
                                </ul>
                            </div>
                        </div><!--/.media -->
                        <p><?php echo $rowMember['motto']; ?></p>
                        <hr>
                        <p><?php echo $rowMember['address']; ?></p>
                    </div>
                </div><!--/.col-lg-4 -->
                
                
               <?php
               
               }
               ?>
                
    </div><!--/.container-->
</section><!--/about-us-->


<?php include "include/_inc_footer.php"; ?>