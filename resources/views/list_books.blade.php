<script src="https://cdn.tailwindcss.com"></script>
@include('components.navbar')

<div class="container">
<table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">thumbnail</th>
        <th scope="col">small thumbnail</th>
        <th scope="col">title</th>
        <th scope="col">sub title</th>
        <th scope="col">authors</th>

      </tr>
    </thead>
    @foreach ($books  as $key=>$book )
    <tbody>
        <tr>
          <td>{{ $book->book_id }}</td>
          <td>{{ $book->thumbnail }}</td>
          <td>{{ $book->small_thumbnail }}</td>
          <td>{{ $book->title }}</td>
          <td>{{ $book->sub_title }}</td>
          <td>{{ $book->authors }}</td>
         
        </tr>
       
      </tbody>
    @endforeach
  
  </table>
</div>
{{ $books->onEachSide(5)->links() }}

