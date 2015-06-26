<?php 
session_start();
?>
<!doctype html>
    <head>
<script type="text/javascript" src="\novini\tinymce\jscripts\tiny_mce\tiny_mce.js"></script>
<script type="text/javascript">
tinymce.init({
    mode : "textareas",
        theme : "advanced",
        plugins : "emotions,spellchecker,advhr,insertdatetime,preview", 
                
        // Theme options - button# indicated the row# only
        theme_advanced_buttons1 : "newdocument,|,bold,italic,underline,|,justifyleft,justifycenter,justifyright,fontselect,fontsizeselect,formatselect",
        theme_advanced_buttons2 : "cut,copy,paste,|,bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,anchor,image,|,code,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "insertdate,inserttime,|,spellchecker,advhr,,removeformat,|,sub,sup,|,charmap,emotions",      
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true 
});
</script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.js"></script>
       <script type="text/javascript" src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
       <link rel="stylesheet" type="text/css"
        href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
       <script type="text/javascript">
               $(document).ready(function(){
                     $("#date").datepicker({
                     dateFormat: 'yy-mm-dd'
                 });
               });
       </script>

    </head>
   
<?php
$id = isset($_REQUEST['id']) ? $id = $_REQUEST['id'] : '';
$link = @mysql_connect('localhost','root','') or die('No server');
mysql_select_db('novini1', $link) or die('No database');
mysql_query("SET CHARACTER SET utf8");
$query = "SELECT * FROM news WHERE id = \"$id\"";
$news = mysql_query($query) or die("Select failed");
$newsx=mysql_fetch_array($news);


 ?>
    <body>
        
        <form method="POST" action="editdone.php">
            <table>
<tr><td>Заглавие:</td><td>
     <input type="text" name="title_bg" value="<?php echo $newsx['title_bg']; ?>"></td></tr>
 <tr><td>Oписание:</td>
     <td><input type="text" name="description_bg" value="<?php echo $newsx['description_bg']; ?>"></td></tr>
 <tr><td>Съдържание:</td>
     <td><textarea name="content_bg" class="tinymce" rows="5" cols="50"><?php echo $newsx['content_bg']; ?>></textarea>
     </td>
</tr>
</table>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
          
<center><input type="submit" value="редактирай"></center>
</form>
        
            <form method="POST" action="addnews.php"> 
                
                Дата: <input type="text" name="date_created" id="date">  
              
        
            <table>
                
          <tr><td> Заглавие: </td><td>  <input type="text" name="title_bg"></td></tr>
          <tr><td> Описание: </td><td> <input type="text" name="description_bg"></input></td></tr>
         <tr><td> Източник:</td><td>  <input type="text" name="source"></td></tr>
        <tr><td>  Съдържание: </td><td>  <textarea name="content_bg" class="tinymce" rows="5" cols="50"></textarea></td></tr>
        <center><input type ="submit" value="Добави"></center>
            </table>
          
        </form>
         </body>
  </html>