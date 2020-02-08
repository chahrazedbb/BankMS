<?php 
session_start();
        
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
        <li><a href="addcustomer.php"  class="active" >Ajouter Client</a></li>
        <li> <a href="display_customer.php">Modifier Client</a></li>
        <li> <a href="delete_customer.php">Supprimer Client</a></li>
    </ul>
    <ul> 
      <li><a href="change_password.php">Changer le mot de passe</a></li>
      <li><a href="admin_logout.php">Se Deconnecter</a></li>
    </ul>
  </div>

  <div class="column content">
    <div class="header">
      <h1>Ajouter Client</h1>
    </div> 
    <br>
    <div class="marwa">   
    <p>
      <form action="add_customer.php" method="POST">
        <br><br><br>
        Nom du Client
        <br><br>
        <input type="text" name="customer_name" required=""/>
         <br><br> <br>
        Genre
        <br><br>
        M<input type="radio" name="customer_gender" value="H" checked/>
        F<input type="radio" name="customer_gender" value="F" />
        <br><br><br>
        DOB
        <br><br>
        <input type="date" name="customer_dob" required=""/>
        <br><br><br>
        Candidat
        <br><br>
        <input type="text" name="customer_nominee" required=""/>
        <br><br><br>
        Branche
        <br><br>
        <select name="branch">
          <option>KOLKATA</option>
          <option>DELHI</option>
          <option>BANGALORE</option>
        </select>
        <br><br><br>
        Type Du Compte
        <br><br>
        <select name="customer_account">
            <option>économies</option>
            <option>actuel</option>
        </select>
        <br><br><br>
       Montant minimal
       <br><br>
       <input type="text" name="initial" value="1000" min="1000" required=""/>
       <br><br><br>
       Address
       <br><br>
       <textarea name="customer_address" required=""></textarea>
       <br><br><br><br>
       Mobile
       <br><br>
       <input type="text" name="customer_mobile" required=""/>
       <br><br><br>
       Email
       <br><br>
       <input type="email" name="customer_email" required=""/>
       <br><br><br>
       Mot De Passe
       <br><br>
       <input type="password" name="customer_pwd" required=""/>
       <br><br><br>
       <input type="submit" name="add_customer" value="Ajouter">
        </form>
    </p>
    <br><br>
  </div>
  </div>
</div>
</body>
</html>
