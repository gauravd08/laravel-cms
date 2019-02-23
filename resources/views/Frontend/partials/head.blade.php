<meta name="title" content="<?= isset($meta_info['meta_title']) ? $meta_info['meta_title']  : $default_meta_info['default_meta_title']; ?>">
<meta name="description" content="<?= isset($meta_info['meta_description']) ? $meta_info['meta_description']  : $default_meta_info['default_meta_description']; ?>">
<meta name="keywords" content="<?= isset($meta_info['meta_keywords']) ? $meta_info['meta_keywords']  : $default_meta_info['default_meta_keyword']; ?>">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" href="assets/frontend/img/favicon.png" type="image/png">
<title><?= isset($title) ? $title . ' | Occupy'  : 'Occupy'; ?></title>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="/assets/frontend/css/bootstrap.css">
<link rel="stylesheet" href="/assets/frontend/vendors/linericon/style.css">
<link rel="stylesheet" href="/assets/frontend/css/font-awesome.min.css">
<link rel="stylesheet" href="/assets/frontend/vendors/owl-carousel/owl.carousel.min.css">
<link rel="stylesheet" href="/assets/frontend/vendors/lightbox/simpleLightbox.css">
<link rel="stylesheet" href="/assets/frontend/vendors/nice-select/css/nice-select.css">
<link rel="stylesheet" href="/assets/frontend/vendors/animate-css/animate.css">
<link rel="stylesheet" href="/assets/frontend/vendors/swiper/css/swiper.min.css">
<!-- main css -->
<link rel="stylesheet" href="/assets/frontend/css/style.css">
<link rel="stylesheet" href="/assets/frontend/css/responsive.css">

<!-- custom css -->
<link href="/assets/frontend/css/custom.css" rel="stylesheet" type="text/css"/>

@stack('styles')