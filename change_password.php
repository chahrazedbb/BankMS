<?php 
session_start();
include '_inc/dbconn.php';
        
if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php');   
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
  input[type=text],input[type=email],input[type=password], select ,input[type=date]{
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
        background-color: #6A5ACD;
        color: white;
        padding: 10px 15px;
        margin: 5px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      border: #6A5ACD solid 1px;
        border-radius: 20px;
          font-family:"harrington";
    }
    textarea{
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
    th {
        width: 10%;
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
        width: 10%;
        left: 400px;
        padding: 10px 15px;
        margin: 5px 0;
        font-family:"harrington";
    }
  </style>
</head>
<body>

<ul class="topmenu">
   <li><a href="admin_hompage.php" class="active" >Acueil Admin </a></li>
   <li><a href="change_password.php">Changer le mot de passe</a></li>
   <li><a href="admin_logout.php">Se Deconnecter</a></li>
</ul>

<div class="clearfix">
  <div class="column sidemenu">
    <ul>
      <li><a href="admin_hompage.php">Acueil Admin </a></li>
    </ul>  
    <ul>
      <li>Agent</li>
      <li><a href="addstaff.php" >Ajouter un membre agent</a></li>
      <li><a href="display_staff.php" >Modifier le membre agent</a></li>
      <li> <a href="delete_staff.php" >Supprimer l'agent</a></li>
    </ul>
    <ul>
        <li>Client</li>
        <li><a href="addcustomer.php">Ajouter Client</a></li>
        <li> <a href="display_customer.php"  >Modifier Client</a></li>
        <li> <a href="delete_customer.php" >Supprimer Client</a></li>
    </ul>
    <ul> 
      <li><a href="change_password.php" class="active"  >Changer le mot de passe</a></li>
      <li><a href="admin_logout.php">Se Deconnecter</a></li>
    </ul>
  </div>

  <div class="column content">
    <div class="header">
      <h1>Changer le mot de passe</h1>
    </div> 
    <br>
    <div class="marwa">   
    <p>
       <form action="" method="POST">
        
         <br> <br> 
        <input type="password" name="old_password" required="" placeholder="Enter Encien Mot De Passe"/>
         <br> <br> <br>
       
        <input type="password" name="new_password" required="" placeholder="Enter Nouveau Mot De Passe"/>
         <br> <br> <br>
         
        <input type="password" name="again_password" required="" placeholder="Reecrivez Le Mot De Passe"/>
         <br> <br> <br>
        <input type="submit" name="change_password" value="Changer" class="addstaff_button"/>
      </form>
    </p>
    <p>
      <?php
            if(isset($_REQUEST['change_password'])){
            $sql="SELECT * FROM admin WHERE id='1'";
            $result=mysql_query($sql);
            $rws=  mysql_fetch_array($result);
            $old=  mysql_real_escape_string($_REQUEST['old_password']);
            $new=  mysql_real_escape_string($_REQUEST['new_password']);
            $again=  mysql_real_escape_string($_REQUEST['again_password']);
            if($rws[9]==$old && $new==$again){
                $sql1="UPDATE admin SET pwd='$new' WHERE id='1'";
                mysql_query($sql1) or die(mysql_error());
                header('location:admin_hompage.php');
            }
            else{
                
                header('location:change_password.php');
            }
            }
            ?>
    </p>
    <br><br>
  </div>
</div>
</div>
</body>
</html>
