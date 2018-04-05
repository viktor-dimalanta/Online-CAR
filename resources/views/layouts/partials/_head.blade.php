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

  function repeat() {
    event.preventDefault();
    var i = 0;
    var original = document.getElementById('repeatTHIS');
    var container = document.getElementById('reapet_to_this');
    //var node = cleanUpInputs(original);
    var clone = original.cloneNode(true);

    clone.id = "" + ++i;
    container.appendChild(clone);
  }
  // function cleanUpInputs(obj) {
  //   var focusNode = null;
  //
  //   for (var i = 0; n = obj.childNodes[i]; ++i) {
  //       if (n.childNodes && n.tagName != 'INPUT') {
  //           cleanUpInputs(n);
  //       } else if (n.tagName == 'INPUT' && n.type == 'text') {
  //           focusNode = n;
  //           n.value = '';
  //       }
  //   }
  //
  //   return focusNode;
  //       }





  function repeat2() {
    event.preventDefault();
    var i = 0;
    var original = document.getElementById('repeatTHIS2');
    var container = document.getElementById('reapet_to_this2');
    var clone = original.cloneNode(true);
    clone.id = "repeatTHIS1" + ++i;
    container.appendChild(clone);
  }

  function repeat3() {
    event.preventDefault();
    var i = 0;
    var original = document.getElementById('repeatTHIS3');
    var container = document.getElementById('reapet_to_this3');
    var clone = original.cloneNode(true);
    clone.id = "repeatTHIS1" + ++i;
    container.appendChild(clone);
  }


function updateStat(clicked_id){

    var stat = $("input[name='action']:checked").val();
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
                    location.reload();
                    $('.fetched-data').html(data);
                }
            });

};

function submit_sol(clicked_id){


    var immediate_action = jQuery('textarea[name="immediate_action"]').val();
    var immediate_action_date = $("input[name='immediate_action_date']").val();
    var root_cause = $("input:radio[name=root_cause]:checked").val()
  //  var root_cause = jQuery('textarea[name="root_cause"]').val();
    var root_cause_date = $("input[name='root_cause_date']").val();
    var corrective_action = jQuery('textarea[name="corrective_action"]').val();
    var corrective_action_date = $("input[name='corrective_action_date']").val();

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
     $.ajax({
                type: "POST",
                url: '/submit_sol',
                data: {
                        id:clicked_id,
                        immediate_action: immediate_action,
                        immediate_action_date:immediate_action_date,
                        root_cause:root_cause,
                        root_cause_date:root_cause_date,
                        corrective_action:corrective_action,
                        corrective_action_date:corrective_action_date
                      },
                success: function( data ) {
                  location.reload();
                    //console.log(immediate_action_date);
                    $('.fetched-data').html(data);
                }
            });

};

</script>
