@php
    if(Session::has('onlineuser')):
        $value = Session::get('onlineuser');
    endif;
@endphp
@extends("admin.layout.interface")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{URL::to('/admin')}}">Admin</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="#">Meta Tags</a></li>
@endsection
@section("content")
    @if(Session::has('success'))
        @php $message = Session::get('success'); @endphp
            <div class="alert alert-success">{{$message}}</div>
        @php Session::pull('success'); @endphp
    @endif
    <form action="" method="post">
        <label for="">Page</label>
        <input type="text" class="form-control" name="" value="{{$data->name_page}}" disabled>
        <div class="d-flex justify-content-between">
            <label for="">Title</label>
            <p class="text-right text-danger m-0 titleCount"></p>
        </div>
        <input type="text" class="form-control titleCountFlied" maxlength="580" name="metaTitle" value="{{$data != null ? $data->title : ''}}">
        <div class="d-flex justify-content-between">
            <label for="">Description</label>
            <p class="text-right text-danger m-0 descriptionCount"></p>
        </div>
        <textarea name="metaDescription"  maxlength="990" class="form-control description">{{$data != null ? $data->description : ''}}</textarea>
        <label for="">Keywords</label>
        <select class="js-example-tokenizer col-sm-12" name="metaKeywords[]" multiple="multiple" required>
            @foreach ($MetaKeywords as $metas)
                @if($data != null)
                    @php
                        $keywords = explode(',',$data->keywordsimp);
                        $selectedAll = 0;
                    @endphp
                    @for($i = 0; $i< count($keywords); $i++)
                        @if($keywords[$i] == $metas->name)
                            @php   $selectedAll = 1;  @endphp
                        @endif
                    @endfor
                @endif
                <option value="{{$metas->name}}" {{$data != null ? ($selectedAll == 1 ? 'selected' : '') : ''}}>{{$metas->name}}</option>
            @endforeach
        </select><br><br>
        <input type="submit" value="Save" class="btn btn-primary btn-sm" >
    </form>

    @endsection
