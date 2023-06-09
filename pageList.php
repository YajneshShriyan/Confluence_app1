<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- <title>Document</title> -->
</head>
<body>
    <?php 

        $value = "";
        $pageId = "";
        $recvId = "";

        include_once("./includes/database.php");
        if(isset($_COOKIE["userInfo"])) {
            $uName = explode(",", "".$_COOKIE["userInfo"]);
        }

        $sql2 = "SELECT * FROM page WHERE NOT student_id = '$uName[1]'";
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
        }
    ?>

    <div class="modal fade" id="myModal1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelTitle1"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button><br>
                </div>
                <div class="modal-body">
                    <h6 id="modelUserId1"></h6>
                </div>
                <div class="modal-body" id="modelContent1"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" onclick="likeIt();"><span id="heartIcon1" class="bi bi-heart" style="font-size: 30px;"></span></button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal2" onclick="getRecpId();">Donate</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
        
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelTitle2">Transaction Page</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button><br>
                </div>
                <div class="modal-body">
                    <form action="./includes/login_data.php" method="POST">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Sender ID:</label>
                            <input type="text" class="form-control" id="nameDis"  name="sender" value="<?php echo $uName[1]; ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Recipient ID:</label>
                            <input type="text" class="form-control" id="recipient-name" name="receiver" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="col-form-label">Amount:</label>
                            <input type="number" name="amount"  max="1000" min="0" required>
                        </div>
                        <div class="mb-3">
                            <label for="transactionDate" class="col-form-label">Transaction Date:</label>
                            <input type="text" name="tDate" id="curDate" disabled>
                        </div>
                        <button type="submit" name="donate-submit" class="btn btn-success btn-block" onclick="removeDisable();">Confirm</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
        
            </div>
        </div>
    </div>

    <script>
        let ic = 0;
        function addedVal(title, id, content) {
            document.getElementById("modelTitle1").innerHTML = title;
            document.getElementById("modelUserId1").innerHTML = "Post User ID : " + id;
            document.getElementById("modelContent1").innerHTML = content;
        }

        function likeIt() {
            let heartIcon = document.getElementById("heartIcon1");
            if(ic == 0) {
                heartIcon.classList.remove("bi-heart");
                heartIcon.classList.add("bi-heart-fill");
                heartIcon.style.color = "rgb(255, 0, 0)";
                ic=1;
                // for query 2
                // SELECT page_id from likes where student_id IN (SELECT friend_student_id from friend WHERE student_id = "stud1") AND NOT student_id = "stud1";
                                
            } else {
                // if you want to make toggle the like
                heartIcon.classList.remove("bi-heart-fill");
                heartIcon.classList.add("bi-heart");
                ic = 0;

            }
        }

        function getRecpId() {
            let recpId = document.getElementById("modelUserId1").innerHTML;
            let recpName = document.getElementById("recipient-name");
            recpId = recpId.split(" ");
            recpName.value = recpId[4];
            
            let curDate = document.getElementById("curDate");
            const date = new Date();
            let currentDay= String(date.getDate()).padStart(2, '0');
            let currentMonth = String(date.getMonth()+1).padStart(2,"0");
            let currentYear = date.getFullYear();

            curDate.value = currentDay + "-" + currentMonth + "-" + currentYear;

        }

        function removeDisable() {
            let nameDis = document.getElementById("nameDis");
            let recipientN = document.getElementById("recipient-name");

            nameDis.removeAttribute("disabled");
            recipientN.removeAttribute("disabled");
        }
    </script>

</body>
</html>
