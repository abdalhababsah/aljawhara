<!-- resources/views/welcome.blade.php -->

@extends('layouts.mainlayout')

@section('content')
    <div class="container-fluid py-4">
        <div class="card-container">


                <div class="video-container" id="videoSection">
                    <video autoplay muted loop playsinline preload="auto" class="background-video">
                        <source src="{{ asset('assets/output_video.mp4') }}" type="video/mp4">
                            <!-- Optional: Add WebM and OGV formats for broader compatibility -->
                        <source src="{{ asset('assets/video.webm') }}" type="video/webm">
                        Your browser does not support the video tag.
                    </video>

                    <div class="center-button" id="exploreButton">
                        <a href="{{('menu')}}" class="btn bg-gradient-dark" id="exploreButtonLink">Explore
                            Products</a>
                    </div>
                </div>
        </div>

    </div>

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
    </style>

    <script>
        $(document).ready(function() {
            // Handle 'Explore Products' button click to fade out the video section
            $('#exploreButtonLink').on('click', function() {
                $('#videoSection').slideUp(500, function() {
                    $(this)
                        .remove(); // Optionally remove the video section from the DOM after the animation
                });
            });
        });
    </script>
@endsection
