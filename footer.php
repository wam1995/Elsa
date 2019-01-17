<?php
    /**
     * The template for displaying the footer
     * 
     * @author Maine <maine@cainiaofly.com>
     * @license GPL-3.0
     */
?>
                </div>
            </div>
            <!-- /Content -->
            
            <!-- Footer -->
            <div id="elsa-to-top" class="d-flex justify-content-center align-items-center">
                <span class="fa fa-chevron-up"></span>
            </div>
            <?php
                $github = of_get_option("social_github");
                $weibo = of_get_option("social_weibo");
                $tweibo = of_get_option("social_tweibo");
                $twitter = of_get_option("social_twitter");
                $facebook = of_get_option("social_facebook");
                $googleplus = of_get_option("social_google_plus");
                $whatsapp = of_get_option("social_whatsapp");
                $skype = of_get_option("social_skype");
                if( $github | $weibo | $tweibo | $tweibo | $twitter | $facebook | $googleplus | $whatsapp | $skype ) {
                ?>
                <div id="elsa-footer" class="d-flex flex-column justify-content-center align-items-center">
                    <ul class="elsa-social-icons d-flex justify-content-center">
                    <?php
                        if($github) echo '<li><a href="'.$github.'" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a></li>';
                        if($weibo) echo '<li><a href="'.$weibo.'" target="_blank"><i class="fa fa-weibo" aria-hidden="true"></i></a></li>';
                        if($tweibo) echo '<li><a href="'.$tweibo.'" target="_blank"><i class="fa fa-tencent-weibo" aria-hidden="true"></i></a></li>';
                        if($twitter) echo '<li><a href="'.$twitter.'" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>';
                        if($facebook) echo '<li><a href="'.$facebook.'" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>';
                        if($googleplus) echo '<li><a href="'.$googleplus.'" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>';
                        if($whatsapp) echo '<li><a href="'.$whatsapp.'" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>';
                        if($skype) echo '<li><a href="'.$skype.'" target="_blank"><i class="fa fa-skype" aria-hidden="true"></i></a></li>';
                    ?>
                    </ul>
                </div>
                <?php
                }
            ?>
            <div id="elsa-copyright" class="d-flex flex-column justify-content-center align-items-center">
                <p class="d-flex flex-wrap justify-content-center align-items-center">
                    <span>Copyright</span>
                    <span><i class="fa fa-copyright"></i></span>
                    <span><?php echo date('Y'); ?></span>
                    <a href="<?php home_url(); ?>"><?php bloginfo('name'); ?></a>
                    <span>. All Rights Reserved.</span>
                    <span>Theme</span>
                    <a href="https://www.cainiaofly.com/elsa.html" target="_blank">Elsa</a>
                    <span>By</span>
                    <a href="https://www.cainiaofly.com/" target="_blank">Maine</a>
                </p>
                <p class="d-flex flex-wrap justify-content-center align-items-center">
                <?php
                    $icp_num = of_get_option("icp_num");
                    $gov_num = of_get_option("gov_num");
                    $gov_link = of_get_option("gov_link", '#');
                    $site_statistics = of_get_option('site_statistics');
                    if($icp_num) echo '<a href="http://www.miitbeian.gov.cn/">'.$icp_num.'</a><span class="d-sm-inline-block d-none">|</span>';
                    if($gov_num) echo '<a href="'.$gov_link.'">'.$gov_num.'</a><span class="d-sm-inline-block d-none">|</span>';
                    if($site_statistics) echo $site_statistics;
                ?>
                </p>
            </div>
            <!-- /Footer -->
        </div>
    </div>
    <?php wp_footer(); ?>
</body>
</html>