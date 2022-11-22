<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload form</title>
</head>
<body>


<h1>Currency Rates</h1>

<br>
<hr>
<br>
<div style="padding: 10px">
    <b>USD</b> - {{ $rates['USD'] }},
</div>
<div style="padding: 10px">
    <b>EUR</b> - {{ $rates['EUR'] }}
</div>

</body>
</html>