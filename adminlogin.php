<?php 
  session_start();
  if(isset($_SESSION['admin_login'])) 
      header('location:admin_homepage.php');   
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
  </style>
</head>
<body>

<ul class="topmenu">
  <li><a href="MaBanque.php" class="active"  >Aceuil</a></li>
  <li><a href="contacter.php">Contacter Nous</a></li>
  <li><a href="apropos.php">A propos</a></li>
</ul>

<div class="clearfix">
  <div class="column sidemenu">
    <ul>
      <li><a href="adminlogin.php" class="active" >Connexion</a></li>
    </ul>
  </div>

  <div class="column content">
    <div class="header">
      <h1>Connexion Admin</h1>
    </div>
    <br>
    <div class="marwa"> 
    <p>
      <form action='' method='POST'>
            <input type="text" name="uname" required placeholder="Nom D'utilisateur">
            <br/><br/><br/>
            <input type="password" name="pwd" required placeholder="Mot De Passe">
            <br/><br/><br/>
           <input type="submit" name="submitBtn" value="SE CONNECTER" class="button">
      </form>
      <?php 
        include '_inc/dbconn.php';
        if(!isset($_SESSION['admin_login'])){
        if(isset($_REQUEST['submitBtn'])){
            $sql="SELECT * FROM admin WHERE id='1'";
            $result=mysql_query($sql);
            $rws=  mysql_fetch_array($result);
            $username=  mysql_real_escape_string($_REQUEST['uname']);
            $password=  mysql_real_escape_string($_REQUEST['pwd']);
            if($username==$rws[8] && $password==$rws[9]) {
                
                $_SESSION['admin_login']=1;
            header('location:admin_hompage.php'); }
            else
                header('location:adminlogin.php');      
        }
        }
        else {
            header('location:admin_hompage.php');
        }
      ?>
    </p>
    <br><br>
  </div>
  </div>

</div>
</body>
</html>
