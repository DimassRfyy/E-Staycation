// Need flickity and jquery

// CSS
// <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

// JavaScript cdn
// <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
// <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

$('.main-carousel').flickity({
    // options
    cellAlign: 'left',
    contain: true,
    pageDots: false,
    prevNextButtons: false
});