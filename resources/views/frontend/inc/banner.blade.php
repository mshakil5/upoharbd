<section class="slider mb-3">
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            {{-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button> --}}
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/banner/banner.jpg')}}" class="d-block w-100"
                    alt="{{ asset('images/banner/banner.jpg')}}">
            </div>
            {{-- <div class="carousel-item">
                <img src="{{ asset('images/banner/banner_pm.jpg')}}" class="d-block w-100"
                    alt="{{ asset('images/banner/banner_pm.jpg')}}">
            </div> --}}
            <div class="carousel-item">
                <img src="{{ asset('images/banner/risk-reduction.jpg')}}" class="d-block w-100"
                    alt="{{ asset('images/banner/risk-reduction.jpg')}}">
            </div>
        </div>
    </div>
</section>