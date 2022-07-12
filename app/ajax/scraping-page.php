<?php
$ch = curl_init("https://entrecantos.es");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
curl_close($ch);

$title = preg_match('!<title>(.*?)</title>!i', $result, $matches) ? $matches[1] : 'No title found';
$description = preg_match('!<meta name="description" content="(.*?)">!i', $result, $matches) ? $matches[1] : 'No meta description found';
$keywords = preg_match('!<meta name="keywords" content="(.*?)">!i', $result, $matches) ? $matches[1] : 'No meta keywords found';
$img = preg_match('!<img(.*?)</img>!i', $result, $matches) ? $matches[1] : 'No image found';
echo $title . '<br>';
echo $description . '<br>';
echo $keywords . '<br>';
echo $img . '<br>';


$ch = curl_init();
   curl_setopt($ch, CURLOPT_HEADER, 0);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
   $data = curl_exec($ch);
   curl_close($ch);
   return $data;
}

public function previewLink(){
   $url = "https://www.facebook.com/NASA/";
   $html = $this->file_get_contents_curl($url);
   $title = "";
   $description ="";
   $image = "";

   //parsing begins here:
   $doc = new \DOMDocument();
   @$doc->loadHTML($html);
   $nodes = $doc->getElementsByTagName('title');
   $title = $nodes->item(0)->nodeValue();

  }
  previewLink();
?>