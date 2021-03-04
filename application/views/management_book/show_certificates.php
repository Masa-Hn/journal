<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/carousel.css">
<body>
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-7">
            <div class="card b-0">
                <h3 class="heading" style="color:#008080;" >عرض الشهادات</h3>
                <fieldset class="show">
                    <div class="form-card">
                        <h5 class="sub-heading"><?php echo $activity[0]->get_name() . ' - ' . $activity[0]->get_copy() ?></h5>
                        <ul class="row px-1 radio-group">
                            <?php
                                
                                if(! empty($certificates)){
                                foreach ($certificates as $certificate) {
                                    echo '
                                        <li class="card-block text-center radio " >
                                            <img style="width:100%" src="'.base_url().'assets/img/certificate/'.$certificate->get_pic().'" id="'.$certificate->get_id().'" onClick="show(this.id)">
                                             <input type="hidden" name="img_id" id="img_id" value="'.$certificate->get_id().'">

                                            <h5 style="margin-top:10%; text-align:center" class="sub-desc"  onclick="deleteAlert()">حذف</h5>
                                        </li>
                                    ';
                                }//foreach
                                }//if
                            ?>
                        </ul> 
                        <!-- View Images -->
                        <div id="myModal" class="modal">
                            <input type="hidden" name="id" id="shareID">
                            <span class="close">&times;</span>       
                            <img class="modal-content" id="img01">       
            
                        </div>
                        <!-- End View Images -->
                    </div>
                </fieldset>
               
            </div>
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/carousel.js"></script>
<script type="text/javascript">

 function deleteAlert(){
    const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
  title: 'هل أنت متأكد؟',
  text: '! لن تتمكن من التراجع عن الحذف', 
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'حذف',
  cancelButtonText: 'تراجع',
  reverseButtons: true
    }).then((result) => {
    if (result.value) {
        var url="<?php echo base_url();?>management_book/delete_certificate";
        $.ajax({
            type: "POST",
            url:url,
            data: {'id':document.getElementById("img_id").value},
            success: function(data){
                swalWithBootstrapButtons.fire(
                    'تم',
                    'تم الحذف بنجاح',
                    'success'
                )
                location.reload();
            }
        });
        
    }

})
 }//deleteAlert
</script>