<?php

namespace App\Http\Controllers\FrontEnd\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class LastestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        
    } 

    public function index()
    {   
        session_start();
        // if(isset($_SESSION["account_id"])){
        //     dd("see it");
        // }else{
        //   dd("dont see it");  
        // }
        
        $filter_data = array(
            'sort'  => 'p.date_added',
            'order' => 'DESC',
            'start' => 0,
            'limit' => 4
            // 'limit' => $setting['limit']
        );

        $results = $this->getProducts($filter_data);        
        $products = array();
        if($results){
            foreach ($results as $result) {
                // $products = array();
                // foreach($rs as $p){
                    $products[] = array(
                        'product_id'  => $result->product_id,
                        'thumb'       => config_url.$result->image,
                        'name'        => $result->name,
                        'alt_name'    => str_replace(' ', '-', strtolower($result->name)),
                        // 'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get($this->config->get('config_theme') . '_product_description_length')) . '..',
                        'description' => html_entity_decode($result->description, ENT_QUOTES, 'UTF-8'),
                        'price'       => $result->price,
                        'special'     => $result->special,
                        // 'tax'         => $p->tax,
                        'rating'      => $result->rating,
                        'href'        => '/product/'.str_replace(' ', '-', strtolower($result->name)).'-'.$result->product_id.'-0'
                        // 'href'        => $this->url->link('product/product', 'product_id=' . $p->product_id)
                    );
                // }   
            }

        }
        
        return response()->json(['data' => $products,'success' => true, 'message' => 'Success', 'lang'=>Session::get('applangId')]);
    }
}
