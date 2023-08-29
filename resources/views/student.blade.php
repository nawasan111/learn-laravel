<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <style>
        table {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            border: 1px solid black;
        }
        th,tr, td {
            padding: 10px;
        }
        @media only screen and (max-width: 600px) {
            .table-container {
            overflow-x: scroll;
        }
}
    </style>
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
     <div class="table-container">

    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>fullname</th>
        <th>program</th>
        <th>income</th>
        <th>gpa</th>
        <th>edit</th>
        <th>delete</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach ($students as $tmp) { ?>
        <tr>
       <td>
        {{-- <a href="{{action('StudentController@edit', $tmp['id'])}}" class="btn btn-warning">Edit</a> --}}
        {{$tmp['id']}}
        </td>
         <td>{{ $tmp['fullname']}}</td>
         <td>{{ $tmp['program']}}</td>
         <td>{{ $tmp['income']}}</td>
         <td>{{ $tmp['gpa']}}</td>

        <td>
          {{-- <form action="{{action('StudentController@destroy', $tmp['id'])}}" method="post"> --}}
            <input name="_method" type="hidden" value="EDIT">
            <button class="btn btn-danger" type="submit">edit</button>
          {{-- </form> --}}
        </td>
        <td>
          {{-- <form action="{{action('StudentController@destroy', $tmp['id'])}}" method="post"> --}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          {{-- </form> --}}
        </td>

      </tr>

        <?php }  ?>
    </tbody>
  </table>
     </div>

     <div style="text-align: center;margin: 10px;">
        <h3>add student</h3>
        <form action="/student" method="POST">
            {{ csrf_field() }}
            <div>
                <label for="">fullname</label>
                <input name="fullname" type="text">
            </div>
            <div>
                <label for="">program</label>
                <input type="text" name="program" id="">
            </div>
            <div>
                <label for="">income</label>
                <input name="income" type="text">
            </div>
            <div>
                <label for="gpa">gpa</label>
                <input type="text" name="gpa" id="">
            </div>
            <div>
                <button>submit</button>
            </div>
        </form>
     </div>
  </div>
  </body>
</html>