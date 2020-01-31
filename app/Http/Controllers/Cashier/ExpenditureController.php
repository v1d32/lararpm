<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Requests\Admin\StorePermissionsRequest;
use App\Http\Requests\Admin\UpdatePermissionsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRolesRequest;
use App\Http\Requests\Admin\UpdateRolesRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ExpenditureController extends Controller
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
        $expends = [];
        return view('cashier.expenditure.index', compact('expends'));
    }
}