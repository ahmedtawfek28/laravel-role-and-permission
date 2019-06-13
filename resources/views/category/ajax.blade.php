<script>

  
    $('#edit').on('show.bs.modal', function (event) {
      
        var button = $(event.relatedTarget) 
        var title = button.data('mytitle') 
        var image = button.data('myimage') 
        var id = button.data('myid') 
        var modal = $(this)
        
        modal.find('.modal-body #title').val(title);
        modal.find('.modal-body #image').val(image);
        modal.find('.modal-body #id').val(id);
    }) 
    
    
    $('#delete').on('show.bs.modal', function (event) {
      
        var button = $(event.relatedTarget) 
        
        var id = button.data('myid') 
        var modal = $(this)
        
        modal.find('.modal-body #id').val(id);
    })
    
    
</script>