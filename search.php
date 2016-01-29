<?php
include 'config/connect.php';
include "include/_inc_header.php";
?>


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
                $q = $_GET["q"];
                ?>

                <?php
                $search = $mysqli->query("SELECT b.id, b.title, b.image, b.content, c.name, b.date_created, b.date_updated, p.nick_name FROM jtl_blogs b JOIN jtl_profiles p ON b.profile_id = p.id JOIN jtl_category_blog c ON b.category_blog = c.id WHERE title LIKE '%$q%' OR content LIKE '%$q%' ");
                echo $jumlah = mysqli_num_rows($search);
                if ($jumlah > 0) {
                    ?>

                    <?php
                    while ($data = mysqli_fetch_array($search)) {
                        ?>

                        <div class="blog-item">
                            <div class="row">
                                <div class="col-xs-12 col-sm-2 text-center">
                                    <div class="entry-meta">
                                        <span id="publish_date">07  NOV</span>
                                        <span><i class="fa fa-user"></i> <a href="#"><?php echo $data['nick_name']; ?></a></span>
                                        <span><i class="fa fa-list"></i> <a href="#"><?php echo $data['name']; ?></a></span>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-10 blog-content">
                                    <a href="blog_single.php?id=<?php echo $data['id']; ?>"><img class="img-responsive img-blog" src="admin/<?php echo $data['image'] ?>" width="100%" alt="" /></a>
                                    <h2><a href="blog_single.php?id=<?php echo $data['id']; ?>"><?php echo $data['title'] ?></a></h2>
                                    <p>
                                        <?php
                                        $potong_artikel = substr($data['content'], 0, 300); //substr()
                                        echo $potong_artikel;
                                        ?>....
                                    </p>
                                    <!-- <h3>Curabitur quis libero leo, pharetra mattis eros. Praesent consequat libero eget dolor convallis vel rhoncus magna scelerisque. Donec nisl ante, elementum eget posuere a, consectetur a metus. Proin a adipiscing sapien. Suspendisse vehicula porta lectus vel semper. Nullam sapien elit, lacinia eu tristique non.posuere at mi. Morbi at turpis id urna ullamcorper ullamcorper.</h3> -->
                                    <a class="btn btn-primary readmore" href="blog_single.php?id=<?php echo $data['id']; ?>">Read More <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div><!--/.blog-item-->

                        <?php
                    }
                    ?>            
                <?php
                } else {
                    echo "<p>Hasil Pencarian Tidak Ditemukan</p>";
                }
                ?>

            </div><!--/.col-md-8-->

            <aside class="col-md-4">
                <div class="widget search">
                    <form role="form" method="GET" action="search.php">
                        <input type="text" name="q" class="form-control search_box" placeholder="Search Here">
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