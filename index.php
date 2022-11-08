
<?php

header("X-XSS-Protection: 1; mode=block");
header("X-Content-Type-Options: nosniff");
header("Strict-Transport-Security: max-age=31536000 ; includeSubDomains; preload");

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/css.css">
    <title>AIMG</title>
</head>
<body>
    <div class="header">
        <div class="container">
            <div class="head">
                <div class="logo">
                    <h1></h1>
                </div>
                <div class="three">
            
                    <a href="#">  <h1></h1></a>
                    <a href="#">  <h1></h1></a>
                   
                  <a href="#"> <h1></h1></a>
                </div>
            </div>
            <div class="sub">
                <h1>ENTER YOUR PAGE</h1>
                <p>LIKE <span id=enter>https://salim.com/img.html</span></p>
                <form method="POST">
                    <input type="text" name="name" id="" placeholder="YOUR PAGE URL">
                    <!-- <input type="submit" name=""> -->
                    <br>
                    <button>SUBMIT</button>
                </form>
            </div>
            <?php

          if ($_SERVER['REQUEST_METHOD'] =='POST') 
 {
error_reporting(0);
ini_set('display_errors', 0);
try{

 function fix($key)
    {
        # code...
    $dd=stripos($key,'"',0);
    $ss=substr($key,$dd+1,strlen($key));
    $dd2=stripos($ss,'"',0);
    $ss2=substr($ss,0,$dd2);
    return $ss2;
    }

function search($result)
    {

preg_match_all('!src=[\"](.+?)(.jpg|.png|jpeg|.helf|.png|.gif|.svg|.tlff|.raw)[\"]!',$result, $matchesss);
    $uniqss=array_unique($matchesss);
    foreach ($uniqss[0] as $keyss) {
    echo '<img src='.fix($keyss).' style="width: 25%;
    height: 300%;
    border-radius: 30px;">';
    
    }
  
    }

function searchurl($result)
    {
preg_match_all('!href=[\"](.+?)[\"]!',$result, $matchess);
$uniqs=array_unique($matchess);
foreach ($uniqs[0] as $keys) {
    $resultss=file_get_contents(fix($keys));
    search($resultss);
}

    }
$result=file_get_contents($_POST['name']);
search($result);    
searchurl($result);

}catch(Exception $e) {
  echo 'error: ';
}



}









            ?>
                   
                </div>
             
            </div>
        </div>
    
    </div>

</body>
</html>
