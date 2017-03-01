<?php

jClasses::inc("common~CCommonTools");

function jtpl_modifier_html_ufirst($string = "")
{
   return CCommonTools::mb_ucfirst($string);
}
