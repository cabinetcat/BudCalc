<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" type="text/css" href="css/index.css">
   </head>
   <body>
      <?php
         $thc = $_POST["thc"];    
         $m = $_POST["mass"];  
         $unit = $_POST["unit"];    
         $cost = $_POST["cost"];
         ?>
      <div id="page">
         <div id="title">
         <h2>BudCalc</h2>
         <img src='res/leaf.png'/>
         </div> 
         <div id="content">
            <form id="form" method="POST">

                  <label>THC Percentage:</label>
                  <input type="number" step=.01 name="thc" value="<?php echo $thc ?>">%<br>
                  <label>Weight/Mass:</label>
                  <input type="number" step=.001 name="mass" value="<?php echo $m ?>">
                  <select id="unit" form="form">
                     <option value="g" <?php if ($unit == "g") { echo "selected"; } ?></option>Grams</option>
                     <option value="oz" <?php if ($unit == "oz") { echo "selected"; } ?></option>Ounces</option>
                   </select><br>
                   <label>Cost:</label><br>
                  <input type="number" name="cost" value="<?php echo $cost ?>">
                  <br><input type="submit" value="Calculate">
               
            </form>
            <div id="result">
               <p id="resulttitle">result</p>
               <hr class="hr-text" data-content="AND">
               <h3 id=resulttext>...</h3>
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
             document.createTextNode(Math.round(Calculate(thc, m, unit, cost)*100)/100),parent.childNodes[0]
         }
      </script>
   </body>
</html>
