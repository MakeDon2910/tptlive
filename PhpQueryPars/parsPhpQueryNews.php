<?php
header('Content-type: text/html; charset=utf-8');
require 'phpQuery.php';

function print_arr($arr){
	echo '<pre>' . print_r($arr, true) . '</pre>';
}

function parser($url, $start, $end){
	if($start < $end){
		$file = file_get_contents($url);
		$doc = phpQuery::newDocument($file);

		foreach ($doc->find('.articles-container .post-excerpt') as $article) {
		$article = pq($article);


	/*	---- Удаление Категории ----
		$article->find('.cat')->remove(); 
		---- Добавить перед категорией слово "Категория" ----
		$article->find('.cat')->prepend('Категория: ');

		---- wrap - можно оборачивать элементы ----
		$article->find('.cat')->wrap('<div class="category">')->after('Дата: '.date("Y-m-d H:i:s"));	
	*/
		$img = $article->find('.img-cont img')->attr('src');
		$text = $article-> find('.pd-cont')->html();
		echo "<img src='$img'>";
		echo $text;
		echo '<hr>';
		//print_arr($text);
		}

		$next = $doc->find('.pages-nav .current')->next()->attr('href');
		if(!empty($next)){
			$start++;
			parser($next,$start, $end);
		}
	}	
}

$url = 'http://www.kolesa.ru/news';
$start = 0;
$end = 2;

/*echo htmlspecialchars($file);
$pattern = '#<div class="wr_inner.+?</div>#s';
preg_match($pattern, $file, $matches);
print_r($matches)
*/

parser($url, $start, $end);

?>
