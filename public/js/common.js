$(function(){
    //  var myScrollPos = $('.nav.metismenu a.active').offset().left + $('a.active').outerHeight(true) / 2 + $('.slimScrollDiv').scrolltop() - $('.slimScrollDiv').height() / 2;
    //  $('.slimScrollDiv').scrollTop(myScrollPos);
    })

    $( document ).ajaxSuccess(function() {

      });

      $( document ).ajaxStart(function() {

      });
      $( document ).ajaxComplete(function() {

      });

      $( document ).ajaxError(function() {

      });

 
    $('.ajax-delete').on('click', function(e){
      e.preventDefault();
      var element = $(this);
      $.confirm({
          title: 'Confirm!',
          content: 'Are you sure want to remove?',
          icon: 'far fa-frown',
          theme: 'modern',
          closeIcon: true,
          animation: 'scale',
          type: 'orange',
          buttons: {
              confirm:  {
                  btnClass: 'btn-warning',
                  action: function(){
                    $.ajax({
                      type: 'post',
                      url: element.attr('href'),
                      data: {
                        _method: 'DELETE'
                      },
                    }).done(function (res) {
                  

                      if (res.success) {
                        console.log('sdfsdf');
                        element.closest(element.attr('data-set')).fadeOut();
                      }
                      if (res.message=="deleted success") {
                        toastr.success('Data has been deleted successfully!'); 
                        
           
                      }
                      if(res.refresh){
                        window.setTimeout(function(){location.reload()},10000)
                      
                      }
                      if (res.fail) {
          
                      }
                     
                    });
                  }  
              },
              cancel:{
                  btnClass: 'btn-light',
                  action: function(){
                  }  
              },
           
          }
      });
  });
    function showModal(data, title, size = '70') {
      $('#view-model').find('.modal-header').html(title);
      $('#view-model').find('.model-data').html(data);
      $('#view-model').find('.modal-dialog').css({
        width: size + '%'
      });
    
      $('#view-model').modal('show');
    }
    
    function closeModal() {
      $('#view-model').modal('hide');
    }
    
    
    $(document).on('click', '.ajax-load-modal', function (e) {
      e.preventDefault();
     
      var element = $(this),
      url = element.attr('href');
      var size = element.attr('data-size') ? element.attr('data-size') : 60;
      var title = element.attr('data-title') ? element.attr('data-title') : '';
      $.get(url).done(function (res) {
        showModal(res, title, size)
      });
    });
    