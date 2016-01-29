<?php include "include/_inc_header.php"; ?>

<section id="blog" class="container">
    <div class="center">
        <?php
        $sql = $mysqli->query('SELECT * FROM jtl_general');
        $rowG = $sql->fetch_array();
        ?>
        <h2>Blogs Of <?php echo $rowG['site_title'] ?></h2>
    </div>

    <div class="blog">
        <div class="row">
            <div class="col-md-8">
                <?php 
                $sqlBlog = $mysqli->query("SELECT b.id, b.title, b.image, b.content, c.name, b.date_created, b.date_updated, p.nick_name FROM jtl_blogs b JOIN jtl_profiles p ON b.profile_id = p.id JOIN jtl_category_blog c ON b.category_blog = c.id WHERE b.category_blog='".$_GET['id']."'");
                while($rowBlog = $sqlBlog->fetch_array()){ ?>
                
                <div class="blog-item">
                    <div class="row">
                        <div class="col-xs-12 col-sm-2 text-center">
                            <div class="entry-meta">
                                <span id="publish_date">07  NOV</span>
                                <span><i class="fa fa-user"></i> <a href="#"><?php echo $rowBlog['nick_name']; ?></a></span>
                                <span><i class="fa fa-list"></i> <a href="#"><?php echo $rowBlog['name']; ?></a></span>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-10 blog-content">
                            <a href=""><img class="img-responsive img-blog" src="admin/<?php echo $rowBlog['image'] ?>" width="100%" alt="" /></a>
                            <h2><a href=""><?php echo $rowBlog['title'] ?></a></h2>
                            <p><?php echo $rowBlog['content']; ?></p>
                            <!-- <h3>Curabitur quis libero leo, pharetra mattis eros. Praesent consequat libero eget dolor convallis vel rhoncus magna scelerisque. Donec nisl ante, elementum eget posuere a, consectetur a metus. Proin a adipiscing sapien. Suspendisse vehicula porta lectus vel semper. Nullam sapien elit, lacinia eu tristique non.posuere at mi. Morbi at turpis id urna ullamcorper ullamcorper.</h3> -->
                        </div>
                    </div>
                </div><!--/.blog-item-->
                
                <?php
                
                }
                ?>
            </div><!--/.col-md-8-->

            <aside class="col-md-4">
                <div class="widget search">
                    <form role="form">
                        <input type="text" class="form-control search_box" autocomplete="off" placeholder="Search Here">
                    </form>
                </div><!--/.search-->


                <div class="widget categories">
                    <h3>Categories</h3>
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="blog_category">
                                <?php
                                $sqlCat = $mysqli->query("SELECT * FROM jtl_category_blog");
                                while ($rowCat = $sqlCat->fetch_array()) {
                                    ?>
                                    <li>
                                        <a href="blog_category.php?id=<?php echo $rowCat['id']; ?>"><?php echo $rowCat['name']; ?> 
                                            <!--<span class="badge">04</span> -->
                                        </a>
                                    </li>  
                                        <?php
                                    }
                                    ?>
                            </ul>
                        </div>
                    </div>
                </div><!--/.categories-->
            </aside>
        </div><!--/.row-->
    </div>
</section><!--/#blog-->

<?php include "include/_inc_footer.php" ?>