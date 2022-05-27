<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index(){
        return view('frontend.index',[
            'featured_product' => Product::where('trending','1')->take(15)->get(),
            'trending_category' => Category::where('popular','1')->take(15)->get()
        ]);
    }

    public function category(){

      
        return view('frontend.category',[
            'category' => Category::where('status','1')->get()
        ]);
    }

    public function view_category($slug){
        if(Category::where('slug', $slug)->exists())
        {
           $category = Category::where('slug', $slug)->first();
           $product = Product::where('category_id', $category->id)->where('status','1')->get();
            return view('frontend.product.index', compact('category','product'));
        }else{
            return redirect('/')->with('status','slug does not exists');
        }   
    }

    public function view_product($cate_slug, $prod_slug){
       if(Category::where('slug', $cate_slug)->exists())
       {
           if(Product::where('slug', $prod_slug)->exists())
           {
               $product = Product::where('slug', $prod_slug)->first();
               $rating = Rating::where('prod_id', $product->id)->get();
               $rating_sum = Rating::where('prod_id', $product->id)->sum('star_rated');
               $review = Review::where('prod_id', $product->id)->get();
               $user_rating = Rating::where('prod_id', $product->id)->where('user_id', Auth::id())->first();
               if($rating->count() > 0)
               {
                   $rating_value = $rating_sum/$rating->count();
               } else {
                   $rating_value = 0;
               }
               return view('frontend.product.view', compact('product', 'review', 'rating','rating_value','user_rating'));
           } else {
               return redirect('/')->with('status', 'the link was broken');
           }
       }else {
           return redirect('/')->with('status','no such category found');
       }
    }

    public function productlist() {
        $product = Product::select('name')->where('status','0')->get();
        $data = [];

        foreach ($product as $item) {
            $data[] = $item['name'];
        }
        return $data;
        
    }

    public function searchproduct(Request $request) {
        $search_product = $request->product_name;

        if($search_product != "")
        {
            $product = Product::where("name", "LIKE", "%$search_product%")->first();
            if($product)
            {
                return redirect('category/'.$product->category->slug.'/'.$product->slug);
            } else
            {
                return redirect()->back()->with('status', "No Product matched your search");
            }
        } else {
            return redirect()->back();
        }
    }
}
