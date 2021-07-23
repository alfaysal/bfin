<div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <form action="{{ route('blog_search') }}" method="POST">
                                @csrf
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Enter search term..." name="keywords" aria-label="Enter search term..." aria-describedby="button-search" />
                                    <input class="btn btn-primary" id="button-search" type="submit" value="go">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Sections</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <ul class="list-unstyled mb-0" >
                                        @foreach($sections as $section)
                                        <li style="display: inline;"><a href="{{ route('blog_section_search',['id'=>$section->id]) }}"><span class="btn btn-primary btn-sm mt-2">{{ $section->name }}</span></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">All Tags</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <ul class="list-unstyled mb-0" >
                                        @foreach($tags as $tag)
                                        <li style="display: inline;"><a href="{{ route('blog_tag_search',['id'=>$tag->id]) }}"><span class="btn btn-primary btn-sm mt-2">{{ $tag->name }}</span></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>