<!doctype html>
<html lang="en">
<head>
  <title>SCP Foundation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="icon" href="images/title_logo.png" type="image" sizes="16x16">
</head>
<body>
    
<?php 
 $scp = json_decode(file_get_contents('scp.json'));
?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-logo" href="scp-002.html"><img src="images/logo1.jpg" alt="LOGO" height="50" width="55"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        
    <?php foreach($result as $item): ?>
        <li class="active">
<a href="index.php?page=<?php echo $item['item']; ?>"><?php echo $item['item']; ?></a>
        </li>
        <?php endforeach; ?>
      </ul>
      </div>
  </div>
</nav>
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <a class="button" style="background-color:#5fd1ab;width:auto;height:auto">Polytechnic Info</a>
      <br><br>
      <div id="div1" style="width:auto;height:auto;display:none;">
        <i class="fa fa-graduation-cap"></i> Toi Ohomai Institute of Technology
      </div>
        <br>
      <div id="div2" style="width:auto;height:auto;display:none;">
        <i class="fa fa-envelope"></i> info@toiohomai.ac.nz 
      </div>
        <br>
      <div id="div3" style="width:auto;height:auto;display:none;">
        <i class="fa fa-phone"></i> 0800 86 46 46 
      </div>
        </div>
        
<div class = 'col-sm-8 text-left'> 
 <div class=buttons style="text-align: center; margin-top:12px;">
    <button id="play"><img src="images/play.png" style="height:35px; weight:35px;"></button> &nbsp;
    <button id="pause"><img src="images/circled-pause.png" style="height:35px; weight:35px;"></button> &nbsp;
    <button id="stop"><img src="images/stops.png" style="height:35px; weight:35px;"></button>
</div>
<?php foreach($scp as $display): ?>
<article>
<h1 style="text-align: center;"><b>Item: </b><?php echo $display->item; ?></h1>
<h2 style="text-align: center;"><b>Object Class: </b><?php echo $display->class; ?></h2><br>

<div class='content'>
<h3 style="text-align: center;">Special Containment Procedures:</h3>
<p style="text-align: center;"><?php echo $display->containment; ?></p>
</div>
<hr>
<br>
<div class='content'>
<h3 style="text-align: center;">Description:</h3>
<p style="text-align: center;"><?php echo $display->description; ?></p>
</div>
<hr>
<br>
<div class='content'>
<h3 style="text-align: center;">Addendum:</h3>
<p style="text-align: center;"><?php echo $display->addendum; ?></p>
</div>
</article>
<hr>
<br>
<?php endforeach; ?>
</div>   
<hr>
<footer class="site-footer">
  <div class="container">
    <div class="row">
      <div class="col-md-5 col-sm-6 col-xs-12">
        <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved
        </p>
      </div>

      <div class="col-md-6 col-sm-6 col-xs-12">
        <ul class="social-icons">
          <li><a class="google" href="https://www.google.co.nz/search?ei=P9tKX6_sLpfAz7sPnbSN4Ac&q=scp+foundation&oq=scp+fou&gs_lcp=CgZwc3ktYWIQARgAMgcIABCxAxBDMgQIABBDMgQIABBDMgQIABBDMgIIADICCAAyAggAMgIIADICCAAyAggAOgQIABBHOgoIABCxAxCDARBDOgoILhCxAxCDARBDOgQILhBDUPagCljwpApgya0KaABwAXgAgAGkAYgBggWSAQMwLjSYAQCgAQGqAQdnd3Mtd2l6wAEB&sclient=psy-ab&safe=active&ssui=on"><i class="fa fa-google"></i></a></li>
          <li><a class="pinterest" href="https://www.pinterest.nz/SUNAKO666/scp-foundation/"><i class="fa fa-pinterest"></i></a></li>
          <li><a class="instagram" href="https://www.instagram.com/scpfoundationofficial/?hl=en"><i class="fa fa-instagram"></i></a></li>
          <li><a class="youtube-play" href="https://www.youtube.com/results?search_query=scp+foundation+explained"><i class="fa fa-youtube-play"></i></a></li>  
        </ul>
      </div>
    </div>
  </div>
</footer>
<script>
     onload = function() {
    if ('speechSynthesis' in window) with(speechSynthesis) {


        var playEle = document.querySelector('#play');
        var pauseEle = document.querySelector('#pause');
        var stopEle = document.querySelector('#stop');
        var flag = false;


        playEle.addEventListener('click', onClickPlay);
        pauseEle.addEventListener('click', onClickPause);
        stopEle.addEventListener('click', onClickStop);

        function onClickPlay() {
            if(!flag){
                flag = true;
                utterance = new SpeechSynthesisUtterance(document.querySelector('article').textContent);
                utterance.voice = getVoices()[0];
                utterance.onend = function(){
                    flag = false; playEle.className = pauseEle.className = ''; stopEle.className = 'stopped';
                };
                playEle.className = 'played';
                stopEle.className = '';
                speak(utterance);
            }
             if (paused) { /* unpause/resume narration */
                playEle.className = 'played';
                pauseEle.className = '';
                resume();
            } 
        }

        function onClickPause() {
            if(speaking && !paused){ /* pause narration */
                pauseEle.className = 'paused';
                playEle.className = '';
                pause();
            }
        }

        function onClickStop() {
            if(speaking){ /* stop narration */
                /* for safari */
                stopEle.className = 'stopped';
                playEle.className = pauseEle.className = '';
                flag = false;
                cancel();

            }
        }

    }

    else { /* speech synthesis not supported */
        msg = document.createElement('h5');
        msg.textContent = "Detected no support for Speech Synthesis";
        msg.style.textAlign = 'center';
        msg.style.backgroundColor = 'red';
        msg.style.color = 'white';
        msg.style.marginTop = msg.style.marginBottom = 0;
        document.body.insertBefore(msg, document.querySelector('div'));
    }

}
</script>
<script src="js/script.js"></script>
</body>
</html>