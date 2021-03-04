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
              <form class="s-form" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>/DistributionArchive/searchRequest">
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
                    <th><span class="visually-hidden">Toggle</span></th>
                    <th>الفريق</th>
                    <th>القائد</th>
                    <th>الجنس</th>
                    <th>عدد الأعضاء الجدد</th>
                    <th>تاريخ الطلب</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  //display the done and sent-to-leader requests
                    foreach ($requests as $request) {
                     //get the request id
                      $id = $request->get_Rid();
                      //orm object from orm_ambassador class
                      $amb_orm = new Orm_Ambassador();
                      //get the ambassadors of a specific request
                      $ambassadors = $amb_orm::get_all(array('request_id' => $id));
                      //get the number of distributed ambassadors to a specific request  
                      $newMembers = $amb_orm::get_count(array('request_id' => $id));

                  ?>
                  <tr class="list-item">
                    <td>
                      <button type="button" id="<?php echo 'btnMSb'.$id;?>" aria-expanded="false" onclick="toggle(this.id,'<?php echo "#MS01b".$id;?>');" aria-controls="<?php echo 'MS01b'.$id;?>" aria-label="3 more from" aria-labelledby="<?php echo 'btnMSb'.$id;?> <?php echo 'lblMSb'.$id;?>">
                        <svg xmlns="\http://www.w3.org/2000/svg&quot;" viewBox="0 0 80 80" focusable="false"><path d="M70.3 13.8L40 66.3 9.7 13.8z"></path></svg>
                      </button>
                    </td>
                    <td id="lblMSb" ><a class="link" href="<?php echo $request->team_link;?>"><i class="fa fa-external-link" aria-hidden="true"></i><?php echo $request->team_name; ?></a></td>
                    <td><a class="link" href="<?php echo $request->leader_link;?>"><i class="fa fa-external-link" aria-hidden="true"></i><?php echo $request->leader_name; ?></a></td>
                    <td><?php
                      if($request->leader_gender == 'Female' || $request->leader_gender == 'female'){
                        echo "أنثى";
                      }else{
                        echo "ذكر";
                      }
                    ?></td>

                    <td><?php echo $newMembers;?></td>
                    <td><?php echo date('Y-m-d', strtotime($request->get_date()));?></td>
                  </tr>
                    <?php
                    //display the ambassadors of a request
                      foreach ($ambassadors as $ambassador) {
                    ?>
                  <tr id="<?php echo 'MS01b'.$id;?>" class="hidden">
                    <td></td>
                    <td></td>
                     <td class="<?php echo 'MS02b'.$id;?>"><a class="link" href="<?php echo $ambassador->get_profile_link();?>"><i class="fa fa-external-link" aria-hidden="true"></i><?php echo $ambassador->get_name();?></a></td>
                    <td><?php
                    if($ambassador->get_gender() == 'Female' || $ambassador->get_gender() == 'female'){
                      echo "أنثى";
                    }else{
                      echo "ذكر";
                    }
                    ?></td>
                    <td>
                      <?php
                        if($ambassador->get_is_joined()){
                          ?>
                          <i class="fa fa-check-circle"></i>
                          <?php
                          echo "انضم إلى مجموعة السفراء";
                        }else{
                          ?>
                          <i class="fa fa-times-circle"></i>
                          <?php
                          echo "لم ينضم إلى مجموعة السفراء";
                        }
                      ?>
                    </td>
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
<script src="<?php echo base_url()?>assets/js/copy.js"></script>
