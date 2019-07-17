
(function () {
    var base = $('.invest__amount-list');
    var tpl = base.find('.invest__amount:first');
    var cl =  tpl.clone();

    /*validation for input currencies */

    base.on('keyup change input click', '.invest__amount-input', function(e) {
        e.preventDefault();

        $(this).val(String($(this).val().replace(/[^0-9]/g,'')).replace(/\B(?=(\d{3})+(?!\d))/g, " "));

    });


    base.on('click', '.invest__amount-add', function(e) {
        e.preventDefault();
        $(this).siblings('.invest__amount-delete').addClass('active');
        $(this).removeClass('active');
        base.append(cl.clone());

        if ($(window).width() >= 1366) {
            //console.log('123');
            $('html, body').scrollTop($(document).height());
        }

    });

    base.on('click', '.invest__amount-delete', function(e) {
        e.preventDefault();
        $(this).closest('.invest__amount').remove();

    });

    base.on('click', '.js-count', function(e) {
        e.preventDefault();
        var listLength = $('.invest__amount').length;
        if(listLength === 1) {
            $('.invest__amount:first').find('.invest__amount-index').html('');
        } else {
            $('.invest__amount-list li').each(function(i) {
                $(this).find('.invest__amount-index').html('&#8194;' + (i + 1));
                $(this).find('.invest__amount-currency-input').attr('name', 'Cu'+ (i + 1)); //добавление поля формы для ввода валюты
                $(this).find('.invest__amount-input').attr('name', 'Am'+ (i + 1)); // добавление поля формы для ввода суммы
            });
        }

    });

    var currList = $('.invest__currencies-choose');
    var formInvest = $('.form__invest');
    var formInfo = $('.form__info');
    var footer = $('.footer');
    var clickedItem;

    base.on('click', '.invest__amount-currency', function(e) {
        e.preventDefault();
        currList.addClass('active');

        var cu_parent = $(this).parent().closest('.invest__amount');  // получение родительского элемента
        var cu_child = cu_parent.find('.invest__amount-currency-input'); // получение дочернего элемента (форма для отправки значения валюты)
        var cu_name = cu_child.attr('name'); // получение значения поля дочернего элемента

        $("#currency").scrollTop(0);

        formInvest.addClass('hide');
        formInfo.addClass('hide');
        footer.addClass('hide');
        clickedItem = $(this);

        $(".invest__currency").toggle(true);
        $("input[name=search-input]").val('');
        var htmlCurr = $(this).html();

        $("input[name=currency]:radio").each(function () {
            var inputItem = $(this);
            if(inputItem.val() === htmlCurr) {
                inputItem.prop('checked', true);
            }
        });

        addCurrency(clickedItem, cu_child);
    });

    /*Test*/

    function addCurrency(currElement, cu_child) {
        $('.ok').unbind('click').on('click', function(e) {
            e.preventDefault();
            var val = $('input[name=currency]:checked').val();
            currElement.html(val);
            cu_child.val(val);
            currList.removeClass('active');
            formInvest.removeClass('hide');
            formInfo.removeClass('hide');
            footer.removeClass('hide');
        });
    }

    $('.back').on('click', function(e) {
        e.preventDefault();
        currList.removeClass('active');
        formInvest.removeClass('hide');
        formInfo.removeClass('hide');
        footer.removeClass('hide');
    })


})();

/*list filter*/

(function () {
    $('#search').keyup(function (){
        var val=this.value;
        var re=new RegExp('^'+val,'i');

        $(".invest__currency").each(function() {
            var currItem = $(this);
            var label = currItem.find('label');
            var input = currItem.find("input[name='currency']");

            currItem.toggle(re.test(label.text()) || re.test(input.val()));

        });

    });

})();

/*currencies from json*/

$(function() {
    var num = {};
    var i = 1;
    var currencies_list = $('#currency');
    $.getJSON('./template/json/currencies.json', function (data) {
        num = data;
        $.each(data, function (key, val) {
            currencies_list.append('<div class="invest__currency"><input type="radio" name="currency" value="' + val + '" id="' + val + '"><label for="' + val + '" class=""><img src="./template/img/icons/icon'+ i +'.png" class="currency_icon">' +
                key + '</label></div>');

            i++;
        });
    });
}());

/*open rates list*/

$(function() {
    var title = $('.info__title');
    var rates = $('.info__rates');
    var currList = $('.invest__currencies-choose');

    title.on('click', function(e) {
        e.preventDefault();

        rates.toggleClass('active');
        title.toggleClass('open-list');
        currList.toggleClass('open-terms');
    })
}());

/*change language*/

(function(){ // функция смены картинок флагов и отправки наименования языка в форму

    // $('.header__change').css('background', '');

    // $('.header__language').css('background', 'url(../template/img/lang_'+ 'en' +'.png)');

    var accept_lang = $('.accept_lang').text(); //раскоментировать для возвращения смены языков
    console.log(accept_lang);
    $('.header__language').css('background', 'url(../template/img/lang_'+ accept_lang +'.png)');

    if (accept_lang == 'ru') {
         $('.header__change').css('background', 'url(../template/img/chang_'+ 'en' +'.png)');
        
         $('.lang_area').val('en');
         
    }
    
    if (accept_lang == 'en') {
         $('.header__change').css('background', 'url(../template/img/chang_'+ 'ru' +'.png)');
         
         $('.lang_area').val('ru');
         
    }



}());

(function(){
    var currentIcon = $('.header__language');
    var changeIcon = $('.header__change');

    currentIcon.on('click', function(e) {
        e.preventDefault();
        changeIcon.toggleClass('fade'); //раскоментировать для возвращения смены языков
    });

    $(document).bind( "mouseup touchend", function(e){
        var div = $("#language");
        if (!div.is(e.target)
            && div.has(e.target).length === 0) {
            //changeIcon.removeClass('fade');
        }
    });

    // changeIcon.on('click', function(e) {
    //     e.preventDefault();
    // });

}());

/*validation for info form*/

(function(){

    

    $('.invest__additional-date').on('keyup change input click', function(e) {
        e.preventDefault();

        this.value = this.value.replace(/[^0-9]/g, '');
    });

    /*phone*/

    $('.info__personal-field_phone').on('keyup change input click', function(e) {
        e.preventDefault();

        this.value = this.value.replace(/[^0-9\+]/g, '');
    });

    /*name*/

    $('.info__personal-field_name').on('keyup change input click', function(e) {
        e.preventDefault();

        this.value = this.value.replace(/[^a-zA-Zа-яА-Я -]/g,'');
    });

    /*mail*/

    $('.info__personal-field_mail').on('blur', function() {

        var email = $(this).val();

        if (email.length > 0
            && (email.match(/.+?\@.+/g) || []).length !== 1) {
            $(this).addClass('error');
        }


    });

}());

/*send form*/

(function(){

    var $form = $('.form');
    var $submit = $form.find('[type="submit"]');
    var error = $('.form__submit-error');

    $form.on('submit', function(e) {
        e.preventDefault();
        if ( validateForm() ) {
            error.addClass('active');
            return false;
        }

        $('.g-recaptcha').addClass('active');
        error.removeClass('active');

        $.ajax({
            url: 'Catcher.php',
            type: 'post',
            data: $form.serialize(),
            dataType: 'json',

            error: function (err) {
                console.log('error');
                 //console.log($form.serialize());

                 //grecaptcha.reset();
            },
            success: function (response) {
                if(response === true){//чистим форму, если всё ок

                    //console.log($form.serialize());
                    $form.find('input[type="text"],input[type="number"],input[type="email"],textarea').val('');
                    $form.find('input[name="risk"],input[name="liquidity"]').attr('checked', false);

                    $form.find('input[class="invest__amount-currency-input"]').val('USD'); // возвращение к дефолтному значению после успешной отпрвки формы
                    $form.find('.invest__amount-currency').html('USD'); // возвращение к дефолтному значению после успешной отпрвки формы

                    $('.form__submit-success').addClass('active');
                    $('.g-recaptcha').removeClass('active');    
                    grecaptcha.reset();              
                }
                console.log('success');
            }


        })
    });

    function validateForm() {

        var err = false;

        $form.find('input[name="info-name"]').each(function () {
            if ($(this).val() === '') {
                $(this).addClass('error');
                err = true;
            }
        });

        $form.find('input[name="amount-currency"]').each(function () {
            if ($(this).val() === '') {
               $(this).closest('.invest__amount').addClass('error');
                err = true;
            }
        });

        if ($('input[name="date-year"]').val() !== '' || $('input[name="date-month"]').val() !== '') {
            err = false;
        } else {
            $('.invest__additional-field-date').addClass('error');
            err = true;
        }

        if ($('input[name=risk]:checked').length === 0) {
            $('input[name=risk]').closest('.invest__additional-field').addClass('error');
            err = true;
        }

        if ($('input[name=liquidity]:checked').length === 0) {
            $('input[name=liquidity]').closest('.invest__additional-field').addClass('error');
            err = true;
        }

        $form.find('input[name="info-mail"]').each(function () {
            var email = $(this).val();

            if (email.length > 0
                && (email.match(/.+?\@.+/g) || []).length !== 1) {
                $(this).addClass('error');
                err = true;
            } else if($(this).val() === '') {
                $(this).addClass('error');
                err = true;
            }
        });


        return err;
    }

    $form.on('keyup change', '.error', function(){
        $(this).removeClass('error');
    });

})();

function go_submit(){

    var $form = $('.form');
    var $submit = $form.find('[type="submit"]');
    var error = $('.form__submit-error');

    //$form.on('submit', function(e) {
        //e.preventDefault();
        if ( validateForm() ) {
            error.addClass('active');
            return false;
        }

        $('.g-recaptcha').addClass('active');
        error.removeClass('active');

        $.ajax({
            url: 'Catcher.php',
            type: 'post',
            data: $form.serialize(),
            dataType: 'json',

            error: function (err) {
                console.log('error');
                 //console.log($form.serialize());

                 //grecaptcha.reset();
            },
            success: function (response) {
                if(response === true){//чистим форму, если всё ок

                    //console.log($form.serialize());
                    $form.find('input[type="text"],input[type="number"],input[type="email"],textarea').val('');
                    $form.find('input[name="risk"],input[name="liquidity"]').attr('checked', false);

                    $form.find('input[class="invest__amount-currency-input"]').val('USD'); // возвращение к дефолтному значению после успешной отпрвки формы
                    $form.find('.invest__amount-currency').html('USD'); // возвращение к дефолтному значению после успешной отпрвки формы

                    $('.form__submit-success').addClass('active');
                    $('.g-recaptcha').removeClass('active');    
                    grecaptcha.reset();              
                }
                console.log('success');
            }


        })
    //});

    function validateForm() {

        var err = false;

        $form.find('input[name="info-name"]').each(function () {
            if ($(this).val() === '') {
                $(this).addClass('error');
                err = true;
            }
        });

        $form.find('input[name="amount-currency"]').each(function () {
            if ($(this).val() === '') {
               $(this).closest('.invest__amount').addClass('error');
                err = true;
            }
        });

        if ($('input[name="date-year"]').val() !== '' || $('input[name="date-month"]').val() !== '') {
            err = false;
        } else {
            $('.invest__additional-field-date').addClass('error');
            err = true;
        }

        if ($('input[name=risk]:checked').length === 0) {
            $('input[name=risk]').closest('.invest__additional-field').addClass('error');
            err = true;
        }

        if ($('input[name=liquidity]:checked').length === 0) {
            $('input[name=liquidity]').closest('.invest__additional-field').addClass('error');
            err = true;
        }

        $form.find('input[name="info-mail"]').each(function () {
            var email = $(this).val();

            if (email.length > 0
                && (email.match(/.+?\@.+/g) || []).length !== 1) {
                $(this).addClass('error');
                err = true;
            } else if($(this).val() === '') {
                $(this).addClass('error');
                err = true;
            }
        });


        return err;
    }

    $form.on('keyup change', '.error', function(){
        $(this).removeClass('error');
    });

} 