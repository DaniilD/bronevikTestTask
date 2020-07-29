$( document ).ready(function() {
    let home_phone_num = 1;
    let work_phone_num = 1;
    let mob_phone_num = 1;
    let email_num = 1;
    
    //клик по кнопке добавить домашний телефон
    $('#add_home').on("click", function($e) {
        console.log("click");
        var content = '<div class="ank__atr-line" id="home-phone-'+home_phone_num+'">'+
        '<input type="text" name="home_phone[]">'+
        '</div>';
        $('#home-phones').append(content);
        home_phone_num ++;
        
    });

    $('#del_home').on("click", function($e){
        console.log('#home-phone-'+home_phone_num);
        home_phone_num --;
        $('#home-phone-'+home_phone_num).remove();
       
    });

    $('#add_work').on('click', function($e){
        var content = '<div class="ank__atr-line" id="work-phone-'+work_phone_num+'">'+
        '<input type="text" name="work_phone[]">'+
        '</div>';
        $('#work-phones').append(content);
        work_phone_num++;
       
    });

    $('#del_work').on('click', function(e){
        console.log(work_phone_num);
        console.log('#work-phone-');
        work_phone_num--;
        $('#work-phone-'+work_phone_num).remove();
    });

    $('#add_mob').on('click', function(e){
        var content = '<div class="ank__atr-line" id = "mob-phone-'+mob_phone_num+'">'+
        '<input type="text" name="mobile_phone[]">'+
        '</div>';
        $('#mobile-phones').append(content);
        mob_phone_num++;
    });

    $("#del_mob").on('click', function(e){
        mob_phone_num--;
        $('#mob-phone-'+mob_phone_num).remove();
    });

    $('#add_email').on('click', function(e){
        var content = '<div class="ank__atr-line" id="email-'+email_num+'">'+
        '<input type="email" name="emails[]">'+
        '</div>';
        $('#emails').append(content);
        email_num ++;
    });

    $('#del_email').on('click', function(e){
        email_num--;
        $('#email-'+email_num).remove();
    });
  });