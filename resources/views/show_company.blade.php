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
           
          </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    {{ $response->id }}
                 </td>
                <td>
                   {{ $response->name }}
                </td>
                <td>
                    {{ $response->email }}
                 </td>
                 <td>
                    {{ $response->website }}
                 </td>
                <td>
                    <img src={{ Storage::url($response->logo) }}>
                </td>
                 
            </tr>
          
        </tbody>
      </table>
  
</body>
</html>

