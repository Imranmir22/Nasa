<!DOCTYPE html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

<body>

    <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>first name</th>
            <th>last name</th>
            <th>Email</th>
            <th>phone</th>
            <th>Address</th>
            <th>Pincode</th>
            <th>Aadhar</th>
            <th>Account Number</th>

          </tr>
        </thead>
        <tbody>
           @foreach ($data as $response)
               
         
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
                    {{ $response->email }}
                 </td>
                 <td>
                    {{ $response->phone }}
                 </td>
                 <td>
                    {{ $response->address }}
                 </td>
                 <td>
                    {{ $response->pincode }}
                 </td> 
                 <td>
                    {{ $response->aadhar }}
                 </td> <td>
                    {{ $response->account_number }}
                 </td>
            </tr>
            @endforeach
          
        </tbody>
      </table>
</body>
</html>