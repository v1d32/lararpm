<?php

namespace App\Http\Controllers\Teller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Teller\StoreMembershipRequest;
use App\Http\Requests\Teller\UpdateMembershipRequest;
use App\Models\Member;

class MembershipController extends Controller
{
    /**
     * Display a listing of Membership.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('membership')) {
            return abort(401);
        }

        $membership = Member::all();
        return view('teller.membership.index', compact('membership'));
    }


    /**
     * Show the form for creating new Membership.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('membership')) {
            return abort(401);
        }

        return view('teller.membership.create');//, compact('permissions'));
    }

    /**
     * Store a newly created Membership in storage.
     *
     * @param  \App\Http\Requests\Teller\StoreMembershipRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMembershipRequest $request)
    {
        if (! Gate::allows('membership')) {
            return abort(401);
        }

        $member = Member::create($request->all());

        return redirect()->route('teller.membership.index');
    }


    /**
     * Show the form for editing Membership.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $membership)
    {
        if (! Gate::allows('membership')) {
            return abort(401);
        }

        return view('teller.membership.edit', compact('membership'));
    }

    /**
     * Update Role in storage.
     *
     * @param  \App\Http\Requests\Teller\UpdateMembershipRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMembershipRequest $request, Member $membership)
    {
        if (! Gate::allows('membership')) {
            return abort(401);
        }

        $membership->update($request->except(['residental_num','code']));

        return redirect()->route('teller.membership.index');
    }

    public function show(Member $membership)
    {
        if (! Gate::allows('membership')) {
            return abort(401);
        }

        return view('teller.membership.show', compact('membership'));
    }


    /**
     * Remove Membership from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $membership)
    {
        if (! Gate::allows('membership')) {
            return abort(401);
        }

        $membership->delete();

        return redirect()->route('teller.membership.index');
    }

    /**
     * Delete all selected Membership at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        Member::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }

}