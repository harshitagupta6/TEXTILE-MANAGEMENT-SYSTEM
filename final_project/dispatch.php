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
<body style="background:url(dispatch1.jpg);background-size:100% 100%">
   <div class="nav_bar">
       <ul>
          <li><a href="home.php" >HOME</a></li>
          <li><a href="employee.php">EMPLOYEE</a></li>
          <li><a href="stock.php">STOCK</a></li>
          <li><a href="section.php">SECTION</a></li>
          <li><a href="customer.php">CUSTOMER</a></li>
          <li><a href="dispatch.php" id="onlink">DISPATCH</a></li>
          <li><a href="query.php">QUERY</a></li> 
       </ul>
   </div>
   
   <form action="dispatch.php" method="post">
       <table>
       <col width="130">
       
         <tr>
            <td><font size="6">DISPATCH</font></td>
            <br/>
            <br/>
         </tr>


        <tr>
            <td height="50"><font size="5">DISPATCH ID :  </font></td>
            <td><input style="height:30px;font-size:14pt type="text" name="disid" placeholder="DXX"></td> 
         </tr>
           
         <tr>
            <td height="50"><font size="5">DRIVER ID :  </font></td>
            <td><input style="height:30px;font-size:14pt type="text" name="did" placeholder="EXX"></td> 
         </tr>
         
         <tr>
            <td height="50"><font size="5">CUSTOMER ID:  </font></td>
            <td><input style="height:30px;font-size:14pt type="text" name="cusid" placeholder="CXX"></td> 
         </tr>

       

         <tr>
            <td height="50"><font size="5">DISPATCH DATE:  </font></td>
            <td><input style="height:30px;font-size:14pt type="date" name="ddate" placeholder="yyyy-mm-dd"></td> 
         </tr>
         
        <tr>
            <td height="50"><font size="5">STOCK ID:  </font></td>
            <td><input style="height:30px;font-size:14pt type="text" name="cid" placeholder="RXX/FXX"></td><br/> 
         </tr>
                

         <tr>
            <td colspan="2" align="center"><input type="submit" name="submit1" value="INSERT" class="btn">
                                           <input type="submit" name="submit2" value="DELETE" class="btn">
                                           <input type="submit" name="submit3" value="SEARCH" class="btn">
                                           <input type="submit" name="submit4" value="DISPLAY" class="btn">
           </td>
         </tr>
       </table>
    </form>
   
</body>
</html>

<?php
if(isset($_POST["submit1"]))
{
  mysqli_query($link,"insert into dispatch values ('$_POST[disid]','$_POST[did]','$_POST[cusid]','$_POST[ddate]','$_POST[cid]')");
}

if(isset($_POST["submit2"]))
{
  mysqli_query($link,"delete from dispatch where dis_id='$_POST[disid]'");
}

if(isset($_POST["submit3"]))
{
  $q1="select * from dispatch where dis_id='$_POST[disid]'";
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
      echo "<th>"; echo "DISPATCH ID"; echo "</th>";
      echo "<th>"; echo "DRIVER ID"; echo "</th>";
      echo "<th>"; echo "CUSTOMER ID"; echo "</th>";
      echo "<th>"; echo "DISPATCH DATE"; echo "</th>";
      echo "<th>"; echo "CONSIGNMENT ID"; echo "</th>";
    echo "</tr>";

   while($row1=mysqli_fetch_array($res1))
    {
      echo "<tr>";
      echo "<td>"; echo $row1["dis_id"]; echo "</td>";
      echo "<td>"; echo $row1["driver_id"]; echo "</td>";
      echo "<td>"; echo $row1["cus_id"]; echo "</td>";
      echo "<td>"; echo $row1["dis_date"]; echo "</td>";
      echo "<td>"; echo $row1["cid"]; echo "</td>";
    echo "</tr>";
    }
    echo "</table>";
}


if(isset($_POST["submit4"]))
{
  $q="select * from dispatch";
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
      echo "<th>"; echo "DISPATCH ID"; echo "</th>";
      echo "<th>"; echo "DRIVER ID"; echo "</th>";
      echo "<th>"; echo "CUSTOMER ID"; echo "</th>";
      echo "<th>"; echo "DISPATCH DATE"; echo "</th>";
      echo "<th>"; echo "CONSIGNMENT ID"; echo "</th>";
    echo "</tr>";

   while($row=mysqli_fetch_array($res))
    {
      echo "<tr>";
      echo "<td>"; echo $row["dis_id"]; echo "</td>";
      echo "<td>"; echo $row["driver_id"]; echo "</td>";
      echo "<td>"; echo $row["cus_id"]; echo "</td>";
      echo "<td>"; echo $row["dis_date"]; echo "</td>";
      echo "<td>"; echo $row["cid"]; echo "</td>";
    echo "</tr>";
    }
    echo "</table>";
}
?>