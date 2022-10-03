$(function () {
    var owl = $('#grid-section'),
      owlOptions = {
        loop: true,
        margin: 20,
        nav: true,
        dots: false,
        touchDrag: false,
        mouseDrag: false,
        responsive: {
          0: {
            items: 1,
            touchDrag: true,
            mouseDrag: true,
          },
          600: {
            items: 3,
          },
          1000: {
            items: 3,
          },
        },
      }
  
    if ($(window).width() < 768) {
      var owlActive = owl.owlCarousel(owlOptions)
    } else {
      owl.addClass('off')
    }
  
    $(window).resize(function () {
      if ($(window).width() < 768) {
        if ($('.owl-carousel').hasClass('off')) {
          var owlActive = owl.owlCarousel(owlOptions)
          owl.removeClass('off')
        }
      } else {
        if (!$('.owl-carousel').hasClass('off')) {
          owl.addClass('off').trigger('destroy.owl.carousel')
          owl.find('.owl-stage-outer').children(':eq(0)').unwrap()
        }
      }
    })
  })

