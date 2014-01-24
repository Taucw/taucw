
    <?php
      Mtpl::printJS();
    ?>

  <script type="text/javascript">
    <?php if(User::getInstance('office')->isLoggedIn()):?>
    window.userid = <?php echo User::getInstance('office')->getId()?>;
    <?php endif?>

    <?php
    if(is_array($javascript)){
        foreach($javascript as $inst) {
          echo $inst."\n";
        }
    }
    ?>
      <?php
      foreach(Mtpl::getJSinline('inline') as $inst){
        echo $inst."\n";
      }
      ?>

    $(function() {
      <?php
      foreach(Mtpl::getJSinline('ready') as $inst){
        echo $inst."\n";
      }
      ?>
    });
    <?php
        if(is_array($onbeforeunLoad)){
          echo 'window.onbeforeunload=function() {
            ';
          foreach($onbeforeunLoad as $inst){
            echo $inst."\n";
          }
          echo '}
          ';
        }
        if(is_array($onunLoad)){
          echo '$(window).unload(function() {
            ';
          foreach($onunLoad as $inst){
            echo $inst."\n";
          }
          echo '});
          ';
        }
    ?>
</script>

<a href="http://tau.so">Tau.so</a>