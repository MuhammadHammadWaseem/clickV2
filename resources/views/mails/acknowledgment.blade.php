<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

    </style>
</head>

<body style="background:#fff;">
    <br><br>

    @php
        $imagePath = 'storage/uploads/acknowledgment.jpg';
        $fullPath = public_path($imagePath);
        $imageUrl = file_exists($fullPath) ? url($imagePath) . '?t=' . filemtime($fullPath) : '';
    @endphp

    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody  width="100%">
            <tr>
                <td align="center" style="padding:0 10px;color:#777777"><br>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:650px">
                        <tbody>
                            <tr>
                                <td align="center" valign="top">
                                    <table width="100%" cellpadding="0" bgcolor="white!important" cellspacing="0"
                                        style="background-color:white!important;width:100%;border-radius:10px;border:1px solid #e8e8e8;border-collapse:separate">
                                        <tbody>
                                            <tr>
                                                <td
                                                    style="background-color:#5a5a5a;text-align:center;padding:10px 15px;border-radius:10px 10px 0px 0px">
                                                    <table width="100%" cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td valign="top" style="color:#ffffff"><img
                                                                        src="https://clickinvitation.com//assets/images/logo/logoNewWhite.png"
                                                                        alt="Click Invitation"
                                                                        style="vertical-align:middle; width: 125px;"
                                                                        class="CToWUd" data-bit="iit"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                {{-- <td @if (!empty($event->ack_image) && file_exists(public_path("storage/$event->ack_image")))
                                                    style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                                                           url('{{ asset("storage/$event->ack_image") }}') no-repeat center center;
                                                           background-size: cover;
                                                           padding: 0px 15px 50px 0px;
                                                           font-family: 'Open Sans', Helvetica, Arial;
                                                           font-size: 14px;
                                                           text-align: center;
                                                           color: white;"
                                                @else
                                                    style="padding: 0px 15px 50px 0px;
                                                           font-family: 'Open Sans', Helvetica, Arial;
                                                           font-size: 14px;
                                                           text-align: center;"
                                                @endif> --}}
                                            
                                                <td @if (!empty($event->ack_image) && file_exists(public_path($event->ack_image)))
                                                    style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                                                           url('{{ asset($event->ack_image) }}') no-repeat center center;
                                                           background-size: cover;
                                                           padding: 0px 15px 50px 0px;
                                                           font-family: 'Open Sans', Helvetica, Arial;
                                                           font-size: 14px;
                                                           text-align: center;
                                                           color: white;"
                                                @endif>
                                                
                                                



                                                    <br>
                                                    <br>
                                                    <br>

                                                    <p style="font-size:16px;color:#0e0e0e;text-align:center">
                                                        @if (is_object($event))
                                                        {{-- {{ strip_tags($event->atitle) }} --}}
                                                        <center>{!! html_entity_decode($event->atitle) !!}</center>
                                                        @endif
                                                    </p>
                                                    <br>
                                                    <p style="font-size:16px;color:#0e0e0e;text-align:center">
                                                        @if (is_object($event))
                                                            {{-- {{ strip_tags($event->atext) }} --}}
                                                            <center>
                                                                {!! html_entity_decode($event->asubtitle) !!}
                                                            </center>
                                                            @endif
                                                        </p>
                                                        <br>
                                                        <p style="font-size:16px;color:#0e0e0e;text-align:center">
                                                            @if (is_object($event))
                                                            {{-- {{ strip_tags($event->asubtitle) }} --}}
                                                            <center>
                                                                {!! html_entity_decode($event->atext) !!}
                                                            </center>
                                                        @endif
                                                    </p>

                                                    <br>
                                                    <br>
                                                    <br>

                                                    <center>

                                                        @if (!$fake)
                                                        <a style="font-family:'Open Sans',Helvetica,Arial;font-size:14px; text-decoration:none;background-color:#242424;border-radius:5px;color:#ffffff;font-size:14px;padding:12px 30px;margin-bottom:10px;display:inline-block;text-transform:uppercase;white-space:nowrap"
                                                            href="{{ config('app.url') }}/add-photos/ack/{{ $cardId }}/{{ $guest->code }}/{{ $lang }}">
                                                            Go to Gallery
                                                        </a>
                                                    @endif

                                                    @if ($fake)
                                                        <a style="font-family:'Open Sans',Helvetica,Arial;font-size:14px; text-decoration:none;background-color:#242424;border-radius:5px;color:#ffffff;font-size:14px;padding:12px 30px;margin-bottom:10px;display:inline-block;text-transform:uppercase;white-space:nowrap"
                                                            href="">
                                                            Go to Gallery
                                                        </a>
                                                    @endif
                                                    <a style="font-family:'Open Sans',Helvetica,Arial;font-size:14px; text-decoration:none;background-color:#242424;border-radius:5px;color:#ffffff;font-size:14px;padding:12px 30px;margin-bottom:10px;display:inline-block;text-transform:uppercase;white-space:nowrap"
                                                        href="{{ config('app.url') }}/website/{{ $event->id_event }}">
                                                        GO TO WEBSITE
                                                    </a>
                                                </center>
                                                </td>
                                            </tr>

                                            {{-- <tr>
                                                <td style="padding:0px 15px 50px 0px;font-family:"Open
                                                    Sans",Helvetica,Arial;font-size:14px;">
                                                    <center>

                                                        @if (!$fake)
                                                        <a style="font-family:'Open Sans',Helvetica,Arial;font-size:14px; text-decoration:none;background-color:#242424;border-radius:5px;color:#ffffff;font-size:14px;padding:12px 30px;margin-bottom:10px;display:inline-block;text-transform:uppercase;white-space:nowrap"
                                                            href="{{ config('app.url') }}/add-photos/ack/{{ $cardId }}/{{ $guest->code }}/{{ $lang }}">
                                                            Go to Gallery
                                                        </a>
                                                    @endif

                                                    @if ($fake)
                                                        <a style="font-family:'Open Sans',Helvetica,Arial;font-size:14px; text-decoration:none;background-color:#242424;border-radius:5px;color:#ffffff;font-size:14px;padding:12px 30px;margin-bottom:10px;display:inline-block;text-transform:uppercase;white-space:nowrap"
                                                            href="">
                                                            Go to Gallery
                                                        </a>
                                                    @endif
                                                    <a style="font-family:'Open Sans',Helvetica,Arial;font-size:14px; text-decoration:none;background-color:#242424;border-radius:5px;color:#ffffff;font-size:14px;padding:12px 30px;margin-bottom:10px;display:inline-block;text-transform:uppercase;white-space:nowrap"
                                                        href="{{ config('app.url') }}/website/{{ $event->id_event }}">
                                                        GO TO WEBSITE
                                                    </a>
                                                </center>
                                                </td>
                                            </tr> --}}

                                            <tr>
                                                <td
                                                    style="background-color:#777;text-align:center;padding:10px 15px;border-radius:0 0 10px 10px">
                                                    <table width="100%" cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td valign="top" style="color:#ffffff">Powered
                                                                    by&nbsp;&nbsp;&nbsp;<img
                                                                        src="https://clickinvitation.com//assets/images/logo/logoNewWhite.png"
                                                                        alt="Click Invitation"
                                                                        style="vertical-align:middle; width: 115px;"
                                                                        class="CToWUd" data-bit="iit"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td
                                                    style="padding-top:10px;padding-bottom:20px;text-align:center;line-height:2;color:#777777;font-size:12px">
                                                    <p> This is an automated message please do not reply.<br>
                                                        Clickinvitation.com <?php echo date('Y'); ?>. All rights reserved.<br>
                                                        <a style="color:rgb(61, 0, 243);"
                                                            href="mailto:info@clickinvitation.com">info@clickinvitation.com</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <a style="color:rgb(61, 0, 243);" href="{{ config('app.url') }}/privacy-policy">Privacy
                                                            Policy</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <a style="color:rgb(61, 0, 243);" href="{{ config('app.url') }}/terms-of-use">Terms and
                                                            Conditions</a>
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

    <br>

</body>

</html>
