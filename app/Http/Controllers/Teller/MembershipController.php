<?php

namespace App\Http\Controllers\Teller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRolesRequest;
use App\Http\Requests\Admin\UpdateRolesRequest;
use Spatie\Permission\Models\Role;
use App\Models\Members;

class MembershipController extends Controller
{
    /**
     * Display a listing of Expenditures.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('membership')) {
            return abort(401);
        }

        $members = Members::all();
        return view('teller.membership.index', compact('members'));
    }
}