<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>My first three.js app</title>
  <style>
    body {
      margin: 0;
    }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="/public/css/styles.css">

  <script async src="https://unpkg.com/es-module-shims@1.6.3/dist/es-module-shims.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>

  <script type="importmap">
      {
        "imports": {
          "three": "https://unpkg.com/three@v0.152.2/build/three.module.js",
          "three/addons/": "https://unpkg.com/three@v0.152.2/examples/jsm/"
        }
      }
    </script>

  <link rel="stylesheet" href="/public/js/navbar.js">
  <!-- <link rel="stylesheet" href="./public/js/main.js"> -->


  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      text-decoration: none;
      background: #1f1f1f;
    }
  </style>
</head>

<body>

  <div id="app">
    <!-- navbar -->
    <div class="container">


      <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
          <a class="navbar-brand text-white fs-2 text" href="#"><img src="/public/images/carlogo.png" alt=""
              style="width: 100px; height: 100px;"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse ms-5" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-5 mb-lg-0 tabs">
              <li class="nav-item ms-5  tab-item active">
                <a class="nav-link active text-secondary fs-2 text" aria-current="page" href="#">Trang chủ</a>
              </li>
              <li class="nav-item ms-5 tab-item">
                <a class="nav-link text-secondary fs-2 text" href="#">Danh sách xe</a>
              </li>
              <li class="nav-item ms-5 tab-item">
                <a class="nav-link text-secondary fs-2 text" href="#">Cửa hàng</a>
              </li>
              <li class="nav-item ms-5 tab-item">
                <a class="nav-link text-secondary fs-2 text" href="#">Liên hệ</a>
              </li>
              <div class="line"></div>
            </ul>
            <!-- <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
          </div>
        </div>
      </nav>


      <div class="tab-content">
        <!-- Trang chu -->
        <div class="home tab-pane active">
          <div class="homepage fs-2 text text-white pt-5">
            <h1 id="text3d">Chào mừng bạn đến với thế giới xe của chúng tôi</h1>
            <div class="txt">
              <canvas class="webText"></canvas>
            </div>
          </div>
          <div class="glb3d ">
            <canvas class="webCar" style=" width: 100%; height: 100%;"></canvas>
          </div>
        </div>

        <!-- Danh sách xe -->
        <div class="tab-pane">
          <h2>Angular</h2>
          <p>Angular is an application design framework and development platform for creating efficient and
            sophisticated single-page apps.</p>
        </div>
        <!-- Danh sách sủa hàng -->
        <div class="tab-pane">
          <h2>Ember</h2>
          <p>Ember.js is a productive, battle-tested JavaScript framework for building modern web applications. It
            includes everything you need to build rich UIs that work on any device.</p>
        </div>
        <!-- Liên hệ -->
        <div class="tab-pane">
          <footer id="footer-Section">
            <div class="footer-top-layout">
              <div class="container">
                <div class="row">
                  <div class="OurBlog">
                    <h4>Trang web giới thiệu xe Ô Tô.</h4>
                    <p>Cảm ơn các bạn đã ghé thăm Cửa hàng của chúng tôi.</p>
                    <div class="post-blog-date">Xin chân thành cảm ơn.</div>
                  </div>
                  <div class="row contact">
                    <div class="col-md-4">
                      <div class="footer-col-item">
                        <h4>Địa chỉ trụ sở chính</h4>
                        <address>
                          
                        999 Võ Văn Ngân, Thủ Đức
                        </address>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="footer-col-item">
                        <h4>Liên hệ với chúng tôi</h4>
                        <div class="item-contact"> <a href="tel:630-885-9200"><span class="link-id">P</span>:<span>630-885-9200</span></a> <a href="tel:630-839.2006"><span class="link-id">F</span>:<span>630-839.2006</span></a> <a href="mailto:info@brandcatmedia.com"><span class="link-id">E</span>:<span>voduy12345duyvo@gmail.com</span></a> </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="footer-col-item">
                        <h4>Đăng kí để nhận tin mới nhất</h4>
                        <form class="signUpNewsletter" action="" method="get">
                          <input name="" class="gt-email form-control" placeholder="You@youremail.com" type="text">
                          <input name="" class="btn-go" value="Go" type="button">
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="footer-bottom-layout">
              <div class="socialMedia-footer"> <a href="#"><img src="/public/images/face.png"></a> <a href="#"><img src="/public/images/tele.png"></a> <a href="#"><img src="/public/images/zalo.png"></a> <a href="#"><img src="/public/images/youtube.png"></a> <a href="#"><img src="/public/images/inta.png"></a> </div>
              <div class="copyright-tag">Copyright © 2023 company Duy. All Rights Reserved.</div>
            </div>
          </footer>
        </div>




      </div>


    </div>

  </div>
  <script type="module" src="/public/js/main.js"></script>
</body>

</html>