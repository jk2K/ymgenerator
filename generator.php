<?php
if(!empty($_GET))
{
	$text = $_GET['text'];

	$image = imagecreatefromjpeg('ym.jpg');
	$color = imagecolorallocate($image, 0, 0, 0);
	imagefttext($image, 50, 0, 40, 400, $color, 'SourceHanSansCN-Normal.otf', $text);
	header('Content-type: image/jpeg');
	imagejpeg($image);
	imagedestroy($image);
}
else
{
	$html = <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<title>暴走姚明生成器</title>
<style>
#show {
	width: 500px;
	display: block;
}
</style>
<script src="jquery-2.1.1.min.js"></script>
<script>
$(function() {
$('#generate').click(function() {
	var text = $('#text1').val();
	$('#show').attr('src', 'generator.php?text=' + text);
});
});
</script>
	</head>
	<body>
	<span>请输入文字: </span>
	<input type="text" id="text1" value="">
	<button type="button" id="generate">生成图片!</button>
	<img src="generator.php?text=萌萌站起来" id="show">
	</body>
</html>
EOT;
	echo $html;
}
?>
