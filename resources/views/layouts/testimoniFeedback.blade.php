<div class="container" data-aos="fade-up">
    <header class="section-header">
        <h2>Testimonials</h2>
        <p>Apa kata mereka tentang kita?</p>
    </header>
        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
            <div class="swiper-wrapper">
            @foreach($testimoni_feedback as $testi)
            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  {{ $testi->testimoni }}
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                  <h3>{{ $testi->user->name }}</h3>
                  <h4>Designer</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->
            @endforeach
            </div>
        <div class="swiper-pagination"></div>
        </div>
</div>