 <?php
 require 'config/databaseconfig.php';
 ?>
 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Urbanup Glezz Fellowship Program</title>
	<link rel="stylesheet" type="text/css" href="css/Fellowship.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<section class="vh-200px" id="form"> 
<form method="POST" name="Fellowship" action="" enctype="multipart/form-data" >
  <div class="container h-150">
    <div class="row d-flex justify-content-center align-items-center h-150 ">
      <div class="col-xl-10 col-sm-6 mb-4">

        <div class="card  mt-4" style="border-radius: 15px; background-color: rgb(255, 255, 255, 0.8); margin-bottom: 3;">
          <div class="card-body">
          	 
          	 

          	<div class="row align-items-center pt-4 pb-3">
              <div class="col-lg-12">
                <img src="Images/Fellowship2023_Website-Banner-1.jpg" width="100%" height="100%">
              </div>
            </div>

            <div class="row align-items-center pt-4 pb-3">
              <div class="col-lg-11 ps-5 ">
                <h6 class="mb-1">Required Information</h6>             
                <div class="small text-muted mt-2">Thank you for your interest in applying to be a Urbanup Glezz fellow. Please complete the application below and submit all required materials to be considered.</div>
              </div>
            </div>

            <hr class="mx-n3">

            <div class="row align-items-center pt-4 pb-3">
              <div class="col-lg-11 ps-5 ">
                <h6 class="mb-2">Fellowship of Interest</h6>
                <select name="interest" id="interest" required="required"  class="form-select form-select-sm" aria-label=".form-select-sm example">
                  <option value="">-- Select Item--</option>
                  <?php
                  $sql = "SELECT     F_code,F_name FROM tblFInterest 
                  WHERE     (Active = 'True')";
                  
                  //echo $sql;
                  
                  $stmt = sqlsrv_query( $conn, $sql );
                  if( $stmt === false) {
                      die( print_r( sqlsrv_errors(), true) );
                   }
                  
                   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
                      
                   echo'<option  value="'.$row[0].'">'.$row[1].' </option>';
                    }
                  
                  sqlsrv_free_stmt( $stmt);
                ?>
                </select>
              </div>
            </div>

            <hr class="mx-n3">

          	<div class="row align-items-center pt-4 pb-3">
              <div class="col-md-6 ps-5 ">
                <h6 class="mb-2">ID Number (National ID/ Passport ID)</h6>
                <input class="form-control form-control-sm" name="IDNumber" required="required" type="text" placeholder="Valid National ID/ Passport ID" aria-label=".form-control-sm example">
              </div>
            </div>
            
            <hr class="mx-n3">
            
            <div class="row align-items-center pt-4 pb-3">
              <div class="col-md-2 ps-5 ">
                <h6 class="mb-1">Prefix</h6>

                <select class="form-select form-select-sm" required="required" aria-label=".form-select-sm example" name="prefix">
  					       <option selected value="0">Mr.</option>
  					       <option value="1" >Ms</option>
  					       <option value="2">Mrs.</option>
  					       <option value="3">Miss.</option>
  					       <option value="4">Dr.</option>
  					       <option value="5">Prof.</option>
  					       <option value="6">Rev.</option>
				        </select>
            	</div>
              <div class="col-md-9 ps-5 ">
                <h6 class="mb-1">Full Name</h6>
                <input class="form-control form-control-sm" required="required" type="text" placeholder="Full Name" aria-label=".form-control-sm example" name="FullName">
              </div>
            </div>

            <hr class="mx-n3">

             <div class="row align-items-center pt-4 pb-3">
              <div class="col-md-2 ps-5 ">
                <h6 class="mb-1">Code+</h6>
               
                  <select name="Code" id="Code" required="required"  class="form-select form-select-sm" aria-label=".form-select-sm example">
                  <option value="">-- Select --</option>
                  <?php
                  $sql = "SELECT     Code,Country FROM tblCountryFellowship 
                  WHERE     (Active = 'True') ORDER BY Country";
                  
                  //echo $sql;
                  
                  $stmt = sqlsrv_query( $conn, $sql );
                  if( $stmt === false) {
                      die( print_r( sqlsrv_errors(), true) );
                   }
                  
                   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
                      
                   echo'<option  value="'.$row[0].'">'.$row[0].' ('.$row[1].')'. '</option>';
                    }
                  
                  sqlsrv_free_stmt( $stmt);
                ?>
                </select>
            	</div>
              
            	<div class="col-md-3 ps-5 ">
            	<h6 class="mb-1">Phone Number</h6>
                <input class="form-control form-control-sm" required="required" type="text" placeholder=" " aria-label=".form-control-sm example" name="PNumber">
              </div>
              <div class="col-md-6 ps-5 ">
            	<h6 class="mb-1">E-mail</h6>
                <input class="form-control form-control-sm" required="required" type="text" placeholder="example@example.com" aria-label=".form-control-sm example" name="Email">
              </div>
            </div>

            <hr class="mx-n3">

            <div class="row align-items-center pt-4 pb-3">
              <div class="col-md-2 ps-5 ">
                <h6 class="mb-1">Zip</h6>
                <input class="form-control form-control-sm" type="text" placeholder=" " aria-label=".form-control-sm example" name="Zip">
            	</div>
            	<div class="col-md-3 ps-5 ">
            	<h6 class="mb-1">City</h6>
                <input class="form-control form-control-sm" type="text" placeholder=" " aria-label=".form-control-sm example" name="City">
              </div>
              <div class="col-md-3 ps-5 ">
            	<h6 class="mb-1">State/Province/Region</h6>
                <input class="form-control form-control-sm" required="required" type="text" placeholder="" aria-label=".form-control-sm example" name="State">
              </div>
              <div class="col-md-3 ps-5 ">
            	<h6 class="mb-1">Country</h6>
              <select name="Country" id="Country" required="required"  class="form-select form-select-sm" aria-label=".form-select-sm example">
                  <option value="">-- Select Item--</option>
                  <?php
                  $sql = "SELECT     Code,Country FROM tblCountryFellowship 
                  WHERE     (Active = 'True') ORDER BY Country";
                  
                  //echo $sql;
                  
                  $stmt = sqlsrv_query( $conn, $sql );
                  if( $stmt === false) {
                      die( print_r( sqlsrv_errors(), true) );
                   }
                  
                   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
                      
                   echo'<option  value="'.$row[0].'">'.$row[1].' </option>';
                    }
                  
                  sqlsrv_free_stmt( $stmt);
                ?>
                </select>
              </div>
            </div>

            <hr class="mx-n3">
             <div class="row align-items-center pt-4 pb-3">
              <div class="col-md-5 ps-5 ">
                <h6 class="mb-1">Full Name of the University</h6>
                <input class="form-control form-control-sm" type="text" required="required" placeholder="Ex: University of Virginia" aria-label=".form-control-sm example" name="University">
              </div>
              <div class="col-md-6 ps-5 ">
                <h6 class="mb-1">Degree that you completed</h6>
                <input class="form-control form-control-sm" type="text" required="required" placeholder="Ex: Master of Landscape Architecture" aria-label=".form-control-sm example" name="Degree">
              </div>
            </div>

             <hr class="mx-n3">

             <div class="row align-items-center pt-4 pb-3">
              <div class="col-lg-11 ps-5 ">
                <h6 class="mb-3">Supporting Documentation</h6>
                <input class="form-control form-control-sm" id="formFileLg" type="file" name="Document" required/>
                <div class="small text-muted mt-2">Upload your CV/Resume or any other relevant file. Max file size 50 MB</div>
              </div>
            </div>

            <hr class="mx-n3">

            <div class="row align-items-center pt-4 pb-3">
              <div class="col-lg-11 ps-5 ">
                <h6 class="mb-1">Personal Statement</h6>
                <div class="small text-muted mt-2 mb-3">
                	Brief personal statement explaining your career plans & why you would make a great participant in this program (150 words)
            	</div>
                <textarea class="form-control form-control-sm" rows="3" placeholder="" max ="150" name="Statement"></textarea>
                

              </div>
            </div>

            <hr class="mx-n3">
             <div class="row align-items-center pt-4 pb-3">
              <div class="col-lg-11 ps-5 ">
                <h6 class="mb-1">Portfolio Link</h6>
                <input class="form-control form-control-sm" type="text" placeholder="behance/dribble/Adobe/etc" aria-label=".form-control-sm example" name="Portfolio">
              </div>
            </div>
            <hr class="mx-n3">

            <div class="row align-items-center pt-4 pb-3">
              <div class="col-lg-11 ps-5 ">
                <h6 class="mb-1">Decleration</h6>             
                <div class="small text-muted mt-2"><input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="Decleration" > <label class="form-check-label" for="flexCheckDefault">I do hereby declare that the details given above are true and correct to the best of my knowledge and belief. </label></div> 
              </div>
            </div>

            <hr class="mx-n3">

            <div class="px-5 py-4">
             <button class="button1" formaction="config/Fellowship.php">Send Application</button>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div> 
</form>
</section>
















<!--Option 1: Boostrap Bundle with Proper-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>