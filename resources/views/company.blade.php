<!DOCTYPE html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container">
    <form action='companies/add' method="POST"  enctype="multipart/form-data">
        @csrf
            <div class="mb-3">
                <label for="Name" class="form-label">Name</label>
                <input type="name" class="form-control" id="name" aria-describedby="emailHelp" name="name">
            </div>
            @if($errors->has('name'))
            <small id="passwordHelp" class="text-danger">
             {{ $errors->first('name') }}</small>
            @endif
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            </div>

            @if($errors->has('email'))
            <small id="passwordHelp" class="text-danger">{{ $errors->first('email') }}</small>
            @endif

            <div class="mb-3">
            <label for="Logo" class="form-label">Logo</label>
            <input type="file" class="form-control" id="file" name="logo">
            </div>

            @if($errors->has('logo'))
            <small id="passwordHelp" class="text-danger">{{ $errors->first('logo') }}</small>
            @endif
            <div class="mb-3">
                <label for="website" class="form-label">Website</label>
                <input type="website" class="form-control" id="website" aria-describedby="emailHelp" name="website">
            </div>

            @if($errors->has('website'))
            <small id="passwordHelp" class="text-danger">{{ $errors->first('website') }}</small>
            @endif

            <button type="submit" class="btn btn-primary">Submit</button>
        
        </form>
    </div>
@if (!empty($errors))
    {{ $errors }}
@endif
   

