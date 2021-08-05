<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
  protected $districts= [
    "বাগেরহাট"=>"খুলনা",
    "বান্দরবন"=>"চট্টগ্রাম",
    "বরগুনা"=>"বরিশাল",
    "বরিশাল"=>"বরিশাল",
    "ভোলা"=>"বরিশাল",
    "বগুড়া"=>"রাজশাহী",
    "ব্রাহ্মণবাড়িয়া"=>"চট্টগ্রাম",
    "চাঁদপুর"=>"চট্টগ্রাম",
    "চাঁপাইনবাবগঞ্জ"=>"রাজশাহী",
    "চট্টগ্রাম"=>"চট্টগ্রাম",
    "চুয়াডাঙ্গা"=>"খুলনা",
    "কুমিল্লা"=>"চট্টগ্রাম",
    "কক্সবাজার"=>"চট্টগ্রাম",
    "ঢাকা"=>"ঢাকা",
    "দিনাজপুর"=>"রংপুর",
    "ফরিদপুর"=>"ঢাকা",
    "ফেনী"=>"চট্টগ্রাম",
    "গাইবান্ধা"=>"রংপুর",
    "গাজীপুর"=>"ঢাকা",
    "গোপালগঞ্জ"=>"ঢাকা",
    "হবিগঞ্জ"=>"সিলেট",
    "জামালপুর"=>"ময়মনসিংহ",
    "যশোর"=>"খুলনা",
    "ঝালকাঠি"=>"বরিশাল",
    "ঝিনাইদহ"=>"খুলনা",
    "জয়পুরহাট"=>"রাজশাহী",
    "খাগড়াছড়"=>"চট্টগ্রাম",
    "খুলনা"=>"খুলনা",
    "কিশোরগঞ্জ"=>"ঢাকা",
    "কুড়িগ্রাম"=>"রংপুর",
    "কুষ্টিয়া"=>"খুলনা",
    "লক্ষ্মীপুর"=>"চট্টগ্রাম",
    "লালমনিরহাট"=>"রংপুর",
    "মাদারীপুর"=>"ঢাকা",
    "মাগুরা"=>"খুলনা",
    "মানিকগঞ্জ"=>"ঢাকা",
    "মৌলবীবাজার"=>"সিলেট",
    "মেহেরপুর"=>"খুলনা",
    "মুন্সিগঞ্জ"=>"ঢাকা",
    "ময়মনসিংহ"=>"ময়মনসিংহ",
    "নওগাঁ"=>"রাজশাহী",
    "নড়াইল"=>"খুলনা",
    "নারায়ণগঞ্জ"=>"ঢাকা",
    "নরসিংদী"=>"ঢাকা",
    "নাটোর"=>"রাজশাহী",
    "নেত্রকোনা"=>"ময়মনসিংহ",
    "নীলফামারী"=>"রংপুর",
    "নোয়াখালী"=>"চট্টগ্রাম",
    "পাবনা"=>"রাজশাহী",
    "পঞ্চগর"=>"রংপুর",
    "পটুয়াখালী"=>"বরিশাল",
    "পিরোজপুর"=>"বরিশাল",
    "রাজবাড়ি"=>"ঢাকা",
    "রাজশাহী"=>"রাজশাহী",
    "রাঙামাটি"=>"চট্টগ্রাম",
    "রংপুর"=>"রংপুর",
    "সাতক্ষীরা"=>"খুলনা",
    "শরিয়তপুর"=>"ঢাকা",
    "শেরপুর"=>"ময়মনসিংহ",
    "সিরাজগঞ্জ"=>"রাজশাহী",
    "সুনামগঞ্জ"=>"সিলেট",
    "সিলেট"=>"সিলেট",
    "টাংগাইল"=>"ঢাকা",
    "ঠাকুরগাঁও"=>"রংপুর",
  ];
  protected $ranks =[
    '1' => 'প্রযোজ্য নয়',
    '2' => '১ম',
    '3' =>'২য়',
    '4' =>'৩য়',
    '5' =>'৪র্থ',
    '6' => '৫ম',
    '7' => '৬ষ্ঠ',
    '8' =>'৭ম',
    '9' =>'৮ম',
    '10' =>'৯ম',
    '11' => '১০ম'
  ];
  protected $classes= [
    '1' => 'প্রযোজ্য নয়',
    '2' => 'প্রথম শ্রেণী',
    '3' =>'দ্বিতীয় শ্রেণী',
    '4' =>'তৃতীয় শ্রেণী',
    '5' =>'চতুর্থ শ্রেণী',
    '6' =>'পঞ্চম শ্রেণী',
    '7' =>'ষষ্ঠ শ্রেণী',
    '8' => 'সপ্তম শ্রেণী্',
    '9' => 'অষ্টম শ্রেণী',
    '10' => 'নবম শ্রেণী',
    '11' => 'দশম শ্রেণী',
    '12' => 'একাদশ শ্রেণী',
    '13' => 'দ্বাদশ শ্রেণী',
  ];
  protected $years= [
    '1' => 'প্রযোজ্য নয়',
    '2' => 'প্রথম বর্ষ',
    '3' =>'দ্বিতীয় বর্ষ',
    '4' =>'তৃতীয় বর্ষ',
    '5' =>'চতুর্থ বর্ষ',
  ];
  protected $semesters= [
    '1' => 'প্রযোজ্য নয়',
    '2' => 'প্রথম সেমিস্টার',
    '3' =>'দ্বিতীয় সেমিস্টার',
    '4' =>'তৃতীয় সেমিস্টার',
    '5' =>'চতুর্থ সেমিস্টার',
    '6' =>'পঞ্চম সেমিস্টার',
    '7' =>'ষষ্ঠ সেমিস্টার',
    '8' => 'সপ্তম সেমিস্টার্',
    '9' => 'অষ্টম সেমিস্টার',
    '10' => 'নবম সেমিস্টার',
    '11' => 'দশম সেমিস্টার',
    '12' => 'একাদশ সেমিস্টার',
    '13' => 'দ্বাদশ সেমিস্টার'
  ];
  protected $parts= [
    '1' => 'প্রযোজ্য নয়',
    '2' => 'প্রথম পর্ব',
    '3' =>'দ্বিতীয় পর্ব',
    '4' =>'তৃতীয় পর্ব',
    '5' =>'চতুর্থ পর্ব',
    '6' =>'পঞ্চম পর্ব',
    '7' =>'ষষ্ঠ পর্ব',
    '8' => 'সপ্তম পর্ব্',
    '9' => 'অষ্টম পর্ব',
    '10' => 'নবম পর্ব',
    '11' => 'দশম পর্ব',
    '12' => 'একাদশ পর্ব',
    '13' => 'দ্বাদশ পর্ব'
  ];
  protected $sessions= [
    '1' => 'প্রযোজ্য নয়',
    '2' => '২০১১-১২ সেশন',
    '3' =>'২০১২-১৩ সেশন',
    '4' =>'২০১৩-১৪ সেশন',
    '5' =>'২০১৪-১৫ সেশন',
    '6' =>'২০১৫-১৬ সেশন',
    '7' =>'২০১৬-১৭ সেশন',
    '8' => '২০১৭-১৮ সেশন',
    '9' => '২০১৮-১৯ সেশন্',
  ];
  protected $favorites= [
    '1' => 'প্রযোজ্য নয়',
    '2' => 'জনপ্রিয়',
  ];
  protected $relations= [
    '1' => 'প্রযোজ্য নয়',
    '2' => 'সংযোজন',
  ];
  protected $categories=[
    '1' => 'প্রযোজ্য নয়',
    '2' => 'পাঠ্য বই',
    '3' =>'ছোট গল্প',
    '4' =>'সমকালীন-উপন্যাস',
    '5' =>'চিরায়ত-উপন্যাস',
    '6' =>'রোমাঞ্চকর',
    '7' =>'সাহিত্য',
    '8' => 'সমকালীন গল্প',
    '9' => 'উপন্যাস সমগ্র',
    '10' => 'পুঁথি বিদ্যা অফার',
    '11' => 'কবিতা সমগ্র/সংকলন',
    '12' => 'নানাদেশ ও ভ্রমণ',
    '13' => 'শিশু কিশোর উপন্যাস',
    '14' => 'শিশু-কিশোরঃ রহস্য, গোয়েন্দা'
  ];
  protected $countries= [
    'BD' => 'Bangladesh',
    'US' => 'United State',
    'UK' => 'United Kingdom',
    'IN' => 'India'
  ];
  protected $languages= [
    'BN' => 'Bengali',
    'EN' => 'English',
    'HN' => 'Hindi'
  ];
  public function getDistricts(){
    return $this->districts;
  }
  public function getRanks(){
    return $this->ranks;
  }
  public function getCategories(){
    return $this->categories;
  }
  public function getClasses(){
    return $this->classes;
  }
  public function getYears(){
    return $this->years;
  }
  public function getSemesters(){
    return $this->semesters;
  }
  public function getParts(){
    return $this->parts;
  }
  public function getSessions(){
    return $this->sessions;
  }
  public function getFavorites(){
    return $this->favorites;
  }
  public function getRelations(){
    return $this->relations;
  }
  public function getCountries(){
    return $this->countries;
  }
  public function getLanguages(){
    return $this->languages;
  }

  public function getDetailCategory($category){
    $detailCategory='';
    $detailCategory= $this->categories[$category['category_title']];
    if($category['category_class']!='1')
      $detailCategory= $detailCategory .', '.$this->classes[$category['category_class']];
    if($category['category_year']!='1')
      $detailCategory= $detailCategory .', '.$this->years[$category['category_year']];
    if($category['category_semester']!='1')
      $detailCategory= $detailCategory .', '.$this->semesters[$category['category_semester']];
    if($category['category_part']!='1')
      $detailCategory= $detailCategory .', '.$this->parts[$category['category_part']];
    if($category['category_session']!='1')
      $detailCategory= $detailCategory .', '. $this->sessions[$category['category_session']];
    if($category['category_favorite']!='1')
      $detailCategory= $detailCategory .', '.$this->favorites[$category['category_favorite']];
    if($category['category_relation']!='1')
      $detailCategory= $detailCategory .', '.$this->relations[$category['category_relation']];
    return $detailCategory;
  }

  public function getResources(){

    return response()->json([
      'districts' => $this->getDistricts(),
      'categories'=> $this->getCategories()
    ]);
  }

}
