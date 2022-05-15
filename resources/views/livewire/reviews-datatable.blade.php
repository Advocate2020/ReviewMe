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
            <input wire:model.debounce.300ms="search" class="form-control" type="text" placeholder="Search Review rate...">
        </div>

    </div>

    @if($reviews->isNotEmpty())
        <table class="table">
            <thead>
            <tr>
                <th>
                    #
                </th>
                <th>
                    User Name
                </th>
                <th>
                    Product Name
                </th>
                <th wire:click="sortBy('rate')"  style="cursor: pointer;">
                    Rate

                    @include('partials._sort-icon',['field'=>'rate'])
                </th>
                <th wire:click="sortBy('created_at')"  style="cursor: pointer;">
                    Created Date

                    @include('partials._sort-icon',['field'=>'created_at'])
                </th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($reviews as $review)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$review->user->name}} {{$review->user->surname}}</td>
                    <td>{{$review->product->name}}</td>
                    <td>{{$review->rate}}</td>
                    <td>{{$review->created_at->diffForHumans()}}</td>
                    <td class="d-flex">
                        <form action="/reviews/{{$review->id}}" onsubmit="return confirm('Are you sure you want to delete?');" method="POST">
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
        <p class="text-center">Whoops! No Reviews were found</p>
    @endif

    <div>

        <p>
            Showing {{$reviews->firstItem()}} to {{$reviews->lastItem()}} out of {{$reviews->total()}} reviews
        </p>
        <p>

            {{$reviews->links('pagination::bootstrap-4')}}
        </p>
    </div>
</div>
