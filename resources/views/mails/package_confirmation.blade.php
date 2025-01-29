<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px; text-align: center;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="max-width: 600px; margin: auto; background-color: #ffffff; border: 1px solid #ddd; padding: 20px;">
        <tr>
            <td style="background-color: #A9967D; padding: 20px; text-align: center;">
                <img src="{{ url('assets/images/dashboard-logo.png') }}" alt="Logo" style="max-width: 150px; margin-bottom: 10px;">
            </td>
        </tr>
        <tr>
            <td style="padding: 20px; text-align: center;">
                <p style="font-size: 18px; color: #333;">Hello {{ $userName }},</p>
                
                <p style="font-size: 18px; color: #333;">Thank you for purchasing the <strong style="color: #A9967D;">{{ $package['name'] }}</strong> package.</p>
                
                <p style="font-size: 18px; color: #333;">The package price is <strong style="color: #A9967D;">${{ number_format($package['price'], 2) }}</strong>.</p>
                
                <p style="font-size: 18px; color: #333;">Attached to this email, you’ll find a sample CSV file. Please download it, fill in your details, and upload it back to us. This will help us handle your event smoothly.</p>
                
                <p style="text-align: center; margin: 20px 0;">
                    <a href="{{ route('panel.event.upload.csv', ['id' => $eventId]) }}" 
                       style="display: inline-block; background-color: #A9967D; color: #ffffff; text-decoration: none; font-size: 18px; padding: 12px 25px; border-radius: 5px; font-weight: bold;">Upload CSV File</a>
                </p>
                
                <p style="font-size: 18px; color: #333;">For any questions or concerns, please don’t hesitate to contact us.</p>
                
                <p style="font-size: 18px; color: #333; font-weight: bold;">Best regards,<br><span style="color: #A9967D;">ClickInvitation</span></p>
            </td>
        </tr>
    </table>
</body>


</html>
