
@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <span class="badge badge-default">Label</span>
                    <h2>
                        Heading
                    </h2>
                    <p>
                        Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                    </p>
                    <p>
                        <a class="btn" href="#">View details »</a>
                    </p>
                    <form role="form">
                        <div class="form-group">

                            <label for="exampleInputEmail1">
                                Email address
                            </label>
                            <input type="email" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">

                            <label for="exampleInputPassword1">
                                Password
                            </label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">

                            <label for="exampleInputFile">
                                File input
                            </label>
                            <input type="file" class="form-control-file" id="exampleInputFile">
                            <p class="help-block">
                                Example block-level help text here.
                            </p>
                        </div>
                        <div class="checkbox">

                            <label>
                                <input type="checkbox"> Check me out
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </form>
                </div>
                <div class="col-md-6">
                    <span class="badge badge-default">Label</span>
                    <h2>
                        Heading
                    </h2>
                    <p>
                        Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                    </p>
                    <p>
                        <a class="btn" href="#">View details »</a>
                    </p><img alt="Bootstrap Image Preview" src="https://www.layoutit.com/img/sports-q-c-140-140-3.jpg">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection