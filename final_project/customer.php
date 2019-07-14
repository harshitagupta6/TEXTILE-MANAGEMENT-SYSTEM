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
<body style="background:url(customer.jpg);background-size:100% 100%">
   <div class="nav_bar">
       <ul>
          <li><a href="home.php" >HOME</a></li>
          <li><a href="employee.php">EMPLOYEE</a></li>
          <li><a href="stock.php">STOCK</a></li>
          <li><a href="section.php">SECTION</a></li>
          <li><a href="customer.php" id="onlink">CUSTOMER</a></li>
          <li><a href="dispatch.php">DISPATCH</a></li>
          <li><a href="query.php">QUERY</a></li> 
       </ul>
   </div>

  <form action="customer.php" method="post">
       <table>
       <col width="130">
       
         <tr>
            <td><font size="6">CUSTOMER</font></td>
            <br/>
            <br/>
         </tr>


        <tr>
            <td height="50"><font size="5">CUSTOMER ID :  </font></td>
            <td><input style="height:30px;font-size:14pt type="text" name="cusid" placeholder="CXX"></td> 
         </tr>
           
         <tr>
            <td height="50"><font size="5">CUSTOMER NAME:  </font></td>
            <td><input style="height:30px;font-size:14pt type="text" name="cusname" placeholder="CUSTOMER NAME"></td> 
         </tr>
         
         <tr>
            <td height="50"><font size="5">CUSTOMER CONTACT  </font></td>
            <td><input style="height:30px;font-size:14pt type="NUMBER" name="cuscon" placeholder="CUSTOMER CONTACT"></td> 
         </tr>

       

         <tr>
            <td height="50"><font size="5">FIRM NAME:  </font></td>
            <td><input style="height:30px;font-size:14pt type="text" name="fname" placeholder="FIRMNAME"></td> 
         </tr>
               

         <tr>
            <td colspan="2" align="center"><input type="submit" name="submit1" value="INSERT" class="btn">
                                           <input type="submit" name="submit2" value="DELETE" class="btn">
                                           <input type="submit" name="submit3" value="SEARCH" class="btn">
                                           <input type="submit" name="submit4" value="DISPLAY" class="btn">
           </td>
           </td>
         </tr>
       </table>
    </form> 

</body>
</html>

<?php

if(isset($_POST["submit1"]))
{
  mysqli_query($link,"insert into customer values('$_POST[cusid]','$_POST[cusname]','$_POST[cuscon]','$_POST[fname]')");
}

if(isset($_POST["submit2"])) 
{
  mysqli_query($link,"delete from customer where cusid='$_POST[cusid]'");
}

if(isset($_POST["submit3"]))
{
  $q1="select * from customer where cusid='$_POST[cusid]'";
  $res1=mysqli_query($link,$q1);
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
   echo "<th>"; echo "CUSTOMER ID"; echo "</th>";
   echo "<th>"; echo "CUSTOMER NAME"; echo "</th>";
   echo "<th>"; echo "CONTACT"; echo "</th>";
   echo "<th>"; echo "FIRM NAME"; echo "</th>";
 echo "</tr>"; 

 while($row1=mysqli_fetch_array($res1))
{
   echo "<tr>";
   echo "<td>"; echo $row1["cusid"]; echo "</td>";
   echo "<td>"; echo $row1["cusname"]; echo "</td>";
   echo "<td>"; echo $row1["cus_contact"]; echo "</td>";
   echo "<td>"; echo $row1["firm_name"]; echo "</td>";
 echo "</tr>"; 

}
 echo "</table>";  
}

if(isset($_POST["submit4"]))
{
  $q="select * from customer";
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
   echo "<th>"; echo "CUSTOMER ID"; echo "</th>";
   echo "<th>"; echo "CUSTOMER NAME"; echo "</th>";
   echo "<th>"; echo "CONTACT"; echo "</th>";
   echo "<th>"; echo "FIRM NAME"; echo "</th>";
 echo "</tr>"; 

 while($row=mysqli_fetch_array($res))
{
   echo "<tr>";
   echo "<td>"; echo $row["cusid"]; echo "</td>";
   echo "<td>"; echo $row["cusname"]; echo "</td>";
   echo "<td>"; echo $row["cus_contact"]; echo "</td>";
   echo "<td>"; echo $row["firm_name"]; echo "</td>";
 echo "</tr>"; 

}
 echo "</table>"; 
}
?>