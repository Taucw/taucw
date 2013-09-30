<?php
foreach(array('bootstrap.min','bootstrap-responsive.min','fullcalendar','unicorn.main','unicorn.grey','select2','jquery.gritter','isotope') as $css) {
  Mtpl::addCSS($css);
}
foreach(array('jquery.ui.custom', 'bootstrap.min','jquery.gritter.min','jquery.peity.min', 'unicorn', 'jquery.isotope.min') as $js) {
  Mtpl::addJS($js);
}
