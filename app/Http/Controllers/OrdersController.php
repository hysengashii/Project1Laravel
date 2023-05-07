<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->hasRole('admin')) {  // e bojm nese nuk osht auth si admin mos ti sheh orderat perndryshe le ti sheh vetem orderat e veta
            $orders = Order::where('user_id', Auth::id())->get();
        } else {
            $orders = Order::all();
        }

        return view('dashboard.orders.index',compact('orders'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);

        return view('dashboard.orders.index', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->back()->with('success', 'Order deleted successfully.');
    }

    public function update(Request $request, Order $order)
{
    $status = $request->input('status');

    // Check if the authenticated user has the "admin" role
    if (auth()->user()->hasRole('admin')) {
        if ($status === 'approved' || $status === 'pending' || $status === 'refused') {
            $order->approval_status = $status;
            $order->save();
        }
    } else {
        // If the user is not an admin, return an error message
        return redirect()->back()->with('error', 'You do not have permission to approve orders.');
    }

    return redirect()->back();
}


}
