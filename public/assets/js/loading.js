jQuery(document).ready(function($) {
    setTimeout(function(){
        $('.alert-dismissible').fadeOut(1000);
    }, 4000);
    // Set focus on the first input field; exclude the search form in top navbar
    $("form").not(".navbar-form").find("input").filter(":visible").first().focus();
});




//====== loading ========
$(window).load(function() {$(".loader").fadeOut("slow");})
StartFormLoading();
$(window).resize(function() {StartFormLoading();});

$(document).on( 'scroll', function(){$( ".scroll-top-wrapper" ).toggle('slow',$(window).scrollTop() > 100);});
$(document).ready(function(){
     //====== tooltip ========
    $('[data-toggle="tooltip"]').tooltip();  
     //====== flash ========
    $('div.alert').delay(5000).slideUp(300);
    $("#flash").slide(); 
    $("#flash_close").on('click',function(e){e.preventDefault(); $("#flash").slideToggle();});
    //====== scroll ========

    $('.scroll-top-wrapper').on('click', scrollToTop);
    //====== pulse ========
    for(var i=0; i<15; i++) {
      $("#callAction").animate({opacity: 0.2}, 1000, 'linear').animate({opacity: 1}, 1000, 'linear');
    } 
    //====== sidebar ========
    $('[data-toggle=offcanvas_sidebar/offcanvas_profile/offcanvas_login]').click(function() {
        $(this).toggleClass('visible-xs');
        $(this).toggleClass('visible-sm');
        $(this).find('i').toggleClass('fa-arrow-right fa-arrow-left/active');
        $('.main_wrap').toggleClass('active_sidebar/active_profile/active_login');
        $('#large-menu/2/3').toggleClass('hidden-xs').toggleClass('visible-xs');
        $('#large-menu/2/3').toggleClass('hidden-sm').toggleClass('visible-sm');
        // $('#small-menu').toggleClass('visible-xs').toggleClass('hidden-xs');
        // $('#small-menu').toggleClass('visible-sm').toggleClass('hidden-sm');
        $('#btnShow').toggle();
    });
    //====== search landing ========
        var search = {
            initialize: function() {
                this.form = $('#search_form');
                this.back = $('#back');
                this.registerEvents();
            },
            registerEvents: function() { 
                this.form.on('submit',this.handleMethod); 
                this.back.on('click',this.handleMethod2);
            },
            handleMethod:   function(e){ e.preventDefault();
                var error = 0;
                var formData = $(this).serialize(); 
                var formAction = $(this).attr('action'); 
                var formMethod = $(this).attr('method');         
                
                if(!search.validateName('street'))
                    {
                        document.getElementById('nameError').style.display = "block";
                        error++;
                    }
                if(error > 0){
                  return false;
                }
                $.ajax({
                    // dataType: 'json',
                    type  : formMethod,
                    url   : formAction,
                    data  : formData,                       
                    cache : false,
                    success : function(data) {
                        $('#search_form').hide();
                        $('#message').show();
                        $('#text').empty();
                        $('#users').empty();

                        $('#text').append(data.message);

                        $.each(data, function() {
                            var fullname = "<span class='text-center'>" + data.name + "</span>";
                            $('#users').append("<li><img style='width:100px' src='" + data.image +"'><br>"+ fullname +"</li>")
                            .addClass('img-responsive');
                        });
                    },
                    error : function() {}
                });
                return false;
            },
            handleMethod2:   function(e){ e.preventDefault();
                $('#search_form').show();
                $('#message').hide();
            },
            validateName: function(x){
              // Validation rule
              var rules = /[А-Яа-я -']$/;
              // Check input
              if(rules.test(document.getElementById(x).value)){
                document.getElementById(x).style.background ='#ccffcc';
                // Hide error prompt
                document.getElementById(x + 'Error').style.display = "none";
                return true;
              }else{
                document.getElementById(x).style.border ='solid 2px #e35152';
                // Show error prompt
                document.getElementById(x + 'Error').style.display = "block";
                return false;
              }
            }};
        search.initialize();    

      //====== registration ========
      $(".img-check").click(function(e){
          e.preventDefault();
          var user_type = $(this).attr('id');

          $( "#notForShop" ).toggle('slow',user_type != 'shop');
          $( "#forProfi" ).toggle('slow',user_type == 'profi');
          $( "#forShop" ).toggle('slow',user_type == 'shop');
          $( "#forOwner" ).toggle('slow',user_type == 'owner');

          $('.user_check').toggleClass("user_check");
          $(this).toggleClass("user_check");
      });

      $(".image-gender-check").click(function(e){
          e.preventDefault();
          $('.gender_check').toggleClass("gender_check");
          $(this).toggleClass("gender_check");
      });
      //====== profile ========
      $(".radio_button").click(function(e){$(this).toggleClass("gender_check");});
       //====== image preview ========
      $("#image").change(function(){readURL(this);});
      //====== category element ========
      $("#category_select").change(function(e) {
          e.preventDefault();
          var element_list = $('#element_select');
          element_list.empty();

          $.getJSON('selectCategory', { category_id: $(this).val() }, function(data){ 
            $.each(data, function(index, element) {
                element_list.append("<option value='"+element.id+"'>" + element.name + "</option>");
            });
          });
      });
      //====== display index ========
      $('.options a').on('click', function(e){
          e.preventDefault();
          $(this).toggleClass('active', $(this).hasClass('active'))
          $('#listdisplay').fadeOut(240, function(){
          $(this).toggleClass('thumbview', $(this).attr('id')=='thumbnails-list')
          $('#listdisplay').fadeIn(200);
        });
      });
  });


//==LOAD==
function StartFormLoading() {
    $('.progress').show();
    var getPercent = ($('.progress-wrap').data('progress-percent') / 100);
    var getProgressWrapWidth = $('.progress-wrap').width();
    var progressTotal = getPercent * getProgressWrapWidth;
    var animationLength = 2500;
    $('.progress-bar').stop().animate({left: progressTotal}, animationLength);
}
//==SCROLL==
function scrollToTop() {
    verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
    $('html, body').animate({scrollTop: $('body').offset().top}, 500, 'linear');
}
//==IMAGE PREVIEW==
function readURL(input) {
    if(input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image_upload_preview').attr('src', e.target.result);}
        reader.readAsDataURL(input.files[0]);
    }
}

//==================================================================================================
//==================================================================================================


//====== category element ========

//.append($("<option></option>").attr("value",key).text(value)); 
// switch(select_val){

//====== flash ========

// send data from input

// $(document).ready(function() {
//     $('#submit').on('submit', function (e) {
//         e.preventDefault();
//         var title = $('#title').val();
//         var body = $('#body').val();
//         var published_at = $('#published_at').val();
//         $.ajax({
//             type: "POST",
//             url: host + '/articles/create',
//             data: {title: title, body: body, published_at: published_at},
//             success: function( msg ) {
//                 $("#ajaxResponse").append("<div>"+msg+"</div>");
//             }
//         });
//     });
// });


// public function store(Requests\ArticleRequest $request)
//     {
//         $article = new Article($request->all());
//         Auth::user()->articles()->save($article);

//         $response = array(
//             'status' => 'success',
//             'msg' => 'Setting created successfully',
//         );
//         return \Response::json($response);
//     }

//====== scroll ========

// $(function() {
//   $('a[href*=#]:not([href=#])').click(function() {
//     if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
//       var target = $(this.hash);
//       target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
//       if (target.length) {
//         $('html,body').animate({
//           scrollTop: target.offset().top
//         }, 1000);
//         return false;
//       }
//     }
//   });
// });

//====== tooltip ========

// <a data-toggle="tooltip"  data-html="true" data-placement="bottom" 
// title="{{ trans('sovpal.profile.OwnerSettingHelp') }}" 
// class="mytooltip size10 red_c text-center">
// <i class="fa fa-question-circle"></i></a>