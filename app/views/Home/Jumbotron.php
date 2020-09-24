<div class="jumbotron jumbotron-fluid">
  <div class="container dot">
    <h1 class="display-4">Next Generation <span class="bolding">Code Editor</span> For <br /><span class="bolding">Web Browser</span><br /><button class="btn btn-dark" style="border-radius: 0;" data-toggle="modal" data-target="#LoginParam">Login</button></h1>
  </div>
</div>
<!-- Modal -->
<div style="border-radius: 0;" class="modal fade" id="LoginParam" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="LoginParamLabel" aria-hidden="true">
  <div class="modal-dialog" style="border-radius: 0;">
    <div class="modal-content" style="border-radius: 0;">
      <div class="modal-header" style="border-radius: 0;">
        <h5 class="modal-title" id="LoginParamLabel">
        	<a class="navbar-brand" style="color: black !important;" href="#">
		        <img src="<?= base_url; ?>public/img/Favicon.png" width="30" height="30" class="d-inline-block align-top odading" alt="" loading="lazy">
		        <?= $data['title']; ?> Login
		    </a>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
		  <div class="form-group">
		    <label for="formGroupExampleInput">Username :</label>
		    <input name="username" type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter Your Username">
		  </div>
		  <div class="form-group">
		    <label for="formGroupExampleInput2">Password :</label>
		    <input name="password" type="password" class="form-control" id="formGroupExampleInput2" placeholder="Enter Your Password Here">
		  </div>
		  <button name="submit" class="btn btn-dark" style="border-radius: 0;" type="submit">Submit</button>
		</form>
      </div>
    </div>
  </div>
</div>