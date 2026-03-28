<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <form id="edit_data" enctype="multipart/form-data">
       <input type="hidden" name="date" id="date">

       <div class="mb-3">
    <label class="form-label">Image:</label>
    <input type="file" name="editimage" class="form-control" id="editImage">
</div>

<div class="mb-3">
    <img id="editPreview" src="" width="100" style="border:1px solid #555;">
</div>

         <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name: </label>
    <input type="text" name="editfullname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address: </label>
    <input type="email" name="editemail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Phone: </label>
    <input type="text" name="editphone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Address: </label>
    <input type="text" name="editaddress" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  
  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button  type="submit" class="btn btn-primary">Save changes</button>
      </div>

</form>
      </div>
    
    </div>
  </div>
</div>