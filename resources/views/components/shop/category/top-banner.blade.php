<!-- Category Top Banner -->
<div class="py-6 bg-img-cover bg-dark bg-overlay-gradient-dark position-relative overflow-hidden mb-4 bg-pos-center-center"
     style="">
    <div class="container position-relative z-index-20" data-aos="fade-right" data-aos-delay="300">
{{--        <nav aria-label="breadcrumb">--}}
{{--            <ol class="breadcrumb">--}}
{{--                <li class="breadcrumb-item breadcrumb-light"><a href="#">Home</a></li>--}}
{{--                <li class="breadcrumb-item breadcrumb-light"><a href="#">Activities</a></li>--}}
{{--                <li class="breadcrumb-item active breadcrumb-light" aria-current="page">Clothing</li>--}}
{{--            </ol>--}}
{{--        </nav>--}}
        <h1 class="fw-bold display-6 mb-4 text-white">{{ $category->name }}</h1>
        <div class="col-12 col-md-6">
            <p class="lead text-white mb-0">
                {{ $category->description }}
            </p>
        </div>
    </div>
</div>
<!-- Category Top Banner -->
