		
@extends('front-end.profile.master')

@section('profile_content')
    <div id="page-content-wrapper">
               
        <div class="container-fluid">
            <h1 class="mt-4">Simple Sidebar</h1>
                <form action="" method="POST">
                
                <div class="form-group has-error">
                    <label for="slug">Slug </label>
                    <input type="text" class="form-control" name="slug" />
                </div>
                
                <div class="form-group">
                    <label for="title">Title <span class="require">*</span></label>
                    <input type="text" class="form-control" name="title" />
                </div>
                
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea rows="5" class="form-control" name="body" ></textarea>
                </div>

                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Create
                    </button>
                    <button class="btn btn-default">
                        Cancel
                    </button>
                </div>
                
            </form>
        
        </div>
    </div>
@endsection





