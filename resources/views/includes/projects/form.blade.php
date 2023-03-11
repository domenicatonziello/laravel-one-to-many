<hr>
@if($project->exists)
    <form action="{{route('admin.projects.update', $project->id)}}" method="POST" novalidate enctype="multipart/form-data">
    @method('PUT')
@else
    <form action="{{route('admin.projects.store')}}" method="POST" novalidate enctype="multipart/form-data">
@endif
    @csrf
    <div class="row my-5">
        {{-- title --}}
        <div class="col-6 mb-4">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" maxlength="50" required value="{{ old('title', $project->title) }}" placeholder="Inserisci il titolo del tuo progetto">
            @error('title')
                <div class="invalid-feedback"> {{$message}} </div>
            @enderror
        </div>
        {{-- image --}}
        <div class="col-4 mb-4">
            <label for="image" class="form-label">Immagine</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="col-2 mb-4">
            <img class="img-fluid" id="preview" src="{{ $project->image ? asset('storage/'. $project->image) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToAJWzwYiDV9a5AvKOyHpeBXgjj-K_8i_WnVmIQSBmJAYa2NATl--M6dAVolBJibkV0do&usqp=CAU' }}" alt="">
        </div>
        {{-- description --}}
        <div class="col-8 mb-4">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3"> {{ old('description', $project->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback"> {{$message}} </div>
            @enderror
        </div>
        {{-- link_project --}}
        <div class="col-4 mb-4">
            <label for="link" class="form-label">Link Progetto</label>
            <input type="text" class="form-control @error('link_project') is-invalid @enderror" id="link" name="link_project" required  value="{{ old('link_project', $project->link_project) }}" placeholder="Inserisci link del progetto">
            @error('link_project')
                <div class="invalid-feedback"> {{$message}} </div>
            @enderror
        </div>
    </div>
    <a href="{{route('admin.projects.index')}}" class="btn btn-secondary">Indietro</a>
    <button type="submit" class="btn btn-primary">Salva</button>
</form>
<hr>
@section('scripts')
<script src="{{ Vite::asset('resources/js/preview-image.js')}}"></script>
@endsection