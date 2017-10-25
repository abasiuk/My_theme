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
    jQuery('.toggle-mnu').on('click', function () {
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
        var form = jQuery(this),
            name = form.find('#name').val(),
            email = form.find('#email').val(),
            message = form.find('#message').val(),
            ajaxurl = form.data('url');

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
                console.log(response);
            },
            success: function (response) {
                
            }
        });

    });
});