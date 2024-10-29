<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-QD4QH7KNBF"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-QD4QH7KNBF');
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex, nofollow">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <title>Click Invitation</title>

    <link rel="stylesheet" href="/assets/panelstyle.css">
    <link rel="shortcut icon" href="/assets/images/favicon2.png" type="image/x-icon">

    <script src="/assets/jspanel/jquery.min.js"></script>
    <script src="/assets/jspanel/sortable.min.js"></script>
    <script src="/assets/jspanel/touchj.js"></script>
    <script src="/assets/jspanel/angular.js"></script>
    <script src="/assets/jspanel/angular-animate.min.js"></script>
    <script src="/assets/jspanel/angular-route.min.js"></script>

    <script src="/assets/jspanel/sortableang.js"></script>
    <script src="/assets/jspanel/ng-img-crop.js"></script>
</head>


<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="/assets/images/logo/logoNewGolden.png" width="200px" class="d-inline-block align-top"
                    alt="">
            </a>
        </div>
    </nav>

    <section class="operations addphotos" ng-app="sampleApp" ng-controller="PhotosCtrl">
        <div class="container webpage">
            <div class="row justify-content-md-center">

                <div class="col-12">
                    @if (!$ack)
                        <button style="font-size:13px; border: 0;background: rgba(0,0,0,0);" class="back"
                            onclick="history.back()""><i
                                class="fas fa-chevron-left"></i>{{ __('addphotos.BACK TO INVITATION') }}</button>
                    @else
                        <button style="font-size:13px; border: 0;background: rgba(0,0,0,0);" class="back"
                            onclick="history.back()""><i
                                class="fas fa-chevron-left"></i>{{ __('addphotos.BACK TO INVITATION') }}</button>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
                    <div class="card mb-4">
                        <h4 class="card-header text-center"><i
                                class="fal fa-camera-alt"></i>{{ __('addphotos.PHOTOS') }}</h4>
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">{{ __('addphotos.Here is the photo gallery.') }}
                                <strong>{{ __('addphotos.You can add your photos of the event.') }}</strong>
                            </h6>
                        </div>
                    </div>
                </div>

                <div class="col-12" ng-show="galleries!=''">
                    <div class="row">
                        <div class="col">
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item" ng-class='{active:$first}'
                                        ng-repeat="photo in galleries">
                                        <img ng-src="{{ env('APP_URL') }}/event-images/@{{ photo.id_event }}/photogallery/@{{ photo.id_photogallery }}.jpg"
                                            height="700px" class="d-block w-100">
                                    </div>

                                    <!--<div class="carousel-item">
         <img src="https://picsum.photos/1298/649?grayscale" class="d-block w-100">
        </div>
        <div class="carousel-item">
         <img src="https://picsum.photos/1298/649?grayscale" class="d-block w-100">
        </div>-->
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-5 photogallery">
                    <div class="card mb-4">
                        <h5 class="card-header text-center">{{ __('addphotos.PHOTOGALLERY') }}</h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <button data-bs-toggle="modal" data-bs-target="#photogalleryModal"
                                class="btn btn-success btn-sm mt-3 w-25 ms-5">ADD PHOTOS</button>
                        </div>
                        <div class="card-body">
                            {{-- <div class="photo" ng-show="index === 'MAIN'">
                                <label class="btn btn-success" style="width:auto;" for="gallerymput">
                                    {{ __('addphotos.ADD PHOTOS') }} <i class="fal fa-camera"></i>
                                </label> --}}
                            {{-- <input id="gallerymput" type='file' ng-model-instant
                                    onchange="angular.element(this).scope().imageUpload(event)" multiple /> --}}
                            {{-- <form action="{{ route('save.images') }}" method="POST" enctype="multipart/form-data" id="gallerymput">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="idevent" value="{{ $event->id_event }}">
                                        <button type="submit" class="btn btn-success" >{{ __('addphotos.ADD PHOTOS') }}</button>
                                        <br />
                                        <input type="file" class="form-control" style="display: block!important;" name="gall[]" multiple> 
                                </form>
                            </div> --}}

                            {{-- <div class="photo" ng-show="index != 'MAIN'">
                                <label class="" style="width:auto;padding: 15px;color: white;background: #8158ab;border: 0px;">
                                    @{{ index }}
                                    <svg style="width: 21px;" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                        <title></title>
                                        <g id="about" fill="#FFFFFF">
                                            <path d="M16,16A7,7,0,1,0,9,9,7,7,0,0,0,16,16ZM16,4a5,5,0,1,1-5,5A5,5,0,0,1,16,4Z"/>
                                            <path d="M17,18H15A11,11,0,0,0,4,29a1,1,0,0,0,1,1H27a1,1,0,0,0,1-1A11,11,0,0,0,17,18ZM6.06,28A9,9,0,0,1,15,20h2a9,9,0,0,1,8.94,8Z"/>
                                        </g>
                                    </svg>
                                    
                                    
                                    
                                </label>
                                
                            </div> --}}

                            {{-- <div class="photo" ng-repeat="photo in data">
                                <img class="thumb" style="max-height: 75px;object-fit: contain;"
                                    ng-src="{{ env('APP_URL') }}/event-images/@{{ photo.id_event }}/photogallery/@{{ photo.id_photogallery }}.jpg" />
                                <!--<button ng-click="delphotogallery(photo.id_photogallery);"><i class="far fa-times-circle"></i></button>-->
                            </div> --}}

                            <div class="photo" ng-repeat="photo in galleries">
                                <img class="thumb"
                                    ng-src="/event-images/@{{ photo.id_event }}/photogallery/@{{ photo.id_photogallery }}.jpg"
                                    height="75" />
                                {{-- <button ng-click="delphotogallery(photo.id_photogallery);"><i
                                        class="far fa-times-circle"></i></button> --}}
                            </div>


                            <div id="photogalleryModal" tabindex="-1" class="modal" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add Photos</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="/save-images" method="post" enctype="multipart/form-data"
                                            id="galleryform">
                                            {{ csrf_field() }}
                                            <div class="modal-body">
                                                <input type="file" id="gall"
                                                    style="display: block !important;" name="gall[]" multiple
                                                    accept="image/*" />
                                                {{-- <input type="hidden" name="_token" id="csrf"> --}}
                                                <input type="hidden" name="idevent"
                                                    value="{{ $event->id_event }}" />
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- video --}}
                <div class="col-12 mt-5 photogallery">
                    <div class="card mb-4">
                        {{-- <h5 class="card-header text-center">{{ __('addphotos.PHOTOGALLERY') }}</h5> --}}
                        <h5 class="card-header text-center">VIDEO GALLERY</h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <button data-bs-toggle="modal" data-bs-target="#videogalleryModal"
                                class="btn btn-success btn-sm mt-3 w-25 ms-5">ADD VIDEO</button>
                        </div>
                        <div class="card-body">
                            <div class="photo" ng-repeat="photo in videogalleries">
                                {{-- <img class="thumb"
                                    ng-src="/event-images/@{{ photo.id_event }}/photogallery/@{{ photo.id_photogallery }}.jpg"
                                    height="75" /> --}}
                                <video width="300" height="200" controls>
                                    <source src="/event-images/@{{ photo.id_event }}/videos/@{{ photo.video }}"
                                        type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>

                            <div id="videogalleryModal" tabindex="-1" class="modal" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add Photos</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="/save-images" method="post" enctype="multipart/form-data"
                                            id="galleryform">
                                            {{ csrf_field() }}
                                            <div class="modal-body">
                                                <input type="file" id="vid"
                                                    style="display: block !important;" name="vid"
                                                    accept="video/*" />
                                                <input type="hidden" name="idevent"
                                                    value="{{ $event->id_event }}" />
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                {{-- video  --}}

            </div>

        </div>

        <div class="loader ng-hide" ng-show="loading">
            <img src="/assets/panelimages/loader.svg">
        </div>

        <div ng-click="saveimages();" class="saver ng-hide" ng-show="saveyes" style="width: 120px;">
            <p style="transform: translateX(-30%);">{{ __('addphotos.SAVE') }}</p>
        </div>
    </section>
    <script src="/assets/jspanel/bootstrap.min.js"></script>
    <script>
        var sampleApp = angular.module('sampleApp', ['ngRoute', 'ngAnimate', 'ui.sortable', 'ngImgCrop']);
        sampleApp.controller('PhotosCtrl', ['$scope', '$route', '$http', '$location', '$routeParams', '$window',
            '$interval',
            function($scope, $route, $http, $location, $routeParams, $window, $interval) {
                $scope.loading = 1;
                $scope.saveyes = 0;

                $http({
                    method: 'POST',
                    url: '/opened-answered',
                    data: {
                        idguest: {{ $guest->id_guest }},
                        opened: 1
                    },
                });


                $scope.showevent = function() {
                    $http({
                        method: 'POST',
                        url: '/show-event',
                        data: {
                            idevent: {{ $event->id_event }}
                        },
                    }).then(function(response) {
                        console.log(response);
                        $scope.galleries = response.data.photogallery;
                        $scope.videogalleries = response.data.videogallery;
                        let data = response.data.photogallery;
                        $scope.count = 0;

                        console.log(data);
                        const nameArrays = {};

                        for (let i = 0; i < data.length; i++) {
                            const obj = data[i];
                            const name = obj.name;

                            if (!nameArrays[name]) {
                                nameArrays[name] = [];
                            }

                            nameArrays[name].push(obj);
                        }
                        $scope.galleriesData = nameArrays;
                        console.log(nameArrays);
                    });
                };

                $scope.showevent();


                start = $interval(function() {
                    $scope.loading = 0;
                }, 300);

                //--------------------------------------------
                $scope.newGallery = [];

                $scope.imageUpload = function(event) {
                    var files = event.target.files; //FileList object
                    for (var i = 0; i < files.length; i++) {
                        var file = files[i];
                        var reader = new FileReader();
                        reader.onload = $scope.imageIsLoaded;
                        // reader.readAsDataURL(file);
                    }
                    $scope.saveyes = 1;
                }

                $scope.imageIsLoaded = function(e) {
                    $scope.$apply(function() {
                        $scope.newGallery.push(e.target.result);
                    });
                }

                //--------------------------------------------

                $scope.delphotogallery = function(idphotogallery) {
                    $http({
                        method: 'POST',
                        url: '/del-photogallery',
                        data: {
                            idphoto: idphotogallery,
                            idevent: {{ $event->id_event }},
                        },
                    }).then(function(response) {
                        $scope.url = '/website/' + $scope.idevent + '?id=' + (new Date()).getTime();
                        $scope.showevent();
                    });
                };

                $scope.saveimages = function() {
                    $http({
                        method: 'POST',
                        url: '/save-images',
                        data: {
                            idevent: {{ $event->id_event }},
                            gall: $scope.newGallery,
                            guestCode: window.location.href.split("/")[5],
                        },
                    }).then(function(response) {
                        console.log(response);
                        $scope.saveyes = 0;
                        $scope.newGallery = [];
                        $scope.showevent();
                    });
                };

            }
        ]);
    </script>

</body>

</html>
