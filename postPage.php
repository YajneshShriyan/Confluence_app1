<?php
    require "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            #formBox {
                display: inline;
                justify-content: center;
                position: absolute;
                left: 35%;
                width: fit-content;
                margin-top: 4%;
                padding: 20px;
                background: #92c3e8;
                border-radius: 20px;
                box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
            }
            #formBox form {
                position: relative;
                width: 28rem;
            }
            #formBox h3 {
                text-align: center;
                margin-top: 3%;
                margin-bottom: 4%;
                color: #021ff7;
            }

            #formBox #errorMsg  {
                padding-left: 9.5rem;
                font-weight: bold;
                font-size: 18px;
                color: #fff;
                font-family: "Times New Roman";
            }

        </style>
        <title>Post Page</title>
    </head>
    <body>
        <div id="formBox">
            <div class="errorBox bg-danger" style="display: none;">
                <span id="errorMsg">Enter all the fields</span>
            </div>
            <h3>Add Post</h3>
            <form method="POST" action="./includes/login_data.php">
                <div class="form-outline mb-4">
                    <label class="form-label" for="form4Example1">Post Title</label>
                    <input type="text" id="title" class="form-control" name="title" required/>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="form4Example3">Post Content</label>
                    <textarea class="form-control" id="content" rows="4" name="content" required></textarea>
                </div>
    
                <button type="submit" name="addPost-submit" class="btn btn-primary btn-block mb-4">Make a Post</button>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>