<div class="container">
    <div class="bravo-list-catering layout_{{$style_list}}">
        @if($title)
        <div class="title">
            {{$title}}
        </div>
        @endif
        @if($desc)
            <div class="sub-title">
                {{$desc}}
            </div>
        @endif
        <div class="list-item">
            @if($style_list === "normal")
                <div class="row">
                    @foreach($rows as $row)
                        <div class="col-lg-{{$col ?? 3}} col-md-6">
                            @include('Catering::frontend.layouts.search.loop-gird')
                        </div>
                    @endforeach
                </div>
            @endif
            @if($style_list === "cateringousel")
                <div class="owl-cateringousel">
                    @foreach($rows as $row)
                        @include('Catering::frontend.layouts.search.loop-gird')
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
