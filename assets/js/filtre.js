$(document).ready(function () {

    var $container = $('#second-row');
    /*$container.isotope({itemSelector : 'div'});*/

    $("#filter-All").click(function() { 
        $container.isotope({ filter: '.All' });
        $("*[id^='filter']").removeClass('active');
        $("#filter-All").addClass('active');
    });
    $("#filter-Couture").click(function() {  
        $container.isotope({ filter: '.Couture' });
        $("*[id^='filter']").removeClass('active');
        $("#filter-Couture").addClass('active');
    });
    $("#filter-Info").click(function() {  
        $container.isotope({ filter: '.Informatique' });
        $("*[id^='filter']").removeClass('active');
        $("#filter-Info").addClass('active');
    });
    $("#filter-Electro").click(function() {  
        $container.isotope({ filter: '.Electronique' });
        $("*[id^='filter']").removeClass('active');
        $("#filter-Electro").addClass('active');
    });
    $("#filter-Bois").click(function() {  
        $container.isotope({ filter: '.Bois' });
        $("*[id^='filter']").removeClass('active');
        $("#filter-Bois").addClass('active');
    });
    $("#filter-Velo").click(function() {  
        $container.isotope({ filter: '.Vélo-mécanique' });
        $("*[id^='filter']").removeClass('active');
        $("#filter-Velo").addClass('active');
    });
    $("#filter-Divers").click(function() {  
        $container.isotope({ filter: '.Divers' });
        $("*[id^='filter']").removeClass('active');
        $("#filter-Divers").addClass('active');
    });
});