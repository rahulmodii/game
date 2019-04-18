<?php

namespace App\Http\Controllers;

use App\Prize;
use Illuminate\Http\Request;

class PrizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $coupons=Prize::all();


        return view('prize')->with('coupons',$coupons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon =new Prize;
        $coupon->couponname = $request->couponname;
        $coupon->couponcode = $request->couponcode;
        $coupon->pricepoint = $request->pricepoint;
        $coupon->save();
        return redirect()->back();
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prize  $prize
     * @return \Illuminate\Http\Response
     */
    public function show(Prize $prize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prize  $prize
     * @return \Illuminate\Http\Response
     */
    public function edit(Prize $prize)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prize  $prize
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prize $prize)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prize  $prize
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prize $prize)
    {
        //
    }
}
