<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .form{
            border: 2px solid black;
            padding: 1rem;
            border-radius: 8px;
        }

        .form-control{
            border: 1px solid black;
        }

        .my-3{
            border: 1px solid black;
        }
    </style>
    <title>Note App</title>
  </head>
  <body>
    <?php include "./navBar.php"; ?>
    <?php include "./database.php"; ?>
    <?php include "./edit.php"; ?>
    <?php
       if(isset($_POST["submit"])){
            if(!isset($_POST["hidden"])){
                $title = $_POST["title"];
                $desc = $_POST["desc"];
                $sql = "INSERT INTO `note_1`(`Title`, `Content`) VALUES ('$title','$desc')";
                $res = mysqli_query($con,$sql);
            } 
       } 
    ?>
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-lg-10 ">
            <form class="form" method="POST">
                <div class="mb-3">
                    <label for="title" class="form-label">Tiêu đề</label>
                    <input type="text" class="form-control" id="title" placeholder="Nhập tiêu đề..." name="title">
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Nội dung</label>
                    <textarea class="form-control" id="desc" rows="3" placeholder="Nhập nội dung..." name="desc"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Thêm mới</button>
            </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h1>Ghi chú</h1>
                <?php
                    $sql = "SELECT * FROM `note_1`";
                    $res = mysqli_query($con,$sql);
                    $noNotes = true;
                    while($fetch = mysqli_fetch_assoc($res)){
                        $noNotes = false;
                        echo '<div class="card my-3">
                        <div class="card-body">
                          <h5 class="card-title">'.$fetch["Title"].'</h5>
                          <p class="card-text">'.$fetch["Content"].'</p>
                          <button type="button" class="btn btn-primary edit" data-bs-toggle="modal" data-bs-target="#exampleModal" id="'.$fetch["STT"].'">
                          Sửa</button>
                          <a href="./delete.php?id='.$fetch["STT"].'" class="btn btn-danger">Xóa</a>
                        </div>
                      </div>';
                    }
                    if($noNotes){
                        echo '<div class="card my-3">
                        <div class="card-body">
                          <h5 class="card-title">Message:</h5>
                          <p class="card-text">No Note are available</p>
                        </div>
                      </div>';
                    }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
    crossorigin="anonymous"></script>
    <script>
        const edit = document.querySelectorAll(".edit");
        const editTitle = document.getElementById("edittitle");
        const editdesc = document.getElementById("editdesc");
        const hiddenInput = document.getElementById("hidden");
        const cardBody = document.querySelectorAll(".card-body");
        edit.forEach(element => {
            element.addEventListener("click", () =>{
                const titleText = element.parentElement.children[0].innerText;
                const descText = element.parentElement.children[1].innerText;
                editTitle.value = titleText;
                editdesc.value = descText;
                hiddenInput.value = element.id;
            });
        });
        const search = document.getElementById('search');
        search.addEventListener("input", () => {
            const value = search.value.toLowerCase();
            cardBody.forEach(element => {
                const titleText = element.children[0].innerText.toLowerCase();
                const descText = element.children[1].innerText.toLowerCase();
                if(titleText.includes(value || descText.includes(value))){
                    element.parentElement.style.display = "block";
                }else{
                    element.parentElement.style.display ="none";
                }
            });
        })
    </script>
  </body>
</html>