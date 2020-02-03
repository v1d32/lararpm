@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.membership.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("teller.membership.update", [$membership->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('residental_num') ? 'has-error' : '' }}">
                <label for="residental_num">{{ trans('cruds.membership.fields.residental_num') }}*</label>
                <input type="text" id="residental_num" name="residental_num" class="form-control" value="{{ old('residental_num', isset($membership) ? $membership->residental_num : '') }}" required>
                @if($errors->has('residental_num'))
                    <em class="invalid-feedback">
                        {{ $errors->first('residental_num') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.membership.fields.residental_num_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.membership.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($membership) ? $membership->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.membership.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label for="address">{{ trans('cruds.membership.fields.address') }}*</label>
                <textarea id="address" name="address" class="form-control" rows="2" required>{{ old('name', isset($membership) ? $membership->address : '') }}</textarea>
                @if($errors->has('address'))
                    <em class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.membership.fields.address_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('birth_date') ? 'has-error' : '' }}">
                <label for="birth_date">{{ trans('cruds.membership.fields.birth_date') }}*</label>
                <input type="date" id="birth_date" name="birth_date" class="form-control" value="{{ old('name', isset($membership) ? $membership->birth_date : '') }}" required>
                @if($errors->has('birth_date'))
                    <em class="invalid-feedback">
                        {{ $errors->first('birth_date') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.membership.fields.birth_date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('phone_num') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.membership.fields.phone_num') }}*</label>
                <input type="text" id="phone_num" name="phone_num" class="form-control" value="{{ old('phone_num', isset($membership) ? $membership->phone_num : '') }}" required>
                @if($errors->has('phone_num'))
                    <em class="invalid-feedback">
                        {{ $errors->first('phone_num') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.membership.fields.phone_num_helper') }}
                </p>
            </div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection