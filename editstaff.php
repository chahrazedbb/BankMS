<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php');   
?>
<!DOCTYPE html>
<?php
include '_inc/dbconn.php';
$id=  mysql_real_escape_string($_REQUEST['staff_id']);
$sql="SELECT * FROM `staff` WHERE id=$id";
$result=  mysql_query($sql) or die(mysql_error());
$rws=  mysql_fetch_array($result);
?>
<?php
                        $delete_id=  mysql_real_escape_string($_REQUEST['staff_id']);
                        if(isset($_REQUEST['submit2_id'])){
                            $sql_delete="DELETE FROM `staff` WHERE `id` = '$delete_id'";
                            mysql_query($sql_delete) or die(mysql_error());
                            header('location:delete_staff.php');
                        }
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
      <li><a href="display_staff.php" class="active">Modifier le membre agent</a></li>
      <li> <a href="delete_staff.php">Supprimer l agent</a></li>
    </ul>
    <ul>
        <li>Client</li>
        <li><a href="addcustomer.php">Ajouter Client</a></li>
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
      <h1>Modifier Les Detailes D'Agent</h1>
    </div> 
    <br>
    <div class="marwa">   
    <p>
      <form action="alter_staff.php" method="POST">
        <input type="hidden" name="current_id" value="<?php echo $id;?>"/>
        <br><br><br>
        Nom Agent
        <br>
        <input type="text" name="edit_name" value="<?php echo $rws[1];?>" required=""/>
        <br><br><br>
        Genre
        <br>
        M<input type="radio" name="edit_gender" value="M" <?php if($rws[10]=="M") echo "checked"; ?> />
        F<input type="radio" name="edit_gender" value="F" <?php if($rws[10]=="F") echo "checked"; ?> />
        <br><br>
        DOB
        <br>
        <input type="date" name="edit_dob" value="<?php echo $rws[2];?>"/>
        <br><br><br>
        Situation Familiale
        <br>
        <select name="edit_status">
            <option <?php if($rws[3]=="unmarried") echo "selected"; ?> >célébataire</option>
            <option <?php if($rws[3]=="married") echo "selected"; ?> >marrié</option>
            <option <?php if($rws[3]=="divorced") echo "selected"; ?> >divorcé</option>
        </select>
        <br><br><br>
        Department
        <br>
          <select name="edit_dept">
            <option <?php if($rws[4]=="revenue") echo "selected";?>>revenue</option>
            <option <?php if($rws[4]=="developer") echo "selected";?>>developpeur</option>
          </select>
          <br><br><br>
          DOJ
          <br>
          <input type="date" name="edit_doj" value="<?php echo $rws[5];?>"/>
          <br><br><br>
          Addresse
          <br>
          <textarea name="edit_address"><?php echo $rws[6];?></textarea>
          <br><br><br>
          Mobile
          <br>
          <input type="text" name="edit_mobile" value="<?php echo $rws[7];?>" required=""/>
          <br><br><br>
          Email
          <br>
          <input type="text" name="edit_mobile" value="<?php echo $rws[8];?>" required=""/>
          <br><br><br>
          <input type="submit" name="alter" value="Métre à Jours" >
        </form>
    </p>
    <br><br>
  </div>
</div>
</div>
</body>
</html>
