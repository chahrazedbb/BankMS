<?php 
    session_start();
            
    if(!isset($_SESSION['customer_login'])) 
        header('location:index.php');   
?>
<html>
<head>
  <noscript><meta http-equiv="refresh" content="0;url=no-js.php"></noscript>    
  <meta charset="UTF-8">
  <title>MA BANUQUE</title>
  <style>
  * {
      box-sizing: border-box;
  }
  body {
    background-image: url("bl.png");
    margin: 0;
  }
  .marwa {
      background-color: white;
            padding: 15px;
  }
  .topmenu {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #019CBA;
  }
    .header {
      background-color: #2196F3 ;
      color: white;
      text-align: center;
      padding: 15px;
  }
  .footer {
      background-color: #444;
      color: white;
      padding: 15px;
  }
  .topmenu li {
      float: left;
  }
  .topmenu li a {
      display: inline-block;
      color: white;
      text-align: center;
      padding: 16px;
      text-decoration: none;
  }
  .topmenu li a:hover {
      background-color: #222;
  }
  .topmenu li a.active {
      color: white;
      background-color: #4CAF50;
  }
  .column {
      float: left;
      padding: 15px;
  }
  .clearfix::after {
      content: "";
      clear: both;
      display: table;
  }
  .sidemenu {
      width: 25%;
  }
  .content {
      width: 75%;
  }
  .sidemenu ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
  }
  .sidemenu li a {
      margin-bottom: 4px;
      display: block;
      padding: 8px;
      background-color: #eee;
      text-decoration: none;
      color: #666;
  }
  .sidemenu li a:hover {
      background-color: #555;
      color: white;
  }
  .sidemenu li a.active {
      background-color: #008CBA;
      color: white;
  }
  input[type=text],input[type=email],input[type=password], select {
      position: absolute;
        left: 400px;
        width: 20%;
        padding: 10px 15px;
        margin: 5px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        border: #455a64 solid 1px;
        border-radius: 20px;
          font-family:"harrington";
  }
  input[type=submit] {
        width: 20%;
       position: absolute;
        left: 400px;
        background-color: #87CEFA;
        color: white;
        padding: 10px 15px;
        margin: 5px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      border: #455a64 solid 1px;
        border-radius: 20px;
          font-family:"harrington";
    }
    th {
        width: 20%;
        left: 400px;
        padding: 10px 15px;
        margin: 5px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        border: #87CEFA solid 1px;
        border-radius: 20px;
         font-family:"harrington";
        background-color: #87CEFA;
    }
    td {
        width: 20%;
        left: 400px;
        padding: 10px 15px;
        margin: 5px 0;
        font-family:"harrington";
    }
  </style>
</head>
<body>

<ul class="topmenu">
  <li><a href="customer_account_summary.php" class="active" >Aceuil</a></li>
  <li><a href="contacter.php" >Contacter Nous</a></li>
  <li><a href="apropos.php">A propos</a></li>
</ul>

<div class="clearfix">
  <div class="column sidemenu">
    <ul>
      <li id='caption'>Accounts</li>
      <li><a href="customer_account_summary.php" >Sommaire du compte</a></li>
      <li><a href="customer_mini_statement.php" class="active">Mini relevé</a></li>
      <li><a href="customer_account_statement.php">Relevé de compte</a></li>
    </ul>
    <ul>
      <li id='caption'>Transfert de fonds</li>
      <li><a href="add_beneficiary.php">Ajouter un Bénéficiaire</a></li>
      <li><a href="display_beneficiary.php">Voir les Bénéficiaire ajoutés</a></li>
      <li><a href="customer_transfer.php">Transfert du fonds</a></li>
    </ul>
    <ul>
      <li id='caption'>Profile</li>
      <li><a href="customer_personal_details.php">Detailles</a></li>
      <li><a href="change_password_customer.php">Changer mot de passe</a></li>
      <li><a href="customer_logout.php">Se deconnecter</a></li>
    </ul>
  </div>

  <div class="column content">
    <div class="header">
      <h1>Bien Venu <?php echo $_SESSION['name']?></h1>
    </div>
    <br>
    <div class="marwa"> 
    <h1>Les 10 derniers transactions</h1>
    <p>
      <?php
        include '_inc/dbconn.php';
        $sender_id=$_SESSION["login_id"];
        $sql="SELECT * FROM passbook".$sender_id." LIMIT 10";
        $result=  mysql_query($sql) or die(mysql_error()); 
      ?>
      <table align="center">
        <th>Id</th>
        <th>Date de transaction</th>
        <th>Narration</th>
        <th>Credit</th>
        <th>Debit</th>
        <th>Montant</th>
        <?php
        while($rws=  mysql_fetch_array($result))
        {
          echo "<tr>";
          echo "<td>".$rws[0]."</td>";
          echo "<td>".$rws[1]."</td>";
          echo "<td>".$rws[8]."</td>";
          echo "<td>".$rws[5]."</td>";
          echo "<td>".$rws[6]."</td>";
          echo "<td>".$rws[7]."</td>";
          echo "</tr>";
        } 
      ?>
    </table>
  </p> 
  <br><br>        
  </div>
</div>
</div>
</body>
</html>
