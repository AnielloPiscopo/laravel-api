{{-- 
|--------------------------------------------------------------------------
| TableContainer blade in Admin projects folder
|--------------------------------------------------------------------------
|
| This is the table partial used in the index and trashed blade file of the projects folder
|
--}}

@php
$columns=[
    [
      "name" => "id",
      "sortable" => true,
    ],

    [
      "name" => "title",
      "sortable" => true,
    ],

    [
      "name" => "description",
      "sortable" => true,
    ],

    [
      "name" => "img_path",
      "sortable" => true,
    ],

    [
      "name" => "type_name",
      "sortable" => false,
    ],

    [
      "name" => "technology",
      "sortable" => false,
    ],
];    
@endphp

<section class="card container">
  <div class="card-header">
    <div class="row align-items-center">
      <div class="col-6">
        <h2 class="my_title fw-bold">{{$title}}</h2>
      </div>

      <div class="col-6">
        <div class="text-end">
            @if ($projectsRoute === 'index')
                @if ($numOfTrashedElements)
                <a href="{{route('admin.pages.projects.trashed')}}" class="my_btn btn btn-outline-danger" title="{{$numOfTrashedElements>1 ? "$numOfTrashedElements trashed elements" : "1 trashed element"}}">Go to the the recycled bin</a>
                @endif
                <a href="{{route('admin.pages.projects.create')}}" class="my_btn btn btn-outline-primary">Add a new project +</a>
            @else
                <form class="d-inline-block" action="{{route('admin.pages.projects.emptyTrash')}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="my_btn btn btn-outline-danger">Delete all</button>
                </form>
                <a href="{{route('admin.pages.projects.restoreAll')}}" class="my_btn btn btn-outline-primary">Restore All</a>
            @endif
        </div>
      </div>
    </div>
  </div>

  <div class="card-body">
    @if (session('message'))
    <div>{{session('message')}}</div>
    @endif
    <table class="table table-hover">
      <thead class="table-dark">
        <tr>
          @foreach ($columns as $col)
          @php
              $colName = $col['name'];
              $colSortable = $col['sortable']
          @endphp
          <th scope="col"><a class="text-decoration-none" href="{{route(($projectsRoute === 'index') ? "admin.pages.projects.index" : "admin.pages.projects.trashed", ($colSortable) ? "orderCondition=$colName" : ''  )}}">{{$col['name']}}</a></th>
          @endforeach
          <th scope="col">#Actions</th>
        </tr>
      </thead>
  
      <tbody>
        @foreach ($projects as $project)
          <tr>
              <th scope="row">{{$project->id}}</th>
              <td>{{$project->title}}</td>
              <td>{{$project->description}}</td>
              <td>{{$project->img_path}}</td>
              <td><span class="badge rounded rounded-pill" style="color:{{$project->type->color}};background-color:{{$project->type->bg_color}}">{{$project->type->name}}</span></td>
              <td>
                @forelse ($project->technologies as $technology)
                <div class="badge rounded rounded-pill" style="color:{{$technology->color}};background-color:{{$technology->bg_color}}">{{$technology->name}}</div>
                @empty
                <div>No technologies</div>
                @endforelse
              </td>
              <td>
                <a href="{{route('admin.pages.projects.show' , $project->slug)}}" class="my_btn btn btn-primary">Show</a>
                @if ($projectsRoute === 'index')
                  <a href="{{route('admin.pages.projects.edit' , $project->slug)}}" class="my_btn btn btn-dark">Edit</a>

                  <form action="{{route('admin.pages.projects.destroy' , $project->slug)}}" method="POST" data-form-destroy data-element-name = '{{$project->title}}' >
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="my_btn btn btn-danger">Delete</button>
                  </form>
                @else
                    <form action="{{route('admin.pages.projects.forceDelete' , $project->slug)}}" method="POST" >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="my_btn btn btn-danger">Delete</button>
                    </form>
                    <a href="{{route('admin.pages.projects.restore' , $project->slug)}}" class="my_btn btn btn-primary">Restore</a>
                @endif
              </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <div class="my_pagination-links d-flex justify-content-end">
      {{ $projects->links() }}
    </div>
  </div>
</section>