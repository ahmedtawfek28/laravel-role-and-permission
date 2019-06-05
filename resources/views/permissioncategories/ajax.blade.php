<script>

  
    $('#edit').on('show.bs.modal', function (event) {
      
        var button = $(event.relatedTarget) 
        var title_en = button.data('mytitle_en') 
        var title_ar = button.data('mytitle_ar') 
            // var slug = button.data('myslug') 
            // var content = button.data('mycontent') 
            var id = button.data('myid') 
            var modal = $(this)
            
            modal.find('.modal-body #title_en').val(title_en);
            modal.find('.modal-body #title_ar').val(title_ar);
            // modal.find('.modal-body #slug').val(slug);
            // modal.find('.modal-body #content').val(content);
            modal.find('.modal-body #id').val(id);
        }) 
    
    
    $('#delete').on('show.bs.modal', function (event) {
      
        var button = $(event.relatedTarget) 
        
        var id = button.data('myid') 
        var modal = $(this)
        
        modal.find('.modal-body #id').val(id);
    })
    
    
</script>