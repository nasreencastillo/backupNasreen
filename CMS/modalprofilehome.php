  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id ="edithomeprofile">Edit this section</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Profile Home / Landing Page</h4>
        </div>
        <form action ="profilequery.php" id="logo" runat="server" method ="POST" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group">
              <label for="Company">Company Name:</label>
              <input type="text" class="form-control" id="coms" name = "coms">
            </div>
            <div class="form-group">
              <label for="Taglin">Tagline:</label>
              <input type="text" class="form-control" id="ags" name ="ags">
            </div>


            <h4> Picture / Logo of the company: </h4>
           
                  <input type='file' onchange="readURL(this);" id = "filelogo" name ="filelogo" />
                  <img id="blah" src="gallery/RCBC-logo.png" alt="your image" style ="height:200px; width=200px " />
              <h4> Background image of landing Page: </h4>
                  <input type='file' onchange="readURLs(this);" id = "files" name ="files"/>
                  <div id="imgback" alt="your image"  style="height:200px; width:400px; background-size: cover; background-image: url(gallery/3.jpg); ">
                    
                  </div>    
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <input type="submit"  class="btn btn-default" id = "okHome">
        </div>
         </form>
      </div>
    </div>
  </div>


<script type="text/javascript">


</script>