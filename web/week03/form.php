<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Form Result</title>
    <link rel="stylesheet" type="text/css" href="form_theme.css">
    <?php include "../head.php"
    ?>
</head>

<body class="container">
    <div id="body">
        <div class="row">
            <div class="col-md-12" id="header">
                <h2 id="title">Submit a Form</h2> </div>
        </div>
        <div class="row" id="center">
            <div class="col-md-12" id="center-middle">
                <form action="result.php" method="post"> Name:
                    <input type="text" name="name">
                    <br> Email:
                    <input type="text" name="email">
                    <br>
                    
                    <?php 
                    $majors = array("Computer Science", "Web Design and Development", "Computer Information Technology", "Computer Engineering");      
                        foreach($majors as $major){
                            echo '<input type="radio" name="major" value="' . $major . '"> ' . $major . ' <br>';
                        }
                    ?>
                     Comments
                    <br>
                    <textarea name="comments"></textarea>
                    <br>
                    <input type="checkbox" name="continents[]" value="North America"> North America <br>
                    <input type="checkbox" name="continents[]" value="South America"> South America<br>
                    <input type="checkbox" name="continents[]" value="Europe"> Europe<br>
                    <input type="checkbox" name="continents[]" value="Asia"> Asia<br>
                    <input type="checkbox" name="continents[]" value="Antarctica"> Antarctica<br>
                    <input type="checkbox" name="continents[]" value="Australia"> Australia<br>
                    <input type="checkbox" name="continents[]" value="Africa"> Africa<br>
                    <input type="submit" value="Submit"> </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" id="footer"> Footer stuff </div>
        </div>
    </div>
</body>

</html>