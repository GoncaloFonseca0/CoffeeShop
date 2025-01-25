<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link href="bootstrap-4.5.3-dist/css/bootstrap.css" rel="stylesheet" />
  <link href="bootstrap-4.5.3-dist/css/estilos.css" rel="stylesheet" />
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="images/one.jpg" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
              <img src="images/one.jpg" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
              <img src="images/one.jpg" class="d-block w-100" alt="..." />
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
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                Search
              </button>
            </form>
          </div>
        </nav>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-md-4">
        <div class="card" style="width: 18rem">
          <img src="images/dois.webp" class="card-img-top" alt="..." />
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">
              Some quick example text to build on the card title and make up
              the bulk of the card's content.
            </p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-md-8">
        <div class="container">
          <form action="#" method="post" enctype="application/x-www-form-urlencoded" id="frm" name="frm">
            <div class="form-group">
              <label>Input</label>
              <input type="text" id="txtinput" name="txtinput" class="form-control">
            </div>
            <div class="form-group d-flex justify-content-lg-start">
              <button id="btdobro" name="btdobro" type="button" class="btn btn-danger m-3">Dobro</button>
              <button id="btselos" name="btselos" type="button" class="btn btn-success m-3">Selos</button>
              <button id="btphp" name="btphp" type="submit" class="btn btn-dark m-3">php</button>

            </div>

            <div id="tv">
              <?php
              if (isset($_REQUEST['txtinput'])) {
                $dobro = 2 * intval($_REQUEST['txtinput']);
                echo $dobro;
              }
              ?>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="bootstrap-4.5.3-dist/js/jquery-3.7.1.js"></script>
  <script src="bootstrap-4.5.3-dist/js/bootstrap.js"></script>
  <script src="bootstrap-4.5.3-dist/js/bootstrap.bundle.js"></script>
  <script type="text/javascript">
    window.onload = function () {
      const frm = document.getElementById("frm");
      const btdobro = document.getElementById("btdobro");
      const txtinput = document.getElementById("txtinput");
      txtinput.value = 34;
      const tv = document.getElementById("tv");

      btdobro.onclick = (evt) => {
        let formdata = new FormData(frm);
        formdata.append("escola", "istec");
        for (const [k, v] of formdata.entries()) {
          console.log(`${k}->${v}`);
        }
        evt.preventDefault();
        fetch("Dobro.php", {
          method: "POST",

          body: formdata
        }).then(response => response.json())
          .then(dados => {
            console.log(dados);
            tv.innerHTML = `<h3>${dados.dobro}</h3>`
          }).catch(erro => { tv.innerHTML = "Erro"; });
      };
    };
  </script>
</body>

</html>