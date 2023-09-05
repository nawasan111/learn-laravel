<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </head>
  <body>
      <h1><center>HOME: VIEW ALL STUDENTS</center></h1>            
    <div class="container">
      <p>
        <button class="btn btn-primary" id="switch-btn" onclick="ChCom('show')">show</button>
        <button class="btn btn-primary" id="switch-btn" onclick="ChCom('create-student')">create student</button>
      </p>
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
     <div id="table" class="table-container">

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
            <button class="btn btn-warning" type="submit">edit</button>
          {{-- </form> --}}
        </td>
        <td>
          <form action="/student?id={{ $tmp['id'] }}" method="post">
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
            @method('delete')
            @csrf
          </form>
        </td>

      </tr>

        <?php }  ?>
    </tbody>
  </table>
     </div>

     <div id="create-student">
        <h3>add student</h3>
        <form class="form-control my-3" action="/student" method="POST">
            {{ csrf_field() }}
            <div>
                <label class="form-label" for="">fullname</label>
                <input class="form-control" name="fullname" type="text">
            </div>
            <div>
                <label class="form-label" for="">program</label>
                <input class="form-control" type="text" name="program" id="">
            </div>
            <div>
                <label class="form-label" for="">income</label>
                <input class="form-control" name="income" type="text">
            </div>
            <div>
                <label class="form-label" for="gpa">gpa</label>
                <input class="form-control" type="text" name="gpa" id="">
            </div>
            <div class="m-3">
                <button class="btn btn-outline-primary">submit</button>
            </div>
        </form>
     </div>
  </div>
  <br><br>
  <script src="/script.js"></script>
  </body>
</html>