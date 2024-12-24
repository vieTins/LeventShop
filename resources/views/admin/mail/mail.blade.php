<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    /* Default table styling */
    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      border: 1px solid #000; 
      padding: 10px;
      text-align: left;
    }
  </style>
</head>
<body>
  <div style="padding: 20px;">
    <h3 style="text-align: center;">
      {{ $name }}
    </h3>
    <hr style="border: 1px solid #ddd;">
    <div>
      {!! $body !!}
    </div>
  </div>
</body>
</html>
