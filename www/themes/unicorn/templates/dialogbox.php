<?php foreach($messages as $message):?>
$.gritter.add({
  title:	'',
  text:	'<?php echo $message[0]?>',
  image:	'/images/icons/<?php echo $message[1]?>.png',
  sticky: false
});
<?php endforeach ?>
<?php unset($_SESSION['flashmessages'])?>