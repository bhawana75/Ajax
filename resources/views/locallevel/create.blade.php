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
    <form action="{{ route('locallevel.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <strong>Province Name</strong>
                <select class="one" name="province_id">
                @foreach($province as $g)
                <option value="{{$g->id}}">{{$g->provincename}}</option>
                @endforeach
                </select><br>

            <strong>District Name</strong>
                <select class="one" name="district_id">
                @foreach($district as $g)
                <option value="{{$g->id}}">{{$g->districtname}}</option>
                @endforeach
            </select><br>
            
            <strong> Locallevel Name:</strong>
            <input type="text" name="locallevelname" class="form-control hello"  >
            @error('locallevelname')
            <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
            @enderror

            <input type="submit" value="submit" class="submitbtn">
        </div>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>