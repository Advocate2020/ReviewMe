<div>

    <div class="row mb-4 d-flex justify-content-between align-items-baseline">
        <div class="col">
            Per Page:
            <select wire:model="perPage" class="form-control">
                <option>2</option>
                <option>5</option>
                <option>10</option>
                <option>15</option>
                <option>25</option>
            </select>
        </div>

        <div class="col">
            Search:
            <input wire:model.debounce.300ms="search" class="form-control" type="text" placeholder="Search Companies...">
        </div>

    </div>

    @if($companies->isNotEmpty())
        <table class="table table-striped table-bordered table-hover dataTable display">
            <thead>
            <tr>
                <th wire:click="sortBy('id')"  style="cursor: pointer;">
                    #
                    @include('partials._sort-icon',['field'=>'id'])
                </th>
                <th wire:click="sortBy('name')"  style="cursor: pointer;">
                    Company Name

                    @include('partials._sort-icon',['field'=>'name'])
                </th>
                <th wire:click="sortBy('url')"  style="cursor: pointer;">
                    URL

                    @include('partials._sort-icon',['field'=>'url'])
                </th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($companies as $company)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$company->name}}</td>
                    <td>{{$company->url}}</td>
                    <td class="d-flex">
                        <a href="/companies/{{$company->id}}/edit" class="btn btn-primary btn-sm px-3">
                            <i class="fas fa-pen"></i>
                        </a>
                        <form action="/companies/{{$company->id}}" onsubmit="return confirm('Are you sure you want to delete?');" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm px-3" >
                                <i class="fas fa-minus"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p class="text-center">Whoops! No Companies were found</p>
    @endif

    <div>

        <p>
            Showing {{$companies->firstItem()}} to {{$companies->lastItem()}} out of {{$companies->total()}} companies
        </p>
        <p>

            {{$companies->links('pagination::bootstrap-4')}}
        </p>
    </div>
</div>
