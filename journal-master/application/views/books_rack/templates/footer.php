
<!-- Footer -->
  <footer class="container-fluid text-center">
    <div class="row">
      <div class="col-sm-4">
        <div class="row">
          حساباتنا على مواقع التواصل الإجتماعي
        </div>
        <div class="row">
          <a target="_blank" href="https://www.facebook.com/osboha180/" class="fa fa-facebook"></a>
          <a target="_blank" accesskey=""href="https://twitter.com/osboha180" class="fa fa-twitter"></a>
          <a target="_blank" href="https://www.instagram.com/osboha180/" class="fa fa-instagram"></a>
          <a target="_blank" href="https://t.me/osboha180" class="fa fa-telegram"></a>

        </div>
      </div>
      <div class="col-sm-4">
        <img src="<?php echo base_url()?>assets/img/logo_2.png" class="icon">
      </div>
      
      <div class="col-sm-4">
        <h4> تصميم: سارة اسماعيل </h4>
        <h4> الخدمة التقنية :فنجان هوست </h4>
      </div>
    </div>
    <div class="row">
      <div id="numbers">
        <h3>
          أنت الزائر رقم 
          <strong  class="count">
            <?php
            if(isset($_SESSION['counter'])){
              echo $_SESSION['counter'];
            }
            ?>
              
          </strong>
        </h3>
      </div>
    </div>
              <hr style="width: 80%;color: white">
    
  </footer>
  <!-- End Footer -->

</body>
<script src="<?php echo base_url()?>assets/js/animation.js"></script>
<script src="<?php echo base_url()?>assets/js/counter.js"></script>

</html>