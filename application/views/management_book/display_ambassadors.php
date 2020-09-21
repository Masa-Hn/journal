<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/pagination.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/mentorshipTeam.css">

<style>
.confirm{
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
                    <input class="form-control" name="s-text" id="s-text" type="text" placeholder="ابحث عن طريق اسم القائد/السفير أو التاريخ">
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
                    <th>تأكيد الانضمام</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="list-item">
                    <td id="lblMSb" ><a class="link" href="<?php echo "";?>"><i class="fa fa-external-link" aria-hidden="true"></i><?php echo "Asmaa Hamid"; ?></a></td>
                    <td><?php echo "أنثى";?></td>
                    <td>
                      <a class="link" href="<?php echo "";?>"><i class="fa fa-external-link" aria-hidden="true"></i><?php echo "http://www.facebook.com/asmaa99"; ?></a>
                        <input type="button" class="copy btn-lg" onclick="copyNames('<?php echo '.MS02b';?>')" value="نسخ">
                    </td>
                    <td><input type="checkbox" class="confirm" name="confirm"></td>
                  </tr>
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
