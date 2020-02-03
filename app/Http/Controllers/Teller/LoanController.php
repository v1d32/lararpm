<?php

namespace App\Http\Controllers\Teller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRolesRequest;
use App\Http\Requests\Admin\UpdateRolesRequest;
use Spatie\Permission\Models\Role;

class LoanController extends Controller
{
    /**
     * Display a listing of Expenditures.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        if (! Gate::allows('users_manage')) {
//            return abort(401);
//        }
//
//        $roles = Role::all();
        $loans = [];
        return view('teller.loan.index', compact('loans'));
    }
}