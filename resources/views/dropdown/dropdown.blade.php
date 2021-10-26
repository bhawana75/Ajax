<!DOCTYPE html>
<html lang="en">
<head>
  <title> Dependent Dropdown using Jquery Ajax </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2>Dynamic Dependent Dropdown using Jquery Ajax</h2>
  <form action="{{ route('dropdown.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="form-group">
      <label for="province">Province:</label>
   <select id="province" name="province_id" class="form-control">
        <option value="" selected disabled>Select Province</option>
         @foreach($provinces as $key => $province)
         <option value="{{$key}}"> {{$province->provincename}}</option>
         @endforeach
         </select>
    </div>
    <div class="form-group">
      <label for="district">District:</label>
      <select name="district_id" id="district" class="form-control"></select>
    </div>
  <div class="form-group">
      <label for="locallevel">LocalLevel:</label>
      <select name="locallevel_id" id="locallevel" class="form-control"></select>
    </div>
    <input type="submit" value="submit" class="submitbtn">
</form>
</div>
<script type=text/javascript>
  $('#province').change(function(){
  var provinceId = $(this).val(); 
  if(provinceId){

    $.ajax({
      type:"GET",
      url:"{{url('getdistrict')}}?province_id="+provinceId,
      success:function(res){        
      if(res){
        $("#district").empty();
        $("#district").append('<option>Select District</option>');
        $.each(res,function(key,value){
          $("#district").append('<option value="'+key+'">'+value+'</option>');
        });
      }else{
        $("#district").empty();
      }
      }
    });
  }else{
    $("#district").empty();
    $("#locallevel").empty();
  }  
  });
  $('#district').on('change',function(){
  var districtId = $(this).val();  
  if(districtId){
    $.ajax({
      type:"GET",
      url:"{{url('getlocallevel')}}?district_id="+districtId,
      success:function(res){        
      if(res){
        $("#locallevel").empty();
 $("#locallevel").append('<option>Select LocalLevel</option>');
        $.each(res,function(key,value){
          $("#locallevel").append('<option value="'+key+'">'+value+'</option>');
        });
      }else{
        $("#locallevel").empty();
      }
      }
    });
  }else{
    $("#locallevel").empty();
  }
  });
</script>

</body>
</html>