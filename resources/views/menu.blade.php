<title>Menu & Price</title>
<link rel="icon" href="logo.png">

@include('layouts.app')
<style>
  
  <link href="/docs/4.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</style>

<main role="main"  style="background-color: beige">

  <section class="jumbotron text-center" style="background-color: khaki">
    <div class="container">
      <h1 class="jumbotron-heading">MENU PRICE</h1>
      <p class="lead text-muted"  style="font-weight: bold">Here is the menu for you to choose <br><br>
        Price <br>
      1 cones for RM 1.00 <br>
    </p>
      
    </div>
  </section>

  <div  style="background-color: beige">
    <div class="container">
      <div class="row">
        @foreach($items as $item)
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="0" aria-label="Placeholder: Thumbnail"><img src=img/{{ $item->image }}></svg>
              <div class="card-body"  style="background-color: khaki">
                <h4 class="card-text" align="center"><b>{{ $item->flavour }}</b></h4>
                <div class="d-flex justify-content-between align-items-center">
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</main>

@include("layouts.footer")