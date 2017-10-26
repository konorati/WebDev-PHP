<?php $str = "";
foreach($view_bag['errors'] as $message)
     {
        $str .= '<li>'.$message.'</li>';
      } 
?>
<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5>There were errors during <?php print $view_bag['error_type']?>:</h5>
    <?php print $str; ?>
  </div>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

