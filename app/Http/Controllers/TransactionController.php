<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::all();
        return view('usertransaction', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::all()->except($id);
        $userbalance = User::findorfail($id);
        return view('transaction-edit', [
            'userbalance' => $userbalance,
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::findorfail($id);
        $currentbalance = $user->balance;
        if ($request->balance == true) {
            $user->update([
                'balance' => ($currentbalance + $request->balance)
            ]);
        } else {
            $user->update(
                [
                    'balance' => ($currentbalance - $request->inbalance),
                ]
            );
        }



        return redirect(route('transactions.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function makezero($id)
    {
        $balance = User::find($id);
        $balance->update([
            'balance' => 0,
        ]);
        return redirect(route('transactions.index'));
    }

    public function balanceto(Request $request, $id)
    {
        $userto = User::findorfail($id);
        $currentto = $userto->balance;
        $userfrom = User::where('id', $request->from)->find($request->from);
        $currentfrom = $userfrom->balance;

        $userfrom->update([
            'balance' => ($currentfrom - $request->balance),

        ]);
        $userto->update([
            'balance' => ($currentto + $request->balance)

        ]);

        return redirect(route('transactions.index'));
    }
}
