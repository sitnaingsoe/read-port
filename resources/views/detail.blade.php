


<!DOCTYPE html>
<html lang="en">
    @include('component.user-head')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <script src="https://kit.fontawesome.com/835534c7a0.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
</head>
<body>   
    @include('component.user-header')
    <div class="bookContainer"></div>
    <div class="bookDetailForShow"></div>
    
    <script src="{{ asset('js/detail.js') }}"></script>
</body>
</html>