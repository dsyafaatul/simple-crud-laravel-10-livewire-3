<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            @if(session()->has("message"))
                <div class="alert alert-success">
                    {{ session("message") }}
                </div>
            @endif

            <a href="/create" wire:navigate class="btn btn-md btn-success rounded shadow-sm border-0 mb-3">ADD NEW POST</a>
            <div class="card border-0 rounded shadow-sm">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Content</th>
                                <th scope="col" style="width: 15%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($posts as $post)
                            <tr>
                                <td class="text-center">
                                    <img src="{{ asset("/storage/posts/".$post->image) }}" class="rounded" style="width: 150px">
                                </td>
                                <td>{{ $post->title }}</td>
                                <td>{!! $post->content !!}</td>
                                <td class="text-center">
                                    <a href="/edit/{{ $post->id }}" wire:navigate class="btn btn-sm btn-primary">EDIT</a>
                                    <button class="btn btn-sm btn-danger">DELETE</button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">
                                    <div class="alert alert-danger">
                                        Data Tost Belum Tersedia
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $posts->links("vendor.pagination.bootstrap-5") }}
                </div>
            </div>
        </div>
    </div>
</div>