<? if($mrsdata["type"] == "text"){?>
<div class="ministry" style="width:400px;">
  <label>
  <?=$mrsdata["ministry"]?>: 
  <span <? if(in_array($mrsdata["id"], $interests)){print 'style="background-color:#FFFF99;"';}?>>
    <? if(isset($interestnotes[$mrsdata["id"]])){print $interestnotes[$mrsdata["id"]];}?>
</span>
  </label>
</div>
<? }else{?>
<div class="ministry" <? if(in_array($mrsdata["id"], $interests)){print 'style="background-color:#FFFF99;"';}?>>
    <?=$mrsdata["ministry"]?>
</div>
<? }?>
