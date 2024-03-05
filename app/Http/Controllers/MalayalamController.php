<?php

namespace App\Http\Controllers;

use App\Models\banner;
use App\Models\disease;
use App\Models\disease_category;
use App\Models\disgallary;
use App\Models\disvideo;
use App\Models\product;
use App\Models\product_category;
use App\Models\productdis;
use App\Models\unit;
use Illuminate\Http\Request;

class MalayalamController extends Controller
{
    public function index()
    {
        $banners = banner::where('status', 'active')->get();
        $diseasecat = disease_category::where('status', 'active')->orderBy('dis_order','asc')->get();
        $featdiseasecat = disease_category::where('status', 'active')->where('featured',1)->orderBy('dis_order','asc')->get();


        $trendproducts = product_category::where('trending', '1')->where('status', 'active')->orderBy('dis_order','asc')->latest()->paginate(8);
        $featuredproducts = product_category::where('featured', '1')->where('status', 'active')->orderBy('dis_order','asc')->latest()->paginate(8);

        return view('malayalam.index', compact('banners', 'diseasecat', 'trendproducts', 'featuredproducts','featdiseasecat'));
    }

    public function disease()
    {
        $diseases = disease::where('status', 'active')->get();
        return view('malayalam.disease', compact('diseases',));
    }

    public function disSingle($id)
    {
        $dis = disease::find($id);
        $productdis = productdis::where('dis_id', $id)->where('status', 'active')->get();
        $disgallary=disgallary::where('dis_id',$id)->where('status','active')->get();
        $disvideo=disvideo::where('dis_id',$id)->where('status','active')->get();
        return view('malayalam.diseasesingle', compact('dis', 'productdis','disgallary','disvideo'));
    }

    public function diseasecat($id)
    {
        $discat = disease_category::find($id);
        $diseases = disease::where('disease_category', $id)->where('status', 'active')->get();
        return view('malayalam.discatsingle', compact('discat', 'diseases'));
    }

    public function product()
    {
        $products = product::where('status', 'active')->get();
        return view('malayalam.products', compact('products'));
    }
    public function prodSingle($id)
    {
        $prod = product::find($id);
        $productdis = productdis::where('prod_id', $id)->where('status', 'active')->get();

        $defaultunit = unit::where('prod_id', $id)->where('default', '1')->first();     //////     default unitt    ////////

        $relatedprod = product::where('product_category', $prod->product_category)->where('id', '!=', $id)
            ->where('status', 'active')->get();

        $units = unit::where('prod_id', $id)->where('status', 'active')->get();


        return view('malayalam.productsingle', compact('prod', 'productdis', 'relatedprod', 'units', 'defaultunit'));
    }

    public function prodCatSingle($id)
    {
        $pcsingle = product_category::find($id);
        $pc_products = product::where('product_category', $id)->get();
        return view('malayalam.prodcatsingle', compact('pcsingle', 'pc_products'));
    }

    public function trndproduct()
    {
        $trendingprods = product_category::where('trending', '1')->where('status', 'active')->get();
        return view('malayalam.trndproduct', compact('trendingprods'));
    }
    public function featrdproduct()
    {
        $featrdprods = product_category::where('featured', '1')->where('status', 'active')->get();
        return view('malayalam.featrdproduct', compact('featrdprods'));
    }

    public function about(){
        return view('malayalam.about');
    }

    public function contact(){
        return view('malayalam.contact');
    }
}
