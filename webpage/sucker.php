<?php
$error = true;
if($_REQUEST["name"]=="" || !isset($_REQUEST["section"])|| $_REQUEST["cardnumber"]=="" || $_REQUEST["cc"]==""){
	$error = false;
}else{
$name = $_POST["name"];
$section = $_POST["section"];
$cardnum = $_POST["cardnumber"];
$cc=$_POST["cc"];

$data = $name.";".$section.";".$cardnum.";".$cc."\n";

$filename='suckers.txt';
file_put_contents($filename, $data ,FILE_APPEND);
$data = file_get_contents($filename);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Buy Your Way to a Better Education!</title>
		<link href="http://www.cs.washington.edu/education/courses/cse190m/09sp/labs/4-buyagrade/buyagrade.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<?php if($error){ ?>
		<h1>Thanks, sucker!</h1>

		<p>Your information has been recorded.</p>

		<dl>
			<dt>Name</dt>
			<dd><?= $name ?></dd>

			<dt>Section</dt>
			<dd><?= $section ?></dd>

			<dt>Credit Card</dt>
			<dd><?= $cardnum."(".$cc.")" ?></dd>
		</dl>

		<p>Here are all the suckers who have submitted here:</p>
		<pre><?=$data?></pre>
	<?php 
		}else { ?>
			<h1>Sorry</h1>
			<p>You didn't fill out the form completely. <a href="buyagrade.html">Try again?</a></p>
		<?php 
		}
		?> 


	</body>
</html>  