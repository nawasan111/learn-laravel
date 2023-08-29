<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
      <h1><center>HOME: VIEW ALL STUDENTS</center></h1>            
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>First name</th>
        <th>Lastname</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        
        <td><a href="{{action('StudentController@edit', $tmp['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('StudentController@destroy', $tmp['id'])}}" method="post">
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>

    </tbody>
  </table>
  </div>
  </body>
</html>