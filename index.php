<html>
	<head>
		</head>
	<body>
	<hr>
		<b>ENTER PARAMETERS TO RESIZE IMAGE
	<hr>
	<form name="form1" id="form1"method="POST" enctype="multipart/form-data">
	<div id="browse">
	Select File :<input name="uploadedfile" type="file">
	<br>
	Width:<input type="text" name="wd" id="wd">
	<br>
	Height:<input type="text" name="hd" id="hd">
	<br>
	Resize Option : <br>
	<input type="checkbox" name="resizeopt[]" value="exact">Exact 
	<input type="checkbox" name="resizeopt[]" value="portrait">portrait
	<input type="checkbox" name="resizeopt[]" value="landscape">landscape
	<input type="checkbox" name="resizeopt[]" value="auto">auto
	<input type="checkbox" name="resizeopt[]" value="crop">crop
	<br>
	<input type="submit" value="Resize" name="resize" id="resize">
	</div>
	<form>
	<hr>
<?
echo "Sandip Kapadiya"; 
if($_POST['resize'])
{
include("resize-class.php");
	$target_path = "/opt/lampp/htdocs/newproject/resize/image/";
	$target_path1 = "/opt/lampp/htdocs/newproject/resize/image/";
	$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
	$filename1= basename( $_FILES['uploadedfile']['name']);
	$extractedfilename=explode(".",$filename1);
	$ext= substr(strrchr($filename1, "."), 1);
	if(copy($_FILES['uploadedfile']['tmp_name'], $target_path)) {
	$width=$_POST['wd'];
	$height=$_POST['hd'];
	$total_option= count($_POST['resizeopt']);
	for($j=0;$j<$total_option;$j++)
	{
		$option1 = $_POST['resizeopt'][$j];
		$resizeObj = new resize($target_path);
		$resizeObj -> resizeImage($width, $height, $option1);
		$resizeObj -> saveImage($target_path1.$extractedfilename[0].'_'.$width.'*'.$height.'_resized_'.$option1.'.'.$ext, 100);
		$finalfiles.='<br><a target=_blank href=image/'.$extractedfilename[0].'_'.$width.'*'.$height.'_resized_'.$option1.'.'.$ext.'>'.$extractedfilename[0].'_'.$width.'*'.$height.'_resized-'.$option1.'.'.$ext."</a><br>";
	}
		$finalfiles1='<a target=_blank href=image/'.basename( $_FILES[uploadedfile][name]).'>'.basename( $_FILES[uploadedfile][name]).'</a>';
	}	
echo "UPLOADED FILES : <br>";
echo $finalfiles1;
echo $finalfiles;
}
?>	
	</body>
</html>