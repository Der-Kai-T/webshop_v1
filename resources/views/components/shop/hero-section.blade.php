<!-- / Hero Section -->
<section class="vh-100 position-relative bg-overlay-dark ">
    <div class="container d-flex h-100 justify-content-center align-items-center position-relative z-index-10">
        <div
            class="d-flex justify-content-center align-items-center h-100 position-relative z-index-10 text-white">
            <div>
                <h1 class="display-1 fw-bold px-2 px-md-5 text-center mx-auto col-lg-8 mt-md-0"
                    data-aos="fade-up" data-aos-delay="1000">Herzlich Willkommen im {{ config("app.name") }}</h1>
                <div data-aos="fade-in" data-aos-delay="2000">
                    <div class="d-md-flex justify-content-center mt-4 mb-3 my-md-5">
                        <a href="/item"
                           class="btn btn-skew-left btn-orange btn-orange-chunky text-white mx-1 w-100 w-md-auto mb-2 mb-md-0"><span>Alle Produkte <i
                                    class="ri-arrow-right-line align-middle fw-bold"></i></span></a>

                    </div>
                    <i class="ri-mouse-line d-block text-center animation-float ri-2x transition-all opacity-50-hover text-white"
                       data-pixr-scrollto data-target=".brand-section" data-aos="fade-up"
                       data-aos-delay="700"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="position-absolute z-index-1 top-0 bottom-0 start-0 end-0">
        <!-- Swiper Info -->
        <div class="swiper-container overflow-hidden bg-light w-100 h-100"
             data-swiper
             data-options='{
                    "slidesPerView": 1,
                    "speed": 1500,
                    "loop": true,
                    "effect": "fade",
                    "autoplay": {
                      "delay": 5000
                    }
                  }'>
            <div class="swiper-wrapper">
                {{-- <x-shop.hero.swiper-content/>--}}

            </div>

        </div>
        <!-- / Swiper Info-->
    </div>
</section>
<!--/ Hero Section-->
