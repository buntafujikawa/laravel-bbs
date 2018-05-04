@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Talk
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                        <th>TED</th>
                        <th>&nbsp;</th>
                        </thead>
                        <tbody>
                        <tr>
                            <div style="max-width:854px">
                                <div style="position:relative;height:0;padding-bottom:56.25%">
                                    <iframe src="https://embed.ted.com/talks/rebecca_kleinberger_our_three_voices" width="854" height="480" style="position:absolute;left:0;top:0;width:100%;height:100%" frameborder="0" scrolling="no" allowfullscreen></iframe>
                                </div>
                            </div>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
