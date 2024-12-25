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

    .tab-buttons {
        margin-bottom: 20px;
    }

    .tab-buttons button {
        padding: 10px 20px;
        font-size: 16px;
        background-color: #f0f0f0;
        border: 2px solid #ccc;
        border-radius: 5px;
        color: #333;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
        margin-right: 10px;
    }

    .tab-buttons button.active {
        background-color: #A9967D;
        color: #fff;
        border-color: #A9967D;
    }

    .tab-buttons button:hover {
        background-color: #ddd;
    }

    .tab-buttons button:focus {
        outline: none;
    }

    /* Style for the visible selection box */
.custom-select-selection {
    background-color: #EDEDED !important;
    border: 2px solid #999999 !important;
    border-radius: 16px !important;
    height: 50px !important;
    padding: 0px 20px !important;
    color: #7c7a7a !important;
    display: flex;
    align-items: center;
}

/* Style for placeholder text in the selection box */
.custom-select-selection .select2-selection__placeholder {
    color: #b0b0b0 !important;
    font-size: 14px !important;
}

/* Style for selected text in the selection box */
.custom-select-selection .select2-selection__rendered {
    color: #7c7a7a !important;
    font-size: 14px !important;
}

/* Add hover effect */
.custom-select-selection:hover {
    border-color: #666666 !important;
}


/* Dropdown container */
.custom-select-dropdown {
    background-color: #EDEDED !important;
    border: 2px solid #999999 !important;
    border-radius: 16px !important;
    color: #7c7a7a !important;
    padding: 0 !important;
}

/* Search box in the dropdown */
.custom-select-dropdown .select2-search input {
    width: 100% !important;
    border: 1px solid #999999 !important;
    border-radius: 8px !important;
    padding: 8px !important;
    color: #7c7a7a !important;
    font-size: 14px !important;
}

/* Dropdown options */
.custom-select-dropdown .select2-results__option {
    padding: 10px 20px !important;
    cursor: pointer !important;
}

/* Highlighted dropdown option */
.custom-select-dropdown .select2-results__option--highlighted {
    background-color: #d3d3d3 !important;
    color: #333333 !important;
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 46px !important;
}

.select2-container--default .select2-selection--single .select2-selection__arrow b {
    margin-top: 9px !important;
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

                <div class="tab-buttons">
                    <button id="payPalBtn" onclick="switchTab(1)" class="active">{{ __('pay.Pay with PayPal') }}</button>
                    <button id="convergePayBtn" onclick="switchTab(2)">{{ __('pay.Pay with Converge Pay') }}</button>
                </div>

                {{-- Tab 1 --}}
                <div class="box-styling website-preview " id="tab1" style="display: block;">
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
                                    <input type="number" placeholder="{{ __('pay.postal_code') }}*" required
                                        id="postalCode">
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
                                    <input type="text" id="code"
                                        placeholder="Discount {{ __('pay.discount_code') }}">
                                    <button type="button" id="verifyBtn"
                                        onclick="verify()">{{ __('pay.verify') }}</button>
                                </div>
                                <div class="form-group table-reveal-data">
                                    <table id="canadaTable" class="d-none">
                                    </table>
                                    <table id="usaTable" class="d-none">
                                    </table>
                                </div>
                            </div>
                            <div class="two-btn-form-align">
                                <button type="button" id="cancelBtn">{{ __('pay.cancel') }}</button>
                                <button id="canBtn" class="d-none"><a id="can" class="text-white"
                                        href="">{{ __('pay.pay_now') }}</a></button>
                                <button id="usaBtn" class="d-none"><a id="usa" class="text-white"
                                        href="">{{ __('pay.pay_now') }}</a></button>
                            </div>

                        </form>
                    </div>

                </div>

                {{-- Tab 2 --}}
                <div class="box-styling website-preview" id="tab2" style="display: none;">
                    <div class="payment-form-submit">
                        <div class=""
                            style="display: flex; justify-content: center; align-items: center; width: 100%; margin-top: 80px;">
                            {{-- Original --}}
                            {{-- <div>
                                <link href="//fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> <button
                                    style="background-color: #A9967D;
                                    color: #fff;
                                    border-color: #A9967D;
                                    padding: 10px 20px;
                                    font-size: 16px;cursor: pointer;
                                    transition: background-color 0.3s, color 0.3s;
                                    border-radius: 5px; ">Pay
                                    Now</button>
                                <script
                                    src="https://www.convergepay.com/hosted-payments/buy_button_script/56756a36767165445376656f61535a51584a4f5168414141415a457539687149">
                                </script>
                            </div> --}}

                            {{-- 0.01$ --}}
                            <div>
                                <button disabled
                                    style="background-color: #A9967D;
                                    color: #fff;
                                    border-color: #A9967D;
                                    padding: 10px 20px;
                                    font-size: 16px;cursor: pointer;
                                    transition: background-color 0.3s, color 0.3s;
                                    border-radius: 5px; ">BUY
                                    NOW</button>
                                <script
                                    src="https://www.convergepay.com/hosted-payments/buy_button_script/585673556367787a53516965575437756137636961514141415a5063582f4e38">
                                </script>
                            </div>


                            {{-- 1$ --}}
                            {{-- <div>
                                    <button disabled style="color:#ffffff; font-size:14px; font-family:Trebuchet MS; font-weight:normal; background-color:#4177B4; padding:7px 16px; display:inline-block; border-radius:3px; border:1px solid #4A90E2; box-shadow:0 2px 4px 0 rgba(0,0,0,0.25); ">Pay Now</button><script src="https://www.convergepay.com/hosted-payments/buy_button_script/7870536c735330415448717a6b725a4461625a6877414141415a5062365a306e"></script>
                                </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $("#verifyBtn").prop("disabled", true);
        $("#verifyBtn").css("cursor", "not-allowed");

        $("#code").on("input", function() {
            if ($(this).val().length > 0) {
                $("#verifyBtn").prop("disabled", false);
                $("#verifyBtn").css("cursor", "pointer");
            } else {
                $("#verifyBtn").prop("disabled", true);
                $("#verifyBtn").css("cursor", "not-allowed");
            }
        });

        function switchTab(tabNumber) {
            // Hide both tabs initially
            document.getElementById('tab1').style.display = 'none';
            document.getElementById('tab2').style.display = 'none';

            // Remove active class from both buttons
            document.getElementById('payPalBtn').classList.remove('active');
            document.getElementById('convergePayBtn').classList.remove('active');

            // Show the selected tab
            if (tabNumber === 1) {
                document.getElementById('tab1').style.display = 'block';
                document.getElementById('payPalBtn').classList.add('active');
            } else if (tabNumber === 2) {
                document.getElementById('tab2').style.display = 'block';
                document.getElementById('convergePayBtn').classList.add('active');
            }
        }

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

                    toastr.success("{{ __('pay.PAYMENT_VERIFIED') }}");

                },
                error: function(xhr) {
                    toastr.error("{{ __('pay.PAYMENT_ERROR') }}");
                    console.error(xhr.responseJSON);
                    refresh();
                }
            });
        }

        refresh();

        function refresh() {
            $.ajax({
                url: "{{ route('panel.event.pay.get', ['id' => $currentEventId]) }}",
                type: 'POST',
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
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
                        <th>{{ __('pay.SUBTOTAL') }}</th>
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
        }


        $("#country").on("change", function() {
            $("#province").empty();
            const postalCodeInput = $("#postalCode");

            if (this.value == "canada") {
                postalCodeInput.val("");
                postalCodeInput
                    .attr("type", "text") // Allow letters and numbers
                    .attr("placeholder", "Postal Code*") // Update placeholder
                    .attr("pattern", "[A-Za-z]\\d[A-Za-z][ -]?\\d[A-Za-z]\\d") // Canadian postal code regex
                    .attr("maxlength", "7") // Max length for postal code, including space
                    .attr("title", "Enter a valid Canadian postal code (e.g., K1A 0B1)"); // Tooltip

                $("#usaTable").addClass("d-none");
                $("#canadaTable").removeClass("d-none");

                $("#canBtn").removeClass("d-none");
                $("#usaBtn").addClass("d-none");

                $("#province").append(`
                    <select name="" id="select-2">
                        <option selected disabled>Province*</option>
                        <option value="AB">Alberta - AB</option>
                        <option value="BC">British Columbia - BC</option>
                        <option value="MB">Manitoba - MB</option>
                        <option value="NB">New Brunswick - NB</option>
                        <option value="NL">Newfoundland and Labrador - NL</option>
                        <option value="NS">Nova Scotia - NS</option>
                        <option value="ON">Ontario - ON</option>
                        <option value="PE">Prince Edward Island - PE</option>
                        <option value="QC">Quebec - QC</option>
                        <option value="SK">Saskatchewan - SK</option>
                        <option value="NT">Northwest Territories - NT</option>
                        <option value="NU">Nunavut - NU</option>
                        <option value="YT">Yukon - YT</option>
                    </select>
                `);

            }

            if (this.value == "us") {

                postalCodeInput.val("");
                postalCodeInput
                    .attr("type", "number") // Restrict to numbers
                    .removeAttr("pattern") // Remove pattern validation
                    .removeAttr("maxlength") // Remove max length for numbers
                    .attr("placeholder", "Zip Code*") // Update placeholder
                    .attr("title", "Enter a valid U.S. zip code (e.g., 90210)"); // Tooltip

                $("#usaTable").removeClass("d-none");
                $("#canadaTable").addClass("d-none");

                $("#canBtn").addClass("d-none");
                $("#usaBtn").removeClass("d-none");

                $("#province").append(`
                    <select name="" id="select-2">
                        <option selected disabled>State/Territory*</option>
                        <option value="AL">Alabama - AL</option>
                        <option value="AK">Alaska - AK</option>
                        <option value="AZ">Arizona - AZ</option>
                        <option value="AR">Arkansas - AR</option>
                        <option value="CA">California - CA</option>
                        <option value="CO">Colorado - CO</option>
                        <option value="CT">Connecticut - CT</option>
                        <option value="DE">Delaware - DE</option>
                        <option value="FL">Florida - FL</option>
                        <option value="GA">Georgia - GA</option>
                        <option value="HI">Hawaii - HI</option>
                        <option value="ID">Idaho - ID</option>
                        <option value="IL">Illinois - IL</option>
                        <option value="IN">Indiana - IN</option>
                        <option value="IA">Iowa - IA</option>
                        <option value="KS">Kansas - KS</option>
                        <option value="KY">Kentucky - KY</option>
                        <option value="LA">Louisiana - LA</option>
                        <option value="ME">Maine - ME</option>
                        <option value="MD">Maryland - MD</option>
                        <option value="MA">Massachusetts - MA</option>
                        <option value="MI">Michigan - MI</option>
                        <option value="MN">Minnesota - MN</option>
                        <option value="MS">Mississippi - MS</option>
                        <option value="MO">Missouri - MO</option>
                        <option value="MT">Montana - MT</option>
                        <option value="NE">Nebraska - NE</option>
                        <option value="NV">Nevada - NV</option>
                        <option value="NH">New Hampshire - NH</option>
                        <option value="NJ">New Jersey - NJ</option>
                        <option value="NM">New Mexico - NM</option>
                        <option value="NY">New York - NY</option>
                        <option value="NC">North Carolina - NC</option>
                        <option value="ND">North Dakota - ND</option>
                        <option value="OH">Ohio - OH</option>
                        <option value="OK">Oklahoma - OK</option>
                        <option value="OR">Oregon - OR</option>
                        <option value="PA">Pennsylvania - PA</option>
                        <option value="RI">Rhode Island - RI</option>
                        <option value="SC">South Carolina - SC</option>
                        <option value="SD">South Dakota - SD</option>
                        <option value="TN">Tennessee - TN</option>
                        <option value="TX">Texas - TX</option>
                        <option value="UT">Utah - UT</option>
                        <option value="VT">Vermont - VT</option>
                        <option value="VA">Virginia - VA</option>
                        <option value="WA">Washington - WA</option>
                        <option value="WV">West Virginia - WV</option>
                        <option value="WI">Wisconsin - WI</option>
                        <option value="WY">Wyoming - WY</option>
                        <option value="AS">American Samoa - AS</option>
                        <option value="GU">Guam - GU</option>
                        <option value="MP">Northern Mariana Islands - MP</option>
                        <option value="PR">Puerto Rico - PR</option>
                        <option value="VI">U.S. Virgin Islands - VI</option>
                        <option value="DC">District of Columbia - DC</option>
                    </select>
                `);
            }

            $('#select-2').select2({
                dropdownCssClass: "custom-select-dropdown", // Style for the dropdown
                selectionCssClass: "custom-select-selection", // Style for the selection box
                minimumResultsForSearch: 0, // Always show the search box
            });
        });

        $("#cancelBtn").on("click", function() {
            url = "{{ route('panel.event.generalInfos', ['id' => $currentEventId]) }}";
            window.location.href = url;
        });
    </script>
@endsection
