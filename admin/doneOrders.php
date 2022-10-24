<?php include_once("header.php"); ?>

  <div class="content-wrapper">
    <?php
      $conn = mysqli_connect("localhost", "root", "", "project");
      $cnt=1;
      $od="";

      $query="select oid,count(*) as count from orderdetails where orderdetails.dod!='0000-00-00 00:00:00' AND dbid!=0 group by oid";
        
      $result=$conn->query($query);
      $tbl = "<section class='content'><div class='container-fluid'><div class='row'><div class='col-12'><div class='card'><div class='card-body table-responsive p-0' style='height: 84vh;'><table class='table table-head-fixed text-nowrap'><thead><tr><th>Sr No.</th><th>User name</th><th>Zip Code</th><th>Date of Order</th><th></th><th></th></tr></thead>";
      while($row=$result->fetch_assoc())
      {
        $od=$row['oid']; 
            
        $qry="select * from orders where oid='$od'";
        $result1=$conn->query($qry);
        while($row=$result1->fetch_assoc())
        {
          $tbl.="<tbody><tr><td>$cnt</td><td>".$row["fullname"]."</td><td>".$row["ozip"]."</td><td>".$row["doo"]."</td><td><a href='orderDetails.php?id=".$row["oid"]."'><input type='submit' class='view' name='view' value='View Order'></a></td></tr></tbody>";
                  
          $cnt++; 
        } 
      }    
              
      $tbl .= "</table></div><!-- /.card-body --></div><!-- /.card --></div></div><!-- /.row --></div><!-- /.container-fluid --></section><!-- /.content --></div>";
      echo "<br>" . $tbl;
    ?>                  
  
<?php include_once("footer.php"); ?>