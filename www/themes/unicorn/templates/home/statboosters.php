<?php $this->startCapture('stat')?>
<table class="table table-bordered table-striped">
  <tr><th colspan="3">Quotidien</th></tr>
  <tr>
    <th>Date</th>
    <th>Nb boosters</th>
    <th>Par utilisateur</th>
  </tr>
  <?php while($row = $res->fetchRow(MDB2_FETCHMODE_ASSOC)):?>
    <tr>
      <td><?php echo date('d/m/Y',strtotime($row['dt']))?></td>
      <td><?php echo $row['nb']?></td>
      <td><?php echo number_format(($row['nb']/$nbusers),2)?></td>
    </tr>
  <?php endwhile?>
  <tr><th colspan="3">Mensuel</th></tr>
  <tr>
    <th>Date</th>
    <th>Nb boosters</th>
    <th>Par utilisateur</th>
  </tr>
  <?php while($row = $resmonth->fetchRow(MDB2_FETCHMODE_ASSOC)):?>
    <tr>
      <td><?php echo date('m/Y',strtotime($row['dt']))?></td>
      <td><?php echo $row['nb']?></td>
      <td><?php echo number_format(($row['nb']/$nbusers),2)?></td>
    </tr>
  <?php endwhile?>

</table>
<?php $this->endCapture()?>
<?php $this->i('widget',array('content' => $this->getCapture('stat'), 'title' => 'Stats Utilisation boosters', 'size' => 4, 'icon' => 'signal'))?>