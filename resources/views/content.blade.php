@extends('index');

@section('form')
    <main id="main" class="main">
        <div class="container bg-dark m-5 bg-transparent">

            <div class="row">

                <div class="w-50 mx-auto my-auto">

                    <div class="card p-5">
                        <div class="card-title">
                            <h1>Add the Fake app data here:</h1>
                        </div>
                        <div class="card-body">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModalCenter">
                                Launch demo modal
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form onsubmit="return false" method="POST" id="my-form" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="hidden_id" id="hidden_id">
                                <input type="hidden" name="type" value="insert">
                                <input type="hidden" name="hidden_img" id="hidden_img">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Enter name">
                                </div>

                                <div class="mb-3">
                                    <label for="downloads">Downloads</label>
                                    <input type="text" class="form-control" name="downloads" id="downloads"
                                        placeholder="Enter downloads">
                                </div>

                                <div class="mb-3">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" name="image" id="image"
                                        placeholder="Enter Image">
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary mt-3" id="submit"
                                        value="Add Student">Submit</button>
                                </div>
                            </form>
                        </div>
                        <span id="output"></span>
                    </div>


                    <div class="container mt-5">
                        <h2>Fake App Table</h2>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Sr.no</th>
                                    <th>Name</th>
                                    <th>Downloads</th>
                                    <th data-orderable="false">Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</main @endsection
