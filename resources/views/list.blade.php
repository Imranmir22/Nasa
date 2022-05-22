<table border=1>
    <tr>
        <td>Name</td>
        <td>Email</td>
        <td>Phone</td>
        <td>File</td>
    </tr>
@foreach ($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->phone }}</td>
        <td>{{ $user->file }}</td>

    </tr>
@endforeach
</table>
<h3>
   
</h3>