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

   <form action="query3.php" method="post">
       <table>
       <col width="50">
       
         <tr>
            <td><font size="6">QUERY 3</font></td>              
            <br/>
            <br/>
         </tr>


         <tr>
            </br>
            <td><b><font size="5">FIND THE DETAILS OF THE CUSTOMER WHO BUYS AS WELL AS SELLS TO THE TEXTILE MILL</font> </b></td>
        </tr> 

        <tr>
         <td colspan="2" align="center"><input type="submit" name="submit" value="FIND" class="btn"></td>    

        </tr>
       
        
       </table>
    </form>
     
   </body>
   </html> 

<?php
$q="select cus1.cusid,cus1.cusname,cus1.cus_contact
from customer cus1
WHERE cus1.cusid IN
(SELECT c1.cusid
 FROM consignment c1
 WHERE c1.cid LIKE 'F%' AND c1.cusid IN (SELECT c2.cusid
                           FROM consignment c2
                           WHERE c2.cid LIKE 'R%'
                         ) )";
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
echo "<th>"; echo "CUSTOMER ID"; echo "</th>";
echo "<th>"; echo "CUSTOMER NAME"; echo "</th>";
echo "<th>"; echo "CUSTOMER CONTACT"; echo "</th>";
echo "</tr>";

while($row=mysqli_fetch_array($res))
{
  echo "<tr>";
echo "<td>"; echo $row["cusid"]; echo "</td>";
echo "<td>"; echo $row["cusname"]; echo"</td>";
echo "<td>"; echo $row["cus_contact"]; echo"</td>";
echo "</tr>";

}
echo "</table>";
?>