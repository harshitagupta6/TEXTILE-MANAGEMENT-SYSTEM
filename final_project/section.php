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
<body style="background:url(section.jpg);background-size:100% 100%">
   <div class="nav_bar">
       <ul>
          <li><a href="home.php" >HOME</a></li>
          <li><a href="employee.php">EMPLOYEE</a></li>
          <li><a href="stock.php">STOCK</a></li>
          <li><a href="section.php" id="onlink">SECTION</a></li>
          <li><a href="customer.php">CUSTOMER</a></li>
          <li><a href="dispatch.php">DISPATCH</a></li>
          <li><a href="query.php">QUERY</a></li> 
       </ul>
   </div>
   
  <form action="section.php" method="post">
       <table>
       <col width="130">
       
         <tr>
            <td><font size="6">SECTION</font></td>
            <br/>
            <br/>
         </tr>


        <tr>
            <td height="50"><font size="5">SECTION ID :  </font></td>
            <td><input style="height:30px;font-size:14pt type="text" name="sid" placeholder="SXX"></td> 
         </tr>
           
         <tr>
            <td height="50"><font size="5">SECTION NAME:  </font></td>
            <td><input style="height:30px;font-size:14pt type="text" name="sname" placeholder="SECTION NAME"></td> 
         </tr>
           

         <tr>
            <td height="50"><font size="5"> SECTION HEAD ID:  </font></td>
            <td><input style="height:30px;font-size:14pt type="text" name="sechid" placeholder="SECTION HEAD ID "></td> 
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
     mysqli_query($link,"insert into section values ('$_POST[sid]','$_POST[sname]','$_POST[sechid]')");
   }
  
 if(isset($_POST["submit2"]))
   {
       mysqli_query($link,"delete from section where sid='$_POST[sid]'");
   }

if(isset($_POST["submit3"]))
{
  $q1="select * from section where sid='$_POST[sid]'";
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
  echo "<th>"; echo "SECTION ID"; echo "<th/>";
  echo "<th>"; echo "SECTION NAME"; echo "<th/>";
  echo "<th>"; echo "SECTION HEAD ID"; echo "<th/>";
  echo "</tr>";

  while($row1=mysqli_fetch_array($res1))
   {
      echo "<tr>";
  echo "<td>"; echo $row1["sid"]; echo "<td/>";
  echo "<td>"; echo $row1["sname"]; echo "<td/>";
  echo "<td>"; echo $row1["sec_head"]; echo "<td/>";
  echo "</tr>";
   }
   
  echo "</table>";
}

if(isset($_POST["submit4"]))
{
  $q="select * from section";
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
  echo "<th>"; echo "SECTION ID"; echo "<th/>";
  echo "<th>"; echo "SECTION NAME"; echo "<th/>";
  echo "<th>"; echo "SECTION HEAD ID"; echo "<th/>";
  echo "</tr>";

  while($row=mysqli_fetch_array($res))
   {
      echo "<tr>";
  echo "<td>"; echo $row["sid"]; echo "<td/>";
  echo "<td>"; echo $row["sname"]; echo "<td/>";
  echo "<td>"; echo $row["sec_head"]; echo "<td/>";
  echo "</tr>";
   }
   
  echo "</table>";
}
?>