<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<form action="<?php echo base_url('welcome/upload')?>" method="post" enctype="multipart/form-data" >
<fieldset>
<input  id="image" name="image" type="file" ></br></br>
<input  id="image_list" name="image_list[]" multiple="multiple" type="file" ></br></br>
<input type="submit" name="submit" value="upload"  />
</fieldset>
</form>

<?php echo "<pre>";
echo $image_list;
echo "</pre>";
?>
</body>
</html>
