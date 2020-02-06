@extends('layouts.admin')
@section('styles')
    <link href="{{ asset('css/members_form.css') }}" rel="stylesheet"/>
@stop
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.membership.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route("teller.membership.store") }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group {{ $errors->has('residental_num') ? 'has-error' : '' }}">
                    <label for="residental_num">{{ trans('cruds.membership.fields.residental_num') }}*</label>
                    <input type="number" id="residental_num" name="residental_num" class="form-control"
                           value="{{ old('residental_num', isset($membership) ? $membership->residental_num : '') }}"
                           required>
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
                    <input type="text" id="name" name="name" class="form-control"
                           value="{{ old('name', isset($membership) ? $membership->name : '') }}" required>
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
                    <textarea id="address" name="address" class="form-control" rows="2"
                              required>{{ old('name', isset($membership) ? $membership->address : '') }}</textarea>
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
                    <input type="text" id="birth_date" name="birth_date" class="form-control date"
                           value="{{ old('name', isset($membership) ? $membership->birth_date : '') }}" required>
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
                    <input type="number" id="phone_num" name="phone_num" class="form-control"
                           value="{{ old('phone_num', isset($membership) ? $membership->phone_num : '') }}" required>
                    @if($errors->has('phone_num'))
                        <em class="invalid-feedback">
                            {{ $errors->first('phone_num') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.membership.fields.phone_num_helper') }}
                    </p>
                </div>
                <div class="row">
                    <div class="form-group {{ $errors->has('image_path_id') ? 'has-error' : '' }} col-md-6">
                        <label for="image_path_id">{{ trans('cruds.membership.fields.image_path_id') }}*</label>

                        <input type="text" id="image_path_id" name="image_path_id" style="display: none;"
                               class="form-control"
                               value="{{ old('image_path_id', isset($membership) ? $membership->file_path_id . $membership->filename_id : '') }}">
                        <button id="myBtn" class="btn btn-default btn-file">
                            <img  height="100pt" width="133.33pt" id="pre_image_path_id" name="pre_image_path_id"
                                 src="{{ old('image_path_id', isset($membership) ? $membership->file_path_id . $membership->filename_id : '/image-placeholder.png') }}"/>
                        </button>
                        @if($errors->has('image_path_id'))
                            <em class="invalid-feedback">
                                {{ $errors->first('image_path_id') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.membership.fields.image_path_id_helper') }}
                        </p>
                    </div>
                    <div class="form-group {{ $errors->has('image_path_ft') ? 'has-error' : '' }} col-md-6">
                        <label for="image_path_ft">{{ trans('cruds.membership.fields.image_path_ft') }}*</label>

                        <input type="text" id="image_path_ft" name="image_path_ft" style="display: none;"
                               class="form-control"
                               value="{{ old('image_path_id', isset($membership) ? $membership->file_path_ft . $membership->filename_ft : '') }}">
                        <button id="myBtn2" class="btn btn-default btn-file">
                            <img  height="100pt" width="133.33pt" id="pre_image_path_ft" name="pre_image_path_ft"
                                 src="{{ old('image_path_ft', isset($membership) ? $membership->file_path_ft . $membership->filename_ft : '/image-placeholder.png') }}"/>
                        </button>
                        @if($errors->has('image_path_ft'))
                            <em class="invalid-feedback">
                                {{ $errors->first('image_path_ft') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.membership.fields.image_path_ft_helper') }}
                        </p>
                    </div>
                </div>

                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="my_camera"></div>
            <input type=button value="Take Snapshot" onClick="take_snapshot()">
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('js/webcam.min.js') }}"></script>
    <script>
        var imageType = "id";
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("myBtn");
        var btn2 = document.getElementById("myBtn2");
        var span = document.getElementsByClassName("close")[0];
        btn.onclick = function (e) {
            e.preventDefault();
            imageType = "id";
            modal.style.display = "block";
        }
        btn2.onclick = function (e) {
            e.preventDefault();
            imageType = "ft";
            modal.style.display = "block";
        }
        span.onclick = function () {
            modal.style.display = "none";
        }
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach('#my_camera');

        function take_snapshot() {
            var imagePath = "";
            var PreImagePath = "";
            imagePath = "#image_path_" + imageType;
            PreImagePath = "#pre_image_path_" + imageType;
            Webcam.snap(function (data_uri) {
                //
                // var img = data_uri.toDataURL("image/png");
                // var output = encodeURIComponent(img);
                //
                $(imagePath).val(data_uri);
                $(PreImagePath).attr("src", data_uri);
                $(PreImagePath).show();
                modal.style.display = "none";
            });
        }
    </script>
@endsection