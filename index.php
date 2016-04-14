<?php require_once 'controllers/index.controller.php'; ?>
<?php include 'templates/header.php'; ?>



    <div class="wrapper" >

    
                 <div class="row">

                        <div class="col-lg-6 col-lg-offset-3 text-center">

                        <h1>LOGIN</h1>

                        <form class="form" action=" " method="post">

                        <div class="form-group">
                            <div>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo escape(Input::get('username')); ?>" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                            </div>
                        </div>


                        <button  type="submit"  class="btn btn-primary btn-lg" id="submit">LOGIN</button>
                         <a href="register.php"<button class="btn btn-primary btn-lg">REGISTER</button></a>
                        
                        <input type="hidden" name="token" value="<?php echo Token::generate();  ?>">


                        </form>


                            <?php if(Session::exists('error')) echo Session::flash('error'); ?>

                        </div>
                </div>
                

    </div>

    

<?php require_once 'templates/footer.php'; ?>





