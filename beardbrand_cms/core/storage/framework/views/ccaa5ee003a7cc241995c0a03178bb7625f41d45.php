<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="description" content="<?php echo $__env->yieldContent('meta-description'); ?>">
	<meta name="keywords" content="<?php echo $__env->yieldContent('meta-keywords'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	
    <title><?php echo e($setting->website_title); ?></title>

    <!-- favicon -->
	<link rel="shortcut icon" href="<?php echo e(asset('assets/kondangintech-landing/img/' . $commonsetting->fav_icon)); ?>" type="image/x-icon">
	<link href="assets/kondangintech-landing/img/apple-touch-icon.png" rel="apple-touch-icon">
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
	<style>
		/* Optional: Add custom styles for Swiper container, slides, and navigation buttons */
		.swiper-container {
		width: 100%;
		margin: auto;
		}

		.swiper-slide {
		text-align: center;
		box-sizing: border-box;
		}

		.swiper-button-next,
		.swiper-button-prev {
		color: white;
		}
	</style>
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="assets/kondangintech-landing/vendor/aos/aos.css" rel="stylesheet">
	<link href="assets/kondangintech-landing/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/kondangintech-landing/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="assets/kondangintech-landing/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="assets/kondangintech-landing/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="assets/kondangintech-landing/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
	<!-- Link ke Bootstrap Icons dan Font Awesome -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.15.0/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

	<!-- Template Main CSS File -->
	<link href="assets/kondangintech-landing/css/style.css" rel="stylesheet">

	<!-- =======================================================
	* Template Name: FlexStart
	* Updated: Sep 18 2023 with Bootstrap v5.3.2
	* Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
	* Author: BootstrapMade.com
	* License: https://bootstrapmade.com/license/
	======================================================== -->
	
	
	
</head>

<body <?php echo e(Session::has('notification') ? 'data-notification' : ''); ?> <?php if(Session::has('notification')): ?> data-notification-message='<?php echo e(json_encode(Session::get('notification'))); ?> <?php endif; ?>' >

    <!-- preloader area start -->
    <div class="preloader" id="preloader">
        <div class="loader loader-1">
            <div class="loader-outter"></div>
            <div class="loader-inner"></div>
        </div>
    </div>
    <!-- preloader area end -->

	<?php echo $__env->make('kondangintech-landing.components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


	<?php echo $__env->yieldContent('content'); ?>

	<?php echo $__env->make('kondangintech-landing.components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	

	<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

	<script>
	  // Fungsi untuk memilih secara acak antara dua nomor WhatsApp yang telah diberikan
	  function getRandomWhatsAppNumber() {
		  const numbers = ["6289679048560", "6285326413810"];
		  const randomIndex = Math.floor(Math.random() * numbers.length);
		  const messageText = "Halo Kondangin Tech! Saya tertarik dengan layanan Anda. Bisakah kita berbicara lebih lanjut?";
		  return `https://wa.me/${numbers[randomIndex]}?text=${encodeURIComponent(messageText)}`;
	  }
	  
	  // Mengatur href untuk tombol dengan nomor WhatsApp acak
	  document.getElementById('whatsappButton1').href = getRandomWhatsAppNumber();
	  document.getElementById('whatsappButton2').href = getRandomWhatsAppNumber();
	  </script>
  
	<!-- Vendor JS Files -->
	<script src="assets/kondangintech-landing/vendor/purecounter/purecounter_vanilla.js"></script>
	<script src="assets/kondangintech-landing/vendor/aos/aos.js"></script>
	<script src="assets/kondangintech-landing/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/kondangintech-landing/vendor/glightbox/js/glightbox.min.js"></script>
	<script src="assets/kondangintech-landing/vendor/isotope-layout/isotope.pkgd.min.js"></script>
	<script src="assets/kondangintech-landing/vendor/swiper/swiper-bundle.min.js"></script>
	<script src="assets/kondangintech-landing/vendor/php-email-form/validate.js"></script>
  
	<!-- Template Main JS File -->
	<script src="assets/kondangintech-landing/js/main.js"></script>
	<script>
	  document.addEventListener('DOMContentLoaded', function () {
		var mySwiper = new Swiper('.swiper-container', {
		  // Optional: Add additional Swiper options here
		  loop: true, // Enable loop mode
		  slidesPerView: 1, // Number of slides per view (change as needed)
		  spaceBetween: 10, // Space between each slide (change as needed)
		  navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		  },
		});
	  });
	</script>


 <?php if($commonsetting->is_tawk_to	== 1): ?>
	<?php echo $commonsetting->tawk_to; ?>

<?php endif; ?>


</body>

</html>
<?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/kondangintech-landing/layout.blade.php ENDPATH**/ ?>