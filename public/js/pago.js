$(function(){

    var cards = [{
        nome: "mastercard",
        colore: "#0061A8",
        src: "https://upload.wikimedia.org/wikipedia/commons/0/04/Mastercard-logo.png"
    }, {
        nome: "visa",
        colore: "#E2CB38",
        src: "https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/2000px-Visa_Inc._logo.svg.png"
    }, {
        nome: "americanExpress",
        colore: "#108168",
        src: "https://upload.wikimedia.org/wikipedia/commons/thumb/3/30/American_Express_logo.svg/600px-American_Express_logo.svg.png"
    }];

    var month = 0;
    var html = document.getElementsByTagName('html')[0];
    var number = "";

    var selected_card = -1;

    $(document).click(function(e){
        if(!$(e.target).is(".ccv") || !$(e.target).closest(".ccv").length){
            $(".card").css("transform", "rotatey(0deg)");
            $(".seccode").css("color", "var(--text-color)");
        }
        if(!$(e.target).is(".expire") || !$(e.target).closest(".expire").length){
            $(".date_value").css("color", "var(--text-color)");
        }
        if(!$(e.target).is(".number") || !$(e.target).closest(".number").length){
            $(".card_number").css("color", "var(--text-color)");
        }
        if(!$(e.target).is(".inputname") || !$(e.target).closest(".inputname").length){
            $(".fullname").css("color", "var(--text-color)");
        }
    });


    //Card number input
    $(".number").keyup(function(event){
        $(".card_number").text($(this).val());
        number = $(this).val();

        if(parseInt(number.substring(0, 2)) > 50 && parseInt(number.substring(0, 2)) < 56){
            selected_card = 0;
        }else if(parseInt(number.substring(0, 1)) == 4){
            selected_card = 1;
        }else if(parseInt(number.substring(0, 2)) == 36 || parseInt(number.substring(0, 2)) == 38 || parseInt(number.substring(0, 2)) == 39){
            selected_card = 2;
        }else if(parseInt(number.substring(0, 2)) == 34 || parseInt(number.substring(0, 2)) == 37){
            selected_card = 3;
        }else if(parseInt(number.substring(0, 2)) == 65){
            selected_card = 4;
        }else if(parseInt(number.substring(0, 4)) == 5019){
            selected_card = 5;
        }else{
            selected_card = -1;
        }

        if(selected_card != -1){
            html.setAttribute("style", "--card-color: " + cards[selected_card].colore);
            $(".bankid").attr("src", cards[selected_card].src).show();
        }else{
            html.setAttribute("style", "--card-color: #cecece");
            $(".bankid").attr("src", "").hide();
        }

        if($(".card_number").text().length === 0){
            $(".card_number").html("&#x25CF;&#x25CF;&#x25CF;&#x25CF; &#x25CF;&#x25CF;&#x25CF;&#x25CF; &#x25CF;&#x25CF;&#x25CF;&#x25CF; &#x25CF;&#x25CF;&#x25CF;&#x25CF;");
        }

    }).focus(function(){
        $(".card_number").css("color", "green");
    }).on("keydown input", function(){

        $(".card_number").text($(this).val());

        if(event.key >= 0 && event.key <= 9){
            if($(this).val().length === 4 || $(this).val().length === 9 || $(this).val().length === 14){
                $(this).val($(this).val() +  " ");
            }
        }
    })

    //Name Input
    $(".inputname").keyup(function(){
        $(".fullname").text($(this).val());
        if($(".inputname").val().length === 0){
            $(".fullname").text("NOMBRE COMPLETO");
        }
        return event.charCode;
    }).focus(function(){
        $(".fullname").css("color", "green");
    });

    //Security code Input
    $(".ccv").focus(function(){
        $(".card").css("transform", "rotatey(180deg)");
        $(".seccode").css("color", "green");
    }).keyup(function(){
        $(".seccode").text($(this).val());
        if($(this).val().length === 0){
            $(".seccode").html("&#x25CF;&#x25CF;&#x25CF;");
        }
    }).focusout(function() {
        $(".card").css("transform", "rotatey(0deg)");
        $(".seccode").css("color", "var(--text-color)");
    });


    //Date expire input
    $(".expire").keypress(function(event){
        if(event.charCode >= 48 && event.charCode <= 57){
            if($(this).val().length === 1){
                $(this).val($(this).val() + event.key + " / ");
            }else if($(this).val().length === 0){
                if(event.key == 1 || event.key == 0){
                    month = event.key;
                    return event.charCode;
                }else{
                    $(this).val(0 + event.key + " / ");
                }
            }else if($(this).val().length > 2 && $(this).val().length < 9){
                return event.charCode;
            }
        }
        return false;
    }).keyup(function(event){
        $(".date_value").html($(this).val());
        if(event.keyCode == 8 && $(".expire").val().length == 4){
            $(this).val(month);
        }

        if($(this).val().length === 0){
            $(".date_value").text("MM / YYYY");
        }
    }).keydown(function(){
        $(".date_value").html($(this).val());
    }).focus(function(){
        $(".date_value").css("color", "green");
    });
});

$('.input-cart-number').on('keyup change', function(){
    $t = $(this);

    if ($t.val().length > 3) {
        $t.next().focus();
    }

    var card_number = '';
    $('.input-cart-number').each(function(){
        card_number += $(this).val() + ' ';
        if ($(this).val().length == 4) {
            $(this).next().focus();
        }
    })

    $('.credit-card-box .number').html(card_number);
});

$('#card-holder').on('keyup change', function(){
    $t = $(this);
    $('.credit-card-box .card-holder div').html($t.val());
});

$('#card-holder').on('keyup change', function(){
    $t = $(this);
    $('.credit-card-box .card-holder div').html($t.val());
});

$('#card-expiration-month, #card-expiration-year').change(function(){
    m = $('#card-expiration-month option').index($('#card-expiration-month option:selected'));
    m = (m < 10) ? '0' + m : m;
    y = $('#card-expiration-year').val().substr(2,2);
    $('.card-expiration-date div').html(m + '/' + y);
})

$('#card-ccv').on('focus', function(){
    $('.credit-card-box').addClass('hover');
}).on('blur', function(){
    $('.credit-card-box').removeClass('hover');
}).on('keyup change', function(){
    $('.ccv div').html($(this).val());
});


/*--------------------
CodePen Tile Preview
--------------------*/
setTimeout(function(){
    $('#card-ccv').focus().delay(1000).queue(function(){
        $(this).blur().dequeue();
    });
}, 500);


