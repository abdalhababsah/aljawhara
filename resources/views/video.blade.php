<!-- resources/views/home.blade.php -->

@extends('layouts.mainlayout')

@section('content')
    <div class="container-fluid py-4">
        <div class="card-container">
            <div class="video-container" id="videoSection">
                <video autoplay muted playsinline loop class="background-video" poster="images/IMG-0653-4.jpg" preload="auto">
                    <source src="{{ asset('assets/output.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                  </video>


                <div class="center-button" id="exploreButton">
                    <a href="{{ url('menu') }}" class="btn bg-gradient-dark" id="exploreButtonLink">Explore Products</a>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Video Container Styling */
        .video-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1000000; /* Ensure it's above all other content */
            background: rgba(0, 0, 0, 0.5); /* Semi-transparent overlay */
            display: flex;
            justify-content: center;
            align-items: center;
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
            z-index: 1; /* Ensure the button is above the video */
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

        /* Responsive Design Adjustments */
        @media (max-width: 768px) {
            .center-button .btn {
                font-size: 16px;
                padding: 10px 20px;
            }

            .video-container {
                background: rgba(0, 0, 0, 0.3); /* Less opaque on smaller screens */
            }

            .background-video {
                display: none; /* Hide video on mobile */
            }

            .video-container {
                background-image: url('{{ asset('assets/fallback-image.jpg') }}');
                background-size: cover;
                background-position: center;
            }
        }

        /* Body Styling */
        body {
            background: #f9f9f9;
        }
    </style>

    <script>
        $(document).ready(function() {
            // Handle 'Explore Products' button click to fade out the video section
            $('#exploreButtonLink').on('click', function(e) {
                e.preventDefault(); // Prevent default anchor behavior
                $('#videoSection').slideUp(500, function() {
                    $(this).remove(); // Optionally remove the video section from the DOM after the animation
                    // Navigate to the menu page after the animation
                    window.location.href = "{{ url('menu') }}";
                });
            });
        });
    </script>
@endsection