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
    <link rel="shortcut icon" href="/assets/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/Panel/css/operation.css') }}">


    <script src="/assets/jspanel/jquery.min.js"></script>
    <script src="/assets/jspanel/sortable.min.js"></script>
    <script src="/assets/jspanel/touchj.js"></script>
    <script src="/assets/jspanel/angular.js"></script>
    <script src="/assets/jspanel/angular-animate.min.js"></script>
    <script src="/assets/jspanel/angular-route.min.js"></script>

    <script src="/assets/jspanel/sortableang.js"></script>
    <script src="/assets/jspanel/ng-img-crop.js"></script>

    <style>
        @media only screen and (max-width: 767px) {
            .operations .groupdesc .memberrow div {
                width: 100% !important;
                max-width: 100% !important;
                flex: 0 0 100% !important;
            }

            .operations .groupdesc .memberrow .t-btn {
                width: 100% !important;
                flex: 0 0 100%;
                margin: 10px 0;
            }
        }
    </style>
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

    <section class="operations" ng-app="sampleApp" ng-controller="SorryCtrl">
        <div class="container webpage">
            <div class="row justify-content-md-center">

                <div class="col-12">
                    <button style="border: 0;background: rgba(0,0,0,0);margin-top:15px;color:#212529 !important;" class="back"
                        onclick="history.back()"><i
                            class="fas fa-chevron-left"></i>{{ __('sorrycant.BACK TO INVITATION') }}</button>
                    <div class="card mb-4 box-styling">
                        <h4 class="card-header text-center"><i class="fal fa-clipboard-list-check"></i>
                            {{ __('sorrycant.DECLINE INVITE') }}</h4>
                        <div class="card-body mt-5" style="{{ $guest->declined == 1 ? 'background: rgb(255, 219, 219);' : '' }}" id="declineForm">
                            <div class="form-check" id="declineBtn" ng-show="!guestDeclined">
                                <input ng-model="decliner" value="me" class="form-check-input" type="radio"
                                    name="flexRadioDefault" id="flexRadioDefault1" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    {{ __('sorrycant.Decline for me') }}
                                </label>
                            </div>

                            <div class="form-check" id="undeclineBtn" ng-show="guestDeclined">
                                <input ng-model="decliner" value="me_d" class="form-check-input" type="radio"
                                    name="flexRadioDefault" id="flexRadioDefault3">
                                <label class="form-check-label" for="flexRadioDefault3">
                                    Undecline for me
                                </label>
                            </div>


                            @if ($guest->mainguest == 1)
                                <div class="form-check">
                                    <input ng-model="decliner" value="all" class="form-check-input" type="radio"
                                        name="flexRadioDefault" id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        {{ __('sorrycant.Decline for all group') }}
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input ng-model="decliner" value="all_d" class="form-check-input" type="radio"
                                        name="flexRadioDefault" id="flexRadioDefault4">
                                    <label class="form-check-label" for="flexRadioDefault4">
                                        Undecline for all group
                                    </label>
                                </div>
                            @endif
                            <strong ng-show="saveok" class="text-success text-end d-block"><i
                                    class="fas fa-check"></i>{{ __('sorrycant.DATA SAVED') }}</strong>
                        </div>
                    </div>

                    @if ($guest->mainguest == 1)
                        <div class="card mb-4 box-styling">
                            <div class="card-body groupdesc">
                                <div ng-class="member.declined?'row align-items-center memberrow declined':'row align-items-center memberrow'"
                                    ng-repeat="member in members">
                                    <div class="col-6 names">
                                        <p class="fw-bold">@{{ member.name }}</p>
                                        <p ng-show="member.phone"><i class="fal fa-phone"></i> @{{ member.phone }}
                                        </p>
                                        <p ng-show="member.whatsapp"><i class="fab fa-whatsapp"></i>
                                            @{{ member.whatsapp }}</p>
                                        <p ng-show="member.email"><i class="fal fa-envelope"></i> @{{ member.email }}
                                        </p>
                                    </div>
                                    <div class="col-4 text-center">
                                        <p ng-show="member.declined">DECLINED</p>
                                        <p ng-show="!member.declined">NOT DECLINED</p>
                                    </div>
                                    <div class="col-2 text-end">
                                        <button style="width:auto" ng-show="!member.declined" class="btn t-btn"
                                            ng-click="$parent.decliner=member.id_guest; decline();">DECLINE</button>
                                        <button style="width:auto" ng-show="member.declined" class="btn t-btn"
                                            ng-click="$parent.decliner=member.id_guest; decline();">UNDECLINE</button>

                                        <!--<button class="btn btn-warning btn-sm" ng-click="editdata($index);" data-bs-toggle="modal" data-bs-target="#editguestModal">{{ __('attending.EDIT') }}</button>
        <button class="btn btn-danger btn-sm" ng-click="$parent.delid=member.id_guest" data-bs-toggle="modal" data-bs-target="#delguestModal" style="width: 70px;">{{ __('attending.DELETE') }}</button>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif


                </div>

            </div>

        </div>

        <div class="loader ng-hide" ng-show="loading">
            <img src="/assets/panelimages/loader.svg">
        </div>

        <div ng-click="decline();" class="saver ng-hide" ng-show="saveyes" style="width: 120px">
            <p style="transform: translateX(-30%);">{{ __('sorrycant.SAVE') }}</p>
        </div>
    </section>
    <script src="/assets/jspanel/bootstrap.min.js"></script>
    <script>
        var sampleApp = angular.module('sampleApp', ['ngRoute', 'ngAnimate', 'ui.sortable', 'ngImgCrop']);
        sampleApp.controller('SorryCtrl', ['$scope', '$route', '$http', '$location', '$routeParams', '$window', '$interval',
            function($scope, $route, $http, $location, $routeParams, $window, $interval) {
                $scope.loading = 1;
                $scope.saveyes = 0;

                @if ($guest->declined == null || $guest->declined == 0)
                $scope.guestDeclined = 0;
                @elseif ($guest->declined == 1)
                $scope.guestDeclined = 1;
                @endif

                $http({
                    method: 'POST',
                    url: '/opened-answered',
                    data: {
                        idguest: {{ $guest->id_guest }},
                        opened: 1
                    },
                });

                $scope.$watchGroup(["decliner"], function(newValue, oldValue) {
                    if (typeof newValue[0] === 'string') {
                        if (newValue != oldValue) {
                            $scope.saveyes = 1;
                        }
                    }
                });


                start = $interval(function() {
                    $scope.loading = 0;
                }, 300);

                $scope.decline = function() {
                    $scope.saveok = 0;
                    $http({
                        method: 'POST',
                        url: '/decline',
                        data: {
                            guestcode: '{{ $guest->code }}',
                            decliner: $scope.decliner,
                        },
                    }).then(function(response) {
                        if (response.data.data == "Guest Declined Successfully") {
                            $("#declineForm").css("background", "#ffdbdb");
                            $scope.guestDeclined = true;
                            $scope.saveyes = 0;
                            $scope.mymembers();
                            start = $interval(function() {
                                $scope.saveok = 1;
                            }, 1300);
                        }
                        if (response.data.data == "Guest UnDeclined Successfully") {
                            $("#declineForm").css("background", "#e0e0e0");
                            $scope.guestDeclined = false;
                            $scope.saveyes = 0;
                            $scope.mymembers();
                            start = $interval(function() {
                                $scope.saveok = 1;
                            }, 1300);
                        }
                        // window.location.reload();
                        $scope.saveyes = 0;
                        $scope.mymembers();
                        start = $interval(function() {
                            $scope.saveok = 1;
                        }, 1300);
                    });
                };

                $scope.mymembers = function() {
                    $http({
                        method: 'POST',
                        url: '/my-members',
                        data: {
                            idgroup: {{ $guest->id_guest }}
                        },
                    }).then(function(response) {
                        $scope.members = response.data;
                    });
                };
                $scope.mymembers();

            }
        ]);
    </script>

</body>

</html>
