<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"></script>
<script src="<?php echo base_url()?>assets/js/pagination.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/pagination.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/mentorshipTeam.css">
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style type="text/css">
  .newbutton {
  padding: 7px 7px;
  width: 48%;
  font-size: 18px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #008B8B;
background-color: #DCDCDC;
  border-radius: 15px;
}
.save{
    margin: 1%;
    background: #BB6854;
    border-radius: 3vw;
    text-align: center;
    display: inline-block;
    font-size: 20px;
    font-family: 'Tajawal', sans-serif;
    color: #FCFAEF;
    padding-left: 5%;
    padding-right: 5%;
  }
.box{
  border-radius: 5vw;
  width:70%;
  background: #EAE6D6;
  padding: 10px;
  font-size: 1vw;
 text-align: center;
float: right;

}
 #page_list li
   {
      border-radius: 5vw;
    padding:16px;
  background: #EAE6D6;
    border:1px dotted #ccc;
    cursor:move;
    margin-top:12px;
    text-align: center;
   }
   #page_list li.ui-state-highlight
   {
    padding:24px;
    background-color:#ffffcc;
    border:1px dotted #ccc;
    cursor:move;
    margin-top:12px;
   }
</style>

<body>
  <div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-7">
            <div class="card b-0" >
              <div class="slideshow-container" style="width:100%"">
                <button id="sort" class="newbutton" onclick="sort()" >ترتيب أسماء الصفحات</button>
                <button id="add" class="newbutton" onclick="add()">إضافة صفحة جديدة</button>
                <div style="display: none;padding-top: 15%" id="sort_div">
                   <h2 align="center">ترتيب أسماء الصفحات</h2>
                     <ul class="list-unstyled" id="page_list">
                  <?php foreach ($pages as $m) { 
                  
                      echo '<li id="'.$m->id.'">'.$m->title.'</li>'; 
                   } ?>
                 </ul>
                    <input type="hidden" name="page_order_list" id="page_order_list" />
                
              </div>

               <div style="display: none;padding-top: 15%" id="add_div">
                  <form  enctype="multipart/form-data" method="post" action="<?=base_url()?>Pages/add">
                     <input class="box"  id="title" name="title" type="text" align="right" placeholder="عنوان الصفحة ">
                       <button class="text-center save" id="save"  onclick="save()">   حفظ </button>  
                      </form>

              </div>
            </div>
            </div>
        </div>
    </div>
</div>
</body>
<script>
$(document).ready(function(){
 $( "#page_list" ).sortable({
  placeholder : "ui-state-highlight",
  update  : function(event, ui)
  {
   var page_id_array = new Array();
   $('#page_list li').each(function(){
    page_id_array.push($(this).attr("id"));
   });
     var base_url = "<?php echo base_url()?>";
       $.ajax( {
    url: base_url + 'Pages',
    method:'POST',
    data:{"page_id_array":page_id_array},
    
   });
  }
 });

});

function sort()
{
  if (document.getElementById('sort_div').style.display=='none')
{  document.getElementById('sort_div').style.display='block';
   document.getElementById('add_div').style.display='none';
   document.getElementById('add').style.backgroundColor="#DCDCDC";
   document.getElementById('sort').style.backgroundColor="#FAEBD7";
}
else
  if (document.getElementById('sort_div').style.display=='block')
   { document.getElementById('sort_div').style.display='none';
   document.getElementById('sort').style.backgroundColor="#DCDCDC";
 }
}
function add()
{
  if (document.getElementById('add_div').style.display=='none')
{  document.getElementById('add_div').style.display='block';
   document.getElementById('sort_div').style.display='none';
   document.getElementById('sort').style.backgroundColor="#DCDCDC";
   document.getElementById('add').style.backgroundColor="#FAEBD7";
}
else
  if (document.getElementById('add_div').style.display=='block')
   { document.getElementById('add_div').style.display='none';
   document.getElementById('add').style.backgroundColor="#DCDCDC";
 }
}
</script>