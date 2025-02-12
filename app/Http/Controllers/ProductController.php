<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Gallery;
use App\Models\CategoryProduct;
use App\Models\Brand;
use App\Models\Tag;
use App\Models\ProductTag;
use App\Models\Comment;
use App\Models\Admin;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Components\Recursive;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    use StorageImageTrait;

    public function getCategory($category_parent)
    {
        $categories = CategoryProduct::where('category_status', 1)->get();
        $category_recursive = new Recursive($categories);

        $htmlOption = $category_recursive->categoryRecursive($category_parent);

        return $htmlOption;
    }

    /**
     * Add products
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $htmlOption = $this->getCategory(null);
        $brands = Brand::orderBy('brand_id', 'desc')->get();

        return view('admin.product.create_product', compact('htmlOption', 'brands'));
    }

    /**
     * Save products
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductRequest $request)
    {
        try {
            DB::beginTransaction();

            $dataProductCreate = [
                'product_name' => $request->product_name,
                'product_slug' => Str::slug($request->product_name, '-'),
                'product_price' => $request->product_price,
                'product_cost' => $request->product_cost,
                'product_quantity' => $request->product_quantity,
                'product_sold' => 0,
                'product_desc' => $request->product_desc,
                'product_content' => $request->product_content,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'product_status' => $request->product_status,
            ];

            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'product_image', 'product');

            if (!empty($dataUploadFeatureImage)) {
                $dataProductCreate['product_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductCreate['product_image_path'] = $dataUploadFeatureImage['file_path'];
            }

            $product = Product::create($dataProductCreate);

            // Insert tags for products
            $tagIds = [];
            if (!empty($request->product_tags)) {
                foreach ($request->product_tags as $tagItem) {
                    // Insert to tags
                    $tagInstance = Tag::firstOrCreate(['tag_name' => $tagItem]);
                    $tagIds[] = $tagInstance->tag_id;
                }
            }
            $product->tags()->attach($tagIds);

            DB::commit();

            session()->flash('notification', 'Thêm sản phẩm thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
    }

    /**
     * Show all products
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();

        return view('admin.product.all_product', compact('products'));
    }

    /**
     * Active products
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
        $product = Product::find($id)->update(['product_status' => 0]);

        session()->flash('notification', 'Ẩn sản phẩm thành công');
        return redirect()->back();
    }

    /**
     * Inactive products
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function inactive($id)
    {
        $product = Product::find($id)->update(['product_status' => 1]);

        session()->flash('notification', 'Hiện sản phẩm thành công');
        return redirect()->back();
    }

    /**
     * Edit products
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $htmlOption = $this->getCategory($product->category_id);
        $brands = Brand::orderBy('brand_id', 'desc')->get();

        return view('admin.product.edit_product', compact('product', 'htmlOption', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $product = Product::find($id);

            $dataProductUpdate = [
                'product_name' => $request->product_name,
                'product_slug' => Str::slug($request->product_name, '-'),
                'product_price' => $request->product_price,
                'product_cost' => $request->product_cost,
                'product_quantity' => $request->product_quantity,
                'product_desc' => $request->product_desc,
                'product_content' => $request->product_content,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
            ];

            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'product_image', 'product');

            if (!empty($dataUploadFeatureImage)) {
                File::delete(public_path($product->product_image_path));
                $dataProductUpdate['product_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductUpdate['product_image_path'] = $dataUploadFeatureImage['file_path'];
            }

            $product->update($dataProductUpdate);
            $product = Product::find($id);

            // Insert tags for products
            $tagIds = [];
            if (!empty($request->product_tags)) {
                foreach ($request->product_tags as $tagItem) {
                    // Insert to tags
                    $tagInstance = Tag::firstOrCreate(['tag_name' => $tagItem]);
                    $tagIds[] = $tagInstance->tag_id;
                }
            }
            $product->tags()->sync($tagIds);

            DB::commit();

            session()->flash('notification_update-success', 'Cập nhật sản phẩm thành công');
            return redirect()->route('product.all');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        try {
            $product = Product::find($id);

            File::delete(public_path($product->product_image_path));
            $product->delete();

            session()->flash('notification', 'Xóa sản phẩm thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage . '---Line: ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail',
            ], 500);
        }
    }

    /**
     * Home function page
     * @param  \Illuminate\Http\Request  $request
     */
    public function show_details_product($product_slug, Request $request)
    {
        $product = Product::where('product_slug', $product_slug)->first();
        $product->update([
            'product_views' => $product->product_views + 1,
        ]);
        $related_products = Product::where('category_id', $product->category->category_id)->whereNotIn('product_id', [$product->product_id])->orderBy('category_id', 'desc')->get();
        $all_products = Product::where('product_status', 1)->get();
        $galleries = Gallery::where('product_id', $product->product_id)->get();
        $totalReview = $product->comments->where('comment_parent_comment', 0)->count();
        $ratingAvg = $product->comments->avg('rating');

        //seo 
        $meta_desc = $product->product_desc;
        $meta_keywords = $product->product_name;
        $url_canonical = $request->url();
        $meta_title = "WhyTech | " . $product->product_name;
        //--seo

        return view('pages.product.show_details', compact('product', 'related_products', 'all_products', 'galleries', 'totalReview', 'meta_desc', 'meta_keywords', 'url_canonical', 'meta_title'));
    }

    public function search(Request $request)
    {
        $categories = CategoryProduct::where('category_parent', 0)->where('category_status', 1)->orderBy('category_order', 'asc')->get();
        $brands = Brand::where('brand_status', 1)->orderBy('brand_name', 'asc')->get();
        $keywords = $request->keywords;

        if (empty($keywords))
            $product = Product::where('product_status', 1);
        else {
            $product = Product::select('products.*')->where('product_status', 1)->where('product_name', 'like', "%$keywords%")
                ->join('brands', 'brands.brand_id', '=', 'products.brand_id')->orWhere('brand_name', 'like', "%$keywords%")
                ->join('category_products', 'category_products.category_id', '=', 'products.category_id')->orWhere('category_name', 'like', "%$keywords%");

            if (isset($_GET['price_min']) && $_GET['price_max'])
                $product = $product->whereBetween('product_price', [$_GET['price_min'], $_GET['price_max']]);

            if (isset($_GET['sort_by'])) {
                $sort_by = $_GET['sort_by'];
                $products =  $this->SortProduct($product, $sort_by);
            } else
                $products = $product->latest()->paginate(9);

            if (!$products->total())
                session()->flash('notification', 'Rất tiếc, sản phẩm bạn tìm kiếm hiện không được bán hoặc đã hết hàng. Vui lòng tìm kiếm sản phẩm khác. Xin cảm ơn!');
        }

        $all_products = Product::where('product_status', 1)->get();

        //seo 
        $meta_desc = "Chuyên bán thiết bị giải trí, phụ kiện điện tử, phụ kiện điện thoại, chơi game";
        $meta_keywords = "thiết bị giải trí, phụ kiện, chơi game, game giải trí";
        $url_canonical = $request->url();
        $meta_title = "Kết quả tìm kiếm: $keywords | WhyTech";
        //--seo

        return view('pages.product.search', compact('categories', 'brands', 'products', 'all_products', 'meta_desc', 'meta_keywords', 'url_canonical', 'meta_title'));
    }

    public function find(Request $request)
    {
        $keywords = $request->keywords;

        $products = Product::select('products.*')->where('product_status', 1)->where('product_name', 'like', "%$keywords%")
            ->join('brands', 'brands.brand_id', '=', 'products.brand_id')->orWhere('brand_name', 'like', "%$keywords%")
            ->join('category_products', 'category_products.category_id', '=', 'products.category_id')->orWhere('category_name', 'like', "%$keywords%")
            ->get()->take(5);

        $categories = CategoryProduct::where('category_status', 1)->where('category_name', 'like', "%$keywords%")->get()->take(5);

        return view('pages.product.find', compact('products', 'categories'));
    }

    public function load_comment(Request $request)
    {
        $productId = $request->productId;
        $comments = Comment::where('product_id', $productId)->where('comment_parent_comment', 0)->orderBy('comment_date', 'desc')->get();
        $output = '';

        foreach ($comments as $comment) {
            $output .= '
            <div class="review-o u-s-m-b-15 show_comment">
                <div class="review-o__info u-s-m-b-8">

                    <span class="review-o__name">' . $comment->comment_name . '</span>

                    <span class="review-o__date">' . $comment->comment_date . '</span>
                </div>
                <div class="review-o__rating gl-rating-style u-s-m-b-8">';

            $ratings = $comment->rating;

            for ($i = 0; $i < (int)$ratings; $i++) {
                $output .= '
                    <i class="fas fa-star"></i>
                ';
            }

            if (($ratings - (int)$ratings) > 0) {
                $output .= '
                <i class="fas fa-star-half-alt"></i>
            ';
            }

            $output .= '</div>
                <p class="review-o__text">' . $comment->comment_content . '</p>
                ';
            if ($comment->commentChildren->count() > 0) {
                foreach ($comment->commentChildren as $commentChildren)
                    $output .= '
                <div class="review-o__info u-s-m-b-8 show_reply_comment">
                    <img width="30px" height="25px" src="' . asset('frontend/images/logo/admin.png') . '">
                    <p class="review-o__text" style="color: #ff4500; font-weight: bold;">' . $commentChildren->comment_name . ':&nbsp;</p>
                    <p class="review-o__text">' . $commentChildren->comment_content . '</p>
                </div>
                ';
            }
            $output .= '</div>';
        }

        return $output;
    }

    public function send_comment(Request $request)
    {
        $productId = $request->productId;
        $commentName = $request->commentName;
        $commentPhone = $request->commentPhone;
        $commentContent = $request->commentContent;
        $rating = $request->rating;

        $comment = Comment::create([
            'comment_content' => $commentContent,
            'rating' => $rating,
            'comment_name' => $commentName,
            'comment_phone' => $commentPhone,
            'comment_date' => Carbon::now(),
            'product_id' => $productId,
            'comment_parent_comment' => 0,
        ]);
    }

    public function show_comment()
    {
        $comments = Comment::orderBy('product_id', 'asc')->where('comment_parent_comment', 0)->orderBy('comment_date', 'desc')->get();

        return view('admin.comment.all_comment', compact('comments'));
    }

    public function reply_comment(Request $request)
    {
        $commentContent = $request->commentContent;
        $commentParent = $request->commentId;
        $productId = Comment::find($commentParent)->product->product_id;

        $comment = Comment::create([
            'comment_content' => $commentContent,
            'comment_name' => (Admin::find(Auth::id())->roles->pluck('role_name'))[0],
            'comment_phone' => Auth::user()->admin_phone,
            'comment_date' => Carbon::now(),
            'product_id' => $productId,
            'comment_parent_comment' => $commentParent,
        ]);
    }
}
