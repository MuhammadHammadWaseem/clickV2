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
                        <h2>{{ __('pay.payment_with_paypal') }}</h2>
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
                            <div class="form-row">
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
                            </div>
                            <div class="two-btn-form-align">
                                <button>{{ __('pay.cancel') }}</button>
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
    <script>
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
                    <option value="111">canada 1</option>
                    <option value="222">canada 2</option>
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
                        <option value="11">us 1</option>
                        <option value="22">us 2</option>
                    </select>
                `);
            }
        });
    </script>
@endsection
