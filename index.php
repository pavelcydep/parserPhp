<?php 
require_once 'phpQuery//phpQuery.php';

	
   $url='https://hramy.ru';
    function getPageByUrl($url)
	{
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		$result = curl_exec($curl);

		if ($result === false) {			
			echo "Ошибка CURL: " . curl_error($curl);
			return false;
		} else {
			return $result;
		}
	}
$pq = phpQuery::newDocument(getPageByUrl($url));
$links= $pq->find('td');
$paragraphs=$pq->find('p');
function arrResult($arrs)
{
	foreach($arrs as $arr)
	{
    $pqArr = pq($arr); 
    $results[]=$pqArr->html();
	}
return $results;
}
var_dump(arrResult($links));  
  ?>

