<? if($mrsdata["type"] == "text"){?>
<div class="ministry" style="width:400px;">
  <label>
  <?=$mrsdata["ministry"]?>
  <input name="ministry_<?=$mrsdata["id"]?>" type="text" value="<? if(isset($interestnotes[$mrsdata["id"]])){print $interestnotes[$mrsdata["id"]];}?>" size="30" />
  </label>
</div>
<? }else{?>
<div class="ministry">
  <label>
  <input name="ministry_<?=$mrsdata["id"]?>" type="checkbox" value="yes" <? if(in_array($mrsdata["id"], $interests)){print 'checked="checked" ';}?> style="float:left;"/>
    <?=$mrsdata["ministry"]?>
  </label>
</div>
<? }?>
