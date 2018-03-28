    <meta charset="utf-8" />
    <title>KAISA - Online CAR</title>
    <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="/libs/assets/animate.css/animate.css" type="text/css" />
    <link rel="stylesheet" href="/libs/assets/font-awesome/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="/libs/assets/simple-line-icons/css/simple-line-icons.css" type="text/css" />
    <link rel="stylesheet" href="/libs/jquery/bootstrap/dist/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="/css/font.css" type="text/css" />
    <link rel="stylesheet" href="/css/app.css" type="text/css" />
    <!--  jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <script type="text/javascript">

    function ShowHideDiv() {
      var chkYes = document.getElementById("chkAccept");
        var dvPassport = document.getElementById("dvSolutions");
        dvPassport.style.display = chkYes.checked ? "block" : "none";
    }

    $('.datepicker').datepicker({
        format: 'mm/dd/yyyy',
        startDate: '-3d'
    });
    </script>
<script>


// $( document ).ready(function() {
//   $.ajaxSetup({
//    headers: {
//      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//    }
//  });
//   $('input[type="radio"]').on('click change', function(e) {
//   var a = $("input[name='action']:checked").val();
//     var id=$(this).attr('id');
//       //alert(a);
//
//
//              $.ajax({
//                  type :"POST",
//                  url : '/update_status',
//                  data :  {a: a, id:id},//Pass $id
//                  success : function(data){
//                   console.log(data);
//
//                  }
//              });
//
//
//   });
// });


function updateStat2(clicked_id){

  var stat = $("input[name='action']:checked").val();
  //alert(clicked_id);

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
 $.ajax({
            type: "POST",
            url: '/update_status',
            data: {stat: stat, id:clicked_id},
            success: function( data ) {
                //$(".fetched-data").append("<div>"+msg+"</div>");
                location.reload();
                $('.fetched-data').html(data);
            }
        });



};
// $( document ).ready(function() {
//   $('.changestat').click(function() {
//
// alert('sss');
//
//  });
//    });
</script>
