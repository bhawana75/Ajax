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
  <table class="table" style="width:60%">
    <thead>
      <tr>
        <th scope="col">Province Name</th>
        <th scope="col">District Name</th>
        <th scope="col">Locallevel Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($dropdowns as $dropdown)
        <tr>
          <td>{{ $dropdown->provincename }}</td>
          <td>{{ $dropdown->districtname }}</td>
          <td>{{ $dropdown->locallevelname}}</td>
          <td>
            <form action="{{ route('dropdown.destroy',$dropdown->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this?')">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
    
</body>
</html>