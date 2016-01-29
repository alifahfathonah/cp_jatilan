<?php
session_start();
include "../config/connect.php";
if (isset($_SESSION['email']) && isset($_SESSION['level'])) {
    if ($_SESSION['status'] == 1) {
        ?>

        <?php include "include/_inc_header.php" ?>
        <div class="container-fluid">
            <div class="row-fluid">
        <?php include "include/_inc_sidebar.php" ?>
                <div class="span9" id="content">
                    <div class="row-fluid">
                        <!-- block -->
                        <?php
                        $sql = $mysqli->query("SELECT u.id, email, pass, pass2, level, status, u.date_created, u.date_updated, p.id FROM jtl_users u JOIN jtl_profiles p ON u.id = p.user_id WHERE u.id=" . $_GET['id']);
                        $row = $sql->fetch_array();
                        ?>
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Users Details of <?php echo $row['email'] ?></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form class="form-horizontal" action="user_edit_process.php" method="post">
                                        <fieldset>
                                            <div class="control-group">
                                                <label class="control-label"><b>Email</b> </label>
                                                <div class="controls">
        <?php echo $row['email'] ?>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label"><b>Password</b> </label>
                                                <div class="controls">
        <?php echo $row['pass'] ?>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label"><b>Level</b> </label>
                                                <div class="controls">
                                                    <?php if ($row['level'] == 1) { ?>
                                                        <span class='label label-inverse'>Administrator</span>
                                                    <?php } else { ?>
                                                        <span class='label label-info'>Publisher</span>
        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label"><b>Status</b> </label>
                                                <div class="controls">
                                                    <?php if ($row['status'] == 1) { ?>
                                                        <span class='label label-success'>Active</span>
                                                    <?php } else { ?>
                                                        <span class='label label-important'>Not Active</span>
        <?php } ?>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label"><b>Date Created</b></label>
                                                <div class="controls">
        <?php echo $row['date_created']; ?>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label"><b>Date Updated</b></label>
                                                <div class="controls">
        <?php echo $row['date_updated']; ?>
                                                </div>
                                            </div>

                                            <div class="form-actions">
                                                <a href="user_edit.php?id=<?php echo $row['id'] ?>" class="btn btn-warning">
                                                    <i class="icon-pencil icon-white"></i>
                                                    Edit
                                                </a>
                                                <a href="biography.php?id=<?php echo $row['id'] ?>" class="btn btn-inverse">
                                                    <i class="icon-eye-open icon-white"></i>
                                                    View Biography
                                                </a>
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
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Users Data</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <?php
                                    $no = 1;
                                    $sql = $mysqli->query("SELECT * FROM jtl_users");
                                    ?>
                                    <?php if (mysqli_num_rows($sql) == 0) { ?>
                                        <div class="alert alert-error alert-block">
                                            <a class="close" data-dismiss="alert" href="#">×</a>
                                            <h4 class="alert-heading">Data Empty !</h4>
                                            Silahkan diisi dulu.
                                        </div>
                                    <?php } else { ?>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Email</th>
                                                    <th>Password</th>
                                                    <th>Level</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($row = $sql->fetch_array()) { ?>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $row['email'] ?></td>
                                                <td><?php echo $row['pass'] ?></td>
                                                <td><?php
                                                    if ($row['level'] == 1) {
                                                        echo "<span class='label label-inverse'>Administrator</span>";
                                                    } else {
                                                        echo "<span class='label label-info'>Publisher</span>";
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php
                                                    if ($row['status'] == 1) {
                                                        echo "<span class='label label-success'>Active</span>";
                                                    } else {
                                                        echo "<span class='label label-important'>Not Active</span>";
                                                    }
                                                    ?></td>
                                                <td>
                <?php if ($_SESSION['email'] == $row['email']) { ?>

                                                        <a href="user_detail.php?id=<?php echo $row['id'] ?>" class="btn btn-mini" title="Details">
                                                            <i class="icon-eye-open"></i>
                                                        </a>
                                                        <a href="user_edit.php?id=<?php echo $row['id'] ?>" class="btn btn-mini btn-warning" title="Edit">
                                                            <i class="icon-pencil icon-white"></i>
                                                        </a>

                <?php } else { ?>
                                                        <a href="user_detail.php?id=<?php echo $row['id'] ?>" class="btn btn-mini" title="Details">
                                                            <i class="icon-eye-open"></i>
                                                        </a>
                                                        <a href="user_edit.php?id=<?php echo $row['id'] ?>" class="btn btn-mini btn-warning" title="Edit">
                                                            <i class="icon-pencil icon-white"></i>
                                                        </a>
                                                        <a href="user_delete.php?id=<?php echo $row['id'] ?>" class="btn btn-mini btn-danger" title="Delete" onclick="return confirm('Anda yakin ingin hapus data tersebut ?')">
                                                            <i class="icon-remove icon-white"></i>
                                                        </a>

                                                <?php } ?>
                                                </td>
                                                </tr>
                                            <?php
                                            $no++;
                                        }
                                        ?>
                                            </tbody>
                                        </table>
        <?php }
        ?>
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
    } else {
        echo "Maaf anda kami non aktfikan";
    }
} else {
    header("Location: login.php");
}
?>