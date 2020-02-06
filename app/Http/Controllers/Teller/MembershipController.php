<?php

namespace App\Http\Controllers\Teller;

use App\Models\CustomerDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Teller\StoreMembershipRequest;
use App\Http\Requests\Teller\UpdateMembershipRequest;
use App\Models\Member;
use Illuminate\Support\Str;

class MembershipController extends Controller
{
    /**
     * Display a listing of Membership.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('membership')) {
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
        if (!Gate::allows('membership')) {
            return abort(401);
        }

        return view('teller.membership.create');//, compact('permissions'));
    }

    /**
     * Store a newly created Membership in storage.
     *
     * @param \App\Http\Requests\Teller\StoreMembershipRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMembershipRequest $request)
    {
        if (!Gate::allows('membership')) {
            return abort(401);
        }
        $data = $request->all();

        $file_id = [];
        $file_ft = [];
        if ($request->get("image_path_id")) {
            $file_id = $this->uploadDoc($request->all(), $request->get('image_path_id'));
        }
        if ($request->get("image_path_ft")) {
            $file_ft = $this->uploadDoc($request->all(), $request->get('image_path_ft'));
        }
        $data['filename_id'] = $file_id["name"];
        $data['file_path_id'] = $file_id["path"];
        $data['image_path_id'] = $file_id["image"];
        $data['filename_ft'] = $file_ft["name"];
        $data['file_path_ft'] = $file_ft["path"];
        $data['image_path_ft'] = $file_ft["image"];
        $data['birth_date'] = date("Y-m-d", strtotime($data['birth_date']));//$file_ft["image"];

        $member = Member::create($data);

        return redirect()->route('teller.membership.index');
    }

    function uploadDoc($pelanggan, $docs)
    {
        $file = array();
        $file["name"] = Str::random(40) . '.jpeg';// . $image->getClientOriginalExtension();
        $path = "/uploads/customer_docs/" . $pelanggan['name'] . "_" . $pelanggan['birth_date'];
        if (!file_exists(public_path() . $path)) {
            mkdir(public_path() . $path, $mode = 0777, true);
        }

        $file["path"] = $path . '/';
        $file["image"] = public_path() . $file["path"] . $file["name"];
        $image = file_put_contents($file["image"], base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $docs)));
        return $file;
    }

    /**
     * Show the form for editing Membership.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $membership)
    {
        if (!Gate::allows('membership')) {
            return abort(401);
        }

        return view('teller.membership.edit', compact('membership'));
    }

    /**
     * Update Role in storage.
     *
     * @param \App\Http\Requests\Teller\UpdateMembershipRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMembershipRequest $request, Member $membership)
    {
        if (!Gate::allows('membership')) {
            return abort(401);
        }
        $data = $request->except(['residental_num', 'code']);
        $file_id = [];
        $file_ft = [];
        if ($request->get("image_path_id")) {
            $file_id = $this->uploadDoc($request->all(), $request->get('image_path_id'));
        }
        if ($request->get("image_path_ft")) {
            $file_ft = $this->uploadDoc($request->all(), $request->get('image_path_ft'));
        }
        if (count($file_id)) {
            $data['filename_id'] = $file_id["name"];
            $data['file_path_id'] = $file_id["path"];
            $data['image_path_id'] = $file_id["image"];
        }else{
            $data['filename_id'] = $membership["filename_id"];
            $data['file_path_id'] = $membership["file_path_id"];
            $data['image_path_id'] = $membership["image_path_id"];
        }
        if (count($file_ft)) {
            $data['filename_ft'] = $file_ft["name"];
            $data['file_path_ft'] = $file_ft["path"];
            $data['image_path_ft'] = $file_ft["image"];
        }else{
            $data['filename_ft'] = $membership["filename_ft"];
            $data['file_path_ft'] = $membership["file_path_ft"];
            $data['image_path_ft'] = $membership["image_path_ft"];
        }
        $data['birth_date'] = date("Y-m-d", strtotime($data['birth_date']));//$file_ft["image"];

        $membership->update($data);

        return redirect()->route('teller.membership.index');
    }

    public function show(Member $membership)
    {
        if (!Gate::allows('membership')) {
            return abort(401);
        }

        return view('teller.membership.show', compact('membership'));
    }


    /**
     * Remove Membership from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $membership)
    {
        if (!Gate::allows('membership')) {
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