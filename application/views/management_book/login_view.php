<!Doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Osboha 180</title>
        <meta name="description" content="موقع فريق الاستقدام لمشروع اصبوحة 180">
        <meta name="keywords" content="فريق الإستقدام" />
        <meta name="author" content="Masa Alhanoun" />
        
            <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
            <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>

            <link rel="stylesheet" href="<?php echo base_url()?>assets/css/login.css"/>
            <link rel="icon" href="<?php echo base_url()?>assets/img/logo.png"/>
            <!-- Google Font -->
            <link href="https://fonts.googleapis.com/css?family=El+Messiri:500&display=swap" rel="stylesheet">
            
            <!-- Typed.js -->
            <script src="<?php echo base_url()?>assets/Js/typed.min.js"></script>
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 
            
            <style>.sign-up-htm{overflow: auto}
body{
    background: #f5f6fa;
}
  
.login-html{
    background: -webkit-linear-gradient(-45deg, rgba(238, 238, 238, .9) 50%, rgba(0, 128, 128, .9) 50%);
    background: -o-linear-gradient(-45deg, rgba(238, 238, 238, .8) 50%, rgba(0, 128, 128, .9) 50%);
    background: -moz-linear-gradient(-45deg, rgba(238, 238, 238, .8) 50%, rgba(0, 128, 128, .9) 50%);
    background: linear-gradient(-45deg, rgba(238, 238, 238, .8) 50%, rgba(0, 128, 128, .9) 50%);
}
.login-html .sign-in:checked + .tab,
.login-html .sign-up:checked + .tab{
    border-color:rgba(64, 59, 74,1);
}
.main{
    color:rgba(64, 58, 62,1);
    border-color:rgba(64, 58, 62,1);
}
.login-form .group .button{
    background:rgba(64, 59, 74,1);
}
.login-form .group .check:checked + label .icon{
    background:rgba(64, 59, 74,1);
}
.loading-overlay{
    background:rgba(0, 128, 128, 1);
}
.sk-cube-grid .sk-cube {
  background-color: rgba(238, 238, 238, 1);
}
            </style>
    </head>
    <body>
        <div class="login-wrap">
            <div class="login-html">
            <div class="main" style="font-size:135%; font-family:'El Messiri', sans-serif;">
                أصبوحة <span> 180</span> | <b class="typed"></b>
            </div><br>
                <p style="color:#aaa"><?php 
                if($this->session->flashdata('errors')){
                    echo $this->session->flashdata('errors');
                }
                if($this->session->flashdata('login_failed')){
                    echo $this->session->flashdata('login_failed');
                } 
                $uri = $this->uri->segment(2);
            ?></p>
                    
            <input id="tab-1" type="radio" name="tab" class="sign-in" <?php if($uri != "reg"){ ?>checked <?php 
            }else{ ?> style="color:#aaa" <?php } ?>>
            
            <label for="tab-1" class="tab">Login</label>
                
            <input id="tab-2" type="radio" name="tab" class="sign-up" <?php if($uri == "reg"){ ?>checked <?php 
            }else{ ?> style="color:#aaa" <?php } ?>>
            
            <label for="tab-2" class="tab">Register</label>
                    
                    
            <div class="login-form">
            <div class="sign-in-htm">
                <form action="<?php echo base_url('login/index'); ?>" method="POST">
                    <div class="group">
                        <label for="email" class="label">Email</label>
                        <input id="email" type="email" name="email" class="input" required>
                    </div>

                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="pass" type="password" name="password" class="input" data-type="password" required>
                    </div>

                    <div class="group"> <br>
                        <input type="submit" name="login" value="Login" class="button">
                    </div>

                    <div class="hr"></div>
                        <div class="foot-lnk">
                            <label for="tab-2">Not a Member Yet ?</label>
                        </div>
                </form> 
            </div>
                
             <div class="sign-up-htm">
                <form action="<?php echo base_url('login/reg/'); ?>" method="POST">
                    
                <?php if(isset($_SESSION['msg'])) {?>
                <div class="" style='color:#aaa'><?php echo $_SESSION['msg'];?> </div>
                <?php } ?>
                <?php echo validation_errors('<div style="color:#aaa">','</div>') ;?>

                <div class="group">
                    <label for="user" class="label">Your Name On Facebook</label>
                    <input id="user" type="text" name="username" class="input" autocomplete="off" required>
                </div>
                    
                <div class="group">
                    <label for="password" class="label">Password</label>
                    <input id="password" type="password" name="r_password" class="input" data-type="password" required>
                </div>
                    
                <div class="group">
                    <label for="repass" class="label">Repeat Password</label>
                    <input id="repass" type="password" name="password2" class="input" data-type="password" required>
                </div>
                    
                <div class="group">
                    <label for="mail" class="label">Email Address</label>
                    <input id="mail" type="email" name="r_email" class="input" autocomplete="off" required>
                </div>
                    
                <div class="group">
                    <input type="submit" class="button" name="register" value="Register">
                </div>
            </form>
			</div>
		    </div>
	       </div>
        </div>
        <br /><br />
        <div class="text-center">
            <footer style="position:relative; background-color:rgba(229, 229, 190,.1); color:#6b6b83; padding:10px">
                 &copy; Osboha 180 | Developed By: <span>
                     <a href="">Programmers Team</a>
                </span>
            </footer> 
        </div> 
    </body>
    <section class="loading-overlay">
        <div class="sk-cube-grid">
          <div class="sk-cube sk-cube1"></div>
          <div class="sk-cube sk-cube2"></div>
          <div class="sk-cube sk-cube3"></div>
          <div class="sk-cube sk-cube4"></div>
          <div class="sk-cube sk-cube5"></div>
          <div class="sk-cube sk-cube6"></div>
          <div class="sk-cube sk-cube7"></div>
          <div class="sk-cube sk-cube8"></div>
          <div class="sk-cube sk-cube9"></div>
        </div>
    </section>
    <script>
        
            $(document).ready(function(){
                $('.sign-in').prop('checked',(function(){  
                    $('.login-wrap').css('min-height','640px');
                })); 
                
                $('.sign-up').change('checked',(function(){  
                    $('.login-wrap').css('min-height','700px');
                }));
                
                $('.sign-in').change(function(){  
                    $('.login-wrap').css('min-height','640px');
                });
                
                // Loading Screen
                $(".loading-overlay .sk-cube-grid").fadeOut(500, 
                function(){
                    $(this).parent().fadeOut(500,
                    function(){
                        $(this).remove();
                    });
                });
              });
        
            // Typed Options
            var typed = new Typed('.typed',{
                strings:['إدارة رف الكتب'], 
                typeSpeed: 50,
                backSpeed: 50,
                loop: false,
                //loopCount: 1,
                startDelay: 1000,
                backDelay: 1200,
                showCursor: false,

            });
    </script>
</html>