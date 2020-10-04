<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"></script>
<script src="<?php echo base_url()?>assets/js/pagination.js"></script>
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
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="list-item">
                    <td>
                      <button type="button" id="btnMSb" aria-expanded="false" onclick="toggle(this.id,'#MS01b,#MS02b,#MS03b');" aria-controls="MS01b MS02b MS03b" aria-label="3 more from" aria-labelledby="btnMSb lblMSb">
                        <svg xmlns="\http://www.w3.org/2000/svg&quot;" viewBox="0 0 80 80" focusable="false"><path d="M70.3 13.8L40 66.3 9.7 13.8z"></path></svg>
                      </button>
                    </td>
                    <td id="lblMSb" class="list-item">A01</td>
                    <td>Leader01</td>
                    <td>F</td>
                    <td>3</td>
                    <td>4</td>
                    <td><input type="checkbox" class="checkbox" value="1" name="checkbox"> </td>
                  </tr>
                  <tr id="MS01b" class="hidden">
                    <td></td>
                    <td></td>
                     <td>member00</td>
                    <td>M</td>
                    <td rowspan="3" colspan="3" style="text-align: center;vertical-align: middle;">
                      <input type="button" class="copy btn-lg" value="Copy Members">
                    </td>
                  </tr>
                  <tr id="MS02b" class="hidden">
                    <td></td>
                    <td></td>
                    <td>member02</td>
                    <td>M</td>
                  </tr>
                  <tr id="MS03b" class="hidden">
                    <td></td>
                    <td></td>
                    <td>member03</td>
                    <td>M</td>
                  </tr>
                  <tr class="list-item">
                    <td></td>
                    <td>A02</td>
                    <td>Leader02</td>
                    <td>F</td>
                    <td>15</td>
                    <td>0</td>
                    <td><input type="checkbox" class="checkbox" value="2" name="checkbox"> </td>
                  </tr>
                  <tr class="list-item">
                    <td>
                      <button type="button" id="btnEDENSb" aria-expanded="false" onclick="toggle(this.id,'#EDENS01b,#EDENS02b,#EDENS03b,#EDENS04b,#EDENS05b');" aria-controls="EDENS01b EDENS02b EDENS03b EDENS04b EDENS05b" aria-label="5 more from" aria-labelledby="btnEDENSb lblEDENSb">
                        <svg xmlns="\http://www.w3.org/2000/svg&quot;" viewBox="0 0 80 80" focusable="false"><path d="M70.3 13.8L40 66.3 9.7 13.8z"></path></svg>
                      </button>
                    </td>
                    <td id="lblEDENSb" class="list-item">A03</td>
                    <td>Leader03</td>
                    <td>F</td>
                    <td>12</td>
                    <td>5</td>
                    <td><input type="checkbox" class="checkbox" value="3" name="checkbox"> </td>
                  </tr>
                  <tr id="EDENS01b" class="hidden">
                    <td></td>
                    <td></td>
                    <td>member00</td>
                    <td>M</td>
                    <td rowspan="5" colspan="3" style="text-align: center;vertical-align: middle;">
                      <input type="button" class="copy btn-lg" value="Copy Members">
                    </td>
                    
                  </tr>
                  <tr id="EDENS02b" class="hidden">
                    <td></td>
                    <td></td>
                    <td>member00</td>
                    <td>M</td>
                  </tr>
                  <tr id="EDENS03b" class="hidden">
                    <td></td>
                    <td></td>
                    <td>member00</td>
                    <td>F</td>
                  </tr>
                  <tr id="EDENS04b" class="hidden">
                    <td></td>
                    <td></td>
                    <td>member00</td>
                    <td>F</td>
                  </tr>
                  <tr id="EDENS05b" class="hidden">
                    <td></td>
                    <td></td>
                    <td>member03</td>
                    <td>F</td>
                  </tr>
                  <tr>  
                </tbody>
              </table>
              <div id="pagination-container"></div>  
              <div id="submit" style="display: none;text-align: center;">
                <input type="button" class="copy btn-lg" value="Submit">
              </div>  
            </div>
        </div>
    </div>
</div>
</body>
<script src="<?php echo base_url()?>assets/js/mentorshipTeam.js"></script>
