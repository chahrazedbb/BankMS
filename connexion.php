<?php 
  if(isset($_REQUEST['submitBtn'])){
      include '_inc/dbconn.php';
      $username=$_REQUEST['uname'];
      
      //salting of password
      $salt="@g26jQsG&nh*&#8v";
      $password= sha1($_REQUEST['pwd'].$salt);
    
      $sql="SELECT email,password FROM customer WHERE email='$username' AND password='$password'";
      $result=mysql_query($sql) or die(mysql_error());
      $rws=  mysql_fetch_array($result);
      
      $user=$rws[0];
      $pwd=$rws[1];    
      
      if($user==$username && $pwd==$password){
          session_start();
          $_SESSION['customer_login']=1;
          $_SESSION['cust_id']=$username;
      header('location:customer_account_summary.php'); 
      }
     
  else{
      header('location:MaBanque.php');  
  }}
?>
<?php 
  session_start();
          
  if(isset($_SESSION['customer_login'])) 
      header('location:customer_account_summary.php');   
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
  <li><a href="contacter.php" >Contacter Nous</a></li>
  <li><a href="apropos.php">A propos</a></li>
</ul>

<div class="clearfix">
  <div class="column sidemenu">
    <ul>
      <li><a href="MaBanque.php" class="active">Ma Banque</a></li>
      <li><a href="connexion.php">Connexion</a></li>
    </ul>
  </div>

  <div class="column content">
    <div class="header">
      <h1>Projet Fin D'étude</h1>
    </div>
    <br>
    <div class="marwa"> 
    <h1>Connexion</h1>
    <p>
      <form action='' method='POST'>
            <input type="email" name="uname" required placeholder="Email">
            <br/><br/><br/>
            <input type="password" name="pwd" required placeholder="Mot De Passe">
            <br/><br/><br/>
           <input type="submit" name="submitBtn" value="SE CONNECTER" class="button">
      </form>
      <br><br>
    </p>
  </div>
</div>

</div>
</body>
</html>
