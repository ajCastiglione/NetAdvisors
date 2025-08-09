export default function Slider( $ ) {
    const $sliderContainer = $( "[data-slider-container]" );
    if ( !$sliderContainer.length ) {
        return;
    }

    // Loop through each slider element
    $sliderContainer.each( function () {
        const $this = $( this );
        const $slider = $this.find( "[data-slider]" );
        const $prevButton = $this.find( "[data-slider-prev]" );
        const $nextButton = $this.find( "[data-slider-next]" );
        const slickOptions = {
            prevArrow: $prevButton,
            nextArrow: $nextButton,
            mobileFirst: true,
            infinite: true,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    },
                },
            ],
        };

        // Initialize the slider
        $slider.slick( slickOptions );
    } );
}
