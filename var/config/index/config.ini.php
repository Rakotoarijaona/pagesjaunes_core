;<?php die(''); ?>
;for security reasons , don't remove or modify the first line

startModule=front_office
startAction="default:index"

[responses]
[modules]
front_office.access=2

jacl2.access=2
jacl2db.access=2
user.access=2
acl2.access=2
jauthdb.access=2
acl2db.access=2
authdb.access=2
common.access=2
dashboard.access=2
profile.access=2
jacl2db_admin.access=2
right.access=2
slideshow.access=2
categorie.access=2
homepage.access=2
entreprise.access=2
front_office.access=2
catalogue.access=2
toprecherche.access=2
pages.access=2
search.access=2
ads.access=2
abonnement.access=2
setting.access=2
[coordplugins]
auth="index/auth.coord.ini.php"
jacl2=1
[coordplugin_jacl2]
on_error=2
error_message="jacl2~errors.action.right.needed"
on_error_action="jelix~error:badright"

[acl2]
driver=db






















