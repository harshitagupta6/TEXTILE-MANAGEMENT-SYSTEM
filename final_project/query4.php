<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"textile");
?>

<html>
<head>
<title>HOME</title>
<link rel="stylesheet" href="css/style1.css"/>
<link rel="stylesheet" href="css/button-style.css"/>
</head>
<body backgroundcolor="white">
   <div class="nav_bar">
       <ul>
          <li><a href="home.php" >HOME</a></li>
          <li><a href="employee.php">EMPLOYEE</a></li>
          <li><a href="stock.php">STOCK</a></li>
          <li><a href="section.php">SECTION</a></li>
          <li><a href="customer.php">CUSTOMER</a></li>
          <li><a href="dispatch.php">DISPATCH</a></li>
          <li><a href="query.php" id="onlink">QUERY</a></li> 
       </ul>
   </div>

   <form action="query4.php" method="post">
       <table>
       <col width="50">
       
         <tr>
            <td><font size="6">QUERY 4</font></td>              
            <br/>
            <br/>
         </tr>


         <tr>
            </br>
            <td><b><font size="5">FIND THE MONEY THAT THE TEXTILE MILL SPENT IN A MONTH TO BUY GOODS</font> </b></td>
        </tr>    
        
       <tr>
         <td colspan="2" align="center"><input type="submit" name="submit" value="FIND" class="btn"></td>
        </tr>
       </table>
    </form>
     
   </body>
   </html> 

<?php
if(isset($_POST["submit"]))
{
 $q="SELECT SUM(c.cquantity*c.cost_per_piece) AS AMOUNT,YEAR(c.arr_date) AS YEAR,MONTH(c.arr_date) AS MONTH
FROM consignment c
WHERE c.cid LIKE 'R%'
GROUP BY MONTH(c.arr_date),YEAR(c.arr_date)
ORDER BY 2";

$res=mysqli_query($link,$q);

echo "<table border=1>";

 echo "<style>";
  echo "table{border-collapse:collapse;
              width:100%
              }";
 echo "th,td{text-align:left;
             padding:8px
             }";
 echo "tr:nth-child(even){background-color:#f2f2f2}";
 echo "th{background-color:#000000;
          color:white}";
echo "</style>";
 

 echo "<tr>";
  echo "<th>";  echo "AMOUNT"; echo "</th>";
  echo "<th>";  echo "YEAR"; echo "</th>";
  echo "<th>";  echo "MONTH"; echo "</th>"; 
 echo "</tr>";

while($row=mysqli_fetch_array($res))
{
  echo "<tr>";
  echo "<td>";  echo $row["AMOUNT"]; echo "</td>";
  echo "<td>";  echo $row["YEAR"]; echo "</td>";
  echo "<td>";  echo $row["MONTH"]; echo "</td>"; 
 echo "</tr>";
  
}

echo "</table>";
 
}
?>