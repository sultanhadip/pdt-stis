$(document).ready(function() {
  // Inisialisasi Isotope
  var $grid = $('.portfolio-container').isotope({
    itemSelector: '.portfolio-item',
    layoutMode: 'fitRows'
  });

  // Filter galeri berdasarkan tahun ketika tombol di klik
  $('#portfolio-flters li').on('click', function() {
    var filterValue = $(this).attr('data-filter');
    $grid.isotope({ filter: filterValue });
  });

  // Tambahkan kelas 'active' ke tombol filter yang sedang dipilih
  $('#portfolio-flters li').on('click', function() {
    $(this).addClass('filter-active').siblings().removeClass('filter-active');
  });
});
  