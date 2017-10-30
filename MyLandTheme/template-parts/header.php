<?php
/**
 * Created by PhpStorm.
 * User: Everad
 * Date: 22.08.2017
 * Time: 12:04
 */
$data_header = land_create_single_header(get_header_image());
?>
<header class="main-head" <?php echo $data_header['parallax']; ?> style="<?php echo $data_header['header_img']; ?>">
    <div class="container">
        <div class="row">
            <div class="top-line clearfix">
                <div class="col-xs-6">
                    <?php if (has_custom_logo()){
                        echo get_custom_logo();
                    }else{
                        $site_name = get_bloginfo('name');
                        $site_url = get_bloginfo('url');
                        echo '<a href="'. $site_url .'" id = "text-color" class="logo"><b>' . $site_name . '</b></a>';
                    }
                    ?>
                </div>
                <div class="col-xs-6">
                    <a href="#" id="main-mnu-butt" class="toggle-mnu"><span></span></a>
                </div>
            </div>
        </div>
        <h1 id = "text-color" style="<?php echo $data_header['hidden']; ?>"><?php bloginfo('name');?></h1>
        <p class="on-center" id = "text-color" style="<?php echo $data_header['hidden']; ?>"><?php bloginfo('description');?></p>
        <div class="row">
            <div class="col-md-5" style="<?php echo $data_header['hidden']; ?>">
                <form id="main-form" method="post" action="#" class="forms" data-url="<?php echo admin_url('admin-ajax.php');?>">
                    <h3><b><span>Send</span></b> a Message</h3>
                    <input type="text" name="name" id="name" placeholder="Your Name" required>
                    <input type="email" name="mail" id="email" placeholder="Your Email" required>
                    <textarea name="message" id="message" placeholder="Your Massage" required></textarea>
                    <div class="wrap-button">
                        <button class="buttons">Send Message <span>&#8594;</span></button>
                        <small class="text-info form-control-msg js-form-submission">Submission in process, please wait..</small>
                        <small class="text-success form-control-msg js-form-success">Message Successfully submitted, thank you!</small>
                        <small class="text-danger form-control-msg js-form-error">There was a problem with the Contact Form, please try again!</small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>