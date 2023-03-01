<!DOCTYPE html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

<body>
    <a href="dashboard" style="color:blue">Dashboard</a><br>
    <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>first name</th>
            <th>last name</th>
            <th>Gender</th>
            <th>company id</th>
            <th>email</th>
            <th>phone</th>
            <th>Update Employee</th>
            <th>Delete employee</th>
          </tr>
        </thead>
        <tbody>
            @foreach($response as $res)
            <tr>
                <td>
                    {{ $res->id }}
                 </td>
                <td>
                   {{ $res->first_name }}
                </td>
                <td>
                    {{ $res->last_name }}
                 </td>
                 <td>
                    {{ $res->gender }}
                 </td>
                 <td>
                    {{ $res->company_id }}
                 </td>
                 <td>
                    {{ $res->email }}
                 </td>
                 <td>
                    {{ $res->phone }}
                 </td>
                 <td>
                 <a href="get-employee/{{ $res->id }}" color: rgb(241 245 249);> Update</a>
                 </td>
                 <td>
                    <form method=POST action="employee/{{$res->id }}" onclick="confirm('all employess in this company will also be deleted')">
                        @csrf
                        @method("DELETE")
                        <input type="submit" value="Delete">
                    </form>
                  {{-- <a href="employee/{{ $res->id }}" color: rgb(241 245 249); > Delete</a> --}}
                 </td>
                
            </tr>
        @endforeach
          
        </tbody>
      </table>
    {{ $response->links() }}

</body>
</html>