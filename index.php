<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.2.0.60582 -->
    <meta charset="utf-8">
    <title>Welcome to Fusion Family Consulting</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="style.responsive.css" media="all">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Advent+Pro|Quicksand|Droid+Serif|Belleza|Cabin&amp;subset=latin">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <script src="script.responsive.js"></script>
<meta name="description" content="Fusion Family Consulting offers psychiatric and mind wellness services to children, adolescents and adults and is located in the heart of Plano, Texas. ">
<meta name="keywords" content="Psychiatric services, mental health, DFW, adults, children, adolescents, psychiatrist, psychologist, autism.">


<script>jQuery(function ($) {
    'use strict';
    if ($.fn.slider) {
        $(".art-slidecontainer06f1034e87d948909363faf737f3f3c1").each(function () {
            var slideContainer = $(this), tmp;
            var inner = $(".art-slider-inner", slideContainer);
            var helper = null;
            
            if ($.support.transition) {
                helper = new BackgroundHelper();
                helper.init("fade", "next", $(".art-slide-item", inner).first().css($.support.transition.prefix + "transition-duration"));
                inner.children().each(function () {
                    helper.processSlide($(this));
                });

                
            } else if (browser.ie && browser.version <= 8) {
                var slidesInfo = {
".art-slide06f1034e87d948909363faf737f3f3c10": {
    "bgimage" : "url('images/slide06f1034e87d948909363faf737f3f3c10.jpg')",
    "bgposition": "0 0",
    "images": "",
    "positions": ""
},
".art-slide06f1034e87d948909363faf737f3f3c11": {
    "bgimage" : "url('images/slide06f1034e87d948909363faf737f3f3c11.jpg')",
    "bgposition": "0 0",
    "images": "",
    "positions": ""
},
".art-slide06f1034e87d948909363faf737f3f3c12": {
    "bgimage" : "url('images/slide06f1034e87d948909363faf737f3f3c12.jpg')",
    "bgposition": "0 0",
    "images": "",
    "positions": ""
},
".art-slide06f1034e87d948909363faf737f3f3c13": {
    "bgimage" : "url('images/slide06f1034e87d948909363faf737f3f3c13.jpg')",
    "bgposition": "0 0",
    "images": "",
    "positions": ""
},
".art-slide06f1034e87d948909363faf737f3f3c14": {
    "bgimage" : "url('images/slide06f1034e87d948909363faf737f3f3c14.jpg')",
    "bgposition": "0 0",
    "images": "",
    "positions": ""
}
                };
                $.each(slidesInfo, function(selector, info) {
                    processElementMultiplyBg(slideContainer.find(selector), info);
                });
            }

            inner.children().eq(0).addClass("active");
            slideContainer.slider({
                pause: 6600,
                speed: 600,
                repeat: true,
                animation: "fade",
                direction: "next",
                navigator: slideContainer.siblings(".art-slidenavigator06f1034e87d948909363faf737f3f3c1"),
                helper: helper
            });
            
                        
        });
    }
});
</script><style>.art-content .art-postcontent-0 .layout-item-0 { padding: 5px;  }
.ie7 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
.ie6 .art-post .art-layout-cell {border:none !important; padding:0 !important; }

.art-slidecontainer06f1034e87d948909363faf737f3f3c1 {
    position: relative;
        width: 529px;
    height: 396px;
        }

.default-responsive .art-header .art-slidecontainer06f1034e87d948909363faf737f3f3c1,
.responsive .art-header .art-slidecontainer06f1034e87d948909363faf737f3f3c1
{
  position: absolute !important;
}

.responsive .art-pageslider .art-slidecontainer06f1034e87d948909363faf737f3f3c1 {
  position: absolute !important;
}

.art-slidecontainer06f1034e87d948909363faf737f3f3c1 .art-slide-item
{

    -webkit-transform: rotate(0);
    -moz-transform: rotate(0);
    transform: rotate(0);
}



.art-slidecontainer06f1034e87d948909363faf737f3f3c1 .art-slide-item {
    -webkit-transition: 600ms ease-in-out opacity;
    -moz-transition: 600ms ease-in-out opacity;
    -ms-transition: 600ms ease-in-out opacity;
    -o-transition: 600ms ease-in-out opacity;
    transition: 600ms ease-in-out opacity;
    position: absolute !important;
    display: none;
	left: 0;
	top: 0;
	opacity: 0;
    width:  100%;
    height: 100%;
}

.art-slidecontainer06f1034e87d948909363faf737f3f3c1 .active, .art-slidecontainer06f1034e87d948909363faf737f3f3c1 .next, .art-slidecontainer06f1034e87d948909363faf737f3f3c1 .prev {
    display: block;
}

.art-slidecontainer06f1034e87d948909363faf737f3f3c1 .active {
    opacity: 1;
}

.art-slidecontainer06f1034e87d948909363faf737f3f3c1 .next, .art-slidecontainer06f1034e87d948909363faf737f3f3c1 .prev {
    width: 100%;
}

.art-slidecontainer06f1034e87d948909363faf737f3f3c1 .next.forward, .art-slidecontainer06f1034e87d948909363faf737f3f3c1 .prev.back {
    opacity: 1;
}

.art-slidecontainer06f1034e87d948909363faf737f3f3c1 .active.forward {
    opacity: 0;
}

.art-slidecontainer06f1034e87d948909363faf737f3f3c1 .active.back {
    opacity: 0;
}


.art-slide06f1034e87d948909363faf737f3f3c10 {
    background-image:  url('images/slide06f1034e87d948909363faf737f3f3c10.jpg');
        /* background-size:  auto auto; */
        background-position:  center center;
    background-repeat: no-repeat;
}

/* special setup for header/pageslider */
.responsive .art-header .art-slide06f1034e87d948909363faf737f3f3c10 {
    background-image:  url('images/slide06f1034e87d948909363faf737f3f3c10.jpg');
    background-size: auto auto;
    background-position:  center center;
    background-repeat: no-repeat;
}

.responsive .art-pageslider .art-slide06f1034e87d948909363faf737f3f3c10 {
    background-image:  url('images/slide06f1034e87d948909363faf737f3f3c10.jpg');
    background-size: auto auto;
    background-position:  center center;
    background-repeat: no-repeat;
}

.default-responsive .art-header .art-slide06f1034e87d948909363faf737f3f3c10 {
    background-image: url('images/slide06f1034e87d948909363faf737f3f3c10.jpg');
    background-size: auto auto;
    background-position: center center;
    background-repeat: no-repeat;
}

.default-responsive .art-pageslider .art-slide06f1034e87d948909363faf737f3f3c10 {
    background-image: url('images/slide06f1034e87d948909363faf737f3f3c10.jpg');
    background-size: auto auto;
    background-position: center center;
    background-repeat: no-repeat;
}.art-slide06f1034e87d948909363faf737f3f3c11 {
    background-image:  url('images/slide06f1034e87d948909363faf737f3f3c11.jpg');
        /* background-size:  auto auto; */
        background-position:  center center;
    background-repeat: no-repeat;
}

/* special setup for header/pageslider */
.responsive .art-header .art-slide06f1034e87d948909363faf737f3f3c11 {
    background-image:  url('images/slide06f1034e87d948909363faf737f3f3c11.jpg');
    background-size: auto auto;
    background-position:  center center;
    background-repeat: no-repeat;
}

.responsive .art-pageslider .art-slide06f1034e87d948909363faf737f3f3c11 {
    background-image:  url('images/slide06f1034e87d948909363faf737f3f3c11.jpg');
    background-size: auto auto;
    background-position:  center center;
    background-repeat: no-repeat;
}

.default-responsive .art-header .art-slide06f1034e87d948909363faf737f3f3c11 {
    background-image: url('images/slide06f1034e87d948909363faf737f3f3c11.jpg');
    background-size: auto auto;
    background-position: center center;
    background-repeat: no-repeat;
}

.default-responsive .art-pageslider .art-slide06f1034e87d948909363faf737f3f3c11 {
    background-image: url('images/slide06f1034e87d948909363faf737f3f3c11.jpg');
    background-size: auto auto;
    background-position: center center;
    background-repeat: no-repeat;
}.art-slide06f1034e87d948909363faf737f3f3c12 {
    background-image:  url('images/slide06f1034e87d948909363faf737f3f3c12.jpg');
        /* background-size:  auto auto; */
        background-position:  center center;
    background-repeat: no-repeat;
}

/* special setup for header/pageslider */
.responsive .art-header .art-slide06f1034e87d948909363faf737f3f3c12 {
    background-image:  url('images/slide06f1034e87d948909363faf737f3f3c12.jpg');
    background-size: auto auto;
    background-position:  center center;
    background-repeat: no-repeat;
}

.responsive .art-pageslider .art-slide06f1034e87d948909363faf737f3f3c12 {
    background-image:  url('images/slide06f1034e87d948909363faf737f3f3c12.jpg');
    background-size: auto auto;
    background-position:  center center;
    background-repeat: no-repeat;
}

.default-responsive .art-header .art-slide06f1034e87d948909363faf737f3f3c12 {
    background-image: url('images/slide06f1034e87d948909363faf737f3f3c12.jpg');
    background-size: auto auto;
    background-position: center center;
    background-repeat: no-repeat;
}

.default-responsive .art-pageslider .art-slide06f1034e87d948909363faf737f3f3c12 {
    background-image: url('images/slide06f1034e87d948909363faf737f3f3c12.jpg');
    background-size: auto auto;
    background-position: center center;
    background-repeat: no-repeat;
}.art-slide06f1034e87d948909363faf737f3f3c13 {
    background-image:  url('images/slide06f1034e87d948909363faf737f3f3c13.jpg');
        /* background-size:  auto auto; */
        background-position:  center center;
    background-repeat: no-repeat;
}

/* special setup for header/pageslider */
.responsive .art-header .art-slide06f1034e87d948909363faf737f3f3c13 {
    background-image:  url('images/slide06f1034e87d948909363faf737f3f3c13.jpg');
    background-size: auto auto;
    background-position:  center center;
    background-repeat: no-repeat;
}

.responsive .art-pageslider .art-slide06f1034e87d948909363faf737f3f3c13 {
    background-image:  url('images/slide06f1034e87d948909363faf737f3f3c13.jpg');
    background-size: auto auto;
    background-position:  center center;
    background-repeat: no-repeat;
}

.default-responsive .art-header .art-slide06f1034e87d948909363faf737f3f3c13 {
    background-image: url('images/slide06f1034e87d948909363faf737f3f3c13.jpg');
    background-size: auto auto;
    background-position: center center;
    background-repeat: no-repeat;
}

.default-responsive .art-pageslider .art-slide06f1034e87d948909363faf737f3f3c13 {
    background-image: url('images/slide06f1034e87d948909363faf737f3f3c13.jpg');
    background-size: auto auto;
    background-position: center center;
    background-repeat: no-repeat;
}.art-slide06f1034e87d948909363faf737f3f3c14 {
    background-image:  url('images/slide06f1034e87d948909363faf737f3f3c14.jpg');
        /* background-size:  auto auto; */
        background-position:  center center;
    background-repeat: no-repeat;
}

/* special setup for header/pageslider */
.responsive .art-header .art-slide06f1034e87d948909363faf737f3f3c14 {
    background-image:  url('images/slide06f1034e87d948909363faf737f3f3c14.jpg');
    background-size: auto auto;
    background-position:  center center;
    background-repeat: no-repeat;
}

.responsive .art-pageslider .art-slide06f1034e87d948909363faf737f3f3c14 {
    background-image:  url('images/slide06f1034e87d948909363faf737f3f3c14.jpg');
    background-size: auto auto;
    background-position:  center center;
    background-repeat: no-repeat;
}

.default-responsive .art-header .art-slide06f1034e87d948909363faf737f3f3c14 {
    background-image: url('images/slide06f1034e87d948909363faf737f3f3c14.jpg');
    background-size: auto auto;
    background-position: center center;
    background-repeat: no-repeat;
}

.default-responsive .art-pageslider .art-slide06f1034e87d948909363faf737f3f3c14 {
    background-image: url('images/slide06f1034e87d948909363faf737f3f3c14.jpg');
    background-size: auto auto;
    background-position: center center;
    background-repeat: no-repeat;
}

.art-slidenavigator06f1034e87d948909363faf737f3f3c1 {
  display: inline-block;
  position: absolute;
  direction: ltr !important;
  top: 372px;
  left: 80.34%;
  z-index: 101;
  line-height: 0 !important;
  -webkit-background-origin: border !important;
  -moz-background-origin: border !important;
  background-origin: border-box !important;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  text-align: center;
    white-space: nowrap;
    }
.art-slidenavigator06f1034e87d948909363faf737f3f3c1
{
background: #9EC8EA;background: -webkit-linear-gradient(top, rgba(226, 238, 249, 0.6) 0, rgba(91, 162, 220, 0.6) 100%) no-repeat;background: -moz-linear-gradient(top, rgba(226, 238, 249, 0.6) 0, rgba(91, 162, 220, 0.6) 100%) no-repeat;background: -o-linear-gradient(top, rgba(226, 238, 249, 0.6) 0, rgba(91, 162, 220, 0.6) 100%) no-repeat;background: -ms-linear-gradient(top, rgba(226, 238, 249, 0.6) 0, rgba(91, 162, 220, 0.6) 100%) no-repeat;-svg-background: linear-gradient(top, rgba(226, 238, 249, 0.6) 0, rgba(91, 162, 220, 0.6) 100%) no-repeat;background: linear-gradient(to bottom, rgba(226, 238, 249, 0.6) 0, rgba(91, 162, 220, 0.6) 100%) no-repeat;
-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;


padding:7px;





}
.art-slidenavigator06f1034e87d948909363faf737f3f3c1 > a
{
background: #2572B1;background: #2572B1;background: #2572B1;background: #2572B1;background: #2572B1;-svg-background: #2572B1;background: #2572B1;
-webkit-border-radius:50%;-moz-border-radius:50%;border-radius:50%;



margin:0 10px 0 0;

width: 10px;

height: 10px;
}
.art-slidenavigator06f1034e87d948909363faf737f3f3c1 > a.active
{
background: #C7C7C7;background: #C7C7C7;background: #C7C7C7;background: #C7C7C7;background: #C7C7C7;-svg-background: #C7C7C7;background: #C7C7C7;
-webkit-border-radius:50%;-moz-border-radius:50%;border-radius:50%;



margin:0 10px 0 0;

width: 10px;

height: 10px;
}
.art-slidenavigator06f1034e87d948909363faf737f3f3c1 > a:hover
{
background: #949494;background: #949494;background: #949494;background: #949494;background: #949494;-svg-background: #949494;background: #949494;
-webkit-border-radius:50%;-moz-border-radius:50%;border-radius:50%;



margin:0 10px 0 0;

width: 10px;

height: 10px;
}

</style></head>
<body>
<div id="art-main">
    <div class="art-sheet clearfix">
<header class="art-header">

    <div class="art-shapes">
        
            </div>






                
                    
</header>
<nav class="art-nav">
    <ul class="art-hmenu"><li><a href="index.php" class="active">Home</a></li><li><a href="services.php">Services</a></li><li><a href="clinicians.php">Clinicians</a></li><li><a href="patients.php">Patients</a></li><li><a href="contact.php">Contact</a></li></ul> 
    </nav>
<div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
                                <h2 class="art-postheader">Welcome to Fusion Family Consulting</h2>
                                                
                <div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 100%" >
<div id="06f1034e87d948909363faf737f3f3c1" style="position: relative; display: inline-block; z-index: 0; margin: 5px;  border-width: 0px;  float: right;" class="art-collage">
<div class="art-slider art-slidecontainer06f1034e87d948909363faf737f3f3c1" data-width="529" data-height="396">
    <div class="art-slider-inner">
<div class="art-slide-item art-slide06f1034e87d948909363faf737f3f3c10" >


</div>
<div class="art-slide-item art-slide06f1034e87d948909363faf737f3f3c11" >


</div>
<div class="art-slide-item art-slide06f1034e87d948909363faf737f3f3c12" >


</div>
<div class="art-slide-item art-slide06f1034e87d948909363faf737f3f3c13" >


</div>
<div class="art-slide-item art-slide06f1034e87d948909363faf737f3f3c14" >


</div>

    </div>
</div>
<div class="art-slidenavigator art-slidenavigator06f1034e87d948909363faf737f3f3c1" data-left="1" data-top="1">
<a href="#" class="art-slidenavigatoritem"></a><a href="#" class="art-slidenavigatoritem"></a><a href="#" class="art-slidenavigatoritem"></a><a href="#" class="art-slidenavigatoritem"></a><a href="#" class="art-slidenavigatoritem"></a>
</div>



    </div>

        
         
         
         
         
         
         
         
         
         
         
        <p style="text-align: justify; line-height: 14px; margin-top: 0px; margin-bottom: 14px; color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; widows: 1;"><br><span style="font-family: Belleza, Arial, 'Arial Unicode MS', Helvetica, sans-serif; font-size: 16px;">We offer a broad scope of services all with the sole aim of improving and maintaning the wellness of our patients. 
         Our services are available to children, adolescents, adults, couples and families.</span></p><p style="text-align: justify; line-height: 14px; margin-top: 0px; margin-bottom: 14px; color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; widows: 1;"><span style="font-family: Belleza, Arial, 'Arial Unicode MS', Helvetica, sans-serif; font-size: 16px;">At Fusion Family Consulting we strive to provide extensive, compassionate care which is facilitated by 
         a comprehensive approach that involves collaboration between the patient, family, therapist, and any other
         vital team member.
         
        </span></p><p style="text-align: justify; line-height: 14px; margin-top: 0px; margin-bottom: 14px; color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; widows: 1;"><span style="font-family: Belleza, Arial, 'Arial Unicode MS', Helvetica, sans-serif; font-size: 16px;">In order to treat a variety of mental illnesses and behavioral health problems we utilise different methods: psychotherapy, 
         medication management, psychoanalysis, pharmacogenomics, and personal training. Together we will come to understand how each person interacts with others,
         struggles with personal feelings, grows self-esteem, and achieves success in daily activities. 
         
        </span></p><p style="text-align: justify; line-height: 14px; margin-top: 0px; margin-bottom: 14px; color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; widows: 1;"><span style="font-family: Belleza, Arial, 'Arial Unicode MS', Helvetica, sans-serif; font-size: 16px;">The first step is the evaluation of the patient's needs, offer the patient and/or family members our first impressions of a 
         treatment plan, and then create a treatment plan together that will guide the rest of our sessions.</span></p><p style="text-align: justify; line-height: 14px; margin-top: 0px; margin-bottom: 14px; color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; widows: 1;"><img width="251" height="34" alt="(214) 296-9365" src="images/smphone.gif"><span style="color: rgb(36, 44, 46); font-family: Georgia, 'Times New Roman', Times, serif; line-height: 19px; text-align: left;"><br></span></p><p><a href="#"></a></p>
    </div>
    </div>
</div>
</div>


</article></div>
                    </div>
                </div>
            </div><footer class="art-footer">
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 100%">
        <p><span style="font-size: 13px;">© 2015 Fusion Family Consulting. All Rights Reserved.</span><br></p>
    </div>
    </div>
</div>

</footer>

    </div>
</div>


</body></html>