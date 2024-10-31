<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Invitation</title>
</head>

<body style="background: #fff!important;">
    <br><br>

    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
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
                                                                <td valign="top" style="color:#ffffff">
                                                                    <img
                                                                        src="https://clickinvitation.com//assets/images/logo/logoNewWhite.png"
                                                                        alt="Click Invitation"
                                                                        style="vertical-align:middle; width: 125px;"
                                                                        class="CToWUd" data-bit="iit">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="padding:0 15px 0 15px;font-family:'Open Sans',Helvetica,Arial;font-size:14px; text-align:center;">
                                                    <br>
                                                    <p style="font-size:16px;color:#333333;text-align:center">
                                                        {{ $data['event']['groomfname'] }} &amp; {{ $data['event']['bridefname'] }} vous a
                                                        envoyé une invitation pour
                                                    </p>
                                                    <p style="font-size:24px;color:#333333;text-align:center">
                                                        Mariage de {{ $data['event']['groomfname'] }} &amp;
                                                        {{ $data['event']['bridefname'] }}
                                                    </p>
                                                    <p style="font-size:14px;text-align:center">{{ $data['formattedDate'] }}</p>
                                                    <p style="margin-top:20px"></p>
                                                    <p style="text-align:center">
                                                        <a href="{{ env('APP_URL') .'/'. 'cardInvitations/' . $data['cardId']['id_card'] . '/' . $data['guest']['code'] . '/' . $data['guest']['name'] . '/' . $data['lang'] }}"
                                                            style="text-decoration:none;background-color:#242424;border-radius:5px;color:#ffffff;font-size:14px;padding:12px 30px;margin-bottom:10px;display:inline-block;text-transform:uppercase;white-space:nowrap"
                                                            target="_blank"
                                                            onmouseover="this.style.backgroundColor='#333333'; this.style.boxShadow='0 0 5px rgba(0, 0, 0, 0.5)';"
                                                            onmouseout="this.style.backgroundColor='#242424'; this.style.boxShadow='none';">Ouvrir
                                                            Invitation</a>
                                                    </p>
                                                    <p style="text-align:center">
                                                        <a href="{{ env('APP_URL') .'/'. 'CheckInQr/' . $data['cardId']['id_card'] . '/' . $data['guest']['code'] . '/' . $data->lang }}"
                                                            style="text-decoration:none;background-color:#242424;border-radius:5px;color:#ffffff;font-size:14px;padding:12px 30px;margin-bottom:10px;display:inline-block;text-transform:uppercase;white-space:nowrap"
                                                            target="_blank"
                                                            onmouseover="this.style.backgroundColor='#333333'; this.style.boxShadow='0 0 5px rgba(0, 0, 0, 0.5)';"
                                                            onmouseout="this.style.backgroundColor='#242424'; this.style.boxShadow='none';">Enregistrement</a>
                                                    </p>
                                                    <p style="text-align:center"><a
                                                            href="{{ env('APP_URL') .'/'. 'cardInvitations/' . $data['cardId']['id_card'] . '/' . $data['guest']['code'] . '/' . $data['guest']['name'] . '/' . $data['lang'] }}"
                                                            target="_blank">
                                                            <img src="{{ asset(config('app.url') . '/card-images/'  . ($data['event']['id_event'] ?? 'default') . '.png') }}"
                                                                border="0" style="margin-bottom:20px;max-width:100%"
                                                                class="CToWUd" data-bit="iit"></a>
                                                    </p>

                                                    @if ($data['event']['type'] == 'CORPORATE')
                                                        <p style="font-style:italic;font-size:13px;text-align:center">
                                                            Tableau: {{ $guestTable->name ?? '-' }} Siège:
                                                            {{ $guestTable->guest_number ?? '-' }}
                                                        </p>
                                                        <br />
                                                    @endif

                                                    <p style="font-style:italic;font-size:13px;text-align:center">
                                                        Cet e-mail est personnalisé pour vous. Merci de ne pas
                                                        transmettre.
                                                    </p>
                                                    <br />

                                                    <table width="70%" cellpadding="0" cellspacing="0"
                                                        style="margin:0 auto;text-align:center;margin-bottom:10px;border-top:1px solid #ebe9e9;font-size:14px;color:#777777">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <p style="font-weight:bold;margin:15px 5px 5px 5px">
                                                                        Cérémonie</p>
                                                                    <p style="margin:5px">
                                                                        {{ $data['event']['ceraddress'] }},
                                                                        {{ $data['event']['cercity'] }},
                                                                        {{ $data['event']['cercountry'] }},
                                                                        {{ $data['event']['cerprovince'] }}, {{ $data['event']['cerpc'] }}
                                                                        <a href="{{ $data['event']['cerAddressLink'] }}"
                                                                            style="margin-left:5px;color:#2bb573;text-decoration:none"
                                                                            target="_blank">(Voir la carte)</a>
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    <table width="100%" cellpadding="0" cellspacing="0"
                                                        style="margin:0 auto;text-align:center;border-top:1px solid #ebe9e9;background:#383838;font-size:14px;color:white;">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <p style="font-weight:bold;margin:15px 5px 5px 5px">
                                                                        Réception</p>
                                                                    <p style="margin:5px">
                                                                        {{ $data['event']['recaddress'] }},
                                                                        {{ $data['event']['reccity'] }},
                                                                        {{ $data['event']['reccountry'] }},
                                                                        {{ $data['event']['recprovince'] }}, {{ $data['event']['recpc'] }}
                                                                        <a href="{{ $data['event']['recAddressLink'] }}"
                                                                            style="margin-left:5px;color:#2bb573;text-decoration:none"
                                                                            target="_blank">(Voir la carte)</a>
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="background-color:#777;text-align:center;padding:10px 15px;border-radius:0 0 10px 10px">
                                                    <table width="100%" cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td valign="top" style="color:#ffffff">Alimenté par
                                                                    &nbsp;&nbsp;&nbsp;<img
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
                                                    Copyright © 2024 ClickInvitation. Tous droits réservés.<br>
                                                    +1 (438) 303-9948<br>
                                                    <a href="mailto:Info@Clickinvitation.Com"
                                                        target="_blank">Info@Clickinvitation.Com</a>
                                                    <a href="https://clickinvitation.com/contact"
                                                        target="_blank">clickinvitation.com/contact</a>
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
