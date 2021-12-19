  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <br>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="<?php echo base_url(); ?>assets/images/lapangan1.jpg" alt="First slide">
              <div class="carousel-caption d-none d-md-block">
                <h5>Lapangan 1</h5>
                <p>Jl. Rambutan</p>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="<?php echo base_url(); ?>assets/images/lapangan1.jpg" alt="Second slide">
              <div class="carousel-caption d-none d-md-block">
                <h5>Lapangan 1</h5>
                <p>Jl. Rambutan</p>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="<?php echo base_url(); ?>assets/images/lapangan1.jpg" alt="Third slide">
              <div class="carousel-caption d-none d-md-block">
                <h5>Lapangan 1</h5>
                <p>Jl. Rambutan</p>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <br>
        <a class="btn btn-primary btn-lg" href="#">Call to Action &raquo;</a>
      </div>
      <div class="col-md-4">
        <div class="card my-4">
          <h5 class="card-header text-center">Login</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <br>
            <div class="input-group">
              <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <br>
            <div class="input-group">
              <input type="submit" class="btn btn-success" name="submit" value="Login">
              &nbsp;
              <input type="submit" class="btn btn-info" name="submit" value="Daftar">
            </div>
          </div>
        </div>
        <div class="card my-4" style="text-align: center;">
          <h5 class="card-header text-center">Contact Us</h5>
          <address>
            <strong>Start Bootstrap</strong>
            <br>3481 Melrose Place
            <br>Beverly Hills, CA 90210
            <br>
          </address>
          <address>
            <abbr title="Phone">P:</abbr>
            (123) 456-7890
            <br>
            <abbr title="Email">E:</abbr>
            <a href="mailto:#">name@example.com</a>
          </address>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-4 my-4">
          <div class="card fitcard">
            <img class="card-img-top" src="http://placehold.it/300x200" alt="">
            <div class="card-body">
              <h4 class="card-title">Card title</h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque sequi doloribus.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Find Out More!</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4 my-4">
          <div class="card fitcard">
            <img class="card-img-top" src="http://placehold.it/300x200" alt="">
            <div class="card-body">
              <h4 class="card-title">Card title</h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque sequi doloribus totam ut praesentium aut.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Find Out More!</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4 my-4">
          <div class="card fitcard">
            <img class="card-img-top" src="http://placehold.it/300x200" alt="">
            <div class="card-body">
              <h4 class="card-title">Card title</h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Find Out More!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
