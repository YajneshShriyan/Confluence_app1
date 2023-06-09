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
        <h4 style="margin-top: 20px;">Query Result</h4>
        <div class="row">
            <div class="col-6">
                <button type="button" class="btn12">Ascending Order</button>
                <table class="styled-table">
                    <thead>
                        <tr>
                            <td>Student Id</td>
                            <td>Net Money Made</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                $sql8 = "SELECT
                                            student_id,
                                            SUM(CASE
                                                WHEN sender_id = student_id THEN -amount
                                                ELSE amount
                                            END) AS net_money_made
                                        FROM
                                            Transaction, student
                                        GROUP BY
                                            student_id
                                        ORDER BY
                                            net_money_made;";
                                $result1 = mysqli_query($conn, $sql8);
                            //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
                            while($res1 = mysqli_fetch_array($result1)) { 		
                                echo "<tr>";
                                echo "<td>".$res1['student_id']."</td>";
                                echo "<td>".$res1['net_money_made']."</td>";
                                echo "</tr>";	
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <button type="button" class="btn12">Descending Order</button>
                <table class="styled-table">
                    <thead>
                        <tr>
                            <td>Student Id</td>
                            <td>Net Money Made</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $sql8 = "SELECT
                                        student_id,
                                        SUM(CASE
                                            WHEN sender_id = student_id THEN -amount
                                            ELSE amount
                                        END) AS net_money_made
                                    FROM
                                        Transaction, student
                                    GROUP BY
                                        student_id
                                    ORDER BY
                                        net_money_made DESC;";
                            $result2 = mysqli_query($conn, $sql8);
                            //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
                            while($res2 = mysqli_fetch_array($result2)) { 		
                                echo "<tr>";
                                echo "<td>".$res2['student_id']."</td>";
                                echo "<td>".$res2['net_money_made']."</td>";
                                echo "</tr>";	
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </center>
</body>
</html>