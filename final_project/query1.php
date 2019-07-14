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

   <form action="query1.php" method="post">
       <table>
       <col width="50">
       
         <tr>
            <td><font size="6">QUERY 1</font></td>              
            <br/>
            <br/>
         </tr>


         <tr>
            </br>
            <td><b><font size="5">FIND THE TOP 3 SALARIES OF THE COMPANY </font> </b></td>
        </tr> 

        <tr>
         <td  colspan="2" align="center"><input type="submit" name="submit" value="FIND" class="btn"></td>
        </tr>
       
        
       </table>
    </form>
     
   </body>
   </html> 

<?php

if(isset($_POST["submit"]))
{
  $q="select * from employee where salary>=(select MAX(salary) from employee where salary<(select MAX(salary) from employee where salary<(select MAX(salary) from employee)))";  
$res=mysqli_query($link,$q);
  echo "<table border=1>";

   echo "<style>";
  echo "table{border-collapse:collapse;
              width:100%
              }";
 echo "th,td{text-align:left;
             padding:8px
             }";
 
 echo "th{background-color:#000000;
          color:white}";
echo "</style>";
 

   echo "<tr>";
     echo "<th>"; echo "ID"; echo "</th>";
     echo "<th>"; echo "NAME"; echo "</th>";
     echo "<th>"; echo "SALARY"; echo "</th>";
     echo "<th>"; echo "AGE"; echo "</th>";
     echo "<th>"; echo "SUPERVISOR ID"; echo "</th>";
     echo "<th>"; echo "SECTION ID"; echo "</th>"; 
   echo "</tr>";

   while($row=mysqli_fetch_array($res))
    {

      echo "<tr>";
     echo "<td>"; echo $row["eid"]; echo "</td>";
     echo "<td>"; echo $row["ename"]; echo "</td>";
     echo "<td>"; echo $row["salary"]; echo "</td>";
     echo "<td>"; echo $row["age"]; echo "</td>";
     echo "<td>"; echo $row["age"]; echo "</td>";
     echo "<td>"; echo $row["sid"]; echo "</td>"; 
   echo "</tr>";

    }
  echo "</table>";
}
?>