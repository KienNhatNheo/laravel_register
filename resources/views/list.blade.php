<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="width:50%;margin-left:25%;margin-top:3rem;margin-bottom:2rem">
    Current User: {{$dflog = session()->has('cur_username')?session()->get('cur_username'):'a' }}
        
    @if($dflog = 'a')
    <a href="{{ route('logout') }}"><button>Logout</button></a>
    @else
    <a href="{{ route('signin') }}"><button>Login</button></a>
    @endif
    <br>
    <div style="display:flex;justify-content:space-between">
      <a href="/list/add"><button>Thêm</button></a>
      <form action="{{ route('search') }}" method="POST">
        <input type="text" name="search" placeholder="Search ...">
        <input type="submit" value="Search">
        @csrf
      </form>
    </div>
    
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Name</th>
            <th scope="col">Class</th>
            <th scope="col">Age</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          @if (session()->get('cur_username') === "demo2")
            @foreach ($list as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->class }}</td>
                <td>{{ $item->age }}</td>
                <td><a href={{ '/list/edit/'.$item->id }}><button>Edit</button></td>
                <td><a href={{ '/list/delete/'.$item->id }}><button>Delete</button></td>
              </tr>  
            @endforeach
          @else
            @foreach ($list as $item)
              <tr>
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->class }}</td>
                  <td>{{ $item->age }}</td>
                  <td>No available</td>
                  <td>No available</td>
                </tr>  
            @endforeach
          @endif
           
        </tbody>
      </table>
      
</body>
</html>