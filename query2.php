<?php
    require "navbar.php";
    include("./includes/database.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Document</title>
</head>
<body>
    <center>
        <h4 style="margin-top: 20px;">Recomended Posts</h4>
        <?php 

        $value = "";
        $pageId = "";
        $recvId = "";

        include_once("./includes/database.php");
        if(isset($_COOKIE["userInfo"])) {
            $uName = explode(",", "".$_COOKIE["userInfo"]);
        }

        $sql2 = "SELECT * from page where page_id in (SELECT page_id from likes where student_id IN (SELECT friend_student_id from friend WHERE student_id = '$uName[1]') AND NOT student_id = '$uName[1]');";
        $result = mysqli_query($conn, $sql2);
        if($result->num_rows > 0) {
            $n = 0;
            $title = $userId = $content = $pId = "";
            while($row = mysqli_fetch_assoc($result)) {
                $title = $row["title"];
                $userId = $row["student_id"];
                $content = $row["content"];
                $pId = $row["page_id"];
                if($n==0 || $n==3) { ?>
                    <div class='row' style='margin: 20px -5px; padding: 0 20px;'>
                <?php   
                    $n = 0;
                }
                ?>
                        <div class='column' style='float:left; width: 33.3%; padding: 0 10px;' >
                            <div class='card' style='box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); padding: 16px; text-align: center; background-color: #f1f1f1;'>
                                <h4 class='fw-bold;'><?php echo $title ?></h4>
                                <h6>Posted By UserID : <?php echo $userId ?></h6>
                                <p style="text-align: justify; text-justify: inter-word;"><?php echo $content ?></p>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal1" onclick="addedVal('<?php echo $title ?>','<?php echo $userId ?>','<?php echo $content ?>');">Open modal</button>
                            </div>
                        </div>
                <?php
                $n += 1;
                if($n == 3) { ?>
                    </div> 
                <?php
                }
            }
        } else {
            echo "No Post recomened.";
        }
    ?>
    </center>
</body>
</html>