<?php
session_start();
include "../config/connect.php";
if (isset($_SESSION['email']) && isset($_SESSION['level'])) {
    if ($_SESSION['status'] == 1) {
        if ($_SESSION['level'] == '1') {
            ?>
            <?php include "include/_inc_header.php" ?>
            <div class="container-fluid">
                <div class="row-fluid">
            <?php include "include/_inc_sidebar.php" ?>
                    <div class="span9" id="content">
                        <div class="row-fluid">
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Form Users</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">
                                        <form class="form-horizontal" action="user_add_process.php" method="post">
                                            <fieldset>
                                                <div class="control-group">
                                                    <label class="control-label"><b>Email</b> </label>
                                                    <div class="controls">
                                                        <input type="email" class="span6" name="email" required="required">
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label"><b>Password</b> </label>
                                                    <div class="controls">
                                                        <input type="password" class="span6" name="pass" required="required" pattern=".{5,}"  oninvalid="setCustomValidity('Password Minimal 5 Karakter')" >
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label"><b>Repeat Password</b> </label>
                                                    <div class="controls">
                                                        <input type="password" class="span6" name="pass2" required="required" pattern=".{5,}" oninvalid="setCustomValidity('Password Minimal 5 Karakter')">
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label"><b>Level</b> </label>
                                                    <div class="controls">
                                                        <select required="required" name="level">
                                                            <option></option>
                                                            <option value="1">Administrator</option>
                                                            <option value="2">Publisher</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label"><b>Status</b> </label>
                                                    <div class="controls">
                                                        <label><input type="radio" name="status" value="1" checked> Active</label>
                                                        <label><input type="radio" name="status" value="2"> Not Active</label>
                                                    </div>
                                                </div>

                                                <div class="form-actions">
                                                    <button type="submit" class="btn btn-primary" name="simpan">
                                                        <i class="icon-plus icon-white"></i>
                                                        Save
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
                            $sql = $mysqli->query("SELECT * FROM jtl_users");
                            ?>
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Users Data</div>
                                    <div class="pull-right"><span class="badge badge-info"><?php echo $sql->num_rows; ?> Users</span></div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">
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
            echo "Maaf anda tidak punya hak untuk mengatur bagian ini. ues ngatur gon mu dewe ae. :D";
        }
    } else {
        echo "Maaf anda kami non aktfikan";
    }
    ?>

    <?php
} else {
    echo "Login sek bro !";
}
?>