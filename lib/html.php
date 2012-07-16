<?
function head_open($title=null)
{
?>
<!DOCTYPE html>
<html>
<head>
<title><?=$title?></title>
<meta http-equiv="Content-Type" charset="UTF-8" />
<?
}
function head_close()
{
?>
</head>
<body>
<?
}
function html_close()
{
?>
</body>
</html>
<?
}
function css_tag($css_url)
{
?>
<link rel="stylesheet" type="text/css" href="<?=$css_url?>" />
<?
}
function js_tag($js_url)
{
?>
<script type="text/javascript" src="<?=$js_url?>"></script>
<?
}
function tail()
{
?>
</body>
</html>
<?
}
function input_tag($type='text', $column_name, $form=null)
{
	if(isset($form))
	{
	    $frm = 'form="' . $form . '"';
	}
	else
	{
	    $frm = null;
	}
?>
<input type="<?=$type?>" id="<?=$column_name?>" name="<?=$column_name?>" <?=$frm?>/>
<?
}
function form_tag_open($url, $method, $css=null)
{
?>
<form action="<?=$url?>" method="<?=$method?>"
<? if(isset($css)) { ?> class="<?=$css?>" > <? }
}
function form_tag_close()
{
?>
</form>
<?
}
function br_tag()
{
?>
<br />
<?
}
function label_tag($column_name, $content)
{
?>
<label for="<?=$column_name?>">
<?
	echo $content;
?>
</label>
<?
}
function table_print($row=1, $col=1, $content=array(), $css=null)
{
if(isset($css))
{
?>
<table class="<?=$css?>" >
<?
}
else
{
?>
<table>
<?
}
	for($i = 0 ; $i < $row ; $i++)
	{
	?><tr><?
		for($j = 0 ; $j < $col ; $j++)
		{
		    if(!isset($content[$i * $col + $j]))
		    {
			$content[$i * $col + $j] = ' ';
		    }
		?><td><?=$content[$i * $col + $j]?></td><?
		}
	?></tr><?
	}
?>

</table>
<?
}
?>
