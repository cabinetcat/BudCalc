<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" type="text/css" href="css/index.css">
   </head>
   <body>
      <?php
         $thc = $_GET["thc"];    
         $m = $_GET["mass"];  
         $unit = $_GET["unit"];    
         $cost = $_GET["cost"];
         ?>
      <div id="page">
         <div id="title">
         <h2>BudCalc</h2>
         <img src='res/leaf.png'/>
         <p id="subtitle">This handy calculator will help you determine the cost of your weed in dollars/gram of THC</p>
         </div> 
         <div id="content">
            <form id="mainform" method="GET">

                  <label>THC Percentage:</label>
                  <input type="number" step=.01 name="thc" value="<?php echo $thc ?>">%<br>
                  <label>Weight/Mass:</label>
                  <input type="number" step=.001 name="mass" value="<?php echo $m ?>">
                  <select id="unit" name="unit">
                     <option value="g" <?php if ($unit == "g") { echo "selected"; } ?>>Grams</option>
                     <option value="oz" <?php if ($unit == "oz") { echo "selected"; } ?>>Ounces</option>
                   </select><br>
                   <label>Cost:</label><br>
                  <input type="number" step=.01 name="cost" value="<?php echo $cost ?>">
                  <br><input type="submit" value="Calculate">
               
            </form>
            <div id="result">
               <p id="resulttitle">result</p>
               <hr class="hr-text" data-content="AND">
               <h3 id="resulttext">...</h3>
            </div>
         </div> 
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
         function Main()
         {
             
             thc = "<?php echo $thc ?>"; 
             m = "<?php echo $m ?>"; 
             unit = "<?php echo $unit ?>";
             cost = "<?php echo $cost ?>";
             parent = document.getElementById("resulttext");
             parent.innerText = Math.round(Calculate(thc, m, unit, cost)*100)/100;
         }
      </script>
   </body>
</html>
