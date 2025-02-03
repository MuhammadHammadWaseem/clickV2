<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Package Purchase Notification</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px; text-align: center;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0"
        style="max-width: 600px; margin: auto; background-color: #ffffff; border: 1px solid #ddd; padding: 20px;">
        <tr>
            <td style="background-color: #A9967D; padding: 20px; text-align: center;">
                <img src="{{ url('assets/images/logo/logoNewWhite.png') }}" alt="Logo"
                    style="max-width: 150px; margin-bottom: 10px;">
            </td>
        </tr>
        <tr>
            <td style="padding: 20px; text-align: center;">
                <p style="font-size: 18px; color: #333;">Hello Admin,</p>

                <p style="font-size: 18px; color: #333;">
                    A new package purchase has been made on ClickInvitation.
                </p>

                <p style="font-size: 18px; color: #333;">
                    <strong>User:</strong> {{ $userName }}
                </p>

                <p style="font-size: 18px; color: #333;">
                    <strong>Package:</strong> <span style="color: #A9967D;">{{ $package['name'] }}</span>
                </p>

                <p style="font-size: 18px; color: #333;">
                    <strong>Price:</strong> <span
                        style="color: #A9967D;">${{ number_format($package['price'], 2) }}</span>
                </p>

                <p style="font-size: 18px; color: #333;">
                    Please review the purchase details and take any necessary actions.
                </p>

                <p style="font-size: 18px; color: #333; font-weight: bold;">
                    Best regards,<br>
                    <span style="color: #A9967D;">ClickInvitation</span>
                </p>
            </td>
        </tr>
    </table>
</body>

</html>
