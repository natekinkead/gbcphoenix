To repurpose this Admin Tool,...

1. Copy database table use by the existing Admin Tool which you are repurposing.
*** You must have the Standard Field Names specified in the "config.php" file (id, title, seq).

2. Edit the "config.php" file with all of your custom settings.  Instructions are provided there.

3. Customize your form in "edit.php".  Form element samples are provided in "samples.php".
*** You must ensure that your form input "name" attributes match your Custom Database Field Names specified in the "config.php" file.
** Also, use stripslashes() when printing database variables into the form input... like this...
value="<?=stripslashes($title)?>"

----------------------
Nathan Kinkead
nathan@symbolicinteractive.com