<?php include_once("home.html"); ?>
<!DOCTYPE HTML>
<html>
   <head>
      <link rel="shortcut icon" href="meetup.png">
      <title>Event Recommender</title>
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <meta name="keywords" content="event, recommender">
      <meta name="description" content="Event Recommender">
      <link rel="stylesheet" href="//yui.yahooapis.com/pure/0.5.0/pure-min.css">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href='//fonts.googleapis.com/css?family=Roboto:400,100,300,700,500,900' rel='stylesheet' type='text/css'>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script>
      <script src="js/skel.min.js"></script>
      <script src="js/skel-panels.min.js"></script>
      <script src="js/init.js"></script>
      <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <noscript>
         <link rel="stylesheet" href="css/skel-noscript.css" />
         <link rel="stylesheet" href="css/style.css" />
         <link rel="stylesheet" href="css/style-desktop.css" />
      </noscript>
      <script>
         (
         function(i,s,o,g,r,a,m)
         {i['GoogleAnalyticsObject']=r;i[r]=i[r]||
            
            function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
         })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
         
         ga('create', 'UA-46290758-1', 'autosummarizer.com');
         ga('send', 'pageview');
         
      </script>
      <script>
         function init() {
            $("#loading").hide();
         }
        function myFunction() {
           var text = document.getElementById('styled').value
           document.getElementById("loading").style.visibility = "visible";
            $.ajax({
               type: "POST",
               url: "https://precis.herokuapp.com/summary",
               data: JSON.stringify({'text': text}),
               // dataType: 'json',
               contentType: 'application/json; charset=UTF-8',
               success: function(data) {
                   //show content
                   obje = JSON.parse(data)
                   document.getElementById('position').innerHTML = '<b>'.concat(obje.summary, '</b>');
                   $( "#position" ).show( "slow", function() {
                     
                  });
                   document.getElementById("loading").style.visibility = "hidden";
                   return true;
               },
               error: function(xhr, textStatus, err) {
                  alert(xhr.responseText);
                   alert('text status '+textStatus+', err '+err);
                   document.getElementById("loading").style.visibility = "hidden";
                   return true;
               }
            });
            return false;
        }
    </script>
      <style>
         .beta
         {
         position:absolute;
         left:2px;
         top:17px;
         z-index:9999;
         }
      </style>
      <div class="beta">
         <a href="index.php">
            <img src="meetup.png" alt="event recommender" height="65" width="80">
         </a>
      </div>
      <style>
         #reli {
         height:15px;
         width:100%;
         color:black;
         }
         .black-background {background-color:#000000;}
         .white {color:#ffffff;}
      </style>
      <div id="reli">
      </div>
   </head>
   <body class="homepage">
      <!-- Header -->
      <!-- Featured -->
      <div id="featured">
         <div class="container">
            <header>
               <a href="index.php">
                  <h2 style="color:#DC143C;">Meetup Event Recommender</h2>
               </a>
               <h3>Start getting recommendations</h3>
            </header>
            <style type="text/css">
               .custombutton a{
                  color:black;
               }
            </style>

            <a href="data_dashboard.php" class="button1" role="button">Data Dashboard</a>
         <style>
            #position {
            width:60%;
            margin:0 auto;
            padding-top: 25px;
            }
         </style>
         <script></script>
         <script>
            $( "#smm" ).click(function() {
               $( "#position" ).hide( "slow", function() {
                  
               });
            });
         </script>
         <br/>
         <br/>
         <div id="loading" style="visibility:hidden;">
            <img src="ajax-loader.gif" style="width:25% ">
            </img>
         </div>
         <div id="position">
         </div>
         <br>
         <br>
         <style>
            #kauu {
            font-size: 10px;
            width: 728px; 
            height:90px;
            text-align:left;
            }
         </style>
         <center>
         <p></p>
         <hr />
      </div>
      </div>
      <!-- Footer -->
      <div id="footer">
         <div class="container">
            <section>
               <ul class="contact">
                  <li><a href="#" class="fa fa-twitter"><span>Twitter</span></a></li>
                  <li class="active"><a href="https://www.facebook.com/profile.php?id=100000140862582" class="fa fa-facebook"  target="_blank"><span>Facebook</span></a></li>
               </ul>
            </section>
         </div>
      </div>
      <!-- Copyright -->
      <div id="copyright">
         <div class="container">
            © All Copyrights Reserved by <a href="https://github.com/adityangud/Recommender_for_event_based_social_network"> WhatTheRec</a>, College Station, 77840, Contact us: <a href="mailto:whattherec@tamu.edu">whattherec@tamu.edu</a>
         </div>
      </div>
   </body>
</html>
