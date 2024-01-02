<!-- user/dashboard.blade.php -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<x-app-layout class="pl-6 pr-6 pb-10">
  <div class="swiper-container my-6" style="width: 130%;">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <img src="https://images.pexels.com/photos/2529157/pexels-photo-2529157.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Slide 1" class="w-full h-96 object-cover rounded-md shadow-lg">
      </div>
      <div class="swiper-slide">
        <img src="https://images.unsplash.com/photo-1460353581641-37baddab0fa2?q=80&w=2942&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Slide 2" class="w-full h-96 object-cover rounded-md shadow-lg">
      </div>
      <div class="swiper-slide">
        <img src="https://images.pexels.com/photos/9252069/pexels-photo-9252069.png?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Slide 3" class="w-full h-96 object-cover rounded-md shadow-lg">
      </div>
      <div class="swiper-slide">
        <img src="https://images.pexels.com/photos/2385477/pexels-photo-2385477.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Slide 4" class="w-full h-96 object-cover rounded-md shadow-lg">
      </div>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
  </div>

  <!-- Display all products -->
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-8 pl-6">
    @foreach($allProducts as $product)
      <div class="bg-white rounded-lg shadow-md p-6">
        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-40 object-cover mb-4">
        <h2 class="text-xl font-semibold">{{ $product->name }}</h2>
        <p class="text-gray-600 text-sm mb-2">{{ $product->description }}</p>
        <p class="text-gray-800 font-semibold">${{ $product->price }}</p>
      </div>
    @endforeach
  </div>
  <footer class="bg-gray-900 text-white py-4 text-center mt-6">
    <p>&copy; 2022 FootFashion. All rights reserved.</p>
</footer>
</x-app-layout>

<script>
  var swiper = new Swiper('.swiper-container', {
    slidesPerView: 1,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    loop: true, // Enable looping
    effect: 'fade', // Apply fade effect
    autoplay: {
      delay: 4000, // Set autoplay delay
      disableOnInteraction: false,
    },
  });
</script>
