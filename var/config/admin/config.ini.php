;<?php die(''); ?>
;for security reasons , don't remove or modify the first line

startModule=dashboard
startAction="dashboard:index"

[responses]
html=adminHtmlResponse
htmlauth=adminLoginHtmlResponse
htmlforgotpassword=adminForgotPasswordHtmlResponse
[modules]
jacl.access=0
jacldb.access=0
junittests.access=0
jsoap.access=0
jauth.access=2
master_admin.access=2
jauthdb.installparam=defaultuser
jauthdb_admin.access=2
jacl2.access=2
jacl2db.access=2
jacl2db.installparam=defaultuser
jacl2db_admin.access=2
jpref.access=2
jpref_admin.access=2
user.access=2
acl2db.access=2
authdb.access=2
common.access=2
dashboard.access=2
profile.access=2
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
[simple_urlengine_entrypoints]
admin="jacl2db~*@classic, jauth~*@classic, jacl2db_admin~*@classic, jauthdb_admin~*@classic, master_admin~*@classic, jpref_admin~*@classic, user~*@classic, acl2db~*@classic, authdb~*@classic, dashboard~*@classic, profile~*@classic, right~*@classic, slideshow~*@classic, categorie~*@classic, homepage~*@classic, entreprise~*@classic, catalogue~*@classic, toprecherche~*@classic, pages~*@classic, ads~*@classic, abonnement~*@classic, setting~*@classic"

[coordplugins]
auth="admin/auth.coord.ini.php"

jacl2=1
[coordplugin_jacl2]
on_error=2
error_message="right~errors.action.right.needed"
on_error_action="right~error:badright"
























