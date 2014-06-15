<table border="0" cellpadding="4" cellspacing="0">
  <tr>
    <td bordercolor="#77B797" bgcolor="#77B797"><?php
  if(isset($_GET["id"])){?>
      <input type="submit" value="Save Changes" name="updatebtn" />
      <? if($diradmin){?>
      	<input type="submit" value="Duplicate" name="savebtn" />
      <? }?>
  <?php } else {?>
      <input type="submit" value="Save as New" name="savebtn" />
  <?php }; ?>
    </td>
    <?php
						  if(isset($_GET["id"]) && $diradmin === true){?>
    <td bordercolor="#999999" bgcolor="#999999"><input type="submit" value="Clear" name="clearbtn" onclick="return confirm('You will lose any changes to this item!  Are you sure you want to clear the form?');" /></td>
    <td bordercolor="#CC0000" bgcolor="#CC0000"><input type="submit" value="Delete" name="deletebtn" onclick="return confirm('Are you sure you want to permanently delete this entry?  This cannot be undone!!!');" /></td>
    <?php }; ?>
  </tr>
</table>
