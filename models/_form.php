<?php
$mysql = mysqli_connect('61.19.254.3', 'rehit', 'IT@101', 'db_itreh');
//$mysql = mysql_connect('127.0.0.1', 'root', '');
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
    mysqli_query($mysql, "SET NAMES UTF8");
}

?>
<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header btn-success">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h5 class="modal-title">เจ้าหน้าที่</h5>
        </div>
        <div class="modal-body">
            <form class="form-horizontal department" method="post" action="" id="_form">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <b>รายชื่อ</b> </label>

                        <div class="col-sm-9">
                            <select class="form-control" name="name_comp" id="name_comp" required>
                                <option value="" disabled>เลือกรายชื่อ</option>
                                <?php
                                $sql = mysqli_query($mysql, "SELECT * FROM tb_name_comcenter ORDER BY id_name");
                                while ($rs = mysqli_fetch_array($sql)) {
                                    ?>
                                    <option value="<?php echo $rs['id_name']; ?>"><?php echo $rs['name_comcenter'];?></option>
                                <?php
                                }
                                mysqli_close($con);
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="dateTime" id="dateTime">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> ยกเลิก</button>
                    <button type="submit" class="btn btn-success" id="submit" name="submit"> บันทึก</button>
                </div>
            </form>
        </div>

    </div>

</div>