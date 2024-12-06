<!-- resources/views/home.blade.php -->

@extends('layouts.mainlayout')

@section('content')
    <div class="video-background">
        <video autoplay muted loop playsinline class="bg-video" poster="{{ asset('assets/img/IMG-0653-4.jpg') }}">
            <source src="{{ asset('assets/output.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <div class="content-overlay">
        <div class="center-button">
            <a href="{{ url('menu') }}" class="btn bg-gradient-dark" id="exploreButtonLink">Explore Products</a>
        </div>
    </div>

    <style>
        /* Video Background Styling */
        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1; /* Ensure it's behind all other content */
        }

        .bg-video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Content Overlay Styling */
        .content-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1; /* Ensure it's above the video */
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgba(0, 0, 0, 0.5); /* Semi-transparent overlay */
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

            /* Optionally, adjust the overlay opacity */
            .content-overlay {
                background: rgba(0, 0, 0, 0.3);
            }
        }

        /* Body Styling */
        body {
            margin: 0;
            padding: 0;
            background: #f9f9f9;
            overflow-x: hidden;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Handle 'Explore Products' button click to fade out the overlay
            document.getElementById('exploreButtonLink').addEventListener('click', function (e) {
                e.preventDefault(); // Prevent default anchor behavior
                document.querySelector('.content-overlay').style.transition = 'opacity 0.5s';
                document.querySelector('.content-overlay').style.opacity = '0';
                setTimeout(function () {
                    window.location.href = "{{ url('menu') }}";
                }, 500); // Match the transition duration
            });
        });
    </script>
@endsection