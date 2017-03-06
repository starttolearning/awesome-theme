<?php
/**
 * The footer for our theme
 *
 * @package awesometheme
 * @since 1.0
 * @version 1.0
 */

?>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-4">
				    <h3>快速链接</h3>
					<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_class' => 'footer-nav') ); ?>
				</div>
				<div class="col-xs-12 col-sm-4">
				    <h3>联系我们</h3>
				    <address>
                      <strong>南充种树人广告公司</strong><br>
                      学府花园内<br>
                      西华师范大学，华凤镇<br>
                      <abbr title="Phone">Tel:</abbr> 182-8080-0000
                    </address>
				</div>
				<div class="col-xs-12 col-sm-4">
				    <h3>社交媒体</h3>
				    <div class="awesome-socail">
				        <table class="table table-condensed table-hover">
                         <tbody>
                             <tr>
                              <td><i class="fa fa-qq" aria-hidden="true"></i></td>
                              <td>QQ： 7479344433</td>
                              </tr>
                              <tr>
                                  <td><i class="fa fa-weixin" aria-hidden="true"></i></td>
                                  <td>微信：7479344433</td>
                              </tr>
                              <tr>
                                  <td><i class="fa fa-weibo" aria-hidden="true"></i></td>
                                  <td>新浪：7479344433</td>
                              </tr>
                         </tbody>
                    </table>
				    </div>
				    
				</div>
				<div class="col-xs-12">
					<p class="text-center">© 2016 版权归南充种树人广告公司所有  蜀ICP备:16026179.</p>
					<p class="text-center">Powered by: WordPress</p>
				</div>
			</div>
		</div>
	</footer>

</body>
<?php wp_footer(); ?>
</html>