<?php

namespace App\Http\Controllers;

use App\Models\banner;
use App\Models\disease;
use App\Models\disease_category;
use App\Models\disgallary;
use App\Models\disvideo;
use App\Models\product;
use App\Models\product_category;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public function discat($id){
        $header="Descat";
        $disease_categories=disease_category::find($id);
        return view('details.dcdetails',compact('disease_categories'),['header'=>$header]);
    }
    public function dis($id){
        $header="Dis";
        $disease=disease::find($id);
        return view('details.disdetails',compact('disease'),['header'=>$header]);
    }
    public function disvid($id){
        $header="Dis";
        $diseasevid=disvideo::find($id);
        return view('details.disvideodet',compact('diseasevid'),['header'=>$header]);
    }
    public function disgal($id){
        $header="Dis";
        $diseasegal=disgallary::find($id);
        return view('details.disgaldet',compact('diseasegal'),['header'=>$header]);
    }


    public function prodcat($id){
        $header="ProdCat";
        $prod_categories=product_category::find($id);
        return view('details.prodcatdet',compact('prod_categories'),['header'=>$header]);
    }
    public function prod($id){
        $header="Prod";
        $prod=product::find($id);
        return view('details.proddet',compact('prod'),['header'=>$header]);
    }



    public function banner(){
        $header="ban";
        $banners=banner::where('status', 'active')->get();
        return view('details.banner',compact('banners'),['header'=>$header]);
    }
    public function savebanner(Request $request){

        $image1 = $request->file('image');
        $new_name = "img/" . time() . '.' . $image1->getClientOriginalExtension();
        $image1->move(public_path('img'), $new_name);

        $bannersave =banner::create([
            'image'=>$new_name,
        ]);
        if ($bannersave) {
            $data['success']= 'success';
        }else {
            $data['error']= 'error';
        }
        echo json_encode($data);
    }
    public function deletebanner($id){
        $banner=banner::find(decrypt($id));
        $banner->update([
            'status' => 'deleted'
        ]);
        return redirect()->route('banner');
    }

}
