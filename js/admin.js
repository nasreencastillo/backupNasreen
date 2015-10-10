
   $(document).ready(function(){
        $("#mems").click(function(){
          $("#mem").toggle();
           $("#memb").toggle();
        });
        $("#cms").click(function(){
          $("#fram").attr({
              "src" : "CMS/profile.php"
            });
                    
        });
        $("#mem").click(function(){
           $("#fram").attr({
              "src" : "addmembers.php"
            });
        });

        $("#memb").click(function(){
           $("#fram").attr({
              "src" : "allmembers.php"
            });
        });
      });