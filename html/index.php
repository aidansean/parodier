<?php

include_once('mysql.php') ;
$mySQL_connection = mysql_connect('localhost', $mysql_username, $mysql_password) or die('Could not connect: ' . mysql_error()) ;
mysql_select_db($mysql_database) or die('Could not select database') ;

$text = array() ;
$text[0] = 'KEEP'  ;
$text[1] = 'CALM'  ;
$text[2] = 'AND'   ;
$text[3] = 'CARRY' ;
$text[4] = 'ON'    ;
if(isset($_GET['text1'])) $text[0] = strtoupper($_GET['text1']) ;
if(isset($_GET['text2'])) $text[1] = strtoupper($_GET['text2']) ;
if(isset($_GET['text3'])) $text[2] = strtoupper($_GET['text3']) ;
if(isset($_GET['text4'])) $text[3] = strtoupper($_GET['text4']) ;
if(isset($_GET['text5'])) $text[4] = strtoupper($_GET['text5']) ;

if(isset($_GET['text1']) AND isset($_GET['text2']) AND isset($_GET['text3']) AND isset($_GET['text4']) AND isset($_GET['text5']) AND $_GET['add']==1){
  $mySQLText = array() ;
  for($i=0 ; $i<5 ; $i++){ $mySQLText[$i] = mysqli_real_escape_string($text[$i]) ; }
  $query = 'INSERT INTO parodier (text1,text2,text3,text4,text5) VALUES ("'. $mySQLText[0] . '","'. $mySQLText[1] . '","'. $mySQLText[2] . '","'. $mySQLText[3] . '","'. $mySQLText[4] . '")' ;
  $result = mysql_query($query) or die(mysql_error() . ' ' . $query) ;
}
?>

<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN'
'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>
<head>
<meta http-equiv='Content-Type' content='text/html;charset=utf-8'/>
<meta name='author' content='Aidan Randle-Conde'/>
<meta name='copyright' content='2007-2014 Aidan Randle-Conde'/>
<meta http-equiv='Content-Language' content='en'/>
<link rel='shortcut icon' href='icon.png' />
<title>KEEP CALM AND MAKE PARODIES</title>

<script src="/external_links.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" title="AidanSean styles" href="style.css"/>
</head>

<body lang="en">

<div id="container">
<table>
<tbody>
<tr><td>
<h1>KEEP CALM AND MAKE PARODIES</h1>

<form action="" method="get">
<table id="form">
<tbody>
<tr><th class="form">LINE 1</th><td class="form"><input type="text" name="text1" value="<?php echo $text[0] ;?>" /></td></tr>
<tr><th class="form">LINE 2</th><td class="form"><input type="text" name="text2" value="<?php echo $text[1] ;?>" /></td></tr>
<tr><th class="form">LINE 3</th><td class="form"><input type="text" name="text3" value="<?php echo $text[2] ;?>" /></td></tr>
<tr><th class="form">LINE 4</th><td class="form"><input type="text" name="text4" value="<?php echo $text[3] ;?>" /></td></tr>
<tr><th class="form">LINE 5</th><td class="form"><input type="text" name="text5" value="<?php echo $text[4] ;?>" /></td></tr>
</tbody>
</table>
<input type="hidden" name="add" value="1" />
<input type="submit" name="parody" id="parody" value="PARODY" />
</form>
<p><a href="http://en.wikipedia.org/wiki/Keep_Calm_and_Carry_On">ORIGINAL</a></p>


<h2>RECENT PARODIES</h2>
<ol>
<?php
$query = 'SELECT * FROM parodier ORDER BY id DESC LIMIT 5' ;
$result = mysql_query($query) ;
while($row = mysql_fetch_assoc($result)){
  $url   = 'index.php?text1='.$row['text1'].'&amp;text2='.$row['text2'].'&amp;text3='.$row['text3'].'&amp;text4='.$row['text4'].'&amp;text5='.$row['text5'].'&amp;add=0' ;
  $words = $row['text1'] . ' ' . $row['text2'] . ' ' . $row['text3'] . ' ' . $row['text4'] . ' ' . $row['text5'] ;
  echo '<li><a href="' . $url . '">' . $words . '</a></li>' . PHP_EOL ;
}
?>
</ol>

</td>
<td>

<img src="keepCalm.php?<?php echo 'text1=' . $text[0] . '&amp;text2=' . $text[1] . '&amp;text3=' . $text[2] . '&amp;text4=' . $text[3] . '&amp;text5=' . $text[4] ;?>" width="425px" height="600px" alt="<?php echo $texts ; ?>" />
</td>
</tr>
<tr>
</tr>
</tbody>
</table>

</div>
</body>
</html>