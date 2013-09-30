<?php $f = $this->rf($form)?>

<form <?php echo $f['attributes']?> class="form-horizontal">
  <?php echo $f['hidden']?>
  <?php foreach($f['sections'] as $section):?>
    <fieldset class="well">
      <legend><?php echo $section['header']?></legend>
      <?php foreach($section['elements'] as $elem):?>
        <?php $this->i(array('_elements/'.$elem['type'],'_elements/default'),array('elem'=>$elem))?>
      <?php endforeach?>
    </fieldset>
  <?php endforeach?>
</form>