@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>


</script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   @php
                   $runs=array('1','4','6','0','9');
                   $run= array_random($runs);   
                   @endphp
                   <form id="myForm" action="/runs" method="POST">
                       @csrf
                   <input type="text" id="fun" name="run" value={{$run}} size= "2" style="border:0" />
                </form>
                   <button  id="nuf" value="0" onclick="myFunction(0)">0</button>
                   <button  id="nuf" value="1" onclick="myFunction(1)">1,2,3</button>
                   <button  id="nuf" value="4" onclick="myFunction(4)">4</button>
                   <button  id="nuf" value="6" onclick="myFunction(6)">6</button>
                   <button  id="nuf" value="0" onclick="myFunction(9)">Out</button>
                   
                <div align ="right">your current score {{$score[0]->score}}</div>
                   <script>
                       function myFunction(p){
                        
                        var s=document.getElementById("fun").value; 
                        if (s == p) {
                            Swal.fire({
                                        type: 'success',
                                        title: 'you won',
                                        })
                                document.getElementById("myForm").submit();
                                }                                
                        else{
                            Swal.fire({
                                        type: 'error',
                                        title: 'you loss',
                                        })
                         }                                
                          
                        
                       }

                   </script>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-striped">
            <thead>
              <tr>
                <th>Id</th>  
                <th>Name</th>
                <th>Coupon</th>
                <th>Points</th>
              </tr>
            </thead>
            <tbody> @php $i=1 @endphp
                    @foreach ($coupons as $coupon)         
                <tr>
                <td>{{$i}}</td>      
                <td>{{$coupon->couponname}}</td>
                @if ($coupon->pricepoint<$score[0]->score)
                <td>{{$coupon->couponcode}}</td> 
                @else
                <td>you need {{$coupon->pricepoint-$score[0]->score}} points more.</td>
                @endif
                
                <td>{{$coupon->pricepoint}}</td>
              </tr>
                    @php $i++ @endphp    
                    @endforeach
              
            </tbody>
          </table>
</div>
@endsection
