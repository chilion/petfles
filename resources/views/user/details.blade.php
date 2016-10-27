@extends("layouts.app")

@section("content")
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <ul>
                        @foreach($distances as $distance)
                            <li>Trip: {{$distance}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="panel-footer">
                    <b>Totale afstand: {{array_sum($distances)}}</b>
                </div>
            </div>

        </div>
    </div>
@endsection