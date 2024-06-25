@include('layouts.userheader')

<!DOCTYPE html>
<html>
<head>
    <title>Luxury Resorts Background</title>
    <style>
        body {
            background-image: url("{{ asset('images/home-background.jpg') }}");
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
        }
    </style>
</head>
<body>
    <div style="text-align: center; color: #FFFFFF;">
            <p style="margin-top: 202px;">TRAVELX</p>
            <h1 style="margin-top: 5px;font-size: 54px;">Let's Embark On Your <br>Dream Journey</h1>
            <p style="font-weight: bolder;">Discover Inspiring Destinations, Create Unforgettable Memories, And <br> Travel With Confidence - Your Adventure Starts Here.</p>
    </div>
</body>
</html>