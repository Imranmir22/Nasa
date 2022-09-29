<!DOCTYPE html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<body>
    <a href= {{  URL::to("/dashboard") }} style="color:blue">Dashboard</a><br>
    <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>first name</th>
            <th>last name</th>
            <th>company id</th>
            <th>email</th>
            <th>phone</th>
     
          </tr>
        </thead>
        <tbody>
           
            <tr>
                <td>
                    {{ $response->id }}
                 </td>
                <td>
                   {{ $response->first_name }}
                </td>
                <td>
                    {{ $response->last_name }}
                 </td>
                 <td>
                    {{ $response->company_id }}
                 </td>
                 <td>
                    {{ $response->email }}
                 </td>
                 <td>
                    {{ $response->phone }}
                 </td>
             
            </tr>
       
          
        </tbody>
      </table>
   

</body>
</html>