<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
$thc = $_POST["thc"];    
$m = $_POST["mass"];  
$unit = $_POST["unit"];    
$cost = $_POST["cost"];
?>

<h2>BudCalc <img src='leaf.png' style='float: right;'/></h2>
<p>This nifty calculator will help you determine the cost of your weed in dollars/gram THC</p>
<div>
<form method="POST">
    <p>
        <label>
            THC Percentage:<br>
            <input type="number" name="thc" value=""> %<br>
            Weight/Mass:<br>
            <input type="number" step=.01 name="mass" value=""><br>
            <input type="radio" name="unit" value="g" checked=true> Grams<br>
            <input type="radio" name="unit" value="oz"> Ounces<br>
            Cost:<br>
            <input type="number" name="cost" value="">
        </label>
        <br><input type="submit" value="Calculate">
    </p>
<div id="box">
    <p id="result"><img src='img.png' style='float: right;'/></p>
</div>
</form>
</div>

<script>
window.onload = Main;
function Calculate(thc, m, unit, cost)
{
    m_ = m;
    if (unit == "oz")
    {
        m_ *= 28.34952;     
    }
    return cost/((thc/100)*m_);
}
function Main(object)
{
    thc = "<?php echo $thc ?>"; 
    m = "<?php echo $m ?>"; 
    unit = "<?php echo $unit ?>";
    cost = "<?php echo $cost ?>";
    parent = document.getElementById("result");
    parent.insertBefore(document.createTextNode(Math.round(Calculate(thc, m, unit, cost)*100)/100),parent.childNodes[0]);
}
</script>

</body>
</html>
