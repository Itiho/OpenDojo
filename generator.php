<?php




$database = new Database();







if($_REQUEST["f"]=="")
{
?>

<font face="Arial" size="3"><b>
PHP MYSQL Class Generator
</b>
</font>

<font face="Arial" size="2"><b>

<form action="generator.php" method="POST" name="FORMGEN">

1) Select Table Name: 
<br>

<select name="tablename">

<?php
$database->OpenLink();
$tablelist = mysql_list_tables($database->database, $database->link);
while ($row = mysql_fetch_row($tablelist)) {
print "<option value=\"$row[0]\">$row[0]</option>";
}
?>
</select>

<p>
2) Type Class Name (ex. "test"): <br>
<input type="text" name="classname" size="50" value="">
<p>
3) Type Name of Key Field:
<br>
<input type="text" name="keyname" value="" size="50">
<br>
<font size=1>
(Name of key-field with type number with autoincrement!)
</font>
<p>


<input type="submit" name="s1" value="Generate Class">
<input type="hidden" name="f" value="formshowed">

</form>

</b>
</font>
<p>
<font size="1" face="Arial">
<a href="http://www.voegeli.li" target="_blank">
this is a script from www.voegeli.li
</a>
</font>


<?php
} else {

// fill parameters from form
$table = $_REQUEST["tablename"];
$class = $_REQUEST["classname"];
$key = $_REQUEST["keyname"];

$dir = dirname(__FILE__);

$filename = $dir . "/generated_classes/" . $class . ".php";

// if file exists, then delete it
if(file_exists($filename))
{
unlink($filename);
}

// open file in insert mode
$file = fopen($filename, "w+");
$filedate = date("d.m.Y");

$c = "";

$c = "
<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        $class
* FOR MYSQL TABLE:  $table
* FOR MYSQL DB:     $database->database
* -------------------------------------------------------
*/

class $class extends MY_Model
{ 



var $$key;   // Chave com autoincremento
";

$sql = "SHOW COLUMNS FROM $table;";
$database->query($sql);
$result = $database->result;


while ($row = mysql_fetch_row($result)) 
{
$col=$row[0];

if($col!=$key)
{

$c.= "
var $$col;   // (normal Attribute)";


} // endif
//"print "$col";
} // endwhile

$cdb = "$" . "database";
$cdb2 = "database";
$c.="

//Insira aqui no mome da tabela
var $_table = '';

";

$c.="
// **********************
// GETTER METHODS
// **********************

";
// GETTER
$database->query($sql);
$result = $database->result;
while ($row = mysql_fetch_row($result)) 
{
$col=$row[0];
$mname = "get_" . $col . "()";
$mthis = "$" . "this->" . $col;
$c.="
function $mname
{
    return $mthis;
}
";
}


$c.="
// **********************
// SETTER METHODS
// **********************

";
// SETTER
$database->query($sql);
$result = $database->result;
while ($row = mysql_fetch_row($result)) 
{
$col=$row[0];
$val = "$" . "val";
$mname = "set_" . $col . "($" . "val)";
$mthis = "$" . "this->" . $col . " = ";
$c.="
function $mname
{
    $mthis $val;
}
";
}



$c.= "

} 

?>

";
fwrite($file, $c);

print "
<font face=\"Arial\" size=\"3\"><b>
PHP MYSQL Class Generator
</b>
<p>
<font face=\"Arial\" size=\"2\"><b>
Class '$class' successfully generated as file '$filename'!
<p>
<a href=\"javascript:history.back();\">
back
</a>

</b></font>

";


?>
<p>
<font size="1" face="Arial">
<a href="http://www.voegeli.li" target="_blank">
this is a script from www.voegeli.li
</a>
</font>





<?php
} // endif
?>