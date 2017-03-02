<?php
/**
 * ================================
 *     Treeby Corp CPT -- Resume
 * =============================*/

/**
 * function: tbc_cpt_resume
 * 新建CPT Resume
 * 初始化自定义文章类型的相关设置
 */
function tbc_cpt_resume() {
    register_post_type('resume', array(
        'labels' => array(
            'name' => __('简历模板', 'ts_child'),
            'singular_name' => __('简历模板', 'ts_child'),
            'all_items' => __('所有简历', 'ts_child'),
            'new_item' => __('新建简历模板', 'ts_child'),
            'add_new' => __('添加模板', 'ts_child'),
            'add_new_item' => __('添加简历', 'ts_child'),
            'edit_item' => __('编辑简历', 'ts_child'),
            'view_item' => __('查看简历', 'ts_child'),
            'search_items' => __('搜索简历', 'ts_child'),
            'not_found' => __('简历没查到', 'ts_child'),
            'not_found_in_trash' => __('回收站没有简历', 'ts_child'),
            'parent_item_colon' => __('父简历', 'ts_child'),
            'menu_name' => __('简历模板', 'ts_child'),
        ),
        'public' => true,
        'hierarchical' => false,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt','post-formats'),
        'has_archive' => true,
        'query_var' => true,
        'menu_icon' => 'dashicons-welcome-write-blog',
        'menu_position' => 4,
        'show_in_rest' => true,
        'rest_base' => 'resume',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
        'register_meta_box_cb' => 'tb_mata_box_settings'
    ));
}

add_action('init', 'tbc_cpt_resume');

/**
 * 添加简历模板属性
 */
function tb_mata_box_settings() {
    add_meta_box('tb_resume_meta_box', __('填写简历属性', 'ts_child'), 'tb_resume_properties', 'resume', 'side');
}

add_action('add_meta_boxes', 'tb_mata_box_settings');

function tb_resume_properties($post) {
    wp_nonce_field(plugin_basename(__FILE__), 'tb_resume_meta_nonce');
    
    $total_pages = get_post_meta($post->ID, 'tb_resume_total_pages', true);
    $page_size = get_post_meta($post->ID, 'tb_resume_page_size', true);
    $print_style = get_post_meta($post->ID, 'tb_resume_print_style', true);
    $print_quality = get_post_meta($post->ID, 'tb_resume_print_quality', true);
    $price = get_post_meta($post->ID, 'tb_resume_price', true);
    $context = get_post_meta($post->ID, 'tb_resume_context', true);
    ?>

    <p>
        <label for="tb_resume_total_pages">总页数</label><br/>
        <input type="text" class="all-options" id="tb_resume_total_pages" name="tb_resume_total_pages" value="<?php echo $total_pages; ?>" />
        <span class="description">输入本模板的制作页数。</span>
    </p>
    
    <p>
        <label for="tb_resume_page_size">纸张大小</label><br/>
        <input type="text" class="all-options" id="tb_resume_page_size" name="tb_resume_page_size" value="<?php echo $page_size; ?>" />
        <span class="description">输入本模板的制作纸张大小。</span>
    </p>
    
    <p>
        <label for="tb_resume_print_style">装订风格</label><br/>
        <input type="text" class="all-options" id="tb_resume_print_style" name="tb_resume_print_style" value="<?php echo $print_style; ?>" />
        <span class="description">输入本模板的装订风格。</span>
    </p>
    
    <p>
        <label for="tb_resume_print_quality">纸张质量选择</label><br/>
        <input type="text" class="all-options" id="tb_resume_print_quality" name="tb_resume_print_quality" value="<?php echo $print_quality; ?>" />
        <span class="description">输入本模板的制作纸张质量。</span>
    </p>
    
    <p>
        <label for="tb_resume_price">单价</label><br/>
        <input type="text" class="all-options" id="tb_resume_price" name="tb_resume_price" value="<?php echo $price; ?>" />
        <span class="description">输入本模板的制作单张价格。</span>
    </p>
    
    <p>
        <label for="tb_resume_price">使用场所</label><br/>
        <input type="text" class="all-options" id="tb_resume_context" name="tb_resume_context" value="<?php echo $context; ?>" />
        <span class="description">输入该简历的应用场所(用逗号隔开)。</span>
    </p>
    
    <?php
}

function tb_resume_meta_box_save($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    if ( !isset($_POST['tb_resume_meta_nonce']) || !wp_verify_nonce($_POST['tb_resume_meta_nonce'], plugin_basename(__FILE__))) {
        return $post_id;
    }

    global $post;
    $post_type = get_post_type_object($post->post_type);
    if (!current_user_can($post_type->cap->edit_post, $post_id)) {
        return $post_id;
    }

    $meta_datas['tb_resume_total_pages'] = (isset($_POST['tb_resume_total_pages']) ? $_POST['tb_resume_total_pages'] : '');
    $meta_datas['tb_resume_page_size'] = (isset($_POST['tb_resume_page_size']) ? $_POST['tb_resume_page_size'] : '');
    $meta_datas['tb_resume_print_style'] = (isset($_POST['tb_resume_print_style']) ? $_POST['tb_resume_print_style'] : '');
    $meta_datas['tb_resume_print_quality'] = (isset($_POST['tb_resume_print_quality']) ? $_POST['tb_resume_print_quality'] : '');
    $meta_datas['tb_resume_price'] = (isset($_POST['tb_resume_price']) ? $_POST['tb_resume_price'] : '');
    $meta_datas['tb_resume_context'] = (isset($_POST['tb_resume_context']) ? $_POST['tb_resume_context'] : '');

    foreach ($meta_datas as $key => $value) {
        $current_value = get_post_meta($post_id, $key, true);

        if ($value && '' == $current_value) {
            add_post_meta($post_id, $key, $value, true);
        } elseif ($value && $value != $current_value) {
            update_post_meta($post_id, $key, $value);
        } elseif ('' == $value && $current_value) {
            delete_post_meta($post_id, $key);
        }
    }
}


add_action('save_post','tb_resume_meta_box_save');

/**
 * Function 用于当文章发生变化或者更新时候的消息提示
 * @global type $post
 * @param type $messages
 * @return type
 */
function tb_cpt_updated_messages($messages) {
    global $post;

    $permalink = get_permalink($post);

    $messages['resume'] = array(
        0 => '', // Unused. Messages start at index 1.
        1 => sprintf(__('简历已更新. <a target="_blank" href="%s">查看简历</a>', 'ts_child'), esc_url($permalink)),
        2 => __('自定义数据已更新.', 'ts_child'),
        3 => __('自定义数据已删除.', 'ts_child'),
        4 => __('简历已更新.', 'ts_child'),
        /* translators: %s: date and time of the revision */
        5 => isset($_GET['revision']) ? sprintf(__('改简历模板回复至 %s', 'ts_child'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
        6 => sprintf(__('简历模板已发布. <a href="%s">浏览模板</a>', 'ts_child'), esc_url($permalink)),
        7 => __('简历模板已保存.', 'ts_child'),
        8 => sprintf(__('简历模板已提交. <a target="_blank" href="%s">预览简历模板</a>', 'ts_child'), esc_url(add_query_arg('preview', 'true', $permalink))),
        9 => sprintf(__('简历模板计划在: <strong>%1$s</strong>. <a target="_blank" href="%2$s">预览简历模板</a>', 'ts_child'),
                // translators: Publish box date format, see http://php.net/date
                date_i18n(__('M j, Y @ G:i'), strtotime($post->post_date)), esc_url($permalink)),
        10 => sprintf(__('简历模板草稿已更新. <a target="_blank" href="%s">预览简历模板</a>', 'ts_child'), esc_url(add_query_arg('preview', 'true', $permalink))),
    );

    return $messages;
}

add_filter('post_updated_messages', 'tb_cpt_updated_messages');

/**
 * 设置简历模板所有预览的窗口要显示的内容
 * @param type $cols
 * @return type
 */
function tb_cpt_custom_columns($cols) {
    $cols = array(
        'cb' => '<input type="checkbox" />',
        'title' => __('Title', 'ts_child'),
    );
    return $cols;
}

//apply_filters( "manage_resume_posts_columns", 'tb_cpt_custom_columns' );

function tb_cpt_custom_column_content($column, $post_id) {
    switch ($column) {
        case 'title':
            echo get_post_meta($post_id, 'author', true);
            break;
    }
}

//add_action('manage_resume_posts_custom_column','tb_cpt_custom_column_content',10,2);



/**
 * ================================
 *     Treeby Corp CPT - Orders
 * ================================
 */





/* ORDER CPT */
function tbc_cpt_order(){
    $labels = array(
        'name'          => '全部订单',
        'singular'      => '订单',
        'menu_name'     => '全部订单',
        'name_admin_bar'=> '订单',
    );
    $args = array(
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'capability_type'   => 'post',
        'hierarchical'      => false,
        'menu_position'     => 20,
        'supports'          => array('title','editor','author'),
        'menu_icon'         =>'dashicons-email-alt',
        
    );
    register_post_type('tb-order', $args);
}
add_action('init', 'tbc_cpt_order');

function tb_set_order_columns( $columns){
    $new_columns = array(
        'cb' => '<input type="checkbox" />',
        'title'     => '用户名',
        'message'   => '订单内容',
        'email'     => '邮件地址',
        'date'      => '时间',
    );
    return $new_columns;
}
add_filter( 'manage_tb-order_posts_columns','tb_set_order_columns' );

function tb_order_custom_column( $columns, $post_id ){
    switch ($columns){
        case 'message':
            echo get_the_excerpt();
            break;
        case 'email':
            $email = get_post_meta($post_id, '_order_email_value_key',true);
            echo '<a href="mailto:'.$email.'">'.$email.'</a>';
            break;
    }
}
add_action('manage_tb-order_posts_custom_column','tb_order_custom_column',10, 2);


/* order META BOX*/
function tb_order_type_add_meta_box(){
    add_meta_box('order_type_meta_box', '邮箱地址', 'tb_order_type_meta_email_callback', 'tb-order','side');
}

function tb_order_type_meta_email_callback( $post ){
    wp_nonce_field('tb_order_save_email_data', 'tb_order_email_meta_box_nonce');
    
    $value = get_post_meta($post->ID, '_order_email_value_key',true);
    
    echo '<label for="tb_order_email_filed">用户邮箱地址</label>';
    echo '<input type="email" id="tb_order_email_filed" name="tb_order_email_filed" value="'. esc_attr( $value).'" class="all-options" > ';
}
add_action('add_meta_boxes','tb_order_type_add_meta_box');


function tb_order_save_email_data( $post_id ){
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    
        if ( !isset($_POST['tb_order_email_meta_box_nonce']) || !wp_verify_nonce($_POST['tb_order_email_meta_box_nonce'], 'tb_order_save_email_data')) {
        return $post_id;
    }
    
    if( !current_user_can('edit_post', $post_id)){
        return;
    }
    
    if( !isset( $_POST['tb_order_email_filed'])){
        return;
    }
    
    $my_data = sanitize_text_field($_POST['tb_order_email_filed']);
    
    update_post_meta($post_id, '_order_email_value_key', $my_data);
    
}
add_action('save_post','tb_order_save_email_data');
