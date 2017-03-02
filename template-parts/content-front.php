<section id="tb-resume-intro">
   <div class="container">
        <div class="row">
            <div class="col-sm-6"><img class="img-responsive" src="<?php echo the_post_thumbnail_url( 'post-thumbnail' ); ?>" /></div>
            <!-- col-sm-6 -->
            <div class="col-sm-6">
                <h2>制作简历再也不麻烦了</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id nostrum corporis reiciendis libero? Itaque obcaecati, reprehenderit illo. Nulla quis laudantium ad dignissimos animi quidem expedita placeat voluptate maxime, repudiandae laborum.</p>
            </div>
        </div>
    </div>
</section>

<section id="tb-resume-feature-1">
  <div class="container-fluid">
       <div class="row">
           <h2 class="text-center">我们的优势和特点</h2>
            <div class="container">
                <div class="col-sm-2 col-xs-4 awesome-feature-block"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/simple.png" /></div>
                <div class="col-sm-2 col-xs-4 awesome-feature-block"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/fast.png" /></div>
                <div class="col-sm-2 col-xs-4 awesome-feature-block"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/professional.png" /></div>
                <div class="col-sm-2 col-xs-4 awesome-feature-block"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/cheap.png" /></div>
                <div class="col-sm-2 col-xs-4 awesome-feature-block"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/beauty.png" /></div>
                <div class="col-sm-2 col-xs-4 awesome-feature-block"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/art.png" /></div>
            </div>
        </div>
    </div>
</section>


<section id="tb-resume-template">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h2 class="">选择模板,开始制定</h2>
            </div>
            <?php
            $args = array(
                'post_type' => array('resume'),
                'order' => 'ASC'
            );

            $resume_templates = new WP_Query($args);
            if ($resume_templates->have_posts()):
                while ($resume_templates->have_posts()):
                    $resume_templates->the_post();
                    get_template_part('templates/content', 'resume-template');
                endwhile;
            endif;
            ?>
            <div class="col-xs-12 text-center">
               <div class="awesome-load-more">
                    <a  href="./resumes"><button class="btn awesome-btn">更多&raquo;</button></a>
               </div>
            </div>
        </div>
    </div>
</section> <!-- #tb-resume-template -->

<section id="tb-resume-howto">
     <div class="container-fulid">
         <div class="row">
           <div class="container">
               <div class="col-sm-6">
                    <h2>轻松三个步骤解决你所有的简历问题</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id nostrum corporis reiciendis libero? Itaque obcaecati, reprehenderit illo. Nulla quis laudantium ad dignissimos animi quidem expedita placeat voluptate maxime, repudiandae laborum.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id nostrum corporis reiciendis libero? Itaque obcaecati, reprehenderit illo. Nulla quis laudantium ad dignissimos animi quidem expedita placeat voluptate maxime, repudiandae laborum.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id nostrum corporis reiciendis libero? Itaque obcaecati, reprehenderit illo. Nulla quis laudantium ad dignissimos animi quidem expedita placeat voluptate maxime, repudiandae laborum.</p>
                </div>
                <div class="col-sm-6"><img class="img-responsive" src="<?php echo get_template_directory_uri().'/assets/images/howto.png'; ?>" /></div>    
           </div>
        </div>
     </div>
</section>