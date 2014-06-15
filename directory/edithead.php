<? if($config_htmleditor != ""){?>
<script language="javascript" type="text/javascript" src="<?=$config_htmleditor?>/jscripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
	mode : "textareas",
	theme : "advanced",
	theme_advanced_toolbar_location : "top",
	theme_advanced_buttons1 : "fontselect,fontsizeselect,separator,bold,italic,underline,separator,justifyleft,justifycenter,justifyright,separator,bullist,numlist",
	theme_advanced_buttons2 : "forecolor,backcolor,separator,link,unlink,separator,image,hr,charmap,separator,removeformat,cleanup,code",
	theme_advanced_buttons3 : ""
});
</script>
<? }?>
<script>
// Specials
function chooseImage(url) {
uploadWin=window.open(url,"upload","resizable=0,toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,copyhistory=0,width=500,height=155,top=200,left=270");
uploadWin.focus();
if (uploadWin.opener == null) uploadWin.opener = self;
}
</script>
<link href="<?=$config_css?>" rel="stylesheet" type="text/css">