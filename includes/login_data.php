<?php
    include("database.php");

    if(isset($_POST["login-submit"])) {
        $studId = $_POST["studId"];
        $uPass = $_POST["uPass"];

        if(empty($studId) || empty($uPass)) {
            header("Location: ../index.php");
            exit();
        } else {
            $sql = "SELECT name FROM student WHERE student_id = '$studId' AND password = '$uPass'";
            $result = mysqli_query($conn, $sql);

            // session_start();
            if($result->num_rows > 0) {
                $userName = "";
                while($row = mysqli_fetch_assoc($result)) {
                    $userName = $row["name"];
                }
                // $_SESSION['msg'] = $userName;
                // $_SESSION['userId'] = $studId;
                $cookie_name = "userInfo";
                $cookie_value = $userName. "," .$studId;
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
                // $uI = json_encode(array($userName, $studId));
                
                header("Location: ../homePage.php", true, 301);
                exit();
            } else {
                $cookie_name = "userInfo";
                $cookie_value = "error". "," .$studId;
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
                header("Location: ../homePage.php", true, 301);
                exit();
            }
            
        }
    }

    if(isset($_POST["addPost-submit"])) {
        $title = $_POST["title"];
        $content = trim($_POST["content"]);

        $stdId = "";
        if(isset($_COOKIE["userInfo"])) {
            $uName = explode(",", "".$_COOKIE["userInfo"]);
            $stdId = $uName[1];
        }
        
        if($stdId != null) {
            $stmt = $conn->prepare("INSERT INTO page (student_id, title, content) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $stdId, $title, $content);
            $res = $stmt->execute();
            // $res = mysqli_query($conn, $sql1);
            if($res == true) {
                // echo "Data inserted Successfully..";
                header("Location: ../homePage.php", true, 301);
                exit();
            } else {
                // echo "Error in insertion..";
                header("Location: ../postPage.php?res=error", true, 301);
                exit();
            }
        } else {
            echo "Error" .mysqli_error();
        }
    }

    if(isset($_POST["donate-submit"])) {
        $sender = $_POST["sender"];
        $receiver = $_POST["receiver"];
        $amount = $_POST["amount"];

        $sql7 = "INSERT INTO transaction (sender_id, receiver_id, amount) VALUES ('$sender', '$receiver', $amount);";
        // $stmt2 = $conn->prepare("INSERT INTO transaction (sender_id, receiver_id, amount) VALUES (?, ?, ?)");
        // $stmt2->bind_param("sss", $sender, $receiver, $amount);
        // $res = $stmt2->execute();
        $res = mysqli_query($conn, $sql7);

        if($res == true) {
            // echo "Data inserted Successfully..";
            header("Location: ../homePage.php", true, 301);
            exit();
        } else {
            // echo "Error in insertion..";
            header("Location: ../postPage.php?res=error", true, 301);
            exit();
        }
    }

    if(isset($_POST["signup-submit"])) {
        $sId = $_POST["studId"];
        $sName = $_POST["studName"];
        $sEmail = $_POST["studEmail"];
        $sPass = $_POST["studPass"];

        $sql10 = "INSERT INTO student VALUES ('$sId', '$sName', '$sEmail', '$sPass');";
        $res = mysqli_query($conn, $sql10);

        if($res == true) {
            header("Location: ../login.php", true, 301);
            exit();
        } else {
            header("Location: ../signUp.php", true, 301);
            exit();
        }
    }
?>