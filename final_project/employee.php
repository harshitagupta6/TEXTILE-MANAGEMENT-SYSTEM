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
<body style="background:url(employee1.jpg);background-size:100% 100%"> 
   <div class="nav_bar">
       <ul>
          <li><a href="home.php" >HOME</a></li>
          <li><a href="employee.php" id="onlink">EMPLOYEE</a></li>
          <li><a href="stock.php">STOCK</a></li>
          <li><a href="section.php">SECTION</a></li>
          <li><a href="customer.php">CUSTOMER</a></li>
          <li><a href="dispatch.php">DISPATCH</a></li>
          <li><a href="query.php">QUERY</a></li> 
       </ul>
   </div>
   
<form enctype="multipart/form-data" action="employee.php" method="post">
       <table>
       <col width="130">
       
         <tr>
            <td><font size="6">EMPLOYEE FORM</font></td>
            <br/>
            <br/>
         </tr>


        <tr>
            <td height="50"><font size="5">EMPID:  </font></td>
            <td><input style="height:30px;font-size:14pt type="text" name="id" placeholder="EXX" width="100%" ></td> 
         </tr>
           
         <tr>
            <td height="50"><font size="5">NAME:  </font></td>
            <td><input style="height:30px;font-size:14pt type="text" name="name" placeholder="NAME" ></td> 
         </tr>
         
         <tr>
            <td height="50"><font size="5">SALARY  </font></td>
            <td><input style="height:30px;font-size:14pt type="number" name="salary" placeholder="SALARY" ></td> 
         </tr>

        <tr>
            <td height="50"><font size="5">AGE </font></td>
            <td><input style="height:30px;font-size:14pt type="number" name="age" placeholder="AGE" ></td> 
         </tr>

         <tr>
            <td height="50"><font size="5">SUPERID:  </font></td>
            <td><input style="height:30px;font-size:14pt type="text" name="superid" placeholder="SUPERID" ></td> 
         </tr>
         
        <tr>
            <td height="50"><font size="5">SID:  </font></td>
            <td><input style="height:30px;font-size:14pt type="text" name="sid" placeholder="SECTION ID" ></td><br/> 
         </tr>
     
         <tr>
            <td colspan="2" align="center" ><input  type="submit" id ="sub" name="submit1" value="INSERT" class="btn">
                                           <input  type="submit" id ="sub"  name="submit2" value="DELETE" class="btn" >
                                           <input  type="submit" id ="sub"  name="submit3" value="SEARCH" class="btn">
                                           <input  type="submit" id ="sub"  name="submit4" value="DISPLAY" class="btn">
           </td>
         </tr>
       </table>
    </form>


</body>
</html>


   <?php
if(isset($_POST["submit1"]))
{
   mysqli_query($link,"insert into employee values('$_POST[id]','$_POST[name]','$_POST[salary]','$_POST[age]','$_POST[superid]','$_POST[sid]')");
}

if(isset($_POST["submit2"]))
{
  mysqli_query($link,"delete from employee where eid='$_POST[id]'");
}

if(isset($_POST['submit3']))
{
 $q1="select * from employee where eid='$_POST[id]'";
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
   echo "<th>"; echo "ID"; echo "</th>";
   echo "<th>"; echo "NAME"; echo "</th>";
   echo "<th>"; echo "SALARY"; echo "</th>";
   echo "<th>"; echo "AGE"; echo "</th>";
   echo "<th>"; echo "SUPERVISOR ID"; echo "</th>";
   echo "<th>"; echo " SECTION ID"; echo "</th>"; 
  echo  "</tr>";
  
  while($row1=mysqli_fetch_array($res1))
   {
     echo "<tr>";
   echo "<td>"; echo $row1["eid"]; echo "</td>";
   echo "<td>"; echo $row1["ename"]; echo "</td>";
   echo "<td>"; echo $row1["salary"]; echo "</td>";
   echo "<td>"; echo $row1["age"]; echo "</td>";
   echo "<td>"; echo $row1["superid"]; echo "</td>";
   echo "<td>"; echo $row1["sid"]; echo "</td>"; 
  echo  "</tr>";
   }
 echo "</table>";
}


 
if(isset($_POST['submit4']))
{
  
 $q="select * from employee";
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
 echo "<td>"; echo $row["superid"]; echo "</td>";
 echo "<td>"; echo $row["sid"]; echo "</td>";
 echo "</tr>";
  }
  echo "</table>";
}

?>

