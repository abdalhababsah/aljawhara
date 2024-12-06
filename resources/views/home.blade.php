<!-- resources/views/welcome.blade.php -->

@extends('layouts.mainlayout')

@section('content')
<style>
    /* Your existing styles */
    .video-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1000000;
        /* Ensure it's behind other elements */
        background: rgba(0, 0, 0, 0.5);
        /* Optional: Add a semi-transparent overlay */
    }

    .background-video {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .center-button {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        z-index: 1;
        /* Ensure the button is above the video */
    }

    .center-button .btn {
        font-size: 20px;
        padding: 15px 30px;
        background-color: rgba(0, 123, 255, 0.7);
        color: white;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .center-button .btn:hover {
        background-color: rgba(0, 123, 255, 1);
    }

    /* Optional: Hide the video section after clicking 'Explore Products' */
    #exploreButtonLink {
        cursor: pointer;
    }

    /* Remove this CSS as it’s not needed anymore
        #exploreButtonLink.clicked ~ #videoSection {
            display: none;
        }
        */

    /* Existing Styles */
    body {
        background: #f9f9f9;
    }

    @media (min-width: 990px) {
        .card-container {
            margin-left: 70px;
        }
    }

    .modal-footer {
        background-color: transparent !important;
        /* Correctly removes background color */
        margin-bottom: 20px !important;
        /* Adds desired bottom margin */
        z-index: 1232434;
        align-content: center;
        justify-content: center;
    }

    .card-container {
        display: flex;
        flex-wrap: wrap;
        margin-left: 50px;
        justify-content: center;
        gap: 20px;
        margin-top: 20px;
    }

    .card-wrapper {
        animation: fadeInUp 0.7s ease-in-out;
        opacity: 0;
        transform: translateY(20px);
        animation-fill-mode: forwards;
        display: flex;
        justify-content: center;
    }

    .about-product {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .card-wrapper:nth-child(1) {
        animation-delay: 0.2s;
    }

    .card-wrapper:nth-child(2) {
        animation-delay: 0.4s;
    }

    .card-wrapper:nth-child(3) {
        animation-delay: 0.6s;
    }

    .card {
        width: 270px;
        /* Fixed width */
        height: 420px !important;
        /* Fixed height */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        /* Ensures elements inside the card are spaced out */
    }

    .card:hover {
        transform: scale(1.1);
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .about-product img {
        transition: transform 0.3s ease;
    }

    .about-product img:hover {
        transform: scale(1.1);
    }

    .stats .p-price span {
        font-size: 1rem;
    }

    /* Add background images */
    body::before,
    body::after {
        content: '';
        position: fixed;
        top: 0;
        bottom: 0;
        width: 300px;
        background-size: contain;
        background-repeat: no-repeat;
        z-index: -1;
    }

    body::before {
        left: 0;
        background-image: url('{{ asset('assets/img/logos/oie_fXyK907rosgH.png') }}');
    }

    body::after {
        right: 0;
        background-image: url('{{ asset('assets/img/logos/oie_YrADZi7JgKBu.png') }}');
    }

    /* Adjust for smaller screens */
    @media (max-width: 768px) {
        body::before {
            top: 93px;
            /* Add 20px margin at the top */
        }

        body::after {
            width: 150px;
            /* Reduce right image width for tablets */
        }
    }

    /* Slider Modal Styles */
    .custom-product-slider-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1050;
        overflow: hidden;
    }

    .custom-slider-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
    }

    .custom-slider-content {
        position: relative;
        width: 90%;
        max-width: 600px;
        height: 90%;
        max-height: 800px;
        margin: 5% auto;
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        z-index: 1051;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .custom-slider-close-btn {
        position: absolute;
        top: 10px;
        right: 20px;
        font-size: 2rem;
        background: none;
        border: none;
        color: #333;
        cursor: pointer;
        z-index: 1052;
    }

    /* Flipbook Styles */
    .custom-flipbook {
        width: 100%;
        height: 100%;
        position: relative;
        overflow: hidden;
    }

    .custom-flipbook .custom-page {
        width: 100%;
        height: 100%;
        position: relative;
        overflow: hidden;
        background-color: #fff;
        /* Ensure page background is white */
    }

    /* Style the back side of pages during flip */
    .custom-flipbook .custom-page.turn-page {
        background-color: #fff !important;
    }

    .custom-flipbook .p-temporal {
        background-color: #fff !important;
    }

    .custom-flipbook .custom-page {
        background-color: #fff !important;
    }

    .custom-product-details {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        width: 90%;
        max-width: 500px;
        height: auto;
    }

    .custom-product-details * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .custom-product-details img {
        width: 100%;
        max-width: 300px;
        height: auto;
        margin-bottom: 10px;
    }

    .custom-product-name {
        font-size: 1.2rem;
        color: #333;
        margin-top: 10px;
    }

    .custom-product-description {
        font-size: 0.9rem;
        color: #666;
        margin-top: 10px;
    }

    .custom-product-price {
        font-size: 1rem;
        color: #28a745;
        font-weight: bold;
        margin-top: 10px;
    }

    /* Modal Footer Styles */
    .modal-footer {
        position: absolute;
        bottom: 10px;
        width: 100%;
        text-align: center;
        padding: 10px 0;
        background: rgba(255, 255, 255, 0.8);
    }

    .swipe-indicator {
        font-size: 1rem;
        color: #333;
    }

    .swipe-indicator i {
        margin: 0 5px;
        color: #28a745;
        /* Optional: Color the arrows */
    }

    .about-product img {
        transition: transform 1.5s ease;
        /* Smooth transition for hover */
        animation: zoomIn 1.5s ease forwards;
        /* Animation on render */
    }

    /* Keyframes for zoom-in effect */
    @keyframes zoomIn {
        from {
            transform: scale(1);
            /* Initial size */
        }

        to {
            transform: scale(1.05);
            /* Slight zoom (5%) */
        }
    }

    /* Adjust footer styles for smaller screens */
    @media (max-width: 767px) {
        .swipe-indicator {
            font-size: 0.9rem;
        }
    }

    @media (min-width: 768px) and (max-width: 991px) {
        .swipe-indicator {
            font-size: 1rem;
        }
    }

    @media (min-width: 992px) {
        .swipe-indicator {
            font-size: 1.1rem;
        }
    }
    /* Fullscreen modal for mobile and tablet */

</style>
    <div class="container-fluid py-4">
        <div class="card-container">


            @forelse ($products as $product)
                <div class="card-wrapper">
                    <div class="card p-3 bg-white product-card">
                        <div class="about-product text-center mt-3">
                            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid product-img"
                                alt="{{ $product->description_ar }}">
                            <div class="mt-3">
                                <h4 class="text-dark">{{ $product->name_ar }}</h4>
                            </div>
                        </div>
                        <div class="stats mt-3">
                            <div class="d-flex justify-content-between align-items-center p-price">
                                <span class="fw-bold text-success">${{ number_format($product->price, 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p>لا توجد منتجات متاحة لهذا الصنف</p>
            @endforelse
        </div>

    </div>

    <!-- Slider Modal -->
    <div class="custom-product-slider-modal" id="productSliderModal">
        <div class="custom-slider-overlay"></div>
        <div class="custom-slider-content">
            <button class="custom-slider-close-btn" id="sliderCloseBtn">&times;</button>
            <div class="custom-flipbook" id="flipbook">
                @foreach ($products as $product)
                    <div class="custom-page">
                        <div class="custom-product-details">
                            <img src="{{ asset('assets/img/testimg.jpg') }}" alt="Product Image">
                            <h4 class="custom-product-name">{{ $product->name_ar }}</h4>
                            <p class="custom-product-description">{{ $product->description_ar }}</p>
                            <span class="custom-product-price">${{ number_format($product->price, 2) }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- New Footer Section -->
            <div class="modal-footer">
                <span class="swipe-indicator">
                    <i class="fa fa-arrow-left"></i> Swipe Left | Swipe Right <i class="fa fa-arrow-right"></i>
                </span>
            </div>
        </div>
    </div>
<!-- Include Hammer.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Turn.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/turn.js/4.1.0/turn.min.js"></script>

  

    <script>
        $(document).ready(function() {
            // Handle 'Explore Products' button click to fade out the video section
            $('#exploreButtonLink').on('click', function() {
                $('#videoSection').slideUp(500, function() {
                    $(this).remove(); // Optionally remove the video section from the DOM after the animation
                });
            });
    
            // Variable to store current page
            let currentPage = 1;
    
            // Store the initial HTML of the flipbook
            const initialFlipbookContent = $('#flipbook').html();
    
            // Total number of pages
            const totalPages = {{ count($products) }};
    
            // Initialize Turn.js after images are loaded
            function initializeFlipbook() {
                $('#flipbook').turn({
                    width: '100%',
                    height: '100%',
                    autoCenter: true,
                    acceleration: true,
                    gradients: true,
                    elevation: 50,
                    display: 'single', // Display one page at a time
                    page: currentPage,
                    when: {
                        turning: function(event, page, view) {
                            // Update currentPage before the turn
                            currentPage = page;
                            updateSwipeIndicator();
                        },
                        turned: function(event, page, view) {
                            // Update currentPage after the turn
                            currentPage = page;
                            updateSwipeIndicator();
                        }
                    }
                });
    
                // Initialize Hammer.js on the flipbook
                var flipbookElement = document.getElementById('flipbook');
                var hammer = new Hammer(flipbookElement);
    
                // Enable swipe recognition
                hammer.get('swipe').set({ direction: Hammer.DIRECTION_HORIZONTAL });
    
                // **Inverted Swipe Handlers for RTL Layout**
    
                // Handle swipe left to go to the previous page
                hammer.on('swipeleft', function() {
                    if (currentPage > 1) {
                        $('#flipbook').turn('previous');
                    }
                });
    
                // Handle swipe right to go to the next page
                hammer.on('swiperight', function() {
                    if (currentPage < totalPages) {
                        $('#flipbook').turn('next');
                    }
                });
            }
    
            // Prevent touch events from propagating to the background
            $('.custom-slider-content').on('touchmove', function(e) {
                e.stopPropagation(); // Stops the event from reaching the parent elements
            });
    
            // Disable background scrolling when modal is open
            function disableBackgroundScroll() {
                $('body').css('overflow', 'hidden');
            }
    
            function enableBackgroundScroll() {
                $('body').css('overflow', '');
            }
    
            // Show the slider modal and initialize Turn.js
            function showSlider(startPage) {
                currentPage = startPage;
                $('#productSliderModal').fadeIn(300, function() {
                    // Restore flipbook content
                    $('#flipbook').html(initialFlipbookContent);
                    initializeFlipbook();
                    $('#flipbook').turn('page', currentPage);
                    updateSwipeIndicator(); // Initialize the swipe indicator
                });
            }
    
            // Hide the slider modal and destroy Turn.js instance
            function hideSlider() {
                if ($('#flipbook').turn('is')) {
                    $('#flipbook').turn('destroy');
                }
                // Clear the flipbook content
                $('#flipbook').html('');
                $('#productSliderModal').fadeOut(300);
            }
    
            // Handle product card click
            $('.product-card').on('click', function() {
                var index = $(this).closest('.card-wrapper').index() + 1; // Turn.js pages are 1-indexed
                showSlider(index);
            });
    
            // Handle close button click
            $('#sliderCloseBtn').on('click', function() {
                hideSlider();
            });
    
            // Optional: Close modal when clicking outside the content
            $('#productSliderModal').on('click', function(e) {
                if ($(e.target).is('.custom-slider-overlay')) {
                    hideSlider();
                }
            });
    
            // Function to update the swipe indicator based on the current page
            function updateSwipeIndicator() {
                let swipeText = '';
                if (currentPage === 1 && totalPages > 1) {
                    swipeText = '<i class="fa fa-arrow-left"></i> Swipe Left to see more';
                } else if (currentPage > 1 && currentPage < totalPages) {
                    swipeText =
                        '<i class="fa fa-arrow-left"></i> Swipe Left | Swipe Right <i class="fa fa-arrow-right"></i>';
                } else if (currentPage === totalPages && totalPages > 1) {
                    swipeText = 'Swipe Right to go back <i class="fa fa-arrow-right"></i>';
                } else {
                    swipeText =
                        'Swipe Left or Right to navigate <i class="fa fa-arrow-left"></i> <i class="fa fa-arrow-right"></i>';
                }
                $('.swipe-indicator').html(swipeText);
            }
        });
    </script>
@endsection
