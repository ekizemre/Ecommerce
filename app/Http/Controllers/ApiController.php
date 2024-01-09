<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use Validator;

class ApiController extends Controller
{
    public function index(){
        $product = Product::all();
        $data=[
            'status'=>200,
            'product'=>$product

        ];

        return response()->json($data,200);
    }

    public function upload(Request $request){
        $validator = Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'required|max:255'

        ]);
        if($validator->fails())
        {

            $data=[
                'status'=>422,
                'message'=>$validator->messages()

            ];
            return response()->json($data,422);
        }
        else
        {
            $product = new Product;
            $product->title=$request->title;
            $product->price=$request->price;
            $product->description=$request->description;
            $product->quantity=$request->quantity;
            $product->save();

            $data=[
                'status'=>200,
                'message'=>'Data Uploaded'
            ];

            return response()->json($data,200);
        }
    }
    public function getedit(Request $request,$id){
            $product = Product::find($id);
            return response()->json($product,200);
    }
    public function edit(Request $request,$id)
    {
        $validator = Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'required|max:255',
            'price'=>'required'

        ]);
        if($validator->fails())
        {

            $data=[
                'status'=>422,
                'message'=>$validator->messages()

            ];
            return response()->json($data,422);
        }
        else
        {
            $product = Product::find($id);
            $product->title=$request->title;
            $product->price=$request->price;
            $product->description=$request->description;
            $product->quantity=$request->quantity;
            $product->save();

            $data=[
                'status'=>200,
                'message'=>'Data updated'
            ];

            return response()->json($data,200);
        }
    }
    public function delete($id){
        $product=Product::find($id);
        $product->delete();
        $data=[
            "status"=>200,
            "message"=>"product deleted"

        ];
        return response()->json($data,200);

    }
}
