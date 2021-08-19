<html><head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Filtered Reviews</title></head>
<body>
<center>
<?php
extract($_POST);

$json = file_get_contents('./reviews.json');
$data = json_decode($json, true);



//foreach ($data as $key1 => $value1) {
    //if($json_data[$key1]["Age"] < 20){
  //      print_r $key1;
		//print_r($data[$key1]);
    //}

//echo $data->"0";
	//print_r($data);
	//echo $data;
	//var_dump($data);

?>
</center>
</body>
</html>