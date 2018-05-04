@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            @if (count($talks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Talks
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                            <th>TED</th>
                            <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="table-text"><div>speaker</div></td>
                                    <td class="table-text"><div>title</div></td>
                                    <td class="table-text"><div></div></td>
                                </tr>
                            @foreach ($talks as $talk)
                                <tr>
                                    <td class="table-text"><div>{{ $talk['speaker'] }}</div></td>
                                    <td class="table-text"><div>{{ $talk['title'] }}</div></td>
                                    <td class="table-text"><div><img src=" {{ $talk['img'] }}"></div></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
