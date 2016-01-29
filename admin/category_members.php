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
                    $data2 = $mysqli->query("SELECT id FROM jtl_profiles WHERE user_id='".$_SESSION['id']."'");
                    $row2 = $data2->fetch_array();
                    ?>
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left"><i class="icon-user"></i> Category Members</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">
                                        <form class="form-horizontal" action="category_members_add_process.php" method="post">
                                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
                                            <input type="hidden" name="profile_id" value="<?php echo $row2['id']; ?>">
                                            <fieldset>
                                                <div class="control-group">
                                                    <label class="control-label"><b>Name</b> </label>
                                                    <div class="controls">
                                                        <input type="text" class="span6" name="name" required="required">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><b>Descriptions</b> </label>
                                                    <div class="controls">
                                                        <textarea class="span6" name="descriptions" required="required" style="height: 130px"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-actions">
                                                    <button type="submit" class="btn btn-primary" name="simpan">
                                                        <i class="icon-plus icon-white"></i>
                                                        Add New Category
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
                            $no = 1;
                            $sql = $mysqli->query("SELECT * FROM jtl_category_members");
                            ?>
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left"><i class="icon-user"></i> Members Category Data</div>
                                    <div class="pull-right"><span class="badge badge-info"><?php echo $sql->num_rows;  ?> Items Category Category</span></div>
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
                                                        <a href="category_members_detail.php?id=<?php echo $row['id']?>" class="btn btn-mini" title="Details">
                                                            <i class="icon-eye-open"></i>
                                                        </a>
                                                        <a href="category_members_edit.php?id=<?php echo $row['id'] ?>" class="btn btn-mini btn-warning" title="Edit">
                                                            <i class="icon-pencil icon-white"></i>
                                                        </a>
                                                        <a href="category_members_delete.php?id=<?php echo $row['id'] ?>" class="btn btn-mini btn-danger" title="Delete" onclick="return confirm('Anda yakin ingin hapus data tersebut ?')">
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
        <?php
        }
    }else{
        echo "Maaf stas anda kami non aktifkan";
    }
}else{
    header("Location: login.php");
}
?>