@extends('layouts.main')

@section('title')
    <title>News</title>
@endsection

@section('content')
<div class="row" style="margin-right: 20px;">
    <div class="col-md-6 offset-md-3" style="border: 1px solid rgba(0,0,0,.125);" id="news">
        @foreach ($feeds as $feed)
            <figure>
                <blockquote class="blockquote">
                    <p><a class="nav-link" href="{{$feed->url}}" target="_blank">{{html_entity_decode($feed->title)}}</a></p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    Source: <cite title="Source Title">{{App\Models\Source::getName($feed->source_id)}}</cite> Date: <cite title="Source Title">{{date("d.m.y H:i", strtotime($feed->published_date))}}</cite>
                </figcaption>
                <div class="card mb-3" style="border: hidden;">
                <img class="card-img-top" src="@if(!$feed->image == null)
                        {{$feed->image}}
                        @else
                        https://sarahtherebel.files.wordpress.com/2014/03/thief_title.png
                        @endif
                        " style="margin-left: auto; margin-right: auto;width: 50%;">
                </div>
            </figure>
        @endforeach
    </div>
    <figure class="text-center">
        <blockquote class="blockquote">
            <p><a href="{{route('load.news')}}" id="load-news">Show next 10 News</a></p>
        </blockquote>
    </figure>

</div>
    <script>
        var page = 1;
        var lastArt = '{{$lastArt}}';
        $(document).ready(function() {
            $('#load-news').click(function(e){
                e.preventDefault();
                $.ajax({
                    url: '{{route('load.news')}}?page='+ page +'&lastArt='+ lastArt,
                    success: function(data) {
                        console.log(data);
                        page += 1;
                        for (const [key, value] of Object.entries(data.data)) {
                            var image = value.image;
                            if (image === "") {
                                image = "https://sarahtherebel.files.wordpress.com/2014/03/thief_title.png";
                            }
                            console.log(value);
                            var structure =
                                '<figure>'
                                + '<blockquote class="blockquote">'
                                +   '<p><a class="nav-link" href="'+ value.url+'" target="_blank">'+ value.title+'</a></p>'
                                +'</blockquote>'
                                +'<figcaption class="blockquote-footer">'
                                +     'Source: <cite title="Source Title">'+value.source_name+'</cite> Date: <cite title="Source Title">'+ value.published_date +'</cite>'
                                +'</figcaption>'
                                +'<div class="card mb-3" style="border: hidden;">'
                                +'<img class="card-img-top" src="'+ image +'" style="margin-left: auto; margin-right: auto;width: 50%;">'
                                +'</div>'
                                +'</figure>';
                            $('#news').append(structure);
                        }
                    },
                    error : function(data) {
                        alert('Error');
                    }
                });
            });
        });
    </script>
@endsection
