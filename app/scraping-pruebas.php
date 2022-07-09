<?php
include_once "../libs/CurlTerror.libs.php";
include_once "../libs/FunctionTerror.libs.php";
/* conversor_divisas()
	 *
	 * Conversor de moneda usando la API de Google
	 */


/*function currency($from, $to, $amount)
{
    $content = file_get_contents('https://www.google.com/finance/converter?a=' . $amount . '&from=' . $from . '&to=' . $to);

    $doc = new DOMDocument;
    @$doc->loadHTML($content);
    $xpath = new DOMXpath($doc);

    $result = $xpath->query('//*[@id="currency_converter_result"]/span')->item(0)->nodeValue;

    return str_replace(' ' . $to, '', $result);
}

echo currency('USD', 'DOP', 1);
*/
/*
function currencyConverter($from_Currency, $to_Currency, $amount)
{
    $from_Currency = urlencode($from_Currency);
    $to_Currency = urlencode($to_Currency);
    $encode_amount = 1;
    $get = file_get_contents("https://www.google.com/finance/converter?a=$encode_amount&from=$from_Currency&to=$to_Currency");
    $get = explode("<span class=bld>", $get);
    $get = explode("</span>", $get[1]);
    $converted_currency = preg_replace("/[^0-9.]/", null, $get[0]);
    return $converted_currency;
}
// change amount according to your needs
$amount = 10;
// change From Currency according to your needs
$from_Curr = "INR";
// change To Currency according to your needs
$to_Curr = "USD";
$converted_currency = currencyConverter($from_Curr, $to_Curr, $amount);
// Print outout
echo $converted_currency;*/
$usd = "usd";
$ves = "ves";
$link = "https://www.google.com/search?q=usd+a+ves&rlz=1C1CHBF_esVE914VE914&oq=usd+a+ves&aqs=chrome..69i57j0i271l3j69i65j69i60l3.3992j0j7&sourceid=chrome&ie=UTF-8";

function conversor_monedas()
{
    $get = file_get_contents("https://www.google.com/finance/quote/USD-VES");
    $get2 = explode("<div class='YMlKec fxKbKc'>", $get);
    echo var_dump($get2);
    $get3 = explode("</div>", $get2[1]);
    return preg_replace("/[^0-9\.,]/", null, $get3[0]);

    // Esto mostrará el valor actual de 1 DOLAR en el EUROS

}

function currency()
{
    $content = file_get_contents('https://www.google.com/finance/quote/USD-VES');
    $doc = new DOMDocument;
    @$doc->loadHTML($content);
    $xpath = new DOMXpath($doc);
    $result = $xpath->query('//*[@class="YMlKec"]/div');
    echo $result;

    //return str_replace(' ' . $to, '', $result);
}
//conversor_monedas();
$html = file_get_contents('http://www.bcv.org.ve');
$doc = new DOMDocument();
@$doc->loadHTML($html);
$xpath = new DOMXpath($doc);
$htmlconvert = $doc->saveHTML();
$euro = $xpath->query('//*[@id="euro"]/div')->item(0)->nodeValue;
$yuan = $xpath->query('//*[@id="yuan"]/div')->item(0)->nodeValue;
$lira = $xpath->query('//*[@id="lira"]/div')->item(0)->nodeValue;
$rublo = $xpath->query('//*[@id="rublo"]/div')->item(0)->nodeValue;
//$dolar = $xpath->query('//*[@id="dolar"]/div')->item(0)->nodeValue;
$d = $xpath->query('//*[@id="dolar"]/div')->item(0)->nodeValue;
echo $euro . "<br>" . $yuan . "<br>" . $lira . "<br>" . $rublo . "<br>" . $d . "<br>";
function RemoveSpecialChar($str)
{
    $res = preg_replace('/[^0-9\.\,]+/', '', $str);
    return $res;
}
$d = preg_replace("/\s+/", " ", $d);
$dolar = explode(' ', $d);
$dolar[2] = number_format(str_replace(',', '.', $dolar[2]), 2);
echo $dolar[1] . "<br>" . $dolar[2];
//echo number_format($rateUsd, 2) . "<br>";
//echo $dolar[2] . "<br>";
//echo var_dump($dolar);
//echo var_dump($dolar) . "<br>";
//echo " <br>" . var_dump($d);
//echo "<br>" . RemoveSpecialChar($euro);
$bcvTasa = (CurlTerror::get_bcv('http://www.bcv.org.ve'));
echo $bcvTasa['euro']['name'];
