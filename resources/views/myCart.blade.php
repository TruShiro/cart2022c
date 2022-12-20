@extends('layout')
@section('content')
<script>
    function cal(){
        var names=document.getElementsByName('subtotal[]');
        var subtotal=0;
        var cboxes=document.getElementsByName('cid[]');
        var len=cboxes.length; //get number  of cid[] checkbox inside the page
        for(var i=0;i<len;i++){
            if(cboxes[i].checked){  //calculate if checked
                subtotal=parseFloat(names[i].value)+parseFloat(subtotal);
            }
        }
        document.getElementById('sub').value=subtotal.toFixed(2); //convert 2 decimal place      
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-6">
        <br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>&nbsp;</td>
                    <td>Name</td>                    
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Subtotal</td> 
                </tr>
            </thead> 
            <tbody>
                @foreach($Products as $Product)
                <tr>
                    <td>
                    <input type="checkbox" name="cid[]" id="cid[]" value="{{$Product->cid}}" onclick="cal()">
                    <input type="hidden" name="subtotal[]" id="subtotal[]" value="{{$Product->price*$Product->cartQty}}">

                        <img src="{{asset('images/')}}/{{ $Product->image }}" alt="" width="100" class="img-fluid"></td>
                    <td>{{ $Product->name }}</td>
                    <td>{{ $Product->price }}</td>
                    <td>{{ $Product->cartQty }}</td> 
                    <td>{{ $Product->price*$Product->cartQty }}</td> 
                </tr>
                @endforeach

                <tr align="right">
                    <td colspan="3">&nbsp;</td>
                    <td>RM<i> </i> <input type="text" value="0" name="sub" id="sub" size="7" readonly /></td>
                    <td>&nbsp;</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-sm-3"></div>
</div>
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-10"> {{$Products->links('pagination::bootstrap-4')}}</div>
</div>

<div class="row">  
<div class="col-sm-2"></div>        
            <div class="col-md-6 col-md-offset-3">
               <div class="panel panel-default credit-card-box">
                  <div class="panel-heading" >
                     <div class="row">
                        <h3>Card Payment</h3>                        
                     </div>
                  </div>
                  <div class="panel-body">                    
                     <br>                     
                        <div class='form-row row'>
                           <div class='col-xs-12 col-md-6 form-group required'>
                              <label class='control-label'>Name on Card</label> 
                              <input class='form-control' size='4' type='text'>
                           </div>
                           <div class='col-xs-12 col-md-6 form-group required'>
                              <label class='control-label'>Card Number</label> 
                              <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                           </div>                           
                        </div>                        
                        <div class='form-row row'>
                           <div class='col-xs-12 col-md-4 form-group cvc required'>
                              <label class='control-label'>CVC</label> 
                              <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                           </div>
                           <div class='col-xs-12 col-md-4 form-group expiration required'>
                              <label class='control-label'>Expiration Month</label> 
                              <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                           </div>
                           <div class='col-xs-12 col-md-4 form-group expiration required'>
                              <label class='control-label'>Expiration Year</label> 
                              <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                           </div>
                        </div>
                      {{-- <div class='form-row row'>
                         <div class='col-md-12 error form-group hide'>
                            <div class='alert-danger alert'>Please correct the errors and try
                               again.
                            </div>
                         </div>
                      </div> --}}
                        <div class="form-row row">
                           <div class="col-xs-12">
                              <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                           </div>
                        </div>                     
                  </div>
               </div>
            </div>
            
			
			
			
			
        </div>            

@endsection