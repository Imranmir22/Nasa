<html>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <body>
        <center>
    <form  action='company' method="POST" enctype="multipart/form-data" style="width:40%">
        @csrf
    
        <label for="basic-url" class="form-label">Name</label>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">@</span>
            <input type="text" class="form-control" placeholder="Name" aria-label="Username" name="name"aria-describedby="basic-addon1">
            @if($errors->has('name'))
            <div class="error">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <label for="basic-url" class="form-label">Email</label>

          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="abc@examplecom" name="email"aria-label="Recipient's username" aria-describedby="basic-addon2">
            <span class="input-group-text" id="basic-addon2">@example.com</span>
            @if($errors->has('email'))
            <div class="error">{{ $errors->first('email') }}</div>
            @endif
          </div>
          
          <label for="basic-url" class="form-label">Website</label>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon3">https://example.com/</span>
            <input type="text" class="form-control" name="website" id="basic-url" aria-describedby="basic-addon3">
            @if($errors->has('website'))
            <div class="error">{{ $errors->first('website') }}</div>
            @endif 
        </div>
          
          <div class="mb-3">
            <label for="formFile" class="form-label">Company Logo</label>
            <input class="form-control" type="file" name="logo" id="formFile">
            @if($errors->has('logo'))
            <div class="error">{{ $errors->first('logo') }}</div>
            @endif
          </div>

          <div class="input-group mb-3">
            <input class="btn btn-outline-secondary" type="submit" value="Submit" id="button-addon1">
          </div>
        </form>   
    </body>
</html>
<style>
    .error{
        color:red;
        padding: 5px;
    }
</style>

