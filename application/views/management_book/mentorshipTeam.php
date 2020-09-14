<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"></script>
<script src="<?php echo base_url()?>assets/js/pagination.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/pagination.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/mentorshipTeam.css">
<body>
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-10 col-lg-10 col-md-10">
            <div class="card b-0" style="overflow-x: auto;">
              <input type="hidden" id="bookDisplay" name="bookDisplay" value="2">
              <table id="dataTable" class="cell list-wrapper" dir="rtl">
                <thead>
                  <tr>
                    <th><span class="visually-hidden">Toggle</span></th>
                    <th>الفريق</th>
                    <th>القائد</th>
                    <th>الجنس</th>
                    <th>عدد الأعضاء الكلي</th>
                    <th>عدد الأعضاء الجدد</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach ($requests->result() as $request) {
                      $id = $request->Rid;
                      $ambassadors = $this->GeneralModel->get_data($request->Rid, 'requestId', 'ambassador', 'name, gender');
                      $newMembers = $ambassadors->num_rows();

                  ?>
                  <tr class="list-item">
                    <td>
                      <button type="button" id="<?php echo 'btnMSb'.$id;?>" aria-expanded="false" onclick="toggle(this.id,'<?php echo "#MS01b".$id;?>');" aria-controls="<?php echo 'MS01b'.$id;?>" aria-label="3 more from" aria-labelledby="<?php echo 'btnMSb'.$id;?> <?php echo 'lblMSb'.$id;?>">
                        <svg xmlns="\http://www.w3.org/2000/svg&quot;" viewBox="0 0 80 80" focusable="false"><path d="M70.3 13.8L40 66.3 9.7 13.8z"></path></svg>
                      </button>
                    </td>
                    <td id="lblMSb" ><?php echo $request->team_name; ?></td>
                    <td><?php echo $request->leader_name; ?></td>
                    <td><?php
                      if($request->gender == 'Female' || $request->gender == 'female'){
                        echo "أنثى";
                      }else{
                        echo "ذكر";
                      }
                    ?></td>
                    <td><?php $totalMembers=20; echo $totalMembers;?></td>
                    <td><?php echo $newMembers;?></td>
                  </tr>
                    <?php
                      foreach ($ambassadors->result() as $ambassador) {
                    ?>
                  <tr id="<?php echo 'MS01b'.$id;?>" class="hidden">
                    <td></td>
                    <td></td>
                     <td class="<?php echo 'MS02b'.$id;?>"><?php echo $ambassador->name;?></td>
                    <td><?php
                    if($ambassador->gender == 'Female' || $ambassador->gender == 'female'){
                      echo "أنثى";
                    }else{
                      echo "ذكر";
                    }
                    ?></td>
                    <td></td>
                    <td></td>
                  </tr>
                    <?php
                    }
                    ?>
                  <tr id="<?php echo 'MS01b'.$id;?>" class="hidden">
                    <td rowspan="" colspan="6" style="text-align: center;vertical-align: middle;">
                      <input type="button" class="copy btn-lg" onclick="copyNames('<?php echo '.MS02b'.$id;?>')" value="نسخ الأسماء">
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
<script type="text/javascript">
function copyNames(className) {
  var lst = document.querySelectorAll( className );
  var i, x = "";
  for ( i = 0; i < lst.length; i++ ) {
    x += lst[ i ].textContent + "\n";
  }
  var copyText = document.createElement( 'textarea' );
  copyText.value = x;
  document.body.appendChild( copyText );
  copyText.select();
  document.execCommand( 'copy' );
  // Remove temporary textarea
  document.body.removeChild( copyText );
  Swal.fire( {
    icon: 'success',
    title: 'تم النسخ',
    text: 'تم نسخ أسماء السفراء',
    showConfirmButton: false,
    timer: 3000
  } );
  console.log( x );
}
</script>
