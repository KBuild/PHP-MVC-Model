<?
function head_open($title=null)
{
$char = ini_get('default_charset');
echo $html=<<<HTML
<!DOCTYPE html>
<html>
<head>
<title>$title</title>
<meta charset="$char" />\n
HTML;
}
function head_close()
{
echo $html=<<<HTML
</head>
<body>\n
HTML;
}
function html_close()
{
echo $html=<<<HTML
</body>
</html>
HTML;
}
function css_tag($css_url)
{
echo $html=<<<HTML
<link rel="stylesheet" type="text/css" href="$css_url" />\n
HTML;
}
function js_tag($js_url)
{
echo $html=<<<HTML
<script type="text/javascript" src="$js_url"></script>\n
HTML;
}
function tail()
{
echo $html=<<<HTML
</body>
</html>\n
HTML;
}
function input_tag($column_name, $type='text', $option=null)
{
echo $html=<<<HTML
<input type="$type" id="$column_name" name="$column_name"
HTML;
echo tag_option($option) . " />\n";
}
function submit_tag($text=null, $option=null)
{
echo $html=<<<HTML
<input type="submit" value="$text"
HTML;
echo tag_option($option) . " />\n";
}
function form_tag_open($url, $type, $option=null)
{
echo $html=<<<HTML
<form action="$url" method="$type"
HTML;
echo tag_option($option) . ">\n";
}
function form_tag_close()
{
echo $html=<<<HTML
</form>\n
HTML;
}
function label_tag($column_name, $content=null, $option=null)
{
if($content == NULL)
{
	$content = ucfirst($column_name) . ' : ';
}
echo $html=<<<HTML
<label for="$column_name"
HTML;
	echo tag_option($option) . ">$content";
echo $html=<<<HTML
</label>\n
HTML;
}
function table_print($row=1, $col=1, $content=array(), $option=null)
{
echo '<table' . tag_option($option) . '>';
	for($i = 0 ; $i < $row ; $i++)
	{
	echo '<tr>';
		for($j = 0 ; $j < $col ; $j++)
		{
		    if(!isset($content[$i * $col + $j]))
		    {
			$content[$i * $col + $j] = ' ';
		    }
		echo '<td>' . $content[$i * $col + $j] . '</td>';
		}
	echo '</tr>';
	}

echo $html=<<<HTML
</table>\n
HTML;
}

function tag_option($option=null)
{
	if($option == null) return null;
	$string = ' ';
	foreach($option as $key => $val)
	{
	$string .= $key . '="'.$val.'" ';
	}
	return $string;
}
?>
