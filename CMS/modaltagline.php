  <!-- Modal -->
  <div class="modal fade" id="modaltagliness" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Taglines</h4>
        </div>
         <form action ="profilequery.php" id="taglineform" runat="server" method ="POST" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group">
              <label for="Tagline">Tagline:</label>
              <input type="text" class="form-control" id="profiletagline" name ="profiletagline">
            </div>

              <h4> Background image of Tagline </h4>
              
                  <input type='file' onchange="readURLtagline(this);" name="filetagline"/>
                  <div id="profiletaglineimage"  alt="your image" style= "height: 200px; width: 400px; background-size: cover; overflow: scroll;">
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <input type="submit" class="btn btn-default"  id = "oKtag" />
        </div>
        </form>
      </div>
    </div>
  </div>




