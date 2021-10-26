<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <style>
      table,th,td
    {
      margin:80px;
      border:2px solid black;
      border-collapse:collapse;
      padding:10px;
      width:10%
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
  <div class= "container">
<table class="table" style="width:60%">
  <thead>
    <tr>
      <th scope="col">Province Name</th>
    </tr>
  </thead>
  <tbody>
    @foreach($provinces as $province)
  <tr>
    <td>{{ $province->provincename }}</td>
  </tr>
  @endforeach
 

  </tbody>
</table>
</div>
    
</body>
</html>