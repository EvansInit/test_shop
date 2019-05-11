
<?php
if(isset($_POST['speed']))
{
    header('Content-type: image/gif');
    if(isset($_POST['download'])){
    header('Content-Disposition: attachment; filename="animated.gif"');
    }
    include('GIFEncoder.class.php');
    function frame($image){
        ob_start();
        imagegif($image);
        global $frames, $framed;
        $frames[]=ob_get_contents();
        $framed[]=$_POST['speed'];
        ob_end_clean();
    }
    foreach ($_FILES["images"]["error"] as $key => $error)
    {
        if ($error == UPLOAD_ERR_OK)
        {
            $tmp_name = $_FILES["images"]["tmp_name"][$key];
            $im = imagecreatefromstring(file_get_contents($tmp_name));
            $resized = imagecreatetruecolor($_POST['width'],$_POST['height']);
            imagecopyresized($resized, $im, 0, 0, 0, 0, $_POST['width'], $_POST['height'], imagesx($im), imagesy($im));
            frame($resized);
        }
    }
    $gif = new GIFEncoder($frames,$framed,0,2,0,0,0,'bin');
    echo $gif->GetAnimation();
}
?>
<form action="" method="post" enctype="multipart/form-data">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="jquery.MultiFile.js"></script>
<script src="jquery.placeholder.js"></script>
<input type="file" name="images[]" class="multi" />
<script>
    $(function(){
        $('input[placeholder], textarea[placeholder]').placeholder();
   });
</script>
   <SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      //-->
   </SCRIPT>
<input name="speed" maxlength="10" type="text" placeholder="Speed of frames in ms" onkeypress="return isNumberKey(event)">
<input name="width" maxlength="4" type="text" placeholder="Width" onkeypress="return isNumberKey(event)">
<input name="height" maxlength="4" type="text" placeholder="Height" onkeypress="return isNumberKey(event)">
<input type="submit" name="download" value="Download!">
<input type="submit" name="preview" value="Preview!">
</form>