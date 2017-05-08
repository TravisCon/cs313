<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Form Entry</title>
    <link rel="stylesheet" type="text/css" href="form_theme.css">
    <?php include "../head.php"
    ?>
</head>

<body class="container">
    <div id="body">
        <div class="row">
            <div class="col-md-12" id="header">
                <h2 id="title">Your Information Below</h2> </div>
        </div>
        <div class="row" id="center">
            <div class="col-md-12" id="center-middle">
                <?php
                    $email = $_POST["email"];
                    echo "Name: " . $_POST["name"] . "<br>";
                    echo 'Email: <a href="mailto:' . $email . '">' . $email . '</a><br>';
                    echo 'Major: ' . $_POST["major"] . '<br>';
                    echo 'Extra Comments: ' . $_POST['comments'] . '<br>';
                    $continents = $_POST["continents"];
                    foreach ($continents as $cont)
                    {   
                        echo $cont;
                        if ($cont != end($continents))
                            echo ', ';
                    }
                ?> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" id="footer"> Footer stuff </div>
        </div>
    </div>
</body>

</html>