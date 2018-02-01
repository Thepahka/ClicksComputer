var $header_top = $('.header-top');
var $nav = $('nav');

// fullpage
$('#fullpage').fullpage({
  sectionSelector: '.vertical',
  navigation: true,
  slidesNavigation: true,
  controlArrows: false,
  menu: '#menu',

  afterSlideLoad: function( anchorLink,index,slideIndex) {
      $.fn.fullpage.setAllowScrolling(false, 'up');
  },
});
