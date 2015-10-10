  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalserv" id ="editservices">Modify Services Information</button>  
  <div class="modal fade" id="modalserv" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Services</h4>
        </div>
         <form action ="profilequery.php" id="importantpips" runat="server" method ="POST" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group">
              <label for="Company">Contact</label>
              <input type ="hidden" name = "counterserv" value = "1" id = "counterserv" >
              <div id='ServicesGroup'>






            </div>
            <input type='button'  class="btn btn-success" value='Add Services' id='addServ'>
            <input type='button'  class="btn btn-danger" value='Remove Services' id='removeServ'>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <input type="submit" class="btn btn-default" id = "okServ">
        </div>
        </form>
      </div>
    </div>
  </div>





