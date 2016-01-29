<?php
session_start();
include "../config/connect.php";
if(isset($_SESSION['email']) && isset($_SESSION['level'])){
    if($_SESSION['status'] == 1){
        if($_SESSION['level'] == 1){ ?>
            <?php include "include/_inc_header.php" ?>
            <div class="container-fluid">
                <div class="row-fluid">
                    <?php include "include/_inc_sidebar.php" ?>
                    <div class="span9" id="content">
                        <div class="row-fluid">
                            
                            <?php
                    $sql2 = $mysqli->query("SELECT id FROM jtl_profiles WHERE user_id='".$_SESSION['id']."'");
                    $data2 = $sql2->fetch_array();
                    
                      $sql = $mysqli->query("SELECT * FROM jtl_sponsors WHERE id=".$_GET['id']);
                      $data = $sql->fetch_array();
                    ?>
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Sponsors</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">
                                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
                                            <input type="hidden" name="profile_id" value="<?php echo $data2['id']; ?>">
                                            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                            <fieldset>
                                                <div class="control-group">
                                                    <label class="control-label"><b>Name</b> </label>
                                                    <div class="controls">
                                                        <?php echo $data['name'];  ?>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label"><b>Link</b> </label>
                                                    <div class="controls">
                                                        <?php echo $data['link'] ?>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label"><b>Status</b> </label>
                                                    <div class="controls">
                                                       <?php
                                                    if ($row['status'] == 1) {
                                                        echo "<span class='label label-success'>Active</span>";
                                                    } else {
                                                        echo "<span class='label label-important'>Not Active</span>";
                                                    }
                                                    ?>
                                                    </div>
                                                </div>
                                                
                                                <div class="control-group">
                                                    <label class="control-label"><b>Icon</b> </label>
                                                    <div class="controls">
                                                        <img src="<?php echo $data['icon']; ?>" style="width: 30px; height: 30px">
                                                    </div>
                                                </div>

                                                <div class="form-actions">
                                                    <button type="submit" class="btn btn-inverse">
                                                        Back
                                                    </button>
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
                            $sql = $mysqli->query("SELECT * FROM jtl_sponsors");
                            ?>
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">List Social Media</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Icon</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php
                                            $no = 1;
                                            while($row = $sql->fetch_array()){
                                                ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><a href="<?php echo $row['link'] ?>" target="_blank"><?php echo $row['name'] ?></a></td>
                                                    <td><img src="<?php echo $row['icon'] ?>" style="width: 30px; height: 30px"> </td>
                                                    <td>
                                                        <?php if($row['status'] == 1){
                                                            echo "<span class='label label-success'>Active</span>";
                                                        }else{
                                                            echo "<span class='label label-important'>Not Active</span>";
                                                        } ?>
                                                    </td>
                                                    <td>
                                                        <a href="sponsors_detail.php?id=<?php echo $row['id']?>" class="btn btn-mini" title="Details">
                                                            <i class="icon-eye-open"></i>
                                                        </a>
                                                        <a href="sponsors_edit.php?id=<?php echo $row['id'] ?>" class="btn btn-mini btn-warning" title="Edit">
                                                            <i class="icon-pencil icon-white"></i>
                                                        </a>
                                                        <a href="sponsors_delete.php?id=<?php echo $row['id'] ?>" class="btn btn-mini btn-danger" title="Delete" onclick="return confirm('Anda yakin ingin hapus data tersebut ?')">
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
                        <br>
                    </div>
                </div>
                <?php include "include/_inc_footer.php" ?>
            </div>

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