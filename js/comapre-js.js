
 $(document).ready(function(){
            x = [];

            $('.adcm').click(function(){
                
                var y=$(this).attr('rel');
                
                x.push($.trim(y))
          //  alert(x);
              
              $.ajax({
   type: "POST",
   data: {x:x},
   url: "compare_ajax.php",
   success: function(data) {
            $('.compare_container').show();
            $('.compare_container').html(data);
   }
   
});
              
             
              
              
              
                return false;
            });
     
        
});


