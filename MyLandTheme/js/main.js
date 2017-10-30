/**
 * Created by Everad on 22.08.2017.
 */
jQuery(document).ready(function() {
    jQuery('.owl-carousel').owlCarousel({
        loop:true, //Зацикливаем слайдер
        margin:10, //Отступ от картино если выводите больше 1
        nav:true, //Вкл навигацию
        navText: '',
        autoplay:true, //Автозапуск слайдера
        smartSpeed:3500, //Время движения слайда
        autoplayTimeout:6000, //Время смены слайда
        responsive:{ //Адаптация в зависимости от разрешения экрана
            0:{
                items:1
            },
            600:{
                items:2
            }
        }
    });
    jQuery('.toggle-mnu').on('click', function (e) {
        e.preventDefault();
        jQuery('.toggle-mnu').toggleClass('on');
        jQuery('.nav-container').toggleClass('show-menu');
        jQuery('.logo').toggleClass('invis');
        jQuery('#main-mnu-butt').toggleClass('invis');
    });
    var objToStick = jQuery(".nav-container"); //Получаем нужный объект
    var topOfObjToStick = 83; //Получаем начальное расположение нашего блока

    jQuery(window).scroll(function () {
        var windowScroll = jQuery(window).scrollTop(); //Получаем величину, показывающую на сколько прокручено окно
        if (windowScroll > topOfObjToStick) { // Если прокрутили больше, чем расстояние до блока, то приклеиваем его
            jQuery(objToStick).addClass("topWindow");
        } else {
            jQuery(objToStick).removeClass("topWindow");
        };
    });

    jQuery('h1, h2, h3, h4, h5, h6').each(function (index) {
       var text = jQuery(this).text();
       var textParts = text.split(' ');
       text = "<span>" + textParts[0] + "</span>";
       textParts[0] = '';
       for( var i = 0; i < textParts.length; i++){
           text += " " + textParts[i];
       }
       jQuery(this).find('a').html(text);
    });

    jQuery('#main-form').on('submit', function (e) {
        e.preventDefault();

        jQuery('.js-show-feedback').removeClass('js-show-feedback');

        var form = jQuery(this),
            name = form.find('#name').val(),
            email = form.find('#email').val(),
            message = form.find('#message').val(),
            ajaxurl = form.data('url');

        form.find('input, button, textarea').attr('disabled','disabled');
        jQuery('.js-form-submission').addClass('js-show-feedback');

        jQuery.ajax({
            url: ajaxurl,
            type: 'post',
            data: {
                name : name,
                email : email,
                message : message,
                action : 'land_save_user_contact_form'
            },
            error: function (response) {
                jQuery('.js-form-submission').removeClass('js-show-feedback');
                jQuery('.js-form-error').addClass('js-show-feedback');
                form.find('input, button, textarea').removeAttr('disabled');
            },
            success: function (response) {
                if( response == 0 ){

                    setTimeout(function(){
                        jQuery('.js-form-submission').removeClass('js-show-feedback');
                        jQuery('.js-form-error').addClass('js-show-feedback');
                        form.find('input, button, textarea').removeAttr('disabled');
                    },1500);

                } else {

                    setTimeout(function(){
                        jQuery('.js-form-submission').removeClass('js-show-feedback');
                        jQuery('.js-form-success').addClass('js-show-feedback');
                        form.find('input, button, textarea').removeAttr('disabled').val('');
                    },1500);

                }
            }
        });

    });
    document.body.onload = function () {
        setTimeout( function () {
            var preloader = jQuery('#preloader');
            if (!preloader.hasClass('done')){
                preloader.addClass('done');
            }
        }, 1000);
    }
});