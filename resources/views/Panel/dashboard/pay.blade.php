@extends('Panel.Layout.master')
<style>
    .box-styling select {
        background-color: #EDEDED;
        border: 2px solid #999999;
        border-radius: 16px;
        height: 50px;
        padding: 0px 20px;
        width: 100%;
        color: #7c7a7a;
    }

    .payment-form-submit .form-row {
        width: 100%;
    }

    .payment-form-submit .form-row .form-group {
        width: 48%;
        margin: 10px 10px;
    }

    .payment-form-submit .form-row .form-group.discont-cd {
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        justify-content: center;
        column-gap: 20px;
        padding-right: 50px;
    }

    .payment-form-submit .divider-seperater {
        width: 100%;
        height: 2px;
        background: #999999;
        margin: 20px 0;
    }

    .payment-form-submit .form-group.table-reveal-data table {
        width: 100%;
    }

    .payment-form-submit .two-btn-form-align {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        margin-top: 50px;
    }

    .payment-form-submit .form-group.table-reveal-data table td {
        text-align: end;
    }

    .payment-form-submit .form-group.table-reveal-data table tr:nth-child(1) {
        height: 50px;
    }
</style>
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
                        <h2>{{ __('pay.Payment') }}</h2>
                        {{-- <h2>{{ __('pay.payment_with_paypal') }}</h2> --}}
                        <p>{{ __('pay.payment_access_area') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="box-styling website-preview ">
                    <div class="payment-form-submit">
                        <form action="">

                            <div class="form-row">
                                <div class="form-group">
                                    <input type="text" placeholder="{{ __('pay.name') }}*" required>
                                </div>
                                <div class="form-group">
                                    <input type="tel" placeholder="{{ __('pay.phone') }}*" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group" style="width: 100%">
                                    <input type="text" placeholder="{{ __('pay.address') }}*" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <input type="text" placeholder="{{ __('pay.city') }}*" required>
                                </div>
                                <div class="form-group">
                                    <input type="number" placeholder="{{ __('pay.postal_code') }}*" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <select name="" id="country">
                                        <option selected disabled>{{ __('pay.select_country') }}</option>
                                        <option value="canada">{{ __('pay.canada') }}</option>
                                        <option value="us">{{ __('pay.united_states') }}</option>
                                    </select>
                                </div>

                                <div class="form-group" id="province">
                                </div>

                            </div>
                            <span class="divider-seperater"></span>
                            {{-- <div class="form-row">
                                <div class="form-group discont-cd">
                                    <input type="text" id="code" placeholder="Discount {{ __('pay.discount_code') }}">
                                    <button type="button" onclick="verify()">{{ __('pay.verify') }}</button>
                                </div>
                                <div class="form-group table-reveal-data">
                                    <table id="canadaTable" class="d-none">
                                    </table>
                                    <table id="usaTable" class="d-none">
                                    </table>
                                </div>
                            </div> --}}
                            <div class="two-btn-form-align">
                                <button>{{ __('pay.cancel') }}</button>

                                <div> <link href="//fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> <button disabled style="color:#ffffff; font-size:14px; font-family:Montserrat; font-weight:normal; background-color:#212529; padding:7px 16px; display:inline-block; border-radius:3px; border:1px solid #212529; box-shadow:0 2px 4px 0 rgba(0,0,0,0.25); ">Pay Now</button><script src="https://www.convergepay.com/hosted-payments/buy_button_script/56756a36767165445376656f61535a51584a4f5168414141415a457539687149"></script> </div>
                                
                                {{-- 0.01$ --}}
                                {{-- <div>
                                    <button disabled style="color:#ffffff; font-size:14px; font-family:Trebuchet MS; font-weight:normal; background-color:#4177B4; padding:7px 16px; display:inline-block; border-radius:3px; border:1px solid #4A90E2; box-shadow:0 2px 4px 0 rgba(0,0,0,0.25); ">BUY NOW</button><script src="https://www.convergepay.com/hosted-payments/buy_button_script/585673556367787a53516965575437756137636961514141415a5063582f4e38"></script>
                                </div> --}}

                                
                                {{-- 1$ --}}
                                {{-- <div>
                                    <button disabled style="color:#ffffff; font-size:14px; font-family:Trebuchet MS; font-weight:normal; background-color:#4177B4; padding:7px 16px; display:inline-block; border-radius:3px; border:1px solid #4A90E2; box-shadow:0 2px 4px 0 rgba(0,0,0,0.25); ">Pay Now</button><script src="https://www.convergepay.com/hosted-payments/buy_button_script/7870536c735330415448717a6b725a4461625a6877414141415a5062365a306e"></script>
                                </div> --}}
                                
                                <button id="canBtn" class="d-none"><a id="can" class="text-white" href="">{{ __('pay.pay_now') }}</a></button>
                                <button id="usaBtn" class="d-none"><a id="usa" class="text-white" href="">{{ __('pay.pay_now') }}</a></button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    {{-- <script>
        function verify() {
            let code = $("#code").val();
            $.ajax({
                url: "{{ route('panel.event.pay.get', ['id' => $currentEventId]) }}",
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    code: code,
                },
                success: function(response) {
                    console.log(response);
                    let res = JSON.parse(response);

                    $("#canadaTable").empty();
                    $("#canadaTable").append(`
                    <tr>
                        <th>SUBTOTAL:</th>
                        ${res[0].discount !== "0%" ? `
                                                    <td id="subTotalCan">${res[0].subcano}</td>
                                                ` : `<td id="subTotalCan">${res[0].subcan}</td>`}
                    </tr>
                    <tr>
                        <th>TPS:</th>
                        <td id="TPSCan">${res[0].tpscan}</td>
                    </tr>
                    <tr>
                        <th>TVQ:</th>
                        <td id="TVQCan">${res[0].tvqcan}</td>
                    </tr>
                    <tr>
                        <th>TOTAL:</th>
                        <td id="TotalCan" style="font-weight: bold;">${res[0].totcan}</td>
                    </tr>
                `);

                    $("#usaTable").empty();
                    $("#usaTable").append(`
                    <tr>
                        <th>SUBTOTAL:</th>
                        ${res[0].discount !== "0%" ? `
                                            <td id="subTotalUSA">${res[0].subusao}</td>
                                            ` : `<td id="subTotalUSA">${res[0].subusa}</td>`}
                    </tr>
                    <tr>
                        <th>TPS:</th>
                        <td id="TPSUSA">${res[0].tpsusa}</td>
                    </tr>
                    <tr>
                        <th>TVQ:</th>
                        <td id="TVQUSA">${res[0].tvqusa}</td>
                    </tr>
                    <tr>
                        <th>TOTAL:</th>
                        <td id="TotalUSA" style="font-weight: bold;">${res[0].totusa}</td>
                    </tr>
                `);

                },
                error: function(xhr) {
                    console.error(xhr.responseJSON);
                }
            });
        }
        $.ajax({
            url: "{{ route('panel.event.pay.get', ['id' => $currentEventId]) }}",
            type: 'POST',
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log(response);
                let res = JSON.parse(response);

                $("#can").attr('href', res[0].linkcan);
                $("#usa").attr('href', res[0].linkusa);

                $("#canadaTable").empty();
                $("#canadaTable").append(`
                    <tr>
                        <th>{{ __('pay.SUBTOTAL') }}</th>
                        ${res[0].discount !== "0%" ? `
                                                    <td id="subTotalCan">${res[0].subcano}</td>
                                                ` : `<td id="subTotalCan">${res[0].subcan}</td>`}
                    </tr>
                    <tr>
                        <th>{{ __('pay.TPS') }}</th>
                        <td id="TPSCan">${res[0].tpscan}</td>
                    </tr>
                    <tr>
                        <th>{{ __('pay.TVQ') }}</th>
                        <td id="TVQCan">${res[0].tvqcan}</td>
                    </tr>
                    <tr>
                        <th>{{ __('pay.TOTAL') }}</th>
                        <td id="TotalCan" style="font-weight: bold;">${res[0].totcan}</td>
                    </tr>
                `);

                $("#usaTable").empty();
                $("#usaTable").append(`
                    <tr>
                        <th>{{ __('pay.SUBTOTAL') }}:</th>
                        ${res[0].discount !== "0%" ? `
                                            <td id="subTotalUSA">${res[0].subusao}</td>
                                            ` : `<td id="subTotalUSA">${res[0].subusa}</td>`}
                    </tr>
                    <tr>
                        <th>{{ __('pay.TPS') }}</th>
                        <td id="TPSUSA">${res[0].tpsusa}</td>
                    </tr>
                    <tr>
                        <th>{{ __('pay.TVQ') }}</th>
                        <td id="TVQUSA">${res[0].tvqusa}</td>
                    </tr>
                    <tr>
                        <th>{{ __('pay.TOTAL') }}</th>
                        <td id="TotalUSA" style="font-weight: bold;">${res[0].totusa}</td>
                    </tr>
                `);

            },
            error: function(xhr) {
                console.error(xhr.responseJSON);
            }
        });

        $("#country").on("change", function() {
            $("#province").empty();

            if (this.value == "canada") {
                $("#usaTable").addClass("d-none");
                $("#canadaTable").removeClass("d-none");

                $("#canBtn").removeClass("d-none");
                $("#usaBtn").addClass("d-none");

                $("#province").append(`
                <select name="" id="">
                    <option selected disabled>Province*</option>
                    <option value="111">{{ __('pay.canada_1') }}</option>
                    <option value="222">{{ __('pay.canada_2') }}</option>
                    </select>
                    `);
            }

            if (this.value == "us") {
                $("#usaTable").removeClass("d-none");
                $("#canadaTable").addClass("d-none");

                $("#canBtn").addClass("d-none");
                $("#usaBtn").removeClass("d-none");

                $("#province").append(`
                    <select name="" id="">
                        <option selected disabled>Province*</option>
                        <option value="11">{{ __('pay.us_1') }}</option>
                        <option value="22">{{ __('pay.us_2') }}</option>
                    </select>
                `);
            }
        });
    </script> --}}
@endsection
