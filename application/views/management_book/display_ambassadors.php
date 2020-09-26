<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/pagination.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/mentorshipTeam.css">

<style>
.confirmbtn{
  width: 1.15em;
  height: 1.15em;
}
.copy{
  width: 25%;
  margin-right: 3%;
}
</style>
<body>
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-10 col-lg-10 col-md-10">
            <div class="card b-0" style="overflow-x: auto;">
              <form class="s-form" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>/MentorshipTeam2/searchRequest">
                <div class="row">
                  <div class="col-md-9">
                    <input class="form-control" name="s-text" id="s-text" type="text" placeholder="ابحث عن طريق اسم السفير..">
                  </div>
                  <div class="col-md-3">
                    <input class="form-control" name="s-btn" id="s-btn" type="submit" value="بحث">
                  </div>
                </div>
              </form>
              <input type="hidden" id="bookDisplay" name="bookDisplay" value="2">
              <table id="dataTable" class="cell list-wrapper" dir="rtl">
                <thead>
                  <tr>
                    <th>السفير</th>
                    <th>الجنس</th>
                    <th>رابط صفحته</th>
                    <th style="text-align:center;">تأكيد الانضمام</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    if($ambassadors->num_rows() > 0)
                    {
                      foreach ($ambassadors->result() as $ambassador) {
                        $id = $ambassador->id;

                        ?>
                  <tr class="list-item">
                    <td id="lblMSb" ><a class="link" href="<?php echo $ambassador->profile_link;?>"><i class="fa fa-external-link" aria-hidden="true"></i><?php echo $ambassador->name; ?></a></td>
                    <td><?php echo "أنثى";?></td>
                    <td>
                      <a class="link" href="<?php echo $ambassador->profile_link;?>"><i class="fa fa-external-link" aria-hidden="true"></i><?php echo $ambassador->profile_link; ?></a>
                    </td>
                    <td style="text-align:center;"><input type="checkbox" class="confirmbtn" name="confirm" <?php if ($ambassador->is_joined == 1) echo "checked='checked'"; ?>  id="<?php echo $id;?>" onchange="cTrig('<?php echo $id;?>');"></td>
                  </tr>
                  <?php
                }
              }else{
                ?>
                <tr>
                  <td colspan="6" style="text-align: center;vertical-align: middle;">
                    لا يوجد نتائج
                  </td>
                </tr>
                <?php
              }
            ?>
                </tbody>
              </table>
              <div id="pagination-container">	</div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="<?php echo base_url()?>assets/js/mentorshipTeam.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
<script src="<?php echo base_url()?>assets/js/copy.js"></script>
<script>

    function cTrig( id ) {
      if (document.getElementById(id).checked == true) {
      swal( {
          icon: 'warning',
          title: 'تأكيد الانضمام',
          text: ' هل أنت متأكد من أن السفير انضم لمجموعة السفراء؟',
          type: "warning",
          showConfirmButton: true,
          showCloseButton: true,
          showCancelButton: true,
          focusConfirm: false,
          confirmButtonText: 'نعم',
          cancelButtonText: 'إلغاء',
          confirmButtonColor: "#205d67",
          closeOnConfirm: false,
          closeOnCancel: true
        },
        function ( isConfirm ) {

          if ( isConfirm ) {
            var base_url = "<?php echo base_url()?>";

            $.ajax( {
              url: base_url + 'AmbassadorsJoining/joined_ambassador',
              type: 'POST',
              data: {
                checked: id
              },
              dataType: 'text',
              success: function () {
        
              window.setTimeout( function () {}, 3000 );
              location.reload();
              },
              error: function ( error ) {
                console.log( error );
              }
            } );
          } else {
            console.log( "canceled" );
          }
        } );
      }else{
        swal( {
            icon: 'warning',
            title: 'تأكيد الانضمام',
            text: ' هل أنت متأكد من أن السفير ليس موجود في مجموعة السفراء؟',
            type: "warning",
            showConfirmButton: true,
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText: 'نعم',
            cancelButtonText: 'إلغاء',
            confirmButtonColor: "#205d67",
            closeOnConfirm: false,
            closeOnCancel: true
          },
          function ( isConfirm ) {

            if ( isConfirm ) {
              var base_url = "<?php echo base_url()?>";

              $.ajax( {
                url: base_url + 'AmbassadorsJoining/joined_ambassador',
                type: 'POST',
                data: {
                  notChecked: id
                },
                dataType: 'text',
                success: function () {

                window.setTimeout( function () {}, 3000 );
                location.reload();
                },
                error: function ( error ) {
                  console.log( error );
                }
              } );
            } else {
              console.log( "canceled" );
            }
          } );
      }
    }

</script>
