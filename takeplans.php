<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Plans</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/3327678131.js" crossorigin="anonymous"></script>
</head>

<style>
  * {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
  }

  .plans {
    width: 80%;
    margin: auto;
    text-align: center;
    padding-top: 120px;
  }

  h1 {
    font-size: 36px;
    font-weight: 600;
  }

  p {
    font-size: 18px;
    font-weight: 300;
    line-height: 22px;
    padding: 10px;
  }

  .row {
    margin-top: 5%;
    display: flex;
    justify-content: space-between;
  }

  .plans-col {
    flex-basis: 31%;
    background: #fff2f2;
    border-radius: 10px;
    margin-bottom: 5%;
    padding: 40px 12px;
    box-sizing: border-box;
    transition: 0.5s;
  }

  .plans-col a{
    text-decoration: none;
    color: black;
  }

  h3 {
    text-align: center;
    font-weight: 600;
    margin: 10px 0;
    font-size: 26px;
  }

  .plans-col:hover {
    box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.2);
    cursor: pointer;
  }

  .col-1{
    background: rgba(150,116,68, 0.3);
  }

  .col-2{
    background: rgba(192,192,192, 0.4);
  }

  .col-3{
    background: rgba(255, 215, 0, 0.4);
  }

  input{
    padding: 5px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor:pointer;
  }

</style>

<?php 
  $conn = mysqli_connect("localhost", "root", "", "project");
  $qry = "Select * from mplantype";
  $result = $conn->query($qry);
  $row = $result->fetch_assoc();
  
  $mname = $row['mname'];
  $mplimit = $row['mplimit'];
  $mpprice = $row['mpprice'];
?>

<body>
  <section class="plans">
    <h1>Plans We Offer</h1>
    <p>Following are the 3 basic plans we offer .</p>
    <div class="row">
      <div class="plans-col col-1">
        <a href="bronze">
          <h3>Bronze</h3>
          <p>Rs. 2000</p>
          <p>20 Appointments</p><br>
        </a>
      </div>
      <div class="plans-col col-2">
        <a href="">
          <h3>Silver</h3>
          <p>Rs. 5000</p>
          <p>50 Appointments</p><br>
        </a>
      </div>
      <div class="plans-col col-3">
        <a href="">
          <h3>Gold</h3>
          <p>Rs. 8000</p>
          <p>80 Appointments</p><br>
        </a>
      </div>
    </div>
  </section>
</body>

</html>