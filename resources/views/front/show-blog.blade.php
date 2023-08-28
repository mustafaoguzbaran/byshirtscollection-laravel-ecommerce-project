@extends("layouts.index")
@section("title")
    {{$getBlogData->title}} | By Shirts Collection
@endsection
@section("css")

@endsection
@section("content")
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card bg-success" style="margin-top: 40px">
                <div class="card-header bg-success text-white h1">
                    {{$getBlogData->title}}
                </div>
                <div class="card-body text-white">
                    {!! htmlspecialchars_decode($getBlogData->content) !!}
                </div>
                <div class="card-footer text-white" style="text-align: center">
                    Etiketler:
                    @foreach($getBlogData->tags as $tag)
                        <a class="text-white" style="text-decoration: none" href="{{$tag->slug}}">{{$tag->name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section("js")
@endsection
