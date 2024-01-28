<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Itemgroup;
use App\Models\Items;
use Illuminate\Support\Facades\DB;
use Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    

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

    

######################################################################################

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
        'itemgroupno'=>$request->itemgroupno

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

######################################################################################

public function logout(Request $request){

    Auth::logout();
    return redirect('');
}

}

######################################################################################