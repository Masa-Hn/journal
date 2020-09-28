<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/pagination.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/mentorshipTeam.css">

<body>
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-10 col-lg-10 col-md-10">
            <div class="card b-0" style="overflow-x: auto;">
              <form class="s-form" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>/MentorshipTeam2/searchRequest">
                <div class="row">
                  <div class="col-md-7">
                    <input class="form-control" name="s-text" id="s-text" type="text" placeholder="ابحث عن طريق اسم القائد/السفير أو التاريخ">
                  </div>
                  <div class="col-md-3">
                    <input class="form-control" name="s-date" id="s-date" type="date" placeholder="<?php echo date('Y-m-d');?>">
                  </div>
                  <div class="col-md-2">
                    <input class="form-control" name="s-btn" id="s-btn" type="submit" value="بحث">
                  </div>
                </div>
              </form>
              <input type="hidden" id="bookDisplay" name="bookDisplay" value="2">
              <table id="dataTable" class="cell list-wrapper" dir="rtl">
                <thead>
                  <tr>
                    <th>الفريق</th>
                    <th>القائد</th>
                    <th>الجنس</th>
                    <th>السفراء</th>
                    <th>عدد الأعضاء الجدد</th>
                    <th>تاريخ الطلب</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if($requests->num_rows()>0){
                    foreach ($requests->result() as $request) {
                      $id = $request->Rid;
                      $ambassadors = $this->GeneralModel->get_data($request->Rid, 'requestId', 'ambassador', 'name, gender, profile_link');
                      $newMembers = $ambassadors->num_rows();

                  ?>
                  <tr class="list-item">
                    <td  id="lblMSb" ><a class="link" href="<?php echo $request->team_link;?>"><i class="fa fa-external-link"></i><?php echo $request->team_name; ?></a></td>
                    <td ><a class="link" href="<?php echo $request->leader_link;?>"><i class="fa fa-external-link"></i><?php echo $request->leader_name; ?></a></td>
                    <td ><?php
                      if($request->leader_gender == 'Female' || $request->leader_gender == 'female'){
                        echo "أنثى";
                      }else{
                        echo "ذكر";
                      }
                    ?></td>
                    <td>
                      <?php
                        foreach ($ambassadors->result() as $ambassador) {
                      ?>
                        <p>
                          <a class="link" href="<?php echo $ambassador->profile_link;?>"><i class="fa fa-external-link"></i><?php echo $ambassador->name." ";?></a>
                          <?php
                        if($ambassador->gender == 'Female' || $ambassador->gender == 'female'){
                          echo "- " . "أنثى";
                        }else{
                          echo "- " . "ذكر";
                        }

                        ?></p>
                      <?php } ?>
                    </td>
                    <td ><?php echo $newMembers;?></td>
                    <td ><?php echo date('Y-m-d', strtotime($request->date));?></td>
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
<script src="<?php echo base_url()?>assets/js/copy.js"></script>
