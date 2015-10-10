
  <div style = "width: 100%; background-color : orange; margin-right: 0;">
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalcont" id ="edithomecontact">Edit this section</button>  
  </div>
  <div class="modal fade" id="modalcont" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Contacts</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label for="Company">Contact</label>
              <div id='TextBoxesGroup'>
            </div>
            <input type='button'  class="btn btn-success" value='Add Contact Information' id='addButton'>
            <input type='button'  class="btn btn-danger" value='Remove Contact Information' id='removeButton'>
            </div>

            <div class="form-group">
              <label for="Location">Location</label>
              <textarea id="modallocation" placeholder="Address" rows="5"></textarea> 
            </div>

            <div class="form-group">
              <label for="Facebook">Facebook Link</label>
              <input type="text"  placeholder: "Enter Facebook Link" class="form-control" id="linkfb"> 
              <label for="Twitter">Twitter Link</label>
              <input type="text" placeholder: "Enter Twitter Link" class="form-control" id="linktw"> 
              <label for="Instagram">Instagram Link</label>
              <input type="text" placeholder: "Enter Instagram Link" class="form-control" id="linkig"> 
              <label for="Google">Google Link</label>
              <input type="text" placeholder: "Enter Google Plus Link" class="form-control" id="linkgp"> 
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" id = "okCont">OK</button>
        </div>
      </div>
    </div>
  </div>





