<!DOCTYPE html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
<script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: '#da373d',
          }
        }
      }
    }
  </script>
<body>
    <a href="dashboard" style="color:blue">Dashboard</a><br>
    <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
         
            <th>email</th>
            <th>website</th>

            <th>Logo</th>
            <th>Update Company</th>
            <th>Delete Company</th>
          </tr>
        </thead>
        <tbody>
            @foreach($response as $res)
            <tr>
                <td>
                    {{ $res->id }}
                 </td>
                <td>
                   {{ $res->name }}
                </td>
                <td>
                    {{ $res->email }}
                 </td>
                 <td>
                    {{ $res->website }}
                 </td>
                <td>
                    <img src={{ Storage::url($res->logo) }} style="max-width: 100%;" class="h-16 w-16 object-cover rounded-full">
                </td>
                 <td>
                 <a href="update-company/{{ $res->id }}" color: rgb(241 245 249);> Update</a>
                 </td>
                 <td>
                  
                    <form method=POST  onsubmit="return confirm('Do you really want to delete company and associated employees?');"   action="company/{{$res->id }}" >
                        @csrf
                        @method("DELETE")
                        <input type="submit" id="form" value="Delete" >
                    </form>
                 </td>
                
            </tr>
        @endforeach
          
        </tbody>
      </table>
    {{ $response->links() }}

</body>
</html>
