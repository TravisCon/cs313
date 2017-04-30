<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Meet Travis</title>
    <link rel="stylesheet" type="text/css" href="homestyle.css">
    <?php include "head.php"
    ?>
</head>

<body class="container">
    <div id="body">
        <?php 
        $currentPage = "profile";
        include "home-header.php"; 
        ?>
            <div class="row" id="center">
                <div class="col-md-12">
                    <div class="row equal">
                        <div class="col-md-6" id="center-left">
                            <p id="subheader">Condensed History</p>
                            <p>I was raised in Vegas my whole life. While growing up I was always interested in learning new things, as long as they were part of my interests. I liked learning about biology, animals, and computers. I loved going on camping trips, especially if we got out of Vegas. Nothing was more fun than roughing it in the trees and foliage while eating poptarts around a fire.</p>
                            <p>I picked up some fun talents and activities while growing up such as playing the Viola, something I no longer do. I also ran Cross Country in high school, also something I rarely do. I also played my fare share of videogames, but I don't have enough time to do that now. Even though I don't do those specifics tasks as much anymore, I have a developed a love for music, being healthy, and a slight competitive edge.</p>
                            <p>I served a mission for the LDS church in West Virginia. I learned how beautiful and humid the East Coast is. I also developed my faith in the Lord.</p>
                            <p>I currently attend BYU-Idaho and spend my spare time enjoying the outdoors in any way possible. Whether it is caving, shooting, sledding, or paintballing, I'm always down for an adventure. Down below you can find some pictures of my life experiences.</p>
                        </div>
                        <div class="col-md-6" id="center-right">
                            <p id="subheader">Hobbies</p>
                            <?php
                            $hobbies = array('Hiking', 'Cooking', 'Eating', 'Gaming', 'Sleeping', 'Camping');
                        echo '<ul>';
                        foreach ($hobbies as &$item){
                            echo '<li>'. $item . '</li>';
                        }
                        echo '</ul>';
                        ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="center-bottom">
                            <p id="subheader">Photos</p>
                            <?php
                            $photoDirectory = 'photos/biography';
                            $photoNames = array_diff(scandir($photoDirectory), array('..','.'));
                            foreach ($photoNames as &$photo){
                                echo '<img src="';
                                echo "photos/biography/$photo";
                                echo '" id="photos" ';
                                echo 'class="img-thumbnail img-responsive"> ';
                            }
                          ?> </div>
                    </div>
                </div>
            </div>
            <div class="row" id="footer">
                <div class="col-md-12"></div>
            </div>
    </div>
</body>

</html>