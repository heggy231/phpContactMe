<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--This is where title each pgae processed-->
    <title><?php echo $title; ?></title>

    <link href='https://fonts.googleapis.com/css?family=Finger Paint' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Schoolbell' rel='stylesheet' type='text/css'>
    <link href="myStyle.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/gif" href="https://cdn.glitch.com/57bc3237-9d5f-442e-88f6-04e92041b5f7%2FpikaRun.gif?1497030320530">

    <script>
    function customMenu(){
        // querySelectorAll gives us an array of info about elements with .menu class
        var allMenuItems = document.querySelectorAll(".menu");
        // grab the url for comparison
        var myUrl = window.location.href;
        var foundIt = false;
        for (var i = 0; i < allMenuItems.length; i++) {
            // console.log(allMenuItems[i].id);
            // loop through the menu and find the href somewhere in the URL
            var finder = myUrl.indexOf(allMenuItems[i].href);
            // console.log(allMenuItems[i].href);
            if(finder > -1) {
                // use the result of the querySelectAll to get the id of the match
                // and change the style
                foundIt = true;
                document.getElementById(allMenuItems[i].id).style.color = "#BBB";
            } else {
                // white
                allMenuItems[i].style.color = "#FFF";
            }
        }
        if (foundIt === false) {
            document.getElementById("index").style.color = "#BBB";
        }
    }
    </script>
    
</head>

<body onload="customMenu()">
<div class="row">
    <div id="nav">
        <ul id="MenuBar1" class="MenuBarHorizontal">
            <li><a href="index.php" class="menu" id="index">Home</a></li>
            <li><a href="story.php" class="menu" id="story">Videos</a></li>
            <li><a href="form.php" class="menu" id="form">Contact</a></li>
        </ul>
    </div> 
