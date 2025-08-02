<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Gallery - Integrated Cleaning Services</title>
<link rel="stylesheet" href="css/styles.css" />
<style>
 .gallery-section {
  padding: 40px 20px;
  text-align: center;
}

.gallery-section h1 {
  font-size: 24px;
  margin-bottom: 10px;
  
}

.gallery-section p {
  font-size: 16px;
  color: #555;
  margin-bottom: 30px;
}

.gallery-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 20px;
  max-width: 1200px;
  margin: auto;
}

.gallery-grid img {
  width: 100%;
  height: 200px;
  object-fit: cover;
  border-radius: 10px;
  transition: transform 0.3s ease;
}

.gallery-grid img:hover {
  transform: scale(1.05);
}

</style>
</head>
<body>



<?php $__env->startSection('title', 'Integrated Cleaning Services'); ?>

<?php $__env->startSection('content'); ?>

<section class="gallery-container">
  <h1 class="">Gallery</h1>
  <p>Explore images from our various cleaning projects and services.</p>

  <div class="gallery-grid">
    <img src="img/gallery1.webp" alt="Home Cleaning" />
    <img src="img/gallery2.jpeg" alt="Car Cleaning" />
    <img src="img/gallery3.jpeg" alt="Cleaning Team at Work" />
    <img src="img/gallery4.jpeg" alt="Office Cleaning" />
    <img src="img/gallery5.jpg" alt="Advanced Cleaning Equipment" />
    <img src="img/gallery6.jpeg" alt="Mosque Cleaning" />
    <img src="img/gallery7.jpeg" alt="Home Cleaning" />
    <img src="img/gallery8.jpeg" alt="Car Cleaning" />
    <img src="img/gallery9.webp" alt="Cleaning Team at Work" />
    <img src="img/gallery10.jpeg" alt="Office Cleaning" />
    <img src="img/gallery11.jpeg" alt="Advanced Cleaning Equipment" />
    <img src="img/gallery12.jpeg" alt="Mosque Cleaning" />
  </div>
</section>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Moon A\magic-clean\resources\views/magic/gallery.blade.php ENDPATH**/ ?>