<?php session_start(); ?>
<html>
    <head>
        <?php  include 'css.php' ;  ?>
    </head>
    <body>
   <h1>NEWS TODAY</h1>
    
<?php 
 $link = @mysql_connect('localhost','root','') or die('No server');
 mysql_select_db('novini1', $link) or die('No database');
mysql_query("SET CHARACTER SET utf8");

if (isset($_GET["page"])) { 
    $page  = $_GET["page"]; 
    
} else {
    $page=1;   
} 
$start_from = ($page-1) * 5; 
$sql = "SELECT * FROM news ORDER BY date_created DESC LIMIT $start_from, 5"; 
$rs_result = mysql_query($sql, $link); 
?> 
    <body>

        <div class="ezik"><div class="text">Language</div>
        <a href="index.php">BG</a>
        <a href="index_en.php">EN</a>
        <a href="index_de.php">DE</a>
      </div>
<?php 
while ($row = mysql_fetch_assoc($rs_result)) { 
?> 
       <div class="novinki">
           
           <div class="datata"><?php echo $row['date_created']; ?></div>
           <div class="zaglavie"><?php echo $row['title_en']; ?></div>
           <div class="opisanie"><?php echo $row['description_en']; ?></div>
<div class="sudurjanie"><a href="/novini/news_en.php?id=<?php echo $row['id']; ?>"></div>
                <?php echo "read more.." ?></a><br/> </div>
</div>
          
<?php 
} 
?> 

<?php
$sql = "SELECT COUNT(title_bg) FROM news"; 
$rs_result = mysql_query($sql,$link); 
$row = mysql_fetch_row($rs_result); 
$total_records = $row[0];

$total_pages = ceil($total_records / 5);

for ($i=1; $i<=$total_pages; $i++) { 
   ?> <div class="stranici"><?php echo  "<a href='index_en.php?page=".$i."'>".$i."</a>"; ?></div> 
    <?php
}
?>
 
    <?php 
     if(isset($_SESSION['error'])) {
			echo $_SESSION['error'];
			unset($_SESSION['error']);
		}
                ?>
<div class="admin">
<form method="POST" action="admin/action.php?login=1">
    Admin:<input type="text" name="username" />
    Pass:<input type="password" name="password" />
  			<input type="submit" value="login" />                   
</form>
</div>
    </body>
    
 </html>
 