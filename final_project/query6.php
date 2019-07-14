<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"textile");
?>

<html>
<head>
<title>HOME</title>
<link rel="stylesheet" href="css/style1.css"/>
<link rel="stylesheet" href="css/button-style.css"/>
<link rel="stylesheet" href="css/input_style.css"/>
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

   <form action="query6.php" method="post">
       <table>
       <col width="50">
       
         <tr>
            <td><font size="6">QUERY 6</font></td>              
            <br/>
            <br/>
         </tr>


         <tr>
            </br>
            <td><b><font size="5">BILL</font> </b></td>
        </tr>

        <tr>
            <td height="50"><font size="5">STOCK ID :  </font></td>
            <td><input style="height:30px;font-size:14pt type="text" name="conid" placeholder="RXX/FXX"></td> 
         </tr>    
        
       <tr>
         <td colspan="2" align="center"><input type="submit" name="submit" value="FIND" class="btn"></td>
         <br>
         <br>
        </tr>
       </table>
    </form>
     
   </body>
   </html> 

<?php
if(isset($_POST["submit"]))
{  $q = "select cus.cusid,cus.cusname,cus.firm_name,c.cid,c.ctype,c.cname,c.cquantity,c.cost_per_piece,(c.cquantity*c.cost_per_piece) AS TOTAL
      from consignment c,customer cus
      where c.cusid=cus.cusid AND c.cid='$_POST[conid]'";

$res=mysqli_query($link,$q);

while($row=mysqli_fetch_array($res))
{
  echo "<form>";
   echo "<table>";
     echo "<tr>";
       echo "<td height=50>"; echo "<font size=5>"; echo "CUSTOMER ID  :"; echo "</font>"; echo "</td>";
       echo "<td height=50>"; echo "<font size=5>"; echo $row["cusid"]; echo "</font>"; echo "</td>";
     echo "</tr>";

   echo "<tr>";
       echo "<td height=50>"; echo "<font size=5>"; echo "CUSTOMER NAME  :"; echo "</font>"; echo "</td>";
       echo "<td height=50>"; echo "<font size=5>"; echo $row["cusname"]; echo "</font>"; echo "</td>";
     echo "</tr>";

  echo "<tr>";
       echo "<td height=50>"; echo "<font size=5>"; echo "FIRM NAME  :"; echo "</font>"; echo "</td>";
       echo "<td height=50>"; echo "<font size=5>"; echo $row["firm_name"]; echo "</font>"; echo "</td>";
     echo "</tr>";

   echo "<tr>";
       echo "<td height=50>"; echo "<font size=5>"; echo "CONSIGNMENT ID  :"; echo "</font>"; echo "</td>";
       echo "<td height=50>"; echo "<font size=5>"; echo $row["cid"]; echo "</font>"; echo "</td>";
     echo "</tr>";

    echo "<tr>";
       echo "<td height=50>"; echo "<font size=5>"; echo "CONSIGNMENT TYPE  :"; echo "</font>"; echo "</td>";
       echo "<td height=50>"; echo "<font size=5>"; echo $row["ctype"]; echo "</font>"; echo "</td>";
     echo "</tr>";

     echo "<tr>";
       echo "<td height=50>"; echo "<font size=5>"; echo "CONSIGNMENT NAME  :"; echo "</font>"; echo "</td>";
       echo "<td height=50>"; echo "<font size=5>"; echo $row["cname"]; echo "</font>"; echo "</td>";
     echo "</tr>";

     echo "<tr>";
       echo "<td height=50>"; echo "<font size=5>"; echo "CONSIGNMENT QUANTITY  :"; echo "</font>"; echo "</td>";
       echo "<td height=50>"; echo "<font size=5>"; echo $row["cquantity"]; echo "</font>"; echo "</td>";
     echo "</tr>";
   
     echo "<tr>";
       echo "<td height=50>"; echo "<font size=5>"; echo "COST PER PIECE  :"; echo "</font>"; echo "</td>";
       echo "<td height=50>"; echo "<font size=5>"; echo $row["cost_per_piece"]; echo "</font>"; echo "</td>";
     echo "</tr>";

      echo "<tr>";
       echo "<td height=50>"; echo "<font size=5>"; echo "TOTAL  :"; echo "</font>"; echo "</td>";
       echo "<td height=50>"; echo "<font size=5>"; echo $row["TOTAL"]; echo "</font>"; echo "</td>";
     echo "</tr>";

     
  echo "</table>";
  echo "</form>";
}
 
}
?>