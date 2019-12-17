<title>Order Now</title>
<link rel="icon" href="logo.png">

@extends('layouts.CustomerNavbar')

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.4/themes/sunny/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


<script type="text/javascript">
    function checkQuanity() {
      var x;
      x = document.getElementById("quantity").value;
      if (x < 300 || x > 2500) {
        alert("Invalid Quantity");
        return false;
        $('#invoice').modal('hide');
      }
      return true;
    }

    $(document).on('input','.prc',function(){
      var totalPrice=0;
      $('.txtbox .prc').each(function(){
        var inputval = $(this).val();
        if ($.isNumeric(inputval)){
          totalPrice+=parseFloat(inputval);
        }
      });
      $('#price').text(totalPrice);
    });

    $(document).ready(function($) {
        $('.datepicker').datepicker({
            dateFormat: "dd/mm/yy",
            minDate:new Date(),
        });
    });



    function submitText(){
            var price=$("#price").val();
            var address=$("#address").val();
            var date=$("#date").val();
            var time=$("#time").val();
            var flavour=document.getElementById("flavour").innerHTML;
            var price=$("#price").val();
            var quantity=$("#quantity").val();

            $(".modal-body #alamat").val( address );
            $(".modal-body #harga").val( price );
            $(".modal-body #tarikh").val( date );
            $(".modal-body #masa").val( time );
            $(".modal-body #perisa").val( flavour );
            $(".modal-body #harga").val( price );
            $(".modal-body #kuantiti").val( quantity );
        }
</script>

<style>
  .card-body{
    background-color: #FFD662;
  }

  /*======================================= FOR CHECKBOX ==============================================*/
.chkbox {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 15px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.chkbox input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #FAF6D9;
}

/* On mouse-over, add a grey background color */
.chkbox:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.chkbox input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.chkbox input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.chkbox .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}

</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header" align="center" style="background-color: orange"><h1>ORDER NOW</h1></div>

                <div class="card-body">
                    <form method="POST" action="/order/create" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><b>{{ __('Date') }}</b></label>

                            <div class="col-md-6">
                                <input id="date" type="text" class="form-control datepicker{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" value="{{ old('date') }}" autocomplete="off" required style="background:#FAF6D9;" required>

                                @if ($errors->has('date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="time" class="col-md-4 col-form-label text-md-right"><b>{{ __('Time') }}</b></label>

                            <div class="col-md-6">
                                <input id="time" type="time" class="form-control timing{{ $errors->has('time') ? ' is-invalid' : '' }}" name="time" value="{{ old('time') }}" required style="background:#FAF6D9;" required>

                                @if ($errors->has('time'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('time') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right"><b>{{ __('Address') }}</b></label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" autocomplete="off" required style="background:#FAF6D9;" required>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="flavour" class="col-md-4 col-form-label text-md-right"><b>{{ __('Flavour') }}</b></label>

                            <div class="col-md-6">
                                <table>
                                    @foreach($items as $item)
                                        <tr>
                                          <td>
                                            <label class="chkbox">{{$item->flavour }}
                                              <input type="checkbox" name="flavour[]"  value="{{ $item->id }}">
                                              <p hidden id="flavour">{{ $item->flavour }}</p>
                                              <span class="checkmark"></span>
                                            </label>
                                          </td>
                                        
                                        <td>
                                          <div>
                                            <label class="txtbox">
                                              <input class="prc" id="quantity" type="number" name="quantity[{{ $item->id }}]" value="{{ old('quantity') }}" max="2500" min="300" style="background:#FAF6D9;">
                                            </label>
                                          </div>
                                        </td>
                                      </tr>
                                    @endforeach
                                </table>
                                @if ($errors->has('flavour'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('flavour') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right"><b>{{ __('Price (RM)') }}</b></label>

                            <div class="col-md-6">
                                
                                <div class="form-control" style="background:#FAF6D9;"><output id=price name="price"></output></div>

                                @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <input type=hidden name=status value="Pending">
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                
                            <!-- Button trigger modal-->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#invoice" onclick="submitText(); checkQuanity();">Next </button>








                            <!-- Modal: modalCart -->
                            <div class="modal fade" id="invoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                              <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content" >
                                  <!--Header-->
                                  <div class="modal-header">
                                    <h4 class="modal-title" style="position:fixed;left: 330px"><b>Invoice</b></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                  </div>
                                  <!--Body-->
                                  <div class="modal-body">

                                    <section class="content content_content" style="width: 100%; margin: auto;">
                    <section class="invoice">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-xs-12">
                                <h2 class="page-header">
                                    <p class="fa fa-globe" style="position: fixed;left: 190px">A.O Soft Ice Cream Enterprise</p> <br><br>
                                </h2>
                            </div><!-- /.col -->
                        </div>
                         <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                        <table>
                          <tr><td>NAME</td><td>:</td><td>{{ Auth::user()->name }}</td></tr>
                          <tr><td>ADDRESS</td><td>:</td><td><output id=alamat></output></td></tr>
                          <tr><td>PHONE</td><td>:</td><td>{{ Auth::user()->phone_number }}</td></tr>
                          <tr><td>EMAIL</td><td>:</td><td>{{ Auth::user()->email }}</td></tr>
                        </table>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>Date: <output id=tarikh></output></em>
                    </p>
                    <p>
                        <em>Time: <output id=masa></output></em>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="container" style="text-align: center">
                    <h1><strong>Receipt</strong></h1>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Flavour</th>
                            <th></th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-6"><em><output id=perisa></output></em></h4></td>
                            <td class="col-md-1" style="text-align: center"></td>
                            <td class="col-md-1 text-center"><output id=kuantiti></td>
                            <td class="col-md-1 text-center"><output id=kuantiti></td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td><h4><strong>Total:RM</strong></h4></td>
                            <td class="text-danger"><h4><strong><output id=harga></output></strong></h4></td>
                        </tr>
                    </tbody>
                </table> 
                </div>                      

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-md-12">
                              <form>
                @csrf
                <div class="icon-container" align="center">
                  <img src=/visa.png>
                  <img src=/mastercard.png>
                </div>
                <div class="form-group row">
                   <label for="name" class="col-md-4 col-form-label text-md-right"><b>{{ __('Card Number') }}</b></label>
                   <div class="col-md-6">
                      <input id="cardNumber" type="text" class="form-control" name="cardNumber" value="{{ old('cardNumber') }}" autocomplete="off" required style="background:#FAF6D9;" maxlength="19" placeholder="Eg: XXXX-XXXX-XXXX-XXXX">
                      @if ($errors->has('cardNumber')) 
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('cardNumber') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="expDate" class="col-md-4 col-form-label text-md-right"><b>{{ __('Expiration Date') }}</b></label>
                    <div class="col-md-6">
                      <table>
                        <tr>
                          <td>
                            <select style="background:#FAF6D9" required>
                              <option>01</option>
                              <option>02</option>
                              <option>03</option>
                              <option>04</option>
                              <option>05</option>
                              <option>06</option>
                              <option>07</option>
                              <option>08</option>
                              <option>09</option>
                              <option>10</option>
                              <option>11</option>
                              <option>12</option>
                            </select>
                          </td>
                          <td>/</td>
                          <td>
                            <select style="background:#FAF6D9" required>
                              <option>19</option>
                              <option>20</option>
                              <option>21</option>
                              <option>22</option>
                              <option>23</option>
                              <option>24</option>
                              <option>25</option>
                            </select>
                          </td>
                        </tr>
                      </table>
                      @if ($errors->has('expDate'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('expDate') }}</strong>
                         </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="cvv" class="col-md-4 col-form-label text-md-right"><b>{{ __('CV Code') }}</b></label>

                      <div class="col-md-6">
                        <input id="cvv" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="cvv" value="{{ old('address') }}" autocomplete="off" required style="background:#FAF6D9;" maxlength="3" placeholder="Eg: XXX">
                        @if ($errors->has('cvv'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('cvv') }}</strong>
                          </span>
                         @endif
                      </div>
                  </div>
              </form>
                                <div>
                                    <table class="table">
                                            <tr>
                                                <td><h4><strong>Total:</strong></h4></td>
                                                <td class="text-danger"> <h4><strong>RM <output id="harga"></output></strong></h4></td>
                                            </tr>
                                    </table>
                                </div>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </section>
                </section>


                                  </div>
                                  <!--Footer-->
                                  <div class="modal-footer">
                                    <button class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right: 5px;"><i class="fa fa-download"></i>Close</button>
                                    <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Proceed To Payment</button>
                                  </div>
                                </div>
                              </div>
                            </div>
<!-- Modal: modalCart -->
                            </div>
                        </div>

                   
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
@include("layouts.footer")
@endsection



