
<head>
<style>
.customers{
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  }

.customers td, .customers th {
  border: 1px solid #ddd;
  padding: 8px;
  }


.customers tr:nth-child(even){background-color: #f2f2f2;}

.customers tr:hover {background-color: #ddd;}

.customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>
<div>
<table class="customers">
  <tr>
    <th>Email</th>
    <th>Name</th>
    <th>Date</th>
  </tr>
  @foreach($admins as $admin)
  <tr>
    <td>{{$admin->email}}</td>
    <td>{{$admin->name}}</td>
    <td>{{$admin->created_at->diffForHumans()}}</td>
  </tr>
  @endforeach
 
</table>
</div>

</body>




