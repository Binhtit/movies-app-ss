@extends('pages.admins.layout')
@section('content')
<div class="form-w3layouts">
<!-- page start-->
<div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Add new film category
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form role="form">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category name *</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Position</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-info">Submit</button>
                        </form>
                        </div>
                    </div>
                </section>

            </div>
        <!-- page end-->
        </div>
@endsection