<?php
$ch = curl_init("https://entrecantos.es");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
curl_close($ch);

$title = preg_match('!<title>(.*?)</title>!i', $result, $matches) ? $matches[1] : 'No title found';
$description = preg_match('!<meta name="description" content="(.*?)">!i', $result, $matches) ? $matches[1] : 'No meta description found';
$keywords = preg_match('!<meta name="keywords" content="(.*?)">!i', $result, $matches) ? $matches[1] : 'No meta keywords found';
$img = preg_match('!<img.*?src=["|\'](.*?)[\'|"]!i', $result, $matches) ? $matches[1] : 'No image found';
$parrafo = preg_match('!<p>(.*?)</p>!i', $result, $matches) ? $matches[1] : 'No image found';
echo $title . '<br>';
echo $description . '<br>';
echo $keywords . '<br>';
$regex ='/[(http(s)?):\/\/(www\.)?a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/ig';
if ($img == $regex) {
    # code...
    echo '<img src="'.$img .'" alt="">';
}else{
echo $img . '<br>';
}
echo $parrafo . '<br>';

?>
