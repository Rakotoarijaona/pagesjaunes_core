;<?php die(''); ?>
;for security reasons , don't remove or modify the first line
; this is configuration specific to the local server, to this specific instance.
; it overrides mainconfig.ini.php parameters

[jResponseHtml]
; list of active plugins for jResponseHtml
; remove the debugbar plugin on production server, and in this case don't forget
; to remove the memory logger from the logger section
plugins=
[coordplugin_auth]
persistant_crypt_key=TBCDW4er713irEk9UCTnDu0U8uljAu
