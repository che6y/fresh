@extends('layouts.app')

@section('content')
<div class="container admin-container">

  @include('layouts.aheader')

  <div class="admin-container__outlet">

    <?php echo Breadcrumbs::render('works'); ?>

    <p><a href="/works/create"><button type="button" name="button" class="btn btn-outline-secondary btn-sm">Add new</button></a></p>

    <table class="table table-bordered">

      <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Action</th>
        </tr>
      </thead>

      <tbody>

        @for ($i=0; $i<count($works); ++$i)
        <tr>
          <th scope="row">{{ $i+1 }}</th>
          <td>{{ $works[$i]->title }}</td>
          <td>
            <a href="/works/edit/{{ $works[$i]->id }}" class="edit-button"><button class="btn btn-outline-info btn-sm">Edit</button></a>
            <form action="{{ url('/delete-work', ['id' => $works[$i]->id]) }}" method="POST" class="delete-form">

                {{ method_field('DELETE') }}

                {{ csrf_field() }}

                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>

            </form>
          </td>
        </tr>
        @endfor

      </tbody>
    </table>

  </div>


</div>
@endsection
