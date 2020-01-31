<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";      
$url_components = parse_url($url); 
parse_str($url_components['query'], $params); 
?>
<h2>BudCalc</h2>
<p>This nifty calculator will help you determine the cost of your weed in dollars/gram THC</p>
<div>
<form onsubmit="Main()" method="POST">
    <p>
        <label>
            THC Percentage:<br>
            <input type="number" name="thc" value=""> %<br>
            Weight/Mass:<br>
            <input type="number" name="mass" value=""><br>
            <input type="radio" name="unit" value="g" checked=true> Grams<br>
            <input type="radio" name="unit" value="oz"> Ounces<br>
            Cost:<br>
            <input type="number" name="date" value="">
        </label>
        <br><input type="submit" value="Calculate">
    </p>
</form>
</div>


<script>
function getJsonFromUrl(url) {
  if(!url) url = location.search;
  var query = url.substr(1);
  var result = {};
  query.split("&").forEach(function(part) {
    var item = part.split("=");
    result[item[0]] = decodeURIComponent(item[1]);
  });
  return result;
}
function Calculate(thc, m, unit, cost)
{
    m_ = m;
    if (unit == "oz")
    {
        m_ *= 28.34952;     
    }
    return (cost/m_)*(thc/10)
}
function Main(object)
{
    Params = getJsonFromUrl(window.location.href);
    document.getElementsByTagName("h2")[0].innerText = Calculate(Params.thc, Params.mass, Params.unit, Params.cost);
}
</script>

</body>
</html>
