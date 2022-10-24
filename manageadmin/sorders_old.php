<?php
    include_once("header.php");
?>

<style>
table {
 

  border-collapse: collapse;
	width: 500px;
  border-style: solid;
  border-width: thin;
  border:solid black;
  

}

td {
	padding: 10px;
	color: #636363;
	border: 1px solid #dddfe1;
  /* border:solid black; */
  
}



th, td {
  text-align: left;
  padding: 8px;
  /* border:solid black; */

}

tr:nth-child(even){background-color: #f2f2f2}

th {
  
  background-color: #54585d;
	border: 1px solid #54585d;
  color: white;
  font-weight:bold;
  border-bottom:solid black;
}
th:hover {
	background-color: #64686e;
  /* border:solid black; */
}
</style>


<div class="col-12">
    <h3 class="page-title">Delivered Orders</h3><br>
    <div class="card-body" style="text-align:right;">
    <a href='sorders.php'>
    <button type="submit" name="btnsub">new orders</button></a>
    </div>
    <div class="card">
    
    <?php
  
        $cnt=1;
        $od="";
        $cnn=mysqli_connect("localhost","root","","project");
        
        $query="select oid,count(*) as count from orderdetails where orderdetails.dod!='0000-00-00 00:00:00' AND dbid!=0 group by oid";

        $result=$cnn->query($query);
        $str="<table class='table'><tr class='card-title m-b-0'><th>Sr No.</th><th>User name</th><th>Zip Code</th><th>Date and time</th><th></th></tr>";
        while($row=$result->fetch_assoc())
        {
            $od=$row['oid'];  
            $qry="select * from orders where oid='$od'";
            $result1=$cnn->query($qry);
            while($row=$result1->fetch_assoc())
            {
                $str.="<tr><td>$cnt</td><td>".$row["fullname"]."</td><td>".$row["ozip"]."</td><td>".$row["doo"]."</td><td><a href='sorderdet.php?id=".$row["oid"]."'><button>view order</button></a></td></tr>";
                $cnt++; 
            } 
    }    
              
        $str.="</table>";
        echo $str; 
    ?>
    
</div>
    </div>
<?php
    include_once("footer.php");
?>
