<x-index>
        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <!-- <h2>Galeri</h2> -->
                    <p>Galeri Kegiatan PDT</p>
                </header>

                <!-- <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="portfolio-flters">
                  <li data-filter="*" class="filter-active"><option value="">All</option></li>
                  <li data-filter=".filter-app"><option value="">2021</option></li>
                  <li data-filter=".filter-card"><option value="">2022</option></li>
                  <li data-filter=".filter-web"><option value="">2023</option></li>
            </ul>
            </div>
          </div> -->
                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <div>
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Filter
                            </button>
                            <div style="margin-top: 20px;"></div>

                            <ul class="dropdown-menu" id="portfolio-flters">
                                <li class="dropdown-item" data-filter="*" class="filter-active">
                                    <option value="">All</option>
                                </li>
                                <li class="dropdown-item" data-filter=".filter-2021">
                                    <option value="">2021</option>
                                </li>
                                <li class="dropdown-item" data-filter=".filter-2022">
                                    <option value="">2022</option>
                                </li>
                                <li class="dropdown-item" data-filter=".filter-2023">
                                    <option value="">2023</option>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach($galleries as $gallery)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $gallery->tahun }}">
                        <div class="portfolio-wrap">
                            <img style="width: 100%; height:100%;" src="{{ asset('/storage/posts/'.$gallery->filename) }}">
                            <div class="portfolio-info">
                                <h4>{{ $gallery->title }}</h4>
                                <p>{{ $gallery->description }}</p>
                                <div class="portfolio-links">
                                    <a href="{{ asset('/storage/posts/'.$gallery->filename) }}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="{{ $gallery->title }}"><i class="bi bi-plus"></i></a>
                                    <!-- <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a> -->
                                </div>
                            </div> 
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- End Portfolio Section -->

        <!-- Vendor JS Files -->
        <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="assets/vendor/filter-gallery/filter-year.js"></script>

        <!-- Isotope JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>

        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>
</x-index>