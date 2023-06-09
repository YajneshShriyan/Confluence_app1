<html>
    <head>        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    <body>
        
        <?php 
            if(isset($_COOKIE["userInfo"])) {
                $uName = explode(",", "".$_COOKIE["userInfo"]);
            }
        ?>
    
        <nav class="navbar navbar-expand-lg navbar-secondary bg-secondary">
            <div class="container-fluid">
                <a class="navbar-brand px-5 fs-4 fw-bold text-white" href="#">Confluence App</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end px-5" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-dark fw-bold fs-7" aria-current="page" href="./homePage.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark fw-bold fs-7" href="./postPage.php">Add Post</a>
                        </li>
                        <li class="nav-item">
                            <!-- <a class="nav-link text-dark fw-bold fs-7" href="./query1.php">Queries</a> -->
                            <div class="dropdown">
                                <button type="button" class="btn btn-secondary dropdown-toggle text-dark fw-bold fs-7" data-bs-toggle="dropdown">
                                    Queries
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="./query1.php">Query 1</a></li>
                                    <li><a class="dropdown-item" href="./query2.php">Query 2</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item mt-1 px-3">
                            <button class="nav-link text-white fw-bold badge bg-primary fs-6 w" style="width: 5rem; height: 2rem; border: none" onclick="logOut();">Logout</button>
                        </li>
                        
                        <li class="nav-item mt-1 px-1">
                            <h5 class="text-white">Welcome <span class="text-primary fw-bold"><?php echo $uName[0]; ?></span></h5>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <script>
            function logOut() {
                // ?php session_destroy(); ?>
                // setcookie("userInfo", "", time() - 60);
                window.location.replace("login.php");
            }
        </script>
    </body>
</html>