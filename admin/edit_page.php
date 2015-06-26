<?php
session_start();
  
         $link = @mysql_connect('localhost','root','') or die('No server');
mysql_select_db('novini1', $link) or die('No database');
mysql_query("SET CHARACTER SET utf8");
$query = "SELECT * FROM news ORDER BY date_created DESC";
 $news = mysql_query($query) or die("Select failed!");
 $newsx = mysql_fetch_array($news);
 
  while($newsx = mysql_fetch_array($news)) {
 ?>

<i><b><?php  echo $newsx['date_created']; ?></b></i>
<a href="editnews.php?id=<?php echo $newsx['id']; ?>">
    <?php  echo $newsx['title_bg']; ?></a> : <a href="deletenews.php?id=<?php echo $newsx['id']; ?>" onClick="return confirm('Сигурен ли сте, че искате да изтия новината?')">Изтрий</a></br>



  <?php } ?>
<center><b><a href="/novini/index.php">
                <?php echo "Към главната страница" ?></a><br/></center>