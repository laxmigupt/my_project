// Namespace.
var pressbookNews = pressbookNews || {};

( function() {
	'use strict';

	if ( 'undefined' !== document.dir ) {
		pressbookNews.direction = document.dir
	} else {
		pressbookNews.direction = document.getElementsByTagName( 'html' )[0].getAttribute( 'dir' );
	}

	if ( ( 'rtl' !== pressbookNews.direction ) && ( 'ltr' !== pressbookNews.direction ) ) {
		pressbookNews.direction = 'ltr';
	}

	if ( ( typeof Glide !== 'undefined' ) && ( typeof pressbookCarousel !== 'undefined' ) ) {
		[].forEach.call( document.querySelectorAll( '.header-carousel-posts' ), function( el ) {
			new Glide( el, {
				type: 'carousel',
				gap: 12,
				autoplay: ( pressbookCarousel.header.autoplay ? 4800 : false ),
				animationDuration: 1600,
				direction: pressbookNews.direction,
				perView: pressbookCarousel.header.perView.xlg,
				breakpoints: {
					1024: {
						perView: pressbookCarousel.header.perView.lg
					},
					768: {
						perView: pressbookCarousel.header.perView.md
					},
					575: {
						perView: pressbookCarousel.header.perView.sm
					},
					349: {
						perView: pressbookCarousel.header.perView.xs
					}
				}
			} ).mount();
		} );

		[].forEach.call( document.querySelectorAll( '.footer-carousel-posts' ), function( el ) {
			new Glide( el, {
				type: 'carousel',
				gap: 12,
				autoplay: ( pressbookCarousel.footer.autoplay ? 4800 : false ),
				animationDuration: 1600,
				direction: pressbookNews.direction,
				perView: pressbookCarousel.footer.perView.xlg,
				breakpoints: {
					1024: {
						perView: pressbookCarousel.footer.perView.lg
					},
					768: {
						perView: pressbookCarousel.footer.perView.md
					},
					575: {
						perView: pressbookCarousel.footer.perView.sm
					},
					349: {
						perView: pressbookCarousel.footer.perView.xs
					}
				}
			} ).mount();
		} );

		[].forEach.call( document.querySelectorAll( '.carousel-related-posts' ), function( el ) {
			new Glide( el, {
				type: 'carousel',
				gap: 8,
				autoplay: ( pressbookCarousel.related.autoplay ? 4200 : false ),
				animationDuration: 1400,
				direction: pressbookNews.direction,
				perView: pressbookCarousel.related.perView.xlg,
				breakpoints: {
					1024: {
						perView: pressbookCarousel.related.perView.lg
					},
					768: {
						perView: pressbookCarousel.related.perView.md
					},
					575: {
						perView: pressbookCarousel.related.perView.sm
					},
					349: {
						perView: pressbookCarousel.related.perView.xs
					}
				}
			} ).mount();
		} );
	}

} )();
