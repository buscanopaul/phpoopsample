<?php require_once 'controllers/register.controller.php'; ?>
<?php include 'templates/header.php'; ?>



	<div class="wrapper" >

	
                 <div class="row">

                        <div class="col-lg-6 col-lg-offset-3 text-center">

                        <h1>REGISTER</h1>

                        <form class="form" action=" " method="post">

                        <div class="form-group">
                            <div class=" <?php if(isset($_POST['username']) && $_POST['username'] == "") echo "has-error";?>">
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo escape(Input::get('username')); ?>" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class=" <?php if(isset($_POST['Password']) && $_POST['Password'] == "") echo "has-error";?>">
                                <input type="password" class="form-control" name="Password" id="Password" placeholder="Password" value="<?php echo escape(Input::get('password')); ?>" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class=" <?php if(isset($_POST['rePassword']) && $_POST['rePassword'] == "") echo "has-error";?>">
                                <input type="password" class="form-control" name="rePassword" id="rePassword" placeholder="Re-Enter Password" value="<?php echo escape(Input::get('rePassword')); ?>" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class=" <?php if(isset($_POST['name']) && $_POST['name'] == "") echo "has-error";?>">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo escape(Input::get('name')); ?>" autocomplete="off">
                            </div>
                        </div>

                        <button  type="submit"  class="btn btn-primary btn-lg" id="submit">Sign-up</button>
                        
                        <input type="hidden" name="token" value="<?php echo Token::generate();  ?>">


                        </form>


                            <?php if(Session::exists('error')) echo Session::flash('error'); ?>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <?php require_once 'templates/message.php'; ?>
                                </div>
                             </div>  



                        </div>
                </div>
                

	</div>

	

<?php require_once 'templates/footer.php'; ?>





