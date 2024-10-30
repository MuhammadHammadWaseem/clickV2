<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="background:#fff;">
    <p>
        Dear {{ $guest->name }}, <br /><br />
        Please select your meal for the {{ $event->name }} event. <br /><br />
        Thank you! <br /><br />
        <small>Click Invitation</small>
    </p>
</body>

</html>
