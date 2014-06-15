<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script type="text/javascript" src="lib/prototype.js"></script>
<script type="text/javascript" src="src/scriptaculous.js"></script>

</head>

<body>
<ul id="list_to_sort">
    <? /*// SQL Query: SELECT * FROM table ORDER BY order_column ASC
    // foreach: <li id="item_<? row.id; ?>"><? row.name ?></li>*/?>

    <li id="item_2">Item 2</li>
    <li id="item_3">Item 3</li>
    <li id="item_1">Item 1</li>
</ul>
<script type="text/javascript" language="javascript" charset="utf-8">
Sortable.create("list_to_sort",
{
    onUpdate: function()
    {
        new Ajax.Request("file_to_call.php",
        {
            method: "post",
            parameters: { data: Sortable.serialize("list_to_sort") }
        }
        );
    }
}
);
</script>
</body>
</html>
