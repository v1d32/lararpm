@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.membership.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.membership.fields.id') }}
                        </th>
                        <td>
                            {{ $membership->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.membership.fields.residental_num') }}
                        </th>
                        <td>
                            {{ $membership->residental_num }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.membership.fields.code') }}
                        </th>
                        <td>
                            {{ $membership->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.membership.fields.name') }}
                        </th>
                        <td>
                            {{ $membership->name }}
                        </td>
                    </tr>

                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection