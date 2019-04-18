@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/prize" method="POST">
        @csrf
        <input type="text" placeholder="couponname" name="couponname" />
        <input type="text" placeholder="couponcode" name="couponcode"/>
        <input type="text" placeholder="pricepoint" name="pricepoint"/>
        <input type="submit" />
    </form>    
</div>

<table class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>  
            <th>Name</th>
            <th>Coupon</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody> @php $i=1 @endphp
                @foreach ($coupons as $coupon)         
            <tr>
            <td>{{$i}}</td>      
            <td>{{$coupon->couponname}}</td>
            <td>{{$coupon->couponcode}}</td>
            <td>{{$coupon->pricepoint}}</td>
          </tr>
                @php $i++ @endphp    
                @endforeach
          
        </tbody>
      </table>

@endsection