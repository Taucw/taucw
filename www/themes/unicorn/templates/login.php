<?php Mtpl::addCSS('unicorn.login')?>
<!DOCTYPE html>
<html lang="<?php echo T::getLang()?>">
    <head>
        <title><?php echo $adminTitle?></title>
		<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php
    foreach (Mtpl::getCSS() as $css){
            echo '<link rel="stylesheet" href="/themes/'.Config::getPref('theme').'/css/'.$css['name'].'.css" />';
    }

    Mtpl::printJS();
    ?>

    </head>
    <body>
        <div id="logo">
            <img src="/themes/unicorn/img/logo.png" alt="" />
        </div>
        <div id="loginbox">
          <?php $f = $this->rf($loginForm, 'static')?>

          <form <?php echo $f['attributes']?>>
            <?php echo $f['hidden']?>
            <p><?php _e('Login')?></p>
              <div class="control-group">
                  <div class="controls">
                      <div class="input-prepend">
                          <span class="add-on"><i class="icon-user"></i></span><?php echo $f['login']['html']?>
                      </div>
                  </div>
              </div>
              <div class="control-group">
                  <div class="controls">
                      <div class="input-prepend">
                          <span class="add-on"><i class="icon-lock"></i></span><?php echo $f['password']['html']?>
                      </div>
                  </div>
              </div>
              <div class="form-actions">
                  <span class="pull-right"><input type="submit" class="btn btn-inverse" value="Login" /></span>
              </div>
          </form>
        </div>

        <script src="js/jquery.min.js"></script>
        <script src="js/unicorn.login.js"></script>
    </body>
</html>


