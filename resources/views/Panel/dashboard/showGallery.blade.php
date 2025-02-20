<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .gallery-image {
            margin-bottom: 15px;
        }

        .gallery-image img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        /* Custom CSS to ensure navigation buttons are visible */
        .lightbox .lb-nav {
            display: block !important;
            /* Show buttons */
        }

        .lb-next {
            display: block !important;
            opacity: 1 !important;
        }

        .lb-prev {
            display: block !important;
            opacity: 1 !important;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        @if ($photogallery->count() > 0)
            <h1 class="text-center mb-5">{{ __('photos.images_title') }}</h1>
            <div class="row">
                @foreach ($photogallery->reverse() as $photo)
                    @if (file_exists(public_path('event-images/' . $photo->id_event . '/photogallery/' . $photo->id_photogallery . '.jpg')))
                        <div class="col-md-2 mb-4">
                            <a href="/event-images/{{ $photo->id_event }}/photogallery/{{ $photo->id_photogallery }}.jpg"
                                data-fancybox="gallery" data-title="Image {{ $loop->index + 1 }}" class="gallery-image">
                                <img src="/event-images/{{ $photo->id_event }}/photogallery/{{ $photo->id_photogallery }}.jpg"
                                    class="img-fluid" alt="Thumbnail {{ $loop->index + 1 }}">
                            </a>
                        </div>
                    @endif
                @endforeach
                <hr>
            </div>
        @endif

        @if ($videogallery->count() > 0)
            <h1 class="text-center mt-3 mb-5">{{ __('photos.videos_title') }}</h1>
            <div class="row">
                @foreach ($videogallery as $video)
                    @if (file_exists(public_path('/event-images/' . $video->id_event . '/videos/' . $video->video)))
                        <div class="col-md-4 mb-4">
                            <video width="300" height="200" controls>
                                <source src="/event-images/{{ $video->id_event }}/videos/{{ $video->video }}"
                                    type="video/mp4">
                                {{ __('photos.videos_support') }}
                            </video>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif

        @if ($photogallery->count() == 0 && $videogallery->count() == 0)
            <h3 class="text-center mt-5">{{ __('photos.images_found') }}</h3>
        @endif
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>


</body>

</html>
<script>

    Fancybox.bind('[data-fancybox="gallery"]', {
        // Slideshow options
        slideShow: {
            autoStart: true, // Automatically start the slideshow
            speed: 3000,     // Time in milliseconds between slides
        },
        loop: true,          // Enable looping of images
    });

    </script>