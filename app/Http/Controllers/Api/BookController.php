<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Review;

class BookController extends Controller
{
    
    public function index()
    {
        return Book::all();
    }

    public function booksByRate()
    {
        $one_star = $five_star = $four_star = $three_star = $two_star = $one_star = [];
        
        foreach(Review::all() as $review)
        {
            switch($review->rating)
            {
                case 1: 
                    if (array_key_exists($review->Book->name, $one_star)) {
                        $one_star[$review->Book->name] += 1; 
                    }
                    else 
                    {
                        $one_star[$review->Book->name] = 1;
                    }
                break;

                case 2: 
                    if (array_key_exists($review->Book->name, $two_star)) {
                        $two_star[$review->Book->name] += 1; 
                    }
                    else 
                    {
                        $two_star[$review->Book->name] = 1;
                    }  
                break;

                case 3:
                    if (array_key_exists($review->Book->name, $three_star)) {
                        $three_star[$review->Book->name] += 1; 
                    }
                    else 
                    {
                        $three_star[$review->Book->name] = 1;
                    }
                break;

                case 4: 
                    if (array_key_exists($review->Book->name, $four_star)) {
                        $four_star[$review->Book->name] += 1; 
                    }
                    else 
                    {
                        $four_star[$review->Book->name] = 1;
                    }
                break;

                case 5: 
                    if (array_key_exists($review->Book->name, $five_star)) {
                        $five_star[$review->Book->name] += 1; 
                    }
                    else 
                    {
                        $five_star[$review->Book->name] = 1;
                    }
                break;    
            }

        }
            
            # This is to use with name 

            // $books = [
            //     'one star' => ($this->getMax($one_star) == false) ? NULL : $this->getMax($one_star) ,
            //     'two star' => ($this->getMax($two_star) == false) ? NULL : $this->getMax($two_star) ,
            //     'three star' => ($this->getMax($three_star) == false) ? NULL : $this->getMax($three_star) ,
            //     'four star' => ($this->getMax($four_star) == false) ? NULL : $this->getMax($four_star) ,
            //     'five star' => ($this->getMax($five_star) == false) ? NULL : $this->getMax($five_star) ,
            // ];

            # This is to use with sorting 1 to 5 
            $books = [
                ($this->getMax($one_star) == false) ? NULL : $this->getMax($one_star) ,
                ($this->getMax($two_star) == false) ? NULL : $this->getMax($two_star) ,
                ($this->getMax($three_star) == false) ? NULL : $this->getMax($three_star) ,
                ($this->getMax($four_star) == false) ? NULL : $this->getMax($four_star) ,
                ($this->getMax($five_star) == false) ? NULL : $this->getMax($five_star) ,
            ];

            return $books;

    }

    function getMax( $array )
    {
        $max = 0;
        foreach( $array as $k => $v )
        {
            $max = max( array( $max, $v) );
        }
        return array_search ($max, $array);
    }

}
