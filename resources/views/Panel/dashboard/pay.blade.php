@extends('Panel.layout.master')
@section('content')
    @php
        use App\Helpers\GeneralHelper;
        $currentEventId = GeneralHelper::getEventId();
    @endphp

    <div class="col-lg-10 col-md-10" id="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box-styling your-web-page">
                    <div class="text">
                        <h2>PAYMENT WITH PAYPAL</h2>
                        <p>You must make payment to access to this area.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="box-styling website-preview ">
                    <form action="">

                        <div class="form-row">
                            .form-group
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
@endsection
