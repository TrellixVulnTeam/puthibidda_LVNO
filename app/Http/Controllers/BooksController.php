<?php
namespace App\Http\Controllers;
use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use Carbon\Carbon;
use App\Models\Category;
use Image;
use Storage;
class BooksController extends Controller
{
  protected $form_fields=['book_title'=>'Title','category_id'=>'Category','author_list'=> 'Author Name', 'book_description'=>'Description','book_stock'=>'Stock','book_price'=>'Price','book_offer'=>'Offer Detail','book_offer_rate'=>'Offer Rate','book_ranking'=>'Ranking','book_pages'=>'Pages','publisher_id'=>'Publisher',
  'book_published_date'=>'Published At','book_country'=>'Country','book_lang'=>'Language', 'book_cover' => 'Book Cover' ];

  protected $scienceTitle=['1'=>'উচ্চতর গণিত','2'=>'জীববিজ্ঞন', '3'=>'রসায়ন','4'=>'পদার্থবিজ্ঞান','5'=>'HSC English','6'=>'বাংলা','7'=>'তথ্য ও যোগাযোগ প্রযুক্তি' ];
  protected $businessTitle=['1'=>'হিসাববিজ্ঞান','2'=>'ব্যবসায় সংগঠন ও ব্যবস্থাপনা', '3'=>'অর্থনীতি', '4'=>'ফিনন্যান্স ব্যাংকিং ও বিমা', '5'=>'HSC English', '6'=>'বাংলা','7'=>'তথ্য ও যোগাযোগ প্রযুক্তি' ];
  protected $humanitiesTitle=['1'=>'যুক্তিবিদ্যা','2'=>'দর্শন', '3'=>'ভূগোল','4'=>'ইসলামের ইতিহাস ও সংস্কৃতি','5'=>'পৌরনীতি ও সুশাসন','6'=>'সমাজকর্ম', '7'=>'ইতিহাস' ];

  public function __construct()
  {
    $this->middleware('auth', ['only'=>'create']);
  }
  public function index(){
      $ranks  = $this->getRanks();
    $allCategories= Category::all()->toArray();
    $category_list = [];
    foreach ($allCategories as $category){
      $category_list[$category['id']]= $this->getDetailCategory($category);
    }
    $entries = Book::latest()->get();
    $publishers= Publisher::all('id', 'publisher_name')->toArray();
    $publisher_list = [];
    foreach ($publishers as $publisher){
      $publisher_list[$publisher['id']]=$publisher['publisher_name'];
    }
    $form_fields = ['book_title'=>'Title','category_id'=>'Category', 'book_stock'=>'Stock','book_price'=>'Price','publisher_id'=>'Publisher','book_published_date'=>'Published At','book_cover'=>'Cover','author_list'=>'Author Name'];
    return view('books.index',compact('entries','form_fields','publisher_list','category_list','ranks'));
  }

  public function show($id){
    $ranks  = $this->getRanks();
    $form_fields= $this->form_fields;
    $allCategories= Category::all()->toArray();
    $category_list = [];
    foreach ($allCategories as $category){
      $category_list[$category['id']]= $this->getDetailCategory($category);
    }
    $publishers= Publisher::all('id', 'publisher_name')->toArray();
    $publisher_list = [];
    foreach ($publishers as $publisher){
      $publisher_list[$publisher['id']]=$publisher['publisher_name'];
    }
    $language = $this->getLanguages();
    $country =$this->getCountries();
    $entry = Book::findOrFail($id);
    return view('books.show',compact('entry','form_fields','publisher_list','category_list', 'country','language','ranks'));
  }

  public function create(){
    $ranks  = $this->getRanks();
    $form_fields=$this->form_fields;
    $allCategories= Category::all()->toArray();
    $category_list = [];
    foreach ($allCategories as $category){
      $category_list[$category['id']]= $this->getDetailCategory($category);
    }
    $publishers= Publisher::all('id', 'publisher_name')->toArray();
    $publisher_list = [];
    foreach ($publishers as $publisher){
      $publisher_list[$publisher['id']]=$publisher['publisher_name'];
    }
    $authors = Author::all('id','author_name')->toArray();
    $author_list = [];
    foreach ($authors as $author){
      $author_list[$author['id']]=$author['author_name'];
    }
    $language = $this->getLanguages();
    $country =$this->getCountries();
    return view('books.create',compact('form_fields','publisher_list','category_list', 'country','language','ranks','author_list'));
  }
  public function store(BookRequest $request){
    if ($request->hasFile('image')) {
      $image      = $request->file('image');
      $uniqueNumber = time();
      $fileName   = $uniqueNumber . '.' . $image->getClientOriginalExtension();
      $img = Image::make($image->getRealPath());
      $img->resize(320, 475, function ($constraint) {
        $constraint->aspectRatio();
      });
      $img->stream(); // <-- Key point
      Storage::disk('local')->put('public/bookcovers/'.$fileName, $img);
      $request['book_cover']=$fileName;
      $request['book_id'] = $uniqueNumber;
      if ($request->hasFile('image_back')) {
        $image      = $request->file('image_back');
        $img = Image::make($image->getRealPath());
        $img->resize(320, 475, function ($constraint) {
          $constraint->aspectRatio();
        });
        $img->stream(); // <-- Key point
        Storage::disk('local')->put('public/bookcovers/_back_'.$fileName, $img);
      }
      if ($request->hasFile('image_3d')) {
        $image      = $request->file('image_3d');
        $img = Image::make($image->getRealPath());
        $img->resize(320, 475, function ($constraint) {
          $constraint->aspectRatio();
        });
        $img->stream(); // <-- Key point
        Storage::disk('local')->put('public/bookcovers/_3d_'.$fileName, $img);
      }
      if ($request->hasFile('image_info')) {
        $image      = $request->file('image_info');
        $img = Image::make($image->getRealPath());
        $img->resize(320, 475, function ($constraint) {
          $constraint->aspectRatio();
        });
        $img->stream(); // <-- Key point
        Storage::disk('local')->put('public/bookcovers/_info_'.$fileName, $img);
      }
      if ($request->hasFile('image_thamil')) {
        $image      = $request->file('image_thamil');
        $img = Image::make($image->getRealPath());
        $img->resize(90, 136, function ($constraint) {
          $constraint->aspectRatio();
        });
        $img->stream(); // <-- Key point
        Storage::disk('local')->put('public/bookcovers/_thamil_'.$fileName, $img);
      }
    }
    else {
      $request['book_cover']='';
    }
    $book = Book::create($request->all());
    $book->authors()->attach($request->input('authors'));
    return redirect('books');
  }
  public function edit($id){
    $ranks  = $this->getRanks();
    $form_fields=$this->form_fields;
    $categories= Category::all()->toArray();
    $category_list = [];
    foreach ($categories as $category){
      $category_list[$category['id']]= $this->getDetailCategory($category);
    }
    $publishers= Publisher::all('id', 'publisher_name')->toArray();
    $publisher_list = [];
    foreach ($publishers as $publisher){
      $publisher_list[$publisher['id']]=$publisher['publisher_name'];
    }
    $authors = Author::all('id','author_name')->toArray();
    $author_list = [];
    foreach ($authors as $author){
      $author_list[$author['id']]=$author['author_name'];
    }
    $language = $this->getLanguages();
    $country =$this->getCountries();
    $entry = Book::findOrFail($id);
    return view('books.edit',compact('entry','form_fields','publisher_list','category_list','country','language','ranks','author_list'));
  }
  public function update(BookRequest $request, $id){
    $book = Book::findOrFail($id);
    if ($request->hasFile('image')) {
      $image      = $request->file('image');
      $uniqueNumber = time();
      $fileName   = $uniqueNumber . '.' . $image->getClientOriginalExtension();
      $img = Image::make($image->getRealPath());
      $img->resize(320, 475, function ($constraint) {
        $constraint->aspectRatio();
      });
      $img->stream(); // <-- Key point
      Storage::disk('local')->put('public/bookcovers/'.$fileName, $img);
      $request['book_cover']=$fileName;
      $request['book_id'] = $uniqueNumber;

      if ($request->hasFile('image_back')) {
        $image      = $request->file('image_back');
        $img = Image::make($image->getRealPath());
        $img->resize(320, 475, function ($constraint) {
          $constraint->aspectRatio();
        });
        $img->stream(); // <-- Key point
        Storage::disk('local')->put('public/bookcovers/_back_'.$fileName, $img);
      }

      if ($request->hasFile('image_3d')) {
        $image      = $request->file('image_3d');
        $img = Image::make($image->getRealPath());
        $img->resize(320, 475, function ($constraint) {
          $constraint->aspectRatio();
        });
        $img->stream(); // <-- Key point
        Storage::disk('local')->put('public/bookcovers/_3d_'.$fileName, $img);
      }
      if ($request->hasFile('image_info')) {
        $image      = $request->file('image_info');
        $img = Image::make($image->getRealPath());
        $img->resize(320, 475, function ($constraint) {
          $constraint->aspectRatio();
        });
        $img->stream(); // <-- Key point
        Storage::disk('local')->put('public/bookcovers/_info_'.$fileName, $img);
      }
      dd($request->hasFile('image_thamil'));
      if ($request->hasFile('image_thamil')) {
        $image      = $request->file('image_thamil');
        $img = Image::make($image->getRealPath());
        $img->resize(90, 136, function ($constraint) {
          $constraint->aspectRatio();
        });
        $img->stream(); // <-- Key point
        Storage::disk('local')->put('public/bookcovers/_thamil_'.$fileName, $img);
      }
    }
    $book->update($request->all());
    $book->authors()->sync($request->input('authors'));
    return redirect('books');
  }
  public function welcomePage(){
    $ranks  = $this->getRanks();
    $allCategories= Category::all()->toArray();
    $category_list = [];
    foreach ($allCategories as $category){
      $category_list[$category['id']]= $this->getDetailCategory($category);
    }
    $entries = Book::latest()->get();
    $publishers= Publisher::all('id', 'publisher_name')->toArray();
    $publisher_list = [];
    foreach ($publishers as $publisher){
      $publisher_list[$publisher['id']]=$publisher['publisher_name'];
    }
    $form_fields = ['book_title'=>'Title','category_id'=>'Category', 'book_stock'=>'Stock','book_price'=>'Price','publisher_id'=>'Publisher','book_published_date'=>'Published At','book_cover'=>'Cover'];
    return view('puthiContainer',compact('entries','form_fields','publisher_list','category_list','ranks'));
  }


  // public function newarivals(){
  //   $allCategories= Category::all()->toArray();
  //   $category_list = [];
  //   foreach ($allCategories as $category){
  //     $category_list[$category['id']]= $this->getDetailCategory($category);
  //   }
  //   $entries = Book::latest()->get();
  //   $publishers= Publisher::all('id', 'publisher_name')->toArray();
  //   $publisher_list = [];
  //   foreach ($publishers as $publisher){
  //     $publisher_list[$publisher['id']]=$publisher['publisher_name'];
  //   }
  //   $form_fields = ['book_cover'=>'Cover','book_title'=>'Title', 'book_description'=>'Book Description','category_id'=>'Category', 'book_stock'=>'Stock','book_price'=>'Price','book_offer_rate'=>'Book Offer Rate','publisher_id'=>'Publisher','book_published_date'=>'Published At'];
  //   return view('books.newarivals',compact('entries','form_fields','publisher_list','category_list','ranks'));
  // }

  //public Services
  public function totalbooks(){
    return Book::count();
  }
  public function allbooks($category, $offset, $limit){
    return Book::latest()->skip($offset)->take($limit)->get();
  }
  public function allListedBooks(){
    return Book::get();
  }
  public function allFavoriteBooks(){
    return Book::with(array('authors'=>function($query){
        $query->select('author_name');
    }))->where('book_ranking','>=',8)->get();
  }
  public function booksByAuthor($id){
    $author= Author::findorFail($id);
    return $author->books;
  }
  public function booksByCategory($id){
    $category= Category::findorFail($id);
    return $category->books;
  }
  public function allPopularBooks(){
    return Book::with(array('authors'=>function($query){
        $query->select('author_name');
    }))->where('book_ranking','>=',4)->get();
  }
  public function totalnewarrivals(){
    return count(Book::newArrival()->get());
  }
  public function newarrivals($offset, $limit){
   $books = Book::with('category')->newArrival()->skip($offset)->take($limit)->get();
    return $books;
  }

  public function categories($id){
    $category =  Category::findOrFail($id);
    /*
    $allCategories= Category::all()->toArray();
    $category_list = [];
    foreach ($allCategories as $category){
    $category_list[$category['id']]= $this->getDetailCategory($category);
  }
  $entries = Book::latest()->get();
  $publishers= Publisher::all('id', 'publisher_name')->toArray();
  $publisher_list = [];
  foreach ($publishers as $publisher){
  $publisher_list[$publisher['id']]=$publisher['publisher_name'];
}
$form_fields = ['book_title'=>'Title','category_id'=>'Category', 'book_stock'=>'Stock','book_price'=>'Price','publisher_id'=>'Publisher','book_published_date'=>'Published At','book_cover'=>'Cover'];*/
$books =$category->books;
return $books; //view('books.categories',compact('entries','form_fields','publisher_list','category_list','ranks'));
}
public function favorite(){
  // $favoriteCategories = Category::where('category_favorite','2')->get();
  // //dd($favoriteCategories);
  // $entries=[];
  // foreach ($favoriteCategories as $category){
  $entries = Book::where('book_ranking','2')->get();
  //}

  $allCategories= Category::all()->toArray();
  $category_list = [];
  foreach ($allCategories as $category){
    $category_list[$category['id']]= $this->getDetailCategory($category);
  }
  $publishers= Publisher::all('id', 'publisher_name')->toArray();
  $publisher_list = [];
  foreach ($publishers as $publisher){
    $publisher_list[$publisher['id']]=$publisher['publisher_name'];
  }
  $form_fields = ['book_cover'=>'Cover','book_title'=>'Title', 'book_description'=>'Book Description','category_id'=>'Category', 'book_stock'=>'Stock','book_price'=>'Price','book_offer_rate'=>'Book Offer Rate','publisher_id'=>'Publisher','book_published_date'=>'Published At'];
  return view('books.favorite',compact('entries','form_fields','publisher_list','category_list','ranks'));
}

public function offers(){
  $allCategories= Category::all()->toArray();
  $category_list = [];
  foreach ($allCategories as $category){
    $category_list[$category['id']]= $this->getDetailCategory($category);
  }
  $entries = Book::latest()->get();
  $publishers= Publisher::all('id', 'publisher_name')->toArray();
  $publisher_list = [];
  foreach ($publishers as $publisher){
    $publisher_list[$publisher['id']]=$publisher['publisher_name'];
  }
  $form_fields = ['book_title'=>'Title','category_id'=>'Category', 'book_stock'=>'Stock','book_price'=>'Price','publisher_id'=>'Publisher','book_published_date'=>'Published At','book_cover'=>'Cover'];
  return view('books.offers',compact('entries','form_fields','publisher_list','category_list','ranks'));
}
public function publishers(){
  $allCategories= Category::all()->toArray();
  $category_list = [];
  foreach ($allCategories as $category){
    $category_list[$category['id']]= $this->getDetailCategory($category);
  }
  $entries = Book::latest()->get();
  $publishers= Publisher::all('id', 'publisher_name')->toArray();
  $publisher_list = [];
  foreach ($publishers as $publisher){
    $publisher_list[$publisher['id']]=$publisher['publisher_name'];
  }
  $form_fields = ['book_title'=>'Title','category_id'=>'Category', 'book_stock'=>'Stock','book_price'=>'Price','publisher_id'=>'Publisher','book_published_date'=>'Published At','book_cover'=>'Cover'];
  return view('books.publishers',compact('entries','form_fields','publisher_list','category_list','ranks'));
}
public function getNewArrivals(){
  return response()->json([
    'books' => Book::with('Category')->newArrival()->get()
  ]);
}

//mobile services
public function getHSC($subject){

  $titles = [];

  if($subject == 'science'){
    $titles=$this->scienceTitle;
  }
  else if($subject == 'humanities'){
    $titles=$this->humanitiesTitle;
  }
  else if($subject == 'business'){
    $titles=$this->businessTitle;
  }

  return view("mobile.books.hsc",compact('subject', 'titles'));
}
public function getSearchResultAll(){
  return $this->getSearchResult("all");
}
public function getSearchResult($keywords){
  if($keywords!="all" && $keywords!="")
    return response()->json([
      'books' => Book::with('Category')->where([
        ['book_title', 'like', "%{$keywords}%"]])->get()
    ]);
  else
    return response()->json([
      'books' => Book::with('authors')->get()
    ], 200, [], JSON_UNESCAPED_UNICODE);
}
public function getForyou(){
  // if($category!="0")
  //   return response()->json([
  //     'books' => Book::with('authors')->where([
  //       ['category_id', '=', "$category"]])->get()
  //   ], 200, [], JSON_UNESCAPED_UNICODE);
  // else
    return response()->json([
      'books' => Book::with('authors')->get()
    ], 200, [], JSON_UNESCAPED_UNICODE);
}
public function getToprated(){
  // if($category!="0")
  //   return response()->json([
  //     'books' => Book::with('authors')->where([
  //       ['category_id', '=', "$category"],['book_ranking', '>=', "4"]])->get()
  //   ], 200, [], JSON_UNESCAPED_UNICODE);
  // else
    return response()->json([
      'books' => Book::with('authors')->where([
        ['book_ranking', '>=', "4"]])->get()
    ], 200, [], JSON_UNESCAPED_UNICODE);
}
public function getEditorschoice(){
  // if($category!="0")
  //   return response()->json([
  //     'books' => Book::with('authors')->where([
  //       ['category_id', '=', "$category"],['book_offer_rate', '>=', "30"]])->get()
  //   ], 200, [], JSON_UNESCAPED_UNICODE);
  // else
    return response()->json([
      'books' => Book::with('authors')->where([
        ['book_offer_rate', '>=', "30"]])->get()
    ], 200, [], JSON_UNESCAPED_UNICODE);
}
public function getFavourites(){
  // if($category!="0")
  //   return response()->json([
  //     'books' => Book::with('authors')->where([
  //       ['category_id', '=', "$category"],['book_offer_rate', '>=', "50"]])->get()
  //   ], 200, [], JSON_UNESCAPED_UNICODE);
  // else
    return response()->json([
      'books' => Book::with('authors')->where([
        ['book_offer_rate', '>=', "20"]])->get()
    ], 200, [], JSON_UNESCAPED_UNICODE);
}

public function getNewBooks(){
  // if($category!="0")
  //   return response()->json([
  //     'books' => Book::with('authors')->where([
  //       ['category_id', '=', "$category"],['created_at', '>=', Carbon::now()]])->get()
  //   ], 200, [], JSON_UNESCAPED_UNICODE);
  // else
    return response()->json([
      'books' => Book::with('authors')->where([
        ['created_at', '>=', Carbon::now()]])->get()
    ], 200, [], JSON_UNESCAPED_UNICODE);
}

public function getUpcoming(){
  // if($category!="0")
  //   return response()->json([
  //     'books' => Book::with('authors')->where([
  //       ['category_id', '=', "$category"],['created_at', '>', Carbon::now()]])->get()
  //   ], 200, [], JSON_UNESCAPED_UNICODE);
  // else
    return response()->json([
      'books' => Book::with('authors')->where([
        ['created_at', '>', Carbon::now()]])->get()
    ], 200, [], JSON_UNESCAPED_UNICODE);
}
}
