<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php');   
?>
<?php
include '_inc/dbconn.php';
$id=  mysql_real_escape_string($_REQUEST['customer_id']);
$sql="SELECT * FROM `customer` WHERE id=$id";
$result=  mysql_query($sql) or die(mysql_error());
$rws=  mysql_fetch_array($result);
?>
<?php
                        $delete_id=  mysql_real_escape_string($_REQUEST['customer_id']);
                        if(isset($_REQUEST['submit2_id'])){
                            $sql_delete="DELETE FROM `customer` WHERE `id` = '$delete_id'";
                            $sql_drop="DROP TABLE passbook".$delete_id;
                            mysql_query($sql_delete) or die(mysql_error());
                            mysql_query($sql_drop) or die(mysql_error());
                            header('location:delete_customer.php');
                        }
                        ?>
                        <?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php');   
?>
<!DOCTYPE html>
<?php
include '_inc/dbconn.php';
$sql="SELECT * FROM `customer`";
$result=  mysql_query($sql) or die(mysql_error());
$sql_min="SELECT MIN(id) from customer";
$result_min=  mysql_query($sql_min);
$rws_min=  mysql_fetch_array($result_min);
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
        left: 350px;
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
        left: 350px;
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
        left: 350px;
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
   <li><a href="admin_hompage.php">Acueil Admin </a></li>
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
        <li> <a href="delete_customer.php" class="active" >Supprimer Client</a></li>
    </ul>
    <ul> 
      <li><a href="change_password.php"  >Changer le mot de passe</a></li>
      <li><a href="admin_logout.php">Se Deconnecter</a></li>
    </ul>
  </div>

  <div class="column content">
    <div class="header">
      <h1> Les Detailles Du Client</h1>
    </div>
    <br>
    <div class="marwa">    
    <p>
        <form action="alter_customer.php" method="POST">
            <input type="hidden" name="current_id" value="<?php echo $id;?>"/>
            <br><br><br>
            Nom Du Client
            <br><br>
            <input type="text" name="edit_name" value="<?php echo $rws[1];?>" required=""/>
            <br><br><br>
            Genre
            <br><br>
            M<input type="radio" name="edit_gender" value="M" <?php if($rws[2]=="M") echo "checked";?>/>
            F<input type="radio" name="edit_gender" value="F" <?php if($rws[2]=="F") echo "checked";?>/>
            <br><br><br>
            DOB
            <br><br>
            <input type="date" name="edit_dob" value="<?php echo $rws[3];?>"/>
            <br><br><br>
            Condidat
            <br><br>
            <input type="text" name="edit_nominee" value="<?php echo $rws[4];?>" required=""/>
            <br><br><br>
            Type Du Compte
            <br><br>
            <select name="edit_account">
                <option <?php if($rws[5]=="savings") echo "selected";?>>Economies</option>
                <option <?php if($rws[5]=="current") echo "selected";?>>actuel</option>
            </select>
            <br><br><br>
            Addresse
            <br><br>
            <textarea name="edit_address"><?php echo $rws[6];?></textarea>
            <br><br><br>
            mobile
            <br><br>
            <input type="text" name="edit_mobile" value="<?php echo $rws[7];?>" required=""/>
            <br><br><br>
            email
            <br><br>
            <input type="text" name="edit_email" value="<?php echo $rws[8];?>" required=""/>
            <br><br><br>
            <input type="submit" name="alter_customer" value="UPDATE DATA" >
        </form>
    </p>
    <br><br>
  </div>
</div>
</div>
</body>
</html>
