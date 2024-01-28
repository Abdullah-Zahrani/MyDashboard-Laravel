<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Itemgroup;
use App\Models\Items;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\HTTP;
use Illuminate\Support\Facades\Session;

class ItemsController extends Controller
{



    public function displayadditemsgroup(){
        
        $data=Itemgroup::All();
        return view('dashboard.addgroupsitem', ['data'=>$data]);

    }


    public function DisplayItems(){
        
        $data=DB::table('itemgroups')
        ->join('items','itemgroups.id', '=', 'items.itemgroupno')
        ->get();

        return view('dashboard.controlpanel', ['data'=>$data]);



    }


    public function SaveGroupsItems(Request $request){
        

        $data=Itemgroup::create([
            'itemgroupname'=>$request->itemgroupname
        ]);
        $data->save();
        
        return redirect('addgritem');
    }



    public function GetItemGroup(){

        $data=Itemgroup::All();
        $issave=true;
        return view('itemgroup', ['data'=>$data, 'issave'=>$issave]);
    }

    public function del($x){
        
    $item=Itemgroup::find($x);
    $item->delete();
    return redirect()->route('itemgroup');

    }

    public function edit($x){
        
    $find=Itemgroup::where('id',$x)->first();
    return view('editgroupitem', ['item'=>$find]);

    }
    public function update(Request $request){
        
        $item=Itemgroup::find($request->id);
        $item->itemgroupname=$request->namegroup;

        $item->save();

        return redirect('itemgroup');

    }

    

###########################################################################################################

public function GetItems(){

    $data=Items::All();
    $issave=true;
    return view('items', ['data'=>$data, 'issave'=>$issave]);
}

public function SaveItems(Request $request){    

    $data=Items::create([
        'itemname'=>$request->itemname,
        'price'=>$request->price,
        'qty'=>$request->qty,
        'color'=>$request->color,
        'itemgroupno'=>$request->itemgroupno,
        'image'=>$request->image

    ]);
    $data->save();
    return redirect('items');
}

public function deleteItem($x){

    $item=Items ::find($x);
    $item->delete();
    return redirect()->route('items');
}

public function editItem($x){

    $find=Items::where('id',$x)->first();
    return view('edititems', ['item'=>$find]);
}

public function updateItem(Request $request){
        
    $item=Items::find($request->id);
    $item->itemname=$request->itemname;
    $item->price=$request->price;
    $item->qty=$request->qty;
    $item->color=$request->color;
    $item->itemgroupno=$request->itemgroupno;

    $item->save();

    return redirect('items');

}

public function ShowItemGroup(){

    
    $data=Itemgroup::All();
    $count=$data->count();
    
        return view('welcome', ['data'=>$data, 'count'=>$count]);
}

public function showproduct($id){

$data=Items::where('itemgroupno',$id)->get();
Session::put('id', $id);
return view('showproduct', ['data'=>$data]);
}

###########################################################################################################

public function AddtoCart($id){


    DB::table('cart')->insert(['iditem'=>$id]);     //Save to cart table
    
    $itemGroupNum=Session::get('id');
    $count=DB::table('cart')->get()->count();
    Session::put('countitem',$count);

    return redirect('showproduct/'. $itemGroupNum);          //redirect to showproduct page blade

}
public function showCart($id){

    $data=Items::where('id',$id)->get();
    Session::put('id', $id);
    return view('checkout', ['data'=>$data]);

}

public function CheckoutCart(){

    return view('checkout');
}


###########################################################################################################

public function TestAPI(){
    
// $response = HTTP::get('https://api.sampleapis.com/coffee/hot');
// $data=$response->object();
// $apiurl="https://jsonplaceholder.typicode.com/users/4/posts";


$apiURL = 'https://v1.baseball.api-sports.io/leagues';
      $headers = [
        'Content-Type' => 'application/json',
        'X-RapidAPI-Key' => '24c939c2ba293c859d5ecd476932d293'
    ];
    $response = Http::withheaders($headers)->get($apiURL);
    $data = $response->json();

    $response=Http::withheaders($headers)->get($apiURL);
    $data=$response->json();
    return view('coffe', ['data'=>$data]);
}



public function Checkout(){

    $apiURL = 'https://v1.baseball.api-sports.io/status';
      $headers = [
        'Content-Type' => 'application/json',
        'X-RapidAPI-Key' => '24c939c2ba293c859d5ecd476932d293'
    ];
    $response = Http::withHeaders($headers)->get($apiURL);
    $data = $response->json();

    dd($data);
}

}
