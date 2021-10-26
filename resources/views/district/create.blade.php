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
<form action="{{ route('district.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="container">
    <strong>Province Name</strong>
    <select class="one" name="province_id">
    @foreach($province as $g)
       <option value="{{$g->id}}">{{$g->provincename}}</option>
       @endforeach
</select><br>
<strong> District Name:</strong>
<input type="text" name="districtname" class="form-control hello"  >
@error('districtname')

<div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
@enderror
<input type="submit" value="submit" class="submitbtn">
</div>
</form>
    
</body>
</html>