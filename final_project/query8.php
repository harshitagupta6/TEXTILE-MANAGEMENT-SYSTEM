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

   <form action="query8.php" method="post">
       <table>
       <col width="50">
       
         <tr>
            <td><font size="6">QUERY 8</font></td>              
            <br/>
            <br/>
         </tr>


         <tr>
            </br>
            <td><b><font size="5">SUPERVISOR OF SUPERVISOR OF A EMPLOYEE </font> </b></td>
        </tr>

        <tr>
            <td height="50"><font size="5">EMPLOYEE ID :  </font></td>
            <td><input style="height:30px;font-size:14pt type="text" name="empid" placeholder="EXX"></td> 
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
{  $q = "SELECT E.eid,E.ename
         FROM employee E
         WHERE E.eid IN (SELECT E1.superid
                 FROM employee E1
                 WHERE E1.eid IN (SELECT E2.superid
                                 FROM employee E2
                                 WHERE E2.eid='$_POST[empid]'))";

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
 echo "<th>"; echo "EMPLOYEE ID"; echo "</th>";
  echo "<th>"; echo "EMPLOYEE NAME"; echo "</th>"; 
echo "</tr>";

while($row=mysqli_fetch_array($res))
{
   echo "<tr>";
     echo "<td>"; echo $row["eid"]; echo "</td>";
     echo "<td>"; echo $row["ename"]; echo "</td>";
   echo "</tr>";
}
echo "</table>";

}
 

?>