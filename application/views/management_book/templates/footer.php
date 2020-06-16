
<style type="text/css">

@import url('https://fonts.googleapis.com/css?family=Harmattan&display=swap&subset=arabic');

	footer{
	width: 100%;
	background: #205d67;
	padding: 5% 5% 1% 5%;
	color: #FCFAEF;
  font-family: 'Harmattan', sans-serif;

}
.fa{
	padding: 15px;
	font-size: 25px;
	color:#FCFAEF ;
	text-decoration: none;
}
.fa:hover{
	color:#063a76 ;
	text-decoration: none;
}
.fa:visited {
	color:#FCFAEF ;
}
.icon{
	max-width: 200px;	
}
.video_icon{
	max-width: 10%;
}
.video_play{
	position: relative;
	width: 100%    !important;
  	height: auto   !important;
}
.owner img{
	width: 100%;
	border-radius: 50%;
}
.articleView{
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
}


.articleDiv{
	margin: 1%;
	padding: 0; 
	border: 0.5px solid #205d67;
}
.articleDiv a { 
	color: #205D67;
}
.articleDiv img { 
	object-fit: cover;
	width: 100%;
	height: 250px;
}
@media (min-width: 768px){
	.vertical-center {
	  transform: translate(4%, 70%);
	  position: relative;
	  top: 50%;
	  padding: 20px;
	  resize: both;
	}

}
@media (max-width: 768px){
	.navbar-brand img{
		width: 65%;
	}
	.nav-direct{
   		display: flex;
    	flex-direction: column; 
  	}
	.landing-text h1{
	font-size: 300%;
	}
	.fa{
		font-size: 20px;
		padding: 10px;
	}	
	.icon{
		padding-top: 5%;
		max-width: 100px;
	}
	.button{
		border-radius: 6vw;
		font-size: 4.5vw;
	}
	.role{
	font-size: 115%;

	}
	.list-img{
	max-width: 40px;

	}

}

.container {right: 0; text-align: center; width: 100%;  height: 10em; }

.container .left, .container .center, .container .right { display: inline-block; border-bottom: 1px solid white;height: 7em; }

.container .left {  float: left;  width: 33.3%; text-align: left;}
.container .center { margin: 0 auto;  width: 33.3%; }
.container .right { float: right; width:33.3%; }
.clear { clear: both; }
</style>
<!-- Footer -->

  <footer>
    <div class="container">
        <div class="center">
          
        </div>
      <div class="left" >
        <img style="width: 100%" src="<?php echo base_url()?>assets/img/logo_2.png" class="icon">
      </div>
      
      <div class="right">
      	<p></p>
        <h4> تصميم : شذا الأسدي </h4>
        <h4> الخدمة التقنية :فنجان هوست </h4>
      </div>
    </div>
  </footer>
  <!-- End Footer -->

</body>



</html>
</html>