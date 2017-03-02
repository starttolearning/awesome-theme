jQuery(document).ready(function($) {
    
    /*User order submmision*/
    $("#tbContactForm").on( 'submit',function( e ){
        e.preventDefault();

        $('.has-error').removeClass('has-error');
        $('.js-form-submission').fadeOut('1');
        $('.js-form-danger').fadeOut('1');
        $('.js-form-success').fadeOut('1');

        var form = $(this);
        var name = form.find('#name').val(),
            email = form.find('#email').val(),
            message = form.find('#message').val(),
            ajaxurl = form.data('url');

        // if( name === '' || email === '' || message === ''){
        //   // console.log('Require inputs are empty');

        //   return;
        // }

        if( name === ''){
          $("#name").parent('.form-group').addClass('has-error');
          return;
        }

        if( email === ''){
          $("#email").parent('.form-group').addClass('has-error');
          return;
        }

        if( message === ''){
          $("#message").parent('.form-group').addClass('has-error');
          return;
        }

        form.find('input, button, textarea').attr('disabled','disabled');
        form.find('.js-form-submission').slideDown('300');

        $.ajax({
          url : ajaxurl,
          type : 'post',
          data: { 
            name : name,
            email : email,
            message : message,
            action : 'tb_save_order_form'
          },
          error : function ( response ) {
            // console.log(response);
            $('.js-form-submission').fadeOut('1');
            $('.js-form-danger').slideDown('300');
            form.find('input, button, textarea').removeAttr('disabled','disabled');
          },
          success : function ( response ) {
              if( response == 0 ){

                setTimeout(function(){
                  $('.js-form-submission').fadeOut('1');
                  $('.js-form-danger').slideDown('300');
                  form.find('input, button, textarea').removeAttr('disabled');
                },2000);

              }else{

                setTimeout(function(){
                  $('.js-form-submission').fadeOut('1');
                  $('.js-form-success').slideDown('300');
                  form.find('input, button, textarea').removeAttr('disabled').val('');
                },2000);

              }
            }
        });
    });
    
    /* File uplaoder using built-in scripts */
    var mediaUploader;
    $('#file-uploader').on('click', function(e){
        
        e.preventDefault();
        if( mediaUploader ){
            mediaUploader.open();
            return;
        }
        
        mediaUploader = wp.media.frames.file_frame =wp.media({
            title: '选择上传的文件',
            button: {
                text: '上传'
            },
            multiple: false
        });
        
        mediaUploader.on('select',function(){
           attatchment = mediaUploader.state().get('selection').first().toJSON();
           $('#profile-picture').val(attatchment.url);
           
           $('#profile-picture-preview').css('background-image','url(' + attatchment.url + ')');
           
        });
        
        mediaUploader.open();
        
    });
    
});