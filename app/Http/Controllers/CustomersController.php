<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::simplePaginate(5);
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = $request->all();

        $customer_name = preg_replace('/\s\s+/', ' ',(trim($customer['customer_name'])));
        $upperCasedName = $this->titleCase($customer_name);
        $country = preg_replace('/\s\s+/', ' ',(trim($customer['customer_country'])));
        $upperCasedCountry = $this->titleCase($country);
        $email = trim(strtolower($customer['customer_email']));
        $number = str_replace(' ', '',(trim($customer['customer_number'])));
    
        $success = Customer::create([
            'name' =>  $upperCasedName,
            'country' => $upperCasedCountry,
            'email' => $email,
            'number' => $number,
            'birthday' => $customer['customer_birthday']
        ]);

         if($success)
        {
        flash('Customer succesfully added')->success();
        }

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {


       $attributes = $request->all();
       $customer_name = preg_replace('/\s\s+/', ' ',(trim($attributes['customer_name'])));
       $upperCasedName = $this->titleCase($customer_name);
        $country = preg_replace('/\s\s+/', ' ',(trim($attributes['customer_country'])));
        $upperCasedCountry = $this->titleCase($country);
        $email = trim(strtolower($attributes['customer_email']));
        $number = str_replace(' ', '',(trim($attributes['customer_number'])));

       $success = $customer->where('id', $customer->id)->update([
            'name' => $upperCasedName,
            'country' => $upperCasedCountry,
            'email' => $email,
            'number' => $number,
            'birthday' => $attributes['customer_birthday']
       ]);

        if($success)
        {
        flash('Customer succesfully updated')->success();
        }


       return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        flash('Customer succesfully deleted')->success();

        return redirect('/');
    }

    public function titleCase($string, $delimiters = array(" ", "-", ".", "'", "O'", "Mc", ","), $exceptions = array("de", "da", "dos", "das", "do", "I", "II", "III", "IV", "V", "VI"))
    {
        $string = mb_convert_case($string, MB_CASE_TITLE, "UTF-8");
        foreach ($delimiters as $dlnr => $delimiter) {
            $words = explode($delimiter, $string);
            $newwords = array();
            foreach ($words as $wordnr => $word) {
                if (in_array(mb_strtoupper($word, "UTF-8"), $exceptions)) {
                    // check exceptions list for any words that should be in upper case
                    $word = mb_strtoupper($word, "UTF-8");
                } elseif (in_array(mb_strtolower($word, "UTF-8"), $exceptions)) {
                    // check exceptions list for any words that should be in upper case
                    $word = mb_strtolower($word, "UTF-8");
                } elseif (!in_array($word, $exceptions)) {
                    // convert to uppercase (non-utf8 only)
                    $word = ucfirst($word);
                }
                array_push($newwords, $word);
            }
            $string = join($delimiter, $newwords);
       }
       return $string;
    } 

   

}
