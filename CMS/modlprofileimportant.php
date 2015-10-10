 
 <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalpeople" id ="editprofilepeople">Modify Important people Information</button>  
<div class="modal fade" id="modalpeople" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Profile - ImportantPerson</h4>
        </div>
         <form action ="profilequery.php" id="importantpips" runat="server" method ="POST" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group">
            <label for="Person">Important People</label>
            <input type ="hidden" name = "counterpip" value = "1" id = "counterpip" >
              <div id='ImportantPeoplePanel'>
            </div>
            <input type='button'  class="btn btn-success" value='Add Important Person' id='addPerson'>
            <input type='button'  class="btn btn-danger" value='Remove Important Person' id='removePerson'>
            </div>
            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <input type="submit" class="btn btn-default"  id = "okPeople"/>
      </div>
      </form>
      </div>
    </div>
  </div>
