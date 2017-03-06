
<?php
$this->layout = "defaultHead";
?>
<!DOCTYPE html>
<html>
<body class="w3-content" style="max-width:1200px">

<!-- Sidenav/menu -->
<nav class="w3-sidenav w3-white w3-collapse w3-top" style="z-index:3;width:150px" id="mySidenav">
    <div class="w3-container w3-padding-16">
        <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-closebtn w3-hover-text-red"></i>
        <h3 class="w3-wide"><b>LOGO</b></h3>
    </div>
    <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
        <a href="#">Shirts</a>
        <a href="#">Dresses</a>
        <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-text-black" id="myBtn">
            Jeans <i class="fa fa-caret-down"></i>
        </a>
        <div id="demoAcc" class="w3-hide w3-padding-large w3-medium">
            <a href="#" class="w3-light-grey"><i class="fa fa-caret-right w3-margin-right"></i>Skinny</a>
            <a href="#">Relaxed</a>
            <a href="#">Bootcut</a>
            <a href="#">Straight</a>
        </div>
        <a href="#">Jackets</a>
        <a href="#">Gymwear</a>
        <a href="#">Blazers</a>
        <a href="#">Shoes</a>
    </div>
    <a href="#footer" class="w3-padding">Contact</a>
    <a href="javascript:void(0)" class="w3-padding" onclick="document.getElementById('newsletter').style.display='block'">Newsletter</a>
    <a href="#footer"  class="w3-padding">Subscribe</a>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-black w3-xlarge w3-padding-24">
    <span class="w3-left w3-wide">LOGO</span>
    <a href="javascript:void(0)" class="w3-right w3-opennav" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidenav on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">

    <!-- Push down content on small screens -->
    <div class="w3-hide-large" style="margin-top:83px"></div>

    <!-- Top header -->
    <header class="w3-container w3-xlarge">
        <p class="w3-left">Jeans</p>
        <p class="w3-right">
            <i class="fa fa-shopping-cart w3-margin-right"></i>
            <i class="fa fa-search"></i>
        </p>
    </header>

    <!-- Image header -->
    <div class="w3-display-container w3-container">
        <img src="/w3images/jeans.jpg" alt="Jeans" style="width:100%">
        <div class="w3-display-topleft w3-padding-xxlarge w3-text-white">
            <h1 class="w3-jumbo w3-hide-small">New arrivals</h1>
            <h1 class="w3-hide-large w3-hide-medium">New arrivals</h1>
            <h1 class="w3-hide-small">COLLECTION 2016</h1>
            <p><a href="#jeans" class="w3-button w3-black w3-padding-large w3-large">SHOP NOW</a></p>
        </div>
    </div>

    <div class="w3-container w3-text-grey" id="jeans">
        <p>8 items</p>
    </div>

    <!-- Product grid -->
    <div class="w3-row w3-grayscale">
        <div class="w3-col l3 s6">
            <div class="w3-container">
                <img src="/w3images/jeans1.jpg" style="width:100%">
                <p>Ripped Skinny Jeans<br><b>$24.99</b></p>
            </div>
            <div class="w3-container">
                <img src="/w3images/jeans2.jpg" style="width:100%">
                <p>Mega Ripped Jeans<br><b>$19.99</b></p>
            </div>
        </div>

        <div class="w3-col l3 s6">
            <div class="w3-container">
                <div class="w3-display-container">
                    <img src="/w3images/jeans2.jpg" style="width:100%">
                    <span class="w3-tag w3-display-topleft">New</span>
                    <div class="w3-display-middle w3-display-hover">
                        <button class="w3-button">Buy now <i class="fa fa-shopping-cart"></i></button>
                    </div>
                </div>
                <p>Mega Ripped Jeans<br><b>$19.99</b></p>
            </div>
            <div class="w3-container">
                <img src="/w3images/jeans3.jpg" style="width:100%">
                <p>Washed Skinny Jeans<br><b>$20.50</b></p>
            </div>
        </div>

        <div class="w3-col l3 s6">
            <div class="w3-container">
                <img src="/w3images/jeans3.jpg" style="width:100%">
                <p>Washed Skinny Jeans<br><b>$20.50</b></p>
            </div>
            <div class="w3-container">
                <div class="w3-display-container">
                    <img src="/w3images/jeans4.jpg" style="width:100%">
                    <span class="w3-tag w3-display-topleft">Sale</span>
                    <div class="w3-display-middle w3-display-hover">
                        <button class="w3-button">Buy now <i class="fa fa-shopping-cart"></i></button>
                    </div>
                </div>
                <p>Vintage Skinny Jeans<br><b class="w3-text-red">$14.99</b></p>
            </div>
        </div>

        <div class="w3-col l3 s6">
            <div class="w3-container">
                <img src="/w3images/jeans4.jpg" style="width:100%">
                <p>Vintage Skinny Jeans<br><b>$14.99</b></p>
            </div>
            <div class="w3-container">
                <img src="/w3images/jeans1.jpg" style="width:100%">
                <p>Ripped Skinny Jeans<br><b>$24.99</b></p>
            </div>
        </div>
    </div>
    </div>
</div>

<!-- Newsletter Modal -->
<div id="newsletter" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-padding-jumbo">
        <div class="w3-container w3-white w3-center">
            <i onclick="document.getElementById('newsletter').style.display='none'" class="fa fa-remove w3-closebtn w3-xlarge w3-hover-text-grey w3-margin"></i>
            <h2 class="w3-wide">NEWSLETTER</h2>
            <p>Join our mailing list to receive updates on new arrivals and special offers.</p>
            <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail"></p>
            <button type="button" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('newsletter').style.display='none'">Subscribe</button>
        </div>
    </div>
</div>

<script>
    // Accordion
    function myAccFunc() {
        var x = document.getElementById("demoAcc");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }

    // Click on the "Jeans" link on page load to open the accordion for demo purposes
    document.getElementById("myBtn").click();


    // Script to open and close sidenav
    function w3_open() {
        document.getElementById("mySidenav").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
    }

    function w3_close() {
        document.getElementById("mySidenav").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
    }
</script>

</body>
</html>
