<?php

namespace App\Http\Controllers;

use App\Models\disease;
use App\Models\disease_category;
use App\Models\disgallary;
use App\Models\disvideo;
use App\Models\product;
use App\Models\productdis;
use Illuminate\Http\Request;

class DeseaseController extends Controller
{
    public function disease_category(){
        $header="Descat";
        $disease_categories=disease_category::get();
        return view('disease category.Category',compact('disease_categories'),['header'=>$header]);
    }

    public function add_disease_cat(){
        $header="Descat";
        return view('disease category.AddDesease',['header'=>$header]);
    }


    public function SaveDisCat(Request $request){

        $image1 = $request->file('image');
        $new_name = "img/" . time() . '.' . $image1->getClientOriginalExtension();
        $image1->move(public_path('img'), $new_name);


        $discatsave=disease_category::create([
            'title_eng'=>$request->titleeng,
            'title_mal'=>$request->titlemal,
            'title_eng_mal'=>$request->title_engmal,
            'description_eng'=>$request->des_eng,
            'description_mal'=>$request->des_mal,
            'image'=>$new_name,
            'featured'=>$request->featured,
            'dis_order'=>$request->order
        ]);

        if ($discatsave) {
            $data['success']= 'success';
        }else {
            $data['error']= 'error';
        }
        echo json_encode($data);
    }

    public function EditDisCat($id){
        $header="Descat";
        $diseasecat=disease_category::find($id);
        return view('disease category.EditDisCat',compact('diseasecat'),['header'=>$header]);
    }

    public function updateDisCat(Request $request){

        $dis=disease_category::where('id',$request->did)->first();
        $image1 = $request->file('Dimg');

        if($image1=='')
        {
            $new_name1=$dis->image;
        }
        else{
            $image1 = $request->file('Dimg');
            $new_name1 = "img/" . time() . '.' . $image1->getClientOriginalExtension();
            $image1->move(public_path('img'), $new_name1);
        }


        $discatupdate=disease_category::find($request->did)->update([
            'title_eng'=>$request->titleenglish,
            'title_mal'=>$request->TitleMal,
            'title_eng_mal'=>$request->TitleEngMal,
            'description_eng'=>$request->DesEng,
            'description_mal'=>$request->DesMal,
            'image'=>$new_name1,
            'featured'=>$request->Featrd,
            'dis_order'=>$request->DisOrder,
            'status'=>$request->dcstatus,
        ]);
        if ($discatupdate) {
            $data['success']= 'success';
        }else {
            $data['error']= 'error';
        }
        echo json_encode($data);
    }




    //////////////  disease   ///////////////

    public function disease(){
        $header="Dis";
        $diseases=disease::get();
        return view('disease.diseaselist',compact('diseases'),['header'=>$header]);
    }

    public function add_disease(){
        $header="Dis";
        $diseasecategories= disease_category::where('status','active')->get();
        return view('disease.AddDis',compact('diseasecategories'),['header'=>$header]);
    }

    public function SaveDis(Request $request){

        $image1 = $request->file('image');
        $new_name = "img/" . time() . '.' . $image1->getClientOriginalExtension();
        $image1->move(public_path('img'), $new_name);


        $diseasesave=disease::create([
            'disease_category'=>$request->discatdis,
            'title_english'=>$request->englishtitle,
            'title_malayalam'=>$request->malaylmtitle,
            'title_english_malayalam'=>$request->title_engmal,
            'common_procedure_eng'=>$request->cpeng,
            'common_procedure_mal'=>$request->cpmal,
            'image'=>$new_name,
        ]);

        if ($diseasesave) {
            $data['success']= 'success';
        }else {
            $data['error']= 'error';
        }
        echo json_encode($data);
    }

    public function EditDis($id){
        $header="Dis";
        $dis_categories=disease_category::all();
        $dis=disease::find($id);
        return view('disease.editdis',compact('dis','dis_categories'),['header'=>$header]);
    }

    public function updateDis(Request $request){
        $dis=disease::where('id',$request->id)->first();
        $image1 = $request->file('edimg');

        if($image1=='')
        {
            $new_name2=$dis->image;
        }
        else{
            $image1 = $request->file('edimg');
            $new_name2 = "img/" . time() . '.' . $image1->getClientOriginalExtension();
            $image1->move(public_path('img'), $new_name2);
        }

        $disupdate=disease::find($request->id)->update([
            'disease_category'=>$request->editdiscat,
            'title_english'=>$request->edenglishtitle,
            'title_malayalam'=>$request->edmalaylmtitle,
            'title_english_malayalam'=>$request->edenglish_maltitle,
            'common_procedure_eng'=>$request->edcpeng,
            'common_procedure_mal'=>$request->edcpmal,
            'image'=>$new_name2,
            'status'=>$request->distatus,
        ]);
        if ($disupdate) {
            $data['success']= 'success';
        }else {
            $data['error']= 'error';
        }
        echo json_encode($data);
    }




    ////////////// disaese video ///////////////

    public function DisVideo($id){
        $header="Dis";
        $disvideos=disvideo::where('dis_id',$id)->get();
        return view('disease.disvideo',compact('disvideos'),['header'=>$header,'id'=>$id]);
    }
    public function AddDiseaseVid($id){
        $header="Dis";
        return view('disease.adddisvid',['header'=>$header,'id'=>$id]);
    }
    public function SaveDisVid(Request $request){
        $disvidsave=disvideo::create([
            'dis_id'=>$request->dis_id,
            'title_eng'=>$request->adengtitle,
            'title_mal'=>$request->admaltitle,
            'description_eng'=>$request->addeseng,
            'description_mal'=>$request->addesmal,
            'url_eng'=>$request->adurleng,
            'url_mal'=>$request->adurlmal,
        ]);

        if ($disvidsave) {
            $data['success']= 'success';
        }else {
            $data['error']= 'error';
        }
        echo json_encode($data);
    }
    public function EditDisVid($id){
        $header="Dis";
        $disvid=disvideo::find($id);
        return view('disease.editdisvid',compact('disvid'),['header'=>$header]);
    }
    public function updateDisVid(Request $request){
        $disvidupdate=disvideo::find($request->edvid)->update([
            'title_eng'=>$request->edengtitle,
            'title_mal'=>$request->edmaltitle,
            'description_eng'=>$request->eddeseng,
            'description_mal'=>$request->eddesmal,
            'url_eng'=>$request->edurleng,
            'url_mal'=>$request->edurlmal,
            'status'=>$request->dvstatus
        ]);

        if ($disvidupdate) {
            $data['success']= 'success';
        }else {
            $data['error']= 'error';
        }
        echo json_encode($data);
    }




    /////////////// disease gallary //////////////
    public function DisGallery($id){
        $header="Dis";
        $disgalleries=disgallary::where('dis_id',$id)->get();
        return view('disease.disgallery',compact('disgalleries'),['header'=>$header,'id'=>$id]);
    }
    public function AddDisGal($id){
        $header="Dis";
        return view('disease.adddisgal',['header'=>$header,'id'=>$id]);
    }
    public function SaveDisGal(Request $request){

        $image1 = $request->file('file1');
        $new_name = "img/" . time() . '.' . $image1->getClientOriginalExtension();
        $image1->move(public_path('img'), $new_name);

        $disgalsave=disgallary::create([
            'dis_id'=>$request->dis_id,
            'title_eng'=>$request->adenggal,
            'title_mal'=>$request->admalgal,
            'description_eng'=>$request->addesenggal,
            'description_mal'=>$request->addesmalgal,
            'file'=>$new_name,
        ]);

        if ($disgalsave) {
            $data['success']= 'success';
        }else {
            $data['error']= 'error';
        }
        echo json_encode($data);
    }
    public function EditDisGal($id){
        $header="Dis";
        $disgallery = disgallary::find($id);
        return view('disease.editdisgal',compact('disgallery'),['header'=>$header]);
    }
    public function updateDisGal(Request $request){
        $disfile=disgallary::where('id',$request->edgal)->first();
        $image1 = $request->file('edfile');

        if($image1=='')
        {
            $new_name3=$disfile->file;
        }
        else{
            $image1 = $request->file('edfile');
            $new_name3 = "img/" . time() . '.' . $image1->getClientOriginalExtension();
            $image1->move(public_path('img'), $new_name3);
        }

        $disgalup=$disfile->update([
            'title_eng'=>$request->edenggal,
            'title_mal'=>$request->edmalgal,
            'description_eng'=>$request->eddesenggal,
            'description_mal'=>$request->eddesmalgal,
            'file'=>$new_name3,
            'status'=>$request->dgstatus,
        ]);

        if ($disgalup) {
            $data['success']= 'success';
        }else {
            $data['error']= 'error';
        }
        echo json_encode($data);
    }

    public function productsdesease(Request $request,$id)
    {
        $header="Dis";
        $diseaseproducts=productdis::where('dis_id',$id)->where('status','active')->get();
        $products=product::where('status','active')->get();

        return view('disease.deseaseproduct',compact('id','diseaseproducts','products'),['header'=>$header]);

    }

    public function adddisprod(Request $request)
    {
                if (productdis::where('dis_id', $request->dis_id)->where('prod_id',$request->prod_id)->where('status','active')->exists()) {
                    $data['error'] = 'error';
                } else {
                   productdis::create([
                    'dis_id'=>$request->dis_id,
                    'prod_id'=>$request->prod_id
                ]);
                    $data['success'] = 'success';
                }

                return response()->json($data);

    }
        public function deleteProd($id,$did){
        $delprod=productdis::find($id);
        $delprod->update([
            'status' => 'inactive'
        ]);

        return redirect()->route('productsdesease',$did);

    }
}
