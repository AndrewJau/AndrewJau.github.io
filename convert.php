<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">
<html>
<head>
<title>Measurement Conversion</title>

<script type="text/javascript">

   function ClearForm ()
   {  // Set all the form values to blank.
      var form = document.forms[0];
      for (i=0; i < form.elements.length; i++)
      {  // Don't clear the two buttons.
         if (form.elements[i].name != "submit" && form.elements[i].name != "clear")
            form.elements[i].value = "";
      }
      document.getElementById("demo").innerHTML = "";
   }
   
 </script>
 
</head>

<body>

<!-- convert.php allows users to convert measurement.
     If data entries are not numeric, an error message "Data entry is not numeric" is displayed
 -->

<center><h2>On-line Currency Converter</h2></center>
<hr />

<form method="post" action="convert.php">

  <table cellspacing=0 cellpadding=5 border=0 align=center>

  <tr align=right>
   <td><b>US Dollar (USD):</b> <input type="text" name="USD1" size=6></td>
   <td><-----></td>
   <td><b>Euro(EUR):</b> <input type="text" name="EUR1" size=6></td>
  </tr>

  <tr align=right>
   <td><b>US Dollar (USD):</b> <input type="text" name="USD2" size=6></td>
   <td><-----></td>
   <td><b>British Pound (GBP):</b> <input type="text" name="GBP1" size=6></td>
  </tr>

  <tr align=right>
   <td><b>US Dollar (USD):</b> <input type="text" name="USD3" size=6></td>
   <td><-----></td>
   <td><b>Canadian Dollar (CAD):</b> <input type="text" name="CAD1" size=6></td>
  </tr>

  <tr align=right>
   <td><b>US Dollar (USD):</b> <input type="text" name="USD4" size=6></td>
   <td><-----></td>
   <td><b>Chinese Yuan Renminbi (CNY):</b> <input type="text" name="CNY" size=6></td>
  </tr>

  <tr align=right>
   <td><b>US Dollar (USD):</b> <input type="text" name="USD5" size=6></td>
   <td><-----></td>
   <td><b>Indian Rupee (INR):</b> <input type="text" name="INR" size=6></td>
  </tr>

  <tr align=right>
   <td><b>Euro (EUR):</b> <input type="text" name="EUR2" size=6></td>
   <td><-----></td>
   <td><b>British Pound (GBP):</b> <input type="text" name="GBP2" size=6></td>
  </tr>

  <tr align=right>
   <td><b>Euro (EUR):</b> <input type="text" name="EUR3" size=6></td>
   <td><-----></td>
   <td><b>Canadian Dollar (CAD):</b> <input type="text" name="CAD2" size=6></td>
  </tr>

 </table>

 <TABLE cellspacing=0 cellpadding=0 border=0 align=center WIDTH="50%">
  <tr align=center>
   <!-- <td><input type="reset" value="Reset Form"></td> -->
   <td><input name="submit" type="submit" value="Convert"></td>
<!--    <td><input name="clear" type="button" value="Clear Form" id="clear" -->
   <td><input name="clear" type="reset" value="Clear Form" id="clear"
              onClick="ClearForm()"></td>
  </tr>
 </table>

</form>
<hr />

<p id="demo">
  <?php 
  try {
     echo convert_USDtoEUR();
     echo convert_EURtoUSD();
     echo convert_USDtoGBP();
     echo convert_GBPtoUSD();
     echo convert_USDtoCAD();
     echo convert_CADtoUSD();
     echo convert_USDtoCNY();
     echo convert_CNYtoUSD();
     echo convert_USDtoINR();
     echo convert_INRtoUSD();
     echo convert_EURtoGBP();
     echo convert_GBPtoEUR();
     echo convert_EURtoCAD();
     echo convert_CADtoEUR();
  } catch (exception $e) {
     echo $e->getMessage(), "\n";
  }
  
  
  ?>
</p>

<?php

   function convert_USDtoEUR()
   {
       if ($_SERVER["REQUEST_METHOD"] == "POST")
       {
       	  // if (!empty($_POST["F"])     // PHP treats 0 as empty, thus data entry = 0 won't be converted
       	  if (strlen($_POST["USD1"]) > 0)
          {
          	 if (!is_numeric($_POST['USD1']))
          	 	throw new Exception('Data entry is not numeric');
          	 
             $USD1Str = $_POST["USD1"];
             //$num = (round($FAsStr * 100.0)) / 100.0;
             $num = 0.860951 * $USD1Str ;
             echo $USD1Str . " USD ---> " . number_format((float)$num, 3, '.', '') . " EUR" . "<br />";
          }
          else 
             return "";
       }
   }
   
   function convert_EURtoUSD()
   {
      if ($_SERVER["REQUEST_METHOD"] == "POST")
      {   		          
         if (strlen($_POST["EUR1"]) > 0)
         {
         	if (!is_numeric($_POST['EUR1']))
         		throw new Exception('Data entry is not numeric');
         	
            $EUR1Str = $_POST["EUR1"];
            $num = $EUR1Str * 1.16166;
            
            echo $EUR1Str . " EUR ---> " . number_format((float)$num, 3, '.', '') . " USD" . "<br />";
         }
         else
            return "";
      }		 
   }

   function convert_USDtoGBP()
   {
      if ($_SERVER["REQUEST_METHOD"] == "POST")
      {
         if (strlen($_POST["USD2"]) > 0)
         {
         	if (!is_numeric($_POST['USD2']))
         		throw new Exception('Data entry is not numeric');
         	
            $USD2Str = $_POST["USD2"];
            $num = 0.760867 * $USD2Str;                    
            echo $USD2Str . " USD ---> " . number_format((float)$num, 3, '.', '') . " GBP" . "<br />";
         }
      else
         return "";
      }
   }
 
   function convert_GBPtoUSD()
   {
      if ($_SERVER["REQUEST_METHOD"] == "POST")
      {
         if (strlen($_POST["GBP1"]) > 0)
         {
         	if (!is_numeric($_POST['GBP1']))
         		throw new Exception('Data entry is not numeric');
         	
            $GBP1Str = $_POST["GBP1"];
            $num = 1.31431 * $GBP1Str;
            
            echo $GBP1Str . " GBP ---> " . number_format((float)$num, 3, '.', '') . " USD" . "<br />";
         }
         else
            return "";
      }
   }
     
   function convert_USDtoCAD()
   {
      if ($_SERVER["REQUEST_METHOD"] == "POST")
      {
         if (strlen($_POST["USD3"]) > 0)
         {
         	if (!is_numeric($_POST['USD3']))
         		throw new Exception('Data entry is not numeric');
         	
            $USD3Str = $_POST["USD3"];
            $num = $USD3Str * 1.28244;
            echo $USD3Str . " USD ---> " . number_format((float)$num, 3, '.', '') . " CAD" . "<br />";
         }
         else
            return "";
      }
   }
  
   function convert_CADtoUSD()
   {
      if ($_SERVER["REQUEST_METHOD"] == "POST")
      {
         if (strlen($_POST["CAD1"]) > 0)
         {
         	if (!is_numeric($_POST['CAD1']))
         		throw new Exception('Data entry is not numeric');
         	
            $CAD1Str = $_POST["CAD1"];
            $num = $CAD1Str * 0.779767;
            echo $CAD1Str . " CAD ---> " . number_format((float)$num, 3, '.', '') . " USD" . "<br />";
         }
         else
            return "";
      }
   }
 
   function convert_USDtoCNY()
   {
      if ($_SERVER["REQUEST_METHOD"] == "POST")
      {
         if (strlen($_POST["USD4"]) > 0)
         {
         	if (!is_numeric($_POST['USD4']))
         		throw new Exception('Data entry is not numeric');
         	
            $USD4Str = $_POST["USD4"];
            $num = $USD4Str * 6.64582;
            echo $USD4Str . " USD ---> " . number_format((float)$num, 3, '.', '') . " CNY" . "<br />";
         }
         else
            return "";
      }   	
   }
   
   
   function convert_CNYtoUSD()
   {
      if ($_SERVER["REQUEST_METHOD"] == "POST")
      {
         if (strlen($_POST["CNY"]) > 0)
         {
         	if (!is_numeric($_POST['CNY']))
         		throw new Exception('Data entry is not numeric');
         	
            $CNYStr = $_POST["CNY"];
            $num = $CNYStr * 0.150471;
            echo $CNYStr . " CNY ---> " . number_format((float)$num, 3, '.', '') . " USD" . "<br />";
         }
         else
            return "";
      }   	
   }
   
   function convert_USDtoINR()
   {
      if ($_SERVER["REQUEST_METHOD"] == "POST")
      {
         if (strlen($_POST["USD5"]) > 0)
         {
         	if (!is_numeric($_POST['USD5']))
         		throw new Exception('Data entry is not numeric');
         	
            $USD5Str = $_POST["USD5"];
            $num = $USD5Str * 64.9411;
            echo $USD5Str . " USD ---> " . number_format((float)$num, 3, '.', '') . " INR" . "<br />";
         }
         else
           return "";
   	  }   	
   }
   
   function convert_INRtoUSD()
   {
      if ($_SERVER["REQUEST_METHOD"] == "POST")
      {
         if (strlen($_POST["INR"]) > 0)
         {
         	if (!is_numeric($_POST['INR']))
         		throw new Exception('Data entry is not numeric');
         	
            $INRStr = $_POST["INR"];
            $num = $INRStr * 0.0153986;
            echo $INRStr . " INR ---> " . number_format((float)$num, 3, '.', '') . " USD" . "<br />";
         }
         else
            return "";
      }
   }
    
   function convert_EURtoGBP()
   {
      if ($_SERVER["REQUEST_METHOD"] == "POST")
      {
         if (strlen($_POST["EUR2"]) > 0)
         {
         	if (!is_numeric($_POST['EUR2']))
         		throw new Exception('Data entry is not numeric');
         	
            $EUR2Str = $_POST["EUR2"];
            $num = $EUR2Str * 0.883678;
            echo $EUR2Str . " EUR ---> " . number_format((float)$num, 3, '.', '') . " GBP" . "<br />";
         } 
         else
            return "";
      }
   }
   
   function convert_GBPtoEUR() 
   {
      if ($_SERVER["REQUEST_METHOD"] == "POST")
      {
         if (strlen($_POST["GBP2"]) > 0)
         {
         	if (!is_numeric($_POST['GBP2']))
         		throw new Exception('Data entry is not numeric');
         	
            $GBP2Str = $_POST["GBP2"];
            $num =  $GBP2Str * 1.13163;
            echo $GBP2Str . " GBP ---> " . number_format((float)$num, 3, '.', '') . " EUR" . "<br />";
         }
         else
            return "";
      }   
   }
   
   function convert_EURtoCAD()
   {
      if ($_SERVER["REQUEST_METHOD"] == "POST")
      {
         if (strlen($_POST["EUR3"]) > 0)
         {
         	if (!is_numeric($_POST['EUR3']))
         		throw new Exception('Data entry is not numeric');
         	
            $EUR3Str = $_POST["EUR3"];
            $num = $EUR3Str * 1.48975;
            echo $EUR3Str . " EUR ---> " . number_format((float)$num, 3, '.', '') . " CAD" . "<br />";
         }
         else
            return "";
      }   	
   }
   
   function convert_CADtoEUR()
   {
      if ($_SERVER["REQUEST_METHOD"] == "POST")
      {
         if (strlen($_POST["CAD2"]) > 0)  
         {
         	if (!is_numeric($_POST['CAD2']))
         		throw new Exception('Data entry is not numeric');
         	
            $CAD2Str = $_POST["CAD2"];
            $num = $CAD2Str * 0.671255;
            echo $CAD2Str . " CAD ---> " . number_format((float)$num, 3, '.', '') . " EUR" . "<br />";
         }
         else
            return "";
      }   	
   }
   
?>

</body>
</html>