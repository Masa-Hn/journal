 <div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-7">
            <div class="card b-0" >
              <div class="slideshow-container" style="width:100%"">
                <button id="sort" class="newbutton" onclick="sort()" >ترتيب أسماء الصفحات</button>
                <button id="add" class="newbutton" onclick="add()">إضافة صفحة جديدة</button>

<div ng-app="sortableApp" ng-controller="sortableController" class="container" id = "sort_div" style="display: none;padding-top: 10%"> 

  <h2 align="center">ترتيب أسماء الصفحات</h2>
  <div >
    <ul ui-sortable="sortableOptions" ng-model="list" class="list">
      <li ng-repeat="item in list" class="item">
        {{item.text}}
      </li>
    </ul>
  </div>

 <div class="floatleft" style="margin-left: 20px;">
    <ul class="list logList">
      <li ng-repeat="entry in sortingLog track by $index" class="logItem">
        {{entry}}
      </li>
    </ul>
  </div>
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
  <div class="clear"></div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <!-- http://touchpunch.furf.com does the trick with touch support -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.4/angular.min.js"></script>
  <script src="https://rawgithub.com/angular-ui/ui-sortable/master/src/sortable.js"></script>
</div>
<style type="text/css">
  .list {
  list-style: none outside none;
  margin: 10px 0 30px;
}

.item {
   border-radius: 5vw;
    padding:16px;
  background: #EAE6D6;
    border:1px dotted #ccc;
    cursor:move;
    margin-top:12px;
    text-align: center;
}


/***  Extra ***/

.logList {
  min-height: 200px;
  padding: 5px 15px;
  border: 5px solid #000;
  border-radius: 15px;
}

.logList:before {
  content: 'log';
  padding: 0 5px;
  position: relative;
  top: -1.1em;
  background-color: #FFF;
}

.container {
  width: 100%;
  margin: auto;
  padding-right: 60px;
}

h2 {
  text-align: center;
}

.floatleft {
  float: left;
}

.clear {
  clear: both;
}
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
  width:65%;
  background: #EAE6D6;
  padding: 10px;
  font-size: 20px;
 text-align: center;
float: right;

}
</style>
<?php
$arr= Array();
$arr2= Array();
 foreach ($pages as $m) { 
array_push($arr,$m->id);
array_push($arr2,$m->title);
}
?>
<script type="text/javascript">
  var myapp = angular.module('sortableApp', ['ui.sortable']);


myapp.controller('sortableController', function ($scope) {
  var tmpList = [];
  var pages_name=<?php echo json_encode($arr2); ?>;
  var pages_id=<?php echo json_encode($arr); ?>;

  for (var i = 1; i <= pages_name.length; i++){
    tmpList.push({
      text: pages_name[i-1],
      value: pages_id[i-1]
    });
  }
  
  $scope.list = tmpList;
  
  
  $scope.sortingLog = [];
  
  $scope.sortableOptions = {
    update: function(e, ui) {
        var page_id_array1 = new Array();
      var logEntry = tmpList.map(function(i){
         page_id_array1.push(i.value);
        return i.value;
      }).join(', ');
      $scope.sortingLog.push('Update: ' + logEntry);
    
    },
    stop: function(e, ui) {
         var page_id_array = new Array();
      // this callback has the changed model
      var logEntry = tmpList.map(function(i){
        page_id_array.push(i.value);

        return i.value;
      }).join(', ');
      $scope.sortingLog.push('Stop: ' + page_id_array);
    var base_url = "<?php echo base_url()?>";
       $.ajax( {
    url: base_url + 'Pages',
    method:'POST',
    data:{"page_id_array":page_id_array},
}); 
    }

  };

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

