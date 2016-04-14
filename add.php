<?php require_once 'controllers/add.controller.php'; ?>
<?php include 'templates/header.php'; ?>



    <div class="wrapper" >

    
                 <div class="row">

                        <div class="col-lg-6 col-lg-offset-3 text-center">

                        <h1>ADD</h1>

                        <form class="form" action=" " method="post">

                         <div class="form-group">
                            <div class=" <?php if(isset($_POST['firstname']) && $_POST['firstname'] == "") echo "has-error";?>">
                                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Firstname" value="<?php echo escape(Input::get('firstname')); ?>" autocomplete="off">
                            </div>
                        </div>

                         <div class="form-group">
                            <div class=" <?php if(isset($_POST['lastname']) && $_POST['lastname'] == "") echo "has-error";?>">
                                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Lastname" value="<?php echo escape(Input::get('lastname')); ?>" autocomplete="off">
                            </div>
                        </div>


                          <div class="form-group">
                            <div class=" <?php if(isset($_POST['age']) && $_POST['age'] == "") echo "has-error";?>">
                                <input type="text" class="form-control" name="age" id="age" placeholder="Age" value="<?php echo escape(Input::get('age')); ?>" autocomplete="off">
                            </div>
                        </div>


                        <button  type="submit"  class="btn btn-primary btn-lg" id="submit">Add Record</button>
                        
                        <input type="hidden" name="token" value="<?php echo Token::generate();  ?>">


                        </form>


                            <?php if(Session::exists('error')) echo Session::flash('error'); ?>

                        </div>
                </div>
                

    </div>

    

<?php require_once 'templates/footer.php'; ?>





