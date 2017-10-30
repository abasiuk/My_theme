<?php
/**
 * Created by PhpStorm.
 * User: Everad
 * Date: 30.10.2017
 * Time: 11:25
 */
if(!is_active_sidebar('land-sidebar')){
    return;
}

?>

<aside id="secondary" role="complementary" class="land-sidebar">
    <?php dynamic_sidebar('land-sidebar')?>
</aside>
