<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderModel;
use App\Models\AddToCartModel;
use App\Models\OrderProductsModel;

class OrderController extends Controller
{
    public function saveOrder(Request $request){
        if($request->session()->has("onlineClient")){
            $onlineClientData = $request->session()->get("onlineClient");
            $newOrder = new OrderModel;
            $newOrder->userId = $onlineClientData->id;
            $newOrder->totalPrice = $request->grandPrice;
            $newOrder->save();
            $productData = AddToCartModel::where('userId',$onlineClientData->id)->get();
            foreach ($productData as $product) {
                $newOrderProducts = new OrderProductsModel;
                $newOrderProducts->productId = $product->productId;
                $newOrderProducts->quantity = $product->quantity;
                $newOrderProducts->orderId = $newOrder->id;
                $newOrderProducts->save();
            }
            foreach ($productData as $product) {
                $product->delete();
            }
            return redirect('/')->with("success","Your Order Save Successfully.");
        }else{
            return redirect('/login')->with("danger","Please! Login first to Order.");
        }
    }
    public function Order(Request $request){
        if($request->session()->has("onlineClient")){
            $clientInfo =  $request->session()->get("onlineClient");
            $totalData = OrderModel::where('userId',$clientInfo->id)->get();
            return view('web.order.index',compact("totalData"));
        }else{
            return redirect('/');
        }
    }
    public function OrderPreview(Request $request,$id){
        $data = OrderModel::find($id);
        $totalData = OrderProductsModel::where('orderId',$data->id)->get();
        return view('web.order.detailOrder',compact("totalData"));
    }

    // Admin Panel
    public function View(Request $request){
        $totalData = OrderModel::all();
        return view('admin.order.index',compact("totalData"));
    }
    public function OrderCompleted(Request $request,$id){
        $data = OrderModel::find($id);
        $data->status = 1;
        $data->save();
        return back()->with('success','This order has been completed.');
    }
    public function OrderDetail(Request $request,$id){
        $data = OrderModel::find($id);
        $totalData = OrderProductsModel::where('orderId',$data->id)->get();
        return view('admin.order.detailOrder',compact("totalData"));
    }
}
