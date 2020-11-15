<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"></script>
<script src="<?php echo base_url()?>assets/js/pagination.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/pagination.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/mentorshipTeam.css">
<style type="text/css">
  .newbutton {
  padding: 7px 7px;
  width: 100px;
  font-size: 18px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
background-color: #A52A2A;
  border-radius: 15px;
  float: left;
}
.newbutton1 {
  padding: 7px 7px;
  width: 100px;
  font-size: 18px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  border: solid 3px #A52A2A;
  border-radius: 15px;
  float: left;
  color: #A52A2A
}
</style>


<body>
  <div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-7">
            <div class="card b-0" >
              <div class="slideshow-container" style="width:100%"">
                <h5 style="color:  #A52A2A" >طلبات قادة ليس لديهم أي سفير</h5>
              <table   dir="rtl" style="width:100%;empty-cells: show;">
                <thead >
                      <tr>
                        <th>اسم القائد</th>
                        <th>رقم الطلب</th>
                        <th></th>
                      </tr>
                </thead>
                
                <tbody >
                  <?php foreach ($info as $i) { 
                    $this->load->model('GeneralModel');
                  $name=$this->GeneralModel->get_data($i->leader_id, 'id', 'leader_info')->result();

                    ?>
                  
                  <tr  style="background-color: #f2f2f2;">
                    <td  style="width: 33%; vertical-align: top;"><?php echo $name[0]->leader_name ?></td>
                     <td  style="width: 33%; vertical-align: top;"><?php echo $i->Rid ?></td>
                    <td style="width: 33%;">
                         <form  enctype="multipart/form-data" method="post" action="<?=base_url()?>requests/deleteRequest">
                           <input id="id" name="id" type="text"  style="display:none" value="<?php echo $i->Rid ?>">
                            <button  id="delete"  name="delete" class="newbutton1" >حذف</button>
                         </form>

                    </td>
                  </tr>
                  <tr> 
                    <td></td>
                    <td></td>
                  </tr>
<?php } ?>
                 
              </table>
                </tbody>             
              </div>
            </div>
        </div>
    </div>
</div>
</body>