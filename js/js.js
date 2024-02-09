function cargar(){
   $.ajax({
    url:'back.php',
    type:'POST',
    success:function(response){
        $('#cat').html(response);
    }
   })
}