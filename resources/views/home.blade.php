@extends('layouts.app')

@section('content')
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
                   $runs=array('1','2','3','4','6');
                   $run= array_rand($runs);    
                   @endphp
                   <form id="myForm" action="/runs" method="POST">
                       @csrf
                   <input type="text" name="run" value={{$run}} size= "2" style="border:0" />
                   <button name="submit" onclick="myFunction()">Click me</button>
                   </form>
                <div align ="right">your current score {{$score[0]->score}}</div>
                   <script>
                       function myFunction(){
                        document.getElementById("myForm").submit();
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
