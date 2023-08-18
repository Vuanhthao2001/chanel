<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chanel;
use Illuminate\Support\Facades\DB;

class ChanelController extends Controller
{
    //GET: companies (SELECT)
    public function index(){
//        
        $chanels = Chanel::orderBy('id','desc')->paginate(5);
        return view("index", compact("chanels"));
    }

    
    public function create(){
        return view("create");
    }

    //POST: companies
    public function store(Request $request){
        //Tạo ra đối tượng Company
        //Thiết lập các giá trị từ $request

        Chanel::create($request->post());
        return redirect()->route('chanels.index')->with('success','Chanel has been created successfully.');

    }
    //GET; companies/{company}
    public function show(string $id){
        //ORM
        //$company = Company::find($id);
        //Query Builder $company = DB::table("companies")->where('id',15)->first();
        //Raw SQL
        $chanel = DB::selectOne("SELECT * FROM chanels WHERE id = ?", [15]);
        return response()->json($company);
    }

    //EDIT (UPDATE): (1) Hiển thị FORM (GET) / (2) Lưu dữ liệu từ FORM vào CSDL
    //GET: companies/{company}/edit
    public function edit(string $id){
        $chanel = Chanel::find($id);
        return view("edit", compact('company'));
    }

    //PUT: companies/{company}
    public function update(Request $request, string $id){
        $chanel = Chanel::find($id);
        $chanel->fill($request->post())->save();

        return redirect()->route('chanels.index')->with('success','Chanel Has Been updated successfully');
    }

    //DELETE: companies/{company}
    public function destroy(string $id){
        $chanel = Chanel::find($id);
        $chanel->delete();
        return redirect()->route('chanels.index')->with('success','Chanel has been deleted successfully: '.$id);
    }
}
