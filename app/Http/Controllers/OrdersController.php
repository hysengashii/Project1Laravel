<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        if (!Auth::user()->hasRole('admin')) {
            $orders = Order::with('products')
                    ->where('user_id', Auth::id())
                    ->get();
        } else {
            $orders = Order::with('products')->get();
        }

        return view('dashboard.orders.index', compact('orders'));
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
        $orders = Order::with('products')->where('user_id', $id)->get();
        return view('dashboard.orders.show', compact('orders'));

//Ky kod merr të gjitha porositë bashkë me produktet e tyre të lidhura për një identifikues të përdoruesit $id. Këtu është një shpjegim i hollësishëm se çfarë ndodh:

//Order::with('products'): Ky kod merr të gjitha porositë bashkë me produktet e tyre të lidhura. Metoda with përdoret për të ngarkuar paraprakisht lidhjen products për të shmangur problemet e pyetjeve N+1.

//where('user_id', $id): Kjo shton një kusht në kërkesë për të marrë vetëm porositë ku kolona user_id përputhet me $id.

//get(): Ky kod ekzekuton kërkesën dhe merr rezultatet si një koleksion.
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //
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


    // public function userOrders(Request $request)
    // {
    //     $userID = Auth::id();
    //     $userId = $request->input('id');

    //     $user = User::find($id);

    //     if (!$user) {
    //         return abort(404);
    //     }

    //     $orders = Order::where('user_id', $userId)->get();

    //     return view('user.orders', compact('user', 'orders'));
    // }



}
