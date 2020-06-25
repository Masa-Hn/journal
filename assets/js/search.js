function search(input) {
  var input = document.getElementById("bookName");



  var bookName= document.getElementById("bookName").value;
    $.ajax({
      type: "POST",
        url:document.getElementById("base_url").value+"bookSearch/searchByName",
        data: {'bookName':bookName},
            success: function(data){
            if (data != "") {
            document.getElementById("hrLine").style.display='block';
            document.getElementById("s-btn").style.marginTop ='-8%';
            document.getElementById("s-btn").style.marginLeft ='-7%';
            document.getElementById("searchList").style.display='block';
            document.getElementById("searchList").innerHTML =data;
            console.log(data);
            }
            else{
              document.getElementById("hrLine").style.display='none';
              document.getElementById("searchList").style.display='none';
              document.getElementById("s-btn").style.marginLeft ='-3%';
              document.getElementById("s-btn").style.marginTop ='-2.75%';

            }             

            //console.log($scope.books);
            }//success
      });
  
 }//search
