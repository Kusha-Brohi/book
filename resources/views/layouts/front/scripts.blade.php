<!-- ============================================================== -->
<!-- All SCRIPTS AND JS LINKS BELOW  -->
<!-- ============================================================== -->


    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('js/wow.js')}}"></script>
    <script src="{{asset('slick/slick.js')}}"></script>
    <script src="{{asset('slick/slick.min.js')}}"></script>
    <script src="{{asset('js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('js/fancybox.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="{{asset('js/font.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script>
        let main = $('.audio-onload');
        let audio = main.find('audio').get(0);

        $('.play-audio-btn').click(function() {
            audio.play();
            $(this).find('i.fa-volume-slash').removeClass('fa-volume-slash');
            $(this).find('i').addClass('fa-volume-high');
            if (main.hasClass('playing')) {
                audio.pause();
                console.log('pasue');
                $(this).find('i.fa-volume-high').removeClass('fa-volume-high');
                $(this).find('i').addClass('fa-volume-slash');
            }
            main.addClass('playing');
        })
    </script>


  <!-- Notification JS Below  -->

  <script src="{{ asset('/plugins/vendors/toast-master/js/jquery.toast.js') }}"></script>

  <script>

       $(document).ready(function () {

             @if(\Session::has('message')) 
                  $.toast({
                      heading: 'Success!',
                      position: 'bottom-right',
                      text:  '{{session()->get('message')}}',
                      loaderBg: '#ff6849',
                      icon: 'success',
                      hideAfter: 3000,
                      stack: 6
                  });
              @endif
              
              
              @if(\Session::has('flash_message')) 
                  $.toast({
                      heading: 'Error!',
                      position: 'bottom-right',
                      text:  '{{session()->get('flash_message')}}',
                      loaderBg: '#ff6849',
                      icon: 'error',
                      hideAfter: 3000,
                      stack: 6
                  });
              @endif

              
          })
      
  </script>

<script type="text/javascript">
  
  $('#contactsubmit').on('submit',function(e){
   let form_id = $('#contactsubmit');
    e.preventDefault();
     // console.log(form_id);
    $.ajax({
      url:'{{route('contactUsSubmit')}}',
      type:"POST",
      data: $('form').serialize(),
      dataType: 'json',
      success:function(response){
       console.log(response.message);
       if(response.status == true){
              $.toast({
                heading: 'Success!',
                position: 'bottom-right',
                text:  response.message,
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 3000,
                stack: 6
              });

              form_id[0].reset();

            }
            else{
            // Handle error
          //  console.log(_response.message);
            $.toast({
              heading: 'Error!',
              position: 'bottom-right',
              text:  response.message,
              loaderBg: '#ff6849',
              icon: 'error',
              hideAfter: 3000,
              stack: 6
            });

            } 
      },
        error: function(response){
            // Handle error
          //  console.log(_response.message);
            $.toast({
              heading: 'Error!',
              position: 'bottom-right',
              text:  response.message,
              loaderBg: '#ff6849',
              icon: 'error',
              hideAfter: 3000,
              stack: 6
            });
            
        }
    });

  });
  
</script>

  <!----Newsletter---->
</script>


<script type="text/javascript">
  

  $('#newsletterSubmit').on('submit',function(e){
   let form_id = $('#newsletterSubmit');
    e.preventDefault();
     // console.log(form_id);
    $.ajax({
      url:'{{route('newsletterSubmit')}}',
      type:"POST",
      data: $('form').serialize(),
      dataType: 'json',
      success:function(response){
       console.log(response.message);
       if(response.status == true){
              $.toast({
                heading: 'Success!',
                position: 'bottom-right',
                text:  response.message,
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 3000,
                stack: 6
              });

              form_id[0].reset();

            }
            else{
            // Handle error
          //  console.log(_response.message);
            $.toast({
              heading: 'Error!',
              position: 'bottom-right',
              text:  response.message,
              loaderBg: '#ff6849',
              icon: 'error',
              hideAfter: 3000,
              stack: 6
            });

            } 
      },
        error: function(response){
            // Handle error
          //  console.log(_response.message);
            $.toast({
              heading: 'Error!',
              position: 'bottom-right',
              text:  response.message,
              loaderBg: '#ff6849',
              icon: 'error',
              hideAfter: 3000,
              stack: 6
            });
            
        }
    });

  });

</script>