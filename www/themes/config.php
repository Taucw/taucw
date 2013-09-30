<?php
// dummy config included by default template
Mtpl::addJS('office');
Mtpl::addJS('mousetrap.min');
Mtpl::addJS('jquery.form');
Mtpl::addJS('jquery-ui-1.10.3.custom');


Mtpl::addCSS('reset-fonts-grids');
Mtpl::addCSS('styleforms');
Mtpl::addCSS('style_admin');
Mtpl::addCSS(SECURE_SITE_URL.'themes/'.Config::getPref('theme').'/css/style');
Mtpl::addCSS(SECURE_SITE_URL.'themes/'.Config::getPref('theme').'/ui/jquery-ui-1.10.3.custom.min');