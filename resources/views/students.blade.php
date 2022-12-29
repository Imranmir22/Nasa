<html>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<body>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalAdd" id="modalbutton">
        Add New Contact
    </button>
    <table class="table">
    <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Contacts</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>

        </tr>
      </thead>
      <tbody>
          @foreach ($data as $contact)
          <tr>
              <td>{{ $contact->name }}</td>
              <td>{{ $contact->contact_number }}</td>
             <td>    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModa{{ $contact->id }}" id="modalbutton" btn_id={{ $contact->id }}>
               Edit
              </button></td>
              <td>
                <form action="delete-contact/{{ $contact->id }}" method="post">
                    @csrf
                    @method('Delete')
                    <input type=submit value="Delete">
                </form></td>
            </tr>
            <div class="modal fade" id="exampleModal{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="edit-contact/{{ $contact->id  }}" class="formclass">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" id="exampleInput1" aria-describedby="emailHelp" placeholder="Enter First Name" name="contactname" value="{{ $contact->name }}">
                            </div>
                            @foreach (json_decode($contact->contact_number) as $contact)
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Contact Number</label>
                                    <input type="number" class="form-control" id="exampleInput4" aria-describedby="emailHelp" placeholder="Enter Mobile Number" name="contactnumber[]" value="{{ $contact }}">
                                </div>  
                            @endforeach
                          
                        
                           
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                        </form>
                    </div>
                   
                  </div>
                </div>
              </div>
            
   

       
      
  @endforeach
</tbody>
</table>







<div class="modal fade" id="exampleModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="add-contact" class="formclass" id="addnewcontact">
                @csrf
               
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="exampleInput1" aria-describedby="emailHelp" placeholder="Enter First Name" name="contactname">
                </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Contact Number</label>
                        <input type="number" class="form-control" id="exampleInput4" aria-describedby="emailHelp" placeholder="Enter Mobile Number" name="contactnumber[]" >
                    </div>  
                
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" id="addcontact">Add</button>        
                    </div>  
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </form>
        </div>
       
      </div>
    </div>
  </div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
var i = 1;
    $('#addcontact').on('click', function () {
           var field='<br><div class="form-group"><input type="integer" name="contactnumber[]" class="form-control" id="exampleInput4" aria-describedby="emailHelp" placeholder="Enter Mobile Number"> </div> ';
                   
        $('#addnewcontact').append(field);
        i = i+1;

    })

  $('#btn_id').on('click', function () {
    console.log("fff");
    // let url=<?=url('/').'student'; ?>
    // $.ajax({url: "demo_test.txt", success: function(result){

    //     $("#div1").html(result);


    //  }});
  })

})
</script>