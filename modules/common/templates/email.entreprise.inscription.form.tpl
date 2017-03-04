<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>PAGESJAUNES</title>
        <style>
        </style>
    </head>
    <body>
        <table cellpadding="0" cellspacing="0" width="100%">
            <tbody>
                <tr>
                    <td align="center" valign="top">
                        <table width="600" border="0" cellpadding="0" cellspacing="0" bgcolor="#DAE9C8">
                            <tr>
                                <td align="left" valign="top"
                                bgcolor="#ffffff" style="font-family:arial;color:#000000;padding:0px 10px 10px 10px;">
                                    Bonjour,<br/>
                                    <p>Une nouvelle demande d'inscription sur Pagesjaunes.mg "{$raisonsociale}" a été enregistrée</p>
                                </td>
                            </tr>
                        </table>
                        <table width="600" border="0" cellpadding="0" cellspacing="0" bgcolor="#DAE9C8">
                            <tr>
                                <td width="40%" align="right" valign="top"
                                bgcolor="#ffffff" style="font-family:arial;color:#000000;padding:0px 10px 10px 10px;">
                                    <strong>Raison sociale</strong> :
                                </td>
                                <td width="60%" align="left" valign="top"
                                bgcolor="#ffffff" style="font-family:arial;color:#000000;padding:0px 10px 10px 0px;">
                                    {$raisonsociale}
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" align="right" valign="top"
                                bgcolor="#ffffff" style="font-family:arial;color:#000000;padding:0px 10px 10px 10px;">
                                    <strong>Activité</strong> :
                                </td>
                                <td width="60%" align="left" valign="top"
                                bgcolor="#ffffff" style="font-family:arial;color:#000000;padding:0px 10px 10px 0px;">
                                    {$activite}
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" align="right" valign="top"
                                bgcolor="#ffffff" style="font-family:arial;color:#000000;padding:0px 10px 10px 10px;">
                                    <strong>Adresse</strong> :
                                </td>
                                <td width="60%" align="left" valign="top"
                                bgcolor="#ffffff" style="font-family:arial;color:#000000;padding:0px 10px 10px 0px;">
                                    {$adresse}
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" align="right" valign="top"
                                bgcolor="#ffffff" style="font-family:arial;color:#000000;padding:0px 10px 10px 10px;">
                                    <strong>Téléphone(s)</strong> :
                                </td>
                                <td width="60%" align="left" valign="top"
                                bgcolor="#ffffff" style="font-family:arial;color:#000000;padding:0px 10px 10px 0px;">
                                    {$numeroTelephone}
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" align="right" valign="top"
                                bgcolor="#ffffff" style="font-family:arial;color:#000000;padding:0px 10px 10px 10px;">
                                    <strong>Email</strong> :
                                </td>
                                <td width="60%" align="left" valign="top"
                                bgcolor="#ffffff" style="font-family:arial;color:#000000;padding:0px 10px 10px 0px;">
                                    {$email}
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" align="right" valign="top"
                                bgcolor="#ffffff" style="font-family:arial;color:#000000;padding:0px 10px 10px 10px;">
                                    <strong>Website</strong> :
                                </td>
                                <td width="60%" align="left" valign="top"
                                bgcolor="#ffffff" style="font-family:arial;color:#000000;padding:0px 10px 10px 0px;">
                                    {$website}
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" align="right" valign="top"
                                bgcolor="#ffffff" style="font-family:arial;color:#000000;padding:0px 10px 10px 10px;">
                                    <strong>Service(s)</strong> :
                                </td>
                                <td width="60%" align="left" valign="top"
                                bgcolor="#ffffff" style="font-family:arial;color:#000000;padding:0px 10px 10px 0px;">
                                    {$service}
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" align="right" valign="top"
                                bgcolor="#ffffff" style="font-family:arial;color:#000000;padding:0px 10px 10px 10px;">
                                    <strong>Produit(s)</strong> :
                                </td>
                                <td width="60%" align="left" valign="top"
                                bgcolor="#ffffff" style="font-family:arial;color:#000000;padding:0px 10px 10px 0px;">
                                    {$product}
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" align="right" valign="top"
                                bgcolor="#ffffff" style="font-family:arial;color:#000000;padding:0px 10px 10px 10px;">
                                    <strong>Marque(s)</strong> :
                                </td>
                                <td width="60%" align="left" valign="top"
                                bgcolor="#ffffff" style="font-family:arial;color:#000000;padding:0px 10px 10px 0px;">
                                    {$marque}
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" align="right" valign="top"
                                bgcolor="#ffffff" style="font-family:arial;color:#000000;padding:0px 10px 10px 10px;">
                                    <strong>Logo</strong> :
                                </td>
                                <td width="60%" align="left" valign="top"
                                bgcolor="#ffffff" style="font-family:arial;color:#000000;padding:0px 10px 10px 0px;border:1px solid #CCCCCC;">
                                    {if !empty($logo)}
                                        <img src="{$logo}" />
                                    {else}
                                        Aucun logo n'est défini
                                    {/if}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>