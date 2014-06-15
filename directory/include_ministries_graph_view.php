<? //displays records
	$msql="select * from dir_ministries where category = '".$category."' order by ministry";
	$mrs=mysql_query($msql, $conn);
	while ($mrsdata = mysql_fetch_assoc($mrs)){
	if($mrsdata["type"] != "text"){?>
	<div class="ministry">
	  <div><a id="opener_<?=$mrsdata["id"]?>" href="#" onclick="$$('div.<?=$mrsdata["id"]?>').each( function(e) { e.visualEffect('slide_down',{duration:.75}) }); changeState(<?=$mrsdata["id"]?>, 'close'); return false;"><?=$mrsdata["ministry"]?></a>
<a id="closer_<?=$mrsdata["id"]?>" href="#" onclick="$$('div.<?=$mrsdata["id"]?>').each( function(e) { e.visualEffect('slide_up',{duration:2}) }); changeState(<?=$mrsdata["id"]?>, 'open'); return false;" style="display:none;"><?=$mrsdata["ministry"]?></a></div>
	</div>
	  <?
	$countsql="select count(id) as numb from dir_interests where ministryid = ".$mrsdata["id"];
	$countrs=mysql_query($countsql, $conn);
	$countrsdata = mysql_fetch_assoc($countrs);?>
	<div style="float:left;">
	<div class="ministrystat" style="width:<? print round($countrsdata["numb"] / $totalpeople * 1000 )?>px;">
	&nbsp;<b><?=$countrsdata["numb"]?></b></div>&nbsp; 

	<br clear="all" />
	<div class="<?=$mrsdata["id"]?> all" style="display:none; padding-left:20px;"><div style="overflow:hidden">
<?
$psql="select *, p.id as pid from dir_people as p, dir_interests as i, dir_households as h where p.household = h.id and p.id = i.personid and i.ministryid = ".$mrsdata["id"]." order by h.lastname, p.firstname";
$prs=mysql_query($psql, $conn);
while ($prsdata = mysql_fetch_assoc($prs)){?>
	&raquo;&nbsp; <a href="view_people.php?id=<?=$prsdata["pid"]?>" target="_blank"><?=$prsdata["firstname"]?> <?=$prsdata["lastname"]?></a><br>
<? }
?>
</div></div>
</div>
	<br clear="all" />
<? }
}?>