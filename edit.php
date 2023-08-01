<?php
    include "./database.php";
    if(isset($_POST["hidden"])){
        $title = $_POST["edittitle"];
        $desc = $_POST["editdesc"];
        $id = $_POST["hidden"];
        $sql = "UPDATE `note_1` SET `STT`='$id',`Title`='$title',`Content`='$desc' WHERE `STT`='$id'";
        $res = mysqli_query($con,$sql);
    }

    echo ' 
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Sửa ghi chú</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body">
        <form method="POST">
            <input type="hidden" name="hidden" id = "hidden">
        <div class="mb-3">
              <label for="title" class="form-label">Tiêu đề</label>
              <input type="text" class="form-control" id="edittitle" placeholder="Nhập tiêu đề..." name="edittitle">
            </div>
            <div class="mb-3">
              <label for="desc" class="form-label">Nội dung</label>
              <textarea class="form-control" id="editdesc" rows="3" placeholder="Nhập nội dung..." name="editdesc"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Cập nhật ghi chú</button>
          </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
          </div>
        </div>
      </div>
    </div>';
?>