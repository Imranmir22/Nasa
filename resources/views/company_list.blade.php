<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container">
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Website</th>
        <th scope="col">Edit</th>

      </tr>
    </thead>
    @foreach ($companies  as $key=>$company )
    <tbody>
        <tr>
          <th scope="row">{{ $key+1 }}</th>
          <td>{{ $company->name }}</td>
          <td>{{ $company->email }}</td>
          <td>{{ $company->website }}</td>
         
          <td>
            <a href={{  url('/')."/company/edit_with_gate_policies/$company->id" }}>Edit</a>

            {{-- <a href={{  url("/company/edit_with_gate_policies/$company->id") }}>Edit</a> --}}

          </td>

        </tr>
       
      </tbody>
    @endforeach
  
  </table>
</div>