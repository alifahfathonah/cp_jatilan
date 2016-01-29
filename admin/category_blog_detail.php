<?php
session_start();
include "../config/connect.php";
if(isset($_SESSION['email']) && isset($_SESSION['level'])){
    if($_SESSION['status']){
        if($_SESSION['level'] == 1){ ?>
            <?php include "include/_inc_header.php" ?>
            <div class="container-fluid">
                <div class="row-fluid">
                    <?php include "include/_inc_sidebar.php" ?>
                    
                    <?php
                    $data2 = $mysqli->query("SELECT id FROM jtl_profiles WHERE user_id='".$_SESSION['id']."'");
                    $row2 = $data2->fetch_array();
                    
                    $sql = $mysqli->query("SELECT * FROM jtl_category_blog WHERE id=".$_GET['id']);
                    $data = $sql->fetch_array();
                    ?>
                    
                    <div class="span9" id="content">
                        <div class="row-fluid">
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left"><i class="icon-book"></i> Category Blog</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">
                                        <form class="form-horizontal" action="">
                                             <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
                                            <input type="hidden" name="profile_id" value="<?php echo $row2['id']; ?>">
                                            <fieldset>
                                                <div class="control-group">
                                                    <label class="control-label"><b>Name</b> </label>
                                                    <div class="controls">
                                                       <?php echo $data['name'] ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><b>Descriptions</b> </label>
                                                    <div class="controls">
                                                        <?php echo $data['descriptions'] ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><b>Date Created</b> </label>
                                                    <div class="controls">
                                                        <?php echo $data['date_created'] ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><b>Date Updated</b> </label>
                                                    <div class="controls">
                                                        <?php echo $data['date_updated'] ?>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /block -->
                        </div>
                        <br>
                        <div class="row-fluid">
                            <!-- block -->
                            <?php
                            $no = 1;
                            $sql = $mysqli->query("SELECT * FROM jtl_category_blog");
                            ?>
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left"><i class="icon-book"></i> Category Data</div>
                                    <div class="pull-right"><span class="badge badge-info"><?php echo $sql->num_rows;  ?> Items Category Blogs</span></div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Descriptions</th>
                                                <th>Date Created</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php while($row = $sql->fetch_array()){ ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $row['name'] ?></td>
                                                    <td><?php echo $row['descriptions'] ?></td>
                                                    <td><?php echo $row['date_created']?></td>
                                                    <td>
                                                        <a href="category_blog_detail.php?id=<?php echo $row['id']?>" class="btn btn-mini" title="Details">
                                                            <i class="icon-eye-open"></i>
                                                        </a>
                                                        <a href="category_blog_edit.php?id=<?php echo $row['id'] ?>" class="btn btn-mini btn-warning" title="Edit">
                                                            <i class="icon-pencil icon-white"></i>
                                                        </a>
                                                        <a href="category_blog_delete.php?id=<?php echo $row['id'] ?>" class="btn btn-mini btn-danger" title="Delete" onclick="return confirm('Anda yakin ingin hapus data tersebut ?')">
                                                            <i class="icon-remove icon-white"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                                $no++;
                                            } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /block -->
                        </div>
                    </div>
                </div>
                <?php include "include/_inc_footer.php" ?>
            </div>
        </body>
    </html>
        <?php
        }else{
            echo "Maaf anda tidak punyak hak.";
        }
    }else{
        echo "Maaf anda kami non aktifkan";
    }
}else{
    header("Location: login.php");
    die();
}
?>