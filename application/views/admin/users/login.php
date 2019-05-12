<?php $attr = array('class'=>'form-signin'); ?>

<?php echo form_open('admin/users/login',$attr); ?>
  <img class="mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Sparkup Admin Login</h1>
  <?php if($this->session->flashdata('success')):?>
      <?php echo '<div class="alert alert-success">'.$this->session->flashdata('success').'</div>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('error')):?>
      <?php echo '<div class="alert alert-danger">'.$this->session->flashdata('error').'</div>'; ?>
<?php endif; ?>

  <?php echo validation_errors('<p class="alert alert-danger">'); ?>
  <?php if($this->session->flashdata('success')):?>
      <?php echo '<div class="alert alert-success">'.$this->session->flashdata('success').'</div>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('error')):?>
      <?php echo '<div class="alert alert-danger">'.$this->session->flashdata('error').'</div>'; ?>
<?php endif; ?>
  <label for="username" class="sr-only">Username</label>
  <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
  <br>
  <label for="Password" class="sr-only">Password</label>
  <input type="password" name="password" id="Password" class="form-control" placeholder="Password" required>
  
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
<?php form_close()?>