<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<form action="{{ route('province.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="container">
<strong> Province Name:</strong>
<input type="text" name="provincename" class="form-control hello"  >
@error('provincename')
<div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
@enderror
<input type="submit" value="submit" class="submitbtn">
</div>
</form>
    
</body>
</html>