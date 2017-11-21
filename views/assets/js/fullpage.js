var $header_top = $('.header-top');
var $nav = $('nav');

// fullpage
$('#fullpage').fullpage({
  sectionSelector: '.vertical',
  navigation: true,
  slidesNavigation: true,
  controlArrows: false,
  anchors: ['firstSection', 'secondSection', 'thirdSection'],
  menu: '#menu',

  afterSlideLoad: function( anchorLink, index, slideAnchor, slideIndex) {
    if(anchorLink == 'fifthSection' && slideIndex == 1) {
      $.fn.fullpage.setAllowScrolling(false, 'up');
      $header_top.css('background', 'transparent');
      $nav.css('background', 'transparent');
      $(this).css('background', '#ff0000');
    }
  },
});
