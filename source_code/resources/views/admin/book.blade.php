@extends('layouts.admin')

@section('content')
<div class="card mt-3">
    <div class="card-content">
        <div class="row row-group m-0">
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0">9526 <span class="float-right"><i class="fa fa-shopping-cart"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                       <div class="progress-bar" style="width:55%"></div>
                    </div>
                  <p class="mb-0 text-white small-font">Total Orders <span class="float-right">+4.2% <i class="zmdi zmdi-long-arrow-up"></i></span></p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0">8323 <span class="float-right"><i class="fa fa-usd"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                       <div class="progress-bar" style="width:55%"></div>
                    </div>
                  <p class="mb-0 text-white small-font">Total Revenue <span class="float-right">+1.2% <i class="zmdi zmdi-long-arrow-up"></i></span></p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0">6200 <span class="float-right"><i class="fa fa-eye"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                       <div class="progress-bar" style="width:55%"></div>
                    </div>
                  <p class="mb-0 text-white small-font">Visitors <span class="float-right">+5.2% <i class="zmdi zmdi-long-arrow-up"></i></span></p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0">5630 <span class="float-right"><i class="fa fa-envira"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                       <div class="progress-bar" style="width:55%"></div>
                    </div>
                  <p class="mb-0 text-white small-font">Messages <span class="float-right">+2.2% <i class="zmdi zmdi-long-arrow-up"></i></span></p>
                </div>
            </div>
        </div>
    </div>
</div>  
<div class="container-fluid">
  <div class="row mt-3">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Basic Table </h5>
		  <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Descipton</th>
                        <th scope="col">Link</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                        <tr>
                            <th scope="row">{{ $book->id }}</th>
                            <td class="text-wrap">{{ $book->title }}</td>
                            <td class="text-truncate" style="max-width: 300px;">{{ $book->description }}</td>
                            <td>
                                <a href="{{ $book->link }}" class="" placeholder="Download the book">
                                    <i class="zmdi zmdi-case-download"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-3">
      <div class="col-12">
         <div class="card">
           <div class="card-body">
           <div class="card-title">Add new book</div>
           <hr>
          <form method="POST" action="{{ route('admin-new-book') }}" enctype="multipart/form-data" >
            @csrf
            <div class="form-group">
              <label for="input-1">Title</label>
              <input type="text" class="form-control" id="input-1" name="title" placeholder="Enter title" required>
            </div>
            <div class="form-group">
              <label for="input-2">Description</label>
              <textarea type="text" class="form-control" id="input-2" name="description" placeholder="Enter Description" required></textarea>
            </div>
            <div class="form-group">
              <label for="input-2">Author</label>
              <select class="form-control" name="author" required>
                @foreach($authors as $author)
                  <option value="{{ $author->id }}">{{ $author->name . $author->surname }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="input-2">Category</label>
              <select class="form-control" name="category" required>
                @foreach($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
              </select>            </div>
            <div class="form-group">
              <label for="input-3">EPUB</label>
              <input type="file" class="form-control" id="input-3" name="book" placeholder="Enter the book" required>
            </div>
            <div class="form-group">
              <label for="input-4">Cover</label>
              <input type="file" class="form-control" id="input-4" name="cover" placeholder="Enter Password" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-light px-5">Add</button>
            </div>
          </form>
         </div>
         </div>
      </div>
    </div>
</div>

@endsection