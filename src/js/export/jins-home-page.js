import JinsAccordion from '../components/jins-accordion';
document.addEventListener('DOMContentLoaded', () => {
  new JinsAccordion();

  const whyChooseUsCtrl = {
    init() {
      try {
        const swiperEl = document.querySelector('.why-choose-us__carousel .swiper');
        if( typeof Swiper === undefined ) {
          throw new Error('Swiper library have NOT registered!')
        }
        if( !swiperEl ) {
          throw new Error('Swiper element can NOT be found!');
        }
        new Swiper( swiperEl, {
          navigation: {
            nextEl: swiperEl.querySelector('.jins-swiper-nav-btn__next'),
            prevEl: swiperEl.querySelector('.jins-swiper-nav-btn__prev'),
          },
        });
      } catch (error) {
        console.warn('WHY CHOOSE US ERROR: ', error);
      }
    }
  };
  whyChooseUsCtrl.init();

  const latestNewsCtrl = {
    init() {
      try {
        if( typeof Swiper === 'undefined' ) throw new Error('Swiper library is NOT registered!');

        const swiperEl = document.querySelector('.latest-news__carousel .swiper');
        if( !swiperEl ) throw new Error( 'Swiper element can NOT be found!' );

        const swiper = new Swiper( swiperEl, {
          slidesPerView: 1,
          spaceBetween: 20,
          navigation: {
            prevEl: swiperEl.querySelector('.jins-swiper-nav-btn__prev'),
            nextEl: swiperEl.querySelector('.jins-swiper-nav-btn__next'),
          },
          breakpoints: {
            550: {
              slidesPerView: 2,
            },
            850: {
              slidesPerView: 3,
            },
          }
        } );
      } catch (error) {
        console.warn('LATEST NEWS SECTION ERROR: ', error);
      }
    }
  };
  latestNewsCtrl.init();
});