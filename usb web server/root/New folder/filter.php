<html><head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Filtered Reviews</title></head>
<body>
<center>
<?php
extract($_POST);
$by_text=$_POST['by_text'];
$by_rating=$_POST['by_rating'];
$by_date=$_POST['by_date'];
$rating_min=$_POST['rating_min'];
/*If you return -1 that moves the $b variable down the array,
return 1 moves $b up the array and
return 0 keeps $b in the same place. 
*/

$json = file_get_contents('./reviews.json');
$data = json_decode($json, true);

usort($data,function /*sortReviews*/($a, $b) use ($by_text, $by_rating, $by_date){
	if ($by_text=='Yes') //tekst prvo pred prazno review
	{
		if ($a['reviewText']!="" && $b['reviewText']!="")//ako dvete imat tekst
		{
			if($by_rating=="Highest First") //po najvisok rating
			{
				if ($a['rating'] == $b['rating'] || $a['rating']>$b['rating'])
				{
					if($by_date=="Newest First") //najnovi prvo
					{
						if ($a['reviewCreatedOnDate'] == $b['reviewCreatedOnDate'] || $a['reviewCreatedOnDate']>$b['reviewCreatedOnDate'])
						{
							return 0; //okej podredeno
						}
						else
						{
							return -1; //b na levo
						}
					}
					else //najstari prvo
					{
						if ($a['reviewCreatedOnDate'] == $b['reviewCreatedOnDate'] || $a['reviewCreatedOnDate']<$b['reviewCreatedOnDate'])
						{
							return 0; //okej podredeno
						}
						else
						{
							return -1; //b na levo
						}
					}
				}
				else
				{
					return -1; //b na levo
				}
			}
			else //po najnizok rejting
			{
				if ($a['rating'] == $b['rating'] || $a['rating']<$b['rating'])
				{
					if($by_date=="Newest First") //najnovi prvo
					{
						if ($a['reviewCreatedOnDate'] == $b['reviewCreatedOnDate'] || $a['reviewCreatedOnDate']>$b['reviewCreatedOnDate'])
						{
							return 0; //okej podredeno
						}
						else
						{
							return -1; //b na levo
						}
					}
					else //najstari prvo
					{
						if ($a['reviewCreatedOnDate'] == $b['reviewCreatedOnDate'] || $a['reviewCreatedOnDate']<$b['reviewCreatedOnDate'])
						{
							return 0; //okej podredeno
						}
						else
						{
							return -1; //b na levo
						}
					}
				}
				else
				{
					return -1; //b na levo
				}
			}
		}
		else //ako nekoe e prazno
		{
			if($a['reviewText']=="" && $b['reviewText']!="")//ako a e prazno a b e so tekst
			{
				return -1; //b na levo
			}
			else
			{
				return 0; //b ostanuva na mesto
			}
		}
    }
	else //prazno pred tekst
	{
		if ($a['reviewText']=="" && $b['reviewText']=="") //ako dvete se prazni
		{
			if($by_rating=="Highest First") //po najvisok rating
			{
				if ($a['rating'] == $b['rating'] || $a['rating']>$b['rating'])
				{
					if($by_date=="Newest First") //najnovi prvo
					{
						if ($a['reviewCreatedOnDate'] == $b['reviewCreatedOnDate'] || $a['reviewCreatedOnDate']>$b['reviewCreatedOnDate'])
						{
							return 0; //okej podredeno
						}
						else
						{
							return -1; //b na levo
						}
					}
					else //najstari prvo
					{
						if ($a['reviewCreatedOnDate'] == $b['reviewCreatedOnDate'] || $a['reviewCreatedOnDate']<$b['reviewCreatedOnDate'])
						{
							return 0; //okej podredeno
						}
						else
						{
							return -1; //b na levo
						}
					}
				}
				else
				{
					return -1; //b na levo
				}
			}
			else //po najnizok rejting
			{
				if ($a['rating'] == $b['rating'] || $a['rating']<$b['rating'])
				{
					if($by_date=="Newest First") //najnovi prvo
					{
						if ($a['reviewCreatedOnDate'] == $b['reviewCreatedOnDate'] || $a['reviewCreatedOnDate']>$b['reviewCreatedOnDate'])
						{
							return 0; //okej podredeno
						}
						else
						{
							return -1; //b na levo
						}
					}
					else //najstari prvo
					{
						if ($a['reviewCreatedOnDate'] == $b['reviewCreatedOnDate'] || $a['reviewCreatedOnDate']<$b['reviewCreatedOnDate'])
						{
							return 0; //okej podredeno
						}
						else
						{
							return -1; //b na levo
						}
					}
				}
				else
				{
					return -1; //b na levo
				}
			}
		}
		else //ako nekoe e polno
		{
			if($a['reviewText']!="" && $b['reviewText']=="")//ako a e polno a b e prazno
			{
				return -1; //b na levo
			}
			else
			{
				return 0; //b ostanuva na mesto
			}
		}
	}
});

//usort($data, "sortReviews");     

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