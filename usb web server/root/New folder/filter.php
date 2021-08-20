<html><head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Filtered Reviews</title></head>
<body>
<center>
<?php
extract($_POST);

$json = file_get_contents('./reviews.json');
$data = json_decode($json, true);

usort($data, function ($a, $b) use ($by_text, $by_rating, $by_date)
{
	if ($by_text=='Yes') //tekst prvo pred prazno review
	{
		if(($a['reviewText']!="" && $b['reviewText']==""))//a e tekst, a b e prazno
		{
			return -1; //okej e
		}
		if (($a['reviewText']!="" && $b['reviewText']!="") || ($a['reviewText']=="" && $b['reviewText']==""))//ako dvete imat tekst, ili dvete se prazni
		{
			if($by_rating=="Highest First") //po najvisok rating
			{
				if ($a['rating'] == $b['rating'])//ednakov rating
				{
					if($by_date=="Newest First") //najnovi prvo
					{
						if ($a['reviewCreatedOnDate'] == $b['reviewCreatedOnDate'])//istovremeno kreirani
						{
							return 0; //okej podredeno
						}
						if($a['reviewCreatedOnDate']<$b['reviewCreatedOnDate']) //descending
						{
							return 1;
						}
						else
						{
							return -1;
						}
					}
					else //najstari prvo
					{
						if ($a['reviewCreatedOnDate'] == $b['reviewCreatedOnDate'])//istovremeno kreirani
						{
							return 0; //okej podredeno
						}
						if($a['reviewCreatedOnDate']<$b['reviewCreatedOnDate']) //ascending
						{
							return -1;
						}
						else
						{
							return 1;
						}
					}
				}
				else //razlicen rating, sporedi gi dvata pa podredi po descending
				{
					if($a['rating']<$b['rating'])
					{
						return 1;
					}
					else
					{
						return -1;
					}
				}
			}
			else //po najnizok rejting
			{
				if ($a['rating'] == $b['rating'])//ednakov rating
				{
					if($by_date=="Newest First") //najnovi prvo
					{
						if ($a['reviewCreatedOnDate'] == $b['reviewCreatedOnDate'])//istovremeno kreirani
						{
							return 0; //okej podredeno
						}
						if($a['reviewCreatedOnDate']<$b['reviewCreatedOnDate']) //descending
						{
							return 1;
						}
						else
						{
							return -1;
						}
					}
					else //najstari prvo
					{
						if ($a['reviewCreatedOnDate'] == $b['reviewCreatedOnDate'])//istovremeno kreirani
						{
							return 0; //okej podredeno
						}
						if($a['reviewCreatedOnDate']<$b['reviewCreatedOnDate']) //ascending
						{
							return -1;
						}
						else
						{
							return 1;
						}
					}
				}
				else //razlicen rating, sporedi gi dvata pa podredi po ascending
				{
					if($a['rating']<$b['rating'])
					{
						return -1;
					}
					else
					{
						return 1;
					}
				}
			}
		}
		else //ako a e prazno, a b e tekst, treba descending
		{			
			return 1; //b na levo
		}
	}
	else //prazno review pred tekst
	{
		if(($a['reviewText']=="" && $b['reviewText']!=""))//a e prazno, a b e tekst
		{
			return -1; //okej e
		}
		if (($a['reviewText']!="" && $b['reviewText']!="") || ($a['reviewText']=="" && $b['reviewText']==""))//ako dvete imat tekst, ili dvete se prazni
		{
			if($by_rating=="Highest First") //po najvisok rating
			{
				if ($a['rating'] == $b['rating'])//ednakov rating
				{
					if($by_date=="Newest First") //najnovi prvo
					{
						if ($a['reviewCreatedOnDate'] == $b['reviewCreatedOnDate'])//istovremeno kreirani
						{
							return 0; //okej podredeno
						}
						if($a['reviewCreatedOnDate']<$b['reviewCreatedOnDate']) //descending
						{
							return 1;
						}
						else
						{
							return -1;
						}
					}
					else //najstari prvo
					{
						if ($a['reviewCreatedOnDate'] == $b['reviewCreatedOnDate'])//istovremeno kreirani
						{
							return 0; //okej podredeno
						}
						if($a['reviewCreatedOnDate']<$b['reviewCreatedOnDate']) //ascending
						{
							return -1;
						}
						else
						{
							return 1;
						}
					}
				}
				else //razlicen rating, sporedi gi dvata pa podredi po descending
				{
					if($a['rating']<$b['rating'])
					{
						return 1;
					}
					else
					{
						return -1;
					}
				}
			}
			else //po najnizok rejting
			{
				if ($a['rating'] == $b['rating'])//ednakov rating
				{
					if($by_date=="Newest First") //najnovi prvo
					{
						if ($a['reviewCreatedOnDate'] == $b['reviewCreatedOnDate'])//istovremeno kreirani
						{
							return 0; //okej podredeno
						}
						if($a['reviewCreatedOnDate']<$b['reviewCreatedOnDate']) //descending
						{
							return 1;
						}
						else
						{
							return -1;
						}
					}
					else //najstari prvo
					{
						if ($a['reviewCreatedOnDate'] == $b['reviewCreatedOnDate'])//istovremeno kreirani
						{
							return 0; //okej podredeno
						}
						if($a['reviewCreatedOnDate']<$b['reviewCreatedOnDate']) //ascending
						{
							return -1;
						}
						else
						{
							return 1;
						}
					}
				}
				else //razlicen rating, sporedi gi dvata pa podredi po ascending
				{
					if($a['rating']<$b['rating'])
					{
						return -1;
					}
					else
					{
						return 1;
					}
				}
			}
		}
		else //ako a e tekst, a b e prazno, treba ascending
		{			
			return 1; //b na levo
		}
	}
});

echo "<table border='1'>";
echo "<tr><th>Review text</th><th>Rating</th><th>Created on</th></tr>";

foreach ($data as $key1 => $value1)
{
	if($value1["rating"] >= $rating_min)
	{
		print("<tr><td>".$value1['reviewText']."</td><td>".$value1['rating']."</td><td>".$value1['reviewCreatedOnDate']."</td></tr>");
	}
}
echo "</table>";

?>
</center>
</body>
</html>