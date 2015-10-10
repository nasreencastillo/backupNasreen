
<script type="text/javascript">
  $(function(){
  $(document).on("click", "#okAbt", function() {
    alert("nas");
      var a = $('#titleabt').val();
      var b = $('#descabt').val();
      $.post('profilequery.php',{"Titleabout":a, "TitleDescript":b});
    });
  });
  </script>



<div class="modal fade" id="about-desc" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Profile About Us</h4>
        </div>
        <div class="modal-body">

        
            <div class="form-group">
              <label for="titke">Title:</label>
              <input type="text" class="form-control" id="titleabt" name="Titleabout">
            </div>
            <div class="form-group">
              <label for="decription">Description:</label>
              <textarea id="descabt" placeholder="Enter Description" name ="TitleDescript" rows="8"></textarea> 
            </div>
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button class="btn btn-default"  id = "okAbt" data-dismiss="modal"> OK </button>
        </div>





      </div>
    </div>
  </div>


  
