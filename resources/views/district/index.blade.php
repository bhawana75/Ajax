<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <style>
      table,th,td
    {
      margin:100px;
      border:2px solid black;
      border-collapse:collapse;
      padding:10px;
      
    }
    th{
  text-align:center;
  color:white;
  background-color:#35586C;
  
}
td{
  color:blue;
  text-align:center;
 
}

      </style>
</head>
<body>
<table class="table" style="width:60%">
  <thead>
    <tr>
      <th scope="col">Province Name</th>
      <th scope="col">District Name</th>
    </tr>
  </thead>
  <tbody>
    @foreach($districts as $district)
  <tr>
    
    <td>{{ $district->provincename }}</td>
    <td>{{ $district->districtname }}</td>
  </tr>
  @endforeach
 

  </tbody>
</table>
    
</body>
</html>