<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $accounts = DB::table('accounts')
                        ->orderBy('created_at', 'desc')
                        ->get();
        
        return view('accounts.index', [
            'accounts' => $accounts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$todo = Todo::create($request->all());
        /*
        Validator::make($request->all(), [
            'name' => 'required|alpha|max:255',
            'description' => 'nullable',
        ])->validate();
        */
        $income = false;
        if ($request->income) {
            $income = true;
        }

        $cash = false;
        if ($request->cash) {
            $cash = true;
        }
        
        
        $account = Account::create([
            'amount' => $request->amount,
            'notes' => $request->notes,
            'income' => $income,
            'cash' => $cash,
             
            //'completed' => false, //default false in sql
            'user_id' => $request->user()->id, //or auth()->user()->id
        ]);
        $account->assigned_users()->attach($request->user()->id);
        return back()->with('message', __('Succesfully created'));
                                    //a toast message will appear, see layouts.app.blade
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }
}
