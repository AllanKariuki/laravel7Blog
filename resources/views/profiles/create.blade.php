@include('layouts.head')

@include('inc.navbar')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Profile</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('profiles.store') }}">
                        @csrf

                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control" placeholder="text">
                        </div>
                        <div class="form-group">
                            <label>Profile image</label>
                            <input type="file" name="profile_image" id="profile_image" placeholder="Profile image" class="form-control">
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
