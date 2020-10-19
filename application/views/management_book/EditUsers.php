<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"></script>
<script src="<?php echo base_url()?>assets/js/pagination.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/pagination.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/mentorshipTeam.css">
<style type="text/css">
  .newbutton {
  padding: 7px 7px;
  width: 50%;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
background-color: #A52A2A;
  border-radius: 15px;
  float: right;
}
.newbutton1 {
  padding: 7px 7px;
  width: 50%;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  border: solid 3px #A52A2A;
  border-radius: 15px;
  float: right;
  color: #A52A2A
}

</style>

<?php 
$member=$members->result();
?>
<body>
  <div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-7">
            <div class="card b-0" >
              <div class="slideshow-container" style="width:100%"">
              <table   dir="rtl" style="width:100%;empty-cells: show;">
                <thead >
                      <tr>
                        <th>اسم المستخدم</th>
                        <th></th>
                      </tr>
                </thead>
                
                <tbody >
                  <?php foreach ($member as $m) { ?>
                  
                  <tr   style="background-color: #f2f2f2;">
                    <td  style="width: 30%;vertical-align: top;"><?php echo $m->username ?></td>
                    <td style="width: 70%; ">
                        
                          <button  id="edit"  name="edit" class="newbutton" onclick="edit(<?php echo $m->id ?>)">تعديل الصلاحية</button>
                         
                            <form  enctype="multipart/form-data"  method="post" action="<?=base_url()?>EditUsers/delete" >
                            <input id="name" name="name" type="text"  style="display:none" value="<?php echo $m->username ?>">
                            <input id="id" name="id" type="text"  style="display:none" value="<?php echo $m->id ?>">
                            <button  id="delete"  name="delete" class="newbutton1"  >حذف العضو</button>
                         </form>
                    </td>
                  </tr>
                
                  <tr style="background-color: #FFFACD; ">
                    <td> </td>
                    <?php preg_match_all('!\d+!', $m->team, $teams); ?>
                       <form  enctype="multipart/form-data" method="post" action="<?=base_url()?>EditUsers/edit">
                         <td  id="<?php echo $m->id ?>" style="display: none;" >
                         <br>
                            <input id="id" name="id" type="text"  style="display:none" value="<?php echo $m->id ?>">
                            <label> <input  type="checkbox" class="checkbox" value="1" name="team[]" 
                               <?php if (in_array("1",$teams[0])) echo 'checked'  ; ?>>
                            إدارة الموقع </label><br>
                             <label><input  type="checkbox" class="checkbox" value="2" name="team[]"
                              <?php if (in_array("2",$teams[0])) echo 'checked'  ; ?>>
                            فريق الجودة</label><br>
                            <label><input  type="checkbox" class="checkbox" value="3" name="team[]" 
                              <?php if( in_array("3",$teams[0])) echo 'checked' ; ?>>
                            فريق الإعلام</label><br>
                            <label><input  type="checkbox" class="checkbox" value="4" name="team[]" 
                              <?php if( in_array("4",$teams[0])) echo 'checked'; ?>>
                            فريق الإرشاد</label><br>
                           <button   id="save"  name="save" class="newbutton" style=" background-color:#D2691E">حفظ التعديل</button>
                         </td>    
                      </form>
                  </tr>
                  <tr> 
                    <td> </td>
                    <td></td>
                  </tr>

<?php } ?>
                 
                </tbody>
              </table>
  <script type="text/javascript">
  function edit(id) {
   v= document.getElementById(id);
   if(v.style.display=="none")
    v.style.display="block";
  else
    if(v.style.display=="block")
    v.style.display="none";
  }
</script>
              <p><?php echo $links; ?></p>
              </div>
            </div>
        </div>
    </div>
</div>
</body>