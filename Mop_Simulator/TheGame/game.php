<?php 
    /**
     * Required files
     */
    require_once "../includes/auth.inc.php";
    $a = new MyAccount();
    $b = new BaseFunc();


    $allUsersMaxScore = $a->getAllUsersMaxScore();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php 
        $a = new SiteConfig();
        echo $a->MainLinks("../");
    ?>

    <link rel="stylesheet" href="style.css">
    <style>
        canvas {
            border: 1px solid black;
            display: block;
            margin: 0 auto;
        }
    </style>

<title>Kitchen mop simulator</title>
</head>

<body>
<?php require_once("../_menu.php"); ?>
<?php if (isset($resp) && $resp != '') { echo $resp;}?>

    <input type="text" id="userId" value="<?php echo $_SESSION['uid']; ?>" style="display:none;">

    <h1>Score: </h1>
    <h1 id="score">0</h1>

    
    <br>
    <canvas></canvas>
    <button id="resetButton">Reset Game</button>
    <script src="Class/Images.js"></script>
    <script src="Class/Kaja.js"></script>
    <script src="Class/Felmoso.js"></script>
    <script src="EventListeners.js"></script>
    <script src="index.js"></script>

    <br>
    <h1>Users Score: </h1>
    <table class="table table-sm" style="width: 450px;">
        <thead class="table-dark">
            <tr>
                <th>User</th>
                <th>Highest Score</th>
            </tr>

        </thead>
        <?php


            foreach ($allUsersMaxScore as $key => $value) {
                $UserName = $value['UserName'];
                $MaxScore = $value['MaxScore'];

                $iamHere = NULL;
                if ($_SESSION['Username'] == $UserName ) {
                    $iamHere = '<i class="fa-solid fa-share"></i> ';
                }

                echo '
                <tr>
                    <td>'.$iamHere.$UserName.'</td>
                    <td>'.$MaxScore.'</td>
                </tr>
                
                ';
            }

        ?>

    </table>

    <br><br>


</body>
</html>


