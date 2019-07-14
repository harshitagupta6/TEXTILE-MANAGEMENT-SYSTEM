<?php
$link1=mysqli_connect("localhost","root","");
mysqli_select_db($link1,"textile");
?>

<html>
<head>
<title>HOME</title>
<link rel="stylesheet" href="css/style1.css"/>
<link rel="stylesheet" href="css/button-style.css"/>
<link rel="stylesheet" href="css/input_style.css"/>
</head>
<body  style="background:url(stock.jpg);background-size:100% 100%">
   <div class="nav_bar">
       <ul>
          <li><a href="home.php" >HOME</a></li>
          <li><a href="employee.php">EMPLOYEE</a></li>
          <li><a href="stock.php" id="onlink">STOCK</a></li>
          <li><a href="section.php">SECTION</a></li>
          <li><a href="customer.php">CUSTOMER</a></li>
          <li><a href="dispatch.php">DISPATCH</a></li>
          <li><a href="query.php">QUERY</a></li> 
       </ul>
   </div>
  <form action="stock.php" method="post">
       <table>
       <col width="130">
       
         <tr>
            <td><font size="6">STOCKS</font></td>
            <br/>
            <br/>
         </tr>


        <tr>
            <td height="50"><font size="5">STOCK ID :  </font></td>
            <td><input style="height:30px;font-size:14pt type="text" name="conid" placeholder="RXX/FXX"></td> 
         </tr>
           
         <tr>
            <td height="50"><font size="5">STOCK TYPE :  </font></td>
            <td><input style="height:30px;font-size:14pt type="text" name="ctype" placeholder="STOCK TYPE"></td> 
         </tr>
         
         <tr>
            <td height="50"><font size="5">STOCK NAME:  </font></td>
            <td><input style="height:30px;font-size:14pt type="text" name="cname" placeholder="STOCK NAME"></td> 
         </tr>

       

         <tr>
            <td height="50"><font size="5">SUPERID:  </font></td>
            <td><input style="height:30px;font-size:14pt type="text" name="superid" placeholder="SUPERID"></td> 
         </tr>
         
        <tr>
            <td height="50"><font size="5">STOCK QUANTITY:  </font></td>
            <td><input style="height:30px;font-size:14pt type="number" name="sq" placeholder="STOCK QUANTITY"></td><br/> 
         </tr>
         
         <tr>
            <td height="50"><font size="5">COST PER PIECE  </font></td>
            <td><input style="height:30px;font-size:14pt type="number" name="cost" placeholder="IN RUPEES"></td><br/> 
         </tr>
        
         <tr>
            <td height="50"><font size="5">CUSTOMER ID :  </font></td>
            <td><input style="height:30px;font-size:14pt type="text" name="cusid" placeholder="CXX"></td> 
         </tr>

         <tr>
            <td height="50"><font size="5">ARRIVAL DATE :  </font></td>
            <td><input style="height:30px;font-size:14pt type="date" name="arrdate" placeholder="yyyy-mm-dd"></td> 
         </tr>

         <tr>
            <td height="50"><font size="5">DISPATCH ID :  </font></td>
            <td><input style="height:30px;font-size:14pt type="date" name="disid" placeholder="DXX"></td> 
         </tr>


         <tr>
            <td colspan="2" align="center"><input type="submit" name="submitA" value="INSERT" class="btn">
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
if(isset($_POST["submitA"]))
{
  mysqli_query($link1,"insert into consignment values ('$_POST[conid]','$_POST[ctype]','$_POST[cname]','$_POST[superid]','$_POST[sq]','$_POST[cost]','$_POST[cusid]','$_POST[arrdate]','$_POST[disid]')");
}

if(isset($_POST['submit2']))
{
  mysqli_query($link1,"delete from consignment where cid='$_POST[conid]'");
}

if(isset($_POST['submit3']))
{
  $q1="select * from consignment where cid='$_POST[conid]'";
  $res1=mysqli_query($link1,$q1);
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
     echo "<th>"; echo "STOCK ID"; echo "</th>";
     echo "<th>"; echo "STOCK TYPE"; echo "</th>";
     echo "<th>"; echo "STOCK NAME"; echo "</th>";
     echo "<th>"; echo "SUPERVISOR ID"; echo "</th>";
     echo "<th>"; echo "QUANTITY"; echo "</th>";
     echo "<th>"; echo "COST PER PIECE"; echo "</th>";
     echo "<th>"; echo "CUSTOMER ID"; echo "</th>";
     echo "<th>"; echo "ARRIVAL DATE"; echo "</th>";
     echo "<th>"; echo "DISPATCH DATE"; echo "</th>";  
   echo "</tr>";

   while($row1=mysqli_fetch_array($res1))
    {
        echo "<tr>";
     echo "<td>"; echo $row1["cid"];  echo "</td>";
     echo "<td>"; echo $row1["ctype"];  echo "</td>";
     echo "<td>"; echo $row1["cname"];  echo "</td>";
     echo "<td>"; echo $row1["superid"];  echo "</td>";
     echo "<td>"; echo $row1["cquantity"];  echo "</td>";
     echo "<td>"; echo $row1["cost_per_piece"];  echo "</td>";
     echo "<td>"; echo $row1["cusid"];  echo "</td>";
     echo "<td>"; echo $row1["arr_date"];  echo "</td>";
     echo "<td>"; echo $row1["dis_id"];  echo "</td>";  
   echo "</tr>";    
    }
   echo "</table>";
}

if(isset($_POST['submit4']))
{
  $q="select * from consignment";
  $res=mysqli_query($link1,$q);
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
     echo "<th>"; echo "STOCK ID"; echo "</th>";
     echo "<th>"; echo "STOCK TYPE"; echo "</th>";
     echo "<th>"; echo "STOCK NAME"; echo "</th>";
     echo "<th>"; echo "SUPERVISOR ID"; echo "</th>";
     echo "<th>"; echo "QUANTITY"; echo "</th>";
     echo "<th>"; echo "COST PER PIECE"; echo "</th>";
     echo "<th>"; echo "CUSTOMER ID"; echo "</th>";
     echo "<th>"; echo "ARRIVAL DATE"; echo "</th>";
     echo "<th>"; echo "DISPATCH DATE"; echo "</th>";  
   echo "</tr>";
 
   while($row1=mysqli_fetch_array($res))
    {
        echo "<tr>";
     echo "<td>"; echo $row1["cid"];  echo "</td>";
     echo "<td>"; echo $row1["ctype"];  echo "</td>";
     echo "<td>"; echo $row1["cname"];  echo "</td>";
     echo "<td>"; echo $row1["superid"];  echo "</td>";
     echo "<td>"; echo $row1["cquantity"];  echo "</td>";
     echo "<td>"; echo $row1["cost_per_piece"];  echo "</td>";
     echo "<td>"; echo $row1["cusid"];  echo "</td>";
     echo "<td>"; echo $row1["arr_date"];  echo "</td>";
     echo "<td>"; echo $row1["dis_id"];  echo "</td>";  
   echo "</tr>";    
    }
   echo "</table>";
   
}

?>