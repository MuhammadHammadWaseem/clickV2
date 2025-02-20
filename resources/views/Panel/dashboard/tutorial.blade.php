@extends('Panel.Layout.master')

@section('content')
<style>

.tutoriar-active a {
  color: #C09D2A !important;
}

.tutoriar-active img {
  filter: none !important;
}

.tutoriar-active {
  background-color: #c09d2a29 !important;
}

.tutoriar-active::after {
  width: 5px;
  height: 100%;
  background-color: #C09D2A;
  position: absolute;
  left: 0;
  right: 0;
  content: "";
  top: 0;
}

</style>
    @php
        use App\Helpers\GeneralHelper;
        $currentEventId = GeneralHelper::getEventId();
    @endphp

<div class="col-lg-10 col-md-10" id="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="box-styling your-web-page reminders tutorials">
                <div class="text">
                    <h2>{{ __('tutorial.tutorials') }}</h2>
                </div>
                    <div class="main-tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">{{ __('tutorial.introduction') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">{{ __('tutorial.web_page') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">{{ __('tutorial.general_info') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">{{ __('tutorial.invitations') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-5" role="tab">{{ __('tutorial.guest_list') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab">{{ __('tutorial.table_management') }}</a>
                            </li>
                        </ul><!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="main-youtube-iframe">
                                    <iframe width="1250" height="703" src="https://www.youtube.com/embed/VPfxaKOQ4o4" title="5 Second Video: Watch the Milky Way Rise" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="main-youtube-iframe">
                                    <iframe width="1250" height="703" src="https://www.youtube.com/embed/MPYPrr0jLak" title="5 Second Video: Watch the Milky Way Rise" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="main-youtube-iframe">
                                    <iframe width="1250" height="703" src="https://www.youtube.com/embed/cRPZt5Xesww" title="5 Second Video: Watch the Milky Way Rise" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-4" role="tabpanel">
                                <div class="main-youtube-iframe">
                                    <iframe width="1250" height="703" src="https://www.youtube.com/embed/ND5GHyBDENQ" title="5 Second Video: Watch the Milky Way Rise" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-5" role="tabpanel">
                                <div class="main-youtube-iframe">
                                    <iframe width="1250" height="703" src="https://www.youtube.com/embed/jJcB4ZnzP_8" title="5 Second Video: Watch the Milky Way Rise" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-6" role="tabpanel">
                                <div class="main-youtube-iframe">
                                    <iframe width="1250" height="703" src="https://www.youtube.com/embed/y-d3uq0x3EE" title="5 Second Video: Watch the Milky Way Rise" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

        });
    </script>
@endsection
