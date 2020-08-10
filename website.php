<?php
    session_start();

    //converted array to json to read in DOM
    $js_array = json_encode($_SESSION["rawImgArr"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLACK LIVES MATTER</title>
    
    <link rel="stylesheet" href="fonts/fonts.css" />
    <link rel="stylesheet" href="css/carousel.css"/>
    <link rel="stylesheet" href="css/index.css"/>
    <link rel="stylesheet" href="fancybox/fancybox.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<h1 id="header">BLACK LIVES MATTER</h1>

<div id="section1">
    <ul id ="navContainer">
        <li id="navItem" class="li listItem1 active" onclick="changeContent()">THE CAUSE</li>
        <li id="navItem" class="li listItem2" onclick="changeContent()">YOUR ROLE</li>
    </ul>
    <div id="section1Container">
        <div id="theCause" class="causeText"> 
        
            <div class="container">
                <div class="row">
                    <div class="col-sm test1"></div>
                    <div class="col-sm test2"></div>
                    <div class="col-sm test3"></div>
                </div>
            </div>

            <br>

            <div class="container">
                <div class="row">
                    <div class="col-sm test4"></div>
                    <div class="col-sm test5"></div>
                    <div class="col-sm test6"></div>
                </div>
            </div>

            <br>

            <div class="container">
                <div class="row">
                    <div class="col-sm test7"></div>
                    <div class="col-sm test8"></div>
                    <div class="col-sm test9"></div>
                </div>
            </div>

            </div>
        </div>
    </div>
</div>

<div id="section2"> 
    <div class="carousel js-flickity" id="carousel">
    </div>

    <a class="stripAnchorStyle" data-fancybox data-type="iframe" data-src="upload/index.php" href="javascript:;">
        <div id="uploadBtn" onclick='uploadPopup()' >WANT TO UPLOAD?</div>
    </a>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="js/carousel.js" ></script>
<script src="js/main.js"></script>

<script>
//logic for changing color of selected menu item
let navContainer = document.getElementById("navContainer");
let navItems = navContainer.getElementsByClassName("li");
for (var i = 0; i < navItems.length; i++) {
    navItems[i].addEventListener("click", function(){
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
    })
}

//logic for changing content of section1Container
const section1Container = document.getElementById('section1Container');
let sel1Visible = 1;

//creates elements, asign class names, and add to DOM
const myH1 = document.createElement('h1');
const myH2 = document.createElement('h1');
myH2.className = "roleText";
myH2.innerHTML = "We must continue to press forward on reciving justice for the individuals and their families. Whatever talent you have, whatever you can do, be apart of the shift to equality. Be apart of the change. <br><br> Here are some resources to help bring justice to those who have lost their lives. <br><br> <div class='roleLinks'><a target='_blank' href='https://www.google.com/maps/d/viewer?mid=1W3fsF5-Mz3_KaBgVt2pU8BDY5GkawUN_&ll=9.10194652876231%2C-54.84878109999998&z=2'>Map of protest</a></div>  <div class='roleLinks'><a class='stripAnchorStyle' data-fancybox data-type='iframe' data-src='donations.html' href='javascript:;'>Donations</a></div>  <div class='roleLinks'><a target='_blank' href='https://blacklivesmatters.carrd.co/#petitions'>Petitions</a></div> <div class='roleLinks'><a target='_blank' href='https://www.youtube.com/watch?v=YrHIQIO_bdQ&feature=youtu.be'>Educate youself</a></div> <br> <br> ";
section1Container.appendChild(myH2);

//function for swithcing between two views for secton1Container
function changeContent() {
    if(sel1Visible == 1){
        sel1Visible = 0;
        $(".causeText").css("display", "none");
        $(".roleText").fadeIn();

    }else {
        sel1Visible = 1;
        $(".roleText").css("display", "none");
        $(".causeText").fadeIn();
    }
}


$( document ).ready(function() {
    //imgArr converted to JSON for javascript 
    var jsonImgArr = <?php echo $js_array ?>;

    //Create elements for carousel 
    var carousel_cell_div = document.createElement("div");
    carousel_cell_div.className = "carousel-cell-div";
    var carousel_img_div = document.createElement("img");
    carousel_img_div.classList.add("carousel-img-div");

    //Append elements above to main carosel div
    var element = document.getElementById("carousel");
    element.appendChild(carousel_cell_div);
    carousel_cell_div.appendChild(carousel_img_div);

    //loop through array to create the amount of elements needed for carousel
    for(var i = 0; i < <?php echo $js_array ?>.length; i++ ) {
        console.log(jsonImgArr);
    }
});

//Create loop for images in rawImgArr to append to 

</script>
</body>
</html>