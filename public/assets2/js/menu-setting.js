"use strict";
$(document).ready(function() {
    // =========================================================
    // =========    Menu Customizer [ HTML ] code   ============
    // =========================================================


     if(localStorage.getItem('style')){
           
     }else{
            var desing = { 'menudark': '', 'menulight': 'active', 'dark': '' };
            localStorage.setItem('desing',JSON.stringify(desing));
            var style = "menu-light";
            localStorage.setItem('style',style);
     }
     if(localStorage.getItem('backgroundClass')){
        var classbody = localStorage.getItem('backgroundClass');
         $('body').addClass(classbody);
     }
     
     if(localStorage.getItem('backgroundBanner')){
        var backgroundBanner = localStorage.getItem('backgroundBanner');
        var objeto = JSON.parse(backgroundBanner);
        var style = localStorage.getItem('desing');
        var objeto_style = JSON.parse(style);
        $('body').append('' +
        '<div id="styleSelector" class="menu-styler">' +
            '<div class="style-toggler">' +
                '<a href="#!"></a>' +
            '</div>' +
            '<div class="style-block">' +
                '<h4 class="mb-2">UTC <small class="font-weight-normal">Cursos</small></h4>' +
                '<hr class="">' +
                '<div class="m-style-scroller">' +
                    '<h6 class="mt-2">Diseño</h6>' +
                    '<div class="theme-color layout-type">' +
                        '<a href="#!" class="'+objeto_style.menudark+'" data-value="menu-dark" title="Default Layout"><span></span><span></span></a>' +
                        '<a href="#!" class="'+objeto_style.menulight+'" data-value="menu-light" title="Light"><span></span><span></span></a>' +
                        '<a href="#!" class="'+objeto_style.dark+'" data-value="dark" title="Dark"><span></span><span></span></a>' +
                        '<a href="#!" class="" data-value="reset" title="Reset">Restablecer</a>' +
                    '</div>' +
                    '<h6>Color de fondo</h6>' +
                    '<div class="theme-color background-color flat">' +
                        '<a href="#!" class="'+objeto.blue+'" data-value="background-blue"><span></span><span></span></a>' +
                        '<a href="#!" class="'+objeto.red+'" data-value="background-red"><span></span><span></span></a>' +
                        '<a href="#!" class="'+objeto.purple+'" data-value="background-purple"><span></span><span></span></a>' +
                        '<a href="#!" class="'+objeto.info+'" data-value="background-info"><span></span><span></span></a>' +
                        '<a href="#!" class="'+objeto.green+'" data-value="background-green"><span></span><span></span></a>' +
                        '<a href="#!" class="'+objeto.dark+'" data-value="background-dark"><span></span><span></span></a>' +
                    '</div>' +
                    '<h6>Gradinate de fondo</h6>' +
                    '<div class="theme-color background-color gradient">' +
                        '<a href="#!" class="'+objeto.bg_blue+'" data-value="background-grd-blue"><span></span><span></span></a>' +
                        '<a href="#!" class="'+objeto.bg_red+'" data-value="background-grd-red"><span></span><span></span></a>' +
                        '<a href="#!" class="'+objeto.bg_purple+'" data-value="background-grd-purple"><span></span><span></span></a>' +
                        '<a href="#!" class="'+objeto.bg_info+'" data-value="background-grd-info"><span></span><span></span></a>' +
                        '<a href="#!" class="'+objeto.bg_green+'" data-value="background-grd-green"><span></span><span></span></a>' +
                        '<a href="#!" class="'+objeto.bg_dark+'" data-value="background-grd-dark"><span></span><span></span></a>' +
                    '</div>' +
                    '<h6>Imagen de fondo</h6>' +
                    '<div class="theme-color background-color image">' +
                        '<a href="#!" class="'+objeto.img_blue+'" data-value="background-img-1"><span></span><span></span></a>' +
                        '<a href="#!" class="'+objeto.img_red+'" data-value="background-img-2"><span></span><span></span></a>' +
                        '<a href="#!" class="'+objeto.img_purple+'" data-value="background-img-3"><span></span><span></span></a>' +
                        '<a href="#!" class="'+objeto.img_green+'" data-value="background-img-4"><span></span><span></span></a>' +
                        '<a href="#!" class="'+objeto.img_dark+'" data-value="background-img-5"><span></span><span></span></a>' +
                        '<a href="#!" class="'+objeto.img_info+'" data-value="background-img-6"><span></span><span></span></a>' +
                    '</div>' +
                    '<div class="form-group mb-2">' +
                        '<div class="switch switch-primary d-inline m-r-10">' +
                            '<input type="checkbox" id="theme-rtl">' +
                            '<label for="theme-rtl" class="cr"></label>' +
                        '</div>' +
                        '<label>RTL</label>' +
                    '</div>' +
                    '<div class="form-group mb-2">' +
                        '<div class="switch switch-primary d-inline m-r-10">' +
                            '<input type="checkbox" id="menu-fixed" checked>' +
                            '<label for="menu-fixed" class="cr"></label>' +
                        '</div>' +
                        '<label>Barra lateral fija</label>' +
                    '</div>' +
                    '<div class="form-group mb-2">' +
                        '<div class="switch switch-primary d-inline m-r-10">' +
                            '<input type="checkbox" id="header-fixed" checked>' +
                            '<label for="header-fixed" class="cr"></label>' +
                        '</div>' +
                        '<label>Baner fijo</label>' +
                    '</div>' +
                    '<div class="form-group mb-2">' +
                        '<div class="switch switch-primary d-inline m-r-10">' +
                            '<input type="checkbox" id="box-layouts">' +
                            '<label for="box-layouts" class="cr"></label>' +
                        '</div>' +
                        '<label>Diseño de caja</label>' +
                    '</div>' +
                    '<div class="form-group mb-2">' +
                        '<div class="switch switch-primary d-inline m-r-10">' +
                            '<input type="checkbox" id="breadcumb-layouts">' +
                            '<label for="breadcumb-layouts" class="cr"></label>' +
                        '</div>' +
                        '<label>Barra de posición</label>' +
                    '</div>' +
                '</div>' +
                '<a href="http://www.utc.edu.ec" target="_blank" class="btn btn-success btn-block m-r-15 m-t-10 m-b-10">Web UTC</a>' +
                '<a href="https://www.facebook.com/Ingeniería-En-Sistemas-UTC-La-Maná-385598668877914" target="_blank" class="btn btn-primary btn-block m-r-15 m-t-5 m-b-10 "><i class="feather icon-facebook"></i> Extensión La Mana </a>' +
                '<div class="text-center">' +
                    '<span class="text-center f-18 m-t-15 m-b-15 d-block">Elaborado por:</span>' +
                    '<a href="https://www.facebook.com/darwincs22/" target="_blank" class="btn text-white bg-facebook btn-icon m-b-20">' +
                        '<i class="feather icon-facebook"></i>' +
                    '</a>' +
                    '<a href="https://www.facebook.com/georginagabriela.suarezalvarado" target="_blank" class="btn text-white bg-twitter btn-icon m-l-20 m-b-20">' +
                        '<i class="feather icon-facebook"></i>' +
                    '</a>' +
                '</div>' +
            '</div>' +
        '</div>');
     }else{
$('body').append('' +
        '<div id="styleSelector" class="menu-styler">' +
            '<div class="style-toggler">' +
                '<a href="#!"></a>' +
            '</div>' +
            '<div class="style-block">' +
                '<h4 class="mb-2">UTC <small class="font-weight-normal">Cursos</small></h4>' +
                '<hr class="">' +
                '<div class="m-style-scroller">' +
                    '<h6 class="mt-2">Diseño</h6>' +
                    '<div class="theme-color layout-type">' +
                        '<a href="#!" class="" data-value="menu-dark" title="Default Layout"><span></span><span></span></a>' +
                        '<a href="#!" class="active" data-value="menu-light" title="Light"><span></span><span></span></a>' +
                        '<a href="#!" class="" data-value="dark" title="Dark"><span></span><span></span></a>' +
                        '<a href="#!" class="" data-value="reset" title="Reset">Restablecer</a>' +
                    '</div>' +
                    '<h6>Color de fondo</h6>' +
                    '<div class="theme-color background-color flat">' +
                        '<a href="#!" class="active" data-value="background-blue"><span></span><span></span></a>' +
                        '<a href="#!" class="" data-value="background-red"><span></span><span></span></a>' +
                        '<a href="#!" class="" data-value="background-purple"><span></span><span></span></a>' +
                        '<a href="#!" class="" data-value="background-info"><span></span><span></span></a>' +
                        '<a href="#!" class="" data-value="background-green"><span></span><span></span></a>' +
                        '<a href="#!" class="" data-value="background-dark"><span></span><span></span></a>' +
                    '</div>' +
                    '<h6>Gradinate de fondo</h6>' +
                    '<div class="theme-color background-color gradient">' +
                        '<a href="#!" class="" data-value="background-grd-blue"><span></span><span></span></a>' +
                        '<a href="#!" class="" data-value="background-grd-red"><span></span><span></span></a>' +
                        '<a href="#!" class="" data-value="background-grd-purple"><span></span><span></span></a>' +
                        '<a href="#!" class="" data-value="background-grd-info"><span></span><span></span></a>' +
                        '<a href="#!" class="" data-value="background-grd-green"><span></span><span></span></a>' +
                        '<a href="#!" class="" data-value="background-grd-dark"><span></span><span></span></a>' +
                    '</div>' +
                    '<h6>Imagen de fondo</h6>' +
                    '<div class="theme-color background-color image">' +
                        '<a href="#!" class="" data-value="background-img-1"><span></span><span></span></a>' +
                        '<a href="#!" class="" data-value="background-img-2"><span></span><span></span></a>' +
                        '<a href="#!" class="" data-value="background-img-3"><span></span><span></span></a>' +
                        '<a href="#!" class="" data-value="background-img-4"><span></span><span></span></a>' +
                        '<a href="#!" class="" data-value="background-img-5"><span></span><span></span></a>' +
                        '<a href="#!" class="" data-value="background-img-6"><span></span><span></span></a>' +
                    '</div>' +
                    '<div class="form-group mb-2">' +
                        '<div class="switch switch-primary d-inline m-r-10">' +
                            '<input type="checkbox" id="theme-rtl">' +
                            '<label for="theme-rtl" class="cr"></label>' +
                        '</div>' +
                        '<label>RTL</label>' +
                    '</div>' +
                    '<div class="form-group mb-2">' +
                        '<div class="switch switch-primary d-inline m-r-10">' +
                            '<input type="checkbox" id="menu-fixed" checked>' +
                            '<label for="menu-fixed" class="cr"></label>' +
                        '</div>' +
                        '<label>Barra lateral fija</label>' +
                    '</div>' +
                    '<div class="form-group mb-2">' +
                        '<div class="switch switch-primary d-inline m-r-10">' +
                            '<input type="checkbox" id="header-fixed" checked>' +
                            '<label for="header-fixed" class="cr"></label>' +
                        '</div>' +
                        '<label>Baner fijo</label>' +
                    '</div>' +
                    '<div class="form-group mb-2">' +
                        '<div class="switch switch-primary d-inline m-r-10">' +
                            '<input type="checkbox" id="box-layouts">' +
                            '<label for="box-layouts" class="cr"></label>' +
                        '</div>' +
                        '<label>Diseño de caja</label>' +
                    '</div>' +
                    '<div class="form-group mb-2">' +
                        '<div class="switch switch-primary d-inline m-r-10">' +
                            '<input type="checkbox" id="breadcumb-layouts">' +
                            '<label for="breadcumb-layouts" class="cr"></label>' +
                        '</div>' +
                        '<label>Barra de posición</label>' +
                    '</div>' +
                '</div>' +
                '<a href="http://www.utc.edu.ec" target="_blank" class="btn btn-success btn-block m-r-15 m-t-10 m-b-10">Web UTC</a>' +
                '<a href="https://www.facebook.com/Ingeniería-En-Sistemas-UTC-La-Maná-385598668877914" target="_blank" class="btn btn-primary btn-block m-r-15 m-t-5 m-b-10 "><i class="feather icon-facebook"></i> Extensión La Mana </a>' +
                '<div class="text-center">' +
                    '<span class="text-center f-18 m-t-15 m-b-15 d-block">Elaborado por: </span>' +
                    '<a href="https://www.facebook.com/darwincs22/" target="_blank" class="btn text-white bg-facebook btn-icon m-b-20">' +
                        '<i class="feather icon-facebook"></i>' +
                    '</a>' +
                    '<a href="https://www.facebook.com/georginagabriela.suarezalvarado" target="_blank" class="btn text-white bg-twitter btn-icon m-l-20 m-b-20">' +
                        '<i class="feather icon-facebook"></i>' +
                    '</a>' +
                '</div>' +
            '</div>' +
        '</div>');

     }
     
    // alert("val"+retrievedObject);
     
    

    setTimeout(function() {
        $('.m-style-scroller').css({'height':'calc(100vh - 335px)','position':'relative'});
        var px = new PerfectScrollbar('.m-style-scroller', {
            wheelSpeed: .5,
            swipeEasing: 0,
            suppressScrollX: !0,
            wheelPropagation: 1,
            minScrollbarLength: 40,
        });
    }, 400);


    

    // =========================================================
    // ==================    Menu Customizer Start   ===========
    // =========================================================
    // open Menu Styler
    $('#styleSelector > .style-toggler').on('click', function() {
        $('#styleSelector').toggleClass('open');
        $('#styleSelector').removeClass('prebuild-open');
    });
    // layout types
    $('.layout-type > a').on('click', function() {
        var temp = $(this).attr('data-value');
        //alert(temp);
       
        $('.layout-type > a').removeClass('active');
        $('.pcoded-navbar').removeClassPrefix('navbar-image-');
        $(this).addClass('active');
        $('head').append('<link rel="stylesheet" class="layout-css" href="">');
        if (temp == "menu-dark") {
            var desing = { 'menudark': 'active', 'menulight': '', 'dark': '' };
            localStorage.setItem('desing',JSON.stringify(desing));
            var style = "menu-dark";
            localStorage.setItem('style',style);
            $('.pcoded-navbar').removeClassPrefix('menu-');
            $('.pcoded-navbar').removeClass('navbar-dark');

        }
        if (temp == "menu-light") {
            var desing = { 'menudark': '', 'menulight': 'active', 'dark': '' };
            localStorage.setItem('desing',JSON.stringify(desing));
            var style = "menu-light";
            localStorage.setItem('style',style);
            $('.pcoded-navbar').removeClassPrefix('menu-');
            $('.pcoded-navbar').removeClass('navbar-dark');
            $('.pcoded-navbar').addClass(temp);
        }
        if (temp == "reset") {

            var desing = { 'menudark': '', 'menulight': 'active', 'dark': '' };
            localStorage.setItem('desing',JSON.stringify(desing));
            var style = "menu-light";
            localStorage.setItem('style',style);
            var backgroundClass = "background-blue"
            localStorage.setItem('backgroundClass',backgroundClass);
            var backgroundBanner = { 'blue': 'active', 'red': '','purple':'', 'green': '','dark':'','info':'','bg_blue': '', 'bg_red': '','bg_purple':'', 'bg_green': '','bg_dark':'','bg_info':'','img_blue': '', 'img_red': '','img_purple':'', 'img_green': '','img_dark':'','img_info':'' };
            localStorage.setItem('backgroundBanner',JSON.stringify(backgroundBanner));


            location.reload();
        }
        if (temp == "dark") {
            var desing = { 'menudark': '', 'menulight': '', 'dark': 'active' };
            localStorage.setItem('desing',JSON.stringify(desing));
            var style = "dark";
            localStorage.setItem('style',style);
            $('.pcoded-navbar').removeClassPrefix('menu-');
            $('.pcoded-navbar').addClass('navbar-dark');
            $('.layout-css').attr("href", "assets/css/layout-dark.css");
        } else {
            $('.layout-css').attr("href", "");
        }
    });
    // background Color
    $('.background-color.flat > a').on('click', function() {
        var temp = $(this).attr('data-value');
        switch(temp){
            case 'background-blue':
            var backgroundClass = "background-blue"
            localStorage.setItem('backgroundClass',backgroundClass);
            var backgroundBanner = { 'blue': 'active', 'red': '','purple':'', 'green': '','dark':'','info':'','bg_blue': '', 'bg_red': '','bg_purple':'', 'bg_green': '','bg_dark':'','bg_info':'','img_blue': '', 'img_red': '','img_purple':'', 'img_green': '','img_dark':'','img_info':'' };
            localStorage.setItem('backgroundBanner',JSON.stringify(backgroundBanner));
             
            break;
            case 'background-red':
            var backgroundClass = "background-red"
            localStorage.setItem('backgroundClass',backgroundClass);
            var backgroundBanner = { 'blue': '', 'red': 'active','purple':'', 'green': '','dark':'','info':'','bg_blue': '', 'bg_red': '','bg_purple':'', 'bg_green': '','bg_dark':'','bg_info':'','img_blue': '', 'img_red': '','img_purple':'', 'img_green': '','img_dark':'','img_info':'' };
            localStorage.setItem('backgroundBanner',JSON.stringify(backgroundBanner));
            
            break;
            case 'background-purple':
            var backgroundClass = "background-purple"
            localStorage.setItem('backgroundClass',backgroundClass);
            var backgroundBanner = { 'blue': '', 'red': '','purple':'active', 'green': '','dark':'','info':'','bg_blue': '', 'bg_red': '','bg_purple':'', 'bg_green': '','bg_dark':'','bg_info':'','img_blue': '', 'img_red': '','img_purple':'', 'img_green': '','img_dark':'','img_info':'' };
            localStorage.setItem('backgroundBanner',JSON.stringify(backgroundBanner));
             
            break;
            case 'background-info':
            var backgroundClass = "background-info"
            localStorage.setItem('backgroundClass',backgroundClass);
            var backgroundBanner = { 'blue': '', 'red': '','purple':'', 'green': '','dark':'','info':'active','bg_blue': '', 'bg_red': '','bg_purple':'', 'bg_green': '','bg_dark':'','bg_info':'','img_blue': '', 'img_red': '','img_purple':'', 'img_green': '','img_dark':'','img_info':'' };
            localStorage.setItem('backgroundBanner',JSON.stringify(backgroundBanner));
            
            break;
            case 'background-green':
            var backgroundClass = "background-green"
            localStorage.setItem('backgroundClass',backgroundClass);
            var backgroundBanner = { 'blue': '', 'red': '','purple':'', 'green': 'active','dark':'','info':'','bg_blue': '', 'bg_red': '','bg_purple':'', 'bg_green': '','bg_dark':'','bg_info':'','img_blue': '', 'img_red': '','img_purple':'', 'img_green': '','img_dark':'','img_info':'' };
            localStorage.setItem('backgroundBanner',JSON.stringify(backgroundBanner));
           
            break;
            case 'background-dark':
            var backgroundClass = "background-dark"
            localStorage.setItem('backgroundClass',backgroundClass);
            var backgroundBanner = { 'blue': '', 'red': '','purple':'', 'green': '','dark':'active','info':'','bg_blue': '', 'bg_red': '','bg_purple':'', 'bg_green': '','bg_dark':'','bg_info':'','img_blue': '', 'img_red': '','img_purple':'', 'img_green': '','img_dark':'','img_info':'' };
            localStorage.setItem('backgroundBanner',JSON.stringify(backgroundBanner));
            
            break;
            default:
        }
       
        $('.background-color > a').removeClass('active');
        $('.pcoded-header').removeClassPrefix('brand-');
        $(this).addClass('active');
        if (temp == "background-default") {
            $('.pcoded-header').removeClassPrefix('header-');
        } else {
            $('.pcoded-header').removeClassPrefix('header-');
            $('.pcoded-header').addClass('header-'+ temp.slice(11, temp.length));
            $('body').removeClassPrefix('background-');
            $('body').addClass('background-'+ temp.slice(11, temp.length));
        }
    });
    // background Color outher
    $('.background-color.gradient > a').on('click', function() {
        var temp = $(this).attr('data-value');
        
        switch(temp){
            case 'background-grd-blue':
            var backgroundClass = "background-grd-blue"
            localStorage.setItem('backgroundClass',backgroundClass);
            var backgroundBanner = { 'blue': '', 'red': '','purple':'', 'green': '','dark':'','info':'','bg_blue': 'active', 'bg_red': '','bg_purple':'', 'bg_green': '','bg_dark':'','bg_info':'','img_blue': '', 'img_red': '','img_purple':'', 'img_green': '','img_dark':'','img_info':'' };
            localStorage.setItem('backgroundBanner',JSON.stringify(backgroundBanner));
             
            break;
            case 'background-grd-red':
            var backgroundClass = "background-grd-red"
            localStorage.setItem('backgroundClass',backgroundClass);
            var backgroundBanner = { 'blue': '', 'red': '','purple':'', 'green': '','dark':'','info':'','bg_blue': '', 'bg_red': 'active','bg_purple':'', 'bg_green': '','bg_dark':'','bg_info':'','img_blue': '', 'img_red': '','img_purple':'', 'img_green': '','img_dark':'','img_info':'' };
            localStorage.setItem('backgroundBanner',JSON.stringify(backgroundBanner));
            
            break;
            case 'background-grd-purple':
            var backgroundClass = "background-grd-purple"
            localStorage.setItem('backgroundClass',backgroundClass);
            var backgroundBanner = { 'blue': '', 'red': '','purple':'', 'green': '','dark':'','info':'','bg_blue': '', 'bg_red': '','bg_purple':'active', 'bg_green': '','bg_dark':'','bg_info':'','img_blue': '', 'img_red': '','img_purple':'', 'img_green': '','img_dark':'','img_info':'' };
            localStorage.setItem('backgroundBanner',JSON.stringify(backgroundBanner));
             
            break;
            case 'background-grd-info':
            var backgroundClass = "background-grd-info"
            localStorage.setItem('backgroundClass',backgroundClass);
            var backgroundBanner = { 'blue': '', 'red': '','purple':'', 'green': '','dark':'','info':'','bg_blue': '', 'bg_red': '','bg_purple':'', 'bg_green': '','bg_dark':'','bg_info':'active','img_blue': '', 'img_red': '','img_purple':'', 'img_green': '','img_dark':'','img_info':'' };
            localStorage.setItem('backgroundBanner',JSON.stringify(backgroundBanner));
            
            break;
            case 'background-grd-green':
            var backgroundClass = "background-grd-green"
            localStorage.setItem('backgroundClass',backgroundClass);
            var backgroundBanner = { 'blue': '', 'red': '','purple':'', 'green': '','dark':'','info':'','bg_blue': '', 'bg_red': '','bg_purple':'', 'bg_green': 'active','bg_dark':'','bg_info':'','img_blue': '', 'img_red': '','img_purple':'', 'img_green': '','img_dark':'','img_info':'' };
            localStorage.setItem('backgroundBanner',JSON.stringify(backgroundBanner));
           
            break;
            case 'background-grd-dark':
            var backgroundClass = "background-grd-dark"
            localStorage.setItem('backgroundClass',backgroundClass);
            var backgroundBanner = { 'blue': '', 'red': '','purple':'', 'green': '','dark':'','info':'','bg_blue': '', 'bg_red': '','bg_purple':'', 'bg_green': '','bg_dark':'active','bg_info':'','img_blue': '', 'img_red': '','img_purple':'', 'img_green': '','img_dark':'','img_info':'' };
            localStorage.setItem('backgroundBanner',JSON.stringify(backgroundBanner));
            
            break;
            default:
        }
        $('.background-color > a').removeClass('active');
        $('.pcoded-header').removeClassPrefix('brand-');
        $(this).addClass('active');
        if (temp == "background-default") {
        } else {
            $('body').removeClassPrefix('background-');
            $('body').addClass('background-'+ temp.slice(11, temp.length));
        }
    });
    // background Color outher
    $('.background-color.image > a').on('click', function() {
        var temp = $(this).attr('data-value');
         switch(temp){
            case 'background-img-1':
            var backgroundClass = "background-img-1"
            localStorage.setItem('backgroundClass',backgroundClass);
            var backgroundBanner = { 'blue': '', 'red': '','purple':'', 'green': '','dark':'','info':'','bg_blue': '', 'bg_red': '','bg_purple':'', 'bg_green': '','bg_dark':'','bg_info':'','img_blue': 'active', 'img_red': '','img_purple':'', 'img_green': '','img_dark':'','img_info':'' };
            localStorage.setItem('backgroundBanner',JSON.stringify(backgroundBanner));
             
            break;
            case 'background-img-2':
            var backgroundClass = "background-img-2"
            localStorage.setItem('backgroundClass',backgroundClass);
            var backgroundBanner = { 'blue': '', 'red': '','purple':'', 'green': '','dark':'','info':'','bg_blue': '', 'bg_red': '','bg_purple':'', 'bg_green': '','bg_dark':'','bg_info':'','img_blue': '', 'img_red': 'active','img_purple':'', 'img_green': '','img_dark':'','img_info':'' };
            localStorage.setItem('backgroundBanner',JSON.stringify(backgroundBanner));
            
            break;
            case 'background-img-3':
            var backgroundClass = "background-img-3"
            localStorage.setItem('backgroundClass',backgroundClass);
            var backgroundBanner = { 'blue': '', 'red': '','purple':'', 'green': '','dark':'','info':'','bg_blue': '', 'bg_red': '','bg_purple':'', 'bg_green': '','bg_dark':'','bg_info':'','img_blue': '', 'img_red': '','img_purple':'active', 'img_green': '','img_dark':'','img_info':'' };
            localStorage.setItem('backgroundBanner',JSON.stringify(backgroundBanner));
             
            break;
            case 'background-img-4':
            var backgroundClass = "background-img-4"
            localStorage.setItem('backgroundClass',backgroundClass);
            var backgroundBanner = { 'blue': '', 'red': '','purple':'', 'green': '','dark':'','info':'','bg_blue': '', 'bg_red': '','bg_purple':'', 'bg_green': '','bg_dark':'','bg_info':'','img_blue': '', 'img_red': '','img_purple':'', 'img_green': 'active','img_dark':'','img_info':'' };
            localStorage.setItem('backgroundBanner',JSON.stringify(backgroundBanner));
            
            break;
            case 'background-img-5':
            var backgroundClass = "background-img-5"
            localStorage.setItem('backgroundClass',backgroundClass);
            var backgroundBanner = { 'blue': '', 'red': '','purple':'', 'green': '','dark':'','info':'','bg_blue': '', 'bg_red': '','bg_purple':'', 'bg_green': '','bg_dark':'','bg_info':'','img_blue': '', 'img_red': '','img_purple':'', 'img_green': '','img_dark':'active','img_info':'' };
            localStorage.setItem('backgroundBanner',JSON.stringify(backgroundBanner));
           
            break;
            case 'background-img-6':
            var backgroundClass = "background-img-6"
            localStorage.setItem('backgroundClass',backgroundClass);
            var backgroundBanner = { 'blue': '', 'red': '','purple':'', 'green': '','dark':'','info':'','bg_blue': '', 'bg_red': '','bg_purple':'', 'bg_green': '','bg_dark':'','bg_info':'','img_blue': '', 'img_red': '','img_purple':'', 'img_green': '','img_dark':'','img_info':'active' };
            localStorage.setItem('backgroundBanner',JSON.stringify(backgroundBanner));
            
            break;
            default:
        }

        $('.background-color > a').removeClass('active');
        $('.pcoded-header').removeClassPrefix('brand-');
        $(this).addClass('active');
        if (temp == "background-default") {
        } else {
            $('body').removeClassPrefix('background-');
            $('body').addClass('background-'+ temp.slice(11, temp.length));
        }
    });
    // rtl layouts
    $('#theme-rtl').change(function() {
        $('head').append('<link rel="stylesheet" class="rtl-css" href="">');
        if ($(this).is(":checked")) {
            $('.rtl-css').attr("href", "assets/css/layout-rtl.css");
        } else {
            $('.rtl-css').attr("href", "");
        }
    });
    // Menu Fixed
    $('#menu-fixed').change(function() {
        if ($(this).is(":checked")) {
            $('.pcoded-navbar').addClass('menupos-fixed');
            setTimeout(function() {
                // $(".navbar-content").css({'overflow':'visible','height':'calc(100% - 70px)'});
            }, 400);
        } else {
            $('.pcoded-navbar').removeClass('menupos-fixed');
        }
    });
    // Header Fixed
    $('#header-fixed').change(function() {
        if ($(this).is(":checked")) {
            $('.pcoded-header').addClass('headerpos-fixed');
        } else {
            $('.pcoded-header').removeClass('headerpos-fixed');
        }
    });
    // breadcumb sicky
    $('#breadcumb-layouts').change(function() {
        if ($(this).is(":checked")) {
            $('.page-header').addClass('breadcumb-sticky');
        } else {
            $('.page-header').removeClass('breadcumb-sticky');
        }
    });
    // Box layouts
    $('#box-layouts').change(function() {
        if ($(this).is(":checked")) {
            $('body').addClass('container');
            $('body').addClass('box-layout');
        } else {
            $('body').removeClass('container');
            $('body').removeClass('box-layout');
        }
    });
    $.fn.removeClassPrefix = function(prefix) {
        this.each(function(i, it) {
            var classes = it.className.split(" ").map(function(item) {
                return item.indexOf(prefix) === 0 ? "" : item;
            });
            it.className = classes.join(" ");
        });
        return this;
    };


     var temp = localStorage.getItem('style');
      
        if (temp == "menu-dark") {     
            $('.pcoded-navbar').removeClassPrefix('menu-');
            $('.pcoded-navbar').removeClass('navbar-dark');

        }
        if (temp == "menu-light") {
          
            $('.pcoded-navbar').removeClassPrefix('menu-');
            $('.pcoded-navbar').removeClass('navbar-dark');
            $('.pcoded-navbar').addClass(temp);
        }
        
        if (temp == "dark") {
            
            $('.pcoded-navbar').removeClassPrefix('menu-');
            $('.pcoded-navbar').addClass('navbar-dark');
            $('.layout-css').attr("href", "assets/css/layout-dark.css");
        } else {
            $('.layout-css').attr("href", "");
        }
    // ==================    Menu Customizer End   =============
    // =========================================================
});
